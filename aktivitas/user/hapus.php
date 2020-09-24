<?php include('../../config.php') ?>

<?php

$q = $_GET["cek"];
$unc = $_GET["role"];

$w = "DELETE FROM tbl_user WHERE id='$q'";
mysqli_query($conn, $w);
header('Location:' . BASE_URL . '/aktivitas/user/?id=' . $unc);
?>