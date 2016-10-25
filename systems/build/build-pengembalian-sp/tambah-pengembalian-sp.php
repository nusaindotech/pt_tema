<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$id =$_GET['id'];
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
							<li class="active">Pengembalian</li>
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
								Pengembalian Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                	<div>
                                    <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
                                    <form action="dash.php?hp=pengembalian-sp" method="GET" class="form-horizontal" role="form">
									
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                	<tr>
                                    <?php
                                    if($_SESSION[hak_akses]=='3')
									{ ?>
										<td>ID Pengambilan SP</td>
                                      	<td>:</td>
                                      	<td>
                                        <input type="hidden" name="hp" value="pengembalian-sp" />
                                        <input name="id" style="width:200px;" data-rel="tooltip" type="text" id="form-field-6" title="ID Pengambilan SP" data-placement="bottom" />
                                    	</td>
                                    	<td>&nbsp;</td>
									<?php
									}
									?>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>
                                      <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Cari
									   </button>
											&nbsp; &nbsp; &nbsp;
											
                                            </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
                                  </form>
                                  <br />
										<table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
                                        <?php
										if($_SESSION[hak_akses]=='3'){
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
										if($_SESSION[hak_akses]=='3')
                                    	{
											$bantu2="select id_sales from tb_pengambilan_sp
											     where id_pengambilan_sp='$id'";
											$hasil_bantu2=mysql_query($bantu2);
											$data_bantu2=mysql_fetch_array($hasil_bantu2);
									
                                        	$tampil=mysql_query("select distinct(hu_1)
											from tb_detail_pengambilan
											where id_pengambilan_sp='$id'");
                                        	$no=1;
                                        	while($row=mysql_fetch_array($tampil))
                                        	{
										?>
											<tr>
												<td><center><?php echo $no; ?></center></td>
												<td><center><?php echo $row[0]; ?></center></td>
                                                <?php
												$bantu="select count(ip)
														from tb_detail_pengambilan
														where id_pengambilan_sp='$id' and hu_1='$row[0]'";
												$hasil_bantu=mysql_query($bantu);
												$data_bantu=mysql_fetch_array($hasil_bantu);
												?>
                                                <td><center>
                                                <a href="dash.php?hp=detail-pengembalian-sp&hu=<?php echo $row[0]; ?>&id=<?php echo $data_bantu2[0]; ?>&idps=<?php echo $id; ?>">
                                                <?php echo $data_bantu[0]; ?></a>
                                                </center></td>
											</tr>
										<?php 
											$no++;
											}
										}
										?>
										</tbody>
								</table>
                                  </div>
                                  
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