<?PHP
	$kerusakan = DBObject::glob('Kerusakan', "SELECT * FROM kerusakan");
?>
<ul data-role="listview">
	<?php foreach($kerusakan as $dfb) : 
		echo "<li><a href='index.php?page=diagnosa-show&id=$dfb->pertanyaan_awal'>$dfb->jenis_kerusakan</a></li>";
		endforeach;
	?>
</ul>