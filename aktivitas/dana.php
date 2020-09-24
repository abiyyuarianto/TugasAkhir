<?php
$jir = $cek['id'];
$query = mysqli_query($conn, "SELECT * FROM tbl_act WHERE id='$jir'");
//$result = mysqli_query($conn, $query);
while ($aye = mysqli_fetch_array($query)) {

?>


    <div class="modal fade" id="danagw<?php echo $cek['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="height: 309px">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body" style="height:202px">

                        <table class="table1" border="0">

                            <tr>
                                <td><input type="text" name="id" class="form-control" value="<?php echo $aye['id']; ?>" hidden></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">PR</label></td>
                                <td><input type="number" name="pr" class="form-control" value="<?php echo $aye['pr']; ?>" placeholder="Dana PR"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">PV</label></td>
                                <td><input type="number" name="pv" class="form-control" value="<?php echo $aye['pv']; ?>" placeholder="Dana PV"></td>
                            </tr>

                        </table>

                    </div>
                    <div class="modal-footer" style="margin-top:-42px">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary">submit</button>
                    </div>
                <?php
            }
                ?>
                </form>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['add'])) {
        $k = $_POST["pr"];
        $l = $_POST["pv"];
        $m = $_POST["id"];

        $pu = mysqli_query($conn, "UPDATE `tbl_act` 
    SET pr = '$k', 
        pv = '$l'

    WHERE `tbl_act`.`id`='$m'");
        $jalan = mysqli_query($conn, $pu);
    }
    ?>