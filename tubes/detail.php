<html>
<head>
	<title>Books For Life</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/style.css" rel="stylesheet" media="screen">
</head>

<body>	
	<?php
		include "global_database_function.php";

		function buku_detail() {
			$idbarang = $_GET['id'];
				if(isset($idbarang)){
					$koneksi = mysql_open_connection();
					$query = "SELECT * FROM barang WHERE idbarang = '$idbarang'";
					$hasil = mysql_query($query,$koneksi)or die(mysql_error());
					
					while($row = mysql_fetch_array($hasil)){
					echo"<div class='row'>";
						echo"<div class='col-md-4'>";
							echo"<div class='thumbnail'>";
								echo"<img src= 'gambar/".$row['file_gambar']."'>";
							echo"</div>";
						echo"</div>";

						echo"<div class='col-md-8'>";
							echo"<div class='thumbnail'>";
								echo"<div class='caption'>";
									echo"<h2>".$row['nama']."</h2>";
									echo"<hr>";
									echo"<h3> Rp. ".$row['harga']."</h3>";
									echo"<h3>Sinopsis :</h3>";
									echo"<p class='pp'>".$row['sinopsis']."</p>";
									echo"<a class='btn btn-primary' href = 'cart.php?id=".$idbarang."'>Add to cart</a>";
								echo"</div>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
				}
			}

		}
	?>
</body>
</html>