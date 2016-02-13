<?php
session_start();
include "../../pengaturan/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus kerusakan
if ($module=='kerusakan' AND $act=='hapus'){
  mysql_query("DELETE FROM kerusakan WHERE id='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input kerusakan
elseif ($module=='kerusakan' AND $act=='input'){
$id_kerusakan=mysql_real_escape_string($_POST[id_kerusakan]);
$jenis_kerusakan=mysql_real_escape_string($_POST[jenis_kerusakan]);
$pertanyaan_awal=mysql_real_escape_string($_POST[pertanyaan_awal]);
mysql_query("INSERT INTO kerusakan(
							id,
							jenis_kerusakan,
							pertanyaan_awal) 
	                    VALUES(
							'$id_kerusakan',
							'$jenis_kerusakan',
							'$pertanyaan_awal')");
  header('location:../../index.php?module='.$module);
}

// Update kerusakan
elseif ($module=='kerusakan' AND $act=='update'){
$id_kerusakan=mysql_real_escape_string($_POST[id_kerusakan]);
$jenis_kerusakan=mysql_real_escape_string($_POST[jenis_kerusakan]);
$pertanyaan_awal=mysql_real_escape_string($_POST[pertanyaan_awal]);
  mysql_query("UPDATE kerusakan SET
							jenis_kerusakan   = '$jenis_kerusakan',
							pertanyaan_awal   = '$pertanyaan_awal'
                           WHERE id       = '$_POST[id]'");
  header('location:../../index.php?module='.$module);
 }
 
?>