<?php
	include "../../../auth/autho.php";
	
	$No_User			= $_POST['No_User'];
	$id_bo				= $_POST['id_bo'];
	$id_ho				= $_POST['id_ho'];
	$hp_kios			= $_POST['hp_kios'];    			
	$hp_sales 			= $_POST['hp_sales'];  			
	$grandtotal			= $_POST['grandtotal'];						
	$jumlahtunai		= $_POST['jumlahtunai'];						
	$idbank				= $_POST['idbank'];								
	$idbank2			= $_POST['idbank2'];								
	$idbank3			= $_POST['idbank3'];								
	$jumlahtransfer		= $_POST['jumlahtransfer'];	
	$jumlahtransfer2	= $_POST['jumlahtransfer2'];	
	$jumlahtransfer3	= $_POST['jumlahtransfer3'];	
	$catatan 			= $_POST['catatan'];				
	$tanggal_input 		= $_POST['tanggal_input'];

	$status 			= $_POST['status'];
	$id_rekening = $_POST['id_rekening'];
	
	$tglsekarang = date('Y-m-d');
	
	$tahuns	= date('Y');
	$bulan	= date('m');
	$tahun	= substr($tahuns,2,3);
	
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
	
	$a=mysql_query("select count(id_penjualan_dompul)
					from tb_penjualan_dompul");
					$row=mysql_fetch_array($a);
					$koder=$row[0];
					$id=$koder+1;
						
	if ($id<10)
		{
			$idpenjualan="DP/".$bantuho."/".$bantubo."/".$tahun.$bulan."000".$id;
		}
		else if($id<100) 
		{
			$idpenjualan="DP/".$bantuho."/".$bantubo."/".$tahun.$bulan."00".$id;
		}
		else if($id<1000) 
		{
			$idpenjualan="DP/".$bantuho."/".$bantubo."/".$tahun.$bulan."0".$id;	
		}
		else
		{
			$idpenjualan="DP/".$bantuho."/".$bantubo."/".$tahun.$bulan.$id;
		}
		
	$a1=mysql_query("SELECT id_sales from tb_sales where hp_sales='$hp_sales' ");
	$row1=mysql_fetch_array($a1);
	$idsales=$row1[0];
	
	$query1 ="INSERT INTO tb_penjualan_dompul(
				  id_penjualan_dompul, 
				  id_sales,
				  id_bo, 
				  hp_kios, 
				  No_User, 
				  tanggal_penjualan_dompul,
				  tanggal_input,
				  bank,
				  bank2,
				  bank3,
				  grand_total,
				  bayar_tunai,
				  bayar_transfer,
				  bayar_transfer2,
				  bayar_transfer3,
				  catatan,
				  status_pembayaran,
				  status_penjualan) 
				  VALUES
				  ('$idpenjualan',
				   '$idsales',
				   '$id_bo',
				   '$hp_kios',
				   '$No_User',
				   '$tanggal_input',
				   '$tglsekarang',
				   '$idbank',
				   '$idbank2',
				   '$idbank3',
				   '$grandtotal',
				   '$jumlahtunai',
				   '$jumlahtransfer',
				   '$jumlahtransfer2',
				   '$jumlahtransfer3',
				   '$catatan',
				   '1',
				   '1')";
									
	mysql_query($query1) or die("Gagal menyimpan data Penjualan Dompul");
	$hargatotal=0;
	
	$a2=mysql_query("SELECT no_upload_dompul, produk, no_faktur, qty, type_dompul, qty_program 
	from tb_upload_dompul where hp_kios='$hp_kios' and hp_sales='$hp_sales' and tanggal_transaksi='$tanggal_input' ");
	while($row2=mysql_fetch_array($a2))
	{
		
		$a4=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='$row2[produk]' and type_dompul='$row2[type_dompul]'");
		$row4=mysql_fetch_array($a4);
																																			
		if($row['type_dompul']=='')
		{
			$a5=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='$row2[produk]' and type_dompul='CVS'");
			$row5=mysql_fetch_array($a5);
													
			$tipe='Normal';
			$hargasatuan=$row5['harga_dompul'];
		}
		else
		{
			$tipe=$row['type_dompul'];
			$hargasatuan=$row['harga_dompul'];
		}
		$harga_total=$hargasatuan*$row2['qty'];
		
		$qtyaslikurang =$row2['qty']-$row2['qty_program'];
		
		$query2 ="
		INSERT INTO tb_detail_penjualan_dompul
				  (
					`id_penjualan_dompul` ,
					`no_upload_dompul` ,
					`produk` ,
					`type_dompul` ,
					`no_faktur` ,
					`hp_kios` ,
					`qty` ,
					`qty_program` ,
					`harga_satuan` ,
					`harga_total` ,
					`status_detail_dompul`
					) 
				  VALUES
				  ('$idpenjualan',
				   '$row2[no_upload_dompul]',
				   '$row2[produk]',
				   '$row2[type_dompul]',
				   '$row2[no_faktur]',
				   '$hp_kios',
				   '$qtyaslikurang',
				   '$row2[qty_program]',
				   '$hargasatuan',
				   '$harga_total',
				   '1')";
				   
		$query3 ="update tb_upload_dompul set status_bayar_dompul=1 where no_upload_dompul='$row2[no_upload_dompul]' ";
				   
		mysql_query($query2) or die("Gagal menyimpan data Penjualan Dompul");
		mysql_query($query3) or die("Gagal update data Penjualan Dompul");

		$queryrek ="UPDATE `tb_upload_rekening` SET 
		`no_user`='$No_User',
		`tanggal_pengakuan`='$tglsekarang',
		`isstatus`='1',
		'id_penjualan_dompul' = '$row2[no_upload_dompul]'
		WHERE `id_rekening`='$id_rekening'";

		mysql_query($queryrek) or die("Gagal menyimpan data Rekening");
	}

	
		
	header("location:../../dash.php?hp=penjualan-dompul4&canvaser=$hp_sales&tanggal_input=$tanggal_input");
?>