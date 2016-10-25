<?php
include "../../../auth/autho.php";

	$id_kios 	=$_POST['id_kios'];
	$nama_kios  =$_POST['nama_kios'];
	$ho 		=$_POST['ho'];
	$bo			=$_POST['bo'];
	$alamat		=$_POST['alamat'];
	$telepon_kios =$_POST['telepon_kios'];
	$hp_kios 	=$_POST['hp_kios'];
	$email 		=$_POST['email'];
	$status 	=$_POST['status'];
	$tglsekarang	= date('Y-m-d');
	
	$query1 ="UPDATE `tb_kios` SET 
	`nama_kios`='$nama_kios',
	`alamat_kios`='$alamat',
	`id_ho`='$ho',
	`id_bo`='$bo',
	`telepon_kios`='$telepon_kios',
	`email_kios`='$email',
	`hp_kios`='$hp_kios' 
	WHERE `id_kios`='$id_kios'";
							
	mysql_query($query1) or die("Gagal memperbarui data Kios");
	
	header("location:../../dash.php?hp=master-counter");
?>