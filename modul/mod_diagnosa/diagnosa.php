<?php

$act="";
if (isset($_GET['act'])){
	$act = $_GET['act'];
}

switch($act){

  default:
	echo "<h2>Pilih Jenis Kerusakan</h2>";
	
  $tampil=mysql_query("SELECT * FROM kerusakan ORDER BY id");
	$baris=mysql_num_rows($tampil);
	if($baris>0){
	echo "<div id='diagnosa'>";
	echo "<br><ul>";
	while ($r=mysql_fetch_array($tampil)){
		echo "<li><a href='?module=diagnosa&act=pertanyaan&id=$r[pertanyaan_awal]'>$r[jenis_kerusakan]</a></li>";
	}
	echo "</ul></div>";
	
	}else{
	echo "<br><b>Data Jenis Kerusakan Kosong !</b>";
	}
    break;
	
	case "pertanyaan":
	$id = $_GET['id'];
	if($id[0]=='T'){
		$sql=mysql_query("SELECT * FROM pertanyaan WHERE id='$id'");
		$r=mysql_fetch_array($sql);
		echo "<table>
				<tr><td rowspan=2>Pertanyaan</td><td width=200 colspan=2>$r[pertanyaan]</td></tr>
				<tr><td align=center><a href='?module=diagnosa&act=pertanyaan&id=$r[ya]'>Ya</a></td><td align=center><a href='?module=diagnosa&act=pertanyaan&id=$r[tidak]'>Tidak</a></td></tr>
				</table>";
		
	}else if($id[0]=='S'){
		$sql=mysql_query("SELECT * FROM solusi WHERE id='$id'");
		$r=mysql_fetch_array($sql);
		echo "<table>
				<tr><td>Solusi</td><td width=200 colspan=2>$r[solusi]</td></tr>
				</table>";
	}
     break;
    
}
?>
