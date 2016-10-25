<?php
	include "../../../auth/autho.php";
	$nama_bo	= $_POST['nama_bo'];
	$id_ho	= $_POST['id_ho'];

	if (empty($nama_bo))
	{	
		die("Isikan Nama BO!");
	}
	else
	{
	
	$bantu1=mysql_query("select count(id_ho) as total from tb_bo where id_ho='2'");
	$row=mysql_fetch_array($bantu1);
	$koder=$row['total'];
	$id=$koder+1;
	$idbaru="H".$id_ho.".B".$id;
	
		 $query1 ="INSERT INTO tb_bo(id_ho,
									 kode_bo,
									 nama_bo,
									 status_bo) 
							   VALUES('$id_ho',
									  '$idbaru',
									  '$nama_bo',
									  '1')";
									
		mysql_query($query1) or die("Gagal menyimpan data BO");
		header('location:../../dash.php?hp=master-bo');
	}
?>