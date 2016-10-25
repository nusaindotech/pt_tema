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
							<li class="active">Barang</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Master Barang
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-master-barang/insert-barang.php" method="POST" class="form-horizontal" role="form">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="150">Nama Barang</td>
                                      <td>:</td>
                                      <td>
                                      <input name="namabarang" style="width:200px;" data-rel="tooltip" type="text" id="form-field-6" title="Nama Barang" data-placement="bottom" /></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Kategori</td>
                                      <td>:</td>
                                      <td><select class="form-control" name="kategori" style="width:200px;">
										<option value=""></option>
										<?php 
										include "../../auth/autho.php";
										$query=mysql_query("select * from tb_kategori_barang ORDER BY nama_kategori ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
										<option value="<?php  echo $row['id_kategori']; ?>"><?php  echo $row['nama_kategori']; ?></option><?php
										}
										?>	
									</select></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Satuan</td>
                                      <td>:</td>
                                      <td><select class="form-control" name="satuan" style="width:200px;">
									<option value="">--Pilih Satuan--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_satuan ORDER BY nama_satuan ASC");
										while($row=mysql_fetch_array($query))
										{
										?>
										<option value="<?php  echo $row['nama_satuan']; ?>"><?php  echo $row['nama_satuan']; ?></option><?php
										}
										?>											
									</select></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Jumlah</td>
                                      <td>:</td>
                                      <td><input name="jumlah" style="width:200px;" data-rel="tooltip" type="text" id="form-field-6" title="Jumlah" data-placement="bottom" /></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Stok Minimum</td>
                                      <td>:</td>
                                      <td><input name="stokminimum" data-rel="tooltip" type="text" id="form-field-6" title="Stok Minimum" data-placement="bottom" style="width:200px;" /></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Harga
                                      <td>:</td>
                                      <td><input name="harga" data-rel="tooltip" type="text" id="form-field-6" title="Harga" data-placement="bottom" style="width:200px;"/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Keterangan
                                      <td>:</td>
                                      <td><input name="keterangan" data-rel="tooltip" type="text" id="form-field-6" title="Keterangan" data-placement="bottom" style="width:200px;"/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>
                                      <button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Kosongkan
									  </button>
                                      <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan
									   </button>
											&nbsp; &nbsp; &nbsp;
											
                                            </td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
								</form>

								<div class="row">
									
								</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
					
					  <script>
							function PopupCenter(pageURL, title,w,h) {
							var left = (screen.width/2)-(w/2);
							var top = (screen.height/3)-(h/2);
							var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
							}
					  </script>