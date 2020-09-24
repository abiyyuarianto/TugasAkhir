<?php include('config.php') ?>

<?php
// menangkap data yang dikirim dari form login
$username = $_POST['uname'];
$password = md5($_POST['psw']);
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "select * from tbl_admin where username='$username' and pass='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    // cek jika user login sebagai PIC Budget
    if ($data['role'] == "admin") {
        // buat session login dan username
        $_SESSION['username'] = $username;

        $_SESSION['role'] = "admin";
        // alihkan ke halaman dashboard PIC Budget
        header('Location:' . BASE_URL . '/categori');
        // cek jika user login sebagai Atasan
    } else if ($data['role'] == "atasan") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "atasan";
        // alihkan ke halaman dashboard pegawai
        header('Location:' . BASE_URL . '/check_ratio');
        // cek jika user login sebagai pengurus
    } else {
        // alihkan ke halaman login kembali
        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
