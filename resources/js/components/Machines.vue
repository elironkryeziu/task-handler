<template>
<div>
    <Navbar/>
    <div v-if="loading">
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Loading..</h1>
    </div>
    <div v-else class="flex flex-col px-6 py-6">
      <AddorEditMachine/>
    <h1 class="text-3xl mb-10">Machines</h1>
    <div class="py-6">
    <button @click="showAddModal" class="cursor-pointer bg-blue-500 hover:bg-blue-300 px-6 py-2 text-white hover:text-white rounded">Add</button>
    </div>
  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Name
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Maximum Norm (PCS)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Standard Norm (PCS)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Minimum Norm (PCS)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Maximum Norm (CBM)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Standard Norm (CBM)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Minimum Norm (CBM)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Working hours (minutes)
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Tick minutes
            </th>
            <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              No. workers
            </th> -->
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-for="machine in machines" :key="machine.id">
            <td class="px-6 py-4 text-sm leading-5 font-medium text-gray-900">
              {{machine.name}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.max_norm1}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.standard_norm1}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.min_norm1}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.max_norm2}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.standard_norm2}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.min_norm2}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.working_hours}} ({{machine.working_minutes}})
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.tick_minutes}}
            </td>
            <!-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{machine.workers_number}}
            </td> -->
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
              <button @click="showMachineModal(machine)" class="text-blue-500 font-bold hover:text-blue-900">Edit</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</template>

<script>
import Navbar from './Navbar';
import AddorEditMachine from './AddorEditMachine';
export default {components : {
            Navbar,
            AddorEditMachine
        },
     data() {
        return {
            loading: false,
            machines : {},
            }
        },
     created() {
        this.getMachines()
        },
    methods: {
        showAddModal () {
        this.$modal.show('add-machine', { machine: null });
        },
        showMachineModal ($machine) {
        this.$modal.show('add-machine', { machine: $machine });
        },
        hide () {
          this.$modal.hide('add-machine');
        },
        getMachines() {
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
        }

    }
    

}
</script>

<style>

</style>