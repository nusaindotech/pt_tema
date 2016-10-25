<?php
	$tanggal_awal	=$_POST['tanggal_awal'];
	
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
							<li class="active">Monitoring Penjualan Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Monitoring Penjualan Upload</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-penjualan-lainnya/update-lainnya.php" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>Tanggal Penjualan</td>
                                      <td>:&nbsp;</td>
                                      <td><input name="no_penjualan" class="input-sm" type="text" value="<?php echo $tanggal_awal; ?>" readonly="readonly" style="width:120px;"/></td>
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
													<th>													  <div align="center">Canvaser
												    </div></th>
													<th width="200"><div align="center">Qty</div></th>
													<th width="200"><div align="center">5K</div></th>
													<th width="200"><div align="center">10K</div></th>
													<th width="200">                                                      <div align="center">Rupiah
												    </div></th>
												</tr>
											</thead>
											<tbody>
											<?php
											$tampil3=mysql_query("SELECT * from tb_sales where id_bo='$_SESSION[id_bo]' ");
											$no=1;
											$nomor=1;
											
											$totalqty5k=0;
											$totalqty5kprogram=0;
											
											$totalqty10k=0;
											$totalqty10kprogram=0;
											
											$totalqtyrupiah=0;
											$totalqtyrupiahprogram=0;
											
											$totalqtyall5k=0;
											$totalqtyall10k=0;
											$totalqtyallrupiah=0;
											while($row3=mysql_fetch_array($tampil3))
											{
											$a4	=mysql_query("SELECT sum(qty) as totalqty5k,  sum(qty_program) as totalqty5kprogram from tb_upload_dompul 
											where produk='DP5' and hp_sales='$row3[hp_sales]' and tanggal_transaksi='$tanggal_awal'");
											$row4 =mysql_fetch_array($a4);
											$totalqty5k			= $totalqty5k+$row4['totalqty5k'];
											$totalqty5kprogram	= $totalqty5kprogram+$row4['totalqty5kprogram'];
											
											$a5	=mysql_query("SELECT sum(qty) as totalqty10k,  sum(qty_program) as totalqty10kprogram from tb_upload_dompul 
											where produk='DP10' and hp_sales='$row3[hp_sales]' and tanggal_transaksi='$tanggal_awal'");
											$row5 =mysql_fetch_array($a5);
											$totalqty10k		= $totalqty10k+$row5['totalqty10k'];
											$totalqty10kprogram	= $totalqty10kprogram+$row5['totalqty10kprogram'];
											
											$a6	=mysql_query("SELECT sum(qty) as totalqtyrupiah,  sum(qty_program) as totalqtyrupiahprogram from tb_upload_dompul 
											where produk='DOMPUL' and hp_sales='$row3[hp_sales]' and tanggal_transaksi='$tanggal_awal'");
											$row6 =mysql_fetch_array($a6);
											$totalqtyrupiah			= $totalqtyrupiah+$row6['totalqtyrupiah'];
											$totalqtyrupiahprogram	= $totalqtyrupiahprogram+$row6['totalqtyrupiahprogram'];
											?>
											<tr>
											  <td><div align="center"><?php echo $no;?></div></td>
											  <td class="info" align="center"><?php echo $row3['nama_sales'];?></td>
											  <td align="center"><div align="left">Total Non Program</div></td>
											  <td align="center"><?php echo $row4['totalqty5k'];?></td>
											  <td align="center"><?php echo $row5['totalqty10k'];?></td>
											  <td align="center"><?php echo number_format($row6['totalqtyrupiah'],0);?></td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td class="info" align="center">&nbsp;</td>
											  <td align="center"><div align="left">Total Program</div></td>
											  <td align="center"><?php echo $row4['totalqty5kprogram'];?></td>
											  <td align="center"><?php echo $row5['totalqty10kprogram'];?></td>
											  <td align="center"><?php echo number_format($row6['totalqtyrupiahprogram'],0);?></td>
											  </tr>
											
                                            <?php
											$no++;
											}
											$totalqtyall5k		= $totalqtyall5k+$totalqty5kprogram+$totalqty5k;
											$totalqtyall10k		= $totalqtyall10k+$totalqty10kprogram+$totalqty10k;
											?>
                                            <tr>
												<td></td>
												<td colspan="2" align="center"><strong>Total Qty Penjualan Non Program</strong></td>
				                                <td align="center"><?php echo $totalqty5k; ?></td>
				                                <td align="center"><?php echo $totalqty10k; ?></td>
											  <td align="center"><?php echo number_format($totalqtyrupiah,0); ?></td>
											</tr>
                                            <tr>
                                              <td></td>
                                              <td colspan="2" align="center"><strong>Total Qty Penjualan Program</strong></td>
                                              <td align="center"><?php echo $totalqty5kprogram; ?></td>
                                              <td align="center"><?php echo $totalqty10kprogram; ?></td>
                                              <td align="center"><?php echo number_format($totalqtyrupiahprogram,0); ?></td>
                                            </tr>
                                            
                                            <tr>
												<td></td>
												<td colspan="2" align="center"><strong>Total All Penjualan</strong></td>
			                                  <td align="center"><?php echo $totalqtyall5k; ?></td>
				                                <td align="center"><?php echo $totalqtyall10k; ?></td>
											  <td align="center"><?php echo number_format($totalqtyrupiah+$totalqtyrupiahprogram,0); ?></td>
											</tr>
											<form action="build/build-penjualan-sp/update-detail-penjualan.php" method="POST" class="form-horizontal" role="form">
											<tr>
												<td colspan="6">&nbsp;</td>
											</tr>
											</form>
											</tbody>
										</table>
								  <p>Penjualan Input</p>
								  <table id="simple-table2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th><center>
                                          No.
                                        </center></th>
                                        <th> <div align="center">Canvaser </div></th>
                                        <th width="200"><div align="center">Qty</div></th>
                                        <th width="200"><div align="center">5K</div></th>
                                        <th width="200"><div align="center">10K</div></th>
                                        <th width="200"> <div align="center">Rupiah </div></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
											$tampil10=mysql_query("SELECT * from tb_sales where id_bo='$_SESSION[id_bo]' ");
											$no=1;
											$nomor=1;
											
											$totalqty5ka=0;
											$totalqty5kprograma=0;
											
											$totalqty10ka=0;
											$totalqty10kprograma=0;
											
											$totalqtyrupiaha=0;
											$totalqtyrupiahprograma=0;
											
											$totalqtyall5ka=0;
											$totalqtyall10ka=0;
											$totalqtyallrupiaha=0;
											while($row10=mysql_fetch_array($tampil10))
											{
											$a11	=mysql_query("SELECT sum( a.qty ) AS totalqty5ka, sum( a.qty_program ) AS totalqty5kprograma
													FROM tb_detail_penjualan_dompul a, tb_penjualan_dompul b
													WHERE a.produk = 'DP5'
													AND b.id_sales ='$row10[id_sales]' and b.tanggal_penjualan_dompul='$tanggal_awal'
													AND a.id_penjualan_dompul = b.id_penjualan_dompul");
													
											$row11 =mysql_fetch_array($a11);
											$totalqty5ka		= $totalqty5ka+$row11['totalqty5ka'];
											$totalqty5kprograma	= $totalqty5kprograma+$row11['totalqty5kprograma'];
											
											$a12	=mysql_query("SELECT sum( a.qty ) AS totalqty10ka, sum( a.qty_program ) AS totalqty10kprograma
													FROM tb_detail_penjualan_dompul a, tb_penjualan_dompul b
													WHERE a.produk = 'DP10'
													AND b.id_sales ='$row10[id_sales]' and b.tanggal_penjualan_dompul='$tanggal_awal'
													AND a.id_penjualan_dompul = b.id_penjualan_dompul");
													
											$row12					= mysql_fetch_array($a12);
											$totalqty10ka			= $totalqty10ka+$row12['totalqty10ka'];
											$totalqty10kprograma	= $totalqty10kprograma+$row12['totalqty10kprograma'];
											
											$a13	=mysql_query("SELECT sum( a.qty ) AS totalqtyrupiaha, sum( a.qty_program ) AS totalqtyrupiahprograma
													FROM tb_detail_penjualan_dompul a, tb_penjualan_dompul b
													WHERE a.produk = 'DOMPUL'
													AND b.id_sales ='$row10[id_sales]' and b.tanggal_penjualan_dompul='$tanggal_awal'
													AND a.id_penjualan_dompul = b.id_penjualan_dompul");
													
											$row13					= mysql_fetch_array($a13);
											$totalqtyrupiaha		= $totalqtyrupiaha+$row13['totalqtyrupiaha'];
											$totalqtyrupiahprograma	= $totalqtyrupiahprograma+$row13['totalqtyrupiahprograma'];
											?>
                                      <tr>
                                        <td><div align="center"><?php echo $no;?></div></td>
                                        <td class="info" align="center"><?php echo $row10['nama_sales'];?></td>
                                        <td align="center"><div align="left">Total Non Program</div></td>
                                        <td align="center"><?php echo $row11['totalqty5ka'];?></td>
                                        <td align="center"><?php echo $row12['totalqty10ka'];?></td>
                                        <td align="center"><?php echo number_format($row13['totalqtyrupiaha'],0);?></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td class="info" align="center">&nbsp;</td>
                                        <td align="center"><div align="left">Total Program</div></td>
                                        <td align="center"><?php echo $row11['totalqty5kprograma'];?></td>
                                        <td align="center"><?php echo $row12['totalqty10kprograma'];?></td>
                                        <td align="center"><?php echo number_format($row13['totalqtyrupiahprograma'],0);?></td>
                                      </tr>
                                      <?php
											$no++;
											}
											$totalqtyall5ka		= $totalqtyall5ka+$totalqty5kprograma+$totalqty5ka;
											$totalqtyall10ka	= $totalqtyall10ka+$totalqty10kprograma+$totalqty10ka;
											$totalqtyallrupiaha	= $totalqtyallrupiaha+$totalqtyrupiahprograma+$totalqtyrupiaha;
											?>
                                      <tr>
                                        <td></td>
                                        <td colspan="2" align="center"><strong>Total Qty Penjualan Non Program</strong></td>
                                        <td align="center"><?php echo $totalqty5ka; ?></td>
                                        <td align="center"><?php echo $totalqty10ka; ?></td>
                                        <td align="center"><?php echo number_format($totalqtyrupiaha,0); ?></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td colspan="2" align="center"><strong>Total Qty Penjualan Program</strong></td>
                                        <td align="center"><?php echo $totalqty5kprograma; ?></td>
                                        <td align="center"><?php echo $totalqty10kprograma; ?></td>
                                        <td align="center"><?php echo number_format($totalqtyrupiahprograma,0); ?></td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                        <td colspan="2" align="center"><strong>Total All Penjualan</strong></td>
                                        <td align="center"><?php echo $totalqtyall5ka; ?></td>
                                        <td align="center"><?php echo $totalqtyall10ka; ?></td>
                                        <td align="center"><?php echo number_format($totalqtyrupiaha+$totalqtyrupiahprograma,0); ?></td>
                                      </tr>
                                    </tbody>
								    <form action="build/build-penjualan-sp/update-detail-penjualan.php" method="post" class="form-horizontal" role="form">
                                      <tr>
                                        <td colspan="6">&nbsp;</td>
                                      </tr>
                                    </form>
								    <tr>
								      <td></tbody></td>
							        </tr>
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
