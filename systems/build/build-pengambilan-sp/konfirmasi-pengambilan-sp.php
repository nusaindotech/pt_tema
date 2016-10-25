<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$id_ho = $_SESSION[id_ho];
					$id_bo = $_SESSION[id_bo];
					$idcanvaser = $_GET[idcanvaser];
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
							<li class="active">Konfirmasi Pengambilan</li>
							<li class="active">Starting Pack</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Konfirmasi Pengambilan Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
								<?php
									$bantu2="select nama_sales
									from tb_sales
									where id_sales='$idcanvaser'";
									$hasil_bantu2=mysql_query($bantu2);
									$data_bantu2=mysql_fetch_array($hasil_bantu2);
								?>
								Nama Canvasser : <?php echo $data_bantu2[0]; ?><br><br>
								Daftar HU Yang Diambil :
                                <form action="build/build-pengambilan-sp/insert-pengambilan-sp.php" method="POST" class="form-horizontal" role="form">
                                        <div>
                                        <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
										<input name="canvaser" value="<?php echo $idcanvaser; ?>" type="hidden" />
										<table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th><center>No</center></th>
											<th><center>HU 1</center></th>
											<th><center>Total SP</center></th>
                                            <th><center>Aksi</center></th>
                                        <?php } ?>
										</tr>
										</thead>
										<tbody>
										<?php 
                                        include "auth/autho.php";
										if($_SESSION[hak_akses]=='3')
                                    	{  
                                        	$tampil=mysql_query("select distinct(hu_1)
											from tb_temp_pengambilan_sp where id_sales='$idcanvaser'");
                                        	$no=1;
											$hitungsp=0;
                                        	while($row=mysql_fetch_array($tampil))
                                        	{
										?>
											<tr>
												<td><center><?php echo $no; ?></center></td>
												<td><center><?php echo $row[0]; ?></center></td>
                                                <?php
                                                    $bantu="select count(ip)
															from tb_temp_pengambilan_sp
															where id_sales='$idcanvaser' and hu_1='$row[0]'";
													$hasil_bantu=mysql_query($bantu);
													$data_bantu=mysql_fetch_array($hasil_bantu);
													$hitungsp=$hitungsp+$data_bantu[0];
													?>
                                                <td><center><?php echo $data_bantu[0]; ?></center></td>
												<input name="tgl_input" value="<?php echo date('Y-m-d'); ?>" type="hidden" />
												<td align="center">
													<div class="hidden-sm hidden-xs btn-group">	
														<a class="btn btn-xs btn-danger" href="build/build-pengambilan-sp/hapus-detail-pengambilan.php?hu=<?php echo $row[0]; ?>
														&id=<?php echo $idcanvaser; ?>">
															<i class="ace-icon fa fa-trash-o bigger-120"></i></a>
													</div>
												</td>	
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
                                      <td align="center"><?php echo $hitungsp; ?></td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td colspan="4">
									  <a href="dash.php?hp=pengambilan-sp" class="btn btn-success" >
										Tambah HU
									  </a>
                                      <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
									   </button>
											&nbsp; &nbsp; &nbsp;
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