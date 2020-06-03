<template>
  <div>
       <h2>bars</h2>
       <vue-loading type="spin" color="#4299e1" :size="{ width: '50px', height: '50px' }"></vue-loading>    
    </div>
</template>

<script>
import { VueLoading } from 'vue-loading-template'

export default {
   components: {
      VueLoading
    }

}
</script>

<style>

</style>