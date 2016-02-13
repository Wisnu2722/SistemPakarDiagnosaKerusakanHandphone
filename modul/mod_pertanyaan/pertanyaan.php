<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.id_pertanyaan.value == "")
{
   alert("ID Pertanyaan tidak boleh kosong !");
   text_form.id_pertanyaan.focus();
   return (false);
}else if (text_form.pertanyaan.value == "")
{
   alert("Pertanyaan tidak boleh kosong !");
   text_form.pertanyaan.focus();
   return (false);
}else if (text_form.ya.value == "")
{
   alert("Pertanyaan 'YA' tidak boleh kosong !");
   text_form.ya.focus();
   return (false);
}else if (text_form.tidak.value == "")
{
   alert("Pertanyaan 'TIDAK' tidak boleh kosong !");
   text_form.tidak.focus();
   return (false);
}
else if (text_form.id_kerusakan.value == "")
{
   alert("ID Kerusakan tidak boleh kosong !");
   text_form.id_kerusakan.focus();
   return (false);
}
return (true);
}
-->
</script>
<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_pertanyaan/aksi_pertanyaan.php";
switch($_GET[act]){
  default:
  $offset=$_GET['offset'];
	//jumlah data yang ditampilkan perpage
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM pertanyaan ORDER BY id");
    echo "<h2>Data Pertanyaan</h2>
          <img src='gambar/tambahdata.png' width='40' height='40' style='cursor:pointer' title='Tambah Pertanyaan' alt='tambah' onclick=\"window.location.href='?module=pertanyaan&act=tambahpertanyaan';\">";
	$baris=mysql_num_rows($tampil);

	if($baris>0){
	echo" <table>
          <tr>
		  <th width=20>No</th>
		  <th width=50>ID Pertanyaan</th>
		  <th width=200>Pertanyaan</th>
		  <th width=50>Ya</th>
		  <th width=50>Tidak</th>
		  <th width=50>ID Kerusakan</th>
		  <th width=50>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM pertanyaan ORDER BY id limit $offset,$limit");
	$no = 1;
	$no = 1 + $offset;
	$warnaGenap = "#B2CCFF";   // warna tua
	$warnaGanjil = "#E0EBFF";  // warna muda
	$counter = 1;
    while ($r=mysql_fetch_array($hasil)){
	if ($counter % 2 == 0) $warna = $warnaGenap;
	else $warna = $warnaGanjil;
       echo "<tr bgcolor='".$warna."'>
			 <td align=center>$no</td>
	         <td align=center>$r[id]</td>
			 <td>$r[pertanyaan]</td>
			 <td align=center>$r[ya]</td>
			 <td align=center>$r[tidak]</td>
			 <td align=center>$r[id_kerusakan]</td>
			 <td align=center><a href=?module=pertanyaan&act=editpertanyaan&id=$r[id]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=pertanyaan&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=pertanyaan&offset=$prevoffset>Back</a></span>";
	}
	else {
		echo "<span class=disabled>Back</span>";//cetak halaman tanpa link
	}
	//hitung jumlah halaman
	$halaman = intval($baris/$limit);//Pembulatan

	if ($baris%$limit){
		$halaman++;
	}
	for($i=1;$i<=$halaman;$i++){
		$newoffset = $limit * ($i-1);
		if($offset!=$newoffset){
			echo "<a href=$PHP_SELF?module=pertanyaan&offset=$newoffset>$i</a>";
			//cetak halaman
		}
		else {
			echo "<span class=current>".$i."</span>";//cetak halaman tanpa link
		}
	}

	//cek halaman akhir
	if(!(($offset/$limit)+1==$halaman) && $halaman !=1){

		//jika bukan halaman terakhir maka berikan next
		$newoffset = $offset + $limit;
		echo "<span class=prevnext><a href=$PHP_SELF?module=pertanyaan&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahpertanyaan":
    echo "<h2>Tambah Data Pertanyaan</h2>
          <form name=text_form method=POST action='$aksi?module=pertanyaan&act=input' onsubmit='return Blank_TextField_Validator()'>
          <table>
          <tr><td>ID Pertanyaan</td>   <td> : <input type=text id='id_pertanyaan' name='id_pertanyaan' size=5></td></tr>
		 <tr><td>Pertanyaan</td>   <td> : <textarea id='pertanyaan' name='pertanyaan' rows=5 cols=50></textarea></td></tr>
		 <tr><td>Ya</td>   <td> : <input type=text id='ya' name='ya' size=5></td></tr>
		 <tr><td>Tidak</td>   <td> : <input type=text id='tidak' name='tidak' size=5></td></tr>
		 <tr><td>Jenis Kerusakan</td>   <td> : <select name='id_kerusakan' id='id_kerusakan'><option value=''>  </option>";
				$hasil4 = mysql_query("SELECT * FROM kerusakan order by id");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[id]'>$r4[jenis_kerusakan]</option>";
		}
		echo	"</select></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;
    
  case "editpertanyaan":
    $edit=mysql_query("SELECT * FROM pertanyaan WHERE id='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "<h2>Edit Data Pertanyaan</h2>
          <form name=text_form method=POST action='$aksi?module=pertanyaan&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[id]'>
          <table>
		  <tr><td>ID Pertanyaan</td> <td> : <input type=text id='id_pertanyaan' name='id_pertanyaan' value=\"$r[id]\" size=5 readonly=readonly></td></tr>
		  <tr><td>Pertanyaan</td> <td> : <textarea id='pertanyaan' name='pertanyaan' rows=5 cols=50>$r[pertanyaan]</textarea></td></tr>
	      <tr><td>Ya</td> <td> : <input type=text id='ya' name='ya' value=\"$r[ya]\" size=5></td></tr>
		  <tr><td>Tidak</td> <td> : <input type=text id='tidak' name='tidak' value=\"$r[tidak]\" size=5></td></tr>
		  <tr><td>Jenis Kerusakan</td> <td> : <select name='id_kerusakan' id='id_kerusakan'>";
				$hasil4 = mysql_query("SELECT * FROM kerusakan order by id");
		while($r4=mysql_fetch_array($hasil4)){
			echo "<option value='$r4[id]'"; if($r[id_kerusakan]==$r4[id]) echo "selected";
			echo ">$r4[jenis_kerusakan]</option>";
		}
		echo	"</select></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
    break;  
}
?>
