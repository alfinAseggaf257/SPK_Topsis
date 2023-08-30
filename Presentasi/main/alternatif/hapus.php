<?php 	
	include '../koneksi.php';
	$id_alternatif=$_GET['id_alternatif'];
	$hapus=mysqli_query($koneksi,"DELETE FROM tab_alternatif WHERE id_alternatif='$id_alternatif'");
	if ($hapus) {
	?>
	<script>
		alert("Success, Data Berhasil Dihapus"); 
		document.location="?page=tampil_alternatif";
	</script>
	<?php
	}

?>
