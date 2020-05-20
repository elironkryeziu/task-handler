<template>
    <div>
        <Navbar/>
        <div v-if="loading">
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Loading..</h1>
        </div>
        <div v-else>
        <div class="flex">
        <div class="py-6 px-6 w-auto">
            <label class="font-bold mb-1 text-gray-700 block">Choose machine:</label>
        <select @change="getData" v-model="label" class="border rounded border-gray-300 w-48 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
            <option placeholder="Select machine" v-for="machine in machines" :value="machine.label" :key="machine.id">{{machine.name}}</option>
        </select>
        </div>
        <div class="py-6 px-6 w-48">
            <label class="font-bold mb-1 text-gray-700 block">Select Date:</label>
                <vc-date-picker
                class="h-10"
                v-model="date"
                is-dark
                :first-day-of-week="2"
                :masks="{ title: 'MMM YYYY', L: 'DD-MM-YYYY'}"
                @input="getData"
                />
        </div>
        <!-- <div class="py-6 px-6">
            <label class="font-bold mb-1 text-gray-700 block">Standard norm</label>
            <span>1200</span>
        </div> -->
        </div>
        <div class="px-6">
        <div class="px-6 py-3 overflow-x-auto sm:-mx-6">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
            <thead>
            <tr>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">

                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Start time
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    To do (PCS)
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    To do (CBM)
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Tick time
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Shift
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Done (Vendo)
                </th>
                <!-- pjesa e edit -->
                <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> -->
            </tr>
            </thead>
            <tbody class="bg-white">
            <tr v-for="timer in timers" :key="timer.id">
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900 font-semibold">
                Tick time
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                {{timer.start_time | timeformat}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                {{timer.to_do_pcs}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                {{timer.to_do_cbm}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                {{timer.tick_time | timeformat}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                {{timer.shift}}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                {{timer.done}}
                </td>

                <!-- <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                <button @click="showDepartmentModal(department)" class="text-blue-500 font-bold hover:text-blue-900">Edit</button>
                </td> -->
            </tr>
            </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
    </div>
</template>

<script>
import Navbar from './Navbar';
import moment from 'moment'
export default {
    components : {
        Navbar
        },
    data() {
        return {
            label: 'selco',
            date: new Date(),
            loading: false,
            machines: {},
            timers: {}
            }
        },
    created() {
         this.getMachines()
        },
    methods: {
        getMachines() 
        {
            this.loading = true
            axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("access_token");
            axios.get('/api/machines')
            .then(response=>{
               this.machines = response.data;
            }).catch((error) => {
            if (error.response.status === 404) {
               this.$router.push({ path: '/error' })
            }
            }).finally(() => (this.loading = false)) 
        },
        getData () 
        {
            // console.log(moment(this.date).format('YYYY-MM-DD'));
            // console.log(this.label);
            // axios.defaults.headers.common["Authorization"] =
            // "Bearer " + localStorage.getItem("access_token");
            axios.get(`/api/timer/${this.label}?date=${moment(this.date).format('YYYY-MM-DD')}`)
            .then(response=>{
               this.timers = response.data;
               console.log(this.timers);
            }).catch((error) => {
            if (error.response.status === 404) {
               this.$router.push({ path: '/error' })
            }
            }).finally(() => (this.loading = false)) 
        }

    }

}
</script>

<style scoped>

</style>