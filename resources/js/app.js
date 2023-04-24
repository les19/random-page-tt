import './bootstrap';
import { createApp } from 'vue'
import store from './store';
import router from './router';
import App from './components/App.vue';
import LangMixin from './mixins/LangMixin';

createApp(App)
    .mixin(LangMixin)
    .use(router)
    .use(store)
    .mount("#app");
