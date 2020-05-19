<template>
   <modal name="add-machine"
            :width="800"
            :height="700"
            @before-open="beforeOpen">
     <div class="mt-8 p-4">
       <div>
         <div class="font-bold text-gray-600 text-xs leading-8 uppercase h-6 mx-2 mt-3">Machine name</div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full flex-1 mx-2 svelte-1l8159u">
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input placeholder="Machine Name" v-model="inputs.input_name" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
       </div>
       <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Maximum norm (PCS)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number"  v-model="inputs.input_max_norm1" placeholder="Max norm (PCS)" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Standard norm (PCS)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number"  v-model="inputs.input_stand_norm1" placeholder="Standard norm (PCS)" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Minimum norm (PCS)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number" v-model="inputs.input_min_norm1" placeholder="Minimum norm (PCS)" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Maximum norm (CBM)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number"  v-model="inputs.input_max_norm2" placeholder="Max norm (CBM)" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Standard norm (CBM)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number" v-model="inputs.input_stand_norm2" placeholder="Standard norm (CBM)" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Minimum norm (CBM)</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number" v-model="inputs.input_min_norm2" placeholder="Minimum norm (CBM)" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Working hours</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number" v-model="inputs.input_whours" placeholder="Working hours" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Break minutes</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number" v-model="inputs.input_break_min" placeholder="Break minutes" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
                </div>
                <div class="w-full mx-2 flex-1 svelte-1l8159u">
                    <div class="font-bold h-6 mt-3 text-gray-600 text-xs leading-8 uppercase"> Tick minutes</div>
                    <div class="bg-white my-2 p-1 flex border border-gray-200 rounded svelte-1l8159u">
                        <input type="number" v-model="inputs.input_tick_min" placeholder="Tick minutes" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"> </div>
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
                input_name : "",
                input_max_norm1: null,
                input_stand_norm1: null,
                input_min_norm1: null,
                input_max_norm2: null,
                input_stand_norm2: null,
                input_min_norm2: null,
                input_whours: null,
                input_break_min: null,
                input_tick_min: null,
            }
        }
    },
    methods: {
        beforeOpen (event) {  
            this.clearInputs();
            this.isEdit = false;  
            if(event.params.machine !== null)
            {
                this.isEdit = true;  
                this.inputs.input_id = event.params.machine.id;
                this.inputs.input_name = event.params.machine.name;
                this.inputs.input_max_norm1 = event.params.machine.max_norm1;
                this.inputs.input_stand_norm1 = event.params.machine.standard_norm1;
                this.inputs.input_min_norm1 = event.params.machine.min_norm1;
                this.inputs.input_max_norm2 = event.params.machine.max_norm2;
                this.inputs.input_stand_norm2 = event.params.machine.standard_norm2;
                this.inputs.input_min_norm2 = event.params.machine.min_norm2;
                this.inputs.input_whours = event.params.machine.working_hours;
                this.inputs.input_break_min = event.params.machine.working_minutes;
                this.inputs.input_tick_min = event.params.machine.tick_minutes;
            }
        },
        clearInputs () {
            this.inputs.input_id = null;
            this.inputs.input_name = "";
            this.inputs.input_max_norm1 = null;
            this.inputs.input_stand_norm1 = null;
            this.inputs.input_min_norm1 = null;
            this.inputs.input_max_norm2 = null;
            this.inputs.input_stand_norm2 = null;
            this.inputs.input_min_norm2 = null;
            this.inputs.input_whours = null;
            this.inputs.input_break_min = null;
            this.inputs.input_tick_min = null;
        },
        addRecord () {

        },
        editRecord () {
            axios.defaults.headers.common["Authorization"] =
            "Bearer " + localStorage.getItem("access_token");
            axios
            .put(`${process.env.MIX_CLIENT_API}/machine/${this.inputs.input_id}`, {
                name : this.inputs.input_name,
                max_norm1 : this.inputs.input_max_norm1,
                standard_norm1 : this.inputs.input_stand_norm1,
                min_norm1 : this.inputs.input_min_norm1,
                max_norm2 : this.inputs.input_max_norm2,
                standard_norm2 : this.inputs.input_stand_norm2,
                min_norm2 : this.inputs.input_min_norm2,
                working_hours : this.inputs.input_whours,
                break_minutes : this.inputs.input_break_min,
                tick_minutes : this.inputs.input_tick_min
            })
            .then(
                // console.log("Updated")
                this.$modal.hide('add-machine'),
                window.location.reload()
            )
            .catch(error => console.log(error));
        },
        deleteRecord () {
            
        }

    }

}
</script>

<style>

</style>