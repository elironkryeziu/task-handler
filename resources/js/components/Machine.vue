<template>
  <div>
      <Navbar/>
  </div>
</template>

<script>
import Navbar from './Navbar';
export default {
    components : {
            Navbar
        },
    props : [
        'label'
    ]

}
</script>

<style>

</style>