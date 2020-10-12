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
    <link href="bootstrap/css/bsdocs.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="bootstrap/plugins/flexslider.css" type="text/css" media="screen" />
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- PLUGINS -->
	<script defer src="bootstrap/plugins/jquery.flexslider-min.js"></script>
	<script src="bootstrap/plugins/jquery.easing.js"></script>
	<script src="bootstrap/plugins/jquery.mousewheel.js"></script>
	
	 <script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation	: "slide",
			controlNav	: false,
			start		: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
    </script>
	
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
					
					<div class="row">
						<div class="col-xs-12">
							<section class="slider">
								<div class="flexslider">
								  <ul class="slides">
									<li data-thumb="1.jpg">
										<img src="1.jpg" />
										</li>
										<li data-thumb="2.jpg">
										<img src="2.jpg" />
										</li>
										<li data-thumb="3.jpg">
										<img src="3.jpg" />
										<li data-thumb="4.jpg">
										<img src="4.jpg" />
										</li>
								  </ul>
								</div>
							</section>
						</div>
					</div>
					<hr>
				</header>	
			</div>
		
			<aside>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-8">
							<?php
								/*	panggil fungsi tampil_data() */
								//tampil_data();
								echo "<h5 class='h55'>Buku Terbaru</h5>";
								tampil_buku_terbaru();
																
								echo "<h5 class='h55'>Metropop</h5>";
								tampil_metropop();
								$idkategori = 101;
								echo "<br /><a href = 'viewbooks.php?id=".$idkategori."'><h6>Lihat Selengkapnya</h6></a><br/><br/>";


								echo "<h5 class='h55'>Teenlit</h5>";
								tampil_teenlit();
								$idkategori = 100;
								echo "<br /><a href = 'viewbooks.php?id=".$idkategori."'><h6>Lihat Selengkapnya</h6></a><br/><br/>";
							?>
						</div>
						
						<div class="col-md-4 column">
							<br>
							<div class="list-group">
								 <a href="#" class="list-group-item active">Search</a>
								<div class="list-group-item">
									<form role="search" action = "search_buku.php" method = "POST">
										<div class="form-group">
											<input type = "text" class="form-control" name = "judul" placeholder = "Masukkan judul buku" size="40"> 
										</div>
										<input type = "submit" name = "cari" class="btn btn-default">
									</form>
								</div>
							</div>
						</div>
						
						<div class="col-md-4 column">
							<div class="list-group">
								 <a href="#" class="list-group-item active">Category</a>
								<div class="list-group-item">
									<a href="#">Novel</a>
								</div>
								<div class="list-group-item">
									<a href="#">Biographies</a>
								</div>
								<div class="list-group-item">
									<a href="#">Education</a>
								</div>
								<div class="list-group-item">
									<a href="#">Tecnology</a>
								</div>
								<div class="list-group-item">
									<a href="#">Psychology</a>
								</div>
								<div class="list-group-item">
									<a href="#">Motivation</a>
								</div>
								<div class="list-group-item">
									<a href="#">Healthy</a>
								</div>
								<div class="list-group-item">
									<a href="#">Crafs & Hobbies</a>
								</div>
								<div class="list-group-item">
									<a href="#">Resep Masak</a>
								</div>
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