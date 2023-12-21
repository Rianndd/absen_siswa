          <?php
          $halaman = "dashboard";
          session_start();
          if (!isset($_SESSION['username'])) {
            header("Location: login.php");
          }
          $halaman = "index";
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
                  <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row welcome-container">
                      <div class="col-md-12">
                        <div class="welcome-text">Selamat Datang <?= $_SESSION['nama'] ?> di Web Absensi Skandakra!</div>
                      </div>
                      <div class="col-md-12 marquee-container">
                        <div class="marquee-content">
                          <p>KEJARLAH CITA - CITA YANG KALIAN IMPIKAN !!</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Footer -->
                  <?php require_once('layout/_footer.php') ?>
                </div>
              </div>
              <!-- Overlay -->
              <div class="layout-overlay layout-menu-toggle"></div>
            </div>
            <!-- js -->
            <?php require_once('layout/_js.php') ?>
            <!-- akhir js -->
            <script>
              // Menghentikan marquee saat mouse hover
              document.querySelector('.marquee-container').addEventListener('mouseover', function() {
                document.querySelector('.marquee-content').style.animationPlayState = 'paused';
              });
              // Mengaktifkan kembali marquee saat mouse meninggalkan elemen
              document.querySelector('.marquee-container').addEventListener('mouseout', function() {
                document.querySelector('.marquee-content').style.animationPlayState = 'running';
              });
            </script>
          </body>

          </html>