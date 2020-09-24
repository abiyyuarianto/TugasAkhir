<?php
$id = $cek['id'];
$query_edit = mysqli_query($conn, "SELECT * FROM tbl_act_baru WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {
?>
    <div class="modal fade" id="editbaru<?php echo $cek['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="aksi_edit_baru.php">

                    <div class="modal-body" style="height:202px">
                        <table class="table1" border="0">

                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Activity</label></td>
                                <td><input type="text" name="act" class="form-control" value="<?php echo $row['name_act']; ?>"></td>
                                <td><input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" hidden></td>
                            </tr>

                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Planning Date</label></td>
                                <td><input type="date" name="plan" class="form-control" value="<?php echo $row['plan_date']; ?>"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Nominal PR</label></td>
                                <td><input type="number" name="preuy" class="form-control" value="<?php echo $row['nom_pr']; ?>"> </td>
                                <td><input type="text" name="sub" class="form-control" value="<?php echo $row['sub_date']; ?>" hidden></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Nominal PV</label></td>
                                <td><input type="number" name="pveuy" class="form-control" value="<?php echo $row['nom_pv']; ?>"> </td>
                                <td><input type="text" name="cata" class="form-control" value="<?php echo $row['id_cat']; ?>" hidden></td>
                            </tr>



                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-primary" onclick="return confirm('Anda yakin akan mengubah data ini?')">Edit</button>
                    </div>
                <?php
            }
                ?>
                </form>
            </div>
        </div>
    </div>