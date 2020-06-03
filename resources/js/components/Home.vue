<template>
    <div>
    <Navbar/>
    <div class="flex items-center justify-center px-6">
        <div>
        <h1 class="py-4 text-lg">Please choose one of the machines:</h1>
        <div v-if="loading">
            <vue-loading type="spin" color="#4299e1" :size="{ width: '50px', height: '50px' }"></vue-loading>    
        </div>
        <div v-else class="grid grid-cols-6">
            <router-link v-for="machine in machines" :key="machine.id" :to="machine.label" tag="button" class="bg-transparen hover:bg-blue-300 text-xl text-blue-500 font-semibold mr-2 mb-2 hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{machine.name}}</router-link>        
        </div>
        </div>

    </div>
    </div>
        
    
</template>

<script>
import Navbar from './Navbar';
import { VueLoading } from 'vue-loading-template';
    export default {
        components : {
            Navbar,
            VueLoading
        },
        data() {
            return {
                loading: false,
                machines: {},
            }
        },
        created () {
            this.getMachines()
        },
        methods: {
            getMachines() {
                this.loading = true;
                axios.get('/api/machines')
                .then(response=>{
                this.machines = response.data;
                }).catch((error) => {
                    if (error.response.status === 404) {
                    this.$router.push({ path: '/error' })
                    }
                }).finally(() => (this.loading = false)) 
            }

        }
    }
</script>
