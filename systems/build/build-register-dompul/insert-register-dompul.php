<?php
	include "../../../auth/autho.php";
	$hak_akses = $_POST['hak_akses'];
	$id_dompul = $_POST['id_dompul'];
	$bo = $_POST['bo'];
	$ho = $_POST['ho'];
	$jumlah = $_POST['jumlah'];
	$tgl_input=date('Y-m-d');
	
	if($hak_akses==2)
	{
		$query ="INSERT INTO tb_pengiriman_dompul(id_ho, id_bo, id_ro, jumlah_kirim, tgl_input) 
		VALUES ('$ho','$bo','','$jumlah','$tgl_input')";
		mysql_query($query)or die("HO gagal menyimpan data register dompul");
	}
		header('location:../../dash.php?hp=register-dompul');
	/**
	else if($hak_akses==3)
	{
		$ro = $_POST['ro'];
		$jumlah2 = count($_POST["pilih2"]);
		for($i=0; $i < $jumlah2; $i++)
		{	
			$id_hu1=$_POST["pilih2"][$i];
			$query ="update tb_sp set
				     id_kios='$ro'
				     where hu_1='$id_hu1'";
			mysql_query($query)or die("BO gagal menyimpan data register starting pack");
		}
		header('location:../../dash.php?hp=register-b');
	}
	**/
?>