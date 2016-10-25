	<?php 
		include "../../../auth/autho.php";
		$id=$_POST['id'];
		$id2=$_POST['id2'];
		$query = mysql_query("select type_dompul,produk,hp_kios,qty_program,hp_sales,tanggal_transaksi from tb_upload_dompul where no_upload_dompul='$id'") or die(mysql_error());
		$data = mysql_fetch_array($query);
	?>
					<div class="modal-body">
						<form role="form" action="build/build-penjualan-dompul/update-tipe.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" value="<?php echo $id;?>" name="No_User">
                           <div class="control-group">
                                <label class="control-label">Tipe Dompul</label>
                                <div class="controls">
									<input type="hidden" name="no_upload_dompul" value="<?php echo $id; ?>" >
									<input type="hidden" name="hp_kios" value="<?php echo $data['hp_kios']; ?>" >
									<input type="hidden" name="hp_sales" value="<?php echo $data['hp_sales']; ?>" >
									<input type="hidden" name="tanggal_input" value="<?php echo $data['tanggal_transaksi']; ?>" >
									<select class="chosen-select form-control" id="form-field-select-3" name="tipedompul" style="width:300px;" >
										<option value="">--Pilih Tipe Dompul--</option>
											<?php
											if($id2=='head')
											{
												
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
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
                        </form>