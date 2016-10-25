<?php
session_start();
?><!-- #section:basics/content.breadcrumbs -->
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
								Upload Data Starting Pack
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-upload-sp/insert-upload-sp.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="150">Upload File</td>
                                      <td>:</td>
                                      <td>
                                      <?php  $id_ho=$_SESSION[id_ho]; ?>
                                      <input type="file" name="namafile" id="namafile">
                                      <input name="id_ho" value="<?php echo $id_ho; ?>" type="hidden" />
                                      <?php
									  $depan = date('H');
									  $tengah = date('i');
									  $belakang = date('s');
									  $jam = $depan.':'.$tengah.':'.$belakang;
									  $tgllog=date("Y-m-d");
									  ?>
                                      <input name="tgl_input" value="<?php echo date('Y-m-d')." ".$jam; ?>" type="hidden" />
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
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>
                                      <button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Kosongkan
									  </button>
                                      <button class="btn btn-info" type="submit" name="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Upload
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