<?php
include "global_database_function.php";
?>

<html>
<head>
	<title>Books For Life</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
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
							<ul class="nav navbar-nav navbar-right">';
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
				<hr>
			</div>

			<aside>
				<?php
					$con= mysql_open_connection();

						$kodepembayaran = $_POST['kode_pembayaran'];
						$nama = $_POST['akun_bank'];
						$tgl_bayar = $_POST['tgl_bayar'];
						$namabank = $_POST['namabank'];
						$no_rekening = $_POST['nomor_rekening'];
						$total_bayar = $_POST['total_pembayaran'];
						
						$query1= "select idpenjualan from penjualan where kode_unik = '$kodepembayaran'";
						$exc = mysql_query($query1) or die (mysql_error());
						$row = mysql_fetch_array($exc);
						$idpenjualan = $row['idpenjualan'];
						
						$query = "INSERT INTO konfirm_pembayaran (`idpenjualan`, `nama_bank`, `no_rekening`, `nama`, `total_bayar`, `tgl_bayar`) 
								VALUES ('$idpenjualan', '$namabank', '$no_rekening', '$nama', '$total_bayar', '$tgl_bayar')";
						$hasil = mysql_query($query) or die(mysql_error());
						if ($hasil){
							$query3 = "UPDATE penjualan SET status_penjualan ='Paid' where idpenjualan= '$idpenjualan' ";
							$exc = mysql_query($query3) or die (mysql_error());
							
							echo "<div class='col-md-2'></div>";
							echo "<div class='col-md-8'>";
								echo "<h5> Pengiriman anda akan segera di proses</h5>";
								echo "<br/><a href = 'index.php'>Silahkan kembali ke halaman utama </a>";
							echo "</div>";
							echo "</div>";
							echo "<div class='col-md-2'></div>";
						}
					?>
			</aside>

			<footer>
				<div class="col-md-12">
					<br><br><br><hr>
					<p align="center">Ilmu Komputer/ Informatika 2016</p>
				</div>			
			</footer>
			
		</div>
	</div>
</body>
</html>