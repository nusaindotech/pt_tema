<?php
	
	$hp_kios		=$_POST['hp_kios'];
	$hp_sales		=$_POST['hp_sales'];
	$tanggal_input	=$_POST['tanggal_input'];

	include "../../auth/autho.php";
	session_start();
	$_SESSION['id_bo'];

	$output = 'Upload Tanggal ';
	$no = 1;
	$query = mysql_query("SELECT * FROM tb_upload_rekening WHERE tanggal_input");
	$query1 = mysql_query("select tb_upload_rekening.id_rekening, tb_upload_rekening.tanggal, tb_bank.nama_bank, tb_upload_rekening.keterangan, tb_upload_rekening.nominal, tb_upload_rekening.pengakuan  from tb_bank inner join tb_upload_rekening on tb_bank.id_bank = tb_upload_rekening.id_bank WHERE tanggal_input;");

		$tampil3=mysql_query("SELECT hp_kios, nama_kios
		FROM tb_upload_dompul
		WHERE hp_sales = '$canvaser' and status_bayar_dompul='0' and tanggal_transaksi='$tanggal_input'
		GROUP BY nama_kios
		ORDER BY nama_kios");
		$no=1;
		$nomor=1;
		$jumlahtotal=0;
		while($row3=mysql_fetch_array($tampil3))
		{
		$a5=mysql_query("SELECT count(no_upload_dompul) as tot from tb_upload_dompul where hp_kios='$row3[hp_kios]' and tanggal_transaksi='$tanggal_input' ");
		$row5=mysql_fetch_array($a5);
		$jumlahtotal=$jumlahtotal+$row5['tot'];
		}
		?>
				<div class="table-responsive">
					<form action="../dash.php?hp=checkout-dompul&tanggal_input=<?php echo $tanggal_input; ?>&hp_kios=<?php echo $row3['hp_kios']; ?>&hp_sales=<?php echo $canvaser; ?>"" method="POST">
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
				<td><?php echo $no ?></td>
				<td data-date-format="yyyy-mm-dd"><?php echo $row['tanggal'] ?></td>
				<td><?php echo $row['nama_bank'] ?></td>
				<td><?php echo $row['keterangan'] ?></td>
				<td><?php echo $row['nominal'] ?></td>
				<td><input type="checkbox" class="giftsRosesCheckBox" id="cek" name="cekku[]" value="'.$row['nominal'].'"></td>
				<input type="hidden" name="hp_kios" class="form-control" value="<?php echo $hp_kios; ?>">
				<input type="hidden" name="hp_sales" class="form-control" value="<?php echo $hp_sales; ?>">
				<input type="hidden" name="tanggal_input" class="form-control" value="<?php echo $tanggal_input; ?>">
				<input type="hidden" name="id_ho" class="form-control" value="<?php echo $_SESSION[id_ho]; ?>">
				<input type="hidden" name="id_bo" class="form-control" value="<?php echo $_SESSION[id_bo]; ?>">
				<input type="hidden" name="No_User" class="form-control" value="<?php echo $_SESSION[No_User]; ?>">
				
			</tr>
	<?php
		$no++;
	}
	?></table>
	<button type="submit" class="btn btn-danger" data-dismiss="modal">Simpan</button>
	</form></div>


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
					var total1 = $('input').val();
					$('#jumlahtransfer22').html(data);
					alert(data);

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