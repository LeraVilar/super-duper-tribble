<template>
<div>
<h1>Наши партнеры</h1>
    <div class="v-slick">
    
        <VueSlickCarousel v-bind="settings">
            <img class="qwe" src="../assets/img/pa.jpg">
            <img class="qwe" src="../assets/img/1.jpg">
            <img class="qwe" src="../assets/img/2.jpg">
            <img class="qwe" src="../assets/img/3.jpg">
            <img class="qwe" src="../assets/img/pa.jpg">
            <img class="qwe" src="../assets/img/1.jpg">
            <img class="qwe" src="../assets/img/2.jpg">
            <img class="qwe" src="../assets/img/3.jpg">
        </VueSlickCarousel>
    </div>
</div>
</template>
<script>

import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'


export default {
    name: 'vSlick2',
    components: { VueSlickCarousel },
    data() {
      return {
        settings: {
          arrows: false,
          dots: false,
          autoplay: true,
          autoplaySpeed: 3000,
          slidesToShow: 5,
          slidesToScroll: 3,
          touchThreshold: 3
        }
}
    }
}
</script>
<style lang="scss" scoped>
    h1 {
        text-align: center;
    }
    .v-slick {
        max-width: 1440px;
        margin: 55px auto;
        height: 200px;
        border: 3px solid green;
        border-radius: 20px;
        padding: 5px;
        & img {
            height: 185px;
        }
    }
    .slick-slider {
        width: 100%;
        height: 195px;
    }
    .slick-slide, .slick-active {
        margin: 0 15px;
        padding: 0 30px;
    }
    .slick-list {
        width: 100%;
        margin: 0 auto;
    }
</style>