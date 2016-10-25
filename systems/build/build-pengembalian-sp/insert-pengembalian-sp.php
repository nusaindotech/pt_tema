<?php
	include "../../../auth/autho.php";
	$hak_akses = $_POST['hak_akses'];
	$id_ps = $_POST['id_ps'];
	
	if($hak_akses==3)
	{
		$jumlah = count($_POST["pilih"]);
		for($i=0; $i<$jumlah; $i++)
		{	
			$ip=$_POST["pilih"][$i];
			$query ="update tb_sp set
				     id_sales='0'
				     where ip='$ip'";
			mysql_query($query)or die("BO gagal menyimpan data pengembalian starting pack");
			
			$query2 ="DELETE FROM tb_detail_pengambilan WHERE ip='$ip'";
			mysql_query($query2)or die("BO gagal menghapus data detail pengambilan sp");
		}
		
		header("location:../../dash.php?hp=pengembalian-sp&id=$id_ps");
	}
?>