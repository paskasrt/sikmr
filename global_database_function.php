<?php
	/*	Masukkan data untuk connect	*/
	require 'config_db.php';
	
	/* function untuk membuka koneksi mysql dan memilih database */
	function mysql_open_connection() {
		$koneksi = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Tidak bisa terkoneksi : '.mysql_error());
		mysql_select_db(DB_NAME);
		return $koneksi;
	}
	
	/* function untuk mendapatkan semua data berdasarkan nama tabel */
	function get_all_data($table_name) {
		$koneksi = mysql_open_connection();
		$query = "SELECT * FROM ".$table_name;
		$hasil = mysql_query($query,$koneksi);
		mysql_close($koneksi);
		
		return $hasil;
	}
	
	/*	function untuk cari buku berdasarkan judul buku	*/
	function get_buku_by_judul($judul) {
		$koneksi = mysql_open_connection();
		$query = "SELECT * FROM barang B WHERE B.nama LIKE '%$judul%'";
		$hasil = mysql_query($query,$koneksi);
		
		return $hasil;
	}
	
	/*	Mendapatkan data berdasarkan id	*/
	function get_data_by_id($id){
		$koneksi = mysql_open_connection();
		$query = "SELECT * FROM barang WHERE idbarang = '$id'" ;
		$hasil = mysql_query($query,$koneksi);
		mysql_close($koneksi);
		
		return $hasil;
	}

	/*	function untuk mendapatkan buku berdasarkan kategori */
	function get_books_by_category($kategori){
		$koneksi = mysql_open_connection() or die(mysql_error());
		$query = "SELECT * FROM barang WHERE idkategori = '$kategori' ORDER BY nama DESC LIMIT 3 ";
		$hasil = mysql_query($query,$koneksi) or die(mysql_error());

		return $hasil;
	}

	/*	function untuk mendapatkan buku berdasarkan kategori */
	function get_books_by_category_and_nolimit($kategori){
		$koneksi = mysql_open_connection() or die(mysql_error());
		$query = "SELECT * FROM barang WHERE idkategori = '$kategori' ORDER BY nama ";
		$hasil = mysql_query($query,$koneksi) or die(mysql_error());

		return $hasil;
	}

	/*	function untuk mendapatkan buku berdasarkan kategori tapi dibates 3 */
	function get_books_by_tgl_insert(){
		$koneksi = mysql_open_connection() or die(mysql_error());
		$query = "SELECT * FROM barang  ORDER BY tgl_insert LIMIT 3 ";
		$hasil = mysql_query($query,$koneksi) or die(mysql_error());

		return $hasil;
	}
	
	/*	function untuk melihat daftar transaksi pembelian yang pernah dilakukan (history transaksi) serta status
	function get_data_transaksi(){
		$koneksi = mysql_open_connection();
		$query = "SELECT * FROM penjualan P , status_penjualan SP, status S
				  WHERE 
				  AND P.idpenjualan = SP.idpenjualan 
				  AND SP.idstatus = S.idstatus
		";
		$hasil =
		
		//return $hasil;
	}
	*/
	
?>