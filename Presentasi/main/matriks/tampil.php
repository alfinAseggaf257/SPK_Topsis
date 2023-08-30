 <?php 
 include "../koneksi.php";
  ?>
  <h3>Data Nilai Alternatif</h3>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Nilai Alternatif</h6>
    </div>
    <div class="card-body">
          <div class="container"> <!--container-->
      <div class="row"> <!--row-->
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading text-center ">
              <h3 style="text-align:left">Nilai Matriks</h3>
              <br>
            </div>

            <div class="panel-body">
              <!--tabel-tabel-->
              <div class="row">
                <!--tabel alternatif-->
                <div class="col-xs-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                      <h5>Tabel Alternatif</h5>
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">

                          <?php
                           $sql = $koneksi->query('SELECT * FROM tab_alternatif ORDER BY id_alternatif ASC');
                           ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID Alternatif</th>
                                <th>Nama Alternatif</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">".$row[0]."</td>");
                                echo ("<td align=\"left\">".$row[1]."</td>");
                                echo "</tr>";
                              }
                               ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!--tabel kriteria-->

                <div class="col-xs-6 col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center">
                     <h5> Tabel Kriteria</h5>
                    </div>

                    <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-12">

                          <?php
                          $sql = $koneksi->query('SELECT * FROM tab_kriteria');
                           ?>
                          <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID Kriteria</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              while ($row = $sql->fetch_array()) {
                                echo ("<tr><td align=\"center\">".$row[0]."</td>");
                                echo ("<td align=\"left\">".$row[1]."</td>");
                                echo ("<td align=\"left\">".$row[2]."</td>");
                                echo "</tr>";
                              }
                               ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
        </div>
        <br><br>
        <div class="table-responsive">
            <a href="?page=tambah_matriks">
                <button class="btn btn-primary">Tambah Data</button>
            </a>
            <br><br>
            <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h5>Tabel Pemberian Nilai</h5>
                </div>

                <div class="panel-body">
                 
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>ALTERNATIF</th>
                        <th>KRITERIA</th>
                        <th>NILAI</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                     require'../koneksi.php';
                     $no=1;
                     $query=mysqli_query($koneksi, "SELECT * FROM tab_topsis
                  JOIN tab_alternatif ON tab_topsis.id_alternatif=tab_alternatif.id_alternatif
                  JOIN tab_kriteria ON tab_topsis.id_kriteria=tab_kriteria.id_kriteria");
                     while($tampil=mysqli_fetch_array($query)){ 
                ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?php echo $tampil['nama_alternatif']; ?></td>
                        <td><?php echo $tampil['nama_kriteria']; ?></td>
                        <td><?php echo $tampil['nilai']; ?></td>
                        <td>
                            <a href="?page=hapus_matriks&id_topsis=<?php echo $tampil['id_topsis']; ?>" class="link" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                <?php } ?>

                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div> <!--row-->
        </div>
    </div>
</div>