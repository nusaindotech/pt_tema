<?php

	// $hp_kios		=$_POST['hp_kios'];
	// $hp_sales		=$_POST['hp_sales'];
	// $tanggal_input	=$_POST['tanggal_input'];
	
	include "../../../auth/autho.php";

	$output = '';
	$no = 1;
	$query = mysql_query("SELECT distinct tanggal_input FROM tb_upload_rekening; ");
	$query1 = mysql_query("select tb_upload_rekening.id_rekening, tb_upload_rekening.tanggal, tb_bank.nama_bank, tb_upload_rekening.keterangan, tb_upload_rekening.nominal, tb_upload_rekening.pengakuan  from tb_bank inner join tb_upload_rekening on tb_bank.id_bank = tb_upload_rekening.id_bank WHERE tanggal_input");
	?>
	<div class="table-responsive">
	<!-- <form action="build-pop-detail_rekening.php" method="post" name="myform">
...
<input type="submit" name="subpopup" value="Submit in Popup" 
   onclick="myform.target='POPUPW'; POPUPW = window.open(
   'about:blank','POPUPW','width=600,height=400');">
<input type="submit" name="subnormal" value="Submit Normal">
</form> -->
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Tanggal Upload</th>
			</tr>
			</thead>
			<tbody>
	<?php
	while ($row = mysql_fetch_array($query)) {
	?>
		<tr>
			<td><?php echo $no ?></td>
			<td><a href="#" class="view_data1" name="tanggal_input" value=<?php echo $row["tanggal_input"]?> id="<?php echo $row["tanggal_input"]?>" data-toggle="modal" data-target="#dataModal1"><?php echo $row["tanggal_input"]?></a></td>

		</tr>
	<?php
		$no++;
	}
	?>
		</table>
	</div>
	<script type="text/javascript">
			$('.view_data1').bind('click', function (e) {
				console.log('.view_data1');
				var tanggal_input = $(this).text();
				$('.view_data1').val(tanggal_input)
				// PopupCenter('build-pop/detail_rekening.php');

				$.ajax({
					url:"build/build-rekening-koran/detail-rekening1.php",
					type: "POST",
					data:{tanggal_input:tanggal_input},
					success:function (data) {
						$('#detail_rekening1').html(data);
						$('#dataModal1').modal('show');
						
					}
				});
			});
	</script>
	<div id="dataModal1" class="modal fade" id="view" role="dialog" tabindex="1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; </button>
				<h4 class="modal-title">Detail Rekening</h4>
				</div>
				<div class="modal-body" id="detail_rekening1">
				
				</div>
				
				</div>
			</div>
		</div>
	</div>
	