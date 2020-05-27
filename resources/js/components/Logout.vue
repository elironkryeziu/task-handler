<template>
  <div>
      <Navbar/>
    <div>
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Logging out..</h1>
    </div>
  </div>
</template>

<script>
import Navbar from './Navbar';
export default {
    components : {
            Navbar
    },
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