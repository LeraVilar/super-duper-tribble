<template>
    <div class="v-carusel-item">
        <img :src=" require('../assets/img/' + item_data.img) ">
    </div>
</template>
<script>
export default {
    name: 'v-carusel-item',
    props: {
        item_data: {
            type: Object,
            default: () => []
        }
    }
}
</script>
<style lang="scss">
    .v-carusel-item {
        & img {
            max-width: 1440px;
        }
    }
</style>