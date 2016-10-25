<?php
	$no_transfer_subdompul=$_GET['no_transfer_subdompul'];
	
	$tampil=mysql_query("SELECT a.no_transfer_subdompul, a.no_hp_asal, a.no_hp_tujuan, b.nama_master_dompul, a.tanggal_transfer, a.jenis_dompul, a.jumlah_dompul, a.catatan, a.status_transaksi
			FROM tb_transfer_subdompul a, tb_master_dompul b
			WHERE a.no_hp_asal = b.no_hp_master_dompul and a.no_transfer_subdompul='$no_transfer_subdompul'");
	$row=mysql_fetch_array($tampil);
	
	$tampil2=mysql_query("select nama_sub_master_dompul from tb_sub_master_dompul where no_hp_sub_master_dompul='$row[no_hp_tujuan]'");
	$row2=mysql_fetch_array($tampil2);
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
							<li class="active">Persediaan</li>
							<li class="active">Verifikasi Sub Dompul</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>Verifikasi Transfer Sub Dompul</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-transfer-subdompul/acc-subdompul.php" method="POST" class="form-horizontal" role="form">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="150">No HP Asal MD</td>
                                      <td>:</td>
                                      <td>
                                      <input name="nohpmdasal" style="width:200px;" value="<?php echo $row['no_hp_asal']; ?>" data-rel="tooltip" type="text" id="form-field-6" data-placement="bottom" readonly/></td>
                                      <input name="no_transfer_subdompul" style="width:200px;" value="<?php echo $row['no_transfer_subdompul']; ?>" data-rel="tooltip" type="hidden" id="form-field-6" data-placement="bottom" readonly/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Asal MD</td>
                                      <td>:</td>
                                      <td><input name="mdasal" style="width:200px;" value="<?php echo $row['nama_master_dompul']; ?>" data-rel="tooltip" type="text" id="form-field-" data-placement="bottom" readonly/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
									  <td>No Hp Tujuan MD</td>
									  <td>:</td>
									  <td><input name="nohpmdtujuan" style="width:200px;" value="<?php echo $row['no_hp_tujuan']; ?>" data-rel="tooltip" type="text" id="form-field-2" data-placement="bottom" readonly="readonly"/></td>
									  <td>&nbsp;</td>
								   </tr>
									<tr>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
								   </tr>
									<tr>
									  <td>Tujuan MD</td>
									  <td>:</td>
									  <td><input name="mdtujuan" style="width:200px;" value="<?php echo $row2['nama_sub_master_dompul']; ?>" data-rel="tooltip" type="text" id="form-field-3" data-placement="bottom" readonly="readonly"/></td>
									  <td>&nbsp;</td>
								   </tr>
									<tr>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
								   </tr>
									<tr>
                                      <td>Tanggal</td>
                                      <td>:</td>
                                      <td><input name="tanggal" style="width:200px;" value="<?php echo $row['tanggal_transfer']; ?>" data-rel="tooltip" type="text" id="tanggal" data-placement="bottom" readonly/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Jenis</td>
                                      <td>:</td>
                                      <td><input name="jenis" style="width:200px;" value="<?php echo $row['jenis_dompul']; ?>" data-rel="tooltip" type="text" id="form-field-6" data-placement="bottom" readonly/></td>
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
                                      <td><input name="jumlah" data-rel="tooltip" value="<?php echo $row['jumlah_dompul']; ?>" type="text" id="form-field-6" data-placement="bottom" style="width:200px;" readonly/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Catatan
                                      <td>:</td>
                                      <td><input name="catatan" value="<?php echo $row['catatan']; ?>" data-rel="tooltip" type="text" id="form-field-6" data-placement="bottom" style="width:200px;" readonly/></td>
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
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>
                                      <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Verifikasi									   </button>                                            </td>
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