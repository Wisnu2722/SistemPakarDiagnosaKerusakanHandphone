<script Language="JavaScript">
<!-- 
function Blank_TextField_Validator()
{
if (text_form.id_kerusakan.value == "")
{
   alert("ID Kerusakan tidak boleh kosong !");
   text_form.id_kerusakan.focus();
   return (false);
}else if (text_form.jenis_kerusakan.value == "")
{
   alert("Jenis Kerusakan tidak boleh kosong !");
   text_form.jenis_kerusakan.focus();
   return (false);
}else if (text_form.pertanyaan_awal.value == "")
{
   alert("Pertanyaan Awal tidak boleh kosong !");
   text_form.pertanyaan_awal.focus();
   return (false);
}
return (true);
}
-->
</script>
<?php
include "pengaturan/fungsi_alert.php";
$aksi="modul/mod_kerusakan/aksi_kerusakan.php";
$act="";
if (isset($_GET['act'])){
	$act = $_GET['act'];
}

switch($act){
  default:
  $offset=$_GET['offset'];
	//jumlah data yang ditampilkan perpage
	$limit = 10;
	if (empty ($offset)) {
		$offset = 0;
	}
  $tampil=mysql_query("SELECT * FROM kerusakan ORDER BY id");
    echo "<h2>Data Jenis Kerusakan</h2>
          <img src='gambar/tambahdata.png' width='40' height='40' style='cursor:pointer' title='Tambah Jenis Kerusakan' alt='tambah' onclick=\"window.location.href='?module=kerusakan&act=tambahkerusakan';\">";
	$baris=mysql_num_rows($tampil);

	if($baris>0){
	echo" <table>
          <tr>
		  <th width=20>No</th>
		  <th width=50>ID Kerusakan</th>
		  <th width=350>Jenis Kerusakan</th>
		  <th width=50>Pertanyaan Awal</th>
		  <th width=50>Aksi</th>
		  </tr>"; 
	$hasil = mysql_query("SELECT * FROM kerusakan ORDER BY id limit $offset,$limit");
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
			 <td>$r[jenis_kerusakan]</td>
			 <td align=center>$r[pertanyaan_awal]</td>
			 <td align=center><a href=?module=kerusakan&act=editkerusakan&id=$r[id]><img src='gambar/edit.png' title='Edit' alt='Edit' width='14' height='14'></a> &nbsp;
	               <a href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=kerusakan&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><img src='gambar/hapus.png' title='Hapus' alt='Hapus' width='14' height='14'></a>
				   
             </td></tr>";
      $no++;
	  $counter++;
    }
    echo "</table>";
	echo "<div class=paging>";

	if ($offset!=0) {
		$prevoffset = $offset-10;
		echo "<span class=prevnext> <a href=$PHP_SELF?module=kerusakan&offset=$prevoffset>Back</a></span>";
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
			echo "<a href=$PHP_SELF?module=kerusakan&offset=$newoffset>$i</a>";
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
		echo "<span class=prevnext><a href=$PHP_SELF?module=kerusakan&offset=$newoffset>Next</a>";
	}
	else {
		echo "<span class=disabled>Next</span>";//cetak halaman tanpa link
	}
	
	echo "</div>";
	}else{
	echo "<br><b>Data Kosong !</b>";
	}
    break;
  
  case "tambahkerusakan":
    echo "<h2>Tambah Data Jenis Kerusakan</h2>
          <form name=text_form method=POST action='$aksi?module=kerusakan&act=input' onsubmit='return Blank_TextField_Validator()'>
          <table>
          <tr><td>ID Kerusakan</td>   <td> : <input type=text id='id_kerusakan' name='id_kerusakan' size=5></td></tr>
		 <tr><td>Jenis Kerusakan</td>   <td> : <textarea id='jenis_kerusakan' name='jenis_kerusakan' rows=5 cols=50></textarea></td></tr>
		 <tr><td>Pertanyaan Awal</td>   <td> : <input type=text id='pertanyaan_awal' name='pertanyaan_awal' size=5></td></tr>
		  <tr><td colspan=2><input type=image src=gambar/simpan.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
     break;
    
  case "editkerusakan":
    $edit=mysql_query("SELECT * FROM kerusakan WHERE id='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "<h2>Edit Data Jenis Kerusakan</h2>
          <form name=text_form method=POST action='$aksi?module=kerusakan&act=update' onsubmit='return Blank_TextField_Validator()'>
          <input type=hidden name=id value='$r[id]'>
          <table>
		  <tr><td>ID Kerusakan</td> <td> : <input type=text id='id_kerusakan' name='id_kerusakan' value=\"$r[id]\" size=5 readonly=readonly></td></tr>
		  <tr><td>Jenis Kerusakan</td> <td> : <textarea id='jenis_kerusakan' name='jenis_kerusakan' rows=5 cols=50>$r[jenis_kerusakan]</textarea></td></tr>
	      <tr><td>Pertanyaan Awal</td> <td> : <input type=text id='pertanyaan_awal' name='pertanyaan_awal' value=\"$r[pertanyaan_awal]\" size=5></td></tr>
          <tr><td colspan=2><input type=image src=gambar/update.png name=submit width='40' height='40' title='Update' alt='Update'>
							<img src=gambar/batal.png style='cursor:pointer' width='40' height='40' title='Batal' alt='Batal' onclick=self.history.back() ></td></tr>
          </table></form>";
    break;  
}
?>
