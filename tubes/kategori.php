<html>
<head>
	<title>Books For Life</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>
	<?php
		include "global_database_function.php";

		function tampil_metropop(){
			$kategori_metropop = 101;
			$tampil = get_books_by_category($kategori_metropop);
				$jml_kolom=3;
				$cnt = 0;
				while ($row = mysql_fetch_array($tampil)) {
					if ($cnt >= $jml_kolom)
					{
						  $cnt = 0;
					} 
					$cnt++;
					echo"<div class='col-md-4'>";	
						echo"<div class='thumbnail'>";
							echo"<div class='caption'>";
								echo"<img src = 'gambar/".$row['file_gambar']."'height = '150' width='120'><br/>";
								echo"<h3>".$row['nama']."</h3>";
								echo"<h3> Rp. ".$row['harga']."</h3>";
								echo"<a class='btn btn-primary' href = 'detail_buku.php?id=".$row['idbarang']."'>Book Detail</a>";
								echo"<a class='btn' href = 'cart.php?id=".$row['idbarang']."'>add to cart</a>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
				}	
		}

		function tampil_teenlit(){
			$kategori_teenlit = 100;
			$tampil = get_books_by_category($kategori_teenlit);
				$jml_kolom=3;
				$cnt = 0;
				while ($row = mysql_fetch_array($tampil)) {
					if ($cnt >= $jml_kolom)
					{
						  $cnt = 0;
					} 
					$cnt++;
					echo"<div class='col-md-4'>";	
						echo"<div class='thumbnail'>";
							echo"<div class='caption'>";
								echo"<img src = 'gambar/".$row['file_gambar']."'height = '150' width='120'><br/>";
								echo"<h3>".$row['nama']."</h3>";
								echo"<h3> Rp. ".$row['harga']."</h3>";
								echo"<a class='btn btn-primary' href = 'detail_buku.php?id=".$row['idbarang']."'>Book Detail</a>";
								echo"<a class='btn' href = 'cart.php?id=".$row['idbarang']."'>add to cart</a>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
				}	
		}

		function tampil_buku_terbaru(){			
			$tampil =  get_books_by_tgl_insert();
				$jml_kolom=3;
				$cnt = 0;
				while ($row = mysql_fetch_array($tampil)) {
					if ($cnt >= $jml_kolom)
					{
						  $cnt = 0;
					} 
					$cnt++;
					echo"<div class='col-md-4'>";	
						echo"<div class='thumbnail'>";
							echo"<div class='caption'>";
								echo"<img src = 'gambar/".$row['file_gambar']."'height = '150' width='120'><br/>";
								echo"<h3>".$row['nama']."</h3>";
								echo"<h3> Rp. ".$row['harga']."</h3>";
								echo"<a class='btn btn-primary' href = 'detail_buku.php?id=".$row['idbarang']."'>Book Detail</a>";
								echo"<a class='btn' href = 'cart.php?id=".$row['idbarang']."'>add to cart</a>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
				}	
		}
	?>
</body>
</html>