<!-- INI HALAMAN YANG TIDAK TERPAKAI -->
<?php include('../../config.php') ?>
<?php
$iuh = $_GET['pv'];
?>

<?php

if (isset($_POST['ubah'])) {
    $i = $_POST["nama"];
    $m = $_POST["id"];

    $y = mysqli_query($conn, "UPDATE `tbl_user` SET name = '$i' 
    WHERE `tbl_user`.`id`='$m'");

    $jalan = mysqli_query($conn, $y);
    if ($jalan) {
        echo 'Berhasil Update Data';
    }

    header('Location:' . BASE_URL . '/actbaru/user/?id= ' . $iuh . ' ');
}
