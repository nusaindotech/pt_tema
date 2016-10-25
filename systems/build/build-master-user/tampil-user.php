<!-- #section:basics/content.breadcrumbs -->

			<div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
			  <form action="build/build-master-user/insert-user.php" method="POST" class="form-horizontal" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah User</h4>
                  </div>
                  <div class="modal-body overflow-visible">
                  <div class="box-body">
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control" placeholder="Nama">
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                      </div>
                  </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="password">
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                      </div>
                  </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">HO</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="ho" id="ho" required>
							<option value="">--Pilih HO--</option>
							<?php 													
							$query=mysql_query("select * from tb_ho ORDER BY nama_ho ASC");
							while($row=mysql_fetch_array($query))
							{
							?>
							<option value="<?php  echo $row['id_ho']; ?>"><?php  echo $row['nama_ho']; ?></option><?php
							}
							?>											
						</select>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">BO</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="bo" id="bo" required>
							<option value="">--Pilih BO--</option>
							<?php 
							$query=mysql_query("select * from tb_bo ORDER BY nama_bo ASC");
							while($row=mysql_fetch_array($query))
							{
							?>
							<option value="<?php  echo $row['id_bo']; ?>"><?php  echo $row['nama_bo']; ?></option><?php
							}
							?>	
						</select>
                      </div>
                  </div>
				   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hak Akses</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="hak_akses" required>
							<option value="">--Pilih Hak Akses--</option>
							<option value="1">HQ</option>
							<option value="2">HO</option>
							<option value="3">BO</option>
						</select>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="level" required>
							<option value="">--Pilih Level--</option>
							<option value="admin">Admin</option>
							<option value="penjualan">Penjualan</option>
							<option value="pembelian">Pembelian</option>
							<option value="keuangan">keuangan</option>
							<option value="head">Head</option>
						</select>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Blokir</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="blokir" required>
							<option value="">--Blokir--</option>
							<option value="N">N</option>
							<option value="Y">Y</option>
						</select>
                      </div>
                  </div>
                  </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menambahkan ?');">Tambah</button>
                  </div>
				  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

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
							<li class="active">User</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master User
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<a href="#myModal" data-toggle="modal" class="btn btn-white btn-info btn-bold" >
						<i class="ace-icon fa fa-plus bigger-160"></i>
							Tambah User
						</a>
										<div class="table-header">
											Daftar User
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>No</th>
													<th>HO</th>
													<th>BO</th>
                                                    <th>Username</th>
													<th>Nama</th>
													<th>Email</th>
													<th>Akses</th>
                                                    <th>Level</th>
													<th>Blokir</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
													
												$tampil=mysql_query("select * from users");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $row['id_ho']; ?></center></td>
													<td><center><?php echo $row['id_bo']; ?></center></td>
													<td><?php echo $row['username']; ?></td>
													<td><?php echo $row['nama_lengkap']; ?></td>
													<td><?php echo $row['email']; ?></td>
                                                    <td><center>
														<?php
															if($row['hak_akses']==1)
															{
																echo "HQ";
															}
															else if($row['hak_akses']==2)
															{
																echo "HO";
															}
															else if($row['hak_akses']==3)
															{
																echo "BO";
															}
															else															
															{
																echo "None";
															}
														?>
													</td></center>
                                                    <td><?php echo $row['level']; ?></td>
													<td><center>
													<?php
														if($row['blokir']=='N')
														{
															echo '<span class="label label-success arrowed-in arrowed-in-right">';
															echo $row['blokir'];
															echo "</span>";
														}
														else if($row['blokir']!='N')
														{
															echo '<span class="label label-danger arrowed-in arrowed-in-right">';
															echo $row['blokir'];
															echo "</span>";
														}
													?>
													</center></td>
													<td align="center">
													<div class="btn-group">
													  <button type="button" class="btn btn-info">Aksi</button>
													  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>
													  </button>
													  <ul class="dropdown-menu" role="menu">
														<li><a href="#" id="edit-user" data-id="<?php echo $row['No_User'];?>">Edit Data</a></li>
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
					</div><!-- /.row -->
					
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