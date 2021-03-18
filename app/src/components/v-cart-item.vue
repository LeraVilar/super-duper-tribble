<template>

    <div class="v-cart-item">
        <div class="v-cart-item__img"><img :src="cart_item_data.image.path"></div>
        <div class="v-cart-item__name">{{cart_item_data.name}}</div>
        <div class="v-cart-item__price">
            <div class="v-cart-item__price-new">{{cart_item_data.price_new}}₽</div>
        </div>
        <div class="v-cart-item__quantity">
            <div class="v-cart-item__quantity-crements" @click="decrem">-</div>
            <div class="v-cart-item__quantity-item">{{cart_item_data.quantity}}</div>
            <div class="v-cart-item__quantity-crements" @click="increm">+</div>
        </div>
        <button class="v-cart-item__delete" @click="deleteFromCart"><i class="material-icons">remove_circle</i></button>
    
    </div>
</template>
<script>
export default {
    name: 'v-Cart-Item',
    props: {
        cart_item_data: {
            type: Object,
            default() {
                return {
                }
            }
        }
    },
    mounted() {
        this.$set(this.cart_item_data, 'quantity', 1)
    },
    methods: {
        deleteFromCart() {
            this.$emit('deleteFromCart')
            this.cart_item_data.quantity = 1
        },
        increm() {
            this.$emit('increm')

        },
        decrem() {
            this.$emit('decrem')

        }
    },
    data() {
        return {
            cart_data: []
        }
    }
}
</script>
<style lang="scss">
    .v-cart-item {
        display: flex;
        max-width: 1440px;
        justify-content: space-between;
        flex-direction: row;
        align-items: center;
        margin: 40px auto;
        box-shadow: 0 0 15px grey;
        padding: 10px 30px;
        
        &:nth-child(1) {
            margin-top: 100px;
        }
        &__img img {
            max-width: 200px;
        }
        &__delete {
            border: none;
            background: transparent;
            
            & i {
                cursor: pointer;
                font-size: 46px;
            }
        }
        
        &__quantity {
            display: flex;
            align-items: center;
            justify-content: center;

            &-item {
                width: 20px;
                height: 35px;
                display: flex;
                align-items: center;
            }
            &-crements {
                width: 20px;
                height: 35px;
                cursor: pointer;
                font-size: 30px;
                margin: 0 10px;
            }
        }

    }
    // .bounce-leave-active {
    //     animation: bounce-in .5s reverse;
    // }
    // @keyframes bounce-in {
    //     0% {
    //         transition: scale(0);
    //     }
    //     50% {
    //         transition: scale(1.5);
    //     }
    //     100% {
    //         transition: scale(1);
    //     }
    // }
</style>