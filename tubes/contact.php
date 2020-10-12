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
				<hr>
			</div>

			<aside>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-2">	
							</div>
							<div class="col-md-8">
								<h2>Customer Service - Contact Us</h2><hr><br>
								<h3>Send A Message</h3>
								<div class="panel panel-default">
									<div class="panel-body">
										<form action = "login.php" method = "POST">
											<div class="form-group">
												<label for="exampleInputEmail1">Email address</label>
												<input type="email" name = "email" class="form-control"/>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Password</label>
												<input type="password" name = "password" class="form-control"/>
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Message</label>
												<textarea type="email" name = "email" class="form-control"></textarea>
											</div>
											<div class="form-group">
												 <label for="exampleInputFile">Attach File</label>
												 	<input type="file" id="exampleInputFile" />
													<p class="help-block">
													</p>
											</div>
											<div>
												<input type="submit" class="btn btn-primary" name="Submit" value="SEND">
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								
							</div>
					</div>
				</div>
			</aside>

			<footer>
					<hr>
					<p align="center">Ilmu Komputer/ Informatika 2016</p>		
			</footer>
		</div>
	</div>
</body>
</html>