<template>
    <div class="v-wrapper">
        <div class="v-productsCard" v-if="prodById">
            <div class="v-card__left">
                <div>
                    <div>
                        Article:{{prodById.article}}
                    </div>
                    <div class="v-card__name">
                        {{prodById.name}}
                    </div>
                </div>
                <hr style="width: 100%;">
                <div class="v-card__image">
                    <img :src="prodById.image.path" alt="">
                    <div class="v-card__labels">
                        <div class="v-card__label" v-show="prodById.sale === 1">Sale</div>
                        <div class="v-card__label" v-show="prodById.new === 1">New</div>
                        <div class="v-card__label" v-show="prodById.hot === 1">Hot</div>
                    </div>
                </div>
            </div>
            <div class="v-card__price">
            <div class="v-card__price-new">
                {{prodById.price_new}}₽
            </div>
            <div class="v-card__price-old" v-if="prodById.price_old > 1">
                {{prodById.price_old + '₽'}}
            </div>
            <button variant="success" @click="addToCart(prodById); makeToast('success');">
            Добавить
        </button>
        </div>
            <div class="v-card__right">
                <table cellpadding="25" v-for="(feature, index) in features" :key="index" class="features">
                    <th>{{feature.feature_name}}</th>
                    <th>{{feature.feature_value}}</th>
                </table>
                <ShareNetwork
                    network="facebook"
                    :url="url"
                    title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                    description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                    quote="The hot reload is so fast it\'s near instant. - Evan You"
                    hashtags="vuejs,vite"
                >Share on Facebook</ShareNetwork>
            </div>
            
        
        </div>
        
        <div style="margin: 50px auto">
            <h1>Описание</h1>
            {{prodById.description}}
        </div>
    </div>
</template>
<script>

import {mapGetters, mapActions} from 'vuex'

export default {
    name: 'productsCard',
    methods: {
         ...mapActions([
            'ADD_TO_CART',
            'GET_PRODUCTS_FROM_API'
         ]),
        addToCart(prodById){
            this.ADD_TO_CART(prodById)
        },
        isActive (menuItem) {
            return this.activeItem === menuItem
            },
        setActive (menuItem) {
            this.activeItem = menuItem
            },
        makeToast(variant = null) {
            this.$bvToast.toast('Товар добавлен в корзину', {
            title: `Успешно`,
            variant: variant,
            solid: true
            })
    },
    },
    mounted() {
        this.GET_PRODUCTS_FROM_API()
    },
    computed: {
            ...mapGetters ([
                'PROD_BY_ID'
            ]),
            productId () {
                return +this.$route.params.id;
            },
            prodById () {
                return this['PROD_BY_ID'](this.productId);
            },
            features () {
                return this.prodById.features
            }

    },
    data() {
        return {
            url: this.$route.fullPath,
        }
    }
}
</script>
<style lang="scss" scoped>
    .features {
        display: flex;
    }
    table {
        &:nth-child(odd) {
                background: rgb(243, 243, 243);
            }
        & th {
            width: 100%;
        }
    }
    .v-card__right {
        margin: 100px 150px 0;
        & table {
            width: 100%;
        }
    }
    .v-wrapper {
        max-width: 1440px;
        margin: 0 auto;

    }
    .v-productsCard {
        display: flex;
        justify-content: space-between;
    }
    .v-card__name {
        font-size: 56px;
    }
    .v-card__image {
        position: relative;
        display: flex;
        & img {
            width: 400px;
        }
    }
    .v-card__labels {
        position: absolute;
        top: 0;
    }
    .v-card__label {
        border-radius: 15px;
        color: #FFF;
        padding: 10px 0 15px 0;
        width: 70px;
        height: 40px;
        text-align: center;
        align-items: center;
        margin: 10px 0;
        &:nth-child(1) {
            background: blue;
        }
        &:nth-child(2) {
            background: coral;
        }
        &:nth-child(3) {
            background: crimson;
        }
    }
    .v-card__price {
        display: flex;
        flex-direction: column;
        justify-content: center;
        &-old {
            text-decoration: line-through;
            color: red;
        }
        &-new {
            font-size: 48px;
            color: #064717;
        }
    }
    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
        color: #064717; 
    }
    a {
        color: #064717;
    }

    .hooper__img-bot {
        max-width: 165px;
        height: 50%;
            
    }
    .hooper__img-top {
        width: 500px;
        height: 100%;
    }
</style>