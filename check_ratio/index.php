<?php include('../config.php') ?>
<?php
if (empty($_SESSION['user']))
    header('Location:' . BASE_URL);
?>

<?php include '../assets/css/buat_dasboard.php' ?>

<?php
if (isset($_GET['tahun'])) {
    $tahun = $_GET['tahun'];
} else {
    $tahun = date('Y', time());
}
$next = $tahun + 1;
$pre = $tahun - 1;
?>

<?php
$se1 = 0;
$se2 = 0;
$se3 = 0;
$se4 = 0;
?>
<?php
$seno1 = 0;
$seno2 = 0;
// -----------
$senyorita = 0;
?>


<?php
if (isset($_GET['pencet'])) {
    $se1 = $_GET['tio1'];
    $se2 = $_GET['tio2'];
    $se3 = $_GET['tio3'];
    $se4 = $_GET['tio4'];
} ?>

<?php
if (isset($_GET['pencet2'])) {
    $seno1 = $_GET['io1'];
    $seno2 = $_GET['io2'];
} ?>
<?php
if (isset($_GET['pencet3'])) {
    $senyorita = $_GET['ios'];
} ?>


<div class="container-fluid">
    <div class="row" style=" box-shadow: 0 0 10px rgba(95,125,149,.25);
    border-bottom: 1pt solid #dcdcdc;">

        <div class="col-lg-6 col-md-12 col-xs-3 text-left">
            <h2> Management Access </h2>
        </div>

        <div class="col-lg-6 col-md-12 col-xs-3 text-right" style="margin:auto">
            <div class="new">
                <a href="">
                    <i class="fa fa-fw fa-user"></i><?php echo $_SESSION['user']['name'] ?><i>
                </a>
                <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>


    <div class="row" style="margin-top: 4px;">
        <div class="col-md-4" style="text-align:left;margin:auto">
            <div>
                <form action="" method="POST">

                    <select name=" tampil" class="form-control" style="line-height: 6px;width:46%;text-align:center;margin-left:38px;position:absolute">
                        <option value="setahun">Setahun</option>
                        <option value="semester">Semester</option>
                        <option value="quad">Quad</option>
                    </select>
                    <button type="submit" name="usr" style="width:72px;float:right;margin-right:80px" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-4 text-center" style="margin:auto">

            <div class="pertengahan">
                <div style=" font-size:27pt;padding: 10px 9px;font-family:sans-serif">
                    <a href="<?php echo BASE_URL . '/check_ratio/?tahun=' . $pre ?>"> <i class="fas fa-chevron-left" style="font-size:30px;"></i></a>
                    <?php echo $tahun ?>
                    <a href="<?php echo BASE_URL . '/check_ratio/?tahun=' . $next ?>"> <i class="fas fa-chevron-right" style="font-size:30px;"></i></a>


                </div>
            </div>
        </div>
        <div class="col-md-4 text-center" style="margin:auto">
            <div id="headingOne">
                <button type="button" class="btn btn-secondary" style="width:150px" data-toggle="collapse" data-target="#demo">Reporting</button>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-md-5 text-center" style="margin:auto">
            <div id="demo" class="collapse">
                <div class="row">

                    <div class="col-md-3" style="margin:auto;">
                        <div style=" color: papayawhip;">
                            <a target=" _blank" href="<?php echo BASE_URL . '/excel/excel.php?tahun=' . $tahun ?>">
                                <button class="btn btn-success" style="width: 100px; color:linen;border:3px solid white">
                                    <i class="fas fa-file-excel" style="margin-right: 8px"></i>Excel</button></a>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin:auto">
                        <div style="color: papayawhip;">
                            <a target=" _blank" href="<?php echo BASE_URL . '/pdf/?tahun=' . $tahun ?>">
                                <button class="btn btn-danger" style="width: 100px; color:linen;border:3px solid white">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px"></i>PDF</button></a>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin:auto">
                        <div style="color: papayawhip;">
                            <a href="<?php echo BASE_URL . '/grafik/?tahun=' . $tahun ?>" target="blank">
                                <button class="btn " style="width: 100px; color:linen;background-color:orangered;border:3px solid white">
                                    <i class="fas fa-chart-bar" style="margin-right: 2px"></i> Grafik
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:10px">
        <div class="col-md-12">
            <div class="tengah">

                <?php
                if (isset($_POST['usr'])) {
                    $select1 = $_POST['tampil'];
                ?>
                    <?php
                    switch ($select1) {
                        case 'quad': ?>
                            <!-- quad -->
                            <div style="overflow-y: scroll;height:100%;width:100%;">
                                <table class=" table-striped table-bordered" style="font-family:Verdana, Geneva, Tahoma, sans-serif;width:100%">
                                    <tr>
                                        <td rowspan="5" style="width: 200px"><b>Category</b></td>
                                        <td rowspan="5" style="width: 200px"><b>Master Budget</b></td>
                                        <td colspan="4"><b>Realization ratio in three months</b></td>
                                    </tr>
                                    <tr style="font-size: 11pt">
                                        <td>January - Maret</td>
                                        <td> April - June</td>
                                        <td> July - September </td>
                                        <td> October - December </td>
                                    </tr>

                                    <form action="" method="GET">
                                        <tr>
                                            <td>
                                                <input type="number" placeholder="Ratio" name="tio1" id="ratio">

                                            </td>
                                            <td>
                                                <input type="number" placeholder="Ratio" name="tio2" id="ratio">

                                            </td>
                                            <td>
                                                <input type="number" placeholder="Ratio" name="tio3" id="ratio">

                                            </td>
                                            <td>
                                                <input type="number" placeholder="Ratio" name="tio4" id="ratio">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                                <input type="submit" name="pencet" value="Calculate" class="but" style="font-size:11pt;width:100px;">
                                            </td>
                                        </tr>
                                    </form>

                                    <tr style="font-size:12pt;font-weight:bolder;background-color:teal;color:whitesmoke">

                                        <td>
                                            <?php
                                            echo "< " . $se1 . "%";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "< " . $se2 . "%"; ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "< " . $se3 . "%"; ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "< " . $se4 . "%"; ?>
                                        </td>
                                    </tr>


                                    <?php
                                    $ros = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$tahun' && active is NULL or active = ' ' ");
                                    while ($biy  = mysqli_fetch_assoc($ros)) {
                                    ?>
                                        <!-- Isi datanya disini -->
                                        <tr>
                                            <td style="padding:2px 20px;">
                                                <div>
                                                    <button style="text-decoration:none;font-size:11pt " class="btn btn-link" type="button">
                                                        <a target="blank" href="../grafik/satuan.php?act=<?php echo $biy["id"] ?> &&nama=<?php echo $biy["act"] ?>"><?php echo $biy['act']; ?></a>
                                                    </button>
                                                </div>
                                            </td>

                                            <td style="text-align: right"> <?php echo "Rp " . number_format($biy['mas_bud'], 0, ',', '.'); ?></td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $r = $biy['mas_bud'];
                                                $id = $biy["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' && MONTH(sub_date) BETWEEN 01 AND 03 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");
                                                    if ($angka < $se1) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $r = $biy['mas_bud'];
                                                $id = $biy["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' && MONTH(sub_date) BETWEEN 04 AND 06 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");

                                                    if ($angka < $se2) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $r = $biy['mas_bud'];
                                                $id = $biy["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' && MONTH(sub_date) BETWEEN 07 AND 09 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");
                                                    if ($angka < $se3) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                $r = $biy['mas_bud'];
                                                $id = $biy["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' && MONTH(sub_date) BETWEEN 10 AND 12 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");
                                                    if ($angka < $se4) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php
                            break;
                        case 'semester': ?>
                            <!-- semester -->
                            <div style="overflow-y: scroll;height:100%;width:100%;">
                                <table class=" table-striped table-bordered" style="width:100%;font-family:Verdana, Geneva, Tahoma, sans-serif">
                                    <tr>
                                        <td rowspan="5" style="width: 250px"><b>Category</b></td>
                                        <td rowspan="5" style="width: 250px"><b>Master Budget</b></td>
                                        <td colspan="4"><b>Realization Ratio in Semester</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">January - June</td>
                                        <td colspan="2">July - December</td>
                                    </tr>
                                    <form action="" method="GET">
                                        <tr>
                                            <td colspan="2">
                                                <input type="number" placeholder="Ratio" name="io1" id="ratio">
                                            </td>
                                            <td colspan="2">
                                                <input type="number" placeholder="Ratio" name="io2" id="ratio">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <input type="submit" name="pencet2" value="Calculate" class="but" style="font-size:11pt;width:100px;">
                                            </td>
                                        </tr>
                                    </form>
                                    <!-- Isi datanya disini -->
                                    <tr style="font-size:12pt;font-weight:bolder;background-color:teal;color:whitesmoke">
                                        <td colspan="2">
                                            <?php
                                            echo "< " . $seno1 . "%";
                                            ?>

                                        </td>
                                        <td colspan="2">
                                            <?php
                                            echo "< " . $seno2 . "%";
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                    $rslt = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$tahun' && active is NULL or active = ' '  ");
                                    while ($receh  = mysqli_fetch_assoc($rslt)) {
                                    ?>
                                        <tr>
                                            <td style="padding:2px 20px;">
                                                <div>
                                                    <button style="text-decoration:none;font-size:11pt " class="btn btn-link" type="button">
                                                        <a target="blank" href="../grafik/satuan.php?act=<?php echo $receh["id"] ?> &&nama=<?php echo $receh["act"] ?>"><?php echo $receh['act']; ?></a>
                                                    </button>
                                                </div>
                                            </td>
                                            <td style="text-align: right"><?php echo "Rp " . number_format($receh['mas_bud'], 0, ',', '.'); ?></td>
                                            <td colspan="2">
                                                <?php
                                                $total = 0;
                                                $r = $receh['mas_bud'];
                                                $ide = $receh["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$ide' && MONTH(sub_date) BETWEEN 01 AND 06 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");
                                                    if ($angka < $seno1) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td colspan="2">
                                                <?php
                                                $total = 0;
                                                $r = $receh['mas_bud'];
                                                $id = $receh["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' && MONTH(sub_date) BETWEEN 07 AND 12 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");
                                                    if ($angka < $seno2) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php
                            break;
                        default:
                        ?>
                            <!-- setahun -->
                            <div style="overflow-y: scroll;height:100%;width:100%;">
                                <table class=" table-striped table-bordered" style="font-family:Verdana, Geneva, Tahoma, sans-serif;width:100%">
                                    <tr>
                                        <td rowspan="5" style="width: 310px"><b>Category</b> </td>
                                        <td rowspan="5" style="width: 310px"><b>Master Budget</b></td>
                                        <td colspan="4"><b>Realization Ratio in a years</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">January - December</td>
                                    </tr>
                                    <form action="" style="margin-top: 12px">
                                        <tr>
                                            <td colspan="4">
                                                <input type="number" placeholder="Ratio" name="ios" id="ratio">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <input type="submit" name="pencet3" value="Calculate" class="but" style="font-size:11pt;width:100px;">
                                            </td>

                                        </tr>
                                    </form>
                                    <tr style="font-size:12pt;font-weight:bolder;background-color:teal;color:whitesmoke">
                                        <td colspan="4">
                                            <?php
                                            echo "< " . $senyorita . "%";
                                            ?>
                                        </td>
                                    </tr>


                                    <?php
                                    $rslt = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$tahun' && active is NULL or active = ' ' ");
                                    while ($reco  = mysqli_fetch_assoc($rslt)) {
                                    ?>
                                        <!-- Isi datanya disini -->
                                        <tr>
                                            <td style="padding:2px 20px;">
                                                <div>
                                                    <button style="text-decoration:none;font-size:11pt " class="btn btn-link" type="button">
                                                        <a target="blank" href="../grafik/satuan.php?act=<?php echo $reco["id"] ?> &&nama=<?php echo $reco["act"] ?>"><?php echo $reco['act']; ?></a>
                                                    </button>
                                                </div>
                                            </td>
                                            <td style="text-align: right"><?php echo "Rp " . number_format($reco['mas_bud'], 0, ',', '.'); ?></td>
                                            <td colspan="4">
                                                <?php
                                                $total = 0;
                                                $r = $reco['mas_bud'];
                                                $id = $reco["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' && MONTH(sub_date) BETWEEN 01 AND 12 ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                                                    // perhitungan ratio sesuai dengan bulan tertentu lalu di cari rationya
                                                    $rat = ($total / $r) * 100;
                                                    $angka = number_format($rat, 0, ",", ".");
                                                    if ($angka < $senyorita) {
                                                        echo '<span class="blink">' . $angka . ' %</span>';
                                                    } else {
                                                        echo $angka . '%';
                                                    }
                                                }
                                                ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                <?php
                            break;
                    }
                }
                ?>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin:auto">
            <div class="card-foote" style="border:none;text-align:center">
                <h5>Technical Service Division PT.Toyota Astra Motor</h5>
            </div>
        </div>
    </div>
</div>



<?php include '../inc/footer.php' ?>