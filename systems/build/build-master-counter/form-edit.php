	<?php 
		include "../../../auth/autho.php";
		session_start();
		$id		= $_POST['id'];
		$id2	= $_POST['id2'];
		$level	= $_SESSION['level'];
		$query  = mysql_query("select * from tb_kios where id_kios='$id'") or die(mysql_error());
		$data   = mysql_fetch_array($query);
	?>
		
		
		<script type="text/javascript">
		var htmlobjek;
		$(document).ready(function(){
		  //apabila terjadi event onchange terhadap object <select id=ho>
		  $("#ho").change(function(){
			var ho = $("#ho").val();
			$.ajax({
				url: "ambilbo.php",
				data: "ho="+ho,
				cache: false,
				success: function(msg){
					//jika data sukses diambil dari server kita tampilkan
					//di <select id=bo>
					$("#bo").html(msg);
				}
			});
		  });

		});
		</script>
					<div class="modal-body">
						<form role="form" action="build/build-master-counter/update-counter.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" value="<?php echo $id;?>" name="id_kios">
                           <div class="control-group">
                                <label class="control-label">Nama Counter</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="nama_kios" placeholder="Isikan Kios" required="require" 
									value="<?php echo $data['nama_kios'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">HO</label>
                                <div class="controls">
                                    <select class="form-control" name="ho" style="width:200px;" id="ho" required>
									<option value="">--Pilih HO--</option>
										<?php
										if($level=='admin')
										{
										$query=mysql_query("select * from tb_ho ORDER BY nama_ho ASC");
										}
										else
										{
										$query=mysql_query("select * from tb_ho where id_ho ='$id2' ORDER BY nama_ho ASC");
										}
										
										while($row=mysql_fetch_array($query))
										{
											if($data['id_ho']==$row['id_ho'])
											{
											?>
											<option value="<?php  echo $row['id_ho']; ?>" selected><?php  echo $row['nama_ho']; ?></option><?php
											}
											else
											{
										?>
										<option value="<?php  echo $row['id_ho']; ?>"><?php  echo $row['nama_ho']; ?></option><?php
											}
										}
											?>
									</select>
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">BO</label>
                                <div class="controls">
                                   <select class="form-control" name="bo" style="width:200px;" id="bo" >
									<option value="">--Pilih BO--</option>
										<?php 													
										$query=mysql_query("select * from tb_bo ORDER BY nama_bo ASC");
										while($row=mysql_fetch_array($query))
										{
											if($data['id_bo']==$row['id_bo'])
											{
											?>
											<option value="<?php  echo $row['id_bo']; ?>" selected><?php  echo $row['nama_bo']; ?></option><?php
											}
											else
											{
										?>
										<option value="<?php  echo $row['id_bo']; ?>"><?php  echo $row['nama_bo']; ?></option><?php
											}
										}
											?>
									</select>
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Alamat</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="alamat" placeholder="Isikan Alamat"  
									value="<?php echo $data['alamat_kios'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Telepon</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="telepon_kios" placeholder="Isikan Telepon"  
									value="<?php echo $data['telepon_kios'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">HP</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="hp_kios" placeholder="Isikan HP" required="require" 
									value="<?php echo $data['hp_kios'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="email" placeholder="Isikan Email"
									value="<?php echo $data['email_kios'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <select class="form-control" name="status" style="width:200px;" id="bo" required>
									<?php
										if($data['status_kios']=='0')
										{
									?>
										<option value="">--Pilih Status--</option>
										<option value="0" selected>Tidak Aktif</option>
										<option value="1">Aktif</option>
									<?php
										}
										else if ($data['status_kios']=='1')
										{
									?>
										<option value="">--Pilih Status--</option>
										<option value="0">Tidak Aktif</option>
										<option value="1" selected>Aktif</option>
									<?php		
										}
										else
										{
									?>
										<option value="">--Pilih Status--</option>
										<option value="0">Tidak Aktif</option>
										<option value="1">Aktif</option>
									<?php		
										}
									?>
										
									</select>
								</div>
                            </div>
							<br>
							<div class="form-actions" align="right">
								<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
								<button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan menyimpan ?');">Simpan</button>
							</div>
                        </form> 