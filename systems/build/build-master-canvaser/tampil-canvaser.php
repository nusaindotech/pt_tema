<?php
	$level	= $_SESSION['level'];
	$id_ho	= $_SESSION['id_ho'];
?>
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
							<li class="active">Canvasser</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master Canvasser
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<form action="dash.php?hp=tambah-canvaser" method="POST" class="form-horizontal" role="form">
						<button class="btn btn-info">Tambah Canvasser</button>
						</form>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Daftar Canvasser
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<div>
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>ID</th>
													<th>Nama Canvasser</th>
													<th>Nama BO</th>
                                                    <th>Nama HO</th>
													<th>Alamat</th>
													<th>Telepon</th>
													<th>HP Sales</th>
													<th>Email</th>
                                                    <th>Status Canvasser</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php 		
												if($level=='admin')
												{
													$tampil=mysql_query("select s.nama_sales, b.nama_bo, h.nama_ho, s.alamat_sales, s.telepon_sales, s.email_sales, 
													s.status_sales, s.id_sales, s.hp_sales, s.id_sales
													from tb_sales s, tb_ho h, tb_bo b
													where s.id_ho=h.id_ho and s.id_bo=b.id_bo");
												}
												else
												{
													$tampil=mysql_query("select s.nama_sales, b.nama_bo, h.nama_ho, s.alamat_sales, s.telepon_sales, s.email_sales, 
													s.status_sales, s.id_sales, s.hp_sales, s.id_sales
													from tb_sales s, tb_ho h, tb_bo b
													where s.id_ho=h.id_ho and s.id_bo=b.id_bo and s.id_ho='$id_ho'");
												}
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><?php echo $row[0]; ?></td>
													<td><?php echo $row[1]; ?></td>
													<td><?php echo $row[2]; ?></td>
													<td><?php echo $row[3]; ?></td>
													<td><?php echo $row[4]; ?></td>
													<td><?php echo $row[8]; ?></td>
                                                    <td><?php echo $row[5]; ?></td>
													<td align="center" width="150">
														<?php
															if($row[6]==1)
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
													<div class="btn-group">
														<div class="btn-group">
														  <button type="button" class="btn btn-info">Aksi</button>
														  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
															<span class="caret"></span>
															<span class="sr-only">Toggle Dropdown</span>
														  </button>
														  <ul class="dropdown-menu" role="menu">
															<li><a href="#" id="edit-canvaser" data-id="<?php echo $row['9'];?>" data-id2="<?php echo $id_ho;?>">Edit Data</a></li>
														  </ul>
														</div>
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
			<script src="../assets/js/jquery.js"></script>
			<script>
				$(function(){
					$(document).on('click','#edit-canvaser',function(e){
						e.preventDefault();
						$("#view").modal('show');
						$.post('build/build-master-canvaser/form-edit.php',
							{id:$(this).attr('data-id'),id2:$(this).attr('data-id2')},
							function(html){
								$(".modal-body2").html(html);
							}  
						);
					});
				});
			</script>
			<div class="modal" id="view" role="dialog" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; </button>
					<h4 class="modal-title" id="myModalLabel">Data Canvaser</h4>
					</div>
					<div class="modal-body2">
					</div>
					
				</div>
			</div>
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