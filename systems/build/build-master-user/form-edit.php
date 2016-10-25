	<?php 
		include "../../../auth/autho.php";
		$id=$_POST['id'];
		$query = mysql_query("select * from users where No_User='$id'") or die(mysql_error());
		$data = mysql_fetch_array($query);
	?>
					<div class="modal-body">
						<form role="form" action="build/build-master-user/update-user.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<input type="hidden" value="<?php echo $id;?>" name="No_User">
                           <div class="control-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
									<input type="hidden" name="no_user" value="<?php echo $id; ?>" >
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="username" placeholder="Isikan Username" required="require" 
									value="<?php echo $data['username'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="Isikan Username">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Nama Lengkap</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="nama_lengkap" placeholder="Isikan Username" required="require" 
									value="<?php echo $data['nama_lengkap'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="form-control" id="exampleInputPassword3" name="email" placeholder="Isikan Username" required="require" 
									value="<?php echo $data['email'];?>">
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">HO</label>
                                <div class="controls">
                                    <select class="form-control" name="ho" id="ho" required>
									<option value="">--Pilih HO--</option>
										<?php 													
										$query=mysql_query("select * from tb_ho ORDER BY nama_ho ASC");
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
                                   <select class="form-control" name="bo" id="bo" required>
									<option value="">--Pilih bO--</option>
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
                                <label class="control-label">Hak Akses</label>
                                <div class="controls">
                                <select class="form-control" name="hak_akses" required>
									<?php
										if($data['hak_akses']=='1')
										{
									?>
										<option value="">--Pilih Hak Akses--</option>
										<option value="1" selected>HQ</option>
										<option value="2">HO</option>
										<option value="3">BO</option>
									<?php
										}
										else if ($data['hak_akses']=='2')
										{
									?>
										<option value="">--Pilih Hak Akses--</option>
										<option value="1">HQ</option>
										<option value="2" selected>HO</option>
										<option value="3">BO</option>
									<?php		
										}
										else if ($data['hak_akses']=='3')
										{
									?>
										<option value="">--Pilih Hak Akses--</option>
										<option value="1">HQ</option>
										<option value="2">HO</option>
										<option value="3" selected>BO</option>
									<?php		
										}
										else
										{
									?>
										<option value="" selected>--Pilih Hak Akses--</option>
										<option value="1">HQ</option>
										<option value="2">HO</option>
										<option value="3">BO</option>
									<?php		
										}
									?>
									</select>
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Level</label>
                                <div class="controls">
								<select class="form-control" name="level" required>
									<?php
										if($data['level']=='admin')
										{
									?>
										<option value="">--Pilih Level--</option>
										<option value="admin" selected>Admin</option>
										<option value="penjualan">Penjualan</option>
										<option value="pembelian">Pembelian</option>
										<option value="keuangan">keuangan</option>
										<option value="head">Head</option>
									<?php
										}
										else if ($data['level']=='penjualan')
										{
									?>
										<option value="">--Pilih Level--</option>
										<option value="admin">Admin</option>
										<option value="penjualan" selected>Penjualan</option>
										<option value="pembelian">Pembelian</option>
										<option value="keuangan">keuangan</option>
										<option value="head">Head</option>
									<?php		
										}
										else if ($data['level']=='pembelian')
										{
									?>
										<option value="">--Pilih Level--</option>
										<option value="admin">Admin</option>
										<option value="penjualan">Penjualan</option>
										<option value="pembelian" selected>Pembelian</option>
										<option value="keuangan">keuangan</option>
										<option value="head">Head</option>
									<?php		
										}
										else if ($data['level']=='keuangan')
										{
									?>
										<option value="">--Pilih Level--</option>
										<option value="admin">Admin</option>
										<option value="penjualan">Penjualan</option>
										<option value="pembelian">Pembelian</option>
										<option value="keuangan" selected>keuangan</option>
										<option value="head">Head</option>
									<?php		
										}
										else if ($data['level']=='head')
										{
									?>
										<option value="">--Pilih Level--</option>
										<option value="admin">Admin</option>
										<option value="penjualan">Penjualan</option>
										<option value="pembelian">Pembelian</option>
										<option value="keuangan">keuangan</option>
										<option value="head" selected>Head</option>
									<?php		
										}
										else
										{
									?>
										<option value="" selected>--Pilih Level--</option>
										<option value="admin">Admin</option>
										<option value="penjualan">Penjualan</option>
										<option value="pembelian">Pembelian</option>
										<option value="persediaan">Persediaan</option>
										<option value="keuangan">keuangan</option>
										<option value="head">Head</option>
									<?php		
										}
									?>
									</select>
								</div>
                            </div>
							<div class="control-group">
                                <label class="control-label">Blokir</label>
                                <div class="controls">
                                   <select class="form-control" name="blokir" required>
									<?php
										if($data['blokir']=='N')
										{
									?>
										<option value="">--Pilih Blokir--</option>
										<option value="N" selected>N</option>
										<option value="Y">Y</option>
									<?php
										}
										else if ($data['blokir']=='y')
										{
									?>
										<option value="">--Pilih Blokir--</option>
										<option value="N">N</option>
										<option value="Y" selected>Y</option>
									<?php		
										}
										else
										{
									?>
										<option value="" selected>--Pilih Blokir--</option>
										<option value="N">N</option>
										<option value="Y">Y</option>
									<?php		
										}
									?>
									</select>
								</div>
                            </div>
							
							<br>
							<div class="form-actions" align="right">
								<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
								<button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan melanjutkannya ?');">Simpan</button>
							</div>
                        </form>