<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try
		{
			ace.settings.check('breadcrumbs' , 'fixed')
		}
		catch(e)
		{
	</script>
	<ul class="breadcrumb">
		<li>
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="#">Home</a>
		</li>
		<li class="active">Pembayaran</li>
		<li class="active">SPP</li>
	</ul>
</div>
<div class="page-content">
	<!-- #section:settings.box -->
	<? include "container.php"; ?>

	<!-- /section:settings.box -->
	<div class="page-header">
		<h1>Pembayaran SPP</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<form action="build/build-pembayaran-spp/insert-bayar-spp.php" method="POST" class="form-horizontal" role="form">
					<tr>
						<td width="15%">Nomer Induk Siswa (NIS)</td>
						<td width="1%">:</td>
						<td width="15%"><input name="nomorinduksiswa" class="input-sm" type="text" id="nomorinduksiswa" onclick="PopupCenter('build-pop/siswa.php', 'myPop1',1200,650);" value="" href="javascript:void(0);" required/></td>
						<td>&nbsp;</td>
						<td>
							<button class="btn btn-info">Tambah Pembayaran</button>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</form>
			</table>			
			
			<!-- PAGE CONTENT ENDS -->
			
			<!-- STRAT PAGE CONTENT  -->
						
			<div class="row">
				<div class="clearfix">
					<div class="pull-right tableTools-container"></div>
				</div>
				<div class="table-header">
					Data Transaksi
				</div>
				<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th><strong>No</strong></th>
							<th><strong>Nama Siswa</strong></th>
							<th><strong>Bulan Pembayaran</strong></th>
							<th><strong>Jumlah Angsuran</strong></th>
							<th><strong>Metode Pembayaran</strong></th>
							<th><strong>Tanggal Transaksi</strong></th>
							<th><strong>Aksi</strong></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$tampil=mysql_query("SELECT a.id_siswa, a.nis, a.nama_siswa, f.keterangan, g.nama_jurusan, c.id_pembayaran_spp,d.bulan_pembayaran, d.jumlah_bayar, d.kekurangan, 
											d.metode_pembayaran, d.bank, d.no_reff, d.penyetor, d.keterangan2, d.tgl_pembayaran, d.status, h.id_bulan, h.nama_bulan
													FROM tb_siswa a,tb_pembayaran_spp c, tb_detail_pembayaran_spp d, tb_pembayaran_awal e, tb_kelas f, tb_jurusan g, tb_bulan h
														WHERE a.kelas = f.id_kelas AND a.jurusan = g.id_jurusan AND a.nis = c.nis AND c.id_pembayaran_spp = d.id_pembayaran_spp 
															AND d.bulan_pembayaran =  h.id_bulan GROUP BY d.tgl_pembayaran DESC");
						$no=1;
						$jumtot=0;
						while ($row=mysql_fetch_array($tampil))
						{
							$idspp = $row['id_pembayaran_spp'];
							//echo $idspp;
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nama_siswa']; ?></td>
							<td><?php echo $row['nama_bulan']; ?></td>
							<td><?php echo "RP. ".number_format($row['jumlah_bayar'],2); ?></td>
							<td><?php echo $row['metode_pembayaran']; ?></td>
							<td><?php echo $row['tgl_pembayaran']; ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="dash.php?hp=lihat-bayar-spp&idspp=<?php echo $idspp; ?>" target="_blank">
										<i class="ace-icon fa fa-search-plus bigger-130"></i>
									</a>

									<a class="green" href="dash.php?hp=ubah-bayar-spp&idspp=<?php echo $idspp; ?>" target="_blank">
										<i class="ace-icon fa fa-pencil bigger-130"></i>
									</a>
									<a class="red" href="build/build-pembayaran-spp/cetak-bayar-spp.php?&idspp=<?php echo $idspp; ?>" target="_blank">
										<i class="ace-icon fa fa-print bigger-130"></i>
									</a>
								</div>

								<!--<div class="hidden-md hidden-lg">
									<div class="inline pos-rel">
										<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
										</button>

										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
													<span class="blue">
														<i class="ace-icon fa fa-search-plus bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
													<span class="green">
														<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
													</span>
												</a>
											</li>

											<li>
												<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
													<span class="red">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>-->
							</td>
						</tr>
					<?php 
						$no++;
						} 
					?>
						
					</tbody>
				</table>
				</div>
			</div><!-- /.row -->
			
			<!-- END PAGE CONTENT -->
			
		</div><!-- /.col -->
	</div><!-- /.page-content -->
</div><!-- /.page-content -->
	
<script>
	function PopupCenter(pageURL, title,w,h) 
	{
		var left = (screen.width/2)-(w/2);
		var top = (screen.height/3)-(h/2);
		var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	}
</script>