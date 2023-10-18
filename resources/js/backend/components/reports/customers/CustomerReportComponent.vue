<template>
    <div>
        <Bar :data="data" :options="options" />
    </div>
</template>

  <script>
  import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
  } from 'chart.js'
  import { Bar } from 'vue-chartjs'

  import moment from 'moment';

  import _ from 'lodash';

  ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)

  export default {
    name: 'App',
    components: {
      Bar
    },
    props: {
        customers: {
            type: Array
        }
    },
    created() {
        const data = this.customers;

        let groupedByMonth = _
            .chain(data)
            .groupBy(record => moment(record.created_at).format('MM'))
            .value();

        const _this = this;

        let datasets = [{
            label: "Customer",
            backgroundColor: '#f87979',
            data: []
        }]

        _.forEach(groupedByMonth, function (value, key) {
            const length = value.length;

            _this.data.labels.push(moment(key, 'MM').format('MMMM'));
            datasets[0].data.push(length);
        })

        _this.data.datasets = datasets;

    },
    data() {
      return {
        data: {
          labels: [],
          datasets: []
        },
        options: {
          responsive: true,
          height: "400px"
        }
      }
    }
  }
  </script>
