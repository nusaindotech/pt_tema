<!-- #section:basics/content.breadcrumbs -->
					<?php
					session_start();
					$id_reg =$_GET['id'];
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
							<li class="active">Penerimaan</li>
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
								Penerimaan Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                <form action="dash.php?hp=penerimaan-sp" method="GET" class="form-horizontal" role="form">
                                <div>
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                	<tr>
                                    <?php
                                    if($_SESSION[hak_akses]=='3')
									{ ?>
										<td>ID Register SP</td>
                                      	<td>:</td>
                                      	<td>
                                        <input type="hidden" name="hp" value="penerimaan-sp" />
                                        <input name="id" style="width:200px;" data-rel="tooltip" type="text" id="form-field-6" title="ID Register SP" data-placement="bottom" />
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
								<br>
								<form action="build/build-penerimaan-sp/insert-penerimaan-sp.php" method="POST" class="form-horizontal" role="form">
								<input name="bo" value="<?php echo $id_bo; ?>" type="hidden" />
										<table class="table table-striped table-bordered table-hover">
										<thead>
										<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='2')
                                    	{ ?>
											<th><center>No</center></th>
											<th><center>HU 2</center></th>
											<th><center>Total SP</center></th>
											<th><center></center></th>
                                        <?php 
										}
										else if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th><center>No</center></th>
											<th><center>HU 2</center></th>
											<th><center>Total SP</center></th>
											<th><center></center></th>
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
												<td><center>
                                                <?php echo "<input type='checkbox' name='pilih[]' value='$row[0]'>"; ?>
												</center></td>	
											</tr>
											<?php 
											$no++;
											}
										}
										else if($_SESSION[hak_akses]=='3')
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
										<tr>
											<td>&nbsp;</td>
											<td align="center">Total SP</td>
											<td align="center"><?php echo $hitung_sp; ?></td>
											<td>&nbsp;</td>
										</tr>
                                    <tr>
                                      <td colspan="4">
                                      <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
									   </button>
                                        </td>
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