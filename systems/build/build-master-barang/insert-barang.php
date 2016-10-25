<?php
	include "../../../auth/autho.php";
	$namabarang	= $_POST['namabarang'];
	$kategori	= $_POST['kategori'];
	$satuan		= $_POST['satuan'];
	$jumlah		= $_POST['jumlah'];
	$stokminimum	= $_POST['stokminimum'];
	$harga	= $_POST['harga'];
	$keterangan		= $_POST['keterangan'];

	if (empty($namabarang))
	{	
		die("Isikan Nama Barang!");
	}
	else
	{
	
	$ast=mysql_query("SELECT count(id_barang) as total from tb_barang");
	$row=mysql_fetch_array($ast);
	$koder=$row['total'];
	$id=$koder+1;
	if ($id<10){
		$idbaru="BG".$kategori."00".$id;
	}else{
		$idbaru="BG".$kategori."0".$id;
	}
	$bantukategori=$kategori+1;
		 $query1 ="INSERT INTO tb_barang(id_barang,
										 id_kategori_barang,
										 nama_barang,
										 satuan,
										 keterangan,
										 status_barang) 
							   VALUES('$idbaru',
									  '$bantukategori',
									  '$namabarang',
									  '$satuan',
									  '$keterangan',
									  '1')";
			
		$query2 ="INSERT INTO tb_detail_barang(id_barang,
										harga_satuan,
										 jumlah_stok,
										 jumlah_stok_konversi,
										 jumlah_satuan_konversi,
										 stok_minimum) 
							   VALUES('$idbaru',
									  '$harga',
									  '$jumlah',
									  '0',
									  '0',
									  '$stokminimum')";
									
		mysql_query($query1) or die("Gagal menyimpan data Barang");
		mysql_query($query2) or die("Gagal menyimpan Detail Barang");
		header('location:../../dash.php?hp=master-barang');
	}
?>