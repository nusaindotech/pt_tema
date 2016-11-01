<?php

if (isset($_POST['tanggal_input'])) {
	
	include "../../../auth/autho.php";

	$output = 'Upload Tanggal '.$_POST["tanggal_input"].'';
	$no = 1;
	$query = mysql_query("SELECT * FROM tb_upload_rekening WHERE tanggal_input");
	$query1 = mysql_query("select tb_upload_rekening.id_rekening, tb_upload_rekening.tanggal, tb_bank.nama_bank, tb_upload_rekening.keterangan, tb_upload_rekening.nominal, tb_upload_rekening.pengakuan  from tb_bank inner join tb_upload_rekening on tb_bank.id_bank = tb_upload_rekening.id_bank WHERE tanggal_input = '".$_POST["tanggal_input"]."'");
	$output .= '<div class="table-responsive">
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
						<tbody>';
	while ($row = mysql_fetch_array($query1)) {
		$output .= '
			<tr>
				<td>'.$no.'</td>
				<td data-date-format="yyyy-mm-dd">'.$row[1].'</td>
				<td>'.$row[2].'</td>
				<td>'.$row[3].'</td>
				<td>'.$row[4].'</td>
				<td><input type="checkbox" name="check_list[]" value="value 1"></td>
			</tr>

		';
		$no++;
	}
	$output .="</table></div>";
	echo $output;
	var_dump($_POST['tanggal_input']);

}
?>