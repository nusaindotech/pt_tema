<!-- #section:basics/content.breadcrumbs -->
<?php
	session_start();
	$id_ho = $_SESSION[id_ho];
	$id_bo = $_SESSION[id_bo];
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
			<li class="active">Monitoring</li>
			<li class="active">Starting Pack Canvaser</li>
		</ul><!-- /.breadcrumb -->

	</div>

	<!-- /section:basics/content.breadcrumbs -->
	<div class="page-content">
		<!-- #section:settings.box -->
		<?php include "container.php"; ?>

		<!-- /section:settings.box -->
		<div class="page-header">
			<h1>
				Monitoring Starting Pack Canvaser
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
					<form action="build/build-penjualan-sp/insert-penjualan-sp.php" method="POST" class="form-horizontal" role="form">
                        
							<input name="hak_akses" value="<?php echo $_SESSION[hak_akses]; ?>" type="hidden" />
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
                                        <?php
                                        if($_SESSION[hak_akses]=='3'){
										?>
                                        	<th><center>No</center></th>
                                            <th><center>Tanggal</center></th>
											<th><center>Canvaser</center></th>
											<th><center>Total SP</center></th>
                                        <?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php 
                                    include "auth/autho.php";
									if($_SESSION[hak_akses]=='3')
                                    {  
                                        $tampil=mysql_query("select p.tanggal_ambil, s.nama_sales, p.id_pengambilan_sp, p.id_bo, s.id_sales
															from tb_pengambilan_sp p, tb_sales s
															where p.id_sales=s.id_sales and p.id_bo='$id_bo' order by p.tanggal_ambil desc");
                                        $no=1;
                                        while($row=mysql_fetch_array($tampil))
										{
									?>
									<tr>
										<td><center><?php echo $no; ?></center></td>
										<td><center><?php echo $row[0]; ?></center></td>
                                        <td><center><?php echo $row[1]; ?></center></td>
                                        <?php
											$tampil2=mysql_query("select distinct(hu_1)
																  from tb_detail_pengambilan
																  where id_pengambilan_sp='$row[2]'");
											$hitung=0;
											while($row2=mysql_fetch_array($tampil2))
                                        	{
												$bantu="select count(ip)
														from tb_detail_pengambilan
														where hu_1='$row2[0]' and id_pengambilan_sp='$row[2]'";
												$hasil_bantu=mysql_query($bantu);
												$data_bantu=mysql_fetch_array($hasil_bantu);
												$hitung=$hitung+$data_bantu[0];
											}
										?>
                                        <td><center>
											<a href="dash.php?hp=monitoring-sp-canvaser2&id=<?php echo $row[2]; ?>&id2=<?php echo $row[4]; ?>">
                                            <?php echo $hitung; ?></a>
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
					
		<script>
			function PopupCenter(pageURL, title,w,h) {
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/3)-(h/2);
			var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
			}
		</script>