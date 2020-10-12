<html>
<head>
	<title>Books For Life</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/style.css" rel="stylesheet" media="screen">
</head>

<body>

	<?php
		include "global_database_function.php";

		function buku_search(){
			$judul = @$_POST['judul'];//mengambil judul buku dari form cari
			if (isset($_POST['cari'])){ //menjalankan button ketika button submit di click
				$hasil = get_buku_by_judul($judul); /*	Panggil fungsi pada file global database function	*/
				$hitung = mysql_num_rows($hasil); /*	cek jumlah buku yang ditemukan	*/
				if ($hitung > 0){ /*	jika buku terdapat lebih dari 0 (tersedia)	*/	
					for ($i=0;$i<$hitung;$i++){
						$gambar = mysql_result($hasil,$i,'file_gambar');
						$idbarang = mysql_result($hasil,$i,'idbarang');


						echo"<div class='col-md-12 column'>";
							echo"<div class='panel panel-default'>";
								echo"<div class='panel-heading'>";
									echo"<h4 class='panel-title h6'>".mysql_result($hasil,$i,'nama')."</h4>";
								echo"</div>";

								echo "<div class='panel-body'>";
									echo"<div class='col-md-3'>";
										echo"<div class='thumbnail'>";
											echo"<img src = 'gambar/".$gambar."' alt = 'gambar' height = '170' width='130'>";
										echo"</div>";
									echo"</div>";

									echo"<div class='col-md-8'>";
										echo "<table cellpadding='10'>";
											echo "<tr>";
												echo "<td>Harga</td>";
												echo "<td>:</td>";
												echo "<td>Rp. ".mysql_result($hasil,$i,'harga')."</td>";
											echo "</tr>";

											echo "<tr>";
												echo "<td>Stok</td>";
												echo "<td>:</td>";
												echo "<td>".mysql_result($hasil,$i,'stok')."</td>";
											echo "</tr>";

											echo "<tr>";
												echo "<td><a class='btn btn-primary' href='cart.php?id=".$idbarang."'>Add to cart</a></td>";
											echo "</tr>";

											echo "<tr>";
												echo "<td><a class='btn btn-primary' href='detail_buku.php?id=".$idbarang."'>Book Detail</a></td>";
											echo "</tr>";
										echo "</table>";
									echo"</div>";
								echo"</div>";
							echo"</div>";
						echo"</div>";
					}	
				} 
				else{
					echo "Buku tidak tersedia.";
				}
			} /*	end of pencarian buku	*/
		}
	?>
</body>
</html>

	
