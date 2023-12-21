<?php
require_once('koneksi.php');
$halaman = "absen_masuk";
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$id = $_SESSION['id'];
$nm = $_SESSION['namatmpl'];
$halaman = "absen_masuk";
$tgl = $_SESSION['tanggal'];
//sekali session
$query = "SELECT * FROM absen WHERE id_siswa = '$id' AND tanggal = '$tgl'";
$exec = mysqli_query($conn, $query);
var_dump(mysqli_num_rows($exec));
if (mysqli_num_rows($exec) == 0) {
  $_SESSION['absen_masuk'] = true;
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
            <h4 style="margin-left: 30px; margin-top: 20px;" class="fw-semibold">Absen Disini</h4>
            <div class="mt-3">
              <?php if (@$_SESSION['absen_masuk'] == true) : ?>
                <div class="col-lg-4 col-md-6">
                  <button style="margin-left: 30px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">
                    ABSEN
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
                            <div id="selfie-form" method="" enctype="multipart/form-data" action="">
                              <video id="video" width="560" height="480" required autoplay></video>
                              <br>
                              <button style="margin-left: 20px;" class="btn rounded-pill btn-primary" onclick="test()" type="button" id="capture-btn" name="" required>Ambil Foto</button>
                              <br>
                              <canvas id="canvas" style="display: none;"></canvas>
                              <br>
                              <input type="hidden" class="" id="photo-input" name="foto" value="">
                              <img id="photo" src="#" alt="Hasil foto" style="display: none;">
                              <br>
                              <!-- <button type="submit" name="absen" id="submit-btn">Kirim</button> -->
                            </div>
                            <script>
                              // Mendapatkan elemen-elemen form
                              const video = document.getElementById('video');
                              const canvas = document.getElementById('canvas');
                              const photo = document.getElementById('photo');
                              const photoInput = document.getElementById('photo-input');
                              const captureButton = document.getElementById('capture-btn');
                              const submitButton = document.getElementById('submit-btn');
                              // Mengambil akses ke kamera
                              navigator.mediaDevices.getUserMedia({
                                  video: {
                                    facingMode: 'user'
                                  }
                                })
                                .then(function(stream) {
                                  video.srcObject = stream;
                                })
                                .catch(function(error) {
                                  console.log('Kamera tidak tersedia', error);
                                });
                              // Mengambil foto dari video
                              captureButton.addEventListener('click', function() {
                                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                                photo.setAttribute('src', canvas.toDataURL('image/png'));
                                photoInput.value = canvas.toDataURL('image/png');
                                photo.style.display = 'inline';
                              });
                              function test() {
                                  document.getElementById('absen').style = "asd";
                                
                              }
                            </script>
                            <input style="margin-left: 100px;" type="hidden" value="<?= $id ?>" id="myfile" name="id_siswa">
                            <input style="margin-left: 100px;" type="hidden" value="<?= $nm ?>" id="myfile" name="nama">
                          </div>
                          <div class="modal-body">Tombol absen akan muncul jika sudah ambil foto</div>
                          <div class="modal-footer">
                            <button type="submit" name="absen" id="absen" class="btn btn-primary" style="display:none;" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                              absen
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          <?php
            @$_SESSION['absen_masuk'] = false;
            endif; 
          ?>
          <div class="content-backdrop fade"></div>
          </div>
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