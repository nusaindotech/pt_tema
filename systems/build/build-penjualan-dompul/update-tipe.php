<?php
	include "../../../auth/autho.php";

	$no_upload_dompul		= $_POST['no_upload_dompul'];
	$tipedompul				= $_POST['tipedompul'];
	$hp_kios				= $_POST['hp_kios'];
	$hp_sales				= $_POST['hp_sales'];
	$qty_program			= $_POST['qty_program'];
	$tanggal_input			= $_POST['tanggal_input'];
	
	$tglsekarang	= date('Y-m-d');
	
	$a2=mysql_query("SELECT no_upload_dompul,qty, qty_program from tb_detail_penjualan_dompul where id_detail_penjualan_dompul='$id_detail_penjualan_dompul'");
	$row2=mysql_fetch_array($a2);
	
	$qtyasli = ($row2['qty']-$qty_program)+$row2['qty_program'];
				
	if (empty($hp_kios))
	{	
		die("Isikan Nama tipe dompul!");
	}
	else
	{
		$query1 ="update tb_upload_dompul set type_dompul='$tipedompul', qty_program='$qty_program' where no_upload_dompul='$no_upload_dompul'";
		
		$query2 ="update tb_upload_dompul set type_dompul='$tipedompul', qty='$qtyasli', qty_program='$qty_program' where no_upload_dompul='$row2[no_upload_dompul]'";
											
		mysql_query($query1) or die("Gagal menyimpan data Tipe");
		
		mysql_query($query2) or die("Gagal menyimpan data Uplaod");
											
		
		header("location:../../dash.php?hp=penjualan-dompul3&tanggal_input=$tanggal_input&hp_kios=$hp_kios&hp_sales=$hp_sales");
	}
?>