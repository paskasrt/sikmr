<?php session_start();
include "global_database_function.php";
?>


<?php 
/* Pengaturan awal cart */

@$id = $_GET['id']; //Ketika barang di klik cart , dapatkan id dari barang melalui url 
	if(isset($_GET['id'] )) { //jika barang pernah dipilih (pernah klik cart pada barang itu)
		if(isset($_SESSION['cart'][$id])){
			
			$_SESSION['cart'][$id]['quantity']++;  //tambahkan barang sejumlah id kuantitas tertentu dengan id tertentu
		}
		else{ //jika barang belum pernah dipilih
			$hasil = get_data_by_id($id); //dapatkan data buku dengan id barang yang dipilih 
			if(mysql_num_rows($hasil) != 0){ // jika barang ada 
				$row = mysql_fetch_array($hasil); //tampung data pada array 
				$_SESSION['cart'][$row['idbarang']]  = array('quantity' => 1, 'price' => $row['harga'] ); //tambahkan kuantitas sebanyak 1 dengan harga barang tersebut
			}
			else{ /* jika produk dengan id tertentu tidak ada */
				echo  "This product is invalid";
			}
		}
	}
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
			<br/>
				<div class="row clearfix">
					<div class="col-md-12">
					
						<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-condensed">
									<thead >
										<tr class="success">
											<th>Judul</th>
											<th>Cover</th>
											<th>Harga</th>
											<th>Kuantitas</th>
											<th>Jumlah Harga</th>
										</tr>
									</thead>
									
									<?php
										$koneksi = mysql_open_connection();
										$sql = "SELECT * FROM barang WHERE idbarang IN ("; //dapatkan data-data dari barang yang ada pada session cart 
											foreach($_SESSION['cart'] as $id => $value){
												$sql.=$id.","; 
											}
										$sql = substr($sql,0,-1).") ORDER BY nama ASC"; //hapus koma pada bagian paling belakang
										$query = mysql_query($sql)or die(mysql_error());
										$totalprice = 0; // jumlah keseluruhan harga di inisialisasi 0
										$totalitem = 0; //jumlah keseluruhan item 
										while($row = mysql_fetch_array($query)){
											$subtotal = $_SESSION['cart'][$row['idbarang']]['quantity']*$row['harga']; //mendapatkan total harga perbarang dengan mengalikan kuantitas per barang dengan satuan harga
											$totalprice += $subtotal; //mendapatkan keseluruhan harga dengan menjumlahkan subtotal
											$totalitem += $_SESSION['cart'][$row['idbarang']]['quantity']; //mendapatkan jumlah total item keselurhan
										
									?>

									<tbody>
										<tr class="active">
											<td> <?php echo $row['nama']?></td> 
											<td halign="center"> <img src = "gambar/<?php echo $row['file_gambar']?>" alt = "gambar" height = '120'></td>
											<td> <?php echo $row['harga']?> </td>
											<td><input type = "text" name = "quantity[<?php echo $row['idbarang']?>]" size = "5" value = "<?php echo $_SESSION['cart'][$row['idbarang']]['quantity']?>"></td>
											<td> Rp.<?php echo $_SESSION['cart'][$row['idbarang']]['quantity'] * $row['harga']?></td>
										</tr> 

										<?php
											}
											$_SESSION['totalprice']=$totalprice;
											$_SESSION['totalitem']=$totalitem;
										?>

										<tr class="active">
											<td>Total Harga: </td>
											<td colspan = "4"><?php echo $_SESSION['totalprice'];?></td>
											<td>Total Items : </td>
											<td colspan = "4"><?php echo $_SESSION['totalitem'];?></td>
										</tr>
									</tbody>

								</table>

								<a class="btn btn-primary" href ="index.php">Shopping Again</a>
								<?php if(!empty((@$_SESSION['username'] ))){echo '<a class="btn btn-default" href ="checkout.php">Check Out</a>';}?>
						  		<input class="btn btn-default" type="submit" value="Update" name="submit">
							</div>
						</form>
						<br><br>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-8">
									<?php
										if(empty((@$_SESSION['username'] ))){
											echo '
												<div class="list-group">
													<a href="#" class="list-group-item active">User Login</a>
													<div class="list-group-item">
														<form role="login" action = "login_cart.php" method = "POST">
															<div class="form-group">
																<input type = "email" class="form-control" name = "email" placeholder = "Email" size="40"> 
															</div>
															<div class="form-group">
																<input type = "password" class="form-control" name = "password" placeholder = "Password " size="40"> 
															</div>
															<td> <input type = "submit" name = "Login" value="Login" class="btn btn-default"> </td>
														</form>
													</div>
												</div>
											';
										}
																			
									?>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</div>
				</div>
			</aside>

			<footer>
				<br><br><br><br><br><br><hr>
				<p align="center">Ilmu Komputer/ Informatika 2016</p>
			</footer>

		</div>
	</div>
</body>
</html>

<?php
	/*	Setting text kuantitas cart	*/
		if(isset($_POST['submit'])){ //ketika mengklik update 
			foreach($_POST['quantity'] as $key => $val){ //untuk setiap text dgn quantity[] , update  valuenya
				if($val == 0){ //jika val nya di set = 0
					unset($_SESSION['cart'][$key]); //hapus session cart dengan indeks tertentu
					// header("Location: cart.php");
?>
					<script language = "javascript">
						document.location = "cart.php";
					</script>
<?php
		}
		else{ //kalo pengen nambah kuantitas dengan jumlah tertentu !=0
				$_SESSION['cart'][$key]['quantity']=$val; //ubah kuantitas dengan val tertentu 
				//header("Location: cart.php");
?>
				<script language = "javascript">
					document.location = "cart.php";
				</script>
<?php
			}
		}
	}
?>

