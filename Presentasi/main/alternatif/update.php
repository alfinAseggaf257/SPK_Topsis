<?php
//untuk koneksi ke database
include ("../koneksi.php");

//proses edit
$id_alternatif  = $_POST['id_alternatif'];
$nama_alternatif = $_POST['nama_alternatif'];

$query = "UPDATE tab_alternatif SET nama_alternatif ='$nama_alternatif' WHERE id_alternatif='$id_alternatif' ";
$result = mysqli_query($koneksi, $query);
if ($result) {
  
  echo "<script>alert('Ubah Data Dengan ID = ".$id_alternatif." Berhasil') </script>";
  echo "<script>window.location.href = \"?page=tampil_alternatif\" </script>";
}else {
  
  echo "<script>alert Gagal </script>";
}


?>
