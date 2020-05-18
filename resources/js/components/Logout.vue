<template>
  <div></div>
</template>

<script>
export default {
    created(){
        this.logout()
    },
    methods: {
        logout() {
             axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("access_token");
            axios
            .post(`api/logout`)
            .then(response => {
                localStorage.removeItem("access_token");
                console.log(response);
                this.$router.push('/');
            })
            .catch(error => {
                console.log("ERROR");
            console.log(error);
            });
        }
    }

}
</script>

<style>

</style>