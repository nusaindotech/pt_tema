<?php
	$tanggal_awal	= $_POST['tanggal_awal'];
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
							<li class="active">Rekening</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								List Upload Rekening
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											Daftar Penjualan Dompul Tanggal <?php echo $tanggal_awal; ?>
										</div>
										<div>
										<table id="example1" class="table table-striped table-bordered table-hover">
												<thead>
												<tr>
													<th>No</th>
													<th>Tanggal Upload</th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
													
												$tampil=mysql_query("select distinct(tanggal_input) from tb_upload_rekening");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
													$a3=mysql_query("select nama_kios from tb_upload_dompul where hp_kios='$row[hp_kios]'");
													$row3=mysql_fetch_array($a3);
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td align="center"><a href="#tampilrekening" data-toggle="modal" data-id="<?php echo $row[0]; ?>" data-id2="<?php echo $id_rekening;?>"><?php echo $row[0]; ?></a></td>
													
												</tr>
												<?php 
												$no++;
												} 
												?>
												</tbody>
											</table>
										</div>
								<!-- PAGE CONTENT ENDS -->
								<div class="modal" id="tampilrekening" role="dialog">
					              <div class="modal-dialog">
								  <form action="build/build-master-hpdompul/insert-hpdompul.php" method="POST" class="form-horizontal" role="form">
					                <div class="modal-content">
					                  <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                    <h4 class="modal-title">Detail Rekening</h4>
					                  </div>
					                  <div class="modal-body overflow-visible">
					                  <div class="box-body">
									  <div class="form-group">
					                      <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Transaksi :</label>
					                      <div class="col-sm-8">
					                        <label for="inputEmail3" name="tgltransaksi" class="control-label">Tanggal Transaksi</label>
					                      </div>
					                  </div>
									  <div class="form-group">
					                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Master HP</label>
					                      <div class="col-sm-10">
					                        <input type="text" name="namamasterhp" class="form-control" placeholder="Nama Master HP">
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
