<?php
$oot = $uut['id'];
$quer = mysqli_query($conn, "SELECT tbl_tracking.*, tbl_user.name FROM tbl_tracking INNER JOIN tbl_user on tbl_user.id = tbl_tracking.id_user WHERE tbl_tracking.id = '$oot'");
//$result = mysqli_query($conn, $query);
while ($bear = mysqli_fetch_array($quer)) {
?>

    <div class="modal fade" id="track<?php echo $uut['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 111%">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tracking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="edit_modal.php?pv=<?php echo $cek["id_cat"] ?>&&nama=<?php echo $cek["name_act"] ?>&&act=<?php echo $act ?>" enctype="multipart/form-data">

                    <div class="modal-body" style="height:328px;width:600px;margin-left:-27px">

                        <table class="table2" border="0">
                            <tr>
                                <td style="text-align: left"><label style="font-weight:500" class="col-form-label">Number PV</label></td>
                                <td><input type="text" name="ber" class="form-control" value="<?php echo $bear['no_pv']; ?>"></td>

                            </tr>
                            <tr>
                                <td style="text-align: left"><label style="font-weight:500" class="col-form-label">User</label></td>
                                <td><input type="text" class="form-control" name="user1" class="bs" id="srch" value="<?php echo $bear['name']; ?>">
                                    <div class="suggest">

                                    </div>

                                </td>


                            </tr>
                            <tr>
                                <td> <input type="text" name="us" id="userid" class="form-control" hidden></td>
                                <td><input type="text" name="id_lama" class="form-control" value="<?php echo $bear['id']; ?>" hidden></td>
                            </tr>

                            <tr>
                                <td style="text-align: left"><label style="font-weight:500" class="col-form-label"> Invoice</label></td>
                                <td> <input type="file" name="file" class="form-control" <?php echo $bear['upload_foto']; ?>> </td>

                            </tr>
                            <tr>
                                <td><input type="text" name="id_new" class="form-control" value="<?php echo $bear['id_act_baru']; ?>" hidden></td>
                                <td>
                                    <input type="text" name="tgl" class="form-control" value="<?php echo $bear['tgl_ubah']; ?>" hidden>
                                    <input type="text" name="cata" class="form-control" value="<?php echo $bear['id_cata']; ?>" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left"> <label style="font-weight:500" class="col-form-label">Remarks</label></td>
                                <td> <textarea style="margin-left:-19px;" name="note" id="" cols="39" rows="6"><?php echo $bear['remarks']; ?></textarea></td>
                            </tr>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin akan mengubah data ini?')">Edit</button>
                    </div>
                <?php } ?>
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