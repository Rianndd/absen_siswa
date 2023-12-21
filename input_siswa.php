<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$halaman = "input";
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
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Input Data Siswa</h4>
            <!-- Basic Layout & Basic with Icons -->
            <div class="row">
              <!-- Basic Layout -->
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Input Data Siswa Excel</h5>
                  </div>
                  <div class="card-body">
                    <div class="col-lg-4 col-md-6">
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalTop">
                          Input Data
                        </button>
                        <!-- Modal -->
                        <div class="modal modal-top fade" id="modalTop" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog">
                            <form class="modal-content" action="siswa_model.php" method="POST" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTopTitle">Input Ecxel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameSlideTop" class="form-label">Input File</label>
                                    <input type="file" name="xls" id="nameSlideTop" class="form-control">
                                  </div>
                                </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="inputxls" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- Basic Layout -->
              <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Input Data Siswa</h5>
                  </div>
                  <div class="card-body">
                    <form action="siswa_model.php" method="POST">
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">NIS</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="basic-default-name" name="nis" placeholder="Masukkan NIS Siswa" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="basic-default-name" name="nama" placeholder="Masukkan Nama Siswa" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Kelas</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="kelas" id="kelas">
                            <option value="XI RA">XI RA</option>
                            <option value="XI RB">XI RB</option>
                            <option value="XI RC">XI RC</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2" placeholder="Masukkan Alamat"></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Username</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control" id="basic-default-company" placeholder="Username" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Password</label>
                        <div class="col-sm-10">
                          <input type="Password" name="password" class="form-control" id="basic-default-company" placeholder="Password" />
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" name="inputsiswa" class="btn btn-primary">Send</button>
                        </div>
                      </div>
                    </form>
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
      </div>
    </div>
  </div>
</body>
</html>