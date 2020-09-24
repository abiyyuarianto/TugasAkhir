<?php include('../config.php') ?>
<?php include '../assets/css/buat_dasboard.php' ?>


<?php
$act = $_GET["act"];
$cat = $_GET["cat"];
?>

<div class="container-fluid">
    <?php
    $anyar = mysqli_query($conn, "SELECT * FROM tbl_act_baru  where id = '$act' ");
    while ($cek  = mysqli_fetch_assoc($anyar)) { ?>
        <div class="row">
            <div class="col-md-4" style="text-align:center;margin-top:12px">
                <?php echo "<a href=\"index.php?pv= $cat\">"; ?><i class="fas fa-backward" style="font-size:46px;margin-top:6px"></i></a>
            </div>

            <div class="col-md-12" style="text-align:center;margin-top:12px">
                <h2 style="font-family: monospace;letter-spacing:1px"><u>Tracking Payment Voucher - <?php echo $cek["name_act"]; ?></u> </h2>

            </div>


        </div>


        <div class="row">
            <div class="col-md-8" style="text-align:center;margin:auto">
                <form class="grid" action="aksi_tambah.php?id=<?php echo $cek["id"] ?>&&pv=<?php echo $cek["id_cat"] ?>&&nama=<?php echo $cek["name_act"] ?>" method="POST" enctype="multipart/form-data">

                    <div class="uyuy">

                        <label style="font-weight:600" class="col-form-label">Number PV</label>
                        <input type="text" name="num" class="form-control" placeholder="Number" required>

                        <label style="font-weight:600" class="col-form-label">User</label>
                        <!-- <input type="text" class="form-control" class="bs" id="srch" placeholder="User">
                    <div class="suggest">

                    </div>

                    <input type="text" name="id" id="userid" class="form-control" hidden> -->

                        <input type="text" class="form-control" class="bs" id="src" placeholder="User" required>
                        <div class="gest">

                        </div>
                        <input type="text" name="id" id="user" class="form-control" hidden>


                        <label style="font-weight:600" class="col-form-label">Upload Invoice</label>
                        <input type="file" name="file" class="form-control" title="JPG/PNG" placeholder="Activity" required>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <label style="font-weight:600" class="col-form-label">Remarks</label>
                        </div>
                        <div class="col-md-12">
                            <textarea name="remarks" id="" cols="40" rows="6"></textarea>
                        </div>
                        <div class="col-md-12">
                            <?php
                            $any = mysqli_query($conn, "SELECT * FROM tbl_tracking where id_act_baru = '$act' ");
                            $data = mysqli_fetch_assoc($any);
                            if (!empty($data)) { ?>
                                <button type="submit" style="width: 80%;margin-left:1px;margin-top:12px" class="btn btn-primary" disabled>Submit</button>
                            <?php
                            } else { ?>
                                <button type="submit" style="width: 80%;margin-left:1px;margin-top:12px" class="btn btn-primary" onclick="return confirm('Anda yakin akan menambah data ini?')">Submit</button>
                            <?php }
                            ?>
                        </div>

                    </div>
                </form>
            </div>
        </div>


        <!-- grid ke 2 -->
        <hr style="width:64%">
        <div class="row">

            <div class="col-md-10" style="padding: 7px 8px; margin:auto;margin-right:80px;">
                <?php
                $eek = $act;

                $nau = mysqli_query($conn, "SELECT tbl_tracking.*,tbl_user.name FROM tbl_tracking INNER JOIN tbl_user ON tbl_user.id = tbl_tracking.id_user  where id_act_baru = '$eek' ");
                while ($uut  = mysqli_fetch_assoc($nau)) { ?>


                    <table class="table2" border="1">
                        <tr>
                            <td colspan="4" style="font-family:Arial, Helvetica, sans-serif">
                                <h5 style="color: black;">Tabel Tracking Payment Voucher</h5>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;width:280px;font-weight:600;width:135px"><label class="col-form-label">Number PV</label></td>
                            <td style="text-align: centert;font-weight:600;width:210px"><label class="col-form-label">User</label></td>
                            <td style="text-align: center;font-weight:600;width:330px"><label class="col-form-label">Remarks</label></td>
                            <td style="text-align: center;font-weight:600"><label class="col-form-label">Invoice</label></td>
                        </tr>
                        <tr>
                            <td style="text-align: center"><label class="col-form-label"><?php echo $uut['no_pv']; ?></label></td>
                            <td style="text-align: center;"><label class="col-form-label"><?php echo $uut['name']; ?></label></td>
                            <td style="text-align: left"><label class="col-form-label"><?php echo $uut['remarks']; ?></label></td>
                            <td style="text-align: center"><img id="myImg" src="<?php echo "file/" . $uut['upload_foto']; ?>" style="width:60%"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:center;background-color:white ">

                                <button type="button" style="width: 49px;border:none;margin-left:4px;margin-right:6px;background:none">
                                    <a href="status/status.php?id=<?php echo $uut["id_act_baru"] ?>&&kode=<?php echo $cek["id_cat"] ?>&&track=<?php echo $uut["id"] ?>">
                                        <cite title="Tracking"><i class="fas fa-comment-dots" style="color:lawngreen;font-size:28px;"></i></cite>
                                    </a>
                                </button>

                                <a href="#" type="button" data-toggle="modal" data-target="#track<?php echo $uut['id']; ?>" style="width: 49px;border:none;margin-left:-4px;margin-right:7px;background:none"><cite title="Edit"><i class="fa fa-edit" style="color:dodgerblue;font-size:27px; margin:auto;"> </i></cite></a>

                                <button type="button" style="width: 40px;border:none;margin-left:-4px;background:none">
                                    <a href="delete_modal.php?tekode=<?php echo $uut["id"] ?>&&terol=<?php echo $cek["id_cat"] ?>&&act=<?php echo $cek["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                        <cite title="Delete"><i class="fas fa-trash-restore-alt" style="color:firebrick;font-size:27px;"></i></cite>
                                    </a>
                                </button>

                                <?php include 'modal_track.php' ?>
                            </td>

                        </tr>

                    </table>
                <?php } ?>
            <?php   } ?>
            <!-- <div id="myModal" class="tampil">
                    <span class="tutup">&times;</span>
                    <img class="berjuang" id="img01">
                    <div id="caption"></div>
                </div> -->

            </div>
        </div>
        <br>
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
                url: "<?php echo BASE_URL ?>/assets/ajax/cariawal.php",
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
<?php include '../inc/footer.php' ?>