<?php
	$hp_kios			=$_POST['hp_kios'];
	$hp_sales			=$_POST['hp_sales'];
	$tanggal_input		=$_POST['tanggal_input'];
	$jumlahtunai		=$_POST['jumlahtunai'];
	$idbank				=$_POST['idbank'];
	$jumlahtransfer		=$_POST['jumlahtransfer'];
	$idbank2			=$_POST['idbank2'];
	$jumlahtransfer2	=$_POST['jumlahtransfer2'];
	$idbank3			=$_POST['idbank3'];
	$jumlahtransfer3	=$_POST['jumlahtransfer3'];
	$catatan			=$_POST['catatan'];

	$status 			=$_POST['status'];
	$id_rekening		=$_POST['id_rekening'];

	$a2=mysql_query("SELECT nama_kios from tb_upload_dompul where hp_kios='$hp_kios'");
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
        <!-- /.modal-dialog -->
        <style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
	color: #FF0000;
}
-->
        </style>
        
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
							<h1>Review Penjualan Dompul RO</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                    <tr>
                                      <td colspan="11"><div align="center"><span class="style1"><marquee scrollamount="10">&quot; HARAP TELITI SEBELUM MENYELESAIKAN INVOICE !!!! &quot;</marquee></span></div></td>
                                      <td>&nbsp;</td>
                                    </tr>
								</table>
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
												</tr>
											</thead>
											<tbody>
											<?php 
											$tampil=mysql_query("select type_dompul,no_upload_dompul, produk, qty, qty_program 
											from tb_upload_dompul where tanggal_transaksi='$tanggal_input' and hp_kios = '$hp_kios' and status_bayar_dompul=0");
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
													$hargasatuan=$row['harga_dompul'];
												}
												
												$harga_total	= $hargasatuan*($row['qty']-$row['qty_program']);
												$grand_total	= $grand_total+$harga_total;
											?>
											<tr>
												<td align="center"><div align="center"><?php echo $no; ?></div></td>
												<td><div align="center"><?php echo $row['produk']; ?></div></td>
												<td align="right"><div align="center"><?php echo $tipe; ?></div></td>
												<td align="right"><div align="center"><?php echo $hargasatuan; ?></div></td>
												<td align="center"><div align="center"><?php echo $row['qty']; ?></div></td>
												<td align="right"><div align="center"><?php echo $row['qty_program']; ?></div></td>
												<td align="right"><div align="center"><?php echo number_format($harga_total,0); ?></div></td>
											  </tr>
											<?php 
											$no++;
											} 
											?>
											<form action="build/build-penjualan-dompul/update-penjualan-ro-dompul.php" method="POST" class="form-horizontal" role="form" onsubmit="return confirm('Apakah anda yakin akan menyimpan dan melanjutkannya ?');">
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
										      </tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Jumlah Tunai</strong></td>
												<td>&nbsp;</td>
												<td><strong>
                                                  <input name="jumlahtunai" type="text" id="jumlahtunai" value="<?php echo $jumlahtunai; ?>" readonly/>
                                                </strong></td>
										      </tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Bank Transfer 1</strong></td>
												<td>&nbsp;</td>
												<td><strong>
                                                  <input name="idbank" type="text" id="idbank" value="<?php echo $idbank; ?>" readonly/>
                                                </strong></td>
									          </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Jumlah Transfer 1</strong></td>
										      <td>&nbsp;</td>
										      <td><strong>
                                              <input name="jumlahtransfer" type="text" id="jumlahtransfer" value="<?php echo $jumlahtransfer; ?>" readonly/>
                                              <input name="status" type="hidden" value="<?php echo $status; ?>" />
											    <input name="id_rekening" type="hidden" value="<?php echo $id_rekening; ?>"/>
                                            </strong></td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Bank Transfer 2</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <input name="idbank2" type="text" value="<?php echo $idbank2; ?>" readonly/>
											  </strong></td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Jumlah Transfer 2</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <input name="jumlahtransfer2" type="text" value="<?php echo $jumlahtransfer2; ?>" readonly/>
											  </strong></td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Bank Transfer 3</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <input name="idbank3" type="text" value="<?php echo $idbank3; ?>" readonly/>
											  </strong></td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td colspan="2"><strong>Jumlah Transfer 3</strong></td>
											  <td>&nbsp;</td>
											  <td><strong>
											    <input name="jumlahtransfer3" type="text" value="<?php echo $jumlahtransfer3; ?>" readonly/>
											  </strong></td>
											  </tr>
											<tr>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td colspan="2"><strong>Catatan</strong></td>
										        <td>&nbsp;</td>
									          <td><strong>
                                            <input name="catatan" type="text" id="catatan" value="<?php echo $catatan; ?>" readonly/>
                                          </strong></td>
											  </tr>
											<tr>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>&nbsp;</td>
											  <td>
										        <div align="right">	
										          <button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
											  Simpan dan Selesaikan Invoice</button>
										        </div>
									          <div align="right"></div></td>
											  <td>&nbsp;</td>
											<tr>
											  <td>&nbsp;</td>
											  <td colspan="7">																								</td>
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
							{id:$(this).attr('data-id')},
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