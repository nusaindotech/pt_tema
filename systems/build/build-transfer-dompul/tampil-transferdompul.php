<!-- #section:basics/content.breadcrumbs -->
<?
	$level	= $_SESSION['level'];
	$id_ho	= $_SESSION['id_ho'];
	
	if($level=='head')
	{
?>
			<div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
			  <form action="build/build-transfer-dompul/insert-transfer.php" method="POST" class="form-horizontal" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Transaksi</h4>
                  </div>
                  <div class="modal-body overflow-visible">
                  <div class="box-body">
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No Master</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="md" required>
							<option value="">--Pilih Nomor MD--</option>
							<?php
							$query=mysql_query("select a.no_hp_sub_master_dompul, b.nama_master_dompul from tb_sub_master_dompul a, tb_master_dompul b
							where a.no_hp_master_dompul=b.no_hp_master_dompul and a.tipe_dompul='MD'");
							while($row=mysql_fetch_array($query))
							{
							?>
							<option value="<?php  echo $row['no_hp_sub_master_dompul']; ?>"><?php  echo $row['no_hp_sub_master_dompul']; ?> | <?php  echo $row['nama_master_dompul']; ?></option><?php
							}
							?>											
						</select>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="jenis_dompul" required>
							<option value="">--Pilih Jenis Dompul--</option>
							<option value="5K">5K</option>
							<option value="10K">10K</option>
							<option value="Rupiah">Rupiah</option>
						</select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-10">
                        <input class="form-control date-picker" name="tanggal_transfer" type="text" data-date-format="yyyy-mm-dd"value="<?php
											$tanggal = date("Y-m-d");
											echo $tanggal;
											?>" />
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Dompul" autocomplete="off" required>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Catatan</label>
                      <div class="col-sm-10">
                        <input type="text" name="catatan" class="form-control" placeholder="Catatan" autocomplete="off">
                        <input type="hidden" name="No_User" class="form-control" value="<?php echo $_SESSION[No_User] ?>">
                      </div>
                  </div>
                  </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menambahkannya ?');">Tambah</button>
                  </div>
				  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
	
	<?
	}
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
							<li class="active">Transfer Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Transfer Dompul
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<a href="#myModal" data-toggle="modal" class="btn btn-white btn-info btn-bold" >
						<i class="ace-icon fa fa-plus bigger-160"></i>
							Tambah Transaksi
						</a>
						<br>

										<div class="table-header">
											Daftar Transaksi	Dompul									</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>No</th>
													<th>No MD</th>
													<th>MD</th>
                                                    <th>Tanggal</th>
													<th>Jenis</th>
													<th>Jumlah</th>
													<th>Catatan</th>
                                                    <th>Status</th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
													
												$tampil=mysql_query("select a.no_transfer_dompul, a.no_hp_sub_master_dompul, b.nama_master_dompul, a.tanggal_transfer, a.jenis_dompul, a.jumlah_dompul, a.catatan, a.status_transaksi
												from tb_transfer_dompul a, tb_master_dompul b
												where a.no_hp_sub_master_dompul=b.no_hp_master_dompul
												order by status_transaksi ASC");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td><center><?php echo $row['no_hp_sub_master_dompul']; ?></center></td>
													<td><center><?php echo $row['nama_master_dompul']; ?></center></td>
													<td><?php echo $row['tanggal_transfer']; ?></td>
													<td><?php echo $row['jenis_dompul']; ?></td>
													<td><?php echo $row['jumlah_dompul']; ?></td>
                                                    <td><?php echo $row['catatan']; ?></td>
													<td><center>
													<?php
														if($row['status_transaksi']=='1')
														{
															echo '<span class="label label-success arrowed-in arrowed-in-right">Sudah ACC';
															echo "</span>";
														}
														else
														{
															echo "<a href=dash.php?hp=acc-dompul&no_transfer_dompul=$row[no_transfer_dompul]><span class='label label-danger arrowed-in arrowed-in-right'>Belum ACC";
															echo "</span></a>";
														}
													?>
													</center></td>
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