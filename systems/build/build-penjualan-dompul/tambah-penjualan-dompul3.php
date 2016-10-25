<?php
	$hp_kios		=$_GET['hp_kios'];
	$hp_sales		=$_GET['hp_sales'];
	$tanggal_input	=$_GET['tanggal_input'];

	$a2=mysql_query("SELECT nama_kios from tb_upload_dompul where hp_kios='$hp_kios'");
	$row2=mysql_fetch_array($a2);
	
	$a3=mysql_query("SELECT * from tb_customer where id_customer='$idcustomer'");
	$row3=mysql_fetch_array($a3);
	
	$a6=mysql_query("SELECT nama_sales from tb_sales where hp_sales='$hp_sales'");
	$row6=mysql_fetch_array($a6);
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
        <!-- /.modal-dialog -->
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
							<li class="active">Dompul RO</li>
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
							<h1>Tambah Penjualan Dompul RO</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form action="#" method="POST" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td>Hp. Sales</td>
                                      <td>:</td>
                                      <td><strong><?php echo $hp_sales; ?></strong></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>Nama Sales</td>
                                      <td>:</td>
                                      <td><strong><?php echo $row6['nama_sales']; ?></strong></td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="9%">Hp. Kios</td>
                                      <td width="1%">:</td>
                                      <td width="35%"><strong><?php echo $hp_kios; ?></strong></td>
                                      <td width="0%">&nbsp;</td>
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
                                      <td width="10%">&nbsp;</td>
                                      <td width="0%">&nbsp;</td>
                                      <td width="13%">&nbsp;</td>
                                      <td width="0%">&nbsp;</td>
                                      <td width="9%">&nbsp;</td>
                                      <td width="0%">&nbsp;</td>
                                      <td width="22%">&nbsp;</td>
                                      <td width="1%">&nbsp;</td>
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
									  <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">No</th>
													<th class="center">Uraian</th>
													<th class="center">Tipe</th>
													<th class="center">Harga</th>
													<th class="center">Jumlah</th>
													<th class="center" width="250">Jumlah Program</th>
													<th class="center" width="250">Harga Total</th>
													<th class="center" width="250">Aksi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$tampil=mysql_query("select type_dompul,no_upload_dompul, produk, qty, qty_program from tb_upload_dompul 
											where tanggal_transaksi='$tanggal_input' and hp_kios = '$hp_kios' and hp_sales='$hp_sales'and status_bayar_dompul=0");
											$no=1;
											$jumtot=0;
											$grand_total	=0;
											while ($row=mysql_fetch_array($tampil))
											{
												$jumtot	= $jumtot+$row['harga_total'];
												
												$produk			=$row['produk'];
												$type_dompul	=$row['type_dompul'];												
												
												$a4=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='$produk' and type_dompul='$type_dompul'");
												$row4=mysql_fetch_array($a4);
																																				
												if($row['type_dompul']=='')
												{
													$a5=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='$produk' and type_dompul='CVS'");
													$row5=mysql_fetch_array($a5);
													
													$tipe='Normal';
													$hargasatuan=$row5['harga_dompul'];
												}
												else
												{
													$tipe=$row['type_dompul'];
													
													$a5=mysql_query("SELECT harga_dompul from tb_dompul where nama_dompul='$produk' and type_dompul='$tipe'");
													$row5=mysql_fetch_array($a5);
													
													$hargasatuan=$row5['harga_dompul'];
												}
												
												$harga_total	= $hargasatuan*($row['qty']-$row['qty_program']);
												$grand_total	= $grand_total+$harga_total;
											?>
											<tr>
												<td align="center"><div align="center"><?php echo $no; ?></div></td>
												<td><div align="center"><?php echo $row['produk']; ?></div></td>
												<td align="right"><div align="center"><?php echo $tipe; ?></div></td>
												<td align="right"><div align="center"><?php echo $hargasatuan; ?></div></td>
												<td align="center"><div align="center"><?php echo number_format($row['qty'],0); ?></div></td>
												<td align="right"><div align="center"><?php echo number_format($row['qty_program'],0); ?></div></td>
												<td align="right"><div align="center"><?php echo number_format($harga_total,0); ?></div></td>
												<td align="right"><div align="center">
                                                <div class="btn-group">
													  <button type="button" class="btn btn-info">Aksi</button>
													  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
														<span class="sr-only">Toggle Dropdown</span>													  </button>
													  <ul class="dropdown-menu" role="menu">
														<li><a href="#" id="edit-tipe" data-id="<?php echo $row['no_upload_dompul'];?>" data-id2="<?php echo $_SESSION['level'];?>">Edit Data</a></li>
													  </ul>
													</div>
                                                </div></td>
											</tr>
											<?php 
											$no++;
											} 
											?>
											<form action="dash.php?hp=penjualan-dompul5" method="POST" class="form-horizontal" role="form" onsubmit="return confirm('Apakah anda yakin akan melanjutkannya ?');">
											<tr>
											<input type="hidden" name="hp_kios" class="form-control" value="<?php echo $hp_kios; ?>">
											<input type="hidden" name="hp_sales" class="form-control" value="<?php echo $hp_sales; ?>">
											<input type="hidden" name="tanggal_input" class="form-control" value="<?php echo $tanggal_input; ?>">
											<input type="hidden" name="id_ho" class="form-control" value="<?php echo $_SESSION[id_ho]; ?>">
											<input type="hidden" name="id_bo" class="form-control" value="<?php echo $_SESSION[id_bo]; ?>">
											<input type="hidden" name="No_User" class="form-control" value="<?php echo $_SESSION[No_User]; ?>">
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Grand Total</strong></td>
												<td>&nbsp;</td>
												<td><strong>
                                                  <input name="grandtotal" type="hidden" value=" <?php echo $grand_total ; ?>" id="grandtotal" readonly="readonly"/>
                                                  <input name="grandtotal1" type="text" value=" <?php echo number_format($grand_total,0); ?>" id="grandtotal2" readonly="readonly"/>
                                                </strong></td>
											    <td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Jumlah Tunai</strong></td>
												<td>&nbsp;</td>
												<td><strong>
                                                  <input name="jumlahtunai" type="text" id="jumlahtunai" autocomplete="off"/>
                                                </strong></td>
											    <td>&nbsp;</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Bank Transfer 1</strong></td>
												<td>&nbsp;</td>
												<td><strong>
                                                  <select class="form-control" name="idbank" id="idbank" style="width:180px;">
                                                    <option value="">--Pilih Bank--</option>
                                                    <?php 																			
														$query=mysql_query("select id_bank, nama_bank
																			from tb_bank
																			ORDER BY nama_bank ASC");
														while($row=mysql_fetch_array($query))
														{
														?>
                                                    <option value="<?php  echo $row['nama_bank']; ?>">
                                                      <?php  echo $row['nama_bank']; ?>
                                                    </option>
                                                    <?php
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
											  <td colspan="2"><strong>Jumlah Transfer 1</strong></td>
										      <td>&nbsp;</td>
										      <td><strong>
                                              <input name="jumlahtransfer" type="text" id="jumlahtransfer" autocomplete="off"/>
                                            </strong></td>
											  <td>&nbsp;</td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Bank Transfer 2</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <select class="form-control" name="idbank2" id="idbank2" style="width:180px;">
                                                  <option value="">--Pilih Bank--</option>
                                                  <?php 																			
														$query=mysql_query("select id_bank, nama_bank
																			from tb_bank
																			ORDER BY nama_bank ASC");
														while($row=mysql_fetch_array($query))
														{
														?>
                                                  <option value="<?php  echo $row['nama_bank']; ?>">
                                                  <?php  echo $row['nama_bank']; ?>
                                                  </option>
                                                  <?php
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
											  <td colspan="2"><strong>Jumlah Transfer 2</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <input name="jumlahtransfer2" type="text" id="jumlahtransfer2" autocomplete="off"/>
											  </strong></td>
											  <td>&nbsp;</td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Bank Transfer 3</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <select class="form-control" name="idbank3" id="idbank3" style="width:180px;">
                                                  <option value="">--Pilih Bank--</option>
                                                  <?php 																			
														$query=mysql_query("select id_bank, nama_bank
																			from tb_bank
																			ORDER BY nama_bank ASC");
														while($row=mysql_fetch_array($query))
														{
														?>
                                                  <option value="<?php  echo $row['nama_bank']; ?>">
                                                  <?php  echo $row['nama_bank']; ?>
                                                  </option>
                                                  <?php
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
											  <td colspan="2"><strong>Jumlah Transfer 3</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <input name="jumlahtransfer3" type="text" id="jumlahtransfer3" autocomplete="off"/>
											  </strong></td>
											  <td>&nbsp;</td>
											  </tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Catatan</strong></td>
										        <td>&nbsp;</td>
									          <td><strong>
                                            <input name="catatan" type="text" id="catatan" autocomplete="off"/>
                                          </strong></td>
											  <td>&nbsp;</td>
											</tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td><div align="right">
											    <button class="btn btn-info" type="submit" >
												<i class="ace-icon fa fa-check bigger-110"></i>
											  Lanjutkan</button>
											  </div></td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											<tr>
											  <td>&nbsp;</td>
											  <td colspan="8">
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
                      
                      
                      <script src="../assets/js/jquery.js"></script>
			<script>
				$(function(){
					$(document).on('click','#edit-tipe',function(e){
						e.preventDefault();
						$("#view").modal('show');
						$.post('build/build-penjualan-dompul/form-edit.php',
							{id:$(this).attr('data-id'),id2:$(this).attr('data-id2')},
							function(html){
								$(".modal-body2").html(html);
							}  
						);
					});
				});
			</script>
			<div class="modal" id="view" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; </button>
				<h4 class="modal-title" id="myModalLabel">Edit Tipe</h4>
				</div>
				<div class="modal-body2">
				</div>
				
			</div>
		</div>
	</div>