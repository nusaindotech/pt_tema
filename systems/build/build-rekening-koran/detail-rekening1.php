<?php

if (isset($_POST['tanggal_input'])) {
	
	include "../../../auth/autho.php";
	session_start();
	$_SESSION['id_bo'];

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
				<form action="build/build-penjualan-dompul/tambah-penjualan-dompul3.php" method="POST">
				<td>'.$no.'</td>
				<td data-date-format="yyyy-mm-dd">'.$row[1].'</td>
				<td>'.$row[2].'</td>
				<td>'.$row[3].'</td>
				<td>'.$row[4].'</td>
				<td><input type="checkbox" class="giftsRosesCheckBox" name="cekku[]" value="'.$row['nominal'].'"></td>
				
			</tr>

		';
		$no++;
	}
	$output .='</table></div>
	<div class="modal-footer">
				<button type="submit" class="btn btn-danger" data-dismiss="modal">Simpan</button>
				</form>';
	echo $output;
?>


	<script type='text/javascript'>
        $('button').bind('click', function (e) {
            var total = 0;
            $(':checkbox:checked.giftsRosesCheckBox').each(function () {
                total += +this.value;
            });
            alert(total);

            $.ajax({
				url:"build/build-penjualan-dompul/tambah-penjualan-dompul3.php",
				type: "POST",
				data:{total:total},
				success:function (data) {
					$('#jumlahtransfer').html(total);
					console.log(data); // cek data NULL
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
