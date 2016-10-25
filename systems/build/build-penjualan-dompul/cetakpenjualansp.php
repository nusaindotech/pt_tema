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
<title>Penjualan SP</title>
</head>

<body>
<div align="center">

  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" colspan="9"><strong>LAPORAN CANVASSER</strong></td>
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
  
	<table width="900" cellspacing="0" cellpadding="0" border="1">
		<thead>
		<tr height="25">
			<th><center>No.</center></th>
			<th><center>Nama RO</center></th>
			<th><center>Nama Item</center></th>
			<th><center>Harga Satuan</center></th>
			<th width="200"><center>Jumlah</center></th>
            <th width="200"><center>Total</center></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$tampil3=mysql_query("select distinct(d.id_kios), k.nama_kios
							  from tb_detail_penjualan_sp d, tb_kios k
							  where d.id_kios=k.id_kios and d.id_penjualan_sp='$idpenjualan'
							  order by d.id_detail_penjualan_sp asc");
		$no=0;
		$nomor=1;
		$jumlahsptotal=0;
		$jumlahbayartotal=0;
		$catatcounter='';
		while($row3=mysql_fetch_array($tampil3))
		{
			$tampil4=mysql_query("select d.id_detail_penjualan_sp, d.id_barang, b.nama_barang, d.harga_satuan, d.jumlah_sp, d.harga_total
								from tb_detail_penjualan_sp d, tb_barang b
								where d.id_barang=b.id_barang and d.id_penjualan_sp='$idpenjualan' and d.id_kios='$row3[0]'
								order by d.id_barang asc");						
			while($row4=mysql_fetch_array($tampil4))
			{
				$jumlahsptotal=$jumlahsptotal+$row4[4];
				$jumlahbayartotal=$jumlahbayartotal+$row4[5];
				echo "<tr height='25'>";
				if($row3[1]!=$catatcounter)
				{
					echo '<td align="center">'.$nomor.'</td>';
					echo '<td>&nbsp;';
					echo $row3[1];
					echo '&nbsp;<div class="hidden-sm hidden-xs btn-group">';
					echo "<a class='btn btn-xs btn-danger' 
					href='build/build-penjualan-sp/hapus-detail-penjualan.php?id=$idpenjualan&id2=$idcanvaser&id3=$row3[0]'>";
					echo '<i class="ace-icon fa fa-trash-o bigger-120"></i></a>';
					echo '</div></td>';
				}
				else if($row3[1]==$catatcounter)
				{
					$bantu_counter=$row[4];
					echo '<td> </td>';
					echo '<td> </td>';
				}
				$catatcounter=$row3[1];
				echo "<td>&nbsp;".$row4[2]."</td>";
				echo "<td align='right'>".number_format($row4[3],0)."&nbsp;</td>";
				$no=$no+$row4[4];
				echo "<td align='center'>".$row4[4]."</td>";
				echo "<td align='right'>".number_format($row4[5],0)."&nbsp;</td>";
				echo "</tr>";
			}
			$nomor++;
			echo '<tr height="25">';
			echo '<td colspan="4">&nbsp;</td>';
			$bantu2="select grand_total_kios, cash_kios, transfer, piutang, id_bank
					from tb_pembayaran_canvaser
					where id_penjualan_sp='$idpenjualan' and id_sales='$idcanvaser' and id_kios='$row3[0]'";
			$hasil_bantu2=mysql_query($bantu2);
			$data_bantu2=mysql_fetch_array($hasil_bantu2);
			echo '<td>&nbsp;Grand Total</td>';
			echo '<td align="right">';
			echo number_format($data_bantu2[0],0);
			echo '&nbsp;</td>';
			echo '</tr>';
			echo '<tr height="25">';
			echo '<td colspan="4">&nbsp;</td>';
			echo '<td>&nbsp;Cash</td>';
			echo '<td align="right">';
			echo number_format($data_bantu2[1],0);
			echo '&nbsp;</td>';
			echo '</tr>';
			echo '<tr height="25">';
			echo '<td colspan="4">&nbsp;</td><td>';
			if($data_bantu2[4]==null)
			{
				echo "&nbsp;Transfer ";
			}
			else
			{
				echo "&nbsp;Transfer "; 
				$bantu3="select nama_bank from tb_bank where id_bank='$data_bantu2[4]'";
				$hasil_bantu3=mysql_query($bantu3);
				$data_bantu3=mysql_fetch_array($hasil_bantu3);
				echo '<span class="label label-success arrowed-in arrowed-in-right">';
				echo $data_bantu3[0];
				echo "</span>";
			}
			echo '</td><td align="right">';
			echo number_format($data_bantu2[2],0);
			echo '&nbsp;</td>';
			echo '</tr>';
			echo '<tr height="25">';
			echo '<td colspan="4">&nbsp;</td>';
			echo '<td>&nbsp;Piutang</td>';
			echo '<td align="right">';
			echo number_format($data_bantu2[3],0);
			echo '&nbsp;</td>';
			echo '</tr>';
		}
		?>
		</tbody>
		<tr  height="25">
			<td colspan="2"></td>
			<td align="center">Total SP</td>
			<td align="center"><?php echo $jumlahsptotal;?></td>
			<td align="center">Jumlah Bayar</td>
			<td align="right"><?php echo number_format($jumlahbayartotal,0);?>&nbsp;</td>
		</tr>
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
            <td><div align="center">Fiqro</div></td>
            <td><div align="center">Sintia</div></td>
			<td><div align="center">Bag. PIC</div></td>
          </tr>
        </table>
</body>

</html>
