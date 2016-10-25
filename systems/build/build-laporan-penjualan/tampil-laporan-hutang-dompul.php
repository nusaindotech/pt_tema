<?php

	$canvaser		=$_GET['id_sales'];
	$tanggal_awal	=$_GET['tanggal_awal'];
	$tanggal_akhir	=$_GET['tanggal_akhir'];
	
	$tglsekarang = date('Y-m-d');

	$a2=mysql_query("SELECT * from tb_sales where id_sales='$canvaser'");
	$row2=mysql_fetch_array($a2);
	if($row2['nama_sales']=='')
	{
		$namasales="Sales Tidak Terdaftar";
	}
	else
	{
		$namasales=$row2['nama_sales'];
	}
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
							<li class="active">Piutang Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Detail Piutang Dompul</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-penjualan-lainnya/update-lainnya.php" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>Tanggal Awal</td>
                                      <td>:&nbsp;</td>
                                      <td><?php echo $tanggal_awal; ?></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Tanggal Akhir</td>
                                      <td>:</td>
                                      <td><?php echo $tanggal_akhir; ?></td>
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
									  <input name="id" class="input-sm" type="text" id="id_customer" value="<?php echo $row2['id_sales']; ?>" readonly style="width:120px;"/>									  </td>
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
									  <input name="nama_sales" class="input-sm" type="text" id="nama_sales" value="<?php echo $namasales; ?>" readonly />									  </td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
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
													<th width="200">Total Tagihan</th>
													<th width="200"><center>
                                                      Piutang
													</center>                                                    </th>
												</tr>
											</thead>
											<tbody>
											<?php
											$tampil3=mysql_query("SELECT hp_kios
											FROM tb_penjualan_dompul
											WHERE id_sales = '$canvaser'
											GROUP BY hp_kios");
											$no=1;
											$nomor=1;
											$jumlahtotal=0;
											$jumlahpiutang=0;
											
											while($row3=mysql_fetch_array($tampil3))
											{
											$a4=mysql_query("SELECT nama_kios from tb_kios where hp_kios='$row3[hp_kios]'");
											$row4=mysql_fetch_array($a4);
											
											if($row4['nama_kios']=='')
											{
												$namakios= "Belum Ada Nama, No HP KIOS : ". $row3['hp_kios'];
											}
											else
											{
												$namakios= $row4['nama_kios'];
											}
											
											$a5=mysql_query("SELECT sum(grand_total) as grandtotal, sum(bayar_tunai) as bayartunai, sum(bayar_transfer) as bayartransfer, sum(bayar_transfer2) as bayartransfer2, sum(bayar_transfer3) as bayartransfer3
											from tb_penjualan_dompul where hp_kios='$row3[hp_kios]'");
											$row5=mysql_fetch_array($a5);
											$jumlahtotal = $jumlahtotal+$row5['grandtotal'];
											
											$piutang= $row5['grandtotal']-$row5['bayartunai']-$row5['bayartransfer']-$row5['bayartransfer2']-$row5['bayartransfer3;'];
											$jumlahpiutang = $jumlahpiutang+$piutang;
											?>
											<tr>
											  <td><div align="center"><?php echo $no;?></div></td>
											  <td class="info" align="center"><a href="#"><?php echo $namakios;?></a></td>
											  <td align="center"><?php echo number_format($row5['grandtotal'],0);?></td>
											  <td align="center"><?php echo number_format($piutang,0);?></td>
											  </tr>
											<tr>
                                            <?php
											$no++;
											}
											?>
												<td></td>
												<td align="center"><strong>Grand Total</strong></td>
				                                <td align="center"><?php echo number_format($jumlahtotal,0); ?></td>
		                                    <?php
												$bantu4="select count(d.ip)
												from tb_detail_pengambilan d, tb_pengambilan_sp p
												where d.id_pengambilan_sp=p.id_pengambilan_sp and p.id_sales='$idcanvaser' and p.tanggal_ambil='$tglsekarang'";
												$hasil_bantu4=mysql_query($bantu4);
												$data_bantu4=mysql_fetch_array($hasil_bantu4);
												?>
												<td align="center"><strong><?php echo number_format($jumlahpiutang,0); ?></strong></td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="4">
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
