<?php include('../config.php') ?>

<?php
$o = $_GET["kode"];
$oo = $_GET["rol"];

$p = "DELETE FROM tbl_act_baru WHERE id='$o' ";
mysqli_query($conn, $p);
header('Location:' . BASE_URL . '/actbaru/index.php?pv=' . $oo);
?>
