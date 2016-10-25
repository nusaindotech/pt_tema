<?php
	include "../../../auth/autho.php";
	$hak_akses = $_POST['hak_akses'];
	$no_pembayaran = $_POST['no_pembayaran'];
	$id_canvaser = $_POST['id_canvaser'];
	
	if($hak_akses==3)
	{
		$query ="update tb_pembayaran_canvaser
				 set status_acc_bayar='1'
				 where id_penjualan_sp='$no_pembayaran' and id_sales='$id_canvaser'";
		mysql_query($query)or die("gagal menyimpan data verifikasi");
		
		header("location:../../dash.php?hp=verifikasi-penjualan");
	}
?>