<?php 
	session_start();
	include "kategori.php";

	$con = mysql_open_connection();
	function random($panjang)
	{
	   $pengacak = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
	   $string = '';
	   for($i = 0; $i < $panjang; $i++) {
	   $pos = rand(0, strlen($pengacak)-1);
	   $string .= $pengacak{$pos};
	   }
		return $string;
	}
	
	$id_pel = $_SESSION['idpelanggan'];
	
	$kode_unik = random(5);
?>

<html>
<head>
	<title>Books For Life</title>
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/style.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
		var htmlobjek;
		$(document).ready(function(){
		  //apabila terjadi event onchange terhadap object <select id=propinsi>
		  $("#propinsi").change(function(){
			var propinsi = $("#propinsi").val();
			$.ajax({
				url: "ambilkota.php",
				data: "propinsi="+propinsi,
				cache: false,
				success: function(msg){
					//jika data sukses diambil dari server kita tampilkan
					//di <select id=kota>
					$("#kota").html(msg);
				}
			});
		  });
		});

		</script>

	<link rel="stylesheet" href="css/screen.css">
	<script src="lib/jquery.js"></script>
	<script src="dist/jquery.validate.js"></script> 

	<script>


	$().ready(function() {
		

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				
				address: "required",
				phone: "required",
				name: {
					required: true,
					minlength: 2
				},
				email: {
					required: true,
					email: true
				},
				agree: "required"
			},
			messages: {
				email: "Silahkan insert email dengan format yang benar",
				address: "Silahkan masukkan alamat pengiriman",
				name: {
					required: "Silahkan masukkan nama penerima",
					minlength: "Nama minimal 2 karakter"
				},
				
				
				phone: "Masukkan nomor telepon"
			}
		});

		

	});
	</script>
	<style>

	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}

	</style>
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

			<aside>
				<div class="row">
					<div class="col-md-12"><br/>
						<div class="row clearfix">
							
							<div class="col-md-8">
									<form method="post" id="signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
										<div class="form-group">
											<label for="exampleInputName">Nama Penerima</label> 
											<input type="text" name = "name" id="name" placeholder="Nama Penerima " class="form-control" required/>
										</div>
										<div class="form-group">
											<label for="exampleInputName">Nomor Telepon</label>
											<input type="text" name = "phone" id="phone" placeholder="Nomor Telepon" class="form-control"/>
										</div>
										<div class="form-group">
											<label for="exampleInputName">Alamat</label>
											<input type="text" name = "address" id="address" placeholder="Alamat Penerima" class="form-control"/>
										</div>
										<div class="form-group">
											<label for="exampleInputName">Provinsi Tujuan</label>
											<select name="propinsi" id="propinsi" class="form-control">
												<option value="">--Pilih Provinsi--</option>
												<?php
												// mengambil nama-nama propinsi yang ada di database
												$propinsi = mysql_query("SELECT * FROM provinsi ORDER BY nama");
												while($p=mysql_fetch_array($propinsi)){
													echo "<option value='".$p['idprovinsi']."'>".$p['nama']."</option>\n";
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputName">Kota Tujuan</label>
											<select name="kota" id="kota" class="form-control">
												<option value="">--Pilih Kota--</option>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail">Alamat Email</label>
											<input type="text" name = "email" id="email" placeholder="Email" class="form-control"/>
										</div>
										<a class="btn btn-primary" href ="index.php">Shopping Again</a>
							  			<input class="btn btn-primary" type="submit" name="submit" value="Send">
									</form>
									
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
	<?php

	if (isset($_POST['submit'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$kota = $_POST['kota'];
		$email = $_POST['email'];
		$idpel = $_SESSION['idpelanggan'];
		$today = date('Y-m-d');
		$totalprice = $_SESSION['totalprice'];
		$totalitem = $_SESSION['totalitem'];
		$status = "pending";
		
		$koneksi = mysql_open_connection();
			
		$query1 = "INSERT INTO penjualan (`idpelanggan`, `tgl_penjualan`, `total_harga`, `total_item`, `nama_kirim`, `alamat kirim`, `idkota_kirim`, `status_penjualan`, `kode_unik`) VALUES ('$idpel', '$today', '$totalprice', '$totalitem','$name', '$address', '$kota', '$status', '$kode_unik')";
		
		$exc = mysql_query($query1);
		
		if($exc)
		{
			echo "berhasil";
		}
		else{
			echo "gagal";
		}
		
		//nambah ke detail_penjualan
		//dapetin id yang ada di barang yang ada di cart
		$koneksi = mysql_open_connection();
		$sql = "SELECT * FROM barang WHERE idbarang IN (";
				foreach($_SESSION['cart'] as $id => $value){
						$sql.=$id.",";
				}
		$sql = substr($sql,0,-1).") ORDER BY nama ASC";
		echo $sql;
		echo "<br />";
		//eksekusi dapetin barang
		$excc = mysql_query($sql);
		
		//query buat dptin kode unik
		$query2 = "select idpenjualan from penjualan where kode_unik = '$kode_unik'";
		//eksekusi idpenjualan dgn kode unik trtentu
		$excc1 = mysql_query($query2);
		//tampung array untuk idpenjualan trtntu
		$row2 = mysql_fetch_array($excc1);
		//dapetin id penjualan
		$idpenjualan = $row2['idpenjualan']; //idpenjualan
	
	
		while($row = mysql_fetch_array($excc)){ //selama masih ada barang
			
			$qty = $_SESSION['cart'][$row['idbarang']]['quantity']; //kuantitas per barang yang di cart
			//echo $row['nama'];	//nama barang yang ada di cart
			$sub = $_SESSION['cart'][$row['idbarang']]['quantity']*$row['harga']; // subtotal
		
			$query3 = "INSERT INTO detail_penjualan (`idpenjualan`, `idbarang`, `qty`, `harga_perqty`) VALUES ('".$idpenjualan."', '".$row['idbarang']."', '$qty', '$sub')";
			$exccc = mysql_query($query3) or die(mysql_error());
			
		}
		
		?>
		<script language = "javascript">
						document.location = "informasi_tambahan.php";
					</script>
		<?php
	}		
?>
</body>
</html>

