<?php include('../config.php') ?>
<?php include '../assets/css/buat_dasboard.php' ?>

<?php
$id = $_GET['pv'];

?>

<!-- untuk perhitungan -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<div style=" width:91vw; height:70vh; margin: 19px auto;">

    <div style=" box-shadow: 0 0 5px 0px black;padding:10px; ">
        <div class="card-head">

            <div style="text-align: center; height:1vh;margin-left:-28px;">
                <?php echo "<a href=\"../../categori\">"; ?><i class="far fa-arrow-alt-circle-left" style="font-size:46px;margin-top:6px"></i></a>
                <a href="#" onclick="window.history.forward();"><i class="far fa-arrow-alt-circle-right" style="font-size:46px;margin-left:22px;position:absolute;margin-top:6px"></i></a>
            </div>

            <div style="float:right;margin-top:3px;margin-right:12px ">
                <!-- opsi kalau ada dana pr saja -->
                <button type="button" class="but" data-toggle="modal" data-target="#actbaru">
                    Add Activity
                </button>
                <?php include 'tambahact.php' ?>

                <?php echo "<a href=\"user?id=" . $id . "\">"; ?>
                <button type="button" class="buto"> List User</button></a>
            </div>
            <?php
            $baru = mysqli_query($conn, " SELECT * FROM tbl_act_cat where id='$id'");
            while ($re  = mysqli_fetch_assoc($baru)) { ?>
                <div style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:19pt;margin:-4px 2px auto;text-align:center;padding: 11px 20px;float:left">
                <?php echo $re['act'] . "&nbsp &nbsp" . $re['wbs_num'];
            } ?>
                </div>
        </div>

        <!-- <h4 class="modal-title" id="exampleModalLabel" style="width:200px;margin-top: -6px;margin-right:525px; text-align:center;float:right;background-color:darkgreen;border-radius:5px;color:mintcream">Utilization</h4> -->
        <div class="card-body">
            <div style="overflow-y: scroll;height:507px;width:103%;margin-left:-18px">
                <div class="accordion" id="accordionExample">
                    <table class="mantap" border="0">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>Submit Date</th>
                                <th>Planning Date</th>
                                <th>Nominal PR</th>
                                <th>Nominal PV</th>
                                <th>Action</th>
                            </tr>

                            <!-- tanggal -->
                            <?php
                            // FUNGSI
                            function tanggal_indo($tanggal, $cetak_hari = false)
                            {
                                $hari = array(
                                    1 =>    'Mon',
                                    'Tue',
                                    'Wed',
                                    'Thu',
                                    'Fri',
                                    'Sat',
                                    'Sun'
                                );

                                $bulan = array(
                                    1 =>   'Jan',
                                    'Feb',
                                    'Mar',
                                    'Apr',
                                    'May',
                                    'Jun',
                                    'Jul',
                                    'Aug',
                                    'Sept',
                                    'Oct',
                                    'Nov',
                                    'Dec'
                                );
                                $split       = explode('-', $tanggal);
                                $tgl_indo = $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];

                                if ($cetak_hari) {
                                    $num = date('N', strtotime($tanggal));
                                    return $hari[$num] . ', ' . $tgl_indo;
                                }
                                return $tgl_indo;
                            } ?>
                            <!-- tanggal -->


                            <?php
                            $anyar = mysqli_query($conn, "SELECT * FROM tbl_act_baru  where id_cat = '$id' ");
                            while ($cek  = mysqli_fetch_assoc($anyar)) { ?>

                        <tbody>
                            <tr>
                                <td style="padding:2px 20px;">
                                    <div id="headingOne">
                                        <button style="text-decoration:none;font-size:14pt " class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $cek['id']; ?>" aria-expanded="false" aria-controls="collapseOne">
                                            <?php echo $cek['name_act']; ?>
                                        </button>
                                    </div>
                                </td>

                                <td> <?php echo tanggal_indo($cek['sub_date'], true) ?></td>
                                <td> <?php echo tanggal_indo($cek['plan_date'], true) ?></td>
                                <td style="text-align:right"> <?php echo "Rp " . number_format($cek['nom_pr'], 0, ',', '.'); ?></td>
                                <td style="text-align:right"> <?php echo "Rp " . number_format($cek['nom_pv'], 0, ',', '.'); ?></td>

                                <td>
                                    <div class="track">
                                        <a href="#" type="button" data-toggle="modal" data-target="#editbaru<?php echo $cek['id']; ?>" style="width: 39px;border:none;margin-left:-4px;margin-right:7px;background:none"><cite title="Edit"><i class="fas fa-pen" style="color:dodgerblue;font-size:21px;  margin:auto;"></i></cite></a>

                                        <button type="button" style="width: 30px;border:none;margin-left:-4px;background:none">
                                            <a href="hapus.php?kode=<?php echo $cek["id"] ?>&&rol=<?php echo $cek["id_cat"] ?>">
                                                <cite title="Delete"> <i class="fas fa-trash-alt" style="color:firebrick;font-size:21px;"></i></cite>
                                            </a>
                                        </button>

                                    </div>


                                    <?php include 'edit_baru.php' ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:-2px 20px" colspan="6">
                                    <!-- gak boleh diganggu gugat -->
                                    <?php include 'tracking.php' ?>

                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-foot">
            <p>Technical Service Division PT.Toyota Astra Motor</p>
        </div>


    </div>
</div>



<?php include '../inc/footer.php' ?>