<?php
include "global_database_function.php";
$koneksi= mysql_open_connection();
$propinsi = $_GET['propinsi'];
$kota = mysql_query("SELECT idkota,nama FROM kota WHERE idprovinsi='$propinsi' order by nama")or die(mysql_error());
echo "<option value='--Pilih Kota--'>-- Pilih Kota --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['nama']."\">".$k['nama']."</option>\n";
}
?>
