<template>
  <div id="app">
    <v-menu-upper
      
    />
    <v-menu-bottom

    />
    
    <keep-alive>
    <router-view/>
    </keep-alive>
    <v-menu-footer/>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'


import VMenuBottom from './components/v-menu-bottom.vue'
import VMenuUpper from './components/v-menu-upper.vue'
import VMenuFooter from './components/v-menu-footer.vue'
export default {
  name: 'App',
  components: {
    VMenuUpper,
    VMenuBottom,
    VMenuFooter,
  },
  computed: {
    ...mapGetters([
    ]),
    // sortKey: function() {
    // return this.selectSort.split(':')[0];
    // },
    // sortDir: function() {
    //     return this.selectSort.split(':')[1];
    // }
  },
  mounted() {
    this.$store.dispatch('GET_CATEGORY'),
    this.$store.dispatch('GET_PRODUCTS_FROM_API')
  },
  data() {
    return {
    }
  },
}
</script>

<style lang="scss">
@import './assets/app.css';
body {
  margin: 0;
  padding: 0;
}
#app {
  font-family: 'Roboto Mono', normal;
  margin: 0;
  padding: 0;
  user-select: none;
  box-sizing: border-box;
}
a {
  text-decoration: none;
  color: #064717;
  &:hover {
    text-decoration: none;
    color: #064717;
    text-decoration: underline;
    
  }
}
</style>
