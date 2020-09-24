<?php
$id = $c['id'];
$query_edit = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {
?>
    <div class="modal fade" id="usergw<?php echo $c['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">

                    <div class="modal-body" style="height:102px ">
                        <table style="width: 100%" border="0">
                            <tr>
                                <td><input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" hidden></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;font-size:15pt"><label class="col-form-label">Name :</label></td>
                            </tr>
                            <tr style="margin-bottom:12px">
                                <td><input type="text" name="nama" class="form-control" value="<?php echo $row['name']; ?>"></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="ubah" class="btn btn-primary" onclick="return confirm('Anda yakin akan mengubah data ini?')">Edit</button>
                    </div>
                <?php
            }
            //mysql_close($host);
                ?>
                </form>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['ubah'])) {
        $i = $_POST["nama"];
        $m = $_POST["id"];

        $y = mysqli_query($conn, "UPDATE `tbl_user` SET name = '$i' 
    WHERE `tbl_user`.`id`='$m'");

        $jalan = mysqli_query($conn, $y);
        if ($jalan) {
            echo 'Berhasil Update Data';
        }
    }
