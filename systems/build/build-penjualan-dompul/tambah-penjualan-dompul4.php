<?php
	session_start();
	$canvaser		=$_GET['canvaser'];
	$tanggal_input	=$_GET['tanggal_input'];
	
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
							<li class="active">Penjualan</li>
							<li class="active">Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Detail Penjualan Dompul</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-penjualan-lainnya/update-lainnya.php" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>Tanggal Penjualan</td>
                                      <td>:&nbsp;</td>
                                      <td><input name="no_penjualan" class="input-sm" type="text" value="<?php echo $tanggal_input; ?>" readonly="readonly" style="width:120px;"/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Nama Kasir</td>
                                      <td>:</td>
                                      <td><strong>Samsul</strong></td>
                                      <td>&nbsp;</td>
                                      <td width="12%">Nama Logistic</td>
                                      <td width="1%">:</td>
                                      <td width="20%"><strong>Sueb</strong></td>
                                      <td width="2%">&nbsp;</td>
                                      <td width="11%">Nama PIC</td>
                                      <td width="2%">:</td>
                                      <td width="20%"><strong>Susi</strong></td>
                                      <td width="3%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="5">&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>ID Canvaser</td>
                                      <td>:</td>
                                      <td>
									  <input name="id" class="input-sm" type="text" id="id_customer" value="<?php echo $row2['id_sales']; ?>" readonly style="width:120px;"/>
									  </td>
                                      <td>&nbsp;</td>
                                      <td>Nama Canvaser</td>
                                      <td>:</td>
                                      <td>
									  <?php
									  $bantu="select nama_sales
											  from tb_sales
											  where id_sales='$idcanvaser'";
									  $hasil_bantu=mysql_query($bantu);
									  $data_bantu=mysql_fetch_array($hasil_bantu);
									  ?>
									  <input name="nama_sales" class="input-sm" type="text" id="nama_sales" value="<?php echo $row2['nama_sales']; ?>" readonly />
									  </td>
                                      <td>&nbsp;</td>
                                      <td>
									  Tanggal Cetak Penjualan
									  </td>
                                      <td>:</td>
                                      <td><input readonly name="tanggaldaftar" class="input-sm" type="text" value="<?php
											echo $tglsekarang;
											?>" style="width:100px;" /></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="12">&nbsp;</td>
                                    </tr>
								</table>
                              </form>

								<div class="row">
									<div class="col-xs-12">
								  <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th><center>No.</center></th>
													<th><center>Nama RO</center></th>
													<th width="200"><center>
                                                      Qty Penjualan
                                                    </center>                                                    </th>
												</tr>
											</thead>
											<tbody>
											<?php
											$tampil3=mysql_query("SELECT hp_kios, nama_kios
											FROM tb_upload_dompul
											WHERE hp_sales = '$canvaser' and status_bayar_dompul='0' and tanggal_transaksi='$tanggal_input'
											GROUP BY nama_kios
											ORDER BY nama_kios");
											$no=1;
											$nomor=1;
											$jumlahtotal=0;
											while($row3=mysql_fetch_array($tampil3))
											{
											$a5=mysql_query("SELECT count(no_upload_dompul) as tot from tb_upload_dompul where hp_kios='$row3[hp_kios]'");
											$row5=mysql_fetch_array($a5);
											$jumlahtotal=$jumlahtotal+$row5['tot'];
											?>
											<tr>
											  <td><div align="center"><?php echo $no;?></div></td>
											  <td class="info" align="center">
											  <a href="dash.php?hp=penjualan-dompul3&tanggal_input=<?php echo $tanggal_input; ?>&hp_kios=<?php echo $row3['hp_kios']; ?>&hp_sales=<?php echo $canvaser; ?>" >
											  <?php
											  if($row3['nama_kios']=='')
											  {
												  echo "Unnamed";
											  }
											  else
											  {
												echo $row3['nama_kios'];  
											  }
											  
											  ?>
											  </a></td>
											  <td align="center"><?php echo $row5['tot'];?></td>
											  </tr>
											<tr>
                                            <?php
											$no++;
											}
											?>
												<td></td>
												<td align="center"><strong>Total Qty Penjualan</strong></td>
				                <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td align="center"><strong><?php echo $jumlahtotal; ?></strong></td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="3">
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
