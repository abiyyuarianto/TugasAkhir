<?php
$wow = $cek['id'];
$query_edit = mysqli_query($conn, "SELECT tbl_act.*, tbl_user.name FROM tbl_act INNER JOIN tbl_user on tbl_user.id = tbl_act.id_user WHERE tbl_act.id = '$wow'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {
?>
    <div class="modal fade" id="editgw<?php echo $cek['id']; ?>" style="height: 160%" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 160%;height:55%;margin: 10px -120px auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="aksiedit.php">
                    <table class="table1" style="width:99%" border="0">
                        <div>
                            <tr>
                                <td><input type="text" name="id_baru" class="form-control" value="<?php echo $row['id']; ?>" hidden></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;font-size:16px"><label class="col-form-label">Activity</label></td>
                                <td><input type="text" name="act" class="form-control" value="<?php echo $row['name_act']; ?>"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="cata" class="form-control" value="<?php echo $row['id_cat']; ?>" hidden></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;font-size:16px"><label class="col-form-label">Planning Payment Date</label></td>
                                <td><input type="date" name="plan" class="form-control" value="<?php echo $row['plan_date']; ?>"></td>
                            </tr>
                            <tr>
                                <td style="text-align: left;font-size:16px"><label class="col-form-label">No PV</label></td>
                                <td><input type="text" name="no" class="form-control" value="<?php echo $row['no_pv']; ?>"> </td>
                            </tr>

                            <tr>
                                <td style="text-align: left;font-size:16px"><label class="col-form-label">User</label></td>
                                <td><input type="text" class="form-control" class="bs" id="src" value="<?php echo $row['name']; ?>" placeholder="User">
                                    <div class="gest">

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="text" name="id_new" id="user" class="form-control" hidden></td>
                            </tr>

                            <tr>
                                <td style="text-align: left;font-size:16px"><label class="col-form-label">Status</label></td>
                                <td>
                                    <select name="tatus" class="form-control" style="line-height: 6px;">
                                        <option value="verified" <?php if ($row['status'] == "verified") {
                                                                        echo "selected";
                                                                    } ?>>Verified Budget</option>
                                        <option value="approve" <?php if ($row['status'] == "approve") {
                                                                    echo "selected";
                                                                } ?>>Approve FDSH</option>
                                        <option value="posted" <?php if ($row['status'] == "posted") {
                                                                    echo "selected";
                                                                } ?>>Post to SAP</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;font-size:16px"><label class="col-form-label">Remarks</label></td>
                                <td><textarea style="margin-left: 2px" name="remarks" id="" cols="64" rows="5"><?php echo $row['note']; ?></textarea></td>
                            </tr>

                        </div>
                    </table>
                    <div class="modal-footer">
                        <div class=" atur_tombol">
                            <button type="button" style="width: 130px" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="simpan" type="submit" style="width: 130px" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#src').keyup(function(ee) {
            var q = $("#src").val();
            $('#src').attr('value', q);
            src(q);
        })

        function anyar(id, nama) {
            $('#user').attr('value', id);
            $('#user').val(id);
            $('.gest').empty();
            $('#src').val(nama);
        }


        function src(qq) {
            if (qq) {
                var emb = 'ss';
                $.ajax({
                    url: "<?php echo BASE_URL ?>/assets/ajax/search.php",
                    method: "POST",
                    data: {
                        qq: qq,
                        emb: emb
                    },
                    success: function(data) {
                        $('.gest').empty();
                        $('.gest').append(data)
                    },
                    error: function() {
                        console.log('error !!');
                    }
                });
            } else {
                $('.gest').empty();
            }
        }
    </script>
    <!-- //script -->