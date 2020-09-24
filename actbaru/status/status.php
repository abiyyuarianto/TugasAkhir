<?php include('../../config.php') ?>
<?php include '../../assets/css/buat_dasboard.php' ?>

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
$id = $_GET['id'];
$track = $_GET['track'];
$kode = $_GET['kode'];
?>

<div style=" width:97vw; height:90vh; margin: 19px auto;">
    <div style=" box-shadow: 0 0 5px 0px black;padding:10px; ">
        <div class="card-head">

            <a href="../index.php?pv=<?php echo $kode ?>">
                <label style="font-family:Arial, Helvetica, sans-serif;font-size:20pt;margin:8px 4px auto;cursor:pointer">Back</label>
            </a>


            <?php
            $baru = mysqli_query($conn, " SELECT * FROM tbl_act_baru where id='$id'");
            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                <div style="font-family:Arial, Helvetica, sans-serif;font-size:25pt;margin:-55px 20px auto;text-align:center;padding: 11px 20px;float:left;width:100%">
                <?php echo "Status&nbsp" . $re['name_act'];
            } ?>
                </div>

        </div>
        <div class="joko">
            <?php

            if (isset($_POST['ganti1'])) {

                $bagas = $_POST["status"];
                $catat = $_POST["note"];
                $thnn = date('Y-m-d', time());
                //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

                $xui = "INSERT INTO `tbl_status_send`(`id_tracking`, `status`, `note`, `tanggal`)
                VALUES 
                    ('$track', '$bagas', '$catat','$thnn') ";


                $rn =    mysqli_query($conn, $xui);
            }
            ?>
            <div class="conten" style="position:absolute">
                <div class="kartu-atas">
                    <label for=""> Send</label>
                </div>

                <form method="POST" action="status.php?id=<?php echo $id ?>&&kode=<?php echo $kode ?>&&track=<?php echo $track ?>">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status" class="form-check" value="aktif" required>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note" id="" cols="42" rows="5"></textarea>
                        <br>

                    </div>
                    <div class="kartu-bawah">

                        <?php
                        $any = mysqli_query($conn, "SELECT * FROM tbl_status_send where id_tracking = '$track' ");
                        $data = mysqli_fetch_assoc($any);
                        if (!empty($data)) { ?>
                            <input type="submit" class="but" name="ganti1" value="change" id="" disabled>
                        <?php
                        } else { ?>
                            <input type="submit" class="but" name="ganti1" value="change" id="" onclick="return confirm('Anda yakin akan memperbaharui status payment voucher?')">
                        <?php }
                        ?>

                    </div>
                </form>

            </div>
            <!-- halaman baru -->
            <?php

            if (isset($_POST['ganti2'])) {

                $bagas = $_POST["status2"];
                $catat = $_POST["note2"];
                $thnn = date('Y-m-d', time());
                //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

                $xui = "INSERT INTO `tbl_status_verif`(`id_tracking`, `status`, `note`, `tanggal`)
                VALUES 
                    ('$track', '$bagas', '$catat','$thnn') ";


                $rn =    mysqli_query($conn, $xui);
            }

            ?>
            <div class="conten" style="position:absolute;margin-left:322px">
                <div class="kartu-atas">
                    <label for=""> Verification</label>
                </div>
                <form action="" method="POST">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status2" class="form-check" value="aktif" required>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note2" id="" cols="42" rows="5"></textarea>
                    </div>

                    <div class="kartu-bawah">
                        <?php
                        $any = mysqli_query($conn, "SELECT * FROM tbl_status_verif where id_tracking = '$track' ");
                        $data = mysqli_fetch_assoc($any);
                        if (!empty($data)) { ?>
                            <input type="submit" class="but" name="ganti2" value="change" id="" disabled>
                        <?php
                        } else { ?>
                            <input type="submit" class="but" name="ganti2" value="change" id="" onclick="return confirm('Anda yakin akan memperbaharui status payment voucher?')">
                        <?php }
                        ?>

                    </div>
                </form>
            </div>
            <!-- halaman baru -->
            <?php
            if (isset($_POST['ganti3'])) {

                $bagas = $_POST["status3"];
                $catat = $_POST["note3"];
                $thnn = date('Y-m-d', time());
                //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

                $xui = "INSERT INTO `tbl_status_posted`(`id_tracking`, `status`, `note`, `tanggal`)
                VALUES 
                    ('$track', '$bagas', '$catat','$thnn') ";


                $rn =    mysqli_query($conn, $xui);
            }
            ?>
            <div class="conten" style="position:absolute;margin-left:648px">
                <div class="kartu-atas">
                    <label for=""> Posted</label>
                </div>
                <form action="" method="POST">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status3" class="form-check" value="aktif" required>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note3" id="" cols="42" rows="5"></textarea>
                    </div>

                    <div class="kartu-bawah">
                        <?php
                        $any = mysqli_query($conn, "SELECT * FROM tbl_status_posted where id_tracking = '$track' ");
                        $data = mysqli_fetch_assoc($any);
                        if (!empty($data)) { ?>
                            <input type="submit" class="but" name="ganti3" value="change" id="" disabled>
                        <?php
                        } else { ?>
                            <input type="submit" class="but" name="ganti3" value="change" id="" onclick="return confirm('Anda yakin akan memperbaharui status payment voucher?')">
                        <?php }
                        ?>
                    </div>
                </form>
            </div>
            <!-- halaman baru -->
            <?php
            if (isset($_POST['ganti4'])) {

                $bagas = $_POST["status4"];
                $catat = $_POST["note4"];
                $thnn = date('Y-m-d', time());
                //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

                $xui = "INSERT INTO `tbl_status_transfer`(`id_tracking`, `status`, `note`, `tanggal`)
                VALUES 
                    ('$track', '$bagas', '$catat','$thnn') ";

                $rn =    mysqli_query($conn, $xui);
            }
            ?>
            <div class="conten" style="margin-right:3px">
                <div class="kartu-atas">
                    <label for=""> Transfer</label>
                </div>
                <form action="" method="POST">
                    <div class="kartu-tengah">
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Turn On</label>
                        <input type="checkbox" name="status4" class="form-check" value="aktif" required>
                        <label style="font-weight:300;font-size:11pt" class="col-form-label">Note</label>
                        <textarea style="margin-left:-102px;font-size:10pt" name="note4" id="" cols="42" rows="5"></textarea>
                    </div>

                    <div class="kartu-bawah">
                        <?php
                        $any = mysqli_query($conn, "SELECT * FROM tbl_status_transfer where id_tracking = '$track' ");
                        $data = mysqli_fetch_assoc($any);
                        if (!empty($data)) { ?>
                            <input type="submit" class="but" name="ganti4" value="change" id="" disabled>
                        <?php
                        } else { ?>
                            <input type="submit" class="but" name="ganti4" value="change" id="" onclick="return confirm('Anda yakin akan memperbaharui status payment voucher?')">
                        <?php }
                        ?>
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
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$track'");
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

                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$track'");
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
                            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$track'");
                            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                                $idih = 'tidak aktif';
                                if ($re['status'] != 'aktif') {
                                    echo $idih;
                                } else {
                                    echo $re['status'];
                                }
                            } ?></td>
                    <td> <?php
                            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$track'");
                            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                                $idih = 'tidak aktif';
                                if ($re['status'] != 'aktif') {
                                    echo $idih;
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
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            echo $re['note'];
                        } ?>
                    </td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            echo $re['note'];
                        } ?>
                    </td>
                    <td> <?php
                            $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$track'");
                            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                                echo $re['note'];
                            } ?></td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                        <?php
                            echo $re['note'];
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                            <a style="text-decoration: none" href="edit_send.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>">Edit</a>
                            <label for="">|</label>
                            <a style="color: red;text-decoration:none" href="delete_send.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                            <a style="text-decoration: none" href="edit_verif.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>">Edit</a>
                            <label for="">|</label>
                            <a style="color: red;text-decoration:none" href="delete_verif.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                            <a style="text-decoration: none" href="edit_posted.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>">Edit</a>
                            <label for="">|</label>
                            <a style="color: red;text-decoration:none" href="delete_posted.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$track'");
                        while ($re  = mysqli_fetch_assoc($baru)) { ?>
                            <a style="text-decoration: none" href="edit_transfer.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>">Edit</a>
                            <label for="">|</label>
                            <a style="color: red;text-decoration:none" href="delete_transfer.php?edit=<?php echo $re['id']; ?>&&ide=<?php echo $id; ?>&&tracke=<?php echo $track; ?>&&kodee=<?php echo $kode; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>