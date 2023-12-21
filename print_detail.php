<?php
require_once('koneksi.php');
if (isset($_GET['kelas'])) {
  $kelas = $_GET['kelas'];
  if ($kelas == 'ra') {
    $kelas = 'XI RA';
  }
  if ($kelas == 'rb') {
    $kelas = 'XI RB';
  }
  if ($kelas == 'rc') {
    $kelas = 'XI RC';
  }
} else if (!isset($_GET['kelas'])) {
  $kelas = 'XI RA';
} else {
  $kelas = 'XI RA';
}
$query = "SELECT * FROM murid JOIN absen ON murid.id_siswa = absen.id_siswa WHERE 
          murid.kelas = '$kelas' GROUP BY absen.id_absen";
$exec = mysqli_query($conn, $query);
$hasil = mysqli_fetch_all($exec, MYSQLI_ASSOC);
$halaman = "datasiswa";
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>ABSENSI SISWA</title>
  <meta name="description" content=""/>
  <!-- css -->
  <?php require_once('layout/_css.php') ?>
  <!-- Akhir css -->
</head>
<body onload="window.print();" >
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <!-- BEGIN: Data List -->
          <div class="container flex-grow-1 container-p-y my-2">
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
              <table id="printTable" class="table table-report -mt-2">
                <thead>
                  <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                    <th scope="col">tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($hasil as $data) { ?>
                    <tr>
                      <td><?= $data['nis']; ?></td>
                      <td><?= $data['nama']; ?></td>
                      <td><?= $data['kelas']; ?></td>
                      <td><img src="images/<?= $data['foto']; ?>" width="150"></td>
                      <td><?= $data['jam_masuk']; ?></td>
                      <td><?= $data['jam_keluar']; ?></td>
                      <td><?= $data['tanggal']; ?></td>
                    </tr>
                  <?php
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END: Data List -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- js -->
  <?php require_once('layout/_js.php') ?>
  <!-- akhir js -->
</body>
</html>