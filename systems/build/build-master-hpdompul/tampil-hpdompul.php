<?php

	if($_SESSION[level]=='admin')
	{
	?>
		<div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
			  <form action="build/build-master-hpdompul/insert-hpdompul.php" method="POST" class="form-horizontal" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah HP Dompul</h4>
                  </div>
                  <div class="modal-body overflow-visible">
                  <div class="box-body">
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No Master HP</label>
                      <div class="col-sm-10">
                        <input type="text" name="masterhp" class="form-control" placeholder="No Master HP">
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
	<?php
	}
	else
	{
		
	}

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
							<li class="active">HP Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master HP Dompul
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
						<div class="col-xs-12">
						<a href="#myModal" data-toggle="modal" class="btn btn-white btn-info btn-bold" >
						<i class="ace-icon fa fa-plus bigger-160"></i>
							Tambah Master HP Dompul
						</a><br /><br>
										
										<div class="table-header">
											Daftar HP Dompul
										</div>
										<!-- div.table-responsive -->
										<!-- div.dataTables_borderWrap -->
										<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
												<thead>
												<tr>
													<th><center>No</center></th>
													<th><center>No HP</center></th>
													<th><center>Nama Master Dompul</center></th>
													<th><center>Saldo 5K</center></th>
													<th><center>Saldo 10K</center></th>
													<th><center>Saldo Dompul</center></th>
													<th><center>Aksi</center></th>
												</tr>
												</thead>
												<tbody>
												<?php
												include "auth/autho.php";
													
												$tampil=mysql_query("select * from tb_master_dompul");
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