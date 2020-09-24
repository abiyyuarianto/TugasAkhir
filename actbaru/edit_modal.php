<?php include('../config.php') ?>

<?php
$iu = $_GET["pv"];
$iuh = $_GET["nama"];
$act = $_GET["act"];

$aa = $_POST["ber"];
$bb = $_POST["us"];

$cc = $_POST["id_lama"];

$ee = $_POST["id_new"];
$ff = $_POST["tgl"];
$gg = $_POST["note"];
$hh = $_POST["cata"];
$u =  $_FILES["file"]["tmp_name"];

if (!empty($u) && !empty($bb)) {
    $pecah = explode(".", $u); //pecah[0]=download, pecah[1]=jpg

    $uuy = "Invoice_" . $iuh . "." . $pecah[1];
    $nftemp = $_FILES["file"]["tmp_name"];

    $yy = "UPDATE `tbl_tracking`    
    SET `id`='$cc',`id_act_baru`='$ee',`no_pv`='$aa',`remarks`='$gg',`tgl_ubah`='$ff',`id_user`='$bb',`upload_foto`='$uuy',`id_cata`='$hh' 
    WHERE id='$cc' ";

    $folder_target = "file";
    move_uploaded_file($nftemp, $folder_target . "/" . $uuy);
} elseif (!empty($u)) {
    $pecah = explode(".", $u); //pecah[0]=download, pecah[1]=jpg

    $uuy = "Invoice_" . $iuh . "." . $pecah[1];
    $nftemp = $_FILES["file"]["tmp_name"];

    $yy = "UPDATE `tbl_tracking`    
    SET `id`='$cc',`id_act_baru`='$ee',`no_pv`='$aa',`remarks`='$gg',`tgl_ubah`='$ff',`upload_foto`='$uuy',`id_cata`='$hh' 
    WHERE id='$cc' ";

    $folder_target = "file";
    move_uploaded_file($nftemp, $folder_target . "/" . $uuy);
} elseif (!empty($bb)) {
    $yy = "UPDATE `tbl_tracking` 
    SET `id`='$cc',`id_act_baru`='$ee',`no_pv`='$aa',`id_user`='$bb',`remarks`='$gg',`tgl_ubah`='$ff',`id_cata`='$hh' 
    WHERE id='$cc'";
} else {
    $yy = "UPDATE `tbl_tracking` 
    SET `id`='$cc',`id_act_baru`='$ee',`no_pv`='$aa',`remarks`='$gg',`tgl_ubah`='$ff',`id_cata`='$hh' 
    WHERE id='$cc'";
}


$jal = mysqli_query($conn, $yy);

header('Location:' . BASE_URL . '/actbaru/tracking.php?act=' . $act . '&&cat=' . $iu);
