<?php
	include "../../../auth/autho.php";
	$id_penjualan = $_GET['id'];
	$id_kios = $_GET['id2'];
	$id_canvaser = $_GET['id3'];
	$id_barang = $_GET['id4'];
	if(empty($id_barang))
	{	
		die("Pilih Detail Barang!");
	}
	else
	{	
		$query2 ="DELETE FROM tb_detail_penjualan_sp
		where id_penjualan_sp='$id_penjualan' and id_kios='$id_kios' and id_barang='$id_barang'";											
		mysql_query($query2) or die("Gagal menghapus data detail barang per ro");
		
		header("location:../../dash.php?hp=tampil-penjualan-ro&idpenjualan=$id_penjualan&idcanvaser=$id_canvaser&idkios=$id_kios");
	}
?>