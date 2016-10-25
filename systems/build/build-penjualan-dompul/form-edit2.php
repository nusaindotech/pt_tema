	<?php 
		include "../../../auth/autho.php";
		$id=$_POST['id'];
		$query = mysql_query("select id_penjualan_dompul,type_dompul,produk,hp_kios,qty_program from tb_detail_penjualan_dompul where id_detail_penjualan_dompul='$id'") or die(mysql_error());
		$data = mysql_fetch_array($query);
		
		$a2=mysql_query("select a.hp_sales, b.tanggal_input, b.id_penjualan_dompul, b.id_sales
					from tb_penjualan_dompul b, tb_sales a 
					where a.id_sales=b.id_sales and b.id_penjualan_dompul='$data[id_penjualan_dompul]'");
		$row2=mysql_fetch_array($a2);
	?>
					<div class="modal-body">
						<form role="form" action="build/build-penjualan-dompul/update-tipe2.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" value="<?php echo $id;?>" name="No_User">
                           <div class="control-group">
                                <label class="control-label">Tipe Dompul</label>
                                <div class="controls">
									<input type="hidden" name="id_detail_penjualan_dompul" value="<?php echo $id; ?>" >
									<input type="hidden" name="hp_kios" value="<?php echo $data['hp_kios']; ?>" >
									<input type="hidden" name="hp_sales" value="<?php echo $row2['hp_sales']; ?>" >
									<input type="hidden" name="tanggal_input" value="<?php echo $row2['tanggal_input']; ?>" >
									<input type="hidden" name="id_penjualan_dompul" value="<?php echo $row2['id_penjualan_dompul']; ?>" >
									<input type="hidden" name="id_sales" value="<?php echo $row2['id_sales']; ?>" >
									<select class="chosen-select form-control" id="form-field-select-3" name="tipedompul" style="width:300px;" >
										<option value="">--Pilih Tipe Dompul--</option>
											<?php
											$query=mysql_query("select * 
																from tb_dompul
																where nama_dompul='$data[produk]'");
											while($row=mysql_fetch_array($query))
											{
												if( $row['type_dompul']==$data['type_dompul'])
												{
											?>
													<option value="<?php  echo $row['type_dompul']; ?>" selected><?php  echo $row['nama_dompul']; ?> | <?php  echo $row['type_dompul']; ?> | <?php  echo $row['harga_dompul']; ?></option>
											<?php
												}
												else
												{
											?>
													<option value="<?php  echo $row['type_dompul']; ?>"><?php  echo $row['nama_dompul']; ?> | <?php  echo $row['type_dompul']; ?> | Harga Rp. <?php  echo $row['harga_dompul']; ?></option>
											<?php
												}
											}
											?>	
									</select>
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Qty Program</label>
                                <div class="controls">
									<input type="text" name="qty_program" value="<?php echo $data['qty_program']; ?>" autocomplete="off">
								</div>
                            </div>
							<br>
							<div class="form-actions" align="right">
								<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
								<button type="submit" class="btn btn-success">Ubah Data Invoice</button>
							</div>
                        </form>