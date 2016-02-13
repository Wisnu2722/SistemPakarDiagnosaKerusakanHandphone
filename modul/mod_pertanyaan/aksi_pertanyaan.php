<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus pertanyaan
if ($module=='pertanyaan' AND $act=='hapus'){
  mysql_query("DELETE FROM pertanyaan WHERE id='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input pertanyaan
elseif ($module=='pertanyaan' AND $act=='input'){
$id_pertanyaan=mysql_real_escape_string($_POST[id_pertanyaan]);
$pertanyaan=mysql_real_escape_string($_POST[pertanyaan]);
$ya=mysql_real_escape_string($_POST[ya]);
$tidak=mysql_real_escape_string($_POST[tidak]);
$id_kerusakan=mysql_real_escape_string($_POST[id_kerusakan]);
mysql_query("INSERT INTO pertanyaan(
							id,
							pertanyaan,
							ya,
							tidak,
							id_kerusakan) 
	                    VALUES(
							'$id_pertanyaan',
							'$pertanyaan',
							'$ya',
							'$tidak',
							'$id_kerusakan')");
  header('location:../../index.php?module='.$module);
}

// Update pertanyaan
elseif ($module=='pertanyaan' AND $act=='update'){
$id_pertanyaan=mysql_real_escape_string($_POST[id_pertanyaan]);
$pertanyaan=mysql_real_escape_string($_POST[pertanyaan]);
$ya=mysql_real_escape_string($_POST[ya]);
$tidak=mysql_real_escape_string($_POST[tidak]);
$id_kerusakan=mysql_real_escape_string($_POST[id_kerusakan]);
  mysql_query("UPDATE pertanyaan SET
							pertanyaan   = '$pertanyaan',
							ya   = '$ya',
							tidak   = '$tidak',
							id_kerusakan   = '$id_kerusakan'
                           WHERE id       = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>