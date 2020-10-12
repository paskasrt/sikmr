<?php
	session_start();
	require_once "global_database_function.php";
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
					$koneksi = mysql_open_connection();
					
					$email = $_POST['email'];
					$password = $_POST['password'];
					
					$query = "SELECT  idpelanggan , nama , email , password FROM pelanggan where email = '$email' and password = '$password'";
					$hasil = mysql_query($query) or die(mysql_error());
					
					$jumlah = mysql_num_rows($hasil);
					
					if($jumlah == 1){
						$data = mysql_fetch_array($hasil);
						//ciptakan session
						$_SESSION['username'] = $data['email'];
						$_SESSION['name'] = $data['nama'];
						$_SESSION['idpelanggan'] = $data['idpelanggan'];
						$_SESSION['login'] = true;
				?>
						<script language = "javascript">
							alert("Selamat Datang");
							document.location = "index.php";
						</script>
					
				<?php
					}else{
						$_SESSION['login'] = false;
						echo "<div class='col-md-2'></div>";
						echo "<div class='col-md-8'>";
							echo "<h5> Maaf password yang anda masukan salah</h5>";
							echo "<br/><a href = 'loginbaru.php'> Silahkan login lagi</a>";
						echo "</div>";
						echo "</div>";
						echo "<div class='col-md-2'></div>";
					}
				?>
			</aside>
			
		</div>
	</div>
</body>
</head>