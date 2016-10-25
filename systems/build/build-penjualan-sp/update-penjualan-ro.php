<?php
	include "../../../auth/autho.php";
	
	$idcanvaser	= $_POST['idcanvaser'];    			
	$idpenjualan = $_POST['idpenjualan'];  			
	$idkios	= $_POST['idkios'];						
	$grandtotal	= $_POST['grandtotal'];						
	$jumlahtunai	= $_POST['jumlahtunai'];								
	$idbank = $_POST['idbank'];					
	$jumlahtransfer = $_POST['jumlahtransfer'];	
	$piutang = $_POST['piutang'];				
	
	$tglsekarang = date('Y-m-d');
	
	$query2 ="INSERT INTO tb_pembayaran_canvaser(
				  id_penjualan_sp, 
				  id_sales,
				  id_kios, 
				  id_bank, 
				  grand_total_kios,
				  cash_kios,
				  transfer,
				  piutang,
				  tanggal_bayar,
				  tanggal_input,
				  status_pembayaran_kios) 
				  VALUES
				  ('$idpenjualan',
				   '$idcanvaser',
				   '$idkios',
				   '$idbank',
				   '$grandtotal',
				   '$jumlahtunai',
				   '$jumlahtransfer',
				   '$piutang',
				   '$tglsekarang',
				   '$tglsekarang',
				   '1')";
									
	mysql_query($query2) or die("Gagal menyimpan data detail penjualan sp2");
	
	header("location:../../dash.php?hp=penjualan-sp2&idpenjualan=$idpenjualan&idcanvaser=$idcanvaser");
?>