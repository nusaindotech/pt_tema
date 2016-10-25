<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$id_ho = $_SESSION[id_ho];
					$id_bo = $_SESSION[id_bo];
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
							<li class="active">Pengambilan</li>
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
								Pengambilan Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
								<div class="table-header">
									Pengambilan SP
								</div>
                                <form action="build/build-pengambilan-sp/insert-temp-pengambilan-sp.php" method="POST" class="form-horizontal" role="form">
                                        <div>
                                        <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
										<table id="example1" class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th>No</th>
											<th>HU 1</th>
											<th>Total SP</th>
                                        <?php } ?>
										</tr>
										</thead>
										<tbody>
										<?php 
                                        include "auth/autho.php";
										if($_SESSION[hak_akses]=='3')
                                    	{  
                                        	$tampil=mysql_query("select distinct(hu_1)
															     from tb_sp where id_bo='$id_bo' and id_kios='0' and id_sales='0'");
                                        	$no=1;
											$hitung_sp=0;
                                        	while($row=mysql_fetch_array($tampil))
                                        	{
										?>
											<tr>
												<td><center><?php echo $no; ?></center></td>
												<td align="center"><a href="dash.php?hp=pengambilan-sp2&hu1=<?php echo $row[0]; ?>">
													<?php echo $row[0]; ?></a></td>
                                                <?php
                                                    $bantu="select count(hu_1)
															from tb_sp
															where hu_1='$row[0]' and id_bo='$id_bo' and id_kios='0' and id_sales='0'";
													$hasil_bantu=mysql_query($bantu);
													$data_bantu=mysql_fetch_array($hasil_bantu);
													?>
                                                <td><center><?php echo $data_bantu[0]; ?></center></td>
												<?php $hitung_sp=$hitung_sp+$data_bantu[0]; ?>												
											</tr>
										<?php 
											$no++;
											}
										}
										?>
										</tbody>
										<tr>
											<td>&nbsp;</td>
											<td align="center">Total SP</td>
											<td align="center"><?php echo $hitung_sp; ?></td>
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
						<script type="text/javascript">
						$(function() {
							$("#example1").dataTable();
						});
					</script>
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>