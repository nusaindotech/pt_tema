<?php
	if (isset($_POST['submit']))
	{
		if(empty($_FILES["namafile"]["name"]))
		die ("Mohon dicek ulang file uploadnya <a href='location:../../dash.php?hp=upload-sp'><---Kembali---></a>");
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
		$update_sukses=0;
		$update_gagal=0;
		$id_ho	= $_POST['id_ho'];
		$tgl_input = $_POST['tgl_input'];
		
		for ($i=2; $i<=$baris; $i++)
		{	
			$barisreal = $baris-1;
			$k = $i-1;
			$percent = intval($k/$barisreal * 100)."%";
			echo '<script language="javascript">
			document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:lightblue\">&nbsp;</div>";
			document.getElementById("info").innerHTML="Proses upload '.$k.' data telah mencapai '.$percent.' .";
			</script>';	
		
			$dealer_id = $data->val($i, 1);
			$subregion_name = $data->val($i, 2);
			$sodo_id = $data->val($i, 3);
			$sodo_creation_date = $data->val($i, 4);
			$expired_date = $data->val($i, 5);
			$detail_number = $data->val($i, 6);
			$material_name = $data->val($i, 7);
			$part_type = $data->val($i, 8);
			$part_sub_type = $data->val($i, 9);
			$iccid = $data->val($i, 10);
			$ip = $data->val($i, 11);
			$hu_1 = $data->val($i, 12);
			$good_issued = $data->val($i, 13);
			$hu_2 = $data->val($i, 14);
		
			$tampil_ip=mysql_query("SELECT ip from tb_sp where ip='$ip'");
			$hasil2=mysql_fetch_assoc($tampil_ip);
			$ip2= $hasil2['ip'];
		
			if($ip2==$ip)
			{
				$updates=mysql_query("update tb_sp set dealer_id='$dealer_id', sodo_id='$sodo_id', subregion_name='$subregion_name', 
				detail_number='$detail_number', hu_1='$hu_1', hu_2='$hu_2', part_sub_type='$part_sub_type', material_name='$material_name', part_type='$part_type', ip='$ip', 
				iccid='$iccid', good_issued='$good_issued', sodo_creation_date='$sodo_creation_date', expired_date='$expired_date', tanggal_input='$tgl_input', status_sp='0', 
				status_act='0' where ip='$ip2'");
			
				if($updates)
				{
					$update_sukses++;
				}
				else
				{
					echo $ip;
					echo '<br>';
					$update_gagal++;
				}
			}
			else
			{
				$query = "INSERT INTO tb_sp(id_ho, id_bo, id_kios, id_sales, dealer_id, sodo_id, subregion_name, detail_number, hu_1, hu_2, part_sub_type, material_name, part_type, 
				ip, iccid, good_issued, sodo_creation_date, expired_date, tanggal_input, status_sp, status_act)
				VALUES ('$id_ho', '0', '0', '0', '$dealer_id', '$sodo_id', '$subregion_name', '$detail_number', '$hu_1', '$hu_2', '$part_sub_type', '$material_name', '$part_type',
				'$ip', '$iccid', '$good_issued', '$sodo_creation_date', '$expired_date', '$tgl_input', '0', '0')";
				$hasil = mysql_query($query) or die("Gagal ".mysql_error()."<br/>");
				
				if($hasil)
				{
					$sukses++;
				}
				else
				{
					echo $ip;
					echo '<br>';
					$gagal++;	
				} 
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
		echo "Total Update Data Gagal Upload : ".$update_gagal."<br><a href='../../dash.php?hp=upload-sp'><---Kembali---></a>";
	}
?>