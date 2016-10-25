	<?php 
		include "../../../auth/autho.php";
		$id=$_POST['id'];
		$query = mysql_query("select * from tb_dompul where id_dompul='$id'") or die(mysql_error());
		$data = mysql_fetch_array($query);
	?>
					<div class="modal-body">
						<form role="form" action="build/build-master-hargadompul/update-hargadompul.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" value="<?php echo $id;?>" name="No_User">
                           <div class="control-group">
                                <label class="control-label">Dompul</label>
                                <div class="controls">
									<input type="hidden" name="id_dompul" value="<?php echo $id; ?>" >
                                    <select class="form-control" name="dompul" required>
									<option value="">--Pilih Dompul--</option>
									<?php 													
									$query=mysql_query("select distinct(nama_dompul) as nama from tb_dompul");
									while($row=mysql_fetch_array($query))
									{
										if($row['nama']==$data['nama_dompul'])
										{
									?>
										<option value="<?php  echo $row['nama']; ?>" selected><?php  echo $row['nama']; ?></option>
									<?php
										}
										else
										{
									?>
										<option value="<?php  echo $row['nama']; ?>"><?php  echo $row['nama']; ?></option>
									<?php		
										}
									?>
									<option value="<?php  echo $row['nama']; ?>"><?php  echo $row['nama']; ?></option>
									<?php
									}
									?>											
								</select>
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Type</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="type_dompul" placeholder="Type Dompul" required="require" 
									value="<?php echo $data['type_dompul'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Harga</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="harga_dompul" placeholder="Harga Dompul" required="require" 
									value="<?php echo $data['harga_dompul'];?>">
								</div>
                            </div>
							<br>
							<div class="form-actions" align="right">
								<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
								<button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan menyimpannya ?');">Simpan</button>
							</div>
                        </form>