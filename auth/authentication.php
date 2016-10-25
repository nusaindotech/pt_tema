<?php
include "autho.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Warning!!! Hacker!!!! Please Move On!!!!!";
}
else{
$login=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
if ($ketemu > 0){
  session_start();

  $_SESSION[No_User]      = $r[No_User];
  $_SESSION[id_ho]    	  = $r[id_ho];
  $_SESSION[id_bo]    	  = $r[id_bo];
  $_SESSION[namauser]     = $r[username];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[level]   	  = $r[level];
  $_SESSION[nama_lengkap] = $r[nama_lengkap];
  $_SESSION[hak_akses] 	  = $r[hak_akses];
  

	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();

  mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
  header('location:../systems/dash.php?hp=home');
}
else{
  echo " <script> document.location.href='../'; </script> ";
}
}
?>