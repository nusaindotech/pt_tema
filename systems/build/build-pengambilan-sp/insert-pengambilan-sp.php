<?php
	session_start();
	include "../../../auth/autho.php";
	$id_bo = $_SESSION[id_bo];;
	$hak_akses = $_POST['hak_akses'];
	$tgl_input = $_POST['tgl_input'];
	$id_canvaser = $_POST['canvaser'];
	if($hak_akses==3)
	{
		$ast=mysql_query("SELECT count(id_pengambilan_sp) as total from tb_pengambilan_sp");
		$row=mysql_fetch_array($ast);
		$koder=$row['total'];
		$id=$koder+1;
		
		$query1 ="INSERT INTO tb_pengambilan_sp (id_pengambilan_sp, id_bo, id_sales, tanggal_ambil) 
			VALUES ('$id','$id_bo','$id_canvaser','$tgl_input')";
		mysql_query($query1)or die("BO gagal menyimpan data pengambilan starting pack (1)");
		
		$tampil=mysql_query("select ip, hu_1
							from tb_temp_pengambilan_sp 
							where id_sales='$id_canvaser'");
        while($row2=mysql_fetch_array($tampil))
        {
			$query2 ="INSERT INTO tb_detail_pengambilan (id_pengambilan_sp, hu_1, ip) 
			VALUES ('$id','$row2[1]','$row2[0]')";
			mysql_query($query2)or die("BO gagal menyimpan data pengambilan starting pack (2)");
			
			$query3 ="update tb_sp set
				     id_sales='$id_canvaser'
				     where ip='$row2[0]'";
			mysql_query($query3)or die("BO gagal menyimpan data pengambilan starting pack (3)");
			
			$query4 ="DELETE FROM tb_temp_pengambilan_sp where hu_1='$row2[1]' and id_sales='$id_canvaser'";											
			mysql_query($query4) or die("Gagal menghapus data sementara");
		}
		header("location:../../dash.php?hp=konfirmasi-pengambilan-sp2&id=$id&id2=$id_canvaser");
	}
?>