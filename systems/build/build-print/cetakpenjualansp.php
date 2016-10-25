<?php
 include "../../../auth/autho.php";
 $idpenjualan =	$_GET['id'];
 $idcanvaser=	$_GET['id2'];
 $tglsekarang	= date('d-m-Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cetak SP dan Dompul</title>
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
  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" colspan="9"><div class="style1">LAPORAN CANVASSER</div></td>
    </tr>
	<tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
			<td width="4%">No. : </td>
			<td width="35%"><?php echo $idpenjualan; ?></td>
			<td width="7%">Tanggal : </td>
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
  <table width="900" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
	<tr>
		<td width="45%">
			<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
				<tr height="27">
					<td colspan="4" align="center">KWITANSI DOMPUL</td>
				</tr>
				<tr height="27">
					<td rowspan="2" align="center">ITEM</td>
					<td align="center" colspan="3">PENJUALAN</td>
				</tr>
				<tr height="27">
					<td align="center">QTY</td>
					<td align="center">HARGA</td>
					<td align="center">JUMLAH</td>
				</tr>
				<tr height="27">
					<td width="45">&nbsp;1K</td>
					<?php
						$bantu1="select jumlah_dompul, harga_jual, harga_total
								from tb_detail_penjualan_dompul
								where id_penjualan_sp='$idpenjualan' and id_dompul='DOM-1'";
						$hasil1=mysql_query($bantu1);
						$data1=mysql_fetch_array($hasil1);
					?>
					<td width="50"><center><?php echo $data1[0]; ?></center></td>
					<td width="50"><center><?php echo number_format($data1[1],0); ?></center></td>
					<td width="50" align="right"><?php echo number_format($data1[2],0); ?>&nbsp;</td>
				</tr>
				<tr height="27">
					<td>&nbsp;5K</td>
					<?php
						$bantu2="select jumlah_dompul, harga_jual, harga_total
								from tb_detail_penjualan_dompul
								where id_penjualan_sp='$idpenjualan' and id_dompul='DOM-2'";
						$hasil2=mysql_query($bantu2);
						$data2=mysql_fetch_array($hasil2);
					?>
					<td width="50"><center><?php echo $data2[0]; ?></center></td>
					<td width="50"><center><?php echo number_format($data2[1],0); ?></center></td>
					<td width="50" align="right"><?php echo number_format($data2[2],0); ?>&nbsp;</td>
				</tr>
				<tr height="27">
					<td>&nbsp;10K</td>
					<?php
						$bantu3="select jumlah_dompul, harga_jual, harga_total
								from tb_detail_penjualan_dompul
								where id_penjualan_sp='$idpenjualan' and id_dompul='DOM-3'";
						$hasil3=mysql_query($bantu3);
						$data3=mysql_fetch_array($hasil3);
					?>
					<td width="50"><center><?php echo $data3[0]; ?></center></td>
					<td width="50"><center><?php echo number_format($data3[1],0); ?></center></td>
					<td width="50" align="right"><?php echo number_format($data3[2],0); ?>&nbsp;</td>
				</tr>
				<tr height="27">
					<td>&nbsp;Rupiah</td>
					<?php
						$bantu4="select jumlah_dompul, harga_jual, harga_total
								from tb_detail_penjualan_dompul
								where id_penjualan_sp='$idpenjualan' and id_dompul='DOM-4'";
						$hasil4=mysql_query($bantu4);
						$data4=mysql_fetch_array($hasil4);
					?>
					<td width="50"><center><?php echo number_format($data4[0],0); ?></center></td>
					<td width="50"><center><?php echo number_format($data4[1],0); ?></center></td>
					<td width="50" align="right"><?php echo number_format($data4[2],0); ?>&nbsp;</td>
				</tr>
				<tr height="27">
					<td>&nbsp;XL TUNAI</td>
					<?php
						$bantu5="select jumlah_dompul, harga_jual, harga_total
								from tb_detail_penjualan_dompul
								where id_penjualan_sp='$idpenjualan' and id_dompul='DOM-5'";
						$hasil5=mysql_query($bantu5);
						$data5=mysql_fetch_array($hasil5);
					?>
					<td width="50"><center><?php echo number_format($data5[0],0); ?></center></td>
					<td width="50"><center><?php echo number_format($data5[1],0); ?></center></td>
					<td width="50" align="right"><?php echo number_format($data5[2],0); ?>&nbsp;</td>
				</tr>
				<tr height="27">
					<td colspan="3" align="center">TOTAL</td>
					<?php
						$bantu_total1="select sum(harga_total)
									from tb_detail_penjualan_dompul
									where id_penjualan_sp='$idpenjualan'";
						$hasil_total1=mysql_query($bantu_total1);
						$data_total1=mysql_fetch_array($hasil_total1);
					?>
					<td width="50" align="right" colspan="4"><?php echo number_format($data_total1[0],0); ?>&nbsp;</td>
				</tr>
				<tr height="27">
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr height="27">
					<td>&nbsp;GRAND TOTAL</td>
					<?php
						$bantu_total3="select sum(harga_total)
									   from tb_detail_penjualan_sp
									   where id_penjualan_sp='$idpenjualan'";
						$hasil_total3=mysql_query($bantu_total3);
						$data_total3=mysql_fetch_array($hasil_total3);
					?>
					<td colspan="3" align="center">&nbsp;<?php echo number_format($data_total1[0],0); ?>&nbsp;+&nbsp;<?php echo number_format($data_total3[0],0); ?></td>
				</tr>
				<tr height="27">
					<td>&nbsp;BAYAR</td>
					<?php
						$bayar=$data_total1[0]+$data_total3[0];
					?>
					<td colspan="3" align="center">&nbsp;<?php echo number_format($bayar,0); ?>&nbsp;</td>
				</tr>
			</table>
		</td>
		<td width="2%">&nbsp;</td>
		<td width="53%">
			<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
				<tr height="27">
					<td colspan="4" align="center">KWITANSI LOGISTIK (SP/PV)</td>
				</tr>
				<tr height="27">
					<td rowspan="2" align="center">ITEM</td>
					<td align="center" colspan="3">PENJUALAN</td>
				</tr>
				<tr height="30">
					<td align="center">QTY</td>
					<td align="center">HARGA</td>
					<td align="center">JUMLAH</td>
				</tr>
				<?php
				$tampil=mysql_query("select distinct(d.id_barang), b.nama_barang, d.harga_satuan
from tb_detail_penjualan_sp d, tb_barang b
where d.id_barang=b.id_barang and id_penjualan_sp='$idpenjualan'");
				$no=1;
				while($row=mysql_fetch_array($tampil))
				{
					echo '<tr height="27"><td width="40%">&nbsp;SP. ';
					echo $row[1];
					echo '</td>';
					$bantu6="select sum(jumlah_sp)
							from tb_detail_penjualan_sp
							where id_barang='$row[0]' and id_penjualan_sp='$idpenjualan'";
					$hasil6=mysql_query($bantu6);
					$data6=mysql_fetch_array($hasil6);
					echo '<td align="center">'.$data6[0].'</td>';
					echo '<td align="center">'.number_format($row[2],0).'</td>';
					$bantu_total7="select sum(harga_total)
								from tb_detail_penjualan_sp
								where id_barang='$row[0]' and id_penjualan_sp='$idpenjualan'";
					$hasil_total7=mysql_query($bantu_total7);
					$data_total7=mysql_fetch_array($hasil_total7);
					echo '<td align="right">'.number_format($data_total7[0],0).'&nbsp;</td></tr>';
					$no++;
				}
				$cetak_tr=8-$no;
				for($i=0; $i<=$cetak_tr; $i++)
				{
					echo '<tr height="27">
					<td width="30%">&nbsp;SP.</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					</tr>';
				}
				?>
				
				<tr height="27">
					<?php
						$bantu_total2="select sum(harga_total)
									   from tb_detail_penjualan_sp
									   where id_penjualan_sp='$idpenjualan'";
						$hasil_total2=mysql_query($bantu_total2);
						$data_total2=mysql_fetch_array($hasil_total2);
					?>
					<td colspan="3" align="center">TOTAL</td>
					<td align="right"><?php echo number_format($data_total2[0],0); ?>&nbsp;</td>
				</tr>
			</table>
		</td>
	<tr>
  </table>
  
  <table width="900" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="33%">&nbsp;</td>
            <td width="34%">&nbsp;</td>
			<td width="33%">&nbsp;</td>
          </tr>
		  <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>
          </tr>
		  <tr>
            <td><div align="center">Kasir</div></td>
            <td><div align="center">Logistic</div></td>
			<td><div align="center">PIC</div></td>
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
            <td><div align="center">Samsul</div></td>
            <td><div align="center">Sueb</div></td>
			<td><div align="center">Susi</div></td>
          </tr>
        </table>
  <p>&nbsp;</p>
</div>
</body>

</html>
