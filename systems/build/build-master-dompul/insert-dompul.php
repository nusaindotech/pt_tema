<?php
	include "../../../auth/autho.php";
	$nama_dompul = $_POST['nama_dompul'];
	$type_dompul = $_POST['type_dompul'];

	if (empty($nama_dompul))
	{	
		die("Isikan Nama Dompul!");
	}
	else
	{	
		$ast=mysql_query("SELECT count(id_dompul) as total from tb_dompul");
		$row=mysql_fetch_array($ast);
		$koder=$row['total'];
		$id=$koder+1;
		if ($id<10){
		$idbaru="DOM-".$id;
		}
		else{
		$idbaru="DOM-".$id;
		}
		
		$query1 ="INSERT INTO tb_dompul(id_dompul,
										 nama_dompul,
										 type_dompul,
										 status_dompul) 
							   VALUES('$idbaru',
									  '$nama_dompul',
									  '$type_dompul',
									  '1')";
			
		mysql_query($query1) or die("Gagal menyimpan data dompul");
		header('location:../../dash.php?hp=master-dompul');
	}
?>