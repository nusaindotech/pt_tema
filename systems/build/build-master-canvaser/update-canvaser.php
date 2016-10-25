<?php
include "../../../auth/autho.php";

	$id_sales		 =$_POST['id_sales'];
	$nama_sales		 =$_POST['nama_sales'];
	$ho 			 =$_POST['ho'];
	$bo 			 =$_POST['bo'];
	$alamat 		 =$_POST['alamat'];
	$telepon_sales	 =$_POST['telepon_sales'];
	$hp_sales		 =$_POST['hp_sales'];
	$email 			 =$_POST['email'];
	$status 		 =$_POST['status'];

	$query1 ="UPDATE `tb_sales` SET 
	`id_ho`='$ho',
	`id_bo`='$bo',
	`nama_sales`='$nama_sales',
	`alamat_sales`='$alamat',
	`telepon_sales`='$telepon_sales',
	`hp_sales`='$hp_sales',
	`email_sales`='$email',
	`status_sales`='$status'
	WHERE `id_sales`='$id_sales'";
							
	mysql_query($query1) or die("Gagal memperbarui data Canvaser");
	
	header("location:../../dash.php?hp=master-canvaser");

?>