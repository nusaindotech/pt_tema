<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
<style type="text/css">
	.rowover
	{
		background-color: #3399ff;
		cursor: hand;
		color: white;
	}
</style>
<section align="center">
	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
		<p align="center"><h2><strong>Data Siswa</strong></h2></p>
		<div class="row">
			<div class="col-lg-12">
				<!--<table width="29%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="5%">&nbsp;</td>
						<td width="95%">
							<a class="btn btn-info" href="tambahcustomer.php">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Tambah Siswa
							</a>
						</td>
					</tr>
				</table>-->
				<div class="panel-body">
					<div class="adv-table">
						<table  class="display table table-bordered" id="example">
							<thead>
								<tr>
									<th width="10%">No.</th>
									<th width="20%">Nomor Induk Siswa</th>
									<th width="50%">Nama Siswa</th>
								</tr>
							</thead>
							<tbody>
							<?php 
			
								include "../../auth/autho.php";
								
								$tampil=mysql_query("select * from tb_siswa order by id_siswa ASC");
								$no=1;
								while ($row=mysql_fetch_array($tampil))
								{
							?>
							<tr bgcolor="fefefe" title="Pilih Siswa" style="cursor:pointer" onMouseOver="this.className='rowover';" onMouseOut="this.className='rowselected-even';"
											onClick="window.close();											
											javascript:window.opener.document.getElementById('nomorinduksiswa').value='<?php echo $row['nis'];?>'">
											
											<td height="26" align="center" class="text"><font size="2.3 em"><?php echo $no;?></font></td>
											<td align="left" class="text"><font size="2.3 em"><?php echo $row['nis'];?></font></td>
											<td align="left" class="text"><font size="2.3 em"><?php echo $row['nama_siswa'];?></font></td>
										
							</tr>
							<?php
								$no++;
								}
							?>
							</tbody>
							<tfoot>
							
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
</section>

<script src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>

<script type="text/javascript" charset="utf-8">
	  $(document).ready(function() {
		  $('#example').dataTable( {
			  "aaSorting": [[ 4, "desc" ]]
		  } );
	  } );
</script>