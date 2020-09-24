<?php include('../config.php') ?>

<?php
$tahun = date('Y', time());
$o = $_GET["kode"];
$p = "DELETE FROM tbl_act_cat WHERE id='$o'";
mysqli_query($conn, $p);
header('Location:' . BASE_URL . '/categori/?tahun=' . $tahun);
?>