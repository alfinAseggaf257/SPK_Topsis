<?php
include ("../koneksi.php");

//pemberian kode id secara otomatis
$carikode = $koneksi->query("SELECT id_alternatif FROM tab_alternatif") or die(mysqli_error());
$datakode = $carikode->fetch_array();
$jumlah_data = mysqli_num_rows($carikode);

if ($datakode) {
  $nilaikode = substr($jumlah_data[0], 1);
  $kode = (int) $nilaikode;
  $kode = $jumlah_data + 1;
  $kode_otomatis = str_pad($kode, 0, STR_PAD_LEFT);
} else {
  $kode_otomatis = "1";
}

 ?>

  <h3>Data Alternatif</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold ">Alternatif / Tambah Data</h6>
  </div>
  <br>
  <div class="container">
   <form action="?page=simpan_alternatif" method="POST">
      <div class="mb-3 row">
       <label for="id_alternatif" class=" col-sm-2 form-label">ID Alternatif</label>
       <input type="text"  class="col-sm-4 form-control" name="id_alternatif" value="<?php echo $kode_otomatis ?>" readonly>
    </div>
    <div class="mb-3 row">
       <label for="nama" class=" col-sm-2 form-label">Nama Alternatif</label>
       <input type="text" name="nama_alternatif" class="col-sm-4 form-control" id="nama" aria-describedby="nama">
    </div>
    <button type="submit" class="btn btn-primary"  name="simpan" value="Tambah">Submit</button>
 </form>
</div>
<br>
</div>