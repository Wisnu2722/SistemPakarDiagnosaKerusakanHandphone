<?php
switch($_GET[act]){
default:
echo "<h2>Update Password Administrator</h2>
		<form method='post' action='?module=password&act=updatepassword'>
		<table>
		<tr><td>Masukkan password lama</td><td><input type='password' name='oldPass' /></td></tr>
		<tr><td>Masukkan password baru</td><td><input type='password' name='newPass1' /></td></tr>
		<tr><td>Masukkan kembali password baru</td><td><input type='password' name='newPass2' /></td></tr>
		<tr><td></td><td>
		<input type=image src=gambar/save.png name=submit width='40' height='40' title='Simpan' alt='Simpan'>
		<input type='hidden' name='pass' value='".$_SESSION[password]."'>
		<input type='hidden' name='nama' value='".$_SESSION[username]."'></td></tr>
		</table>		
		</form>";
break;

case "updatepassword":


$pengacak = $_POST['pass'];

include "pengaturan/koneksi.php";

$user = $_POST['nama'];
$passwordlama = $_POST['oldPass'];
//$passwordlama=md5($_POST[oldpass]);
$passwordbaru1 = $_POST['newPass1'];
$passwordbaru2 = $_POST['newPass2'];


// cek benar tidaknya password yang lama

$query = "SELECT * FROM users WHERE username = '$user'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);

//if ($data['password'] == md5($pengacak.md5($passwordlama).$pengacak))
if ($data['password'] ==  md5($passwordlama))
{
	// jika password lama benar, maka cek kesesuaian password baru 1 dan 2
	if ($passwordbaru1 == $passwordbaru2)
	{
		// jika password baru 1 dan 2 sama, maka proses update password dilakukan
		
		// enkripsi password baru
		
		//$passwordbaruenkrip = md5($pengacak.md5($passwordbaru1.$pengacak));
		$passwordbaruenkrip = md5($passwordbaru1);
		
		$query = "UPDATE users SET password = '$passwordbaruenkrip' WHERE username = '$user' ";
		$hasil = mysql_query($query);
		
		if ($hasil) echo "Update password sukses";
		//header('location:main.php?module=password');
	}
	else echo "Password baru Anda tidak sama";
}
else echo "Password lama Anda salah";
break;
}
?>