 <?php
//koneksi
 include ("../koneksi.php");

//pemberian kode id secara otomatis
 $carikode = $koneksi->query("SELECT id_kriteria FROM tab_kriteria") or die(mysqli_error());
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

 <h3>Data Kriteria</h3>
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold ">Kriteria / Tambah Data</h6>
 </div>
 <br>
 <div class="container">
   <form action="?page=simpan_kriteria" method="POST">
      <div id="Kriteria" class="form-text text-primary"><b>Data Kriteria</b></div><br>
      <div class="mb-3 row">
        <label for="id_kriteria" class=" col-sm-2 form-label">ID kriteria</label>
        <input type="text" name="id_krit" class="col-sm-4 form-control" value="<?php echo $kode_otomatis; ?>" readonly aria-describedby="id_kriteria">
     </div>
     <div class="mb-3 row">
        <label for="nama" class=" col-sm-2 form-label">Nama Kriteria</label>
        <input type="text" name="nm_krit" class="col-sm-4 form-control" id="nama" aria-describedby="nama">
     </div>
     <div class="mb-3 row">
        <label for="bobot" class=" col-sm-2 form-label">Bobot</label>
        <input type="text" name="bobot" class="col-sm-4 form-control" id="bobot" aria-describedby="bobot">
     </div>
     <div class="mb-3 row">
        <label for="status" class=" col-sm-2 form-label">Status</label>
        <input type="text" name="status" class="col-sm-4 form-control" id="status" aria-describedby="status">
     </div>   
     <button type="submit" class="btn btn-primary"  name="simpan" value="Tambah">Submit</button>
  </form>
</div>
<br>
</div>