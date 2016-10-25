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
								Register Dompul
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                <form action="build/build-register-dompul/insert-register-dompul.php" method="POST" class="form-horizontal" role="form">
                                        <div>
                                        <input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
										<input name="ho" value="<?php echo $id_ho; ?>" type="hidden" />
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                
                                    <?php
                                    if($_SESSION[hak_akses]=='2')
                                    { 
									?>
										<tr>
										<td>Pilih Dompul</td>
                                      	<td>:</td>
                                      	<td><select class="form-control" name="id_dompul" style="width:200px;">
										<option value="">--Pilih Dompul--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_dompul
										ORDER BY nama_dompul ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
											<option value="<?php  echo $row['id_dompul']; ?>"><?php  echo $row['nama_dompul']; ?></option>
										<?php
										}
										?>	
										</select>
                                    	</td>
                                    	<td>&nbsp;</td>
										</tr>
										
										<tr>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										</tr>
										
										<tr>
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
										</tr>
										
										<tr>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										  <td>&nbsp;</td>
										</tr>
										
										<tr>
                                    	<td>Jumlah</td>
                                      	<td>:</td>
                                      	<td>
										<input name="jumlah" style="width:200px;" data-rel="tooltip" type="text" id="form-field-6" title="Jumlah" data-placement="bottom" />
										</td>
                                    	<td>&nbsp;</td>
										</tr>
                                    <?php } 
									else if($_SESSION[hak_akses]=='3')
									{ 
									?>
										<tr>
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
										</tr>
									<?php
									}
									?>
                                   
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
					
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>