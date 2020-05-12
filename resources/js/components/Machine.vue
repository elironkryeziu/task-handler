<template>
  <div>
    <Navbar/>
    <div v-if="loading">
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Loading..</h1>
    </div>
    <div v-else>
        <h1 class="text-center text-4xl text-black font-medium leading-snug tracking-wider py-6">{{machine.name}}</h1>
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
            <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">{{machine.norm1}}</td>
            </tr>
            <tr>
            <td class="relative relative -mb-px border p-4 border-grey">Start time:</td>
            <td class="relative relative -mb-px border p-4 border-grey font-semibold">08:00 AM</td>
            </tr>
            <tr>
            <td class="rounded-b relative -mb-px border p-4 border-grey">To do per minute:</td>
            <td class="rounded-b relative -mb-px border p-4 border-grey font-semibold">10</td>
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
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">08:00</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">1221</td>
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
          <th class="rounded-t relative -mb-px border p-4 border-grey">Time:</th>
          <th class="rounded-t relative -mb-px border p-4 border-grey">Should be done:</th>
                    <th class="rounded-t relative -mb-px border p-4 border-grey">Done vendo:</th>

        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">Tick time</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">08:00</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">10</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">0</td>
        </tr>
        <tr>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">Tick time</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">08:10</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">20</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">0</td>
        </tr>
        <tr>
        <td class="rounded-t relative -mb-px border p-4 border-grey font-semibold">Tick time</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">08:20</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">30</td>
        <td class="rounded-t relative -mb-px border p-4 border-grey">0</td>
        </tr>
        </tbody>
        </table>

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
            loading: false,
            machine : {},
        }
    },
    props : [
        'label'
    ],
    created() {
        this.getMachine()
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
        }
    }
}
</script>
