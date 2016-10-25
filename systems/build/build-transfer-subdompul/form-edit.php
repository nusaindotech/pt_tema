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
                                    <input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="Isikan Username" required="require" 
									value="<?php echo $data['password'];?>">
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
							<br>
							<div class="form-actions" align="right">
								<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tutup</button>
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
                        </form>