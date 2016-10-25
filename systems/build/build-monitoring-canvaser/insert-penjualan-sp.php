<?php
	session_start();
	include "../../../auth/autho.php";
	$id_bo = $_SESSION[id_bo];
	$no_user = $_SESSION[No_User];
	$hak_akses = $_POST['hak_akses'];
	$tgl_input = $_POST['tgl_input'];
	if($hak_akses==3)
	{
		$id_canvaser = $_POST['canvaser'];
		$jumlah2 = count($_POST["pilih2"]);
		
		$ast=mysql_query("SELECT count(id_pengambilan_sp) as total from tb_pengambilan_sp");
		$row=mysql_fetch_array($ast);
		$koder=$row['total'];
		$id=$koder+1;
	
		$query2 ="INSERT INTO tb_pengambilan_sp (id_pengambilan_sp, id_bo, id_sales, No_User, tanggal_ambil) 
		VALUES ('$id', '$id_bo','$id_canvaser','$no_user','$tgl_input')";
		mysql_query($query2)or die("BO gagal menyimpan data pengambilan starting pack (2)");
		
		for($i=0; $i < $jumlah2; $i++)
		{	
			$id_hu1=$_POST["pilih2"][$i];
			
			$query ="update tb_sp set
				     id_sales='$id_canvaser'
				     where hu_1='$id_hu1'";
			mysql_query($query)or die("BO gagal menyimpan data pengambilan starting pack");

			$query3 ="INSERT INTO tb_detail_pengambilan (id_pengambilan_sp, hu_1) 
			VALUES ('$id','$id_hu1')";
			mysql_query($query3)or die("BO gagal menyimpan data pengambilan starting pack (3)");
		}
		header('location:../../dash.php?hp=penjualan-sp');
	}
?>