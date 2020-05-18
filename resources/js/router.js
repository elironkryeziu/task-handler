import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home.vue';
import Machine from './components/Machine';
import NotFound from './components/NotFound';
import LogIn from './components/LogIn';
import Register from './components/Register';
import AdminPanel from './components/AdminPanel';
import Departments from './components/Departments';
import Machines from './components/Machines';
import Timers from './components/Timers';
import Logout from './components/Logout'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: Home },
        { path: '/login' , component: LogIn },
        { path: '/register', component: Register },
        { path: '/admin', component: AdminPanel, meta: {
            requiresAuth: true,
        }},
        { path: '/admin/departments', component: Departments, meta: {
            requiresAuth: true,
        }},
        { path: '/admin/machines', component: Machines, meta: {
            requiresAuth: true,
        }},
        { path: '/admin/timers', component: Timers, meta: {
            requiresAuth: true,
        }},
        { path: '/logout', component: Logout, meta: {
            requiresAuth: true,
        }},
        { path: '/error', component: NotFound },
        { path: '/:label', props: true, component: Machine },
    ],
    mode: 'history'
});