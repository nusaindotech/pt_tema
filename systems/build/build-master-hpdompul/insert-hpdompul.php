<?php
	include "../../../auth/autho.php";
	$masterhp 		= $_POST['masterhp'];
	$namamasterhp 	= $_POST['namamasterhp'];

	if (empty($masterhp))
	{	
		die("Isikan Nama Master!");
	}
	else
	{	
		$ast=mysql_query("SELECT no_hp_master from tb_master_dompul");
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