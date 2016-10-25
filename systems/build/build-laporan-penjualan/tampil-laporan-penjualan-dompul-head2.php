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
											$totalnonprogramdp5	= 0;
											$totalprogramdp5	= 0;
											
											$totalnonprogramdp10	= 0;
											$totalprogramdp10		= 0;
											
											$totalnonprogramdprupiah	= 0;
											$totalprogramdprupiah		= 0;
											
											$totalpenjualan 		= 0;
											$totalbayartunai		= 0;
											
											$totaltfbcapusat		= 0;
											$totaltfbcacabang		= 0;
											$totaltfmandiri			= 0;
											$totaltfbni				= 0;
											$totaltfbri				= 0;
											while($row3=mysql_fetch_array($tampil3))
											{
												// Total QTY Penjualan
												
												$a4=mysql_query("SELECT sum( a.qty ) AS totaldp5, sum( a.qty_program ) AS totaldp5program
													FROM tb_detail_penjualan_dompul a, tb_penjualan_dompul b
													WHERE a.produk = 'DP5'
													AND b.id_bo ='$row3[id_bo]' and b.tanggal_penjualan_dompul='$tanggal_awal'
													AND a.id_penjualan_dompul = b.id_penjualan_dompul");
												$row4=mysql_fetch_array($a4);
												$totalnonprogramdp5  = $totalnonprogramdp5+$row4['totaldp5'];
												$totalprogramdp5	 = $totalprogramdp5+$row4['totaldp5program'];

												$a5=mysql_query("SELECT sum( a.qty ) AS totaldp10, sum( a.qty_program ) AS totaldp10program
													FROM tb_detail_penjualan_dompul a, tb_penjualan_dompul b
													WHERE a.produk = 'DP10'
													AND b.id_bo ='$row3[id_bo]' and b.tanggal_penjualan_dompul='$tanggal_awal'
													AND a.id_penjualan_dompul = b.id_penjualan_dompul");
												$row5=mysql_fetch_array($a5);
												$totalnonprogramdp10  = $totalnonprogramdp10+$row5['totaldp10'];
												$totalprogramdp10	 = $totalprogramdp10+$row5['totaldp10program'];
												
												$a6=mysql_query("SELECT sum( a.qty ) AS totaldprupiah, sum( a.qty_program ) AS totaldprupiahprogram
													FROM tb_detail_penjualan_dompul a, tb_penjualan_dompul b
													WHERE a.produk = 'DOMPUL'
													AND b.id_bo ='$row3[id_bo]' and b.tanggal_penjualan_dompul='$tanggal_awal'
													AND a.id_penjualan_dompul = b.id_penjualan_dompul");
												$row6=mysql_fetch_array($a6);
												$totalnonprogramdprupiah  = $totalnonprogramdprupiah+$row6['totaldprupiah'];
												$totalprogramdprupiah 	  = $totalprogramdprupiah+$row6['totaldprupiahprogram'];
												
												// Total Penjualan
												
												$a7=mysql_query("SELECT sum( grand_total ) AS grandtotaldp5
													FROM  tb_penjualan_dompul
													where id_bo ='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
												$row7=mysql_fetch_array($a7);												
												$totalpenjualan=$totalpenjualan+$row7['grandtotaldp5'];
												
												$a8=mysql_query("SELECT sum( bayar_tunai ) AS bayartunai
													FROM  tb_penjualan_dompul
													where id_bo ='$row3[id_bo]' and tanggal_penjualan_dompul='$tanggal_awal'");
												$row8=mysql_fetch_array($a8);
												$totalbayartunai=$totalbayartunai+$row8['bayartunai'];
												
												//Transferrr
												
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
											
											$totaltfbcapusat 	=	$totaltfbcapusat+$totalallbcapusat;
											$totaltfbcacabang 	=	$totaltfbcacabang+$totalallbcacabang;
											$totaltfmandiri 	=	$totaltfmandiri+$totalallmandiri;
											$totaltfbni 		=	$totaltfbni+$totalallbni;
											$totaltfbri 		=	$totaltfbri+$totalallbri;
											
											if($row7['grandtotaldp5']!=($row8['bayartunai']+$totalallbcapusat+$totalallbcacabang+$totalallmandiri+$totalallbni+$totalallbri))
											{
												$piutang=$row7['grandtotaldp5']-($row8['bayartunai']+$totalallbcapusat+$totalallbcacabang+$totalallmandiri+$totalallbni+$totalallbri);
											}
											else
											{
												$piutang=0;
											}
											$totalpiutang	 		= $piutang+$totalpiutang;
												?>
												<tr>
												  <td rowspan="2" align="center" valign="middle"><div align="center"><?php echo $no;?>
												  </div></td>
												  <td rowspan="2" align="center" valign="middle" class="info"><strong><?php echo $row3['nama_bo'];?></strong></td>
												  <td height="27" align="center" class="info"><strong>Penjualan</strong></td>
												  <td align="center"><?php echo number_format($row4['totaldp5'],0);?></td>
												  <td align="center"><?php echo number_format($row5['totaldp10'],0);?></td>
												  <td align="center"><?php echo number_format($row6['totaldprupiah'],0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($row7['grandtotaldp5'],0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($row8['bayartunai'],0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($totalallbcapusat,0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($totalallbcacabang,0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($totalallmandiri,0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($totalallbni,0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($totalallbri,0);?></td>
												  <td rowspan="2" align="center"><?php echo number_format($piutang,0);?></td>
											  </tr>
												<tr>
												  <td align="center" class="info"><strong>Program</strong></td>
												  <td align="center"><?php echo number_format($row4['totaldp5program'],0);?></td>
												  <td align="center"><?php echo number_format($row5['totaldp10program'],0);?></td>
												  <td align="center"><?php echo number_format($row6['totaldprupiahprogram'],0);?></td>
												  </tr>
												<tr>
                                            <?php
											$no++;
											}
											?>
                                            	<tr>
                                            	  <td></td>
                                            	  <td colspan="2" align="center"><strong>Total Non Program</strong></td>
                                            	  <td align="center"><?php echo number_format($totalnonprogramdp5,0);?></td>
                                            	  <td align="center"><?php echo number_format($totalnonprogramdp10,0);?></td>
                                            	  <td align="center"><?php echo number_format($totalnonprogramdprupiah,0);?></td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                            	  <td align="center">&nbsp;</td>
                                          	  </tr>
                                            	<tr>
                                                <td></td>
												  <td colspan="2" align="center"><strong>Total Program</strong></td>
												  <td align="center"><?php echo number_format($totalprogramdp5,0);?></td>
												  <td align="center"><?php echo number_format($totalprogramdp10,0);?></td>
												  <td align="center"><?php echo number_format($totalprogramdprupiah,0);?></td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
												  <td align="center">&nbsp;</td>
                                                </tr>
                                                  <td></td>
												  <td colspan="2" align="center"><strong>Grand Total</strong></td>
												  <td align="center"><?php echo number_format($totalnonprogramdp5+$totalprogramdp5,0);?></td>
												  <td align="center"><?php echo number_format($totalnonprogramdp10+$totalprogramdp10,0);?></td>
												  <td align="center"><?php echo number_format($totalnonprogramdprupiah+$totalprogramdprupiah,0);?></td>
												  <td align="center"><?php echo number_format($totalpenjualan,0);?></td>
												  <td align="center"><?php echo number_format($totalbayartunai,0);?></td>
												  <td align="center"><?php echo number_format($totaltfbcapusat,0);?></td>
												  <td align="center"><?php echo number_format($totaltfbcacabang,0);?></td>
												  <td align="center"><?php echo number_format($totaltfmandiri,0);?></td>
												  <td align="center"><?php echo number_format($totaltfbni,0);?></td>
												  <td align="center"><?php echo number_format($totaltfbri,0);?></td>
                                          <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td align="center"><?php echo number_format($totalpiutang,0);?></td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="14">
												<a href="#" class="btn btn-info">
												Info
												<i class="ace-icon fa fa-print  align-top bigger-125 icon-on-right"></i>												</a>												</td>
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
											$tampil3		= mysql_query("SELECT no_hp_sub_master_dompul, nama_sub_master_dompul, tipe_dompul
											from tb_sub_master_dompul where id_ho='$_SESSION[id_ho]'
											group by nama_sub_master_dompul");
											$no				= 1;
											$totalldp5		= 0;
											$totalldp10		= 0;
											$totalldompul	= 0;
											while($row3=mysql_fetch_array($tampil3))
											{
												
											$a5=mysql_query("SELECT sum(qty) as tot5 from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and tip_dp='MD' and tip_dp2='SD'
											and produk = 'DP5'");
											$row5=mysql_fetch_array($a5);
											$totaldp5 = $row5['tot5'];
											
											$a5a=mysql_query("SELECT sum(qty) as tot5 from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]'
											and produk = 'DP5'");
											$row5a=mysql_fetch_array($a5a);
											$totaldp5a = $row5a['tot5'];
											
											$a6=mysql_query("SELECT sum(qty) as tot10 from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and tip_dp='MD' and tip_dp2='SD'
											and produk = 'DP10'");
											$row6=mysql_fetch_array($a6);
											$totaldp10 = $row6['tot10'];
											
											$a6a=mysql_query("SELECT sum(qty) as tot10 from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' 
											and produk = 'DP10'");
											$row6a=mysql_fetch_array($a6a);
											$totaldp10a = $row6a['tot10'];
											
											$a7=mysql_query("SELECT sum(qty) as tot10 from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and tip_dp='MD' and tip_dp2='SD'
											and produk = 'DOMPUL'");
											$row7=mysql_fetch_array($a7);
											$totaldompul = $row7['tot10'];
											
											$a7a=mysql_query("SELECT sum(qty) as tot10 from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_awal' and no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' 
											and produk = 'DOMPUL'");
											$row7a=mysql_fetch_array($a7a);
											$totaldompula = $row7a['tot10'];
											
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
                                        <td rowspan="3" align="center" valign="middle"><div align="center"><?php echo $no;?> </div></td>
                                        <td rowspan="3" align="center" valign="middle" class="info"><strong><?php echo $row3['nama_sub_master_dompul'];?></strong></td>
                                        <td align="center" class="info"><strong>Total Out Internal</strong></td>
                                        <td align="center"><?php echo number_format($totaldp5,0);?></td>
                                        <td align="center"><?php echo number_format($totaldp10,0);?></td>
                                        <td align="center"><?php echo number_format($totaldompul,0);?></td>
                                      </tr>
                                      <tr>
                                        <td align="center" class="info"><strong>Total Out Penjulan</strong></td>
                                        <td align="center"><?php echo number_format($totaldp5a-$totaldp5,0);?></td>
                                        <td align="center"><?php echo number_format($totaldp10a-$totaldp10,0);?></td>
                                        <td align="center"><?php echo number_format($totaldompula-$totaldompul,0);?></td>
                                      </tr>
                                      <tr>
                                        <td align="center" class="info"><strong>Total Out All</strong></td>
                                        <td align="center"><strong><?php echo number_format($totaldp5a,0);?></strong></td>
                                        <td align="center"><strong><?php echo number_format($totaldp10a,0);?></strong></td>
                                        <td align="center"><strong><?php echo number_format($totaldompula,0);?></strong></td>
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
                                    </tbody>
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
				                    <tr>
				                      <td></tbody></td>
			                        </tr>
                                  </table>
				                  <p>&nbsp;</p>
								  </div>
									<!-- /.span -->
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
