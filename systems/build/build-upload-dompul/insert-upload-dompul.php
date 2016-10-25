<?php
	if (isset($_POST['submit']))
	{
		if(empty($_FILES["namafile"]["name"]))
		die ("Mohon dicek ulang file uploadnya <a href='location:../../dash.php?hp=upload-dompul'><---Kembali---></a>");
		error_reporting(E_ALL ^ E_NOTICE);
		
		echo '<div id="progress" style="width:300px;border:1px solid #ccc;"></div>';
		echo '<div id="info"></div>';	
	
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$start = $time;	
	
		include "reader.php";
		include "../../../auth/autho.php";
	
		$data = new Spreadsheet_Excel_Reader($_FILES['namafile']['tmp_name']);
		$baris = $data->rowcount($sheet_index=0);
		$sukses = 0;
		$gagal = 0;
		$none = 0;
		$update_sukses=0;
		$update_gagal=0;
		$id_ho		= $_POST['id_ho'];
		$id_bo		= $_POST['id_bo'];
		$No_User	= $_POST['No_User'];
		$tgl_input 	= $_POST['tgl_input'];
		
		for ($i=2; $i<=$baris; $i++)
		{	
			$barisreal = $baris-1;
			$k = $i-1;
			$percent = intval($k/$barisreal * 100)."%";
			echo '<script language="javascript">
			document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:lightblue\">&nbsp;</div>";
			document.getElementById("info").innerHTML="Proses upload '.$k.' data telah mencapai '.$percent.' .";
			</script>';	
		
			$no_hp_sub_master_dompul = $data->val($i, 2);
			$nama_sub_master_dompul = $data->val($i, 3);
			$tanggal_transaksi = $data->val($i, 4);
			$no_faktur = $data->val($i, 5);
			$produk = $data->val($i, 6);
			$qty = $data->val($i, 7);
			$balance = $data->val($i, 8);
			$diskon = $data->val($i, 9);
			$hp_kios = $data->val($i, 10);
			$nama_kios = $data->val($i, 11);
			$status = $data->val($i, 12);
			$hp_sales = $data->val($i, 13);
			$nama_sales = $data->val($i, 14);
			$print = $data->val($i, 15);
			$bayar = $data->val($i, 16);
			
			$qty1 = str_replace(".", "", $qty);
			$qty2 = str_replace(",", "", $qty1);
			
			$nama_sub_master_dompul_perbaikan = str_replace("'", "", $nama_sub_master_dompul);
			$no_faktur_perbaikan = str_replace("'", "", $no_faktur);
			$nama_kios_perbaikan = str_replace("'", "", $nama_kios);
			$nama_sales_perbaikan = str_replace("'", "", $nama_sales);
			
			$balance1 = str_replace(".", "", $balance);
			$balance2 = str_replace(",", "", $balance1);
		
			/* $tampil_ip=mysql_query("SELECT ip from tb_sp where ip='$ip'");
			$hasil2=mysql_fetch_assoc($tampil_ip);
			$ip2= $hasil2['ip']; */

				$query = "INSERT INTO `tb_upload_dompul` (
						`id_ho` ,
						`no_hp_sub_master_dompul` ,
						`nama_sub_master_dompul` ,
						`tanggal_transaksi` ,
						`no_faktur` ,
						`produk` ,
						`qty` ,
						`balance` ,
						`diskon` ,
						`hp_kios` ,
						`nama_kios` ,
						`status` ,
						`hp_sales` ,
						`nama_sales` ,
						`print` ,
						`bayar` ,
						`tanggal_input` ,
						`No_User` ,
						`status_upload_dompul`
						)
				VALUES ('$id_ho', 
						'$no_hp_sub_master_dompul', 
						'$nama_sub_master_dompul_perbaikan', 
						'$tanggal_transaksi', 
						'$no_faktur_perbaikan', 
						'$produk', 
						'$qty2', 
						'$balance2', 
						'$diskon', 
						'$hp_kios',
						'$nama_kios_perbaikan', 
						'$status', 
						'$hp_sales', 
						'$nama_sales_perbaikan', 
						'$print', 
						'$bayar',
						'$tgl_input',
						'$No_User',
						'0')";
				
				$hasil = mysql_query($query) or die("Gagal Upload Dompul ".mysql_error()."<br/>");
				
				if($hasil)
				{
					$sukses++;
					
					$tampil			=mysql_query("SELECT tipe_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
					$hasils			=mysql_fetch_assoc($tampil);
					$tipe_dompul1	=$hasils['tipe_dompul'];
					
					$tampil2		=mysql_query("SELECT tipe_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
					$hasils2		=mysql_fetch_assoc($tampil2);
					$tipe_dompul2	=$hasils2['tipe_dompul'];
					
					if($tipe_dompul1=='MD' and $tipe_dompul2=='SD')
					{
						if($produk=='DP5')
						{
							$query1 		="UPDATE `tb_sub_master_dompul` SET `saldo_dp5`=saldo_dp5-'$qty2' WHERE `no_hp_sub_master_dompul`='$no_hp_sub_master_dompul'";
							$query2			="UPDATE `tb_sub_master_dompul` SET `saldo_dp5`=saldo_dp5+'$qty2' WHERE `no_hp_sub_master_dompul`='$hp_kios'";
							
							$tampil3		=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils3		=mysql_fetch_assoc($tampil3);
							$saldoawal_dp5	=$hasils3['saldo_dp5'];
					
							mysql_query($query1) or die("Gagal Mengurangi STOK 5K");						
							
							$tampil4		=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils4		=mysql_fetch_assoc($tampil4);
							$saldoakhir_dp5	=$hasils4['saldo_dp5'];
							
							$tampil5		=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
							$hasils5		=mysql_fetch_assoc($tampil5);
							$saldoawal2_dp5	=$hasils5['saldo_dp5'];
							
							mysql_query($query2) or die("Gagal Menambah STOK 5K");
							
							$tampil6			=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
							$hasils6			=mysql_fetch_assoc($tampil6);
							$saldoakhir2_dp5	=$hasils6['saldo_dp5'];
							
							$query3 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$no_hp_sub_master_dompul', 
										'$qty2', 
										'$saldoawal_dp5', 
										'$saldoakhir_dp5', 
										'OUT', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
										
							$query4 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$hp_kios', 
										'$qty2', 
										'$saldoawal2_dp5', 
										'$saldoakhir2_dp5', 
										'IN', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
							
							mysql_query($query3) or die("Gagal Menambah Mutasi MD 5K");
							mysql_query($query4) or die("Gagal Menambah Mutasi SD 5K");
						}
						else if($produk=='DP10')
						{
							$query1 			="UPDATE `tb_sub_master_dompul` SET `saldo_dp10`=saldo_dp10-'$qty2' WHERE `no_hp_sub_master_dompul`='$no_hp_sub_master_dompul'";
							$query2				="UPDATE `tb_sub_master_dompul` SET `saldo_dp10`=saldo_dp10+'$qty2' WHERE `no_hp_sub_master_dompul`='$hp_kios'";
							
							$tampil3			=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils3			=mysql_fetch_assoc($tampil3);
							$saldoawal_dp10		=$hasils3['saldo_dp10'];
							
							mysql_query($query1) or die("Gagal Mengurangi STOK 10K");
							
							$tampil4			=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils4			=mysql_fetch_assoc($tampil4);
							$saldoakhir_dp10	=$hasils4['saldo_dp10'];
							
							$tampil5			=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
							$hasils5			=mysql_fetch_assoc($tampil5);
							$saldoawal2_dp10	=$hasils5['saldo_dp10'];
							
							mysql_query($query2) or die("Gagal Menambah STOK 10K");
							
							$tampil6			=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
							$hasils6			=mysql_fetch_assoc($tampil6);
							$saldoakhir2_dp10	=$hasils6['saldo_dp10'];
							
							$query3 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$no_hp_sub_master_dompul', 
										'$qty2', 
										'$saldoawal_dp10', 
										'$saldoakhir_dp10', 
										'OUT', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
										
							$query4 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$hp_kios', 
										'$qty2', 
										'$saldoawal2_dp10', 
										'$saldoakhir2_dp10', 
										'IN', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
							
							mysql_query($query3) or die("Gagal Menambah Mutasi MD 10K");
							mysql_query($query4) or die("Gagal Menambah Mutasi SD 10K");
						}
						else if($produk=='DOMPUL')
						{
							$query1 ="UPDATE `tb_sub_master_dompul` SET `saldo_dompul`=saldo_dompul-'$qty2' WHERE `no_hp_sub_master_dompul`='$no_hp_sub_master_dompul'";
							$query2 ="UPDATE `tb_sub_master_dompul` SET `saldo_dompul`=saldo_dompul+'$qty2' WHERE `no_hp_sub_master_dompul`='$hp_kios'";

							$tampil3			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils3			=mysql_fetch_assoc($tampil3);
							$saldoawal_dompul	=$hasils3['saldo_dompul'];
														
							mysql_query($query1) or die("Gagal Mengurangi STOK Rupiah");
							
							$tampil4			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils4			=mysql_fetch_assoc($tampil4);
							$saldoakhir_dompul	=$hasils4['saldo_dompul'];
							
							$tampil5			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
							$hasils5			=mysql_fetch_assoc($tampil5);
							$saldoawal2_dompul	=$hasils5['saldo_dompul'];							
							
							mysql_query($query2) or die("Gagal Menambah STOK Rupiah");
							
							$tampil6			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$hp_kios'");
							$hasils6			=mysql_fetch_assoc($tampil6);
							$saldoakhir2_dompul	=$hasils6['saldo_dompul'];
							
							$query3 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$no_hp_sub_master_dompul', 
										'$qty2', 
										'$saldoawal_dompul', 
										'$saldoakhir_dompul', 
										'OUT', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
										
							$query4 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$hp_kios', 
										'$qty2', 
										'$saldoawal2_dompul', 
										'$saldoakhir2_dompul', 
										'IN', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
							
							mysql_query($query3) or die("Gagal Menambah Mutasi MD Dompul");
							mysql_query($query4) or die("Gagal Menambah Mutasi SD Dompul");
						}
						else
						{
							$none++;
						}
					}
					else
					{
						if($produk=='DP5')
						{
							$query1 ="UPDATE `tb_sub_master_dompul` SET `saldo_dp5`=saldo_dp5-'$qty2' WHERE `no_hp_sub_master_dompul`='$no_hp_sub_master_dompul'";
							
							$tampil3			=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils3			=mysql_fetch_assoc($tampil3);
							$saldoawal_dp5		=$hasils3['saldo_dp5'];
														
							mysql_query($query1) or die("Gagal Mengurangi STOK 5K");
							
							$tampil4			=mysql_query("SELECT saldo_dp5 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils4			=mysql_fetch_assoc($tampil4);
							$saldoakhir_dp5		=$hasils4['saldo_dp5'];
							
							$query3 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$no_hp_sub_master_dompul', 
										'$qty2', 
										'$saldoawal_dp5', 
										'$saldoakhir_dp5', 
										'OUT', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
																	
							mysql_query($query3) or die("Gagal Menambah Mutasi SD DP5");
						}
						else if($produk=='DP10')
						{
							$query1 ="UPDATE `tb_sub_master_dompul` SET `saldo_dp10`=saldo_dp10-'$qty2' WHERE `no_hp_sub_master_dompul`='$no_hp_sub_master_dompul'";
							
							$tampil3			=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils3			=mysql_fetch_assoc($tampil3);
							$saldoawal_dp10		=$hasils3['saldo_dp10'];
							
							mysql_query($query1) or die("Gagal Mengurangi STOK 10K");
							
							$tampil4			=mysql_query("SELECT saldo_dp10 from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils4			=mysql_fetch_assoc($tampil4);
							$saldoakhir_dp10		=$hasils4['saldo_dp10'];
							
							$query3 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$no_hp_sub_master_dompul', 
										'$qty2', 
										'$saldoawal_dp10', 
										'$saldoakhir_dp10', 
										'OUT', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
																	
							mysql_query($query3) or die("Gagal Menambah Mutasi SD DP10");
						}
						else if($produk=='DOMPUL')
						{
							$query1 ="UPDATE `tb_sub_master_dompul` SET `saldo_dompul`=saldo_dompul-'$qty2' WHERE `no_hp_sub_master_dompul`='$no_hp_sub_master_dompul'";
							
							$tampil3			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils3			=mysql_fetch_assoc($tampil3);
							$saldoawal_dompul	=$hasils3['saldo_dompul'];
							
							mysql_query($query1) or die("Gagal Mengurangi STOK Rupiah");
							
							$tampil4			=mysql_query("SELECT saldo_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$no_hp_sub_master_dompul'");
							$hasils4			=mysql_fetch_assoc($tampil4);
							$saldoakhir_dompul	=$hasils4['saldo_dompul'];
							
							$query3 = "INSERT INTO `tb_mutasi_dompul` (
										`id_ho` ,
										`id_bo` ,
										`No_User` ,
										`id_type_dompul` ,
										`no_hp_sub_master_dompul` ,
										`jumlah_dompul` ,
										`saldo_awal` ,
										`saldo_akhir` ,
										`tipe` ,
										`tanggal_transaksi` ,
										`tanggal_input` ,
										`status_mutasi_dompul`
										)
								VALUES ('$id_ho', 
										'$id_bo', 
										'$No_User', 
										'$produk', 
										'$no_hp_sub_master_dompul', 
										'$qty2', 
										'$saldoawal_dompul', 
										'$saldoakhir_dompul', 
										'OUT', 
										'$tanggal_transaksi',
										'$tgl_input', 
										'0')";
																	
							mysql_query($query3) or die("Gagal Menambah Mutasi SD Dompul");
						}
						else
						{
							$none++;
						}
					}
					
				}
				else
				{
					echo $ip;
					echo '<br>';
					$gagal++;	
				} 
		}
	
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		$total_menit = $total_time/60;
	
		echo "<p>Upload data selesai dalam waktu ".$total_menit." Menit<p>";
		echo "<p>Total Data Berhasil Upload : ".$sukses."<br>";
		echo "Total Data Gagal Upload : ".$gagal."</p>";
		echo "<p>Total Update Data Berhasil Upload : ".$update_sukses."<br>";
		echo "<p>Total None Upload : ".$none."<br>";
		echo "Total Update Data Gagal Upload : ".$update_gagal."<br><a href='../../dash.php?hp=upload-dompul'><---Kembali---></a>";
	}
?>