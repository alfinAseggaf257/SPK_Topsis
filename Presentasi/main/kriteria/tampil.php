 <h3>Data Kriteria</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=tambah_kriteria">
                <button class="btn btn-primary">Tambah Data</button>
            </a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                    <tr>
                        <th>ID Kriteria</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
          
                <tbody>
                  <?php 
                     require'../koneksi.php';
                     $no=1;
                     $query=mysqli_query($koneksi, "SELECT * FROM tab_kriteria");
                     while($tampil=mysqli_fetch_array($query)){ 
                ?>
                    <tr>
                        <td><?php echo $tampil['id_kriteria']; ?></td>
                        <td><?php echo $tampil['nama_kriteria']; ?></td>
                        <td><?php echo $tampil['bobot']; ?></td>
                        <td><?php echo $tampil['status']; ?></td>
                        <td>
                            <a href="?page=edit_kriteria&id_kriteria=<?php echo $tampil['id_kriteria']; ?>" class="link">Edit</a> | 
                            <a href="?page=hapus_kriteria&id_kriteria=<?php echo $tampil['id_kriteria']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>