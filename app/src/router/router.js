import Vue from 'vue'
import Router from 'vue-router'
import store from '../vuex/store.js'

import vCart from '../components/v-cart'
import vMainPage from '../components/v-main-page'
import ProductsCard from '../components/v-productsCard'
// import filterCategory from '../components/v-filterCategory'
import vCatalog from '../components/v-catalog'
import checkout from '../components/v-checkout'

import Login from '../components/login'
import Register from '../components/register'
import userBoard from '../components/userBoard'
Vue.use(Router);

let router = new Router({
    routes: [{
        path: '/',
        name: 'mainpage',
        component: vMainPage
    },
    {
        path: '/cart',
        name: 'cart',
        component: vCart,
        props: true
    },
    {
        path: '/products/:id',
        name: 'productsCard',
        component: ProductsCard
    },
    { 
        path: '/catalog',
        name: 'cat',
        component: vCatalog,
        children: ''
    },
    {
        path: '/login',
        name: 'login',
        component: Login
      },
      {
        path: '/register',
        name: 'register',
        component: Register
      },
      {
        path: '/secure',
        name: 'secure',
        component: userBoard,
        meta: { 
          requiresAuth: true
        }
      },
      {
        path: '/checkout',
        name: 'checkout',
        component: checkout
      }
]
})
router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      if (store.getters.isLoggedIn) {
        next()
        return
      }
      next('/login') 
    } else {
      next() 
    }
  })
export default router;