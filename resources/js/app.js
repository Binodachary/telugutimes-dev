import bootstrap from "./bootstrap";
import Vue from 'vue';
import 'livewire-vue';
import vco from "v-click-outside";
import VueSplide from '@splidejs/vue-splide';
import MySplide from './components/MySplide.vue';
import GLightbox from 'glightbox';
import "../css/glightbox.min.css";
import "../css/splide.css";

window.Vue = Vue;
Vue.use(vco);
Vue.use(VueSplide);

import Tabs                  from './components/Tabs';
import Tab                   from './components/Tab';
import {Splide, SplideSlide} from '@splidejs/vue-splide';
import WelcomeNote           from './components/WelcomeNote';
import EpaperCarousel        from "./components/EpaperCarousel.vue";

Vue.component('tabs', Tabs);
Vue.component('tab', Tab);
Vue.component('Slider', Splide);
Vue.component('SliderItem', SplideSlide);
Vue.component('WelcomeNote', WelcomeNote);
Vue.component('MySplide', MySplide);
Vue.component('EpaperCarousel',EpaperCarousel);


const app = new Vue({
    el: '#app',
    data() {
        return {
            open: false,
            stickyHeader: false,
            menuOpen: false,
            openTab: 'all',
            activeClasses: 'border-b-2 border-white',
            selectedCategory: ''
        }
    },
    created() {
        window.addEventListener("scroll", this.handleScroll);
    },
    mounted() {
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('selected')) {
            this.setSelected(urlParams.get('selected'));
            this.openTab = urlParams.get('selected');
        }
    },
    destroyed() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        handleScroll() {
            this.stickyHeader = (window.pageYOffset > document.getElementById('header').offsetHeight)
        },
        closeSidebar() {
            this.open = false;
        },
        closeDropdown() {
            this.menuOpen = false;
        },
        setMenu(text) {
            this.menuOpen = text;
        },
        setSelected(selected) {
            Livewire.emit('setSelected', selected);
        }
    }
});
const footerForm = new Vue({
    el: "#footerForm",
    data() {
        return {
            subscriber_message: '',
            type: '',
            email: '',
            stopSubmit: false,
            validEmail: false
        }
    },
    methods: {
        addSubscriber() {
            if (this.validEmail) {
                if (!this.stopSubmit) {
                    this.stopSubmit = true;
                    axios.post('/subscribe', {email: this.email}).then(response => {
                        this.subscriber_message = response.data.message;
                        this.type = response.data.status
                        this.stopSubmit = false;
                        this.email = '';
                        setTimeout(this.resetForm, 3000);
                    });
                }
            }
        },
        resetForm() {
            this.subscriber_message = '';
            this.type = '';
        },
        validateEmail() {
            if (this.email == '') {
                this.subscriber_message = 'Email cannot be empty.';
                this.type = 'warning';
                this.validEmail = false;
            } else {
                let reg = /\S+@\S+\.\S+/;
                this.validEmail = reg.test(this.email);
                if (this.validEmail) {
                    this.resetForm();
                } else {
                    this.subscriber_message = 'Please enter a valid email.';
                    this.type = 'warning';
                }
            }
        }
    }
});

const lightbox = GLightbox({
    touchNavigation: true,
    loop: false,
    autoplayVideos: true
});