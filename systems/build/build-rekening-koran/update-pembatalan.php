<?php 
	include "../../../auth/autho.php";

	$id_rekening = $_POST['batal'];
	var_dump($_POST['batal']);

	if (isset($_POST['batal'])) {
		
		$sql = "UPDATE `tb_upload_rekening` SET 
		`no_user`='0',
		`tanggal_pengakuan`='0000-00-00',
		`isstatus`='0',
		`id_penjualan_dompul` = '0'
		WHERE `id_rekening`= $id_rekening ";
		mysql_query($sql) or die("Gagal menyimpan data Rekening");

		header("Location: http://127.0.0.1/pttema/systems/dash.php?hp=list-rekening");

	}
?>