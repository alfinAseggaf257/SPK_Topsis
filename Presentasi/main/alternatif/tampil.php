 <h3>Data Alternatif</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Alternatif</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=tambah_alternatif">
                <button class="btn btn-primary">Tambah Data</button>
            </a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                    <tr>
                        <th>ID Alternatif</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
          
                <tbody>
                  <?php 
                     require'../koneksi.php';
                     $no=1;
                     $query=mysqli_query($koneksi, "SELECT * FROM tab_alternatif");
                     while($tampil=mysqli_fetch_array($query)){ 
                ?>
                    <tr>
                        <td><?php echo $tampil['id_alternatif']; ?></td>
                        <td><?php echo $tampil['nama_alternatif']; ?></td>
                        <td>
                            <a href="?page=edit_alternatif&id_alternatif=<?php echo $tampil['id_alternatif']; ?>" class="link">Edit</a> | 
                            <a href="?page=hapus_alternatif&id_alternatif=<?php echo $tampil['id_alternatif']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>