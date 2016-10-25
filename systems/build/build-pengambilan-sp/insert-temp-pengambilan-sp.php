<?php
	session_start();
	include "../../../auth/autho.php";
	$id_bo = $_SESSION[id_bo];
	$no_user = $_SESSION[No_User];
	$hak_akses = $_POST['hak_akses'];
	$tgl_input = $_POST['tgl_input'];
	$hu_1 = $_POST['hu_1'];
	
	if($hak_akses==3)
	{
		$id_canvaser = $_POST['canvaser'];
		$jumlah2 = count($_POST["pilih2"]);
		
		for($i=0; $i < $jumlah2; $i++)
		{	
			$ip=$_POST["pilih2"][$i];

			$query2 ="INSERT INTO tb_temp_pengambilan_sp (id_sales, hu_1, ip) 
			VALUES ('$id_canvaser', '$hu_1', '$ip')";
			mysql_query($query2)or die("BO gagal menyimpan data konfirmasi pengambilan starting pack (2)");
		}
		header("location:../../dash.php?hp=konfirmasi-pengambilan-sp&idcanvaser=$id_canvaser");
	}
?>