<?php
if (isset($_POST['buat'])) {
    $a = $_POST["wbs_act"];
    $b = $_POST["plan"];
    // ------------------------
    $c = $_POST["no_pv"];
    if (empty($c)) {
        $c = null;
    }
    // --------------
    $d = $_POST["stat"];
    if (empty($d)) {
        $d = null;
    }

    $e = $_POST["remarks"];
    if (empty($e)) {
        $e = null;
    }
    // --------------
    $g = $_POST["id"];
    if (empty($g)) {
        $g = null;
    }
    // --------------
    $thn = date('Y-m-d', time());

    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

    $l = "INSERT INTO `tbl_act`
(`id_cat`, `name_act`, `plan_date`,`no_pv`, `status`, `note`, `id_user`, `sub_date`) 
VALUES 
    ('$id','$a', '$b', '$c','$d','$e','$g','$thn')";

    $n =    mysqli_query($conn, $l);
}
?>

<div class="modal fade" id="pvgw" style="height: 169%" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 163%;height:51%;margin: 10px -130px auto;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <table class="table1" border="0">
                    <div>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Activity</label></td>
                            <td><input type="text" name="wbs_act" class="form-control" placeholder="Activity"></td>
                        </tr>
                        <!-- <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">WBS Number</label></td>
                            <td><input type="text" name="wbs_number" class="form-control" placeholder="WBS Number"></td>
                        </tr> -->
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Planning Payment Date</label></td>
                            <td><input type="date" name="plan" class="form-control" placeholder="Planning Payment Date"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">No PV</label></td>
                            <td><input type="text" name="no_pv" class="form-control" placeholder="Nomor PV"> </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">User</label></td>
                            <td><input type="text" class="form-control" class="bs" id="srch" placeholder="User">
                                <div class="suggest">

                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td><input type="text" name="id" id="userid" class="form-control" hidden></td>
                        </tr>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Status</label></td>
                            <td>
                                <select name="stat" class="form-control" style="line-height: 6px;">
                                    <option value="pilih">--Pilih---</option>
                                    <option value="verified">Verified Budget</option>
                                    <option value="approve">Approve FDSH</option>
                                    <option value="posted">Post to SAP</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;font-size:16px"><label class="col-form-label">Remarks</label></td>
                            <td><textarea style="margin-left: -10px" name="remarks" id="" cols="64" rows="5"></textarea></td>
                        </tr>
                    </div>
                </table>
                <div class="modal-footer">
                    <div class=" atur_tombol">
                        <button type="button" style="width: 130px" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="buat" type="submit" style="width: 130px" class="btn btn-primary">Submit</button>
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
<script>
    $('#srch').keyup(function(e) {
        var q = $("#srch").val();
        $('#srch').attr('value', q);
        srch(q);
    })

    function baru(id, nama) {
        $('#userid').attr('value', id);
        $('#userid').val(id);
        $('.suggest').empty();
        $('#srch').val(nama);
    }


    function srch(q) {
        if (q) {
            var exe = 's';
            $.ajax({
                url: "<?php echo BASE_URL ?>/assets/ajax/ajax.search.php",
                method: "POST",
                data: {
                    q: q,
                    exe: exe
                },
                success: function(data) {
                    $('.suggest').empty();
                    $('.suggest').append(data)
                },
                error: function() {
                    console.log('error !!');
                }
            });
        } else {
            $('.suggest').empty();
        }
    }
</script>