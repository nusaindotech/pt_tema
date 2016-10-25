<?php
	include "../../../auth/autho.php";
	
	$id_bo		= $_POST['id_bo'];
	$id_ho		= $_POST['id_ho'];
	$canvaser		= $_POST['canvaser'];
	$tanggal_input	= $_POST['tanggal_input'];
	$tglsekarang	= date('Y-m-d');
	
	$bantuho='';
	$bantubo='';
	if($id_bo=='0')
	{
		$bantu1="select kode_ho from tb_ho where id_ho='$id_ho'";
		$hasil_bantu1=mysql_query($bantu1);
		$data_bantu1=mysql_fetch_array($hasil_bantu1);
		$bantuho=$data_bantu1[0];
		$bantubo='BO';
	}
	else
	{
		$bantu2="select kode_ho from tb_ho where id_ho='$id_ho'";
		$hasil_bantu2=mysql_query($bantu2);
		$data_bantu2=mysql_fetch_array($hasil_bantu2);
		$bantuho=$data_bantu2[0];
		
		$bantu3="select kode_bo from tb_bo where id_bo='$id_bo'";
		$hasil_bantu3=mysql_query($bantu3);
		$data_bantu3=mysql_fetch_array($hasil_bantu3);
		$bantubo=$data_bantu3[0];
	}
	
	$a=mysql_query("select count(id_penjualan_sp)
					from tb_penjualan_sp");
					$row=mysql_fetch_array($a);
					$koder=$row[0];
					$id=$koder+1;
	
	$tahuns	= date('Y');
	$bulan	= date('m');
	$tahun	= substr($tahuns,2,3);

		if ($id<10)
		{
			$idpenjualan="SP/".$bantuho."/".$bantubo."/".$tahun.$bulan."000".$id;
		}
		else if($id<100) 
		{
			$idpenjualan="SP/".$bantuho."/".$bantubo."/".$tahun.$bulan."00".$id;
		}
		else if($id<1000) 
		{
			$idpenjualan="SP/".$bantuho."/".$bantubo."/".$tahun.$bulan."0".$id;	
		}
		else
		{
			$idpenjualan="SP/".$bantuho."/".$bantubo."/".$tahun.$bulan.$id;
		}
		
	if(empty($canvaser))
	{	
		die("Isikan Nama Canvaser!");
	}
	else
	{
		$query1 ="INSERT INTO tb_penjualan_sp(id_penjualan_sp, id_sales, id_kasir, id_bo, id_pic, tanggal_penjualan_sp, tanggal_input, bayar_tunai, bayar_transfer, 
		sisa_bayar, status_pembayaran, status_penjualan) 
		VALUES ('$idpenjualan', '$canvaser', '1', '$id_bo', '1', '$tanggal_input', '$tglsekarang', '', '', '', '', '1')";
		
		mysql_query($query1) or die("Gagal menyimpan data penjualan sp");
		
		header("location:../../dash.php?hp=penjualan-dompul2&idpenjualan=$idpenjualan&idcanvaser=$canvaser");
	}
	
?>