<?php include('../config.php') ?>

<?php
$o = $_GET["kode"];
$oo = $_GET["rol"];

$p = "DELETE FROM tbl_act WHERE id='$o' ";
mysqli_query($conn, $p);
header('Location:' . BASE_URL . '/aktivitas/index.php?pv=' . $oo);
?>
