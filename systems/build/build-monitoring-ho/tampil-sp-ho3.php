<?php
session_start();
$id_ho=$_SESSION[id_ho];
$hu_2 =$_GET['hu2'];
$hu_1 =$_GET['hu1'];
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
							<li class="active">Persediaan</li>
							<li class="active">SP</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Persediaan SP
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Daftar Detail HU2
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<div>
										<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
												<thead>
												<tr>
													<th><center>No</center></th>
													<th><center>HU 2</center></th>
                                                    <th><center>HU 1</center></th>
                                                    <th><center>Material Name</center></th>
													<th><center>IP</center></th>
													<th><center>Expired Date</center></th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
												$tampil=mysql_query("select material_name, ip, expired_date
																	from tb_sp
																	where hu_1='$hu_1' and hu_2='$hu_2' and id_kios='0' and id_sales='0' and id_ho='$id_ho'");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
                                                    <td><center><?php echo $hu_2; ?></center></td>
                                                    <td><center><?php echo $hu_1; ?></center></td>
													<td align="center"><?php echo $row[0]; ?></td>
													<td><center><?php echo $row[1]; ?></center></td>
													<td><center><?php echo $row[2]; ?></center></td>
												</tr>
												<?php 
												$no++;
												} 
												?>
												</tbody>
                                                <tr>
                                                	<td colspan="4">&nbsp;</td>
                                                    <td><center>Total</center></td>
                                                    <td><center><?php echo $no-1; ?></center></td>
                                                </tr>
											</table>
										</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
					</div><!-- /.page-content -->
					</div>
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>