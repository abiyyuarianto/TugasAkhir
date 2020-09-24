<?php
if (isset($_POST['make'])) {
    $aa = $_POST["wbs_ac"];
    // $b = $_POST["wbs_number"];
    $bb = $_POST["pla"];
    $cc = $_POST["remark"];
    $thn1 = date('Y-m-d', time());

    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');


    $ll = "INSERT INTO `tbl_act`(`id`, `id_cat`, `pr`, `pv`, `name_act`, `id_user`, `no_pv`, `sub_date`, `plan_date`, `status`, `note`) VALUES (NULL,'$id',NULL,NULL,'$aa',NULL,NULL,'$thn1','$bb',NULL,NULL)";
    $nn =    mysqli_query($conn, $ll);
}
?>

<div class="modal fade" id="danapr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 163%;height:60%;margin: 10px -130px auto;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Activity PR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <table class="table1" border="0">
                    <div>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Activity</label></td>
                            <td><input type="text" name="wbs_ac" class="form-control" placeholder="Activity"></td>
                        </tr>
                        <!-- <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">WBS Number</label></td>
                            <td><input type="text" name="wbs_number" class="form-control" placeholder="WBS Number"></td>
                        </tr> -->
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Planning Payment Date</label></td>
                            <td><input type="date" name="pla" class="form-control" placeholder="Planning Payment Date"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Remarks</label></td>
                            <td><textarea style="margin-left: -10px" name="remark" id="" cols="64" rows="5"></textarea></td>
                        </tr>
                    </div>
                </table>
                <div class="modal-footer">
                    <div class=" atur_tombol">
                        <button type="button" style="width: 130px" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="make" type="submit" style="width: 130px" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- <div style="margin-top:24px; margin-left:513px;">
                    <button type="button" style="width: 130px" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" style="width: 130px" class="btn btn-info">Edit</button>
                </div> -->
            </form>
        </div>
    </div>
</div>