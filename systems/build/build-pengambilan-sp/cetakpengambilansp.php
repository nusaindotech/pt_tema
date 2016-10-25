<?php
 include "../../../auth/autho.php";
 $idpengambilan =	$_GET['id'];
 $idcanvaser=	$_GET['id2'];
 $tglsekarang	= date('d-m-Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak Pengambilan SP</title>
<style type="text/css">
<!--
.style1 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" colspan="9"><div class="style1">LAPORAN PENGAMBILAN SP</div></td>
    </tr>
	<tr>
      <td align="center" colspan="9">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
			<td width="17%">No Pengambilan : </td>
			<td width="25%"><?php echo $idpengambilan; ?></td>
			<td width="9%">Tanggal : </td>
			<?php
				$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
				$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			?>
			<td width="25%"><?php echo date("j")." ".$bulan[date("n")]." ".date("Y"); ?></td>
			<?php
				$bantu_cek="select nama_sales
					 from tb_sales
					 where id_sales='$idcanvaser'";
				$hasil_cek=mysql_query($bantu_cek);
				$data_cek=mysql_fetch_array($hasil_cek);
		  ?>
          <td width="30%" align="right">Nama Canvasser : <?php echo $data_cek[0]; ?></td>
    </tr>
  </table>
  <br />
  Daftar HU Yang Diambil :
	<table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
	<tr height="28">
		<td><center>No</center></td>
		<td><center>HU 1</center></td>
		<td><center>Total SP</center></td>
	</tr>
	<?php 
        $tampil=mysql_query("select distinct(hu_1)
							from tb_detail_pengambilan where id_pengambilan_sp='$idpengambilan'");
        $no=1;
		$hitungsp=0;
        while($row=mysql_fetch_array($tampil))
        {
		?>
			<tr height="28">
				<td><center><?php echo $no; ?></center></td>
				<td><center><?php echo $row[0]; ?></center></td>
                <?php
					$bantu="select count(ip)
							from tb_detail_pengambilan
							where id_pengambilan_sp='$idpengambilan' and hu_1='$row[0]'";
					$hasil_bantu=mysql_query($bantu);
					$data_bantu=mysql_fetch_array($hasil_bantu);
					$hitungsp=$hitungsp+$data_bantu[0];
				?>
                <td><center><?php echo $data_bantu[0]; ?></center></td>	
			</tr>
		<?php 
		$no++;
		}									
	?>
	<tr height="28">
        <td>&nbsp;</td>
        <td align="center">Total SP Yang Diambil</td>
        <td align="center"><?php echo $hitungsp; ?></td>
    </tr>
	<table>
  
  <table width="700" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30%">&nbsp;</td>
            <td width="40%">&nbsp;</td>
			<td width="30%">&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td><div align="center">Kasir</div></td>
            <td><div align="center">Logistic</div></td>
			<td><div align="center">Canvasser</div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td><div align="center">Fikro</div></td>
            <td><div align="center">Sintia</div></td>
			<td><div align="center"><?php echo $data_cek[0]; ?></div></td>
          </tr>
        </table>
  <p>&nbsp;</p>
</div>
</body>

</html>
