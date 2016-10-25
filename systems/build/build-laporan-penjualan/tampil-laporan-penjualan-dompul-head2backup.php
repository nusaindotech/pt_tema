<?php
	$tanggal_awal			=$_POST['tanggal_awal'];
	$tanggal_akhir			=$_POST['tanggal_akhir'];
	
	$tglsekarang = date('Y-m-d');
	
	$a1=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='DP5' and type_dompul='CVS'");
	$row1=mysql_fetch_array($a1);
	
	$a11a=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='DP10' and type_dompul='CVS'");
	$row11a=mysql_fetch_array($a11a);
	
	$a111=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='DOMPUL' and type_dompul='CVS'");
	$row111=mysql_fetch_array($a111);
	
	$a1a=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='DP5' and type_dompul='DS'");
	$row1a=mysql_fetch_array($a1a);
	
	$a11a=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='DP10' and type_dompul='DS'");
	$row11a=mysql_fetch_array($a11a);
	
	$a111a=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='DOMPUL' and type_dompul='DS'");
	$row111a=mysql_fetch_array($a111a);

	$a2=mysql_query("SELECT * from tb_sales where hp_sales='$canvaser'");
	$row2=mysql_fetch_array($a2);	
?>
<!-- /.modal -->

<!-- #section:basics/content.breadcrumbs -->
<style type="text/css">
<!--
.style1 {font-size: 24px}
-->
</style>

<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Laporan</li>
							<li class="active">Penjualan Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Laporan Penjualan Dompul Head Tanggal <strong><?php echo $tanggal_awal; ?></strong></h1>
					  </div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="dash.php?hp=laporan-pj-dompul-head2" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                    <td width="69%" colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="11%">Pilih Tanggal</td>
                                        <td width="1%">:</td>
                                        <td width="14%"><div class="input-group">
                                            <input class="form-control date-picker" name="tanggal_awal" type="text" data-date-format="yyyy-mm-dd"value="<?php
											$tanggal = date("Y-m-d");
											echo $tanggal;
											?>"/>
                                            <span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i></span> </div></td>
                                        <td width="35%">&nbsp;
                                          <button class="btn" type="reset"> <i class="ace-icon fa fa-undo bigger-110"></i> Kosongkan </button>
                                        <button class="btn btn-info" type="submit"> <i class="ace-icon fa fa-check bigger-110"></i> Tampilkan	Laporan </button></td>
                                        <td width="39%">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="2">&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td colspan="9"></td>
                                        <td width="0%">&nbsp;</td>
                                        <td width="0%">&nbsp;</td>
                                        <td width="0%">&nbsp;</td>
                                      </tr>
                                    </table></td>
                                    </tr>
								</table>
                              </form>

								<div class="row">
									<div class="col-xs-12">
								  <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												  <tr>
												    <th colspan="14"><div align="center" class="style1">Laporan Transaksi Penjualan Dompul User <?php echo $tanggal_awal; ?></div>													  <div align="center"></div> <div align="center"></div></th>
										      </tr>
											    <tr>
											      <th rowspan="2">No.</th>
											      <th colspan="2" rowspan="2">Nama BO </th>
												  <th colspan="3"><div align="center">Qty Penjualan</div></th>
												  <th rowspan="2">Total Nominal Penjualan</th>
												  <th colspan="7"><div align="center">Pembayaran</div></th>
											  </tr>
												<tr>
												  <th><div align="center">5K</div></th>
													<th><div align="center">10K</div></th>
													<th><div align="center">Rupiah</div></th>
													<th><div align="center">Tunai</div></th>
													<th><div align="center">BCA Pusat</div></th>
													<th><div align="center">BCA Cabang</div></th>
													<th><div align="center">Mandiri</div></th>
													<th><div align="center">BNI</div></th>
													<th><div align="center">BRI</div></th>
													<th>                                                      
													<div align="center">Piutang</div></th>
												</tr>
											</thead>
											<tbody>
											<?php
											$tampil3=mysql_query("SELECT id_ho, id_bo, nama_bo from tb_bo where id_ho='$_SESSION[id_ho]'");
											$no=1;
											$totaldp5=0;
											$totaldp10=0;
											$totaldompul1=0;
											$totalprogramdp5=0;
											$totalprogramdp10=0;
											$totalprogramdompul=0;
											$total5k=0;
											$total10k=0;
											$totaldompul=0;
											$totalprog5k=0;
											$totalprog10k=0;
											$totalprogdompul=0;
											$all5=0;
											$all10=0;
											$alldompul=0;
											$totalpenjualan5k=0;
											$totalpenjualan10k=0;
											$totalpenjualandompul=0;
											$totalpenjualan5kprogram=0;
											$totalpenjualan10kprogram=0;
											$totalpenjualandompulprogram=0;
											$totalallpenjualan=0;
											$totaltunai=0;
											$totalqtytunai=0;
											$totalqtybcapusat=0;
											$totalallbcacabang=0;
											$totalqtymandiri=0;
											$totalqtybni=0;
											$totalqtybri=0;
											$totalpiutang=0;
											while($row3=mysql_fetch_array($tampil3))
											{
											$a4=mysql_query("SELECT id_penjualan_dompul from tb_penjualan_dompul 
											where tanggal_penjualan_dompul='$tanggal_awal' and id_bo = '$row3[id_bo]'");
											//$row4=mysql_fetch_array($a4);
											while($row4=mysql_fetch_array($a4))
												{
												$a5=mysql_query("SELECT qty as tot5 from tb_detail_penjualan_dompul where id_penjualan_dompul='$row4[id_penjualan_dompul]' 
												and produk = 'DP5'");
												$row5=mysql_fetch_array($a5);
												$totaldp5 = $row5['tot5']+$totaldp5;
												
												$a6=mysql_query("SELECT qty_program as totprogram5 from tb_detail_penjualan_dompul where id_penjualan_dompul='$row4[id_penjualan_dompul]' 
												and produk = 'DP5'");
												$row6=mysql_fetch_array($a6);
												$totalprogramdp5 = $row6['totprogram5']+$totalprogramdp5;
												
												$a7=mysql_query("SELECT qty as tot10 from tb_detail_penjualan_dompul where id_penjualan_dompul='$row4[id_penjualan_dompul]'
												and produk = 'DP10'");
												$row7=mysql_fetch_array($a7);
												$totaldp10 = $row7['tot10']+$totaldp10;
												
												$a8=mysql_query("SELECT qty_program as totprogram10 from tb_detail_penjualan_dompul where id_penjualan_dompul='$row4[id_penjualan_dompul]' 
												and produk = 'DP10'");
												$row8=mysql_fetch_array($a8);
												$totalprogramdp10 = $row8['totprogram10']+$totalprogramdp10;
												
												$a9=mysql_query("SELECT qty as totdompul from tb_detail_penjualan_dompul where id_penjualan_dompul='$row4[id_penjualan_dompul]'  
												and produk = 'DOMPUL'");
												$row9=mysql_fetch_array($a9);
												$totaldompul = $row9['totdompul']+$totaldompul;
												
												$a10=mysql_query("SELECT qty_program as totprogramdompul from tb_detail_penjualan_dompul where id_penjualan_dompul='$row4[id_penjualan_dompul]' 
												and produk = 'DOMPUL'");
												$row10=mysql_fetch_array($a10);
												$totalprogramdompul = $row10['totprogramdompul']+$totalprogramdompul;
												
												$totalprog5k=$totalprog5k+$row6['totprogram5'];
												$totalprog10k=$totalprog10k+$row8['totprogram10'];
												$totalprogdompul=$totalprogdompul+$row10['totprogramdompul'];
												}
												
											$a11=mysql_query("SELECT sum(bayar_tunai) as tottunai from tb_penjualan_dompul where id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row11=mysql_fetch_array($a11);
											
											$a12=mysql_query("SELECT sum(bayar_transfer) as bayartransferbcacabang from tb_penjualan_dompul where bank='Bank BCA (Cabang)' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row12=mysql_fetch_array($a12);
											
											$a13=mysql_query("SELECT sum(bayar_transfer) as bayartransfermandiri from tb_penjualan_dompul where bank='Bank Mandiri' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row13=mysql_fetch_array($a13);
											
											$a14=mysql_query("SELECT sum(bayar_transfer) as bayartransferbni from tb_penjualan_dompul where bank='Bank BNI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row14=mysql_fetch_array($a14);
											
											$a15=mysql_query("SELECT sum(bayar_transfer) as bayartransferbri from tb_penjualan_dompul where bank='Bank BRI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row15=mysql_fetch_array($a15);
											
											$a16=mysql_query("SELECT sum(bayar_transfer) as bayartransferbni from tb_penjualan_dompul where bank='Bank BRI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row16=mysql_fetch_array($a16);
											
											$a17=mysql_query("SELECT sum(bayar_transfer) as bayartransferbcapusat from tb_penjualan_dompul where bank='Bank BCA (Pusat)' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row17=mysql_fetch_array($a17);
											
											//transfer2
																						
											$a19=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer2bcacabang from tb_penjualan_dompul where bank='Bank BCA (Cabang)' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row19=mysql_fetch_array($a19);
											
											$a20=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer2mandiri from tb_penjualan_dompul where bank='Bank Mandiri' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row20=mysql_fetch_array($a20);
											
											$a21=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer2bni from tb_penjualan_dompul where bank='Bank BNI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row21=mysql_fetch_array($a21);
											
											$a22=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer2bri from tb_penjualan_dompul where bank='Bank BRI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row22=mysql_fetch_array($a22);
											
											$a23=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer2bni from tb_penjualan_dompul where bank='Bank BRI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row23=mysql_fetch_array($a23);
											
											$a24=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer2bcapusat from tb_penjualan_dompul where bank='Bank BCA (Pusat)' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row24=mysql_fetch_array($a24);
											
											//transfer3
																						
											$a25=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer3bcacabang from tb_penjualan_dompul where bank='Bank BCA (Cabang)' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row25=mysql_fetch_array($a25);
											
											$a26=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer3mandiri from tb_penjualan_dompul where bank='Bank Mandiri' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row26=mysql_fetch_array($a26);
											
											$a27=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer3bni from tb_penjualan_dompul where bank='Bank BNI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row27=mysql_fetch_array($a27);
											
											$a28=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer3bri from tb_penjualan_dompul where bank='Bank BRI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row28=mysql_fetch_array($a28);
											
											$a29=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer3bni from tb_penjualan_dompul where bank='Bank BRI' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row29=mysql_fetch_array($a29);
											
											$a30=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer3bcapusat from tb_penjualan_dompul where bank='Bank BCA (Pusat)' and id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row30=mysql_fetch_array($a30);
											
											$a31=mysql_query("SELECT sum(grand_total) as grandtotdomp from tb_penjualan_dompul where id_bo='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row31=mysql_fetch_array($a31);
											
											$totalallbcapusat 		= $row30['bayartransfer3bcapusat']+$row24['bayartransfer2bcapusat']+$row17['bayartransferbcapusat'];
											$totalallbcacabang 		= $row25['bayartransfer3bcacabang']+$row19['bayartransfer2bcacabang']+$row12['bayartransferbcacabang'];
											$totalallmandiri 		= $row26['bayartransfer3mandiri']+$row20['bayartransfer2mandiri']+$row13['bayartransfermandiri'];
											$totalallbni	 		= $row26['bayartransfer3bni']+$row21['bayartransfer2bni']+$row14['bayartransferbni'];
											$totalallbri	 		= $row28['bayartransfer3bri']+$row22['bayartransfer2bri']+$row15['bayartransferbri'];
											
											if($row31['grandtotdomp']!=($row11['tottunai']+$totalallbcapusat+$totalallbcacabang+$totalallmandiri+$totalallbni+$totalallbri))
											{
												$piutang=$row31['grandtotdomp']-($row11['tottunai']+$totalallbcapusat+$totalallbcacabang+$totalallmandiri+$totalallbni+$totalallbri);
											}
											else
											{
												$piutang=0;
											}
											
											$totalpiutang	 		= $piutang+$totalpiutang;
												
												$total5k=$total5k+$totaldp5;
												$total10k=$total10k+$totaldp10;
												$totaldompul1=$totaldompul1+$totaldompul;
											
											$totalpenjualan5k= $totaldp5*$row1['harga_dompul'];
											$totalpenjualan10k= $totaldp10*$row11a['harga_dompul'];
											$totalpenjualandompul= $totaldompul*$row111['harga_dompul'];
											
											$totalpenjualan5kprogram= $totalprogramdp5*$row1a['harga_dompul'];
											$totalpenjualan10kprogram= $totalprogramdp10*$row11a['harga_dompul'];
											$totalpenjualandompulprogram= $totalprogramdompul*$row111a['harga_dompul'];
											
											$totalpenjualan = $totalpenjualan5k+$totalpenjualan10k+$totalpenjualandompul;
											$totalpenjualanprogram = $totalpenjualan5kprogram+$totalpenjualan10kprogram+$totalpenjualandompulprogram;
											
											$totalallpenjualan = $totalallpenjualan+$totalpenjualan+$totalpenjualanprogram;
											
											$totalqtytunai 		= $totalqtytunai+$row11['tottunai'];
											$totalqtybcapusat 	= $totalqtybcapusat+$totalallbcapusat;
											$totalqtybcacabang	= $totalqtybcacabang+$totalallbcacabang;
											$totalqtymandiri	= $totalqtymandiri+$totalallmandiri;
											$totalqtybni		= $totalqtybni+$totalallbni;
											$totalqtybri		= $totalqtybri+$totalallbri;
											?>
											<tr>
											  <td rowspan="2" align="center" valign="middle"><div align="center"><?php echo $no;?>
										      </div></td>
											  <td rowspan="2" align="center" valign="middle" class="info"><strong><?php echo $row3['nama_bo'];?></strong></td>
											  <td height="27" align="center" class="info"><strong>Penjualan</strong></td>
											  <td align="center"><?php echo number_format($totaldp5,0);?></td>
											  <td align="center"><?php echo number_format($totaldp10,0);?></td>
											  <td align="center"><?php echo number_format($totaldompul,0);?></td>
											  <td align="center"><?php echo number_format($totalpenjualan,0);?></td>
											  <td align="center"><?php echo number_format($row11['tottunai'],0); ?></td>
											  <td align="center"><?php echo number_format($totalallbcapusat,0); ?></td>
											  <td align="center"><?php echo number_format($totalallbcacabang,0); ?></td>
											  <td align="center"><?php echo number_format($totalallmandiri,0); ?></td>
											  <td align="center"><?php echo number_format($totalallbni,0); ?></td>
											  <td align="center"><?php echo number_format($totalallbri,0); ?></td>
											  <td align="center"><?php echo number_format($piutang,0); ?></td>
											  </tr>
											<tr>
											  <td align="center" class="info"><strong>Program</strong></td>
											  <td align="center"><?php echo number_format($totalprogramdp5,0);?></td>
											  <td align="center"><?php echo number_format($totalprogramdp10,0);?></td>
											  <td align="center"><?php echo number_format($totalprogramdompul,0);?></td>
											  <td align="center"><?php echo number_format($totalpenjualanprogram,0);?></td>
											  <td align="center">&nbsp;</td>
											  <td align="center">&nbsp;</td>
											  <td align="center">&nbsp;</td>
											  <td align="center">&nbsp;</td>
											  <td align="center">&nbsp;</td>
											  <td align="center">&nbsp;</td>
											  <td align="center">&nbsp;</td>
											  </tr>
											<tr>
                                            <?php
											$no++;
											$totaldp5=0;
											$totaldp10=0;
											$totaldompul=0;
											$totalprogramdp5=0;
											$totalprogramdp10=0;
											$totalprogramdompul=0;
											$totaltunai=0;
											}
											$all5= $total5k+$totalprog5k;
											$all10= $total10k+$totalprog10k;
											$alldompul= $totaldompul1+$totalprogdompul;
											?>
												<td></td>
												<td colspan="2" align="center"><strong>Grand Total</strong></td>
				                                <td align="center"><?php echo number_format($all5,0); ?></td>
			                                  <td align="center"><?php echo number_format($all10,0); ?></td>
		                                      <td align="center"><?php echo number_format($alldompul,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalallpenjualan,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalqtytunai,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalqtybcapusat,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalqtybcacabang,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalqtymandiri,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalqtybni,0); ?></td>
		                                      <td align="center"><?php echo number_format($totalqtybri,0); ?></td>
                                            <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td align="center"><?php echo number_format($totalpiutang,0); ?></td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="14">
												<a href="#" class="btn btn-info">
												Info
												<i class="ace-icon fa fa-print  align-top bigger-125 icon-on-right"></i>
												</a>
												</td>
											</tr>
											</form>
											</tbody>
									  </table>
					              <table id="simple-table2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th colspan="6"><div align="center" class="style1">Laporan Transaksi Penjualan Dompul Server <?php echo $tanggal_awal; ?></div>
                                          <div align="center"></div>
                                          <div align="center"></div></th>
                                      </tr>
                                      <tr>
                                        <th rowspan="2">No.</th>
                                        <th colspan="2" rowspan="2">Nama BO </th>
                                        <th colspan="3"><div align="center">Qty Penjualan</div></th>
                                      </tr>
                                      <tr>
                                        <th><div align="center">5K</div></th>
                                        <th><div align="center">10K</div></th>
                                        <th><div align="center">Rupiah</div></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
											$tampil3		= mysql_query("SELECT no_hp_sub_master_dompul, nama_sub_master_dompul from tb_sub_master_dompul group by nama_sub_master_dompul");
											$no				= 1;
											$totalldp5		= 0;
											$totalldp10		= 0;
											$totalldompul	= 0;
											while($row3=mysql_fetch_array($tampil3))
											{
												
											$a5=mysql_query("SELECT sum(qty) as tot5 from tb_upload_dompul where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DP5'");
											$row5=mysql_fetch_array($a5);
											$totaldp5 = $row5['tot5'];
											
											$a6=mysql_query("SELECT sum(qty) as tot10 from tb_upload_dompul where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DP10'");
											$row6=mysql_fetch_array($a6);
											$totaldp10 = $row6['tot10'];
											
											$a7=mysql_query("SELECT sum(qty) as tot10 from tb_upload_dompul where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DOMPUL'");
											$row7=mysql_fetch_array($a7);
											$totaldompul = $row7['tot10'];
											
											//program
											
											$a6=mysql_query("SELECT sum(qty_program) as totprogram5 from tb_upload_dompul where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DP5'");
											$row6=mysql_fetch_array($a6);
											$totaldp5program = $row6['totprogram5'];
											
											$a7=mysql_query("SELECT sum(qty_program) as totprogram10 from tb_upload_dompul where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DP10'");
											$row7=mysql_fetch_array($a7);
											$totaldp10program = $row7['totprogram10'];
											
											$a8=mysql_query("SELECT sum(qty_program) as totprogramdompul from tb_upload_dompul where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DOMPUL'");
											$row8=mysql_fetch_array($a8);
											$totaldompulprogram = $row8['totprogramdompul'];
											
											$totalldp5 	  = $totalldp5+$totaldp5+$totaldp5program;
											$totalldp10	  = $totalldp10+$totaldp10+$totaldp10program;
											$totalldompul = $totalldompul+$totaldompul+$totaldompulprogram;
											?>
                                      <tr>
                                        <td align="center" valign="middle"><div align="center"><?php echo $no;?> </div></td>
                                        <td align="center" valign="middle" class="info"><strong><?php echo $row3['nama_sub_master_dompul'];?></strong></td>
                                        <td align="center" class="info"><strong>Total Out</strong></td>
                                        <td align="center"><?php echo number_format($totaldp5,0);?></td>
                                        <td align="center"><?php echo number_format($totaldp10,0);?></td>
                                        <td align="center"><?php echo number_format($totaldompul,0);?></td>
                                      </tr>
                                      
                                      <tr>
                                        <?php
											$no++;
											}
											?>
                                        <td></td>
                                        <td colspan="2" align="center"><strong>Grand Total</strong></td>
                                        <td align="center"><?php echo number_format($totalldp5,0); ?></td>
                                        <td align="center"><?php echo number_format($totalldp10,0); ?></td>
                                        <td align="center"><?php echo number_format($totalldompul,0); ?></td>
                                        <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
                                      </tr>
									  <form action="build/build-penjualan-sp/update-detail-penjualan.php" method="post" class="form-horizontal" role="form">
                                      <tr>
                                        <td colspan="6"><?php
												if(($data_bantu4[0]!=$jumlahsptotal)||($data_bantu4[0]==0)||($jumlahsptotal==0))
												{
													echo "&nbsp;";
												}
												else if($data_bantu4[0]==$jumlahsptotal)
												{
												?>
                                            <a href="build/build-penjualan-sp/cetakpenjualansp.php?id=<?php echo $idpenjualan; ?>&amp;id2=<?php echo $idcanvaser; ?>" target="_blank" class="btn btn-info" > <i class="ace-icon fa fa-check bigger-110"></i> Cetak </a> <a href="dash.php?hp=penjualan-sp" class="btn btn-success" > Selesai </a>
                                            <?php
												}
												?>                                        </td>
                                      </tr>
                                    </form>
                                    </tbody>
                                  </table>
					              <p>&nbsp;</p>
								  </div><!-- /.span -->
									</p>
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>
