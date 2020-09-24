<?php include('../config.php') ?>

<?php

if (isset($_POST['simpan'])) {
    $o = $_POST["act"];
    $p = $_POST["plan"];
    $q = $_POST["no"];
    $r = $_POST["tatus"];
    $s = $_POST["id_baru"];

    //id user
    $note = $_POST["remarks"];
    $cat = $_POST["cata"];

    // echo '<script>console.log("' . $i . $j . $k . $l . $id . '")</script>';
    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');
    $y = mysqli_query($conn, "UPDATE `tbl_act` SET `name_act`='$o',`no_pv`='$q',`plan_date`='$p',`status`='$r',`note`='$note' WHERE id = '$s' && id_cat='$cat'");
    $jalan = mysqli_query($conn, $y);
    if ($jalan) {
        echo 'Berhasil Update Data';
    }
    header('Location:' . BASE_URL . '/aktivitas/index.php?pv=' . $cat);
}
