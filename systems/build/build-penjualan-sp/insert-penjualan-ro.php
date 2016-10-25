<?php
	include "../../../auth/autho.php";
	
	$id_barang	 = $_POST['id_barang'];
	$idpenjualan = $_POST['idpenjualan'];
	$idkios		 = $_POST['idkios'];
	$jumlah		 = $_POST['jumlah'];
	$idcanvaser	 = $_POST['idcanvaser'];

	//$idpenjualan	= $_POST['idpenjualan'];
	//$idcustomer		= $_POST['idcustomer'];
	//$nolainnya		= $_POST['nolainnya'];
	//$tujuan			= $_POST['tujuan'];
	//$jumlah			= $_POST['jumlah'];
	//$idbarang		= $_POST['idbarang'];
	//$catatan		= $_POST['catatan'];
	//$keterangan		= $_POST['keterangan'];
	
	$a2=mysql_query("SELECT harga_satuan from tb_detail_barang where id_barang='$id_barang'");
	$row2=mysql_fetch_array($a2);
	
	$harga_satuan 	= $row2['harga_satuan'];
	//$nama_barang 	= $row2['nama_barang'];
	
	$hargatotal 	= ($harga_satuan*$jumlah);
	echo $hargatotal; echo "<br />";
	echo $harga_satuan; echo "<br />";
	echo $jumlah;
	echo "<br />";
	
	//$tglsekarang	= date('Y-m-d');
		
		 $query1 ="INSERT INTO `tb_detail_penjualan_sp`(
		 `id_penjualan_sp`, 
		 `id_kios`, 
		 `id_barang`, 
		 `jumlah_sp`, 
		 `harga_satuan`, 
		 `harga_total`, 
		 `status_detail_psp`) 
		 VALUES
		 ('$idpenjualan',
		 '$idkios',
		 '$id_barang', 
		 '$jumlah', 
		 '$harga_satuan',
		 '$hargatotal',
		 '1')";
									
		mysql_query($query1) or die("Gagal menyimpan data penjualan ro");
		
		header("location:../../dash.php?hp=tampil-penjualan-ro&idpenjualan=$idpenjualan&idcanvaser=$idcanvaser&idkios=$idkios");
	// }
?>