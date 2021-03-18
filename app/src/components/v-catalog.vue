<template>
<div class="wrapper">
    <div class="v-category" v-if="Rangeshow()">
      <v-category
        :options="category"
        @click="filterByCategory"
      />
    </div>
    <div class="v-catalog">
        <div v-if="Rangeshow()">
  <!-- <input type="text" v-model.number="minPrice" @change="setRangeSlider"> -->
  <!-- <input type="text" v-model.number="maxPrice" @change="setRangeSlider"> -->
      </div>
        <div class="v-catalog__list">
        <v-catalog-item
            filtered
            v-for="product in filtredProducts"
            :key="product.id"
            :product_data="product"
            @addToCart="addToCart"
        />
        </div>
    </div>
</div>
</template>
<script>


import vCatalogItem from './v-catalog-item.vue'
import {mapActions, mapGetters} from 'vuex'
import vCategory from './v-category.vue'
// import _ from 'lodash';

export default {
  name: 'v-catalog',
  components: {
    vCatalogItem,
    vCategory
  },
  data () {
        return {
          product: [],
          limit: 8,
          minPrice: 0,
          maxPrice: 1000000,
          filtredProduct: [],
        }
  },
  computed: {
    ...mapGetters([
      'PRODUCTS',
      'SEARCH_VALUE',
    ]),
      filtredProducts() {
      if (this.$route.path === '/') {
        return this.PRODUCTS.filter((el, index) => index < this.limit);
      }else {
        if (this.filtredProduct.length) {
          return this.filtredProduct
        }
        if (this.$store.state.filteredByCategory.length) {
          return this.$store.state.filteredByCategory
        }
        // if (this.SEARCH_VALUE.length) {
        //   return this.SEARCH_VALUE
        // }
        else {
          return this.PRODUCTS
        }
      }
    },
    category() {
            return this.$store.getters.prodByCategory
        },
  },
  methods: {
    Rangeshow() {
      return this.$route.path != '/'
    },
    ...mapActions([
      'GET_PRODUCTS_FROM_API',
      'ADD_TO_CART',
    ]),
    addToCart(data){
      this.ADD_TO_CART(data)
    },
    filterByCategory(value) {
          this.$store.dispatch('filterByCategory', +value)
    },
    sortProductsBySearchValue(value) {
        this.filtredProduct = [...this.PRODUCTS]
          if (value) {
            this.filtredProduct = this.filtredProduct.filter(function (item) {
              return item.name.toLowerCase().includes(value.toLowerCase())
          })
          } else {
            this.filtredProduct = this.PRODUCTS;
          }
    },
  },
watch: {
      SEARCH_VALUE() {
        this.sortProductsBySearchValue(this.SEARCH_VALUE);
      }
},
  mounted() {
    this.GET_PRODUCTS_FROM_API()
    .then((response) => {
          if (response.data) {
            this.sortByCategories()
            this.sortProductsBySearchValue()
          }
        })
  }
}
</script>






<style lang="scss" scoped>
    .wrapper {
      display: flex;
      flex-direction: column;
    }
    .v-catalog {
        &__list {
        max-width: 1440px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-evenly;
        @media screen and (max-width: 1024px) {
            justify-content: space-evenly;
        }
        }
        &__sort {
          margin: 0 auto;
          max-width: 700px;
          font-size: 36px;
          display: flex;
          justify-content: space-around;
        }
        &__show-more {
          margin: 0 auto;
          max-width: 1440px;
          & button {
            width: 150px;
            height: 50px;
            background: rgb(13, 148, 13);
            color: #FFF;
          }
        }
    }

</style>