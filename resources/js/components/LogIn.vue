<template>
    <div>
    <Navbar/>
    <div class="text-base text-grey-darkest font-normal relative">

    <div class="container mx-auto p-8">
        <div class="mx-auto max-w-sm">
            <div class="bg-gray-100 rounded shadow">
                <div class="bg-blue-500 border-b py-8 font-bold text-white text-center text-xl tracking-widest uppercase">
                    WELCOME 
                </div>

                <form @submit.prevent="login" class="bg-grey px-10 py-10">

                    <div class="mb-3">
                        <input class="border w-full p-3" v-model="email" name="email" type="text" placeholder="E-Mail">
                    </div>
                    
                    <div class="mb-3">
                        <input class="border w-full p-3" v-model="password" name="password" type="password" placeholder="**************">
                    </div>
                    <div class="flex">
                      <!-- sm:w-full rounded p-2   -->
                        <button class="bg-blue-500 hover:bg-blue-400 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            Login
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <router-link to="/register" class="font-bold text-primary hover:text-primary-dark no-underline">Don't have an account?</router-link>
                        <router-link to="/#" class="text-grey-darkest hover:text-black no-underline">Forgot Password?</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            email: "",
            password: ""    
        }
    },
    methods : {
        login() {
            if(this.email == "" || this.password == "")
            {

            }else
            {
                axios
                .post(`api/login`, {
                email: this.email,
                password: this.password
                })
                .then(response => {
                const token = response.data.access_token;
                localStorage.setItem("access_token", token);
                this.$router.push('/');
                //   console.log(response.message);
                })
                .catch(error => {
                console.log(error);
                });
            }
        

        }
    }
}
</script>

<style>

</style>