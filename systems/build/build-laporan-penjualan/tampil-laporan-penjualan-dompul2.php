<?php
	$tanggal_awal			=$_POST['tanggal_awal'];
	$tanggal_akhir			=$_POST['tanggal_akhir'];
	
	$tglsekarang = date('Y-m-d');

	$a2=mysql_query("SELECT * from tb_sales where hp_sales='$canvaser'");
	$row2=mysql_fetch_array($a2);	
?>
<!-- /.modal -->

<!-- #section:basics/content.breadcrumbs -->
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
								Laporan Penjualan Dompul Tanggal <strong><?php echo $tanggal_awal; ?></strong></h1>
					  </div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="dash.php?hp=laporan-pj-dompul2" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    
									<tr>
									  <td width="9%">Pilih Tanggal</td>
									  <td width="1%">:</td>
									  <td width="11%"><div class="input-group">
											<input class="form-control date-picker" name="tanggal_awal" type="text" data-date-format="yyyy-mm-dd"value="<?php
											$tanggal = date("Y-m-d");
											echo $tanggal;
											?>"/>
											<span class="input-group-addon">
											<i class="fa fa-calendar bigger-110"></i></span>
									  </div></td>
	                                  <td width="10%">&nbsp;</td>
	                                  <td width="1%">&nbsp;</td>
	                                  <td width="17%"><button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
									  Tampilkan	Laporan							   </button></td>
									  <td width="2%">&nbsp;</td>
									  <td width="14%">Tanggal Cetak Laporan</td>
									  <td width="5%">:</td>
									  <td width="24%"><input readonly="readonly" name="tanggaldaftar" class="input-sm" type="text" value="<?php
											echo $tglsekarang;
											?>" style="width:100px;" /></td>
									  <td width="6%">&nbsp;</td>
								    </tr>
									
                                    
                                    
                                    <tr>
                                    <td colspan="11">&nbsp;</td>
                                    </tr>
								</table>
                              </form>

								<div class="row">
									<div class="col-xs-12">
								  <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><div align="center">No.</div></th>
													<th>													  <div align="center">Nama Sales
												    </div></th>
													<th>BO</th>
													<th><div align="center">Qty Penjualan</div></th>
													<th><div align="center">Total Penjualan</div></th>
													<th><div align="center">Total  Tunai</div></th>
													<th> <div align="center">BCA Pusat</div></th>
													<th><div align="center">BCA Cabang</div></th>
													<th><div align="center">Mandiri</div></th>
													<th><div align="center">BNI</div></th>
													<th><div align="center">BRI</div></th>
													<th>                                                      <div align="center">Piutang</div></th>
												</tr>
											</thead>
											<tbody>
											<?php
											if($_SESSION['level']=='head')
											{
											$tampil3=mysql_query("SELECT b.id_sales as idsales, b.id_bo as idbo, b.nama_sales as namasales, sum( a.grand_total ) as totgrandtotal ,count( id_penjualan_dompul ) as totqty, b.hp_sales as hpsales,
											sum( a.bayar_tunai ) as totbayartunai, sum( a.bayar_transfer ) as totbayartransfer, sum( a.bayar_transfer2 ) as totbayartransfer2, sum( a.bayar_transfer3 ) as totbayartransfer3
											FROM tb_penjualan_dompul a, tb_sales b
											WHERE a.id_sales = b.id_sales and a.tanggal_penjualan_dompul='$tanggal_awal' and b.id_ho='$_SESSION[id_ho]'
											GROUP BY a.id_sales");	
											}
											else
											{
											$tampil3=mysql_query("SELECT b.id_sales as idsales,b.id_bo as idbo, b.nama_sales as namasales, sum( a.grand_total ) as totgrandtotal ,count( id_penjualan_dompul ) as totqty, b.hp_sales as hpsales,
											sum( a.bayar_tunai ) as totbayartunai, sum( a.bayar_transfer ) as totbayartransfer, sum( a.bayar_transfer2 ) as totbayartransfer2, sum( a.bayar_transfer3 ) as totbayartransfer3
											FROM tb_penjualan_dompul a, tb_sales b
											WHERE a.id_sales = b.id_sales and a.tanggal_penjualan_dompul='$tanggal_awal' and b.id_bo='$_SESSION[id_bo]'
											GROUP BY a.id_sales");
											}											
											$no=1;
											$nomor=1;
											$jumlahtotal=0;
											$jumlahqty=0;
											$jumlahgrandtotal=0;
											$jumlahgrandtunai=0;
											$jumlahgrandbcapusat=0;
											$jumlahgrandbcacabang=0;
											$jumlahgrandmandiri=0;
											$jumlahgrandbni=0;
											$jumlahgrandbri=0;
											$jumlahgrandpiutang=0;
											$jumlahgrand=0;
											while($row3=mysql_fetch_array($tampil3))
											{
												if($row3['totgrandtotal']!=($row3['totbayartunai']+$row3['totbayartransfer']+$row3['totbayartransfer2']+$row3['totbayartransfer3']))
												{
													$piutang=$row3['totgrandtotal']-($row3['totbayartunai']+$row3['totbayartransfer']+$row3['totbayartransfer2']+$row3['totbayartransfer3']);
												}
												else
												{
													$piutang=0;
												}
												
											$a5=mysql_query("SELECT count(no_upload_dompul) as tot from tb_upload_dompul where hp_kios='$row3[hp_kios]'");
											$row5=mysql_fetch_array($a5);
											$jumlahtotal=$jumlahtotal+$row5['tot'];
											
											$a6=mysql_query("SELECT sum(bayar_transfer) as bayartransfer from tb_penjualan_dompul where bank='Bank BCA (Pusat)' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row6=mysql_fetch_array($a6);
											
											$a7=mysql_query("SELECT sum(bayar_transfer) as bayartransfer from tb_penjualan_dompul where bank='Bank BCA (Cabang)' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row7=mysql_fetch_array($a7);
											
											$a8=mysql_query("SELECT sum(bayar_transfer) as bayartransfer from tb_penjualan_dompul where bank='Bank Mandiri' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row8=mysql_fetch_array($a8);
											
											$a9=mysql_query("SELECT sum(bayar_transfer) as bayartransfer from tb_penjualan_dompul where bank='Bank BNI' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row9=mysql_fetch_array($a9);
											
											$a10=mysql_query("SELECT sum(bayar_transfer) as bayartransfer from tb_penjualan_dompul where bank='Bank BRI' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row10=mysql_fetch_array($a10);
											
											$a11=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer from tb_penjualan_dompul where bank2='Bank BCA (Pusat)' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row11=mysql_fetch_array($a11);
											
											$a12=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer from tb_penjualan_dompul where bank2='Bank BCA (Cabang)' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row12=mysql_fetch_array($a12);
											
											$a13=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer from tb_penjualan_dompul where bank2='Bank Mandiri' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row13=mysql_fetch_array($a13);
											
											$a14=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer from tb_penjualan_dompul where bank2='Bank BNI' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row14=mysql_fetch_array($a14);
											
											$a15=mysql_query("SELECT sum(bayar_transfer2) as bayartransfer from tb_penjualan_dompul where bank2='Bank BRI' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row15=mysql_fetch_array($a15);
											
											$a16=mysql_query("SELECT sum(bayar_transfer3) as bayartransfer from tb_penjualan_dompul where bank3='Bank BCA (Pusat)' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row16=mysql_fetch_array($a16);
											
											$a17=mysql_query("SELECT sum(bayar_transfer3) as bayartransfer from tb_penjualan_dompul where bank3='Bank BCA (Cabang)' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row17=mysql_fetch_array($a17);
											
											$a18=mysql_query("SELECT sum(bayar_transfer3) as bayartransfer from tb_penjualan_dompul where bank3='Bank Mandiri' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row18=mysql_fetch_array($a18);
											
											$a19=mysql_query("SELECT sum(bayar_transfer3) as bayartransfer from tb_penjualan_dompul where bank3='Bank BNI' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row19=mysql_fetch_array($a19);
											
											$a20=mysql_query("SELECT sum(bayar_transfer3) as bayartransfer from tb_penjualan_dompul where bank3='Bank BRI' and id_sales='$row3[idsales]' and tanggal_penjualan_dompul='$tanggal_awal'");
											$row20=mysql_fetch_array($a20);
											
											$a21=mysql_query("SELECT nama_bo from tb_bo where id_bo='$row3[idbo]'");
											$row21=mysql_fetch_array($a21);
											?>
											<tr>
											  <td><div align="center"><?php echo $no;?></div></td>
											  <td class="info" align="center"><a target="_blank" href="dash.php?hp=laporan-pj-dompul3&hp_sales=<?php echo $row3['hpsales']; ?>&tanggal_awal=<?php echo $tanggal_awal; ?>&tanggal_akhir=<?php echo $tanggal_akhir; ?>"><?php echo $row3['namasales'];?></a></td>
											  <td align="center"><?php echo $row21['nama_bo'];?></td>
											  <td align="center"><a href="#" ><?php echo $row3['totqty'];?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row3['totgrandtotal'],0);?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row3['totbayartunai'],0);?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row6['bayartransfer']+$row11['bayartransfer']+$row16['bayartransfer'],0);?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row7['bayartransfer']+$row12['bayartransfer']+$row17['bayartransfer'],0);?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row8['bayartransfer']+$row13['bayartransfer']+$row18['bayartransfer'],0);?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row9['bayartransfer']+$row14['bayartransfer']+$row19['bayartransfer'],0);?></a></td>
											  <td align="center"><a href="#" ><?php echo number_format($row10['bayartransfer']+$row15['bayartransfer']+$row20['bayartransfer'],0);?></a></td>
											  <td align="center"><a target="_blank" href="dash.php?hp=laporan-hutang-dompul&id_sales=<?php echo $row3['idsales']; ?>&tanggal_awal=<?php echo $tanggal_awal; ?>"><?php echo number_format($piutang,0);?></a></td>
											  </tr>
											<tr>
                                            <?php
											$no++;
											$jumlahqty					=$jumlahqty+$row3['totqty'];
											$jumlahgrandtotal			=$jumlahgrandtotal+$row3['totgrandtotal'];
											$jumlahgrandtunai			=$jumlahgrandtunai+$row3['totbayartunai'];
											$jumlahgrandbcapusat		=$jumlahgrandbcapusat+$row6['bayartransfer'];
											$jumlahgrandbcacabang		=$jumlahgrandbcacabang+$row7['bayartransfer'];
											$jumlahgrandmandiri			=$jumlahgrandmandiri+$row8['bayartransfer'];
											$jumlahgrandbni				=$jumlahgrandbni+$row9['bayartransfer'];
											$jumlahgrandbri				=$jumlahgrandbri+$row10['bayartransfer'];
											$jumlahgrandpiutang			=$jumlahgrandpiutang+$piutang;
											}
											?>
												<td></td>
												<td align="center"><strong>Grand Total</strong></td>
				                                <td align="center">&nbsp;</td>
				                                <td align="center"><strong><?php echo $jumlahqty; ?></strong></td>
				                                <td align="center"><strong><?php echo number_format($jumlahgrandtotal,0); ?></strong></td>
			                                    <td align="center"><strong><?php echo number_format($jumlahgrandtunai,0); ?></strong></td>
	                                            <td align="center"><strong><?php echo number_format($jumlahgrandbcapusat,0); ?></strong></td>
	                                            <td align="center"><strong><?php echo number_format($jumlahgrandbcacabang,0); ?></strong></td>
	                                            <td align="center"><strong><?php echo number_format($jumlahgrandmandiri,0); ?></strong></td>
	                                            <td align="center"><strong><?php echo number_format($jumlahgrandbni,0); ?></strong></td>
	                                            <td align="center"><strong><?php echo number_format($jumlahgrandbri,0); ?></strong></td>
                                              <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td align="center"><strong><?php echo number_format($jumlahgrandpiutang,0); ?></strong></td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="12">
												<?php
												if(($data_bantu4[0]!=$jumlahsptotal)||($data_bantu4[0]==0)||($jumlahsptotal==0))
												{
													echo "&nbsp;";
												}
												else if($data_bantu4[0]==$jumlahsptotal)
												{
												?>
													<a href="build/build-penjualan-sp/cetakpenjualansp.php?id=<?php echo $idpenjualan; ?>&id2=<?php echo $idcanvaser; ?>" target="_blank" class="btn btn-info" >
													<i class="ace-icon fa fa-check bigger-110"></i>
													Cetak													</a>
													<a href="dash.php?hp=penjualan-sp" class="btn btn-success" >
													Selesai													</a>	
												<?php
												}
												?>												</td>
											</tr>
											</form>
											</tbody>
										</table>
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
