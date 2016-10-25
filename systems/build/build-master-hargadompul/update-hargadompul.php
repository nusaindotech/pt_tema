<?php
include "../../../auth/autho.php";

$id_dompul	 =$_POST['id_dompul'];
$dompul 	 =$_POST['dompul'];
$type_dompul =$_POST['type_dompul'];
$harga_dompul=$_POST['harga_dompul'];
	
	$query1 ="UPDATE tb_dompul SET 
	nama_dompul='$dompul',
	type_dompul='$type_dompul',
	harga_dompul='$harga_dompul'
	WHERE id_dompul='$id_dompul'";
								
	mysql_query($query1) or die("Gagal memperbarui data Dompul");
	header("location:../../dash.php?hp=master-hargadompul");
?>