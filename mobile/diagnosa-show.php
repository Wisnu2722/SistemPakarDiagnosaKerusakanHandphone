<?php
    $db = Database::getDatabase();
	$id = $_GET['id'];
	if($id[0]=='T'){
		$art = new Pertanyaan($id);
		if(!$art->ok()) redirect('index.php?page=diagnosa');
		echo "<h4>Pertanyaan</h4>";
		echo "<h4>$art->pertanyaan</h4>";
		echo "<br><ul data-role='listview'>";
		echo "<li><a href=\"index.php?page=diagnosa-show&id=$art->ya\">Ya</a></li>";
		echo "<li><a href=\"index.php?page=diagnosa-show&id=$art->tidak\">Tidak</a></li>";
		echo "</ul><br><br>";
	}else if($id[0]=='S'){
		$art = new Solusi($id);
		if(!$art->ok()) redirect('index.php?page=diagnosa');
		echo "<h4>Solusi</h4>";
		echo "$art->solusi";
	}
?>