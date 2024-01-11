import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue';

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: ExampleComponent
        },
        // other routes...
    ]
});
