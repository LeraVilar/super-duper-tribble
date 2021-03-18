import Vue from 'vue'
import App from './App.vue'
import store from './vuex/store'
import router from './router/router'
import Axios from 'axios'
import 'material-design-icons-iconfont'
import VueTreeNavigation from 'vue-tree-navigation';
import { TablePlugin } from 'bootstrap-vue'
import { ToastPlugin } from 'bootstrap-vue'
import VueSocialSharing from 'vue-social-sharing'
Vue.use(VueSocialSharing);
Vue.use(ToastPlugin)
Vue.use(TablePlugin)
Vue.use(VueTreeNavigation)

Vue.prototype.$http = Axios;
const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  store,
  router,
  VueTreeNavigation,
  
}).$mount('#app')
