<?php
	include "../../../auth/autho.php";

	$No_User			= $_POST['id_bo'];
	$idpenjualan		= $_POST['idpenjualan'];
	$id_bo				= $_POST['id_bo'];
	$id_ho				= $_POST['id_ho'];
	$grandtotal			= $_POST['grandtotal'];						
	$jumlahtunai		= $_POST['jumlahtunai'];						
	$idbank				= $_POST['idbank'];								
	$idbank2			= $_POST['idbank2'];								
	$idbank3			= $_POST['idbank3'];								
	$jumlahtransfer		= $_POST['jumlahtransfer'];	
	$jumlahtransfer2	= $_POST['jumlahtransfer2'];	
	$jumlahtransfer3	= $_POST['jumlahtransfer3'];	
	$catatan 			= $_POST['catatan'];				
	$tanggal_input 		= $_POST['tanggal_input'];				
	
	$tglsekarang = date('Y-m-d');
				
	if (empty($idpenjualan))
	{	
		die("Nomor Penjualan Kosong!");
	}
	else
	{
		$query1 ="update tb_penjualan_dompul set bayar_tunai='$jumlahtunai', bank='$idbank', bank2='$idbank2', bank3='$idbank3', bayar_transfer='$jumlahtransfer', 
		bayar_transfer2='$jumlahtransfer2', bayar_transfer3='$jumlahtransfer3', catatan='$catatan'
		where id_penjualan_dompul='$idpenjualan'";
											
		mysql_query($query1) or die("Gagal menyimpan data Tipe");
		
		header("location:../../dash.php?hp=penjualan-list-dompul");
	}
?>