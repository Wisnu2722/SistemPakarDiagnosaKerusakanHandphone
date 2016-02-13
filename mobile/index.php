<?PHP
	error_reporting(0);
	require 'includes/master.inc.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width = device-width, height = device-height, initial-scale=1" >
	<title>Sistem Pakar Diagnosa Kerusakan Handphone</title>
	<link rel="stylesheet" href="jm/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet" href="css/mobile-standard.css" />
	<script type="text/javascript" src="jm/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="jm/costum-scripting.js"></script>
	<script type="text/javascript" src="jm/jquery.mobile-1.0.1.min.js"></script>
</head>
<body>
<div data-role="page">
	<div data-role="header">
		<div id="gambar">
		<img src="images/header.jpg" class="gambar">
		</div>
		<div data-role="navbar">
			<ul>
				<li><a href="index.php" data-theme="b">Beranda</a></li>
			</ul>
			<ul>
				<li><a href="index.php?page=diagnosa" data-theme="b">Diagnosa Kerusakan Handphone</a></li>
			</ul>
			<ul>
				<li><a href="index.php?page=tentang" data-theme="b">Tentang</a></li>
			</ul>
    </div><!-- /navbar -->
	</div><!-- /header -->
		
	<div data-role="content" data-theme="d">	
		<?php 
			if (isset($_GET['page']))
			{
				$pagenya = $_GET['page'];
				if ($pagenya == "diagnosa") 
				{	include "diagnosa.php";
				}
				else if (($pagenya == "diagnosa-show") && ($_GET['id'] != ""))
				{	include "diagnosa-show.php";
				}
				if ($pagenya == "tentang") 
				{	include "tentang.php";
				}
			}
			else
			{	?>
				<p align="justify"><b>Sistem Pakar Diagnosa Kerusakan Handphone</b><br />
Sistem pakar untuk mendiagnosa kerusakan pada handphone. Pengguna dapat memilih menu Diagnosa Kerusakan Handphone untuk memulai menjawab pertanyaan yang akan menghasilkan solusi untuk kerusakan handphone yang dipilih.
</p>
			<?php } ?>
	</div><!-- /content -->

	<div data-role="footer" data-theme="a">
		<center><a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse">Beranda</a></center>
	</div><!-- /footer -->
</div><!-- /page -->
</body>
</html>
