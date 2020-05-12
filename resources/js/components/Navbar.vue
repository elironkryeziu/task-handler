<template>
  <div>
        <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
        <div class="mb-2 sm:mb-0 inner">
        <!-- <a href="/" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">Timer!</a><br> -->
        <router-link to="/" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">
                Timer! </router-link> 
        </div>

        <div class="sm:mb-0 self-center">
            <a href="/login">
            <button class="bg-blue-500 hover:bg-blue-300 w-full p-2 text-sm text-white uppercase font-bold tracking-wider">Sign in</button>
            </a>
        </div>
        </nav>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>