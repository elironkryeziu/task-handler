<template>
<div>
    <Navbar/>
    <div v-if="loading">
          <h1 class="text-center text-black font-medium leading-snug tracking-wider">Loading..</h1>
    </div>
    <div v-else class="flex flex-col px-6 py-6">
      <AddorEditDepartment/>
    <h1 class="text-3xl mb-10">Departments</h1>
    <div class="py-6">
    <button @click="showAddModal" class="cursor-pointer bg-blue-500 hover:bg-blue-300 px-6 py-2 text-white hover:text-white rounded">Add</button>
    </div>
  <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
      <table class="min-w-full">
        <thead>
          <tr>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Number
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Name
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 1:Start
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 1:Break
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 1:Break finish
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 1:End
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 2:Start
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 2:Break
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 2:Break finish
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
              Shift 2:End
            </th>
            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr v-for="department in departments" :key="department.id">
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.number}}
            </td>
            <td class="px-6 py-4 text-sm leading-5 font-medium text-gray-900">
              {{department.name}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.shift_1_start}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
             {{department.break_1_start}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.break_1_end}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.shift_1_end}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.shift_2_start}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
             {{department.break_2_start}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.break_2_end}}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
              {{department.shift_2_end}}
            </td>
            
            
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
              <!-- <a href="#" class="text-blue-500 hover:text-blue-900">Edit</a> -->
              <button @click="showDepartmentModal(department)" class="text-blue-500 font-bold hover:text-blue-900">Edit</button>

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
import AddorEditDepartment from './AddorEditDepartment';
export default {
    components : {
            Navbar,
            AddorEditDepartment
        },
     data() {
        return {
            loading: false,
            departments : {},
            }
        },
     created() {
        this.getDepartments()
        },
    methods: {
        showAddModal () {
          this.$modal.show('add-department', { department: null });
        },
        showDepartmentModal ($department) {
          this.$modal.show('add-department', { department: $department });
        },
        hide () {
          this.$modal.hide('add-department');
        },
        getDepartments() {
            this.loading = true
            axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("access_token");
            axios.get('/api/departments')
            .then(response=>{
               this.departments = response.data;
            }).catch((error) => {
            if (error.response.status === 404) {
               this.$router.push({ path: '/error' })
            }
            }).finally(() => (this.loading = false));
 
        }
    }
}
</script>

<style>

</style>