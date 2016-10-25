<?php
	$tanggal_awal			=$_POST['tanggal_awal'];
	$tanggal_akhir			=$_POST['tanggal_akhir'];
	
	$id_ho	= $_SESSION['id_ho'];
	
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
							<li class="active">Persediaan</li>
							<li class="active">Mutasi Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Mutasi Dompul Tanggal <strong><?php echo $tanggal_awal; ?></strong></h1>
					  </div>
						<!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-penjualan-lainnya/update-lainnya.php" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    
									<tr>
                                      <td width="10%">Nama Kasir</td>
                                      <td width="1%">:</td>
                                      <td width="20%"><strong>Sueb</strong></td>
                                      <td width="2%">&nbsp;</td>
                                      <td width="11%">Tanggal Cetak Laporan</td>
                                      <td width="2%">:</td>
                                      <td width="20%"><input readonly="readonly" name="tanggaldaftar" class="input-sm" type="text" value="<?php
											echo $tglsekarang;
											?>" style="width:100px;" /></td>
                                      <td width="3%">&nbsp;</td>
                                    </tr>
                                    
                                    
                                    <tr>
                                    <td colspan="8">&nbsp;</td>
                                    </tr>
								</table>
                              </form>

								<div class="row">
									<div class="col-xs-12">
								  <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
												  <th rowspan="2"><div align="center">No.</div></th>
												  <th rowspan="2">													  <div align="center">No Sub Master Dompul</div></th>
												  <th colspan="3"><div align="center">Stok Awal</div></th>
												  <th colspan="3"><div align="center">Stok Masuk</div></th>
												  <th colspan="3"><div align="center">Stok Keluar</div></th>
												  <th colspan="3"><div align="center">Stok Akhir</div></th>
											  </tr>
												<tr>
													<th><div align="center">5 K</div></th>
													<th><div align="center">10 K</div></th>
													<th><div align="center">Rupiah</div></th>
													<th> <div align="center">5 K</div></th>
													<th><div align="center">10 K</div></th>
													<th><div align="center">Rupiah</div></th>
													<th><div align="center">5 K</div></th>
													<th><div align="center">10 K</div></th>
													<th>Rupiah</th>
													<th>5 K</th>
													<th>10 K</th>
													<th>                                                      <div align="center">Rupiah</div></th>
												</tr>
											</thead>
											<tbody>
											<?php
											$tampil3=mysql_query("SELECT no_hp_sub_master_dompul, nama_sub_master_dompul 
											from tb_sub_master_dompul where id_ho='$id_ho'");
											$no=1;
											while($row3=mysql_fetch_array($tampil3))
											{
											
											$a1=mysql_query("SELECT sum(bayar_transfer) as bayartransfer from tb_penjualan_dompul where bank='Bank BCA (Pusat)' and id_sales='$row3[idsales]'");
											$row1=mysql_fetch_array($a1);
												
											$a4=mysql_query("SELECT saldo_awal from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DP5' and tanggal_transaksi='$tanggal_awal'");
											$row4=mysql_fetch_array($a4);
											
											$a5=mysql_query("SELECT saldo_awal from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DP10' and tanggal_transaksi='$tanggal_awal'");
											$row5=mysql_fetch_array($a5);
											
											$a6=mysql_query("SELECT saldo_awal from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DOMPUL' and tanggal_transaksi='$tanggal_awal'");
											$row6=mysql_fetch_array($a6);
											
											$a7=mysql_query("SELECT sum(jumlah_dompul) as jumlah_masuk from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DP5' and tanggal_transaksi='$tanggal_awal'
															and tipe='IN'");
											$row7=mysql_fetch_array($a7);
											
											$a8=mysql_query("SELECT sum(jumlah_dompul) as jumlah_masuk from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DP10' and tanggal_transaksi='$tanggal_awal'
															and tipe='IN'");
											$row8=mysql_fetch_array($a8);
											
											$a9=mysql_query("SELECT sum(jumlah_dompul) as jumlah_masuk from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DOMPUL' and tanggal_transaksi='$tanggal_awal'
															and tipe='IN'");
											$row9=mysql_fetch_array($a9);
											
											$a10=mysql_query("SELECT sum(jumlah_dompul) as jumlah_keluar from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DP5' and tanggal_transaksi='$tanggal_awal'
															and tipe='OUT'");
											$row10=mysql_fetch_array($a10);
											
											$a11=mysql_query("SELECT sum(jumlah_dompul) as jumlah_keluar from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DP10' and tanggal_transaksi='$tanggal_awal'
															and tipe='OUT'");
											$row11=mysql_fetch_array($a11);
											
											$a12=mysql_query("SELECT sum(jumlah_dompul) as jumlah_keluar from tb_mutasi_dompul 
															where no_hp_sub_master_dompul='$row3[no_hp_sub_master_dompul]' and id_type_dompul='DOMPUL' and tanggal_transaksi='$tanggal_awal'
															and tipe='OUT'");
											$row12=mysql_fetch_array($a12);
											
											$sisa_stok_dp5		= ($row7['jumlah_masuk']-$row10['jumlah_keluar'])+$row4['saldo_awal'];
											$sisa_stok_dp10 	= ($row8['jumlah_masuk']-$row11['jumlah_keluar'])+$row5['saldo_awal'];
											$sisa_stok_dompul 	= ($row9['jumlah_masuk']-$row12['jumlah_keluar'])+$row6['saldo_awal'];
																						
											?>
											<tr>
											  <td><div align="center"><?php echo $no;?></div></td>
											  <td class="info" align="center"><?php echo $row3['nama_sub_master_dompul']; ?></td>
											  <td align="center"><?php echo number_format($row4['saldo_awal'],0); ?></td>
											  <td align="center"><?php echo number_format($row5['saldo_awal'],0); ?></td>
											  <td align="center"><?php echo number_format($row6['saldo_awal'],0); ?></td>
											  <td align="center"><?php echo number_format($row7['jumlah_masuk'],0); ?></td>
											  <td align="center"><?php echo number_format($row8['jumlah_masuk'],0); ?></td>
											  <td align="center"><?php echo number_format($row9['jumlah_masuk'],0); ?></td>
											  <td align="center"><?php echo number_format($row10['jumlah_keluar'],0); ?></td>
											  <td align="center"><?php echo number_format($row11['jumlah_keluar'],0); ?></td>
											  <td align="center"><?php echo number_format($row12['jumlah_keluar'],0); ?></td>
											  <td align="center"><?php echo number_format($sisa_stok_dp5,0); ?></td>
											  <td align="center"><?php echo number_format($sisa_stok_dp10,0); ?></td>
											  <td align="center"><?php echo number_format($sisa_stok_dompul,0); ?></td>
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
				                                <td align="center">&nbsp;</td>
			                                    <td align="center">&nbsp;</td>
	                                            <td align="center">&nbsp;</td>
	                                            <td align="center">&nbsp;</td>
	                                            <td align="center">&nbsp;</td>
	                                            <td align="center">&nbsp;</td>
	                                            <td align="center">&nbsp;</td>
                                                <td align="center">&nbsp;</td>
                                                <td align="center">&nbsp;</td>
                                                <td align="center">&nbsp;</td>
                                              <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td align="center">&nbsp;</td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="14">
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
