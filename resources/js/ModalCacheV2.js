import _        from 'lodash';
import util     from 'pl-util';
import compUtil from './components/util';
import models   from './models';

class ModelCache {
    modelCache = {};
    inheritanceIndex = {};
    cache = getCleanCache();

    fetch(url, model = null) {
        return this.fetchUrl(url).then((data) => this.add(model, data));
    }

    add(model, data) {
        if (!data) {
            data = model;
            model = null;
        }

        function addModelObj(modelObj) {
            const cacheName = modelObj.constructor.CACHE_NAME;
            if (inheritanceIndex[cacheName]) {
                console.log(
                    'Warning: attempting to add general model when more specific ones exist.'
                );
                return;
            }
            cache[cacheName][modelObj.id()] = modelObj;
        }

        if (data instanceof models.BaseModel) {
            addModelObj(data);
            return this.resolveDependencies(data);
        } else if (_.isArray(data) && data.length > 0 && data[0] instanceof models.BaseModel) {
            _.forEach(data, addModelObj);
            return this.resolveDependencies(data);
        } else if (model && !_.isArray(data)) {
            const instance = this.reconcileModel(model, data);
            return this.resolveDependencies(instance);
        } else if (model && _.isArray(data)) {
            const instances = data.map(this.reconcileModel.bind(null, model));
            return this.resolveDependencies(instances);
        } else {
            return this.reconcileModels(data).then(this.resolveDependencies);
        }
    }

    reconcileModels(data) {
        const promises = [];
        _.forEach(data, function (modelData, modelName) {
            const modelClass = models[modelName];
            if (modelClass) {
                promises.push(this.reconcileModel(modelClass, modelData));
            }
        });
        return Promise.all(promises);
    }

    reconcileModel(model, data) {
        const id = model.idFromData(data);
        if (!cache[model.CACHE_NAME][id]) {
            cache[model.CACHE_NAME][id] = new model(data);
        } else {
            cache[model.CACHE_NAME][id].reconcile(data);
        }
        return cache[model.CACHE_NAME][id];
    }

    resolveDependencies(modelOrModels) {
        const promises = [];

        function resolveOne(model) {
            const dependencies = model.getDependencies();
            _.forEach(dependencies, (dependencyName) =>{
                const dependentModel = model.get(dependencyName);
                if (dependentModel) {
                    const dependentId = dependentModel.id();
                    if (!cache[dependentModel.constructor.CACHE_NAME][dependentId]) {
                        promises.push(
                            this.fetch(dependentModel.url(), dependentModel.constructor)
                        );
                    }
                }
            });
        }

        if (_.isArray(modelOrModels)) {
            _.forEach(modelOrModels, resolveOne);
        } else {
            resolveOne(modelOrModels);
        }
        return Promise.all(promises).then(() => modelOrModels);
    }

    fetchUrl(url) {
        return new Promise(function (resolve, reject) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 300) {
                    resolve(JSON.parse(xhr.responseText));
                } else {
                    reject(xhr.statusText);
                }
            };
            xhr.onerror = function () {
                reject(xhr.statusText);
            };
            xhr.send();
        });
    }

    getCleanCache() {
        return _.reduce(models, function (modelCache, model) {
            if (model.CACHE_NAME && !inheritanceIndex[model.CACHE_NAME]) modelCache[model.CACHE_NAME] = {};
            return modelCache;
        }, {});
    }

    buildInheritanceIndex() {
        for (var i in models) {
            for (var j in models) {
                var child = models[i];
                var parent = models[j];
                if (typeof child !== 'function' || typeof parent !== 'function') continue;
                if (child.prototype instanceof parent) {
                    if (!parent.CACHE_NAME || !child.CACHE_NAME) continue;
                    if (typeof child.prototype.constructor.couldBeMe !== 'function') {
                        console.log('Warning: ' + i + ' does not implement a couldBeMe function.');
                        continue;
                    }
                    if (!inheritanceIndex[parent.CACHE_NAME]) inheritanceIndex[parent.CACHE_NAME] = [];
                    inheritanceIndex[parent.CACHE_NAME].push(child.CACHE_NAME);
                }
            }
        }
    }
    identifyModel(model, instanceData) {
        var modelName = model.CACHE_NAME;     // check if there is a more specific model this could be
        if (inheritanceIndex[modelName]) {
            var descendants = inheritanceIndex[modelName];
            for (var i = 0, len = descendants.length; i < len; i++) {
                var cacheName = descendants[i];
                var modelWithCacheName = _.find(models, ['CACHE_NAME', cacheName]);
                if (!modelWithCacheName) continue;
                if (modelWithCacheName.couldBeMe(instanceData)) {
                    return modelWithCacheName;
                }
            }
        }
        return model;
    }
}
