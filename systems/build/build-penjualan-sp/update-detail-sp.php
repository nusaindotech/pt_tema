<?php
	include "../../../auth/autho.php";

	$idpenjualan		= $_POST['idpenjualan'];
	$customer		= $_POST['customer'];
	
	$tglsekarang	= date('Y-m-d');
				
	if (empty($customer))
	{	
		die("Isikan Nama Customer!");
	}
	else
	{
		$query1 ="update tb_penjualan_lainnya set id_customer='$customer' where id_penjualan_lain='$idpenjualan'";
											
		mysql_query($query1) or die("Gagal menyimpan data Customer");
		
		header("location:../../dash.php?hp=pendaftaran-lainnya2&idpenjualan=$idpenjualan&idcustomer=$customer");
	}
?>