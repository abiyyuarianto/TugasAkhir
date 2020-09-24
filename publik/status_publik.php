<div style="border-top: 2px solid green;border-bottom: 2px solid green" id="collapseOon<?php echo $cek['id']; ?>" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
    <h4 style="font-family: Trebuchet MS ;padding:19px 20px">Tracking Payment voucher - <?php echo $cek['name_act']; ?></h4>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- tanggal -->
    <?php
    $jong = '<i class="fa fa-home" style="color:firebrick;font-size:31px;"> </i>';
    $seno2 = 0;
    // -----------
    $senyorita = 0;
    ?>



    <table style="width: 100%">
        <tr>
            <td style="width:10%">Proses</td>
            <td style="width:18%">Invoice</td>
            <td style="width:18%">Send To Loket</td>
            <td style="width:18%">Verification</td>
            <td style="width:18%">Posted</td>
            <td style="width:18%">Transfer</td>
        </tr>
        <tr>
            <td>Date</td>
            <td>
                <?php echo tanggal_indo($cek['tgl_ubah'], true) ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo tanggal_indo($iuh['tanggal'], true) ?></label>
                <?php } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo tanggal_indo($iuh['tanggal'], true) ?></label>
                <?php } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo tanggal_indo($iuh['tanggal'], true) ?></label>
                <?php } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo tanggal_indo($iuh['tanggal'], true) ?></label>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <a href="#" type="button" data-toggle="modal" data-target="#invoice<?php echo $cek['id']; ?>" style="width:39px;border:none;margin-left:10px;margin-right:0px;background:none"><i class="fa fa-file" style="color:green;font-size:30px;"> </i></a>
                <?php include('invoice.php') ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) {
                    if ($iuh["status"] == 'aktif') {
                        echo '<i class="fa fa-home" style="color:green;font-size:36px;"> </i>';
                    }
                } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) {
                    if ($iuh["status"] = 'aktif') {
                        echo '<i class="fa fa-check" style="color:green;font-size:36px;"> </i>';
                    } elseif (empty($iuh["status"])) {
                        echo '<i class="fa fa-check" style="color:firebrick;font-size:36px;"> </i>';
                    } else {
                        echo '<i class="fa fa-check" style="color:firebrick;font-size:36px;"> </i>';
                    }
                } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) {
                    if ($iuh["status"] = 'aktif') {
                        echo '<i class="fa fa-upload" style="color:green;font-size:31px;"> </i>';
                    } elseif (empty($iuh["status"])) {
                        echo '<i class="fa fa-upload" style="color:firebrick;font-size:31px;"> </i>';
                    } else {
                        echo '<i class="fa fa-upload" style="color:firebrick;font-size:31px;"> </i>';
                    }
                } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) {
                    if ($iuh["status"] = 'aktif') {
                        echo '<i class="fa fa-send" style="color:green;font-size:31px;"> </i>';
                    } elseif (empty($iuh["status"])) {
                        echo '<i class="fa fa-send" style="color:firebrick;font-size:31px;"> </i>';
                    } else {
                        echo '<i class="fa fa-send" style="color:firebrick;font-size:31px;"> </i>';
                    }
                } ?>
            </td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td>
                <?php echo $cek['remarks']; ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_send where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo $iuh["note"]; ?></label>
                <?php } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_verif where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo $iuh["note"]; ?></label>
                <?php } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_posted where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo $iuh["note"]; ?></label>
                <?php } ?>
            </td>
            <td>
                <?php
                $edo = $cek['id'];
                $baru = mysqli_query($conn, " SELECT * FROM tbl_status_transfer where id_tracking='$edo'");
                while ($iuh = mysqli_fetch_assoc($baru)) { ?>
                    <label for=""><?php echo $iuh["note"]; ?></label>
                <?php } ?>
            </td>
        </tr>
    </table>


</div>