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
											
										$tampil=mysql_query("SELECT distinct(tanggal_input) FROM tb_upload_rekening WHERE tanggal_input='$tanggal_awal' ");
										$no=1;
										while ($row=mysql_fetch_array($tampil))
										{
											
										?>
										<tr>
											<td><center><?php echo $no; ?></center></td>
											<td align="center"><a name="tanggal_input" value="view" id="<?php echo $row["tanggal_input"]?>" class="view_data" data-toggle="modal" data-target="#dataModal"><?php echo $row["tanggal_input"]?></a></td>
											
										</tr>
										<?php 
										$no++;
										} 
										?>
										</tbody>
									</table>
								</div>
							</div><!-- /.col -->
					</div><!-- /.page-content -->
					</div>
						<script type="text/javascript">
						$(function() {
							$("#example1").dataTable();

						});
					    </script>
					    <script>
							$(document).ready(function () {
								$('.view_data').click(function () {
									var tanggal_input = $(this).text();

									$.ajax({
										url:"build/build-rekening-koran/detail-rekening.php",
										type: "POST",
										data:{tanggal_input:tanggal_input},
										success:function (data) {
											$('#detail_rekening').html(data);
											$('#dataModal').modal("show");
										}
									});
								});
							});
						</script>
						<div id="dataModal" class="modal fade" id="view" role="dialog" tabindex="-1">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; </button>
									<h4 class="modal-title">Detail Rekening</h4>
									</div>
									<div class="modal-body" id="detail_rekening">
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
									</div>
								</div>
							</div>
						</div>
					    <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					    </script>
