<template>
    <div class="wrapper">
        <div class="v-carusel"
        :style="{ 'margin-left': '-' + (100 * SlideIndex) + '%' }">
            <v-carusel-item
                v-for="item in carusel_data"
                :key="item.id"
                :item_data="item"
                
            />
        </div>
        <i @click="Prev" class="material-icons" id="arrowprev">keyboard_arrow_left</i>
        <i @click="Next" class="material-icons" id="arrownext">keyboard_arrow_right</i>
    </div>
</template>
<script>
import vCaruselItem from './v-carusel-item.vue'

export default {
  components: {
       vCaruselItem
    },
    name: 'v-carusel',
    props: {
        carusel_data: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            SlideIndex: 0
        }
    },
    methods: {
        Prev() {
            if (this.SlideIndex > 0) {
            this.SlideIndex--
            }
        },
        Next() {
            if (this.SlideIndex >= this.carusel_data.length - 1) {
            this.SlideIndex = 0
            }else {
                this.SlideIndex++
            }
            
        }
    }
}
</script>
<style lang="scss">
    .wrapper {
        width: 900px;
        height: 400px;
        margin: 100px 12%;
        overflow: hidden;
    }
    .v-carusel {
        display: flex;
        width: 100%;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1) .5s;
    }
    #arrowprev {
        position: absolute;
        left: 100px;
        font-size: 64px;
        top: 600px;
    }
    #arrownext {
        position: absolute;
        right: 100px;
        font-size: 64px;
        top: 600px;
    }
</style>