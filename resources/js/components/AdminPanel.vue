<template>
<div>
    <Navbar/>
  <div class="small">
        <line-chart :chart-data="datacollection"></line-chart>

  </div>
</div>
</template>

<script>
  import LineChart from './LineChart.js'
  import Navbar from './Navbar'; 
  export default {
    components: {
        Navbar,
        LineChart
    },
    data () {
      return {
                datacollection: null

      }
    },
    mounted () {
      this.fillData()
    },
    methods: {
      fillData () {
        this.datacollection = {
          labels: ['08:00 AM','08:10 AM','08:20 AM','08:30 AM','08:40 AM','09:00 AM','09:10 AM','09:20 AM','09:30 AM','09:40 AM',],
          datasets: [
            {
              label: 'Done',
              backgroundColor: '#f87979',
              data: [9,18,25,38,42,59,68,75,88,92]
            }, {
              label: 'To do',
              backgroundColor: '#f84219',
              data: [10,20,30,40,50,60,70,80,90,100]
            },
          ]
        }
      },
      getRandomInt () {
        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
      }
    }
  }
</script>

<style>
  .small {
    max-width: 600px;
    margin:  150px auto;
  }
</style>