<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Dengan Menggunakan Chart.js - www.malasngoding.com</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
		body{
			font-family: roboto;
		}
	</style>

	<h2>GRAFIK FORMAT</h2><div style="width: 500px;height: 500px">
		<canvas id="myChart"></canvas>
	</div>


	
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Red", "Blue"],
				datasets: [{
					label: '# of Votes',
					data: [ 19, 43],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>
