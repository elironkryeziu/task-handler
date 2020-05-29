<template>
<div>
    <router-view></router-view>
    <notifications 
        group="info" 
        position="bottom right" />
    <notifications 
        group="error" 
        position="top center"
        classes="p-4 m-4 text-red-500 shadow text-md-12 " />
</div>
</template>

<script>
export default {
    name: "App"
}
</script>

<style scoped>
.error-style {
  padding: 10px;
  margin: 0 5px 5px;

  font-size: 12px;

    color: #ffffff;
  /* background: #44A4FC;
  border-left: 5px solid #187FE7; */
    background: #E54D42;
    border-left-color: #B82E24;

  /* &.warn {
    background: #ffb648;
    border-left-color: #f48a06;
  }

  &.error {
    background: #E54D42;
    border-left-color: #B82E24;
  }

  &.success {
    background: #68CD86;
    border-left-color: #42A85F;
  } */
}

</style>