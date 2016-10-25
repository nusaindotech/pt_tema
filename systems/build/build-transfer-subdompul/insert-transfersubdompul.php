<?php
	include "../../../auth/autho.php";
	$md 	 		 = $_POST['md'];
	$md2 	 		 = $_POST['md2'];
	$jenis_dompul 	 = $_POST['jenis_dompul'];
	$jumlah 		 = $_POST['jumlah'];
	$catatan 		 = $_POST['catatan'];
	$No_User 		 = $_POST['No_User'];
	$tglsekarang	 = date('Y-m-d');

	if($jumlah==0)
	{	
		die("Isikan jumlah!");
	}
	else
	{		
		$query1 ="INSERT INTO tb_transfer_subdompul(no_hp_asal,
									   no_hp_tujuan,
									   tanggal_transfer,
									   jenis_dompul,
									   jumlah_dompul,
									   catatan,
									   tanggal_input,
									   No_User) 
							   VALUES('$md',
									  '$md2',
									  '$tglsekarang',
									  '$jenis_dompul',
									  '$jumlah',
									  '$catatan',
									  '$tglsekarang',
									  '$No_User')";

		mysql_query($query1) or die("Gagal menyimpan data Transfer sub dompul");
		header('location:../../dash.php?hp=transfer-subdompul');
	}
?>