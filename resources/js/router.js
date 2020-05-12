import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Machine from './components/Machine';
import NotFound from './components/NotFound';
import LogIn from './components/LogIn';
import Register from './components/Register';


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: Home },
        { path: '/login' , component: LogIn },
        { path: '/register', component: Register },
        { path: '/error', component: NotFound },
        { path: '/:label', props: true, component: Machine },
    ],
    mode: 'history'
});