<template>
    <div>
        <v-slick />
        <v-catalog/>
        <v-slick-2/>
    </div>
</template>
<script>

import VCatalog from './v-catalog.vue'
import VSlick from './v-slick.vue'
import VSlick2 from './v-slick2.vue'
export default {
  components: {
    VCatalog,
    VSlick,
    VSlick2
  
  },
}
</script>
<style lang="scss">
    
</style>