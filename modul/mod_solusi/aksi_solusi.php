<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus solusi
if ($module=='solusi' AND $act=='hapus'){
  mysql_query("DELETE FROM solusi WHERE id='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input solusi
elseif ($module=='solusi' AND $act=='input'){
$id_solusi=mysql_real_escape_string($_POST[id_solusi]);
$solusi=mysql_real_escape_string($_POST[solusi]);
mysql_query("INSERT INTO solusi(
							id,
							solusi) 
	                    VALUES(
							'$id_solusi',
							'$solusi')");
  header('location:../../index.php?module='.$module);
}

// Update solusi
elseif ($module=='solusi' AND $act=='update'){
$id_solusi=mysql_real_escape_string($_POST[id_solusi]);
$solusi=mysql_real_escape_string($_POST[solusi]);
  mysql_query("UPDATE solusi SET
							solusi   = '$solusi'
                           WHERE id       = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>