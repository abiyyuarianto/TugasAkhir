<?php include('../../config.php'); ?>
<?php
$ide = $_GET['ide'];
$tracke = $_GET['tracke'];
$kodee = $_GET['kodee'];
$edit = $_GET['edit'];
// id send status

$push = "DELETE FROM tbl_status_verif WHERE id='$edit' ";
mysqli_query($conn, $push);
header('Location:' . BASE_URL . '/actbaru/status/status.php?id=' . $ide . '&&kode=' . $kodee . '&&track=' . $tracke);
?>