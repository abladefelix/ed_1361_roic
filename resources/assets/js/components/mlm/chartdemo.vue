<script>
	import { Doughnut } from 'vue-chartjs';

	export default{
		extends: Doughnut,

		mounted() {
			this.renderChart({
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			      datasets: [
			        {
			          label: 'ROIC Chart',
			          backgroundColor: '#f87979',
			          data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
			        }
			      ]
			})
		}
	}
</script>