<?php
$errors = array();
function esc($value)
{
    // bring the global db connect object into function
    global $conn;
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}
if (isset($_POST['asup'])) {
    $e = $_POST["act"];
    $f = $_POST["plan"];
    $g = $_POST["pr"];
    $h = $_POST["pv"];
    $thn = date('Y-m-d', time());

    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');
    if (empty($errors)) {
        $x = "INSERT INTO `tbl_act_baru`
						(`id_cat`, `name_act`, `plan_date`,`nom_pr`,`nom_pv`,`sub_date`)
					VALUES 
                        ('$id', '$e', '$f', '$g','$h', '$thn')";

        $run =    mysqli_query($conn, $x);
        if (!$x) {
            array_push($errors, '<div style="width:30%;margin-bottom:4px;padding:10px;background:#d44950;color:#fff">- Hubungi divisi IT anda</div>');
        } else {
            array_push($errors, '<div style="width:30%;margin-bottom:4px;margin:auto;text-align:center;padding:10px;background:#019961;color:#fff">- Berhasil Menambah Activity-</div>');
        }
    }
}
?>


<div class="modal fade" id="actbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body" style="height:202px">

                    <table class="table1" border="0">
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Activity</label></td>
                            <td><input type="text" name="act" class="form-control" placeholder="Activity"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Planning Date</label></td>
                            <td><input type="date" name="plan" class="form-control" placeholder="Planning"></td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Nominal PR</label></td>
                            <td><input type="number" name="pr" class="form-control" placeholder="PR"> </td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Nominal PV</label></td>
                            <td><input type="number" name="pv" class="form-control" placeholder="PV"> </td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="asup" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>