<!-- #section:basics/content.breadcrumbs -->

			<div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
			  <form action="build/build-master-hargadompul/insert-hargadompul.php" method="POST" class="form-horizontal" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah User</h4>
                  </div>
                  <div class="modal-body overflow-visible">
                  <div class="box-body">
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Dompul</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="dompul" required>
							<option value="">--Pilih Dompul--</option>
							<?php 													
							$query=mysql_query("select distinct(nama_dompul) as nama from tb_dompul");
							while($row=mysql_fetch_array($query))
							{
							?>
							<option value="<?php  echo $row['nama']; ?>"><?php  echo $row['nama']; ?></option><?php
							}
							?>											
						</select>
                      </div>
					</div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                      <div class="col-sm-10">
                        <input type="text" name="type_dompul" class="form-control" placeholder="type dompul" required>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
                      <div class="col-sm-10">
                        <input type="text" name="harga_dompul" class="form-control" placeholder="Harga dompul" required>
                      </div>
                  </div>				  
                  </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menyimpannya ?');">Tambah</button>
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
								Master Harga Dompul</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<a href="#myModal" data-toggle="modal" class="btn btn-white btn-info btn-bold" >
						<i class="ace-icon fa fa-plus bigger-160"></i>
							Tambah Harga Dompul
						</a>
										<div class="table-header">
											Daftar Harga Dompul</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>No</th>
													<th>Nama Dompul</th>
													<th>Type Dompul</th>
                                                    <th>Harga Dompul</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
													
												$tampil=mysql_query("select * from tb_dompul");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $row['nama_dompul']; ?></center></td>
													<td><center><?php echo $row['type_dompul']; ?></center></td>
													<td><?php echo $row['harga_dompul']; ?></td>
													<td align="center">
													<div class="btn-group">
													  <button type="button" class="btn btn-info">Aksi</button>
													  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>													  </button>
													  <ul class="dropdown-menu" role="menu">
														<li><a href="#" id="edit-dompul" data-id="<?php echo $row['id_dompul'];?>">Edit Data</a></li>
													  </ul>
													</div>												</td>	
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
					$(document).on('click','#edit-dompul',function(e){
						e.preventDefault();
						$("#view").modal('show');
						$.post('build/build-master-hargadompul/form-edit.php',
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
				<h4 class="modal-title" id="myModalLabel">Data Harga Dompul</h4>
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