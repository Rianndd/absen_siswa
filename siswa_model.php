<?php
session_start();
require_once('koneksi.php');
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['absen'])) {
    $gambar = date('YmdHis') . '.png';
    // $nama = $_POST['nama'];
    $fotoData = $_POST['foto'];
    // Mendekode data foto dari format base64
    $fotoData = str_replace('data:image/png;base64,', '', $fotoData);
    $fotoData = str_replace(' ', '+', $fotoData);
    $fotoBinary = base64_decode($fotoData);
    // Menyimpan foto di server
    $uploadDir = 'images/';
    $uploadFile = $uploadDir . $gambar;
    if (file_put_contents($uploadFile, $fotoBinary)) {
        echo 'Absensi berhasil. Terima kasih, ' . $gambar . '!';
    } else {
        echo 'Terjadi kesalahan saat mengunggah foto.';
        echo "<script> window.location.href = 'index.php'; </script>";
        die;
    }
    $id_siswa = $_POST['id_siswa'];
    $nama = $_SESSION['nama'];
    $jam_masuk = date("h:i:s A");
    $tanggal = date("Y-m-d");
    $query = "INSERT INTO absen values(
        '',
        '$id_siswa',
        '$nama',
        '$gambar',
        '$jam_masuk',
        '',
        '$tanggal'
        )";
    mysqli_query($conn, $query);
    echo "<script> alert('Berhasil Melakukan Absen'); </script>";
    echo "<script> window.location.href = 'index.php'; </script>";
}

if (isset($_POST['absen_keluar'])) {
    $id_siswa = $_POST['id_siswa'];
    $nama = $_SESSION['nama'];
    $jam_keluar = date("h:i:s A");
    $tanggal = date("Y-m-d");
    $query = "UPDATE absen SET jam_keluar= '$jam_keluar' WHERE id_siswa= '$id_siswa' AND tanggal= '$tanggal' ";
    mysqli_query($conn, $query);
    echo "<script>alert('Absen Berhasil');</script>";
    echo "<script> window.location.href ='index.php';</script>";
}

if (isset($_GET['hapus'])) {
    $foto = $_GET['hapus'];
    unlink('images/' . $foto);
    $query = "DELETE FROM absen WHERE foto = '$foto' ";
    mysqli_query($conn, $query);
    echo "<script> alert('Absen Berhasil Dihapus'); </script>";
    echo "<script> window.location.href = 'kelas.php' </script>";
}

require_once('libexcel/PHPExcel.php');
require_once('libexcel/PHPExcel/IOFactory.php');
if (isset($_POST['inputxls'])) {
    // Ambil nama file Excel
    $nama_file = $_FILES['xls']['name'];
    // Pindahkan file Excel ke direktori tempat penyimpanan
    move_uploaded_file($_FILES['xls']['tmp_name'], $nama_file);
    // Load library PHPExcel
    // Load file Excel
    $excel = PHPExcel_IOFactory::load($nama_file);
    // Ambil data dari sheet pertama (indeks 0)
    $sheet = $excel->getSheet(0);
    // Ambil jumlah baris dalam sheet
    $jumlah_baris = $sheet->getHighestRow();
    // Mulai impor data ke MySQL
    for ($row = 3; $row <= $jumlah_baris; $row++) {
        $nis = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(0, $row)->getValue());
        $nama = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(1, $row)->getValue());
        $kelas = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(2, $row)->getValue());
        $alamat = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(3, $row)->getValue());
        $username = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(4, $row)->getValue());
        $password = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(5, $row)->getValue());
        $level = mysqli_real_escape_string($conn, $sheet->getCellByColumnAndRow(6, $row)->getValue());
        // Query untuk menyimpan data ke MySQL
        $query = "INSERT INTO murid VALUES ('','$nis', '$nama', '$kelas', '$alamat', '$username', '$password', '$level')";
        mysqli_query($conn, $query);
    }
    // Hapus file Excel setelah impor selesai
    unlink($nama_file);
    // Redirect ke halaman lain atau tampilkan pesan sukses
    echo "<script> alert('Berhasil input data siswa'); 
    window.location.replace('input_siswa.php');
    </script>";
}

if (isset($_POST['inputsiswa'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO murid VALUES('','$nis','$nama', '$kelas', '$alamat', '$username','$password','siswa')";
    mysqli_query($conn, $query);
    echo "<script> alert('Berhasil input data siswa'); 
    window.location.replace('input_siswa.php');
    </script>";
}

if (isset($_POST['update_siswa'])) {
    $id = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "UPDATE murid SET
    nama = '$nama' , 
    kelas = '$kelas' , 
    alamat = '$alamat',
    username = '$username',
    password = '$password'
    WHERE id_siswa = '$id'
    ";
    mysqli_query($conn, $query);
    echo "<script> alert('Berhasil Update'); </script>";
    echo "<script> window.location.href = 'index.php'; </script>";
}
