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

if (isset($_POST['masuk'])) {
    $e = esc($_POST["act"]);
    $sql = mysqli_query($conn, "SELECT * FROM tbl_act_cat WHERE act = '$e' && tahun = $tahun");
    if (mysqli_num_rows($sql)) {
        array_push($errors, '<div style="width:30%;position:absolute;margin-top:7px;padding:10px;background:#d44950;color:#fff">- Category sudah digunakan, coba yang lain-</div>');
    }
    $f = esc($_POST["num"]);
    $sql = mysqli_query($conn, "SELECT * FROM tbl_act_cat WHERE wbs_num = '$f' && tahun = $tahun");
    if (mysqli_num_rows($sql)) {
        array_push($errors, '<div style="width:30%;position:absolute;margin-top:7px;padding:10px;background:#d44950;color:#fff">- WBS Number sudah digunakan, coba yang lain-</div>');
    }
    $g = $_POST["mas"];
    $h = $_POST["thn"];

    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');
    if (empty($errors)) {
        $x = "INSERT INTO `tbl_act_cat`
						(`act`, `wbs_num`, `mas_bud`,tahun)
					VALUES 
                        ('$e', '$f', '$g','$h')";
        $run =    mysqli_query($conn, $x);
        if (!$x) {
            array_push($errors, '<div style="width:30%;position:absolute;margin-top:7px;padding:10px;background:#d44950;color:#fff">- Hubungi divisi IT anda</div>');
        } else {
            array_push($errors, '<div style="width:30%;position:absolute;margin-top:7px;padding:10px;background:#019961;color:#fff">- Berhasil Membuat Category-</div>');
        }
    }
}
?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="">
                <div class="modal-body" style="height:202px">

                    <table class="table1" border="0">
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Category</label></td>
                            <td><input type="text" name="act" class="form-control" placeholder="Category" required></td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">WBS Number</label></td>
                            <td><input type="text" name="num" class="form-control" placeholder="WBS Number" required></td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Master Budget</label></td>
                            <td><input type="text" name="mas" class="form-control" placeholder="Master Budget" required> </td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><label class="col-form-label">Tahun</label></td>
                            <td><input type="number" name="thn" class="form-control" placeholder="Tahun" required> </td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="masuk" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>