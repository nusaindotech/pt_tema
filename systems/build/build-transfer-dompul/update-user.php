<?php
include "../../../auth/autho.php";

$no_user =$_POST['no_user'];
$username =$_POST['username'];
$password 	 = md5($_POST['password']);
$nama_lengkap =$_POST['nama_lengkap'];
$email =$_POST['email'];
	
	$query1 ="UPDATE users SET 
	username='$username',
	password='$password',
	nama_lengkap='$nama_lengkap',
	email='$email'
	WHERE No_User='$no_user'";
								
	mysql_query($query1) or die("Gagal memperbarui data user");
	header("location:../../dash.php?hp=master-user");
?>