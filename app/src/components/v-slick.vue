<template>
<div class="wrapper">
    <div class="v-slick">
        <VueSlickCarousel v-bind="settings">
            <img src="../assets/img/Strybol.jpg">
            <img src="../assets/img/2.jpg">
            <img src="../assets/img/3.jpg">
            <img src="../assets/img/4.jpg">
        </VueSlickCarousel>
    </div>
    <div class="v-other-slide">
        <div class="v"><img src="../assets/img/kredit.jpg" alt=""></div>
        <div class="v"><img src="../assets/img/tradein.jpg" alt=""></div>
    </div>
</div>
</template>
<script>

import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'


export default {
    name: 'MyComponent',
    components: { VueSlickCarousel },
    data() {
      return {
        settings: {
          arrows: false,
          dots: true,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 3000,
          fade: true,
        }
}
    }
}
</script>
<style lang="scss">
    .wrapper {
        display: flex;
        justify-content: space-between;
        max-width: 1440px;
        margin: 50px auto;
    }
    .v-slick {
        width: 100%;
    }
    .v-other-slide {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .v {
        width: 400px;
        height: 180px;
        @media screen and (max-width: 1440px) {
            display: none;
        }
        & img {
            width: inherit;
            height: inherit;
        }
    }
    .v-slick {
        display: flex;
        
    }
    .slick-dots li button:before {
        font-size: 14px;
    }
    .slick-slider, .slick-slide {
        width: 1000px;
        max-height: 400px;
        & img {
            width: 100%;
        }
        @media screen and (max-width: 1440px) {
            width: 100%;
        }
    }

</style>