 <?php
//koneksi
 include ("../koneksi.php");

 $tampil = $koneksi->query("SELECT b.nama_alternatif,c.nama_kriteria,a.nilai,c.bobot,c.status
  FROM
  tab_topsis a
  JOIN
  tab_alternatif b USING(id_alternatif)
  JOIN
  tab_kriteria c USING(id_kriteria)");

 $data      =array();
 $kriterias =array();
 $bobot     =array();
 $nilai_kuadrat =array();
 $status=array();

 if ($tampil) {
  while($row=$tampil->fetch_object()){
    if(!isset($data[$row->nama_alternatif])){
      $data[$row->nama_alternatif]=array();
  }
  if(!isset($data[$row->nama_alternatif][$row->nama_kriteria])){
      $data[$row->nama_alternatif][$row->nama_kriteria]=array();
  }
  if(!isset($nilai_kuadrat[$row->nama_kriteria])){
      $nilai_kuadrat[$row->nama_kriteria]=0;
  }
  $bobot[$row->nama_kriteria]=$row->bobot;
  $data[$row->nama_alternatif][$row->nama_kriteria]=$row->nilai;
  $nilai_kuadrat[$row->nama_kriteria]+=pow($row->nilai,2);
  $kriterias[]=$row->nama_kriteria;
  $status[$row->nama_kriteria]=$row->status;
}
}

$kriteria     =array_unique($kriterias);
$jml_kriteria =count($kriteria);
?>
<h3>Hasil</h3>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">HASIL PERHITUNGAN</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <!--tabel-tabel-->
            <div class="container"> <!--container-->
              <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      Matriks (x<sub>ij</sub>)
                  </div>
                  <div class="panel-body">
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th rowspan='3'>No</th>
                            <th rowspan='3'>Alternatif</th>
                            <th rowspan='3'>Nama</th>
                            <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
                        </tr>
                        <tr>
                            <?php
                            foreach($kriteria as $k)
                              echo "<th>$k</th>\n";
                          ?>
                      </tr>
                      <tr>
                        <?php
                        for($n=1;$n<=$jml_kriteria;$n++)
                          echo "<th>K$n</th>";
                      ?>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $i=0;
                  foreach($data as $nama=>$krit){
                    echo "<tr>
                    <td>".(++$i)."</td>
                    <th>A$i</th>
                    <td>$nama</td>";
                    //menampilkan nilai objek setiap alternatif
                    foreach($kriteria as $k){
                      echo "<td align='center'>$krit[$k]</td>";
                  }
                  echo "</tr>\n";
              }
              ?>
          </tbody>
      </table>
  </div>
</div>
</div>
</div>

<!--NORMALISASI-->

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Normalisasi (r<sub>ij</sub>)
      </div>
      <div class="panel-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th rowspan='3'>No</th>
                <th rowspan='3'>Alternatif</th>
                <th rowspan='3'>Nama</th>
                <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
            </tr>
            <tr>
                <?php
                foreach($kriteria as $k)
                  echo "<th>$k</th>\n";
              ?>
          </tr>
          <tr>
            <?php
            for($n=1;$n<=$jml_kriteria;$n++)
              echo "<th>K$n</th>";
          ?>
      </tr>
  </thead>
  <tbody>
      <?php
      $i=0;
      foreach($data as $nama=>$krit){
        echo "<tr>
        <td>".(++$i)."</td>
        <th>A{$i}</th>
        <td>{$nama}</td>";
        foreach($kriteria as $k){
          echo 
          //rumus : mengambil nilai variabel yang telah dibulatkan kemudian dibagi dengan hasil akar dari  variabel yang menyimpan nilai kuadrat
          "<td align='center'>".round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4).
          "</td>";
      }
      echo
      "</tr>\n";
  }
  ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!--BOBOT TERNOMALISASI-->

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
         Bobot Ternormalisasi(y<sub>ij</sub>)
     </div>
     <div class="panel-body">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th rowspan='3'>No</th>
            <th rowspan='3'>Alternatif</th>
            <th rowspan='3'>Nama</th>
            <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
        </tr>
        <tr>
            <?php
            foreach($kriteria as $k)
              echo "<th>$k</th>\n";
          ?>
      </tr>
      <tr>
        <?php
        for($n=1;$n<=$jml_kriteria;$n++)
          echo "<th>K$n</th>";
      ?>
  </tr>
</thead>
<tbody>
  <?php
  $i=0;
  $y=array();
  foreach($data as $nama=>$krit){
    echo "<tr>
    <td>".(++$i)."</td>
    <th>A{$i}</th>
    <td>{$nama}</td>";
    foreach($kriteria as $k){
      // hasil yang diperoleh sebelumnya dikali dengan nilai bobot
      $y[$k][$i-1]=round(($krit[$k]/sqrt($nilai_kuadrat[$k])),4)*$bobot[$k];
      echo "<td align='center'>".$y[$k][$i-1]."</td>";
  }
  echo
  "</tr>\n";
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<!--SOLUSI IDEAL POSITIF-->

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Solusi Ideal positif (A<sup>+</sup>)
      </div>
      <div class="panel-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
            </tr>
            <tr>
                <?php
                foreach($kriteria as $k)
                  echo "<th>$k</th>\n";
              ?>
          </tr>
          <tr>
            <?php
            for($n=1;$n<=$jml_kriteria;$n++)
              echo "<th>y<sub>{$n}</sub><sup>+</sup></th>";
          ?>
      </tr>
  </thead>
  <tbody>
      <tr>
        <?php
        $yplus=array();
        foreach($kriteria as $k){
          $yplus[$k]=($status[$k]=='Benefit'?max($y[$k]):min($y[$k]));
          
          echo "<th>$yplus[$k]</th>";

      }
      ?>
  </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<!--SOLUSI IDEAL NEGATIF-->

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Solusi Ideal negatif (A<sup>-</sup>)
      </div>
      <div class="panel-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th colspan='<?php echo $jml_kriteria;?>'>Kriteria</th>
            </tr>
            <tr>
                <?php
                foreach($kriteria as $k)
                  echo "<th>{$k}</th>\n";
              ?>
          </tr>
          <tr>
            <?php
            for($n=1;$n<=$jml_kriteria;$n++)
              echo "<th>y<sub>{$n}</sub><sup>-</sup></th>";
          ?>
      </tr>
  </thead>
  <tbody>
      <tr>
        <?php
        $ymin=array();
        foreach($kriteria as $k){
          $ymin[$k]=($status[$k]=='Cost'?max($y[$k]):min($y[$k]));
          echo "<th>{$ymin[$k]}</th>";
      }

      ?>
  </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>

<!--JARAK POSITIF (D+)-->

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Jarak positif (D<sub>i</sub><sup>+</sup>)
      </div>
      <div class="panel-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Alternatif</th>
                <th>Nama</th>
                <th>D<suo>+</sup></th>
                </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              $dplus=array();
              foreach($data as $nama=>$krit){
                echo "<tr>
                <td>".(++$i)."</td>
                <th>A{$i}</th>
                <td>{$nama}</td>";
                foreach($kriteria as $k){
                  if(!isset($dplus[$i-1])) $dplus[$i-1]=0;
                  $dplus[$i-1]+=pow($yplus[$k]-$y[$k][$i-1],2);
              }
              echo "<td>".round(sqrt($dplus[$i-1]),4)."</td>
              </tr>\n";
          }
          ?>
      </tbody>
  </table>
</div>
</div>
</div>
</div>

<!--JARAK NEGATIF (D-)-->

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Jarak negatif (D<sub>i</sub><sup>-</sup>)
      </div>
      <div class="panel-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Alternatif</th>
                <th>Nama</th>
                <th>D<suo>-</sup></th>
                </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              $dmin=array();
              foreach($data as $nama=>$krit){
                echo "<tr>
                <td>".(++$i)."</td>
                <th>A{$i}</th>
                <td>{$nama}</td>";
                foreach($kriteria as $k){
                  if(!isset($dmin[$i-1]))$dmin[$i-1]=0;
                  $dmin[$i-1]+=pow($ymin[$k]-$y[$k][$i-1],2);
              }
              echo "<td>".round(sqrt($dmin[$i-1]),4)."</td>

              </tr>\n";
          }
          ?>
      </tbody>
  </table>
</div>
</div>
</div>
</div>

<!--NILAI PREFERENSI-->
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Nilai Preferensi(V<sub>i</sub>)
      </div>
      <div class="panel-body">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Alternatif</th>
                <th>Nama</th>
                <th>V<sub>i</sub></th>
            </tr>
        </thead>
        <tbody>
          <?php 
          $i=0;
          $V=array();
          $Y=array();
          $Z=array();                        
          $hasilakhir=array();
          

          foreach ($data as $nama => $krit) {
            echo "<tr>
            <td>".(++$i)."</td>
            <th>A{$i}</th>
            <td>{$nama}</td>";             
            foreach($kriteria as $k){
              // hasil proses perhitungan d - akan dibagi dengan nilai d- kemudian ditambahkan dengan nilai d+ yang telah didapat
              $V[$i-1]=round(sqrt($dmin[$i-1]),4)/(round(sqrt($dmin[$i-1]),4)+round(sqrt($dplus[$i-1]),4));
          }
          echo "<td>{$V[$i-1]}</td></tr>\n";
      }
      ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div> <!--container-->
<!-- TUTUP -->
</div>
</div>
</div>