<?php
session_start();
include "pengaturan/koneksi.php";

$pass=md5($_POST['password']);
$login=mysql_query("select * from users where username='".$_POST['username']."' and password='".$pass."'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($ketemu>0) {
	
	$_SESSION['username']     = $r['username'];
  	$_SESSION['password']     = $r['password'];
	$_SESSION['level']     	= $r['level'];
	
	header("location: index.php");
}
else{
  echo "<link href=pengaturan/style.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda salah.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>