<?php include('../../config.php');
?>
<?php
$ide = $_GET['id'];
$tracke = $_GET['track'];
$kodee = $_GET['kode'];

if (isset($_POST['edit29'])) {
    $ga = $_POST["ide"];
    $ha = $_POST["id_tracking"];
    $ia = $_POST["status"];
    $ja = $_POST["note"];
    $ka = $_POST["tgll"];

    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

    $xi = mysqli_query($conn, "UPDATE `tbl_status_send` SET `id`='$ga',`id_tracking`='$ha',`status`='$ia',`note`='$ja',`tanggal`='$ka' WHERE id ='$ga' ");

    $rn = mysqli_query($conn, $xi);
}
header('Location:' . BASE_URL . '/actbaru/status/status.php?id=' . $ide . '&&kode=' . $kodee . '&&track=' . $tracke);
