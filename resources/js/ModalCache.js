import _        from "lodash";
import util     from "pl-util";
import compUtil from "./components/util";
import models   from "./models";

import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query';

const modelApi = createApi({
    reducerPath: 'model',
    baseQuery: fetchBaseQuery({ baseUrl: 'https://example.com' }),
    endpoints: (builder) => ({
        fetchModel: builder.query({
            query: (url) => url,
            transformResponse: (response) => {
                // Handle the response here if needed
                return response;
            },
        }),
    }),
});
const { useFetchModelQuery } = modelApi;
const ModelCache = (() => {
    const modelCache = {};
    const inheritanceIndex = {};
    modelCache.fetch = async (model, url) => {
        if (!url) {
            url = model;
            model = null;
        }
        const { data } = await useFetchModelQuery(url).unwrap();
        modelCache.add(model, data);
        return data;
    };
    modelCache.add = (model, data) => {
        if (!data) {
            data = model;
            model = null;
        }

        const addModelObj = (modelObj) => {
            const cacheName = modelObj.constructor.CACHE_NAME;
            if (inheritanceIndex[cacheName]) {
                console.log('Warning: attempting to add general model when more specific ones exist.');
                return;
            }
            cache[cacheName][modelObj.id()] = modelObj;
        };

        if (data instanceof models.BaseModel) {
            addModelObj(data);
            return modelCache.resolveDependencies(data);
        } else if (_.isArray(data) && data.length > 0 && (data[0] instanceof models.BaseModel)) {
            _.forEach(data, addModelObj);
            return modelCache.resolveDependencies(data);
        } else if (model && !_.isArray(data)) {
            const instance = modelCache.reconcileModel(model, data);
            return modelCache.resolveDependencies(instance);
        } else if (model && _.isArray(data)) {
            const instances = data.map(modelCache.reconcileModel.bind(modelCache, model));
            return modelCache.resolveDependencies(instances);
        } else {
            return modelCache.reconcileModels(data).then(modelCache.resolveDependencies);
        }
    };
    modelCache.remove = (model, id) => {
        if (model instanceof models.BaseModel) {
            id = model.id();
            const modelName = model.constructor.CACHE_NAME;
            const specificModelName = modelName;
            const cachedModel = modelCache.get(modelName, id);
        } else {
            const modelName = model.CACHE_NAME;
            const cachedModel = modelCache.get(model, id);
            const specificModelName = cachedModel.constructor.CACHE_NAME;
        }

        if (cachedModel) {
            const dependencies = models.DEPENDENCIES[specificModelName];
            if (dependencies) {
                for (let i = 0, len = dependencies.length; i < len; i++) {
                    const dependency = dependencies[i];
                    const dependencyModelName = dependency.model.CACHE_NAME;
                    const modelStore = cache[dependencyModelName];
                    if (!modelStore) continue;
                    const dependencyId = cachedModel[dependency.source]();
                    const dependencyInstance = modelStore[dependencyId];
                    if (!dependencyId || !dependencyInstance) continue;
                    const dependencyModelCollection = dependencyInstance[modelName]();
                    const dependencyModelIndex = dependencyModelCollection.indexOf(cachedModel);
                    if (dependencyModelIndex > -1) {
                        dependencyModelCollection.splice(dependencyModelIndex, 1);
                    }
                }
                for (let modelKey in models) {
                    const mod = models[modelKey];
                    if (cachedModel[mod.CACHE_NAME]) {
                        const reverseDepsOnModel = cachedModel[mod.CACHE_NAME]();              // building.floors()
                        for (let i = reverseDepsOnModel.length - 1; i >= 0; i--) {
                            if (!reverseDepsOnModel[i]) continue;
                            modelCache.remove(mod, reverseDepsOnModel[i].id());                // remove each floor, no longer exists without a building
                        }
                    }
                }
            }
            delete cache[cachedModel.constructor.CACHE_NAME][id];
        }

        return cachedModel;
    };
    modelCache.reconcileModels = data => {
        for (let modelKey in models) {
            const model = models[modelKey];
            const modelName = model.CACHE_NAME;
            const modelData = data[modelName];
            if (!(modelName && modelData)) continue;
            let i = 0;
            const ilen = modelData.length;
            for (; i < ilen; i++) {
                if (!modelData[i]) continue;
                modelData[i] = modelCache.reconcileModel(model, modelData[i]);
            }
        }
        return Promise.resolve(data);
    };
    modelCache.reconcileModel = (model, instanceData) => {
        model = identifyModel(model, instanceData);
        const modelName = model.CACHE_NAME;
        const instanceId = instanceData._id || instanceData.id;
        if (!instanceId) return;
        let instance = cache[modelName][instanceId];
        if (!instance) {
            instance = new model(null, instanceData);
            cache[modelName][instanceId] = instance;
        } else {
            instance.update(instanceData);
        }
        return instance;
    };
    modelCache.resolveDependencies = data => {
        for (const modelKey in models) {
            const model = models[modelKey];
            let modelName = model.CACHE_NAME;
            const modelStore = cache[modelName];
            const modelDependencies = models.DEPENDENCIES[modelName];
            if (!(modelName && modelStore && modelDependencies)) continue;
            for (const instanceId in modelStore) {
                const instance = modelStore[instanceId];
                let i = 0;
                const ilen = modelDependencies.length;
                for (; i < ilen; i++) {
                    const dependency = modelDependencies[i];
                    const dependencyName = dependency.model.CACHE_NAME;
                    if (!instance[dependency.source]) {
                        instance[dependency.source] = () => {};
                    }
                    if (!instance[dependency.dest]) {
                        instance[dependency.dest] = () => ({});
                    }
                    let j, jlen, dependent;
                    if (!dependencyName) {
                        dependent = instance[dependency.source]();
                        if (Array.isArray(dependent)) {
                            if (!(dependent[0] instanceof dependency.model)) {
                                instance[dependency.dest]([]);
                                for (j = 0, jlen = dependent.length; j < jlen; j++) {
                                    instance[dependency.dest]().push(new dependency.model(null, dependent[j]));
                                }
                            }
                        } else if (dependent && !(dependent instanceof dependency.model)) {
                            instance[dependency.dest](new dependency.model(null, dependent));
                        }
                    } else {
                        const dependentId = instance[dependency.source]();
                        dependent = dependentId ? modelCache.get(dependencyName, dependentId) : null;
                        if (dependentId && dependent) {
                            instance[dependency.dest](dependent);
                            for (const parentModelName in inheritanceIndex) {
                                const children = inheritanceIndex[parentModelName];
                                if (children.indexOf(modelName) >= 0) {
                                    modelName = parentModelName;
                                    break;
                                }
                            }
                            if (!dependent[modelName]) {
                                dependent[modelName] = () => ([]);
                            }
                            const instances = dependent[modelName]();
                            if (instances.indexOf(instance) < 0) {
                                instances.push(instance);
                            }
                        }
                    }
                }
            }
        }
        return Promise.resolve(data);
    };
    modelCache.getOrFetchCollection = (model, ids, fetchUrl) => {
        const collection = [];
        let fetchCollection = false;
        let i = 0;
        const len = ids.length;
        for (; i < len; i++) {
            const id = ids[i];
            const cachedModel = modelCache.get(model, id);
            if (cachedModel) {
                collection.push(cachedModel);
            } else {
                fetchCollection = true;
                break;
            }
        }
        if (fetchCollection) {
            return modelCache.fetch(fetchUrl)
                .then(data => data[model.CACHE_NAME] || [])
                .catch(error => Promise.reject(error));
        } else {
            return Promise.resolve(collection);
        }
    };
    modelCache.getOrFetchSingle = (model, id, fetchUrl) => {
        fetchUrl = fetchUrl || util.url[model.CACHE_NAME]({id: id});
        const cachedModel = modelCache.get(model, id);
        if (cachedModel) {
            return Promise.resolve(cachedModel);
        } else {
            return modelCache.fetch(model, fetchUrl)
                .then(data => Promise.resolve(data))
                .catch(error => Promise.reject(error));
        }
    };
    modelCache.get = (model, ids) => {
        if (!model) return null;
        const cacheName = (typeof model === 'string') ? model : model.CACHE_NAME;
        const modelStore = cache[cacheName];
        if (inheritanceIndex[cacheName]) {
            const descendants = inheritanceIndex[cacheName];
            const results = [];
            for (const descendant of descendants) {
                const cacheEntry = cache[descendant];
                if (!ids && Object.keys(cacheEntry).length > 0) {
                    results.push(..._.values(cacheEntry));
                }
                if (!_.isArray(ids) && Object.keys(cacheEntry).indexOf(ids) >= 0) {
                    return cacheEntry[ids];
                }
                if (_.isArray(ids)) {
                    const cacheIdIntersection = _.intersection(Object.keys(cacheEntry), ids);
                    results.push(...cacheIdIntersection.map(id => cacheEntry[id]));
                }
            }
            return results.length > 0 ? results : null;
        } else {
            if (!ids) {
                return modelStore ? _.values(modelStore) : null;
            }
            if (modelStore) {
                return _.isArray(ids) ? ids.map(id => modelStore[id]) : modelStore[ids];
            }
        }
    };
    modelCache.clear = () => {
        cache = getCleanCache();
        return modelCache;
    };
    function getCleanCache() {
        return models.reduce((modelCache, model) => {
            if (model.CACHE_NAME && !inheritanceIndex[model.CACHE_NAME]) {
                modelCache[model.CACHE_NAME] = {};
            }
            return modelCache;
        }, {});
    }
    function buildInheritanceIndex() {
        for (let i in models) {
            for (let j in models) {
                const child = models[i];
                const parent = models[j];
                if (typeof child !== 'function' || typeof parent !== 'function') {
                    continue;
                }
                if (child.prototype instanceof parent) {
                    if (!parent.CACHE_NAME || !child.CACHE_NAME) {
                        continue;
                    }
                    if (typeof child.prototype.constructor.couldBeMe !== 'function') {
                        console.log(`Warning: ${i} does not implement a couldBeMe function.`);
                        continue;
                    }
                    if (!inheritanceIndex[parent.CACHE_NAME]) {
                        inheritanceIndex[parent.CACHE_NAME] = [];
                    }
                    inheritanceIndex[parent.CACHE_NAME].push(child.CACHE_NAME);
                }
            }
        }
    }
    function identifyModel(model, instanceData) {
        const modelName = model.CACHE_NAME;
        if (inheritanceIndex[modelName]) {
            const descendants = inheritanceIndex[modelName];
            for (let i = 0, len = descendants.length; i < len; i++) {
                const cacheName = descendants[i];
                const modelWithCacheName = models.find(m => m.CACHE_NAME === cacheName);
                if (!modelWithCacheName) {
                    continue;
                }
                if (modelWithCacheName.couldBeMe(instanceData)) {
                    return modelWithCacheName;
                }
            }
        }
        return model;
    }
    buildInheritanceIndex();
    let cache = getCleanCache();
    return modelCache;
})();
export default ModelCache;