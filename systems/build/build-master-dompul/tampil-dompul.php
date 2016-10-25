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
							<li class="active">Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master Dompul
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<form action="dash.php?hp=tambah-dompul" method="POST" class="form-horizontal" role="form">
						<button class="btn btn-info">Tambah Dompul</button>
						</form><br />
										
										<div class="table-header">
											Daftar Dompul
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
												<thead>
												<tr>
													<th><center>No</center></th>
													<th><center>ID Dompul</center></th>
													<th><center>Nama Dompul</center></th>
													<th><center>Type Dompul</center></th>
													<th><center>Aksi</center></th>
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
													<td><?php echo $row[0]; ?></td>
													<td><?php echo $row[1]; ?></td>
													<td><?php echo $row[2]; ?></td>
													<td align="center">
													<div class="hidden-sm hidden-xs action-buttons">
														
														<a class="green" href="dash.php?hp=edit-barang&idbarang=<?php echo $row['id_barang']; ?>&namabarang=<?php echo $row['nama_barang']; ?>">
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
					</div><!-- /.row -->
					
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>