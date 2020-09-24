<?php include('../config.php') ?>


<?php

if (isset($_POST['add'])) {
    $k = $_POST["pr"];
    $l = $_POST["pv"];
    $m = $_POST["id"];

    $u = mysqli_query($conn, "UPDATE `tbl_act` 
    SET pr = '$k', 
        pv = '$l'

    WHERE `tbl_act`.`id`='$m'");
    $jalan = mysqli_query($conn, $u);
    if ($jalan) {
        echo 'Berhasil';
    }

    header('Location:' . BASE_URL . '/aktivitas/index.php?pv= ' . $n . '');
}
?>