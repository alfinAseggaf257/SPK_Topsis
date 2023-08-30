<?php 	
	include '../koneksi.php';
	$id_kriteria=$_GET['id_kriteria'];
	$hapus=mysqli_query($koneksi,"DELETE FROM tab_kriteria WHERE id_kriteria='$id_kriteria'");
	if ($hapus) {
	?>
	<script>
		alert("Success, Data Berhasil Dihapus"); 
		document.location="?page=tampil_kriteria";
	</script>
	<?php
	}

?>
