<?php
	include "../../../auth/autho.php";
	$hak_akses = $_POST['hak_akses'];
	$no_pembayaran = $_GET['id'];
	$id_canvaser = $_GET['id2'];
		$query ="update tb_pembayaran_canvaser
				 set status_acc_bayar_pimpinan='1'
				 where id_penjualan_sp='$no_pembayaran' and id_sales='$id_canvaser'";
		mysql_query($query)or die("gagal menyimpan data verifikasi");
		
		header("location:../../dash.php?hp=verifikasi-penjualan-pimpinan");
?>