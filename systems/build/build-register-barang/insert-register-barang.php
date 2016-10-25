<?php
	include "../../../auth/autho.php";
	$hak_akses = $_POST['hak_akses'];
	$bo = $_POST['bo'];
	$ho = $_POST['ho'];
	$tgl_input = date('Y-m-d');
	if($hak_akses==2)
	{	
		$bantu2="select count(id_register_sp) from tb_register_sp";
		$hasil_bantu2=mysql_query($bantu2);
		$data_bantu2=mysql_fetch_array($hasil_bantu2);
		$no_register=$data_bantu2[0]+1;
		$id_register='REG'.$no_register;
		
		$query ="INSERT INTO tb_register_sp(id_register_sp, id_ho, id_bo, tanggal_register_sp, status_register_sp) 
				VALUES ('$id_register','$ho',$bo,'$tgl_input','0')";
		mysql_query($query)or die("HO gagal menyimpan data register starting pack 1");
		
		$jumlah1 = count($_POST["pilih1"]);
		for($i=0; $i < $jumlah1; $i++)
		{	
			$id_hu2=$_POST["pilih1"][$i];
			$bantu3="select count(hu_2)
			from tb_sp
			where hu_2='$id_hu2' and id_kios='0' and id_sales='0'";
			$hasil_bantu3=mysql_query($bantu3);
			$data_bantu3=mysql_fetch_array($hasil_bantu3);
			$query2 ="INSERT INTO tb_detail_register_sp(id_register_sp, hu_2, jumlah_sp, status_detail) 
			VALUES ('$id_register','$id_hu2','$data_bantu3[0]','0')";
			mysql_query($query2)or die("HO gagal menyimpan data register starting pack 2");
		}
		header("location:../../dash.php?hp=detail-register-barang&id=$id_register");
	}
?>