<?php
	include "../../../auth/autho.php";
	$md 	 		 = $_POST['md'];
	$jenis_dompul 	 = $_POST['jenis_dompul'];
	$jumlah 		 = $_POST['jumlah'];
	$catatan 		 = $_POST['catatan'];
	$No_User 		 = $_POST['No_User'];
	$tanggal_transfer 	 = $_POST['tanggal_transfer'];
	$tglsekarang	 = date('Y-m-d');

	if($jumlah==0)
	{	
		die("Isikan jumlah!");
	}
	else
	{		
		$query1 ="INSERT INTO tb_transfer_dompul(no_hp_sub_master_dompul,
									   tanggal_transfer,
									   jenis_dompul,
									   jumlah_dompul,
									   catatan,
									   tanggal_input,
									   No_User) 
							   VALUES('$md',
									  '$tanggal_transfer',
									  '$jenis_dompul',
									  '$jumlah',
									  '$catatan',
									  '$tglsekarang',
									  '$No_User')";

		mysql_query($query1) or die("Gagal menyimpan data Transfer");
		header('location:../../dash.php?hp=transfer-dompul');
	}
?>