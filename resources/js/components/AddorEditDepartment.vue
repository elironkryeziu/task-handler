<template>
    <modal name="add-department"
            :width="800"
            :height="700"
            @before-open="beforeOpen">
            <div class="mt-8 p-4">
       <div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Department number</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="text"  v-model="inputs.input_number" placeholder="Department number" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Department name</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="text"  v-model="inputs.input_name" placeholder="Department name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
            </div>
       <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Start (Shift 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_shift_1_start" placeholder="Shift 1 start" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Start (Break 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_break_1_start" placeholder="Break 1 start" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> End (Break 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_break_1_end" placeholder="Break 1 end" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> End (Shift 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_shift_1_end" placeholder="Shift 1 end" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Start (Shift 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_shift_2_start" placeholder="Shift 2 start" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Start (Break 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_break_2_start" placeholder="Break 2 start" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> End (Break 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_break_2_end" placeholder="Break 2 end" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> End (Shift 1)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="time"  v-model="inputs.input_shift_2_end" placeholder="Shift 2 end" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
            </div>
     </div>
     <div v-if="isEdit" class="flex p-2 mt-4">
     <input type="button" class="cursor-pointer bg-red-600 hover:bg-red-500 shadow-xl px-5 py-2 inline-block text-orange-100 hover:text-white rounded" value="Delete">
     <div class="flex-auto flex flex-row-reverse">
          <button @click="editRecord" class="cursor-pointer bg-blue-600 hover:bg-blue-500 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded">Edit</button>
     </div>
     </div>
     <div v-else class="flex p-2 mt-4">
     <div class="flex-auto flex flex-row-reverse">
          <button class="cursor-pointer bg-blue-600 hover:bg-blue-500 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded">Add</button>
     </div>
     </div>
     </div>  
    </modal>
  
</template>

<script>
export default {
    data() {
        return {
            isEdit: true,
            inputs: {
                input_id: null,    
                input_number: null, 
                input_name: "",
                input_shift_1_start: null,
                input_break_1_start: null,
                input_break_1_end: null,
                input_shift_1_end: null,
                input_shift_2_start: null,
                input_break_2_start: null,
                input_break_2_end: null,
                input_shift_2_end: null,
            }
        }
    },
    methods: {
        beforeOpen (event) {  
            this.clearInputs();
            this.isEdit = false;  
            if(event.params.department !== null)
            {
                this.isEdit = true;  
                this.inputs.input_id = event.params.department.id;
                this.inputs.input_name = event.params.department.name;
                this.inputs.input_shift_1_start = event.params.department.shift_1_start;
                this.inputs.input_break_1_start = event.params.department.break_1_start;
                this.inputs.input_break_1_end = event.params.department.break_1_end;
                this.inputs.input_shift_1_end = event.params.department.shift_1_end;
                this.inputs.input_shift_2_start = event.params.department.shift_2_start;
                this.inputs.input_break_2_start = event.params.department.break_2_start;
                this.inputs.input_break_2_end = event.params.department.break_2_end;
                this.inputs.input_shift_2_end = event.params.department.shift_2_end;
            }
        },
        clearInputs () {
            this.inputs.input_id = null;
            this.inputs.input_name = "";
            this.inputs.input_shift_1_start = null;
            this.inputs.input_break_1_start = null;
            this.inputs.input_break_1_end = null;
            this.inputs.input_shift_1_end = null;
            this.inputs.input_shift_2_start = null;
            this.inputs.input_break_2_start = null;
            this.inputs.input_break_2_end = null;
            this.inputs.input_shift_2_end = null;
        },
        addRecord () {

        },
        editRecord () {
            axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("access_token");
            axios
            .put(`${process.env.MIX_CLIENT_API}/department/${this.inputs.input_id}`, {
                name : this.inputs.input_name,
                shift_1_start: this.inputs.input_shift_1_start,
                break_1_start: this.inputs.input_break_1_start,
                break_1_end: this.inputs.input_break_1_end,
                shift_1_end: this.inputs.input_shift_1_end,
                shift_2_start: this.inputs.input_shift_2_start,
                break_2_start: this.inputs.input_break_2_start,
                break_2_end: this.inputs.input_break_2_end,
                shift_2_end: this.inputs.input_shift_2_end
            })
            .then(
                this.$modal.hide('add-department'),
                window.location.reload()
            )
            .catch(error => console.log(error));
        },
        deleteRecord () {
            
        }

    }

}
</script>
