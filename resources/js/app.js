import Vue from 'vue';
import router from './router';
import App from './components/App.vue';
import VModal from 'vue-js-modal'
import moment from 'moment'
import VCalendar from 'v-calendar';
import Notifications from 'vue-notification'

require('./bootstrap');


Vue.filter('timeformat', (arg)=>{
  if(arg == null) 
  {
    return null;
  }else
  {
    return moment(arg, "HH:mm:ss").format('LT');
  }
});

Vue.use(Notifications)
//calendar in timer page
Vue.use(VCalendar, {
  componentPrefix: 'vc',  // Use <vc-calendar /> instead of <v-calendar />
});

//ridirect to /login if not logged in
router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
      if (!localStorage.getItem("access_token")) {
        next({
          path: "/login",
        });
      } else {
        next();
      }
    } else if (to.matched.some((record) => record.meta.requiresVisitor)) {
      if (localStorage.getItem("access_token")) {
        next({
          path: "/",
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
