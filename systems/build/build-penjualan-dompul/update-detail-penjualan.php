<?php
	include "../../../auth/autho.php";

	$idpenjualan	= $_POST['idpenjualan'];
	$idcanvaser		= $_POST['idcanvaser'];
	$uangmuka		= $_POST['uangmuka'];
	$transfer		= $_POST['transfer'];
	$sisapembayaran	= $_POST['sisapembayaran'];
	
	$tglsekarang	= date('Y-m-d');
	$bantu_sisa='';			
	if (empty($uangmuka))
	{	
		die("Isikan Total Bayar");
	}
	else
	{
		if($sisapembayaran=='0')
		{
			$bantu_sisa='TUNAI';
		}
		else
		{
			$bantu_sisa='PIUTANG';
		}
		$query1 ="update tb_penjualan_sp 
		set bayar_tunai='$uangmuka', bayar_transfer='$transfer', sisa_bayar='$sisapembayaran', status_pembayaran='$bantu_sisa' 
		where id_penjualan_sp='$idpenjualan'";
											
		mysql_query($query1) or die("Gagal menyimpan data penjualan sp");
		
		header("location:../../dash.php?hp=penjualan-dompul&id=$idpenjualan&id2=$idcanvaser");
		
		//$link2 = "<script>window.open('../../dash.php?hp=penjualan-sp')</script>";
		//$link3 = "<script>window.close()</script>";
		//echo $link2;
		//echo $link3;
		
		//$link = "<script>window.open('../../build/build-print/cetakpenjualansp.php?id=$idpenjualan&id2=$idcanvaser','print_popup','width=1000,height=800')</script>";
		//echo $link;
	}
?>