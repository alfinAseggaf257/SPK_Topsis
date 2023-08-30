  <?php 
  include'../koneksi.php';
  $id_kriteria =$_GET['id_kriteria'];
  $query   =mysqli_query($koneksi,"SELECT * FROM tab_kriteria WHERE id_kriteria='$id_kriteria'");
  while ($edit=mysqli_fetch_array($query)) { 
   ?>
   <h3>Data Kriteria</h3>
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold "> Kriteria / Ubah Data</h6>
     </div>
     <br>
     <div class="container">
      <form action="?page=update_kriteria" method="POST">
       <div id="mapel" class="form-text text-primary"><b>Data Kriteria</b></div><br>
       <div class="mb-3 row">
         <label for="id_kriteria" class=" col-sm-2 form-label">ID Kriteria</label>
         <input type="text" name="id_kriteria" class="col-sm-4 form-control" id="id_kriteria" value="<?php echo $edit['id_kriteria']; ?>" readonly aria-describedby="id_kriteria">
       </div>
       <div class="mb-3 row">
         <label for="nama" class=" col-sm-2 form-label">Nama Kriteria</label>
         <input type="text" name="nama_kriteria" class="col-sm-4 form-control" id="nama_kriteria" value="<?php echo $edit['nama_kriteria']; ?>" aria-describedby="nama">
       </div>
       <div class="mb-3 row">
         <label for="kurikulum" class=" col-sm-2 form-label">Kurikulum</label>
         <input type="text" name="bobot" class="col-sm-4 form-control" id="bobot" value="<?php echo $edit['bobot']; ?>" aria-describedby="bobot">
       </div>
       <div class="mb-3 row">
        <label for="kkm" class=" col-sm-2 form-label">kkm</label>
        <input type="text" name="status" class="col-sm-4 form-control" id="status" value="<?php echo $edit['status']; ?>" aria-describedby="kkm">
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <br>
</div>
<?php } ?>