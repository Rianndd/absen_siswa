<?php
require_once('koneksi.php');
if (isset($_POST['register'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO murid VALUES('','$nis','$nama', '$kelas', '$alamat', '$username','$password','siswa')";
    mysqli_query($conn, $query);
    header("Location: login.php");
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM murid where username='$username'";
    $hasil = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($hasil);
    if ($data == NULL) {
        echo "<script> alert('Username tidak ditemukan'); 
            window.location.replace('login.php');
            </script>";
    } else if ($password <> $data['password']) {
        echo "<script> alert('Password salah'); 
            window.location.replace('login.php');
            </script>";
    } else {
        session_start();
        $_SESSION['nis'] = $data['nis'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['kelas'] = $data['kelas'];
        $_SESSION['alamat'] = $data['alamat'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['id'] = $data['id_siswa'];
        $_SESSION['namatmpl'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['tanggal'] = date("Y-m-d");
        echo "<script> window.location.href = 'index.php'; </script>";
        header('Location: index.php');
    }
}
