<?php include('../config.php') ?>

<?php

if (isset($_POST['edit'])) {
    $i = $_POST["act"];
    $j = $_POST["num"];
    $k = $_POST["mas"];
    $l = $_POST["thn"];
    $m = $_POST["id"];
    $n = $_POST["aktif"];

    // echo '<script>console.log("' . $i . $j . $k . $l . $id . '")</script>';
    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');
    $y = mysqli_query($conn, "UPDATE `tbl_act_cat` 
    SET act = '$i', 
        wbs_num = '$j', 
        mas_bud = '$k',
        tahun = '$l',
        active = '$n'

    WHERE `tbl_act_cat`.`id`='$m'");
    $jalan = mysqli_query($conn, $y);
    if ($jalan) {
        echo 'Berhasil Update Data';
    }
    header('Location:' . BASE_URL . '/categori/?tahun= ' . $l);
}
