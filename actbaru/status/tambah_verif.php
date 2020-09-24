<?php include('../../config.php') ?>
    <?php

    $edi = $_GET["pv"];

    $ide = $_GET["id"];
    $bagas = $_POST["status"];
    $catat = $_POST["note"];
    $thnn = date('Y-m-d', time());



    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

    $xui = "INSERT INTO `tbl_status_send`(`id_tracking`, `status`, `note`, `tanggal`)
                    VALUES 
                        ($ide', '$bagas', '$catat','$thnn') ";


    $rn =    mysqli_query($conn, $xui);
    header('Location:' . BASE_URL . '/actbaru/index.php?pv= ' . $edi . '');
