<?php
	include "../../../auth/autho.php";
	$nama 	 	 = $_POST['nama'];
	$username 	 = $_POST['username'];
	$password 	 = md5($_POST['password']);
	$email 		 = $_POST['email'];
	$ho 		 = $_POST['ho'];
	$bo			 = $_POST['bo'];
	$hak_akses 	 = $_POST['hak_akses'];
	$level 	 	 = $_POST['level'];
	$blokir 	 = $_POST['blokir'];

	if(empty($username))
	{	
		die("Isikan Username!");
	}
	else
	{
		$ast=mysql_query("select count(no_user) as total from users");
		$row=mysql_fetch_array($ast);
		$koder=$row['total'];
		$id=$koder+1;
		
		$query1 ="INSERT INTO users(No_User,
									   id_ho,
									   id_bo,
									   username,
									   password,
									   nama_lengkap,
									   email,
									   hak_akses,
									   level,
									   blokir) 
							   VALUES('$id',
									  '$ho',
									  '$bo',
									  '$username',
									  '$password',
									  '$nama',
									  '$email',
									  '$hak_akses',
									  '$level',
									  '$blokir')";

		mysql_query($query1) or die("Gagal menyimpan data user");
		header('location:../../dash.php?hp=master-user');
	}
?>