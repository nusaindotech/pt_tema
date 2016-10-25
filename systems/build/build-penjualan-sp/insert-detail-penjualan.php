<?php
	include "../../../auth/autho.php";
	
	$idcanvaser	= $_POST['idcanvaser'];    			
	$idpenjualan = $_POST['idpenjualan'];  			
	$idkios	= $_POST['idkios'];						
	
	$jumlah_tunai = $_POST['jumlah_tunai'];			
	$id_bank = $_POST['id_bank'];					
	$jumlah_transfer = $_POST['jumlah_transfer'];	
	
	$jumlah = count($_POST["pilih"]);				
	
	$tglsekarang = date('Y-m-d');
	$harga_total_kios=0;
	for($i=0; $i<$jumlah; $i++)
	{	
		$ip=$_POST["pilih"][$i];
		$jumlah_sp=$_POST["jumlah"][$i];
		
		$a1=mysql_query("select d.harga_satuan
			from tb_barang b, tb_detail_barang d
			where b.id_barang=d.id_barang and d.id_barang='$ip'");
		$row1=mysql_fetch_array($a1);
	
		$harga_satuan = $row1[0];
		$harga_total = ($jumlah_sp*$harga_satuan);
		$harga_total_kios = $harga_total + $harga_total_kios;
		
		$query1 ="INSERT INTO tb_detail_penjualan_sp(
				  id_penjualan_sp, 
				  id_kios, 
				  id_barang, 
				  jumlah_sp,
				  harga_satuan,
				  harga_total,
				  keterangan_detail_psp,  
				  status_detail_psp) 
				  VALUES
				  ('$idpenjualan',
				   '$idkios',  
				   '$ip',  
				   '$jumlah_sp',
				   '$harga_satuan',
				   '$harga_total',
				   '',
				   '1')";
									
		mysql_query($query1) or die("Gagal menyimpan data detail penjualan sp1");
	}
	
	$piutang=($jumlah_tunai+$jumlah_transfer)-$harga_total_kios;
	$query2 ="INSERT INTO tb_pembayaran_canvaser(
				  id_penjualan_sp, 
				  id_sales,
				  id_kios, 
				  id_bank, 
				  grand_total_kios,
				  cash_kios,
				  transfer,
				  piutang,
				  tanggal_bayar,
				  tanggal_input,
				  status_pembayaran_kios) 
				  VALUES
				  ('$idpenjualan',
				   '$idcanvaser',
				   '$idkios',
				   '$id_bank',
				   '$harga_total_kios',
				   '$jumlah_tunai',
				   '$jumlah_transfer',
				   '$piutang',
				   '$tglsekarang',
				   '$tglsekarang',
				   '1')";
									
	mysql_query($query2) or die("Gagal menyimpan data detail penjualan sp2");
	
		 
	header("location:../../dash.php?hp=penjualan-sp2&idpenjualan=$idpenjualan&idcanvaser=$idcanvaser");
?>