<?php
	include "../../../auth/autho.php";
	$idcanvaser	= $_GET['id'];
	$hu	= $_GET['hu'];
	if(empty($hu))
	{	
		die("Pilih HU!");
	}

	else
	{
		$query1 ="DELETE FROM tb_temp_pengambilan_sp where hu_1='$hu' and id_sales='$idcanvaser'";											
		mysql_query($query1) or die("Gagal menghapus data detail hu");		
		header("location:../../dash.php?hp=konfirmasi-pengambilan-sp&idcanvaser=$idcanvaser");
	}
?>