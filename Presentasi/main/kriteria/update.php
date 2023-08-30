<?php
//untuk koneksi ke database
include ("../koneksi.php");

//proses edit
$id_krit  = $_POST['id_kriteria'];
$nama_kriteria = $_POST['nama_kriteria'];
$bobot    = $_POST['bobot'];
$status   = $_POST['status'];

$query = "UPDATE tab_kriteria SET nama_kriteria ='$nama_kriteria' , bobot ='$bobot' ,status ='$status' WHERE id_kriteria='$id_krit' ";
$result = mysqli_query($koneksi, $query);
if ($result) {
  
  echo "<script>alert('Ubah Data Dengan ID = ".$id_krit." Berhasil') </script>";
  echo "<script>window.location.href = \"?page=tampil_kriteria\" </script>";
}else {
  
  echo "<script>alert Gagal </script>";
}


?>
