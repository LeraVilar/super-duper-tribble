<template>
    <div class="category-items">
        <button class="category-card" @click="$emit('click', null)">Все</button>
        <div class="category-card" v-for="(option, index) in options" :key="index" :value="option.value">
            <button class="category-name" @click="$emit('click', option.value)">{{option.name}}</button>
        </div>
    </div>
</template>
<script>

export default {
    props: {
            options: {
                type: Array,
                required: true
            }
        },
}
</script>
<style lang="scss">
    .category-items {
        display: flex;
        width: 100%;
        justify-content: space-evenly;
        margin: 0 auto 50px auto;
    }
</style>