<?php include('../config.php') ?>

<?php

if (isset($_POST['edit'])) {
    $i = $_POST["act"];
    $j = $_POST["plan"];
    $k = $_POST["preuy"];
    $l = $_POST["pveuy"];
    $m = $_POST["id"];
    $cat = $_POST["cata"];
    $date = $_POST["sub"];

    // echo '<script>console.log("' . $i . $j . $k . $l . $id . '")</script>';
    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');


    $y = mysqli_query($conn, "UPDATE `tbl_act_baru` SET `id`='$m',`id_cat`='$cat',`name_act`='$i',`plan_date`='$j',`nom_pr`='$k',`nom_pv`='$l',`sub_date`='$date' WHERE id = '$m'
    ");

    $jalan = mysqli_query($conn, $y);
    if ($jalan == true) {
        echo 'Berhasil Update Data';
    } else {
        echo 'Berhasil';
    }
    header('Location:' . BASE_URL . '/actbaru/index.php?pv=' . $cat);
}
