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
							<li class="active">Register</li>
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
								Register Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                <form action="build/build-register-barang/insert-register-barang.php" method="POST" class="form-horizontal" role="form">
                                        <div>
                                        <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
                                        <input name="ho" value="<?php echo $id_ho; ?>" type="hidden" />
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
											<th><center>HU 1</center></th>
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
 																 from tb_sp where id_ho='$id_ho' and id_bo='0'");
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
															where hu_2='$row[0]'";
													$hasil_bantu=mysql_query($bantu);
													$data_bantu=mysql_fetch_array($hasil_bantu);
													?>
                                                <td><center><?php echo $data_bantu[0]; ?></center></td>
												<td><center>
                                                <?php echo "<input type='checkbox' name='pilih1[]' value='$row[0]'>"; ?>
                                                <input name="tgl_input" value="<?php echo date('Y-m-d'); ?>" type="hidden" />
												</center></td>	
											</tr>
										<?php 
											$no++;
											}
										}
										else if($_SESSION[hak_akses]=='3')
                                    	{  
                                        	$tampil=mysql_query("select distinct(hu_1)
															     from tb_sp where id_bo='$id_bo' and id_kios='0' and id_sales='0'");
                                        	$no=1;
                                        	while($row=mysql_fetch_array($tampil))
                                        	{
										?>
											<tr>
												<td><center><?php echo $no; ?></center></td>
												<td><center><?php echo $row[0]; ?></center></td>
                                                <?php
                                                    $bantu="select count(hu_1)
															from tb_sp
															where hu_1='$row[0]' and id_bo='$id_bo' and id_kios='0' and id_sales='0'";
													$hasil_bantu=mysql_query($bantu);
													$data_bantu=mysql_fetch_array($hasil_bantu);
													?>
                                                <td><center><?php echo $data_bantu[0]; ?></center></td>
												<td><center>
                                                <?php echo "<input type='checkbox' name='pilih2[]' value='$row[0]'>"; ?>
                                                <input name="tgl_input" value="<?php echo date('Y-m-d'); ?>" type="hidden" />
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
                                    <?php
                                    if($_SESSION[hak_akses]=='2')
                                    { ?> 
                                    	<td>Pilih BO</td>
                                      	<td>:</td>
                                      	<td><select class="form-control" name="bo" style="width:200px;">
										<option value="">--Pilih BO--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_bo
										where id_ho='$id_ho' 
										ORDER BY nama_bo ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
											<option value="<?php  echo $row['id_bo']; ?>"><?php  echo $row['nama_bo']; ?></option>
										<?php
										}
										?>	
										</select>
                                    	</td>
                                    	<td>&nbsp;</td>
                                    <?php } 
									else if($_SESSION[hak_akses]=='3')
									{ ?>
										<td>Pilih RO</td>
                                      	<td>:</td>
                                      	<td><select class="form-control" name="ro" style="width:200px;">
										<option value="">--Pilih RO--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_kios
										where id_bo='$id_bo'
										ORDER BY nama_kios ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
											<option value="<?php  echo $row['id_kios']; ?>"><?php  echo $row['nama_kios']; ?></option>
										<?php
										}
										?>	
										</select>
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
												Register
									   </button>
											&nbsp; &nbsp; &nbsp;
											
                                            </td>
                                      <td>&nbsp;</td>
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