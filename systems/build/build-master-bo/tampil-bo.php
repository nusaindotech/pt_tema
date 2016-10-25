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
						<form action="dash.php?hp=tambah-bo" method="POST" class="form-horizontal" role="form">
						<button class="btn btn-info">Tambah BO</button>
						</form>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Daftar BO
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<div>
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>No</th>
                                                    <th>Kode BO</th>
													<th>Nama BO</th>
													<th>Nama HO</th>
                                                    <th>Status BO</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
													
												$tampil=mysql_query("select b.kode_bo, b.nama_bo, h.nama_ho, b.status_bo
																	from tb_bo b, tb_ho h
																	where b.id_ho=h.id_ho");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td align="center"><?php echo $row[0]; ?></td>
													<td><?php echo $row[1]; ?></td>
													<td><?php echo $row[2]; ?></td>
													<td align="center" width="150">
														<?php
															if($row[3]==1)
															{
																echo '<span class="label label-success arrowed-in arrowed-in-right">';
																echo "Aktif";
																echo "</span>";
															}
															else
															{
																echo '<span class="label label-danger arrowed-in arrowed-in-right">';
																echo "Tidak Aktif";
																echo "</span>";
															}
														?>
													</td>
													<td align="center">
													<div class="hidden-sm hidden-xs action-buttons">
														
														<a class="green" href="dash.php?hp=edit-BO&idBO=<?php echo $row['id_BO']; ?>&namaBO=<?php echo $row['nama_BO']; ?>">
															<i class="ace-icon fa fa-pencil bigger-130"></i>
														</a>
													</div>
													</td>	
												</tr>
												<?php 
												$no++;
												} 
												?>
												</tbody>
											</table>
										</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
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