<?php
	include "../../../auth/autho.php";
	$namacanvaser 	= $_POST['namacanvaser'];
	$idbo 			= $_POST['bo'];
	$idho 			= $_POST['ho'];
	$alamat 		= $_POST['alamat'];
	$telepon 		= $_POST['telepon'];
	$email 			= $_POST['email'];
	$hp_sales 		= $_POST['hp_sales'];
	$tgl 			= $_POST['tgl_input'];

	if (empty($namacanvaser))
	{	
		die("Isikan Nama Canvaser!");
	}
	else
	{
		$query1 ="INSERT INTO tb_sales(id_ho,
									   id_bo,
									   nama_sales,
									   alamat_sales,
									   telepon_sales,
									   email_sales,
									   hp_sales,
									   tanggal_input,
									   status_sales) 
							   VALUES('$idho',
									  '$idbo',
									  '$namacanvaser',
									  '$alamat',
									  '$telepon',
									  '$email',
									  '$hp_sales',
									  '$tgl',
									  '1')";

		mysql_query($query1) or die("Gagal menyimpan data canvaser");
		header("location:../../dash.php?hp=master-canvaser");
	}
?>