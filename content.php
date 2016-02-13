<?php
include "pengaturan/koneksi.php";
include "pengaturan/library.php";

$module="";
if (isset($_GET['module'])){
	$module = $_GET['module'];
}

if ($module=='home') {
	echo "<h2>Selamat Datang</h2>
		<p>Selamat datang di Sistem Pakar Diagnosa Kerusakan Pada Handphone.<br>Silahkan Pilih menu disamping untuk mengolah data.</p>
	<p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>";
}

elseif ($module=='password'){
  include "modul/mod_password/password.php";
}

elseif ($module=='diagnosa'){
  include "modul/mod_diagnosa/diagnosa.php";
}

elseif ($module=='kerusakan'){
  include "modul/mod_kerusakan/kerusakan.php";
}

elseif ($module=='solusi'){
  include "modul/mod_solusi/solusi.php";
}

elseif ($module=='pertanyaan'){
  include "modul/mod_pertanyaan/pertanyaan.php";
}

else{
  echo "<h2>Selamat Datang</h2>
		<p>Selamat datang di Sistem Pakar Diagnosa Kerusakan Pada Handphone.<br>Silahkan Pilih menu disamping untuk mengolah data.</p>
	<p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>";
}
?>
