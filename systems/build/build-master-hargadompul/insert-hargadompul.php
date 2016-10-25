<?php
	include "../../../auth/autho.php";
	$dompul 	 	 = $_POST['dompul'];
	$type_dompul 	 = $_POST['type_dompul'];
	$harga_dompul 	 = $_POST['harga_dompul'];

	if(empty($dompul))
	{	
		die("Isikan dompul!");
	}
	else
	{
		
		$query1 ="INSERT INTO tb_dompul(nama_dompul,
									   type_dompul,
									   harga_dompul,
									   status_dompul) 
							   VALUES('$dompul',
									  '$type_dompul',
									  '$harga_dompul',
									  '0')";

		mysql_query($query1) or die("Gagal menyimpan data Dompul");
		header('location:../../dash.php?hp=master-hargadompul');
	}
?>