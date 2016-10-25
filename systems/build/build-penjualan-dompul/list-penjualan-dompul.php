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
							<li class="active">Penjualan</li>
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
								List Penjualan Dompul
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
													<th>No Penjualan</th>
													<th>Sales</th>
                                                    <th>Hp Kios</th>
                                                    <th>Nama Kios</th>
                                                    <th>Tanggal Penjualan</th>
                                                    <th>Status Verifikasi</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tbody>
												<?php 
												include "auth/autho.php";
													
												$tampil=mysql_query("select a.id_penjualan_dompul, b.nama_sales, a.tanggal_penjualan_dompul, a.status_pembayaran, a.id_sales , a.hp_kios
													    from tb_penjualan_dompul a, tb_sales b where a.id_sales=b.id_sales and a.id_bo='$_SESSION[id_bo]' and a.tanggal_penjualan_dompul='$tanggal_awal'");
												$no=1;
												while ($row=mysql_fetch_array($tampil))
												{
													$a3=mysql_query("select nama_kios from tb_upload_dompul where hp_kios='$row[hp_kios]'");
													$row3=mysql_fetch_array($a3);
												?>
												<tr>
													<td><center><?php echo $no; ?></center></td>
													<td align="center"><?php echo $row[0]; ?></td>
													<td><?php echo $row[1]; ?></td>
													<td><?php echo $row[5]; ?></td>
													<td><?php echo $row3[0]; ?></td>
													<td><?php echo $row[2]; ?></td>
													<td align="center" width="150">
														<?php
															if($row[3]==1)
															{
																echo '<span class="label label-danger arrowed-in arrowed-in-right">';
																echo "Belum Verifikasi";
																echo "</span>";
															}
															else
															{
																echo '<span class="label label-success arrowed-in arrowed-in-right">';
																echo "Sudah Verifikasi";
																echo "</span>";
															}
														?>
													</td>
													<td align="center">
													<div class="hidden-sm hidden-xs action-buttons">
														<a class="green" href="dash.php?hp=edit-penjualan-dompul&tanggal_awal=<?php echo $tanggal_awal; ?>&idpenjualan=<?php echo $row['0']; ?>&idsales=<?php echo $row['4']; ?>">
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