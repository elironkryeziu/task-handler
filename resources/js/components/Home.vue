<template>
    <div>
    <Navbar/>
    <div class="flex items-center justify-center px-6">
        <div>
        <h1 class="py-4 text-lg">Please choose one of the machines:</h1>
        <div class="grid grid-cols-6">
            <router-link v-for="machine in machines" :key="machine.id" :to="machine.label" tag="button" class="bg-transparen hover:bg-blue-300 text-xl text-blue-500 font-semibold mr-2 mb-2 hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{machine.name}}</router-link>        
        </div>
        </div>

    </div>
    </div>
        
    
</template>

<script>
import Navbar from './Navbar';
    export default {
        components : {
            Navbar
        },
        data() {
            return {
                machines : [
                    {name : "SELCO",label : "selco" },
                    {name : "PRESS",label : "press" },
                    {name : "BIESSE SB",label : "biesse-sb" },
                    {name : "BIESSE B1",label : "biesse-b1" },
                    {name : "AKRON",label : "akron" },
                    {name : "SKIPER",label : "skiper" },
                    {name : "BIESSE FDT",label : "biesse-fdt" },
                    {name : "SAW",label : "saw" },
                    {name : "FREZARKI",label : "frezarki" },
                    {name : "DOLNOWRZECIONÓWKI",label : "dolnowrzecionowki" },
                    {name : "UKOSIARKI",label : "ukosiarki" },
                    {name : "OKUCIA",label : "okucia" },
                    {name : "PACKING",label : "packing" },
                    {name : "KARTONY",label : "kartony" },
                    {name : "MONTAŻ",label : "montaz" },
                ]
            }
        }
    }
</script>
