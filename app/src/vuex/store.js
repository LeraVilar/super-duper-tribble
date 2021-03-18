import Vue from 'vue'
import Vuex from 'vuex'
import Axios from 'axios'
// import _ from 'lodash';


Vue.use(Vuex);

const store = new Vuex.Store ({
    state: {
        products: [],
        category: [],
        cart: [],
        filteredByCategory: [],
        searchValue: '',
        status: '',
        token: localStorage.getItem('token') || '',
        user : {}
    },
    mutations: {
        SET_PRODUCTS: (state, products) => {
            state.products = products;
        },
        SET_CATEGORY: (state, category) => {
            state.category = category
        },
        SET_FILTERED: (state, products) => {
            state.filteredByCategory = products
        },
        SET_CART: (state, product) => {
            if(state.cart.length) {
                let isProductExists = false;
                state.cart.map(function (item) {
                    if (item.id === product.id) {
                        isProductExists = true;
                        item.quantity++
                    }
                })
                if (!isProductExists) {
                    state.cart.push(product)
                }
            }else {
                state.cart.push(product)
            }
        },
        INCREM: (state, index) => {
            state.cart[index].quantity++
        },
        DECREM: (state, index) => {
            if (state.cart[index].quantity > 1) {
                state.cart[index].quantity--
            }
        },
        REMOVE_FROM_CART: (state, index) => {
                state.cart.splice(index, 1)
        },
        SET_SEARCH: (state, value) => {
            state.searchValue = value;  
        },
        auth_request(state){
            state.status = 'loading'
          },
          auth_success(state, token, user){
            state.status = 'success'
            state.token = token
            state.user = user
          },
          auth_error(state){
            state.status = 'error'
          },
          logout(state){
            state.status = ''
            state.token = ''
          },
    },
    actions: {
        GET_PRODUCTS_FROM_API({commit}) {
            return Axios('http://install-master/api/products', {
             method: "GET"
            })  
            .then((products) => {
                commit('SET_PRODUCTS', products.data);
                return products.data;
            })
            .catch((error) => {
                console.log(error)
                return error;
            })
        },
        GET_CATEGORY({ commit }) {
            Axios.get('http://install-master/api/category/new').then(response => {
                commit('SET_CATEGORY', response.data)
            })
        },
        ADD_TO_CART({commit}, product) {
            commit('SET_CART', product);
        },
        DELETE_FROM_CART({commit}, index) {
            commit('REMOVE_FROM_CART', index)
        },
        INCREM_ITEM({commit}, index) {
            commit('INCREM', index)
        },
        DECREM_ITEM({commit}, index) {
            commit('DECREM', index)
        },
        GET_SEARCH({commit}, value) {
            commit('SET_SEARCH', value)
        },
        filterByCategory({commit, state}, value) {
            const filtered = state.products.filter( products => {
                let foundLocations = products.category.findIndex( category => {
                    return category.id === value
                })

                return foundLocations !== -1
            })
            // console.log(filtered)
            commit('SET_FILTERED', filtered)
        },



        login({commit}, user){
            return new Promise((resolve, reject) => {
              commit('auth_request')
              Axios({url: 'http://localhost:3000/login', data: user, method: 'POST' })
              .then(resp => {
                const token = resp.data.token
                const user = resp.data.user
                localStorage.setItem('token', token)
                Axios.defaults.headers.common['Authorization'] = token
                commit('auth_success', token, user)
                resolve(resp)
              })
              .catch(err => {
                commit('auth_error')
                localStorage.removeItem('token')
                reject(err)
              })
            })
          },
          register({commit}, user){
            return new Promise((resolve, reject) => {
              commit('auth_request')
              Axios({url: 'http://localhost:3000/register', data: user, method: 'POST' })
              .then(resp => {
                const token = resp.data.token
                const user = resp.data.user
                localStorage.setItem('token', token)
                Axios.defaults.headers.common['Authorization'] = token
                commit('auth_success', token, user)
                resolve(resp)
              })
              .catch(err => {
                commit('auth_error', err)
                localStorage.removeItem('token')
                reject(err)
              })
            })
           },
           logout({commit}){
            return new Promise((resolve) => {
              commit('logout')
              localStorage.removeItem('token')
              delete Axios.defaults.headers.common['Authorization']
              resolve()
            })
           }
    },
    getters: {
        PRODUCTS: state => state.products,
        prodByCategory: state => state.category,
        CART: state => state.cart,
        PROD_BY_ID: state => id => {
            return state.products.find(products => products.id == id);
        },
        SEARCH_VALUE: state => state.searchValue,
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
        filterdByCategory: state => state.filteredByCategory
}
});

export default store;