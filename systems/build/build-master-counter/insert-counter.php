<?php
	include "../../../auth/autho.php";
	
	$nama_counter = $_POST['nama_counter'];
	$ho	= $_POST['ho'];
	$bo	= $_POST['bo'];
	$alamat	= $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$hp_kios = $_POST['hp_kios'];
	$email = $_POST['email'];
	$longitude = $_POST['longitude'];
	$latitude = $_POST['latitude'];
	$saldo = $_POST['saldo'];
	$tglinput	= date('Y-m-d');

	if (empty($nama_counter))
	{	
		die("Isikan Nama Counter!");
	}
	else
	{
		 $query1 ="INSERT INTO tb_kios(id_ho,
									   id_bo,
									   nama_kios,
									   alamat_kios,
									   telepon_kios,
									   hp_kios,
									   email_kios,
									   longitude_kios,
									   latitude_kios,
									   saldo_kios,
									   tanggal_input,
									   status_kios) 
							   VALUES('$ho',
									  '$bo',
									  '$nama_counter',
									  '$alamat',
									  '$telepon',
									  '$hp_kios',
									  '$email',
									  '$longitude',
									  '$latitude',
									  '$saldo',
									  '$tglinput',
									  '1')";
									
		mysql_query($query1) or die("Gagal menyimpan data counter");
		header('location:../../dash.php?hp=master-counter');
	}
?>