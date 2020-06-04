<template>
  <header class="bg-blue-500 sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
    <div class="flex items-center justify-between sm:p-0">
      <div>
        <!-- <router-link to="/" class="text-2xl no-underline text-white px-3 py-2 font-sans font-bold">Timer!</router-link> -->
      <a href="/"><img src="/storage/HC.png" class="w-40 px-3 h-10" alt="logo" /></a>
      </div>
      <div class="sm:hidden">
        <button @click="isOpen = !isOpen" type="button" class="block text-white hover:text-gray-500 focus:text-gray-500 focus:outline-none">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
            <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
          </svg>
        </button>
      </div>
    </div>
    <div v-if="isLoggedIn">
    <nav :class="isOpen ? 'block' : 'hidden'" class="px-2 pt-2 pb-4 sm:flex sm:p-0">
      <router-link to="/" class="block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700">HOME</router-link>
      <router-link to="/admin/timers" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700 sm:mt-0 sm:ml-2">TIMERS</router-link>
      <router-link to="/admin/machines" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700 sm:mt-0 sm:ml-2">MACHINES</router-link>
      <router-link to="/admin/departments"  class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700 sm:mt-0 sm:ml-2">DEPARTMENTS</router-link>
      <router-link to="/logout" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700 sm:mt-0 sm:ml-2">LOG OUT</router-link>
    </nav>
    </div>
    <div v-else>
        <nav :class="isOpen ? 'block' : 'hidden'" class="px-2 pt-2 pb-4 sm:flex sm:p-0">
        <router-link to="/" class="block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700">HOME</router-link>
        <router-link to="/logout" class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-blue-700 sm:mt-0 sm:ml-2">LOG IN</router-link>
        </nav>
    </div>

  </header>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false,
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