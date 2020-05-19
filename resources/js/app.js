import Vue from 'vue';
import router from './router';
import App from './components/App.vue';
import VModal from 'vue-js-modal'
import moment from 'moment'

require('./bootstrap');


Vue.filter('timeformat', (arg)=>{
  return moment(arg, "HH:mm:ss").format('LT');
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (!localStorage.getItem("access_token")) {
        next({
          path: "/login",
        });
      } else {
        next();
      }
    } else if (to.matched.some((record) => record.meta.requiresVisitor)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
      if (localStorage.getItem("access_token")) {
        next({
          path: "/admin",
        });
      } else {
        next();
      }
    } else {
      next(); // make sure to always call next()!
    }
  });


const app = new Vue({
    el: '#app',
    router,
    components: {
        App
    },
});

Vue.use(VModal)
Vue.use(require('vue-moment'));