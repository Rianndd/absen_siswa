<?php
require_once('koneksi.php');
$halaman = "absen_keluar";
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$id = $_SESSION['id'];
$nm = $_SESSION['namatmpl'];
$halaman = "absen_keluar";
$tgl = $_SESSION['tanggal'];
//sekali absen
$query = "SELECT * FROM absen WHERE id_siswa = '$id' AND tanggal = '$tgl'";
$exec = mysqli_query($conn, $query);
$absen = mysqli_fetch_assoc($exec);
if (mysqli_num_rows($exec) == 1 && $absen['jam_keluar'] == "00:00:00") {
  $_SESSION['absen_keluar'] = true;
}
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
  <!-- akhir css -->
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
          <div class="container flex-grow-1 container-p-y my-2">
            <div class="col-lg-4 col-md-6">
              <h4 style="margin-left: 30px; margin-top: 20px;" class="fw-semibold">Absen Keluar Disini</h4>
              <div class="mt-3">
                <?php if (@$_SESSION['absen_keluar'] == true) : ?>
                  <div class="col-lg-4 col-md-6">
                    <button style="margin-left: 30px; " type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">
                      ABSEN KELUAR
                    </button>
                    <!-- Modal 1-->
                    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalToggleLabel"><?= $_SESSION['nama'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="siswa_model.php" method="post" enctype="multipart/form-data">
                            <div>
                              <input style="margin-left: 100px;" type="hidden" value="<?= $id ?>" id="myfile" name="id_siswa">
                              <input style="margin-left: 100px;" type="hidden" value="<?= $nm ?>" id="myfile" name="nama">
                            </div>
                            <div class="modal-body">Klik Tombol di Bawah Ini Untuk Absen Keluar</div>
                            <div class="modal-footer">
                              <button type="submit" name="absen_keluar" class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                                absen keluar
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <?php
                @$_SESSION['absen_keluar'] = false;
              endif; ?>
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