<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$id_ho = $_SESSION[id_ho];
					$id_bo = $_SESSION[id_bo];
					$id_reg = $_GET['id'];
					?>
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Detail</li>
							<li class="active">Pengiriman SP</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Pengiriman Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                <form action="build/build-register-barang/insert-register-barang.php" method="POST" class="form-horizontal" role="form">
                                        <div>
                                        <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
                                        <input name="id_ho" value="<?php echo $id_ho; ?>" type="hidden" />
										ID Register SP : <strong><?php echo $id_reg; ?></strong>
										<br />
										<br />
										<?php
										$bantu3="select tanggal_register_sp from tb_register_sp where id_register_sp='$id_reg'";
										$hasil_bantu3=mysql_query($bantu3);
										$data_bantu3=mysql_fetch_array($hasil_bantu3);
										?>
										Tanggal Register SP : <strong><?php echo $data_bantu3[0]; ?></strong>
										<table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='2')
                                    	{ ?>
											<th><center>No</center></th>
											<th><center>HU 2</center></th>
											<th><center>Total SP</center></th>
                                        <?php 
										}
										else if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th><center>No</center></th>
											<th><center>HU 1</center></th>
											<th><center>Total SP</center></th>
                                        <?php } ?>
										</tr>
										</thead>
										<tbody>
										<?php 
                                        include "auth/autho.php";
										if($_SESSION[hak_akses]=='2')
                                    	{  
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
										}
										else if($_SESSION[hak_akses]=='3')
                                    	{  
                                        	$tampil=mysql_query("select distinct(hu_2)
															     from  tb_detail_register_sp where id_register_sp='REG-1'");
                                        	$no=1;
                                        	while($row=mysql_fetch_array($tampil))
                                        	{
										?>
											<tr>
												<td><center><?php echo $no; ?></center></td>
												<td><center><?php echo $row[0]; ?></center></td>
                                                <?php
                                                    $bantu="select count(hu_2)
															from tb_sp
															where hu_2='$row[0]' and id_bo='$id_bo' and id_kios='0' and id_sales='0'";
													$hasil_bantu=mysql_query($bantu);
													$data_bantu=mysql_fetch_array($hasil_bantu);
													?>
                                                <td><center><?php echo $data_bantu[0]; ?></center></td>
                                                <input name="tgl_input" value="<?php echo date('Y-m-d'); ?>" type="hidden" />
											</tr>
										<?php 
											$no++;
											}
										}
										?>
										</tbody>
										<tr>
											<td>&nbsp;</td>
											<td align="center">Total SP Yang Diambil</td>
											<td align="center"><?php echo $hitung_sp; ?></td>
										</tr>
										<tr>
											<td colspan="3">
											<a href="build/build-register-barang/cetak-register-barang.php?id=<?php echo $id_reg; ?>" target="_blank" class="btn btn-info" >
												<i class="ace-icon fa fa-check bigger-110"></i>
												Cetak
											</a>
											<a href="dash.php?hp=register-barang" class="btn btn-success" >
												Selesai
											</a>		
											</td>
										</tr>
								</table>
                                  </div>
                                  </form>
								<div class="row">
									
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					</div>
					
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>