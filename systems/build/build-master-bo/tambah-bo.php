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
							<li class="active">Master</li>
							<li class="active">BO</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master BO
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-master-bo/insert-bo.php" method="POST" class="form-horizontal" role="form">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="150">Nama BO</td>
                                      <td>:</td>
                                      <td>
                                      <input name="nama_bo" style="width:200px;" data-rel="tooltip" type="text" id="form-field-6" title="Nama BO" data-placement="bottom" /></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Nama HO</td>
                                      <td>:</td>
                                      <td><select class="form-control" name="id_ho" style="width:200px;">
									<option value="">--Pilih HO--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_ho ORDER BY nama_ho ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
										<option value="<?php  echo $row['id_ho']; ?>"><?php  echo $row['nama_ho']; ?></option><?php
										}
										?>	
									</select></td>
                                      <td>&nbsp;</td>
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
                                      <button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Kosongkan
									  </button>
                                      <button class="btn btn-info" type="submit" onclick="return confirm('Apakah anda yakin akan menambahkan ?');">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
									   </button>
											&nbsp; &nbsp; &nbsp;
											
                                            </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
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