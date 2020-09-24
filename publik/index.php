<?php include('../config.php') ?>
<?php include '../assets/css/buat_dasboard.php' ?>

<head>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<!-- Bootstrap -->

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

<body>
    <div style="width:94vw;height:72vh; margin: 30px auto;">
        <div class="col-lg-12 col-md-12 col-xs-3">
            <div class="row mb-1">
                <div class="col-sm-12" style="text-align: center"><label style="color:salmon;font-size:22pt;margin: auto;text-align:center;font-weight:bolder;">Tracking Payment Voucher </label></div>
                <div class="col-sm-12" style="text-align: center"><label style="color:salmon;font-size:12pt;margin: auto;text-align:center;font-weight:bolder;">Technical Service Division </label></div>
                <div style="float:left; width:120px; font-size:23pt; margin-top:-2px;margin-left:12px">
                    <a href="<?php echo BASE_URL . '/publik/?tahun=' . $pre ?>"> <i class="fa fa-chevron-left" style="font-size:26px;margin-top:6px;"></i></a>
                    <?php echo $tahun ?>
                    <a href="<?php echo BASE_URL . '/publik/?tahun=' . $next ?>"> <i class="fa fa-chevron-right" style="font-size:26px;margin-top:12px;float:right"></i></a>
                </div>
                <!-- <div class="col-sm-4">
                    <div class="form-group form-inline">
                        <label style="margin-right:12px">Search</label>
                        <input type="text" name="s_keyword" onkeyup="myFunction()" id="search2" class="form-control">
                    </div>
                </div> -->
            </div>
            <hr>
            <div style="width: 100%;height:72vh; margin: 30px auto;">
                <div class="col-lg-12 col-md-12 col-xs-3">
                    <div style="overflow-y: auto;height:100%;width:102%;">
                        <div class="accordion" id="accordionExample">
                            <table id="myTable" class="table table-striped table-bordered" style="width:100%;font-family:Cambria, Cochin, Georgia, Times,'serif'" class="mantap">
                                <thead>
                                    <tr style=" text-align: center;">
                                        <th>No</th>
                                        <th>PIC</th>
                                        <th>Number PV</th>
                                        <th>Activity</th>
                                        <th>WBS Number</th>
                                        <th>Nominal PV</th>

                                    </tr>
                                </thead>
                                <?php
                                $no = 1;
                                $anyar = mysqli_query($conn, "SELECT tbl_act_baru.name_act, tbl_act_baru.nom_pv, tbl_user.name, tbl_act_cat.*, tbl_tracking.* FROM tbl_tracking INNER JOIN tbl_user ON tbl_user.id = tbl_tracking.id_user INNER JOIN tbl_act_baru ON tbl_act_baru.id = tbl_tracking.id_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_tracking.id_cata where tbl_act_cat.tahun = $tahun ");
                                while ($cek  = mysqli_fetch_assoc($anyar)) { ?>
                                    <tbody>
                                        <tr>
                                            <td> <?php echo $no; ?></td>
                                            <td style="padding:2px 20px;">
                                                <div id="headingOne">
                                                    <button style="text-decoration:none;font-size:14pt " class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOon<?php echo $cek['id']; ?>" aria-expanded="false" aria-controls="collapseOne">
                                                        <?php echo $cek['name']; ?>
                                                    </button>
                                                </div>
                                            </td>
                                            <td> <?php echo $cek['no_pv']; ?></td>
                                            <td> <?php echo $cek['name_act']; ?></td>
                                            <td> <?php echo $cek['wbs_num']; ?></td>
                                            <td> <?php echo "Rp " . number_format($cek['nom_pv'], 0, ',', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:9px 10px" colspan="6">
                                                <!-- gak boleh diganggu gugat -->
                                                <?php include 'status_publik.php' ?>

                                            </td>
                                        </tr>
                                    <?php $no++;
                                } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue, rtd;
        input = document.getElementById("search2");
        rtd = document.getElementById("namanya");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>