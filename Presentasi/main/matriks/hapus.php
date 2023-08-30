<?php 	
	include '../koneksi.php';
	$id_topsis=$_GET['id_topsis'];
	$hapus=mysqli_query($koneksi,"DELETE FROM tab_topsis WHERE id_topsis='$id_topsis'");
	if ($hapus) {
	?>
	<script>
		alert("Success, Data Berhasil Dihapus"); 
		document.location="?page=tampil_matriks ";
	</script>
	<?php
	}

?>
