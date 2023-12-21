<?php
require_once('koneksi.php');
$halaman = "dashboard";
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$kelasLink = @$_GET['kelas'];
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
$id = $_SESSION['id'];
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
  <meta name="description" content="" />
  <!-- css -->
  <?php require_once('layout/_css.php') ?>
  <!-- Akhir css -->
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- sidebar -->
      <?php require_once('layout/_sidebar.php') ?>
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php require_once('layout/_nav.php') ?>
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <!-- BEGIN: Data List -->
          <div class="container flex-grow-1 container-p-y my-2">
            <div>
              <a href="print_detail.php?kelas=<?= $kelasLink ?>" target="_blank"><button type="button" class="btn btn-primary">Print Laporan</button></a>
            </div>
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
              <table class="table table-report -mt-2">
                <thead>
                  <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Keluar</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">Aksi</th>
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
                      <td>
                        <a onclick="return confirm('Yakiin?')" class="btn rounded-pill btn-danger" href="siswa_model.php?hapus=<?= $data['foto']; ?>">Hapus</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END: Data List -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Footer -->
        <?php require_once('layout/_footer.php') ?>
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