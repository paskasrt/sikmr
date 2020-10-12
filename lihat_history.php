<?php 
	session_start();	
?>

<?php
	if(isset($_SESSION['username'])){

		header('location : lihat_history.php');
	}
	require_once("global_database_function.php");
?>

<html>
	<head>
		<title>Payment Confirmation</title>
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  		  <link href="bootstrap/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
	
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="bootstrap/css/style.css" rel="stylesheet" media="screen">
	</head>

	<body>
		<nav class="navbar navbar-default" role="navigation" >
		</nav>

		<?php
			if(!empty((@$_SESSION['username'] ))){
				$email = $_SESSION['username'];

				//ambil id
				$koneksi = mysql_open_connection();
				$query = "SELECT * from pelanggan  where email = '$email'";
				$hasil = mysql_query($query) or die(mysql_error());
				$data = mysql_fetch_array($hasil);

				echo'
					<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
						<div class="container-fluid">
							<div class="navbar-header foo">
							  	<a class="navbar-brand foo" href="#">Indonesia local bookstore</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			  
								<ul class="nav navbar-nav navbar-right ">';
									echo "<li>";
									echo "<a href='#'>Selamat Datang  ".$_SESSION['name']."</a>";
									echo "</li>";
									echo "<li>";	
										echo "<a href='formPembayaran.php'>Konfirmasi Pembayaran</a>";
									echo "</li>";
									echo "<li>";
										echo "<a href = 'lihat_history.php?id=".$data['idpelanggan']."'>History</a>";
									echo "</li>";
									echo "<li>";
										echo "<a href = 'logout.php' class='btn btn-default'>Log Out</a>";
									echo "</li>";
							  	echo '</ul>';
							echo"</div>";
						echo"</div>";
					echo"</nav>";
			}
		?>

		<?php
			if(empty((@$_SESSION['username'] ))){
				echo'
					<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
						<div class="container-fluid">
							<div class="navbar-header">
							  	<a class="navbar-brand foo">Indonesia local bookstore</a>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			  
								<ul class="nav navbar-nav navbar-right">
									<li class="f"><a href="loginbaru.php"><span class="glyphicon glyphicon-user"></span> User Login</a></li>
							  	</ul>		
							  	<div></div>
							</div>
						</div>
					</nav>';
			}
		?>

		<div class="container">
			<div class="row clearfix">

				<div class="col-md-12">
				<header>
					<div class="row">
						<div class="col-md-12">
							<h1><b>Books For Life</b></h1>
							<h4>Buy it, Sell it, Love it</h4><br>
						</div>
					</div>
				</header>
				</div>

				<aside> 
					<hr>
					<div class="row clearfix">
						<div class="col-md-12">
							
							<div class="row">
								<div class="col-md-2"></div>
									<div class="col-md-9">
										<br><h2>History</h2><br>
										<?php
											$idpelanggan = $_GET['id'];//ngambil id dari url
											$koneksi = mysql_open_connection();
											$cek = "select * from penjualan where idpelanggan = '$idpelanggan'";
											$exc = mysql_query($cek);
											$jumlah = mysql_num_rows($exc);

											if (!empty($jumlah)){
												$query = "select penjualan.idpenjualan , barang.nama ,detail_penjualan.qty ,penjualan.nama_kirim , penjualan.status_penjualan 
														 from penjualan , detail_penjualan , barang 
														 where penjualan.idpelanggan = '$idpelanggan'  
														 and penjualan.idpenjualan = detail_penjualan.idpenjualan 
														 and detail_penjualan.idbarang = barang.idbarang";
												$hasil = mysql_query($query) or die(mysql_error());

												echo "<div class='table-responsive'>";
													echo "<table class='table table-striped table-bordered table-condensed'>";
														echo "<thead >";
															echo "<tr class='success'>";
																echo "<th>Penjualan</th>";
																echo "<th>judul buku</th>";
																echo "<th>Kuantitas</th>";
																echo "<th>Nama Penerima</th>";
																echo "<th>Status</th>";
															echo "</tr>";

															echo"<tbody>";
																while($data = mysql_fetch_array($hasil)){
																	echo "<tr class='active'>";
																		echo "<td>".$data['idpenjualan']."</td>";
																		echo "<td>".$data['nama']."</td>";
																		echo "<td>".$data['qty']."</td>";
																		echo "<td>".$data['nama_kirim']."</td>";
																		echo "<td>".$data['status_penjualan']."</td>";
																	echo "<tr>";
																}
															echo"</tbody>";

														echo "</thead>";
													echo "<table>";
												echo "</div>";
											}else{
												echo "<h5 align='center'> Anda belum pernah berbelanja </hs><br><br>
												<a href = 'index.php'>Silahkan berbelanja ...</a>";
											}
										?>
								</div>
						<div class="col-md-2"></div>
					</div>
				</div>
			</div>
			</aside>

			<footer>
				<div class="col-md-12">
					<br /><br /><br /><br /><br />
					<div class="col-md-4"></div>
					<div class="col-md-6"></div>
					<div class="col-md-2"><a href="index.php" class="btn" type="button">Back To Home</a></div>
					<br /><br /><br /><hr>	
					<p align="center">Ilmu Komputer/ Informatika 2016</p>
				</div>
			</footer>

		</div>
	</div>

</body>
</html>