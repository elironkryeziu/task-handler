<template>
    <div>
    <Navbar/>
    <div class="text-base text-grey-darkest font-normal relative">

    <div class="container mx-auto p-8">
        <div class="mx-auto max-w-sm">
            <div class="bg-gray-100 rounded shadow">
                <div class="bg-blue-500 border-b py-8 font-bold text-white text-center text-xl tracking-widest uppercase">
                    REGISTER 
                </div>
                <form  @submit.prevent="register" class="bg-grey-lightest px-10 py-10">

                    <div class="mb-3">
                        <input class="border w-full p-3" v-model="name" name="name" type="name" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3" v-model="email" name="email" type="text" placeholder="E-Mail">
                    </div>
                    
                    <div class="mb-3">
                        <input class="border w-full p-3" v-model="password" name="password" type="password" placeholder="**************">
                    </div>
                    <div class="mb-6">
                        <input class="border w-full p-3" v-model="password_confirmation" name="password_confirmation" type="password" placeholder="**************">
                    </div>
                    <div class="flex">
                      <!-- sm:w-full rounded p-2   -->
                        <button class="bg-blue-500 hover:bg-teal-300 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            Register
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <router-link to="/login" class="font-bold text-primary hover:text-primary-dark no-underline">Already have an account?</router-link>
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
            name: "",
            email: "",
            password: "",
            password_confirmation: ""
        }
    },
    methods : {
        register() {
            axios
                .post(`api/register`, {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
                })
                .then(response => {
                const token = response.data.access_token;
                localStorage.setItem("access_token", token);
                this.$router.push('/login');
                //   console.log(response.message);
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