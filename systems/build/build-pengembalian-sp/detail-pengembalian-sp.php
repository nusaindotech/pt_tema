<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$hu =$_GET['hu'];
					$id =$_GET['id'];
					$idps =$_GET['idps'];
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
                                    <form action="build/build-pengembalian-sp/insert-pengembalian-sp.php" method="POST" class="form-horizontal" role="form">
                                    <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
                                    <input name="id_ps" value="<?php echo $idps; ?>" type="hidden" />
										<table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='2')
                                    	{ ?>
											<th><center>No</center></th>
											<th><center>HU 2</center></th>
                                            <th><center></center></th>
                                        <?php 
										}
										else if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th><center>No</center></th>
											<th><center>Nomor Telepon</center></th>
                                            <th><center></center></th>
                                        <?php } ?>
										</tr>
										</thead>
										<tbody>
										<?php 
                                        include "auth/autho.php";
										if($_SESSION[hak_akses]=='3')
                                    	{  
                                        	$tampil=mysql_query("select ip from tb_sp
																 where hu_1='$hu' and id_sales='$id'");
                                        	$no=1;
                                        	while($row=mysql_fetch_array($tampil))
                                        	{
										?>
											<tr>
												<td><center><?php echo $no; ?></center></td>
												<td><center><?php echo $row[0]; ?></center></td>
                                                <td><center>
                                                <?php echo "<input type='checkbox' name='pilih[]' value='$row[0]'>"; ?>
												</center></td>	
											</tr>
										<?php 
											$no++;
											}
										}
										?>
										</tbody>
								</table>
                                <br />
                                
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
												Simpan
									   </button>
											&nbsp; &nbsp; &nbsp;
                                            </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
                                  </form>
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