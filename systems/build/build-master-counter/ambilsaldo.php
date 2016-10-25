<?php
//include "../../auth/autho.php";
$server = "localhost";
$username = "root";
$password = "";
$database = "nusa_erp";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

//$idkios = $_POST["idkios"];

$bantu3="SELECT saldo_kios FROM tb_kios WHERE id_kios='$idkios'";
$hasil_bantu3=mysql_query($bantu3);
$data_bantu3=mysql_fetch_array($hasil_bantu3);
echo $data_bantu3[0];
?>