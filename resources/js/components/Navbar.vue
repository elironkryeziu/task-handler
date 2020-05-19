<template>
  <div>
    <nav class="font-sans relative select-none shadow-md bg-blue-500 lg:flex lg:items-stretch w-full">
        <div class="flex flex-no-shrink items-stretch h-12">
            <router-link to="/" class="text-2xl no-underline text-white px-6 py-2 font-sans font-bold">Timer!</router-link>
            <button class="block lg:hidden cursor-pointer ml-auto relative w-12 h-12 p-4">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
            </button>
        </div>
        <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
            <div v-if="isLoggedIn" class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                <router-link to="/" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Home</router-link>
                <router-link to="/admin/timers" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Timers</router-link>
                <router-link to="/admin/machines" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Machines</router-link>
                <router-link to="/admin/departments" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Departments</router-link>
                <router-link to="/logout" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Signout</router-link>
            </div>
            <div v-else class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                <router-link to="/" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Home</router-link>
                <router-link to="/login" class="bg-blue-500 px-6 py-3 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">
                Sign in</router-link>
            </div>
        </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        this.checkLoggedIn()
    },
    methods : {
        checkLoggedIn() {
            if(localStorage.getItem("access_token"))
            {
                this.isLoggedIn = true;
            }else{
                this.isLoggedIn = false;
            }
        },
    }

}
</script>

<style>

</style>