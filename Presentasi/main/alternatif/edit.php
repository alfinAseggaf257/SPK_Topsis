  <?php 
  include'../koneksi.php';
  $id_alternatif =$_GET['id_alternatif'];
  $query   =mysqli_query($koneksi,"SELECT * FROM tab_alternatif WHERE id_alternatif='$id_alternatif'");
  while ($edit=mysqli_fetch_array($query)) { 
   ?>
   <h3>Data alternatif</h3>
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold "> alternatif / Ubah Data</h6>
     </div>
     <br>
     <div class="container">
      <form action="?page=update_alternatif" method="POST">
       <div id="mapel" class="form-text text-primary"><b>Data alternatif</b></div><br>
       <div class="mb-3 row">
         <label for="id_alternatif" class=" col-sm-2 form-label">ID Alternatif</label>
         <input type="text" name="id_alternatif" class="col-sm-4 form-control" id="id_alternatif" value="<?php echo $edit['id_alternatif']; ?>" readonly aria-describedby="id_alternatif">
       </div>
       <div class="mb-3 row">
         <label for="nama" class=" col-sm-2 form-label">Nama Alternatif</label>
         <input type="text" name="nama_alternatif" class="col-sm-4 form-control" id="nama_alternatif" value="<?php echo $edit['nama_alternatif']; ?>" aria-describedby="nama">
       </div>

       <button type="submit" class="btn btn-primary">Submit</button>
     </form>
   </div>
   <br>
 </div>
 <?php } ?>