<?php
$id = $rec['id'];
$query_edit = mysqli_query($conn, "SELECT * FROM tbl_act_cat WHERE id='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {
?>
    <div class="modal fade" id="punyagw<?php echo $rec['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="aksi_edit.php">

                    <div class="modal-body" style="height:272px">
                        <table class="table1" border="0">
                            <tr>
                                <td><input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" hidden></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Activity</label></td>
                                <td><input type="text" name="act" class="form-control" value="<?php echo $row['act']; ?>" required></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">WBS Number</label></td>
                                <td><input type="text" name="num" class="form-control" value="<?php echo $row['wbs_num']; ?>" required></td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Master Budget</label></td>
                                <td><input type="text" name="mas" class="form-control" value="<?php echo $row['mas_bud']; ?>" required> </td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Year</label></td>
                                <td><input type="number" name="thn" class="form-control" value="<?php echo $row['tahun']; ?>" required> </td>
                            </tr>
                            <tr>
                                <td style="text-align: left"><label class="col-form-label">Deactivate</label></td>
                                <td> <input style="border: 1px solid black;" type="checkbox" name="aktif" value="aktif" class="form-check" <?php
                                                                                                                                            if ($row['active'] == "aktif") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>></td>
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