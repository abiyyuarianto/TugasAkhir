<?php include('../config.php') ?>

<?php
$wo = $_GET["tekode"];
$ow = $_GET["terol"];
$act = $_GET["act"];

$push = "DELETE FROM tbl_tracking WHERE id='$wo' ";
mysqli_query($conn, $push);
header('Location:' . BASE_URL . '/actbaru/tracking.php?act=' . $act . '&&cat=' . $ow);
?>
