<?php
require_once('koneksi.php');
$halaman = "data_absen";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$id = $_SESSION['id'];
$query = "SELECT * FROM murid JOIN absen ON murid.id_siswa = absen.id_siswa WHERE 
        absen.id_siswa = '$id'  GROUP BY absen.id_absen";
$exec = mysqli_query($conn, $query);
$hasil = mysqli_fetch_all($exec, MYSQLI_ASSOC);
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
                        <!-- Basic Layout & Basic with Icons -->
                        <div class="row">
                            <!-- Basic Layout -->
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Data Absen <?= $_SESSION['nama'] ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="container flex-grow-1 container-p-y my-2">
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
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
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
            </div>
        </div>
    </div>
</body>
</html>