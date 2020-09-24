<?php include('../config.php') ?>


<?php

$bubur = $_GET["pv"];
$bibir = $_GET["nama"];

$a = $_GET["id"];
$b = $_POST["num"];
$c = $_POST["id"];

$e = $_POST["remarks"];
$thn = date('Y-m-d', time());

$u = $_FILES["file"]["name"]; //download jpg
$nftemp = $_FILES["file"]["tmp_name"];
$pecah = explode(".", $u); //pecah[0]=download, pecah[1]=jpg
$f = "Invoice_" . $bibir . "." . $pecah[1];


//INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

$x = "INSERT INTO `tbl_tracking`
                    (`id_act_baru`, `no_pv`, `id_user`,`remarks`,`tgl_ubah`,`upload_foto`,`id_cata`)
                VALUES 
                    ('$a', '$b', '$c','$e','$thn','$f','$bubur') ";

$folder_target = "file";
move_uploaded_file($nftemp, $folder_target . '\\' . $f);

$run =    mysqli_query($conn, $x);
header('Location:' . BASE_URL . '/actbaru/tracking.php?act=' . $a . '&&cat=' . $bubur);
