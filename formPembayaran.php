<?php 
	session_start();
	include "kategori.php";
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
					<div class="row">
						<div class="col-md-12">
							<div class="nav-container">
								<ul class="nav nav-justified">
									<li class="active"><a href="index.php"><h5>HOME</h5></a></li>
									<li><a href="books.php"><h5>BOOKS</h5></a></li>
									<li><a href="new.php"><h5>WHAT'S NEW</h5></a></li>
									<li><a href="about.php"><h5>ABOUT</h5></a></li>
									<li><a href="contact.php"><h5>CONTACT</h5></a></li>
								</ul>
							</div>
						</div>
					</div>
				</header>
			</div>
		
			<br><br><h2>Confirm Your Payment</h2>
			<form method="post" action="simpan.php">
			<table >
				<tr>	
					<td>Kode Pembayaran</td>
					<td></td>
					<td>
						<div class="form-group">
							<input class="form-control" size="80" type="text" name="kode_pembayaran">
						</div>
					</td>
				</tr>
				<tr>	
					<td>Nama Akun Bank Anda</td>
					<td></td>
					<td>
						<div class="form-group">
							<input class="form-control" size="80" type="text" name="akun_bank">
						</div>
					</td>
				</tr>
				<tr>
					<td>Email address</td>
					<td></td>
					<td><div class="form-group">
							<input class="form-control" size="80" type="text" name="email">
						</div>
					</td>
				</tr>
				<tr>
					<td>Transfer to</td>
					<td></td>
					<td><div class="form-group">
						<select name="namabank" class="form-control">
							<option value="pilih" selected>--Choose--</option>
							<option value="BRI">BRI</option>
							<option value="BCA">BCA</option>
							<option value="Mandiri">Mandiri</option>
							<option value="BNI">BNI</option>
						</select></div>
					</td>
				</tr>
				<tr>
					<td>Nomor Rekening</td>
					<td></td>
					<td><div class="form-group">
						<input class="form-control" size="80" type="text" name="nomor_rekening">
						</div>
					</td>
				</tr>
				<tr>
					<td>Total Pembayaran (RP)</td>
					<td></td>
					<td>
						<div class="form-group">
							<input class="form-control" size="80" type="text" name="total_pembayaran">
						</div>
					</td>
				</tr>
				<tr>
					<td>Transfer Date</td>
					<td></td>
					<td>
						<div class="form-group">
							<div class="input-group date form_date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input class="form-control" size="80" type="text" name="tgl_bayar"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
								<input type="hidden" id="dtp_input2" value=""/>
						</div>
					</td>
				</tr><br><br>
				<tr>
					<td></td>
					<td>
						<div class="form-group">
							<input type="submit" value="Submit" name="submit" class="btn btn-default"></td>
						</div>
					</td>
				</tr>
			</table>
			</form>		

			<script type="text/javascript" src="bootstrap/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
			<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
			<script type="text/javascript" src="bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
			<script type="text/javascript">
				$('.form_date').datetimepicker({
					language:  'id',
					weekStart: 1,
					todayBtn:  1,
					autoclose: 1,
					todayHighlight: 1,
					startView: 2,
					minView: 2,
					forceParse: 0
				});
			</script>

			<footer>
				<br><br><br><br><br><br><hr>
				<p align="center">Ilmu Komputer/ Informatika 2016</p>
			</footer>
		</div>
	</div>

</body>
</html>