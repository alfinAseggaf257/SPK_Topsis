<?php
   include ("../koneksi.php");
   if (isset($_POST['simpan'])) {
    $id_alternatif  = $_POST['id_alternatif'];
    $id_kriteria    = $_POST['id_kriteria'];
    $nilai    = $_POST['nilai'];


    $query = mysqli_query($koneksi, "INSERT INTO tab_topsis(id_alternatif, id_kriteria, nilai)
      VALUES('$id_alternatif','$id_kriteria','$nilai')");

    echo "<script>alert('Input Data Berhasil') </script>";
    echo "<script>window.location.href = \"?page=tampil_matriks\" </script>";

  }

?>