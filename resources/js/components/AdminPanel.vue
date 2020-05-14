<template>
<div>
    <Navbar></Navbar>
    <h1>Admin Panel</h1>
</div>
</template>

<script>
import Navbar from './Navbar';
export default {
    components : {
            Navbar
        },
    data() {
        return {
            user: {}
        }
    },
    created() {
        this.getUser()
    },
    methods : {
        getUser () {
            axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("access_token");
            axios
            .get(`api/user`)
            .then(response => {
                  this.user = response.data
            })
            .catch(error => {
            console.log(error);
            });
        }
        

    }

}
</script>

<style>

</style>