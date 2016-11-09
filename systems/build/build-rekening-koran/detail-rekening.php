<?php

if (isset($_POST['tanggal_input'])) {
	
	include "../../../auth/autho.php";
	?>

	Upload Tanggal <?php echo $_POST["tanggal_input"]; ?>
	<?php
	$no = 1;
	$query = mysql_query("SELECT * sFROM tb_upload_rekening WHERE tanggal_input = '".$_POST["tanggal_input"]."' ");
	$query1 = mysql_query("select tb_upload_rekening.id_rekening, tb_upload_rekening.tanggal, tb_bank.nama_bank, tb_upload_rekening.keterangan, tb_upload_rekening.nominal, tb_upload_rekening.pengakuan  from tb_bank inner join tb_upload_rekening on tb_bank.id_bank = tb_upload_rekening.id_bank WHERE tanggal_input = '".$_POST["tanggal_input"]."'");
	$query2 = mysql_query("SELECT * FROM tb_bank a, tb_upload_rekening b, users c WHERE a.id_bank = b.id_bank AND c.no_user = b.no_user AND b.tanggal_input = '".$_POST["tanggal_input"]."'");
	?>
	<form action="build/build-rekening-koran/update-pembatalan.php" method="POST">
	<div class="table-responsive">
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Tanggal</th>
				<th>Nama Bank</th>
				<th>Keterangan</th>
				<th>Nominal</th>
				<th>Pengakuan User</th>
				<th>Pembatalah</th>
			</tr>
			</thead>
			<tbody>
	<?php
	while ($row = mysql_fetch_array($query2)) {
		?>
			<tr>
				<td>'<?php echo $no ?></td>
				<td data-date-format="yyyy-mm-dd"><?php echo $row['tanggal'] ?></td>
				<td><?php echo $row['nama_bank'] ?></td>
				<td><?php echo $row['keterangan'] ?></td>
				<td> <?php echo $row['nominal'] ?></td>
				<td> <?php echo $row['nama_lengkap'] ?></td>
				<td><input type="submit" name="batal" class="btn btn-info batalkan" value="<?php echo $row['id_rekening'] ?>">Batalkan</td>
			</tr>
		<?php
		$no++;
		var_dump($row['id_rekening']);
	}
	?>
	</table></div></form>

	<script type='text/javascript'>

	$('.batalkan').bind('click', function (e) {

		var id_rekening;
		id_rekening = $(this).val();
		

		alert(id_rekening);

		$.ajax({
			url:"build/build-rekening-koran/update-pembatalan.php",
			type: "POST",
			data:{id_rekening: id_rekening},
			success:function (data) {
				// for (var i = 0; i < bank.length; i++) {
				// 	bank[i];
				// 	console.log(bank[i]);
				// }
				console.log(data);
				alert(id_rekening);
				// $('#dataModal').hide();
				
			}
		});
	});

	</script>
<?php
}
?>