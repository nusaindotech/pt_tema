<?php
include "../../../auth/autho.php";

$kategoribarang =$_POST['kategoribarang'];
$rak =$_POST['rak'];
$namabarang =$_POST['namabarang'];
$satuan =$_POST['satuan'];
$keterangan =$_POST['keterangan'];
$stok_minimum =$_POST['stokminimum'];

$id_barang =$_POST['idbarang'];
$nama_barang =$_POST['namabarang'];
$tglsekarang	= date('Y-m-d');
	
	
	$query1 ="UPDATE `tb_barang` SET 
	`id_kategori_barang`='$kategoribarang',
	`id_rak`='$rak',
	`nama_barang`='$namabarang',
	`satuan`='$satuan',
	`keterangan`='$keterangan' 
	WHERE `id_barang`='$id_barang'";
	
	$query2 ="UPDATE `tb_detail_barang` SET 
	`stok_minimum`='$stok_minimum' 
	WHERE `id_barang`='$id_barang'";
	
							
	mysql_query($query1) or die("Gagal memperbarui data barang");
	mysql_query($query2) or die("Gagal memperbarui data stok barang");
	
	header("location:../../dash.php?hp=master-barang");

?>