<?php
	$no_transfer_dompul=$_GET['no_transfer_dompul'];
	
	$tampil=mysql_query("select a.no_transfer_dompul, a.no_hp_sub_master_dompul, b.nama_master_dompul, a.tanggal_transfer, a.jenis_dompul, a.jumlah_dompul, a.catatan, a.status_transaksi
			from tb_transfer_dompul a, tb_master_dompul b
			where a.no_hp_sub_master_dompul=b.no_hp_master_dompul and a.no_transfer_dompul='$no_transfer_dompul'");
	$row=mysql_fetch_array($tampil);
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
							<li class="active">Verifikasi Dompul</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<?php include "container.php"; ?>

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>Verifikasi Transfer Dompul</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="build/build-transfer-dompul/acc-dompul.php" method="POST" class="form-horizontal" role="form">
								 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="150">No HP MD</td>
                                      <td>:</td>
                                      <td>
                                      <input name="nohpmd" style="width:200px;" value="<?php echo $row['no_hp_sub_master_dompul']; ?>" data-rel="tooltip" type="text" id="form-field-6" data-placement="bottom" readonly/></td>
                                      <input name="no_transfer_dompul" style="width:200px;" value="<?php echo $row['no_transfer_dompul']; ?>" data-rel="tooltip" type="hidden" id="form-field-6" data-placement="bottom" readonly/></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>MD</td>
                                      <td>:</td>
                                      <td>
									  <input name="md" style="width:200px;" value="<?php echo $row['nama_master_dompul']; ?>" type="text" id="form-field-" readonly/>
									  <input name="idho" style="width:200px;" value="<?php echo $_SESSION[id_ho]; ?>" type="hidden" id="form-field-" readonly/>
									  <input name="nouser" style="width:200px;" value="<?php echo $_SESSION[No_User]; ?>" type="hidden" id="form-field-" readonly/>
									  </td>
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
                                      <td><input name="tanggal_transfer" style="width:200px;" value="<?php echo $row['tanggal_transfer']; ?>" data-rel="tooltip" type="text" id="tanggal" data-placement="bottom" readonly/></td>
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
												Verifikasi
									   </button>
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