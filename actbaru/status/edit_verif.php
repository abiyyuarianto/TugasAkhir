<?php include('../../config.php');
include '../../assets/css/buat_dasboard.php' ?>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 99%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }



    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>


<?php
$ide = $_GET['ide'];
$tracke = $_GET['tracke'];
$kodee = $_GET['kodee'];
$edit = $_GET['edit'];
// id send status
?>

<div style=" width:97vw; height:90vh; margin: 19px auto;">
    <div style=" box-shadow: 0 0 5px 0px black;padding:10px; ">
        <div class="card-head">

            <?php
            $baru = mysqli_query($conn, " SELECT * FROM tbl_act_baru where id='$ide'");
            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                <div style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:19pt;margin:-4px 2px auto;text-align:center;padding: 11px 20px;float:left">
                <?php echo "Edit Status&nbsp" . $re['name_act'];
            } ?>
                </div>

        </div>
        <div class="joko">

            <div class="conten" style="position:absolute">
                <div class="kartu-atas">
                    <label for=""> Send</label>
                </div>

                <form method="POST" action="">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status" class="form-check" value="aktif" disabled>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note" id="" cols="42" rows="5" disabled></textarea>
                        <br>

                    </div>
                    <div class="kartu-bawah">

                        <input type="submit" class="but" value="change" disabled>
                    </div>
                </form>

            </div>

            <!-- halaman baru -->
            <?php
            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id='$edit'");
            while ($ubah = mysqli_fetch_assoc($baru)) { ?>
                <div class="conten" style="position:absolute;margin-left:322px">
                    <div class="kartu-atas">
                        <label for=""> Verification</label>
                    </div>
                    <form action="aksi_edit_verif.php?id=<?php echo $ide ?>&&track=<?php echo $tracke ?>&&kode=<?php echo $kodee ?>" method="POST">
                        <div class="kartu-tengah">
                            <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                            <input type="text" name="ide" class="form-control" value="<?php echo $ubah["id"] ?> " hidden>
                            <input type="text" name="id_tracking" class="form-control" value="<?php echo $ubah["id_tracking"] ?>" hidden>
                            <input type="text" name="tgll" class="form-control" value="<?php echo $ubah["tanggal"] ?>" hidden>
                            <input type="checkbox" name="status" class="form-check" value="aktif" <?php
                                                                                                    if ($ubah['status'] == "aktif") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                            <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                            <textarea style="margin-left:-104px;font-size:10pt" name="note" id="" cols="42" rows="5"><?php echo $ubah['note']; ?></textarea> </div>
                        <div class="kartu-bawah">
                            <input type="submit" class="but" name="ganti2" value="edit">
                        </div>
                    </form>
                </div>
            <?php } ?>
            <!-- halaman baru -->

            <div class="conten" style="position:absolute;margin-left:648px">
                <div class="kartu-atas">
                    <label for=""> Posted</label>
                </div>
                <form action="" method="POST">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status3" class="form-check" value="aktif" disabled>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note" id="" cols="42" rows="5" disabled></textarea>
                    </div>

                    <div class="kartu-bawah">
                        <input type="submit" class="but" name="ganti3" value="change" id="" disabled>
                    </div>
                </form>
            </div>
            <!-- halaman baru -->

            <div class="conten" style="margin-right:3px">
                <div class="kartu-atas">
                    <label for=""> Transfer</label>
                </div>
                <form action="" method="POST">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status4" class="form-check" value="aktif" disabled>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note" id="" cols="42" rows="5" disabled></textarea>
                    </div>

                    <div class="kartu-bawah">
                        <input type="submit" class="but" name="ganti4" value="change" disabled>
                    </div>
                </form>
            </div>
            <!-- halaman baru -->



        </div>
        <div>
            <table id="customers" border="1" style="width: 99%;margin:auto;">
                <tr>
                    <th style="width: 25%;text-align:center">SEND </th>
                    <th style="width: 25%;text-align:center">VERIFICATION</th>
                    <th style="width: 25%;text-align:center">POSTED</th>
                    <th style="width: 25%;text-align:center">TRANSFER</th>
                </tr>
                <tr>
                    <td style="text-align: left"><label for="">STATUS &nbsp;:</label></td>
                    <td style="text-align: left"><label for="">STATUS &nbsp;:</label></td>
                    <td style="text-align: left"><label for="">STATUS &nbsp;:</label></td>
                    <td style="text-align: left"><label for="">STATUS &nbsp;:</label></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$tracke'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            if (empty($re['status'])) {
                                echo '-';
                            } else {
                                echo $re['status'];
                            }
                        } ?>
                    </td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$tracke'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            if (empty($re['status'])) {
                                echo '-';
                            } else {
                                echo $re['status'];
                            }
                        } ?>
                    </td>
                    <td> <?php
                            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$tracke'");
                            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                                if (empty($re['status'])) {
                                    echo '-';
                                } else {
                                    echo $re['status'];
                                }
                            } ?></td>
                    <td> <?php
                            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$tracke'");
                            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                                if (empty($re['status'])) {
                                    echo '-';
                                } else {
                                    echo $re['status'];
                                }
                            } ?></td>
                </tr>
                <tr>
                    <td style="text-align: left">NOTE &nbsp;:</td>
                    <td style="text-align: left">NOTE &nbsp;:</td>
                    <td style="text-align: left">NOTE &nbsp;:</td>
                    <td style="text-align: left">NOTE &nbsp;:</td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$tracke'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            echo $re['note'];
                        } ?>
                    </td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$tracke'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            echo $re['note'];
                        } ?>
                    </td>
                    <td> <?php
                            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$tracke'");
                            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                                echo $re['note'];
                            } ?></td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$tracke'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            echo $re['note'];
                        } ?>
                    </td>
                </tr>

                </tr>
            </table>
        </div>
    </div>
</div>