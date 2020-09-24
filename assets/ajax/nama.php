<?php include('../../config.php');
$kurung = $_GET['kurung'];
$query = "SELECT * FROM tbl_user";
$user = mysqli_query($conn, $query);
?>

<table border="0" style="width: 100%;font-size:16pt;font-family:serif;font-weight:600">
    <thead>
        <tr style="text-align: center; padding:20px">
            <th style="width: 100px">No</th>
            <th>Name</th>
            <th style="width: 210px">Aksi</th>
        </tr>
    </thead>

    <?php
    $no = 1;
    $d = mysqli_query($conn, "SELECT * FROM tbl_user");
    while ($c  = mysqli_fetch_assoc($d)) { ?>

        <tbody style="width: 100%;font-family:Cambria, Cochin, Georgia, Times,'serif'">
            <tr id="myUL">
                <td>
                    <p><?php echo $no ?></p>
                </td>
                <td>
                    <p><?php echo $c['name']; ?></p>
                </td>
                <td> <a href="#" type="button" data-toggle="modal" data-target="#usergw<?php echo $c['id']; ?>" style="width:39px;border:none;margin-left:10px;margin-right:0px;background:none"> <i class="fas fa-user-edit" style="color:dodgerblue;font-size:21px; margin-right:9px"> </i></a>
                    <?php include 'ubah.php' ?>
                    <?php echo "<a href=\"hapus.php?cek=" . $c["id"] . "\">"; ?>
                    <i class="fas fa-user-minus" style="color:firebrick;font-size:21px;"></i>
                    </a>
                </td>
            </tr>
        </tbody>
        <?php $no++; ?>
    <?php } ?>
</table>