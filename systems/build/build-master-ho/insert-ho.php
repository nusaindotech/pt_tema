<?php
	include "../../../auth/autho.php";
	$nama_ho	= $_POST['nama_ho'];
	if (empty($nama_ho))
	{	
		die("Isikan Nama HO!");
	}
	else
	{
	
	$ast=mysql_query("SELECT count(id_ho) as total from tb_ho");
	$row=mysql_fetch_array($ast);
	$koder=$row['total'];
	$id=$koder+1;
	$idbaru="H".$id;
		 $query1 ="INSERT INTO tb_ho(kode_ho,
									 nama_ho,
									 status_ho) 
							   VALUES('$idbaru',
									  '$nama_ho',
									  '1')";
									
		mysql_query($query1) or die("Gagal menyimpan data HO");
		header('location:../../dash.php?hp=master-ho');
	}
?>