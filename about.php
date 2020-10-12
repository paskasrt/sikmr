<?php 
	session_start();
	include "kategori.php";
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
						  	<a class="navbar-brand foo" href="#">Indonesia local bookstore</a>
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

			<aside>
				<div class="row">
					<div class="col-md-12">
						<hr><br>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Books For Life</h2>
							</div>
							<div class="panel-body">
								<center><img src="gambar1.jpg" align="center" height="500px" width="900px"></center>
								<br><br>
								<p class="pp">Books For Life adalah situs jual beli buku-buku, seperti Novel Teenlit, Novel Metropop dan beberapa jenis buku-buku lainnya. 
								Pada situs ini <i>customers</i> dapat mencari sendiri buku apa yang ingin dicari dengan menggunakan <i>form search</i>yang disediakan.
								Situs <b>Books For Life</b> ini menyediakan <i>account</i> bagi <i>customers</i> yang memiliki beberapa keuntungan, antara lain 
								mempermudah dalam proses pembelian buku, pemberitahuan notifikasi terkait <i>update</i> buku dan <i>sales</i> yang tersedia. <br></p>
							<h4><b>Thanks for shopping at Books For Life!</b></h4>
							</div>
						</div>
					</div>
				</div>
			</aside>

			<footer>
				<div class="col-md-12">
					<hr>
					<p align="center">Ilmu Komputer/ Informatika 2016</p>
				</div>			
			</footer>
		</div>
	</div>
</body>
</html>