<?php

if (isset($_POST['tanggal_input'])) {
	
	include "../../../auth/autho.php";
	session_start();
	$_SESSION['id_bo'];
	$today = date("Y-m-d")
?>
	Upload Tanggal <?php $_POST["tanggal_input"]; ?>
	<?php
	$no = 1;
	$query = mysql_query("SELECT * FROM tb_upload_rekening WHERE tanggal_input");
	$query1 = mysql_query("select tb_upload_rekening.id_rekening, tb_upload_rekening.tanggal, tb_bank.nama_bank, tb_upload_rekening.keterangan, tb_upload_rekening.nominal, tb_upload_rekening.isstatus from tb_bank inner join tb_upload_rekening on tb_bank.id_bank = tb_upload_rekening.id_bank WHERE tanggal_input = '".$_POST["tanggal_input"]."'");
	?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Tanggal</th>
					<th>Nama Bank</th>
					<th>Keterangan</th>
					<th>Nominal</th>
					<th>Pengakuan</th>
				</tr>
			</thead>
		<tbody>
	<?php
	while ($row = mysql_fetch_array($query1)) {
		?>
			<tr>
				<form action="build/build-penjualan-dompul/tambah-penjualan-dompul3.php" method="POST">
				<td><?php echo $no; ?></td>
				<td data-date-format="yyyy-mm-dd"><?php echo $row[1] ?></td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo $row[3] ?></td>
				<td><?php echo $row[4] ?></td>
				<td><?php if ($row['isstatus'] == '1') {
					?>Sudah Diakui
					<?php 
				}elseif ($row['isstatus'] == '0') {
					?>
						<input type="checkbox" class="giftsRosesCheckBox" id="checkboss" name="cekku[]" value="<?php echo $row['nominal'];?> " data-valuetwo="<?php echo $row['nama_bank']; ?> " data-valuethree="1" data-valuefour="<?php echo $row['id_rekening']; ?>">
						<!-- <input type="hidden" class="bank" id="bank" name="bankku[]" value="<?php echo $row['nama_bank'];?> ">
						<input type="hidden" class="status" id="status" name="status[]" value="1">
						<input type="hidden" class="idrekening" id="idrekening" name="idrekening[]" value="<?php echo $row['id_rekening'];?> "> -->
						</td>
					<?php
				}?>
				
			</tr>

		<?php
		$no++;
	}
	?>
	</table></div>
	<div class="modal-footer">
				<button type="submit" class="btn btn-danger" data-dismiss="modal">Simpan</button>
				</form>
	

	<script type='text/javascript'>
	var valuebank = $('input[name="namabank[]"]').map(function(){
		return $(this).val();
	}).get();
        $('button').bind('click', function (e) {
            var total = 0;
            var bank;
            var status;
            var id_rekening;
            // var bank = $('input[name="cekku[]"]').val($('input[name="cekku[]"]')).attr('data-valuetwo');
            // var status = $('input[name="cekku[]"]').val($('input[name="cekku[]"]')).attr('data-valuethree');
            // var id_rekening = $('input[name="cekku[]"]').val($('input[name="cekku[]"]')).attr('data-valuefour');
            $(':checkbox:checked.giftsRosesCheckBox').each(function () {
                total += $(this).val();
                bank = $(this).data('valuetwo');
                status = $(this).data('valuethree');
                id_rekening = $(this).data('valuefour');
                

    //             bank = $('input[name="cekku[]"]').map(function(){
				// 	return $(this).data('valuetwo');
				// }).get();
				alert(bank);
				console.log(status);

				
				console.log(id_rekening);
            });

            alert(total);

            $.ajax({
				url:"build/build-penjualan-dompul/tambah-penjualan-dompul3.php",
				type: "POST",
				data:{id_rekening: id_rekening, total:total, bank:bank, status:status},
				success:function (data) {
					// for (var i = 0; i < bank.length; i++) {
					// 	bank[i];
					// 	console.log(bank[i]);
					// }
					
					$('#jumlahtransfer').attr('value', total);
					$('#idbank').attr('value', bank);
					$('#status').attr('value', status);
					$('#id_rekening').attr('value', id_rekening);
					

					
				}
			});
        });

    // $(".cb").click(function(){

    //     var values = new Array();
    //     $.each($("input[name='check_box[]']:checked"), function() {
    //       values.push($(this).val());

    //     });

    //     //alert(values);

    //     $.ajax({url: "build/build-penjualan-dompul/tambah-penjualan-dompul3.php", 
    //     type:'POST',
    //     data:{ 'cbs':values},
    //     success: function(result){

    //          resp = JSON.parse(result);

    //          alert(resp.sum)

    //     }

    //     });
    // });
    </script>
<?php
}
?>
