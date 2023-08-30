<?php
   include ("../koneksi.php");
   if (isset($_POST['simpan'])) {
    $id_alternatif  = $_POST['id_alternatif'];
    $nama_alternatif    = $_POST['nama_alternatif'];

    $masuk = "INSERT INTO tab_alternatif VALUES ('".$id_alternatif."','".$nama_alternatif."')";
    $buat  = $koneksi->query($masuk);

    echo "<script>alert('Input Data Berhasil') </script>";
    echo "<script>window.location.href = \"?page=tampil_alternatif\" </script>";

  }

?>