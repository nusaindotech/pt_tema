<?php
$id_barang =$_GET['idbarang'];
$nama_barang =$_GET['namabarang'];

$a1=mysql_query("SELECT a.id_barang, a.id_kategori_barang, a.id_rak, a.nama_barang, a.satuan, a.keterangan, b.stok_minimum FROM tb_barang a, tb_detail_barang b
		WHERE a.id_barang = '$id_barang' and a.id_barang=b.id_barang");
		$row1=mysql_fetch_array($a1);

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
							<li class="active">Update Barang</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						
						<!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Update  Barang
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-master-barang/update-barang.php" method="POST" class="form-horizontal" role="form">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="13%">Kategori</td>
                                      <td width="1%">:</td>
                                      <td width="25%"><select class="form-control" name="kategoribarang">
									<option value="">--Pilih Kategori--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select id_kategori, nama_kategori from tb_kategori_barang ORDER BY nama_kategori ASC");
										while($row=mysql_fetch_array($query))
										{
										if ($row['id_kategori']==$row1['id_kategori_barang'])
											{
											echo "<option value=$row[id_kategori] selected>$row[nama_kategori]</option>";
											}
										else
											{
										  echo "<option value=$row[id_kategori]>$row[nama_kategori]</option>";
											}
										}
										?>	
									</select>
									</td>
                                      <td width="19%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td width="13%">Rak</td>
                                      <td width="1%">:</td>
                                      <td width="25%">
									  <select class="form-control" name="rak">
									<option value="">--Pilih Rak--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_rak ORDER BY nama_rak ASC");
										while($row=mysql_fetch_array($query))
										{
										if ($row['id_rak']==$row1['id_rak'])
											{
											echo "<option value=$row[id_rak] selected>$row[nama_rak]</option>";
											}
										else
											{
										  echo "<option value=$row[id_rak]>$row[nama_rak]</option>";
											}
										}
										?>											
									</select>
									</td>
                                      <td width="19%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td width="13%">Nama Barang</td>
                                      <td width="1%">:</td>
                                      <td width="25%" colspan="10"y><input name="namabarang" data-rel="tooltip" type="text" id="form-field-6" title="Nama Barang" value="<?php echo $nama_barang; ?>" data-placement="bottom" class="col-xs-10 col-sm-5"/><input name="idbarang" data-rel="tooltip" type="hidden" id="form-field-6" title="Nama Barang" value="<?php echo $id_barang; ?>" data-placement="bottom" class="col-xs-10 col-sm-5"/></td>
                                      <td width="19%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td width="13%">Satuan</td>
                                      <td width="1%">:</td>
                                      <td width="25%"><select class="form-control" name="satuan">
									<option value="">--Pilih Satuan--</option>
										<?php 
										include "../../auth/autho.php";
													
										$query=mysql_query("select * from tb_satuan ORDER BY nama_satuan ASC");
										while($row=mysql_fetch_array($query))
										{
										if ($row['nama_satuan']==$row1['satuan'])
											{
											echo "<option value=$row[nama_satuan] selected>$row[nama_satuan]</option>";
											}
										else
											{
										  echo "<option value=$row[nama_satuan]>$row[nama_satuan]</option>";
											}
										}
										?>											
									</select>
									
									  
									</td>
                                      <td width="19%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td width="13%">Keterangan</td>
                                      <td width="1%">:</td>
                                      <td width="25%" colspan="10"><input name="keterangan" data-rel="tooltip" type="text" id="form-field-6" value="<?php echo $row1['keterangan']; ?>" title="Keterangan Barang" data-placement="bottom" class="col-xs-10 col-sm-5"/></td>
                                      <td width="19%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td width="13%">Stok Minimum</td>
                                      <td width="1%">:</td>
                                      <td colspan="10"><input name="stokminimum" data-rel="tooltip" type="text" id="form-field-6" title="Stok Minimum" value="<?php echo $row1['stok_minimum']; ?>" data-placement="bottom" class="col-xs-10 col-sm-5"/></td>
                                      <td width="19%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td colspan="10">
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