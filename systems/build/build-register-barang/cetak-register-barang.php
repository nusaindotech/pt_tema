<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
	session_start();
	$id_ho = $_SESSION[id_ho];
	$id_bo = $_SESSION[id_bo];
	include "../../../auth/autho.php";
	$id_reg = $_GET['id'];
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
      <td align="center" colspan="9"><div class="style1">LAPORAN PENGIRIMAN SP</div></td>
    </tr>
	<tr>
      <td align="center" colspan="9">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
			<td width="13%">No Register : </td>
			<td width="25%"><?php echo $id_reg; ?></td>
			<td width="17%">Tanggal Register : </td>
			<?php
				$bantu3="select tanggal_register_sp, id_ho, id_bo from tb_register_sp where id_register_sp='$id_reg'";
				$hasil_bantu3=mysql_query($bantu3);
				$data_bantu3=mysql_fetch_array($hasil_bantu3);
			?>
			<td width="20%"><?php echo $data_bantu3[0]; ?></td>
			<?php
				$bantu5="select nama_bo from tb_bo where id_bo='$data_bantu3[2]'";
				$hasil_bantu5=mysql_query($bantu5);
				$data_bantu5=mysql_fetch_array($hasil_bantu5);
		  ?>
          <td width="30%" align="right">Penerima : <?php echo $data_bantu5[0]; ?></td>
    </tr>
  </table>
  <br />
  Daftar HU Yang Dikirim :
	<table width="700" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
	<tr height="28">
		<td><center>No</center></td>
		<td><center>HU 2</center></td>
		<td><center>Total SP</center></td>
	</tr>
	<?php 
        $tampil=mysql_query("select distinct(hu_2)
				from tb_detail_register_sp where id_register_sp='$id_reg'");
        $no=1;
		$hitung_sp=0;
        while($row=mysql_fetch_array($tampil))
        {
	?>
		<tr>
		<td><center><?php echo $no; ?></center></td>
		<td><center><?php echo $row[0]; ?></center></td>
        <?php
		$bantu="select jumlah_sp
		from tb_detail_register_sp
		where hu_2='$row[0]'";
		$hasil_bantu=mysql_query($bantu);
		$data_bantu=mysql_fetch_array($hasil_bantu);
		?>
        <td><center><?php echo $data_bantu[0]; ?></center></td>
		<?php $hitung_sp=$hitung_sp+$data_bantu[0]; ?>
        <input name="tgl_input" value="<?php echo date('Y-m-d'); ?>" type="hidden" />
		</tr>
		<?php 
		$no++;
		}								
	?>
	<tr height="28">
        <td>&nbsp;</td>
        <td align="center">Total SP Yang Diambil</td>
        <td align="center"><?php echo $hitung_sp; ?></td>
    </tr>
	<table>
  
  <table width="700" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="40%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
			<td width="40%">&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td><div align="center">Pengirim</div></td>
            <td><div align="center"></div></td>
			<td><div align="center">Penerima</div></td>
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
			<?php
			$bantu4="select nama_ho from tb_ho where id_ho='$id_ho'";
			$hasil_bantu4=mysql_query($bantu4);
			$data_bantu4=mysql_fetch_array($hasil_bantu4);
			?>
            <td><div align="center"><?php echo $data_bantu4[0]; ?></div></td>
			<td><div align="center"></div></td>
			<td><div align="center"><?php echo $data_bantu5[0]; ?></div></td>
          </tr>
        </table>
  <p>&nbsp;</p>
</div>
</body>

</html>
