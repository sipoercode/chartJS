<!DOCTYPE html>
<html>
	<head>
		<title>HTML | Chart</title>
		<style type="text/css">
			body {
				font-family: roboto;
			}
			table {
				margin: 0px auto;
			}
		</style>
	</head>

	<body>
		<h2><center>Tutorial Grafik</center></h2>

		<?php 

		include "koneksi.php";
		 ?>

		<div style="width: 800px;margin: 0px auto">
			<canvas id="myChart"></canvas>
		</div>

		<br>
		<br>

		<table border="1">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Mahasiswa</th>
					<th>NIM</th>
					<th>Fakultas</th>
				</tr>
			</thead>
			<tbody>
				<?php 

					$no = 1;
					$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
					while($d = mysqli_fetch_array($data)) {

				 ?>

				 <tr>
				 	<td><?php echo $no++; ?></td>
				 	<td><?php echo $d['nama']; ?></td>
				 	<td><?php echo $d['nim']; ?></td>
				 	<td><?php echo $d['fakultas']; ?></td>
				 </tr>

				 <?php 

				}
				  ?>

			</tbody>
		</table>

		<script type="text/javascript" src="Chart.js"></script>

		<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Teknik", "Fisip", "Ekonomi", "Pertanian"],
				datasets: [{
					label: '# of Votes',
					data: [
					<?php 
						$jumlah_teknik = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'teknik'");
						echo mysqli_num_rows($jumlah_teknik);
					 ?>,

					 <?php 
					 	$jumlah_ekonomi = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'ekonomi'");
						echo mysqli_num_rows($jumlah_ekonomi);
					  ?>,

					  <?php 
					 	$jumlah_fisip = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'fisip'");
						echo mysqli_num_rows($jumlah_fisip);
					  ?>,

					  <?php 
					 	$jumlah_pertanian = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE fakultas = 'pertanian'");
						echo mysqli_num_rows($jumlah_pertanian);
					  ?>,

					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
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