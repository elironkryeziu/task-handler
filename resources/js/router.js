import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Machine from './components/Machine';



Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: Home },
        { path: '/:label', props: true, component: Machine },
    ],
    mode: 'history'
});