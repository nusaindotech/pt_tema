<?php
	include "../../../auth/autho.php";
	$id_penjualan = $_GET['id'];
	$id_canvaser = $_GET['id2'];
	$id_kios = $_GET['id3'];	
	if(empty($id_penjualan))
	{	
		die("Pilih Detail SP!");
	}
	else
	{
		$query1 ="DELETE FROM tb_pembayaran_canvaser 
		where id_penjualan_sp='$id_penjualan' and id_sales='$id_canvaser' and id_kios='$id_kios'";											
		mysql_query($query1) or die("Gagal menghapus data pembayaran canvaser");
		
		$query2 ="DELETE FROM tb_detail_penjualan_sp
		where id_penjualan_sp='$id_penjualan' and id_kios='$id_kios'";											
		mysql_query($query2) or die("Gagal menghapus data detail");
		
		header("location:../../dash.php?hp=penjualan-sp2&idpenjualan=$id_penjualan&idcanvaser=$id_canvaser");
	}
?>