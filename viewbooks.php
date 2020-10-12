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
							<ul class="nav navbar-nav navbar-right foo">';
								echo "<li><span>";
								echo "Selamat Datang  ".$_SESSION['name'];
								echo "   ";
								echo "<a href = 'logout.php' class='btn btn-primary f'>log out</a>";
								echo "<a  href = 'lihat_history.php?id=".$data['idpelanggan']."'>Lihat History</a>";
								echo "</span></li>";
						  	echo '</ul>		
						  	<div></div>
						</div>
					</div>
				</nav>';
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

			<aside>
				<hr>
				<div class="row clearfix">
					
					<div class="col-md-12">
						<?php
							include "global_database_function.php";
							$id = $_GET["id"];

							switch ($id) {
								case 100:
									echo "<div class='col-md-12'>";
										echo "<h2>TEENLIT</h2>";
									echo "</div>";
									break;
								
								default:
									echo "<div class='col-md-12'>";
										echo "<h2>METROPOP</h2>";
									echo "</div>";
									break;
							}

							$tampil = get_books_by_category_and_nolimit($id);
								while($row = mysql_fetch_array($tampil)){

									echo"<div class='col-md-12 column'>";
										echo"<div class='panel panel-default'>";
											echo"<div class='panel-heading'>";
												echo"<h4 class='h6'>".$row['nama']."</h4>";
											echo"</div>";
											echo "<div class='panel-body'>";
												echo"<div class='col-md-3'>";
													echo"<div class='thumbnail'>";
														echo"<div class='caption'>";
															echo "<div class='border'>";
																echo"<img src = 'gambar/".$row['file_gambar']."' height = '270' width='215'><br/>";
															echo "</div>";
														echo"</div>";
													echo"</div>";
												echo"</div>";
												echo"<div class='col-md-8'>";
													echo "<p><h3> Rp. ".$row['harga']."</h3></p>";
													echo"<p><h3>Sinopsis :</h3></p>";
													echo "<p class='pp'>".$row['sinopsis']."</p>";
													echo "<a class='btn btn-primary' href = 'cart.php?id=".$row['idbarang']."'>Add to cart</a>";
													echo "   ";
													echo "<a class='btn btn-default' href = 'detail_buku.php?id=".$row['idbarang']."'>Detail</a>";
												echo"</div>";
											echo"</div>";												
										echo"</div>";
									echo"</div>";
								}
						?>
					</div>

				</div>
			</aside>

			<footer>
				<hr>
				<p align="center">Ilmu Komputer/ Informatika 2016<p>
			</footer>

		</div>
	</div>
</body>
</html>>

