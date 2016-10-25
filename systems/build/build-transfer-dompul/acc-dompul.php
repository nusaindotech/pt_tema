<?php
	include "../../../auth/autho.php";
	$no_transfer_dompul 	= $_POST['no_transfer_dompul'];
	$jumlah 	 			= $_POST['jumlah'];
	$jenis 	 				= $_POST['jenis'];
	$nohpmd 	 			= $_POST['nohpmd'];
	$idho 		 			= $_POST['idho'];
	$nouser 	 			= $_POST['nouser'];
	$tanggal_transfer		= $_POST['tanggal_transfer'];
	$tglsekarang	 = date('Y-m-d');

	if($no_transfer_dompul==0)
	{	
		die("Isikan jumlah!");
	}
	else
	{	
		if($jenis=='5K')
		{
			$tampil3		=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$nohpmd'");
			$hasils3		=mysql_fetch_assoc($tampil3);
			$saldoawal_dp5	=$hasils3['saldo_dp5'];
			
			$query1 ="update tb_sub_master_dompul set saldo_dp5=saldo_dp5+$jumlah where no_hp_sub_master_dompul='$nohpmd'";
			$query2 ="update tb_transfer_dompul set status_transaksi=1 where no_transfer_dompul='$no_transfer_dompul'";
			
			mysql_query($query1) or die("Gagal menyimpan data Transfer Dompul 5K");
			mysql_query($query2) or die("Gagal menyimpan data Transfer Update Dompul 5K");
			
			$tampil4		=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$nohpmd'");
			$hasils4		=mysql_fetch_assoc($tampil4);
			$saldoakhir_dp5	=$hasils4['saldo_dp5'];
			
			$query3	= "insert into tb_mutasi_dompul (id_ho, 
												 id_bo, 
												 No_User, 
												 id_type_dompul, 
												 no_hp_sub_master_dompul, 
												 jumlah_dompul, 
												 saldo_awal, 
												 saldo_akhir, 
												 tipe, 
												 tanggal_transaksi, 
												 tanggal_input, 
												 status_mutasi_dompul)
												 value
												 ('$idho',
												  '',
												  '$nouser',
												  'DP5',
												  '$nohpmd',
												  '$jumlah',
												  '$saldoawal_dp5',
												  '$saldoakhir_dp5',
												  'IN',
												  '$tanggal_transfer',
												  '$tglsekarang',
												  '0'
												 )";
			
			mysql_query($query3) or die("Gagal menyimpan data Mutasi Dompul 5K");
		}
		else if($jenis=='10K')
		{
			$tampil3		=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$nohpmd'");
			$hasils3		=mysql_fetch_assoc($tampil3);
			$saldoawal_dp10	=$hasils3['saldo_dp10'];
			
			$query1 ="update tb_sub_master_dompul set saldo_dp10=saldo_dp10+$jumlah where no_hp_sub_master_dompul='$nohpmd'";
			$query2 ="update tb_transfer_dompul set status_transaksi=1 where no_transfer_dompul='$no_transfer_dompul'";
			
			mysql_query($query1) or die("Gagal menyimpan data Transfer Dompul 10K");
			mysql_query($query2) or die("Gagal menyimpan data Transfer Update Dompul 10K");
			
			$tampil4			=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$nohpmd'");
			$hasils4			=mysql_fetch_assoc($tampil4);
			$saldoakhir_dp10	=$hasils4['saldo_dp10'];
			
			$query3	= "insert into tb_mutasi_dompul (id_ho, 
												 id_bo, 
												 No_User, 
												 id_type_dompul, 
												 no_hp_sub_master_dompul, 
												 jumlah_dompul, 
												 saldo_awal, 
												 saldo_akhir, 
												 tipe, 
												 tanggal_transaksi, 
												 tanggal_input, 
												 status_mutasi_dompul)
												 value
												 ('$idho',
												  '',
												  '$nouser',
												  'DP10',
												  '$nohpmd',
												  '$jumlah',
												  '$saldoawal_dp10',
												  '$saldoakhir_dp10',
												  'IN',
												  '$tanggal_transfer',
												  '$tglsekarang',
												  '0'
												 )";
			
			mysql_query($query3) or die("Gagal menyimpan data Mutasi Dompul 10K");
		}
		else if($jenis=='Rupiah')
		{
			$tampil3			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$nohpmd'");
			$hasils3			=mysql_fetch_assoc($tampil3);
			$saldoawal_dompul	=$hasils3['saldo_dompul'];
			
			$query1 ="update tb_sub_master_dompul set saldo_dompul=saldo_dompul+$jumlah where no_hp_sub_master_dompul='$nohpmd'";
			$query2 ="update tb_transfer_dompul set status_transaksi=1 where no_transfer_dompul='$no_transfer_dompul'";
			
			mysql_query($query1) or die("Gagal menyimpan data Transfer Dompul Rupiah");
			mysql_query($query2) or die("Gagal menyimpan data Transfer Update Dompul Rupiah");
			
			$tampil4			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$nohpmd'");
			$hasils4			=mysql_fetch_assoc($tampil4);
			$saldoakhir_dompul	=$hasils4['saldo_dompul'];
			
			$query3	= "insert into tb_mutasi_dompul (id_ho, 
												 id_bo, 
												 No_User, 
												 id_type_dompul, 
												 no_hp_sub_master_dompul, 
												 jumlah_dompul, 
												 saldo_awal, 
												 saldo_akhir, 
												 tipe, 
												 tanggal_transaksi, 
												 tanggal_input, 
												 status_mutasi_dompul)
												 value
												 ('$idho',
												  '',
												  '$nouser',
												  'DOMPUL',
												  '$nohpmd',
												  '$jumlah',
												  '$saldoawal_dompul',
												  '$saldoakhir_dompul',
												  'IN',
												  '$tanggal_transfer',
												  '$tglsekarang',
												  '0'
												 )";
			
			mysql_query($query3) or die("Gagal menyimpan data Mutasi Dompul");
		}
		else 
		{
			echo "Gagal!! Cek Koneksi anda";
		}
		
		
		
		header('location:../../dash.php?hp=transfer-dompul');
	}
?>