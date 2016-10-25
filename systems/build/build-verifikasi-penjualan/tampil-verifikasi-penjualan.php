<?php
	session_start();
	$id_canvaser =$_GET['id'];
	$id_ho = $_SESSION[id_ho];
	$id_bo = $_SESSION[id_bo];
	$tglsekarang = date('Y-m-d');
?>
	
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
			</li>
			<li class="active">Verifikasi</li>
			<li class="active">Penjualan</li>
		</ul><!-- /.breadcrumb -->

	</div>

	<!-- /section:basics/content.breadcrumbs -->
	<div class="page-content">
		<!-- #section:settings.box -->
		<?php include "container.php"; ?>

		<!-- /section:settings.box -->
		<div class="page-header">
			<h1>
				Verifikasi Penjualan
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
								<form action="dash.php?hp=verifikasi-penjualan" method="GET" class="form-horizontal" role="form">
								  <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <input type="hidden" name="hp" value="verifikasi-penjualan" />
                                    <tr>
                                      <td>Pilih Canvasser</td>
                                      <td>:</td>
                                      <td>
									  <select class="chosen-select form-control" id="form-field-select-3" name="id" style="width:170px;" required>
										<option value="">--Pilih Canvasser--</option>
											<?php
											$query=mysql_query("select * 
																from tb_sales
																where id_bo='$id_bo'
																ORDER BY nama_sales ASC");
											while($row=mysql_fetch_array($query))
											{
											?>
												<option value="<?php  echo $row['id_sales']; ?>"><?php  echo $row['nama_sales']; ?></option><?php
											}
											?>	
									</select>
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
                                      <td width="13%">&nbsp;</td>
                                      <td width="1%">&nbsp;</td>
                                      <td width="14%">
									  <button class="btn btn-info" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
											Tampilkan Penjualan								   
										</button>
										</td>
                                      <td width="72%">&nbsp;</td>
                                    </tr>
                                  </table>
                                  </form>
								  <br />
								  
						<form action="build/build-verifikasi-penjualan/insert-verifikasi-penjualan.php" method="POST" class="form-horizontal" role="form">                        
							<input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
							<input type="hidden" name="id_canvaser" value="<?php echo $id_canvaser; ?>" />
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th><center>No Penjualan</center></th>
                                            <th><center>Tanggal</center></th>
											<th><center>Canvaser</center></th>
											<th><center>Grand Total</center></th>
											<th><center>Tunai</center></th>
											<th><center>Transfer</center></th>
											<th><center>Piutang</center></th>
                                        <?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php 
                                    include "auth/autho.php";
									if($_SESSION[hak_akses]=='3')
                                    {  
                                        $tampil=mysql_query("select distinct(p.id_penjualan_sp), p.tanggal_bayar, s.nama_sales
										from tb_pembayaran_canvaser p, tb_sales s
										where p.id_sales=s.id_sales and p.id_sales='$id_canvaser' and p.status_acc_bayar='0' and p.tanggal_bayar='$tglsekarang'");
                                        $no=1;
										while($row=mysql_fetch_array($tampil))
										{
									?>
									<input type="hidden" name="no_pembayaran" value="<?php echo $row[0]; ?>" />
									<tr>
										<td><center><?php echo $row['id_penjualan_sp']; ?></center></td>
                                        <td><center><?php echo $row['tanggal_bayar']; ?></center></td>
										<td><center><?php echo $row['nama_sales']; ?></center></td>
                                        <?php
											$bantu="select sum(grand_total_kios)
													from tb_pembayaran_canvaser
													where id_penjualan_sp='$row[0]'";
											$hasil_bantu=mysql_query($bantu);
											$data_bantu=mysql_fetch_array($hasil_bantu);
										?>
										<td><center><?php echo number_format($data_bantu[0],0); ?></center></td>
										<?php
											$bantu="select sum(cash_kios)
													from tb_pembayaran_canvaser
													where id_penjualan_sp='$row[0]'";
											$hasil_bantu=mysql_query($bantu);
											$data_bantu=mysql_fetch_array($hasil_bantu);
										?>
										<td><center><?php echo number_format($data_bantu[0],0); ?></center></td>
										<?php
											$bantu="select sum(transfer)
													from tb_pembayaran_canvaser
													where id_penjualan_sp='$row[0]'";
											$hasil_bantu=mysql_query($bantu);
											$data_bantu=mysql_fetch_array($hasil_bantu);
										?>
										<td><center><?php echo number_format($data_bantu[0],0); ?></center></td>
										<?php
											$bantu="select sum(piutang)
													from tb_pembayaran_canvaser
													where id_penjualan_sp='$row[0]'";
											$hasil_bantu=mysql_query($bantu);
											$data_bantu=mysql_fetch_array($hasil_bantu);
										?>
										<td><center><?php echo number_format($data_bantu[0],0); ?></center></td>
									</tr>
									<?php 
										$no++;
										}
									}
									?>
								</tbody>
								<tr>
									<td colspan="7">
									<button class="btn btn-info" onclick="return confirm('Apakah Data Sudah Sesuai?')" type="submit">
										<i class="ace-icon fa fa-check bigger-110"></i>
											Konfirmasi Penjualan							   
										</button>
									</td>
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