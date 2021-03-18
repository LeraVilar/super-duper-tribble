<template>
    <div class="v-menu-upper">
        <div class="v-menu-upper__items">
            <div class="v-menu-upper__itemsofitem">
            <div class="v-menu-upper__item"><router-link to="/">Главная</router-link></div>
            <div class="v-menu-upper__item"><router-link to="/">Что-то</router-link></div>
            <router-link :to="{name: 'mainpage'}">
            <div class="v-menu-upper__main-logo"><img src="../assets/img/logo.png" alt="logo"></div>
            </router-link>
            <div class="v-menu-upper__item"><router-link to="/">Контакты</router-link></div>
            <div class="v-menu-upper__item"><router-link to="/">О нас</router-link></div>
        </div>
        </div>
    </div>
</template>
<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
export default {
    name: "v-menu-upper",
    components: {

    },
    data() {
        return {}
    }
}
</script>
<style lang="scss">
    .v-menu-upper {
        background:#FFF;
        position: relative;
        &__itemsofitem {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            font-size: 30px;
        }
        &__items {
            max-width: 1440px;
            margin: 0 auto;
            align-items: center;
        }
        &__main-logo {
            width: 100%;
            height: 100%;
            padding: 15px 0 0 0;
            background: #064717;
        }
    }
</style>