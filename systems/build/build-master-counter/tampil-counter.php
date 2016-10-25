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
							<li class="active">Counter</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master Counter
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<form action="dash.php?hp=tambah-counter" method="POST" class="form-horizontal" role="form">
						<button class="btn btn-info">Tambah Counter</button>
						</form>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Daftar Counter
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<div>
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>No</th>
													<th>Nama Counter</th>
													<th>Nama HO</th>
													<th>Nama BO</th>
													<th>Alamat</th>
													<th>Telepon</th>
                                                    <th>HP Kios</th>
                                                    <th>Longitude</th>
                                                    <th>Latitude</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php
												if($level=='admin')
												{	
												 $tampil=mysql_query("select a.nama_kios, a.alamat_kios, a.telepon_kios, a.hp_kios, a.email_kios, 
														a.longitude_kios, a.latitude_kios, a.saldo_kios, b.nama_ho, c.nama_bo, a.id_kios
														from tb_kios a, tb_ho b, tb_bo c
														where a.id_ho=b.id_ho and a.id_bo=c.id_bo and a.status_kios='1'");
												}
												else
												{
												$tampil=mysql_query("select a.nama_kios, a.alamat_kios, a.telepon_kios, a.hp_kios, a.email_kios, 
														a.longitude_kios, a.latitude_kios, a.saldo_kios, b.nama_ho, c.nama_bo, a.id_kios
														from tb_kios a, tb_ho b, tb_bo c
														where a.id_ho=b.id_ho and a.id_bo=c.id_bo and a.id_ho='$id_ho' and a.status_kios='1'");	
												}
												
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><?php echo $row[0]; ?></td>
													<td><?php echo $row[8]; ?></td>
													<td><?php echo $row['nama_bo']; ?></td>
													<td><?php echo $row['alamat_kios']; ?></td>
													<td><?php echo $row[4]; ?></td>
                                                    <td><?php echo $row[3]; ?></td>
													<td><?php echo $row[6]; ?></td>
													<td><?php echo $row[7]; ?></td>
													<td align="center">
													<div class="btn-group">
													  <button type="button" class="btn btn-info">Aksi</button>
													  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													  </button>
													  <ul class="dropdown-menu" role="menu">
														<li><a href="#" id="edit-kios" data-id="<?php echo $row['id_kios'];?>" data-id2="<?php echo $id_ho;?>">Edit Data</a></li>
													  </ul>
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
							$(document).on('click','#edit-kios',function(e){
								e.preventDefault();
								$("#view").modal('show');
								$.post('build/build-master-counter/form-edit.php',
									{id:$(this).attr('data-id'),id2:$(this).attr('data-id2')},
									function(html){
										$(".modal-body2").html(html);
									}  
								);
							});
						});
					</script>
					<script src="../assets/js/jquery.js"></script>
			<script>
				$(function(){
					$(document).on('click','#edit-user',function(e){
						e.preventDefault();
						$("#view").modal('show');
						$.post('build/build-master-user/form-edit.php',
							{id:$(this).attr('data-id')},
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
						<h4 class="modal-title" id="myModalLabel">Data User</h4>
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