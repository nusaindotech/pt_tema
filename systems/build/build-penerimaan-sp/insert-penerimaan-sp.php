<?php
	include "../../../auth/autho.php";
	$bo = $_POST['bo'];
	
	$jumlah1 = count($_POST["pilih"]);
	for($i=0; $i < $jumlah1; $i++)
	{	
		$id_hu2=$_POST["pilih"][$i];
		$query ="update tb_sp set
				 id_bo='$bo'
				 where hu_2='$id_hu2'";
		mysql_query($query)or die("HO gagal menyimpan data penerimaan starting pack");
	}
	header('location:../../dash.php?hp=penerimaan-sp');
?>