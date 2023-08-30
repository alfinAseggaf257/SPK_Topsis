<h3>Data Nilai Alternatif</h3>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold ">Nilai Alternatif / Tambah Data</h6>
 </div>
 <br>
 <div class="container">
   <form action="?page=simpan_matriks" method="POST">
      <div id="Kriteria" class="form-text text-primary"><b>Data Nilai Alternatif</b></div><br>
      <div class="mb-3 row">
        <label for="id_alternatif" class=" col-sm-2 form-label">Alternatif</label>
        <select class="col-sm-4 form-control" name="id_alternatif"  aria-label="Default select example">
         <option selected value="">-- Pilih Alternatif --</option>
         <?php
         require"../koneksi.php";
         $result = mysqli_query($koneksi, "SELECT * FROM tab_alternatif ORDER BY id_alternatif ASC")or die(mysqli_error());
         while($data=mysqli_fetch_array($result)){
            echo '<option value="'.$data['id_alternatif'].'">'.$data['nama_alternatif'].' </option>';
         }
         ?>
      </select>
   </div>
   <div class="mb-3 row">
     <label for="id_kriteria" class=" col-sm-2 form-label">Kriteria</label>
     <select class="col-sm-4 form-control" name="id_kriteria"  aria-label="Default select example">
      <option selected value="">-- Pilih Kriteria --</option>
      <?php
      require"../koneksi.php";
      $result = mysqli_query($koneksi, "SELECT * FROM tab_kriteria ORDER BY id_kriteria ASC")or die(mysqli_error());
      while($data=mysqli_fetch_array($result)){
         echo '<option value="'.$data['id_kriteria'].'">'.$data['nama_kriteria'].' </option>';
      }
      ?>
   </select>
</div>
<div class="mb-3 row">
  <label for="status" class=" col-sm-2 form-label">Nilai</label>
  <input type="text" name="nilai" class="col-sm-4 form-control" id="nilai" aria-describedby="nilai">
</div>   
<button type="submit" class="btn btn-primary"  name="simpan" value="Tambah">Submit</button>
</form>
</div>
<br>
</div>