<template>
  <div>
    <Navbar/>
    <div v-if="loading">
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Loading..</h1>
    </div>
    <div v-else>
        <h1 class="text-center text-4xl text-black font-medium leading-snug tracking-wider py-6">{{machine.name}}</h1>
        <div v-if="!started" class="mx-auto text-center py-6 px-6">
        <button type="submit" class="cursor-pointer bg-green-600 hover:bg-green-500 shadow-xl px-5 py-2 inline-block text-green-100 hover:text-white rounded">Start job</button>
        </div>
        <div v-else>
        <div class="px-6 py-2">
            <label for="toggle" class="text-xs text-gray-700">PCS</label>
            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
            <input type="checkbox" v-model="isCbm" name="toggle" id="toggle" class="toggle-checkbox outline-none absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
            <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
            <label for="toggle" class="text-xs text-gray-700">CBM</label>
        </div>

        <div class="flex px-6 ">
        <table> 
        <thead>
            <tr>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td class="rounded-t relative -mb-px border p-4 border-grey">Standard norm:</td>
            <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">{{ isCbm ? machine.standard_norm_cbm : machine.standard_norm_pcs }}</td>
            </tr>
            <tr>
            <td class="rounded-t relative -mb-px border p-4 border-grey">Maximum norm:</td>
            <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">{{ isCbm ? machine.max_norm_cbm : machine.max_norm_pcs }}</td>
            </tr>
            <tr>
            <td class="rounded-t relative -mb-px border p-4 border-grey">Minimum norm:</td>
            <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">{{ isCbm ? machine.min_norm_cbm : machine.min_norm_pcs }}</td>
            </tr>
            <tr>
            <td class="relative relative -mb-px border p-4 border-grey">Start time:</td>
            <td class="relative relative -mb-px border p-4 border-grey font-semibold"> 08:00</td>
            </tr>
            <tr>
            <td class="rounded-b relative -mb-px border p-4 border-grey">To do per minute:</td>
            <td class="rounded-b relative -mb-px border p-4 border-grey font-semibold">{{ machine.todo_minute_pcs }}</td>
            </tr>
        </tbody>
        </table>

        <table class="mx-auto text-2xl"> 
        <thead>
        <tr>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Time</th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">To do:</th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Done:</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">{{ currentTimer.tick_time }}</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">{{ isCbm ? currentTimer.to_do_cbm : currentTimer.to_do_pcs }}</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">0</td>
        </tr>
        </tbody>
        </table>
        </div>

        <div class ="flex px-6 py-6">
            <table > 
        <thead>
        <tr>
          <th class="rounded-t relative -mb-px border p-4 border-grey"></th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Start time:</th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Should be done:</th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Tick time:</th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Done vendo:</th>

        </tr>
        </thead>
        <tbody>
        <tr v-for="timer in previousTimers" :key="timer.id">
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">Tick time</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">{{timer.start_time}}</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">{{isCbm ? timer.to_do_cbm : timer.to_do_pcs}}</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">{{timer.tick_time}}</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">0</td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
    </div> <!-- end else -->
  </div>
</template>

<script>
import Navbar from './Navbar';
import axios from 'axios';
export default {
    components : {
            Navbar
        },
    data() {
        return {
            started: null,
            loading: false,
            isCbm : false,
            machine : {},
            previousTimers : {},
            currentTimer : {}
        }
    },
    props : [
        'label'
    ],
    created() {
        this.getMachine(),
        this.getTimers()
    },
    methods : {
        getMachine()
        {
            this.loading = true
            axios.get('/api/' + this.label)
            .then(response=>{
               this.machine = response.data;
            }).catch((error) => {
            if (error.response.status === 404) {
               this.$router.push({ path: '/error' })
            }
            }).finally(() => (this.loading = false)) 
        },
        getTimers()
        {
            axios.get('/api/timer/' + this.label)
            .then(response=>{
               this.previousTimers = response.data.previous_timers;
               this.currentTimer = response.data.current_timer;
               this.started = response.data.started;
            }).catch((error) => {
            if (error.response.status === 404) {
               this.$router.push({ path: '/error' })
            }
            }) 
        }
    }
}
</script>

<style scoped>
/* CHECKBOX TOGGLE SWITCH */
/* @apply rules for documentation, these do not work as inline style */
.toggle-checkbox:checked {
  background-color: right-0 border-green-400;
  right: 0;
  border-color: #4299e1;
}
.toggle-checkbox:checked + .toggle-label {
  background-color: bg-blue-500;
  background-color: #4299e1;
}
</style>
