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
						<div class="table-header">
							Verifikasi Pimpinan
						</div>
						<form action="#" method="POST" class="form-horizontal" role="form">           
							<input type="hidden" name="id_canvaser" value="<?php echo $id_canvaser; ?>" />
							<table id="example1" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='1'){
										?>
                                        	<th>No Penjualan</th>
                                            <th>Tanggal</th>
											<th>Canvasser</th>
											<th>Grand Total</th>
											<th>Tunai</th>
											<th>Transfer</th>
											<th>Piutang</th>
											<th>Status</th>
											<th width="50">&nbsp;</th>
                                        <?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php 
                                    include "auth/autho.php";
									if($_SESSION[hak_akses]=='1')
                                    {  
                                        $tampil=mysql_query("select distinct(p.id_penjualan_sp), p.tanggal_bayar, s.nama_sales, p.id_sales, p.status_acc_bayar_pimpinan
										from tb_pembayaran_canvaser p, tb_sales s
										where p.id_sales=s.id_sales and p.status_acc_bayar='1'");
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
										<td><center>
										<?php
											if($row[4]=='0')
											{
												echo "Belum";
											}
											else if($row[4]!='0')
											{
												echo "Sudah";
											}
										?>
										</center></td>
										<td><center>
										<?php
											if($row[4]=='0')
											{
												echo "<a class='btn btn-xs btn-info' 
												href='build/build-verifikasi-penjualan-pimpinan/update-verifikasi-penjualan-p.php?id=$row[0]&id2=$row[3]'>";
												echo '<i class="ace-icon fa fa-pencil bigger-120"></i></a>';
											}
											else if($row[4]!='0')
											{
												echo '<span class="label label-success arrowed-in arrowed-in-right">';
												echo "ACC";
												echo "</span>";
											}
										?>
										</center></td>
									</tr>
									<?php 
										$no++;
										}
									}
									?>
								</tbody>
							</table>
                        
                    </form>
					<div class="row">
									
					</div><!-- /.row -->
								<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
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