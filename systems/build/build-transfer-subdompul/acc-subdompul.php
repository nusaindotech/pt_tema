<?php
	include "../../../auth/autho.php";
	$no_transfer_subdompul 	= $_POST['no_transfer_subdompul'];
	$jumlah 	 			= $_POST['jumlah'];
	$jenis 	 				= $_POST['jenis'];
	$nohpmdasal 	 		= $_POST['nohpmdasal'];
	$nohpmdtujuan 	 		= $_POST['nohpmdtujuan'];
	$tglsekarang	 = date('Y-m-d');

	if($jumlah==0)
	{	
		die("Isikan jumlah!");
	}
	else
	{	
		if($jenis=='5K')
		{
			$query1 ="update tb_sub_master_dompul set saldo_dp5=saldo_dp5+$jumlah where no_hp_sub_master_dompul='$nohpmdtujuan'";
			
			$query2 ="update tb_transfer_subdompul set status_transaksi=1 where no_transfer_subdompul='$no_transfer_subdompul'";
			
			$query3 ="update tb_sub_master_dompul set saldo_dp5=saldo_dp5-$jumlah where no_hp_sub_master_dompul='$nohpmdasal'";
			
			mysql_query($query1) or die("Gagal menyimpan data Transfer Dompul Tujuan 5K");
			mysql_query($query2) or die("Gagal menyimpan data Transfer Update Dompul 5K");
			mysql_query($query3) or die("Gagal menyimpan data Transfer Update Asal 5K");
		}
		else if($jenis=='10K')
		{
			$query1 ="update tb_sub_master_dompul set saldo_dp10=saldo_dp10+$jumlah where no_hp_sub_master_dompul='$nohpmdtujuan'";
			
			$query2 ="update tb_transfer_subdompul set status_transaksi=1 where no_transfer_subdompul='$no_transfer_subdompul'";
			
			$query3 ="update tb_sub_master_dompul set saldo_dp10=saldo_dp10-$jumlah where no_hp_sub_master_dompul='$nohpmdasal'";
			
			mysql_query($query1) or die("Gagal menyimpan data Transfer Dompul Tujuan 10K");
			mysql_query($query2) or die("Gagal menyimpan data Transfer Update Dompul 10K");
			mysql_query($query3) or die("Gagal menyimpan data Transfer Update Asal 10K");
		}
		else if($jenis=='Rupiah')
		{
			$query1 ="update tb_sub_master_dompul set saldo_dompul=saldo_dompul+$jumlah where no_hp_sub_master_dompul='$nohpmdtujuan'";
			
			$query2 ="update tb_transfer_subdompul set status_transaksi=1 where no_transfer_subdompul='$no_transfer_subdompul'";
			
			$query3 ="update tb_sub_master_dompul set saldo_dompul=saldo_dompul-$jumlah where no_hp_sub_master_dompul='$nohpmdasal'";
			
			mysql_query($query1) or die("Gagal menyimpan data Transfer Dompul Tujuan Dompul");
			mysql_query($query2) or die("Gagal menyimpan data Transfer Update Dompul Dompul");
			mysql_query($query3) or die("Gagal menyimpan data Transfer Update Asal Dompul");
		}
		else 
		{
			echo "Gagal!! Cek Koneksi anda";
		}
		
		header('location:../../dash.php?hp=transfer-subdompul');
	}
?>