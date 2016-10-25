<?php
	$idpenjualan	=$_GET['idpenjualan'];
	$idcanvaser		=$_GET['idcanvaser'];
	$idkios			=$_GET['idkios'];
	$tgl			=$_GET['tgl'];

	$a2=mysql_query("SELECT * from tb_kios where id_kios='$idkios'");
	$row2=mysql_fetch_array($a2);
	
	$a3=mysql_query("SELECT * from tb_customer where id_customer='$idcustomer'");
	$row3=mysql_fetch_array($a3);
?>

<script type="text/javascript" src="jquery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function() {
            $('#jumlahtunai').keyup(function(){
            <!-- Ambil nilai !-->
            var ngrandtotal=parseInt($('#grandtotal').val());
            var njumlahtunai=parseInt($('#jumlahtunai').val());
			var njumlahtransfer=parseInt($('#jumlahtransfer').val());
 
            <!-- Perhitungan  !-->
            var piutang = (njumlahtunai+njumlahtransfer)-ngrandtotal;
            $('#piutang').val(piutang);
            });
			
			$('#jumlahtransfer').keyup(function(){
            <!-- Ambil nilai !-->
			var njumlahtunai2=parseInt($('#jumlahtunai').val());
            var ngrandtotal2=parseInt($('#grandtotal').val());
            var njumlahtransfer2=parseInt($('#jumlahtransfer').val());
 
            <!-- Perhitungan  !-->
            var piutang2 = (njumlahtunai2+njumlahtransfer2)-ngrandtotal2;
            $('#piutang').val(piutang2);
            });
        });
		</script>

<div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
			  <form action="build/build-penjualan-sp/insert-penjualan-ro.php" method="POST" class="form-horizontal" role="form">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Penjualan RO</h4>
                  </div>
                  <div class="modal-body overflow-visible">
                  <div class="box-body">
				 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Barang</label>
                      <div class="col-sm-10">
					  <input type="hidden" name="idpenjualan" class="form-control" value="<?php echo $idpenjualan; ?>">
					  <input type="hidden" name="idkios" class="form-control" value="<?php echo $idkios; ?>">
					  <input type="hidden" name="idcanvaser" class="form-control" value="<?php echo $idcanvaser; ?>">
                        <select class="form-control" name="id_barang" id="id_barang" >
							<option value="">--Pilih Barang--</option>
								<?php 
								include "../../auth/autho.php";
													
								$query=mysql_query("select distinct(a.material_name), b.harga_satuan from tb_sp a, tb_detail_barang b
										where a.material_name=b.id_barang and 
										a.id_sales='$idcanvaser'
										ORDER BY a.material_name ASC");
								while($row=mysql_fetch_array($query))
								{
								?>
									<option value="<?php  echo $row['material_name']; ?>"><?php  echo $row['material_name'] ." | Harga Rp. " . $row['harga_satuan']; ?></option><?php
								}
								?>	
						</select>
                      </div>
                  </div>
				  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-10">
                        <input type="text" name="jumlah" class="form-control" placeholder="jumlah barang">
                      </div>
                  </div>
                  </div><!-- /.box-body -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
				  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

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
							<li class="active">RO</li>
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
							<h1>Tambah Penjualan RO</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="#" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>No. Kios</td>
                                      <td>:</td>
                                      <td><strong><?php echo $idkios; ?></strong></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
									<tr>
                                      <td>Nama Kios</td>
                                      <td>:</td>
                                      <td><strong><?php echo $row2['nama_kios']; ?></strong></td>
                                      <td>&nbsp;</td>
                                      <td width="12%">&nbsp;</td>
                                      <td width="1%">&nbsp;</td>
                                      <td width="15%">&nbsp;</td>
                                      <td width="2%">&nbsp;</td>
                                      <td width="11%">&nbsp;</td>
                                      <td width="2%">&nbsp;</td>
                                      <td width="24%">&nbsp;</td>
                                      <td width="3%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
								</table>
                              </form>

								<div class="row">
									<div class="col-xs-12">
									<p>
										<a href="#myModal" data-toggle="modal" class="btn btn-white btn-info btn-bold" >
											<i class="ace-icon fa fa-plus bigger-160"></i>
											Tambah Rincian Barang
										</a>
									</p>
									<p>
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">No</th>
													<th class="center">Uraian</th>
													<th class="center">Harga</th>
													<th class="center">Jumlah</th>
													<th class="center" width="250">Harga Total</th>
													<th class="center">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$tampil=mysql_query("select * from tb_detail_penjualan_sp where id_penjualan_sp='$idpenjualan' and id_kios='$idkios'");
											$no=1;
											$jumtot=0;
											while ($row=mysql_fetch_array($tampil))
											{
												$jumtot	= $jumtot+$row['harga_total'];
											?>
											<tr>
												<td align="center"><?php echo $no; ?></td>
												<td><?php echo $row[id_barang]; ?></td>
												<td align="right"><?php echo number_format($row['harga_satuan'],0); ?></td>
												<td align="center"><?php echo $row['jumlah_sp']; ?></td>
												<td align="right"><?php echo number_format($row['harga_total'],0); ?></td>
												<td align="center">
												<div class="hidden-sm hidden-xs btn-group">
												<a class="btn btn-xs btn-danger" href="build/build-penjualan-sp/hapus-detail-ro.php?id=<?php echo $idpenjualan; ?>
												&id2=<?php echo $idkios; ?>&id3=<?php echo $idcanvaser; ?>&id4=<?php echo $row[id_barang]; ?>">
												<i class="ace-icon fa fa-trash-o bigger-120"></i></a></div></td>
											</tr>
											<?php 
											$no++;
											} 
											?>
											<form action="build/build-penjualan-sp/update-penjualan-ro.php" method="POST" class="form-horizontal" role="form">
											<tr>
											<input type="hidden" name="idcanvaser" class="form-control" placeholder="No. Invoice" value="<?php echo $idcanvaser; ?>">
											<input type="hidden" name="idpenjualan" class="form-control" placeholder="No. Invoice" value="<?php echo $idpenjualan; ?>">
											<input type="hidden" name="idcustomer" class="form-control" placeholder="Nama Customer" value="<?php echo $idcustomer; ?>">
											<input type="hidden" name="idkios" class="form-control" value="<?php echo $idkios; ?>">
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><strong>Grand Total</strong></td>
												<td><strong>
												  <input name="grandtotal" type="hidden" value=" <?php echo $jumtot ; ?>" id="grandtotal" readonly="readonly"/>
												  <input name="grandtotal1" type="text" value=" <?php echo number_format($jumtot,0); ?>" id="grandtotal2" readonly="readonly"/>
												</strong></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><strong>Jumlah Tunai</strong></td>
												<td><strong>
												  <input name="jumlahtunai" type="text" id="jumlahtunai" />
												</strong></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><strong>Bank Transfer</strong></td>
												<td><strong>
											    <select class="form-control" name="idbank" id="idbank" style="width:160px;">
													<option value="">--Pilih Bank--</option>
														<?php 
														include "../../auth/autho.php";
																			
														$query=mysql_query("select id_bank, nama_bank
																			from tb_bank
																			ORDER BY nama_bank ASC");
														while($row=mysql_fetch_array($query))
														{
														?>
															<option value="<?php  echo $row['id_bank']; ?>"><?php  echo $row['nama_bank']; ?></option><?php
														}
														?>	
												</select>
											  </strong></td>
											  <td>&nbsp;</td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td><strong>Jumlah Transfer</strong></td>
										    <td><strong>
											    <input name="jumlahtransfer" type="text" id="jumlahtransfer" />
											  </strong></td>
											  <td>&nbsp;</td>
											  </tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td><strong>Piutang</strong></td>
										  <td><strong>
												  <input name="piutang" type="text" id="piutang" readonly />
												</strong></td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td colspan="6">
												<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Simpan</button> 
												</td>
											</form>
											</tr>
											</tbody>
										</table>
								  </div><!-- /.span -->
									</p>
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