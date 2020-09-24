<?php include('../config.php') ?>
<?php include '../assets/css/buat_dasboard.php' ?>

<?php
$id = $_GET['pv'];
?>
<!-- untuk perhitungan -->

<div style="text-align: center;margin: 9px 607px auto;  height:1vh;">
    <div style="float: left">
        <?php echo "<a href=\"../../categori\">"; ?><i class="far fa-arrow-alt-circle-left" style="font-size:46px;"></i></a>
        <a href="#" onclick="window.history.forward();"><i class="far fa-arrow-alt-circle-right" style="font-size:46px;margin-left:22px"></i></a>
    </div>

</div>
<div style=" width:98vw; height:60vh; margin: 57px auto;">
    <div style=" box-shadow: 0 0 6px 5px black;padding:10px; ">
        <div class="card-head">
            <!-- <div>
                <div style="text-align: left;margin-left:-15px;  ">
                    <input type="text" id="myInput" style="border: 4px solid blue;" placeholder="Search..">
                </div>
            </div> -->

            <div style="float:right;margin-top:7px;margin-right:12px ">
                <!-- opsi kalau ada dana pr saja -->
                <button type="button" class="but" data-toggle="modal" data-target="#pvgw">
                    Add Activity
                </button>
                <?php include 'add.php' ?>


                <?php echo "<a href=\"user?id=" . $id . "\">"; ?>
                <button type="button" class="buto"> List User</button></a>
            </div>

            <?php

            $baru = mysqli_query($conn, " SELECT * FROM tbl_act_cat where id='$id'");
            while ($rec  = mysqli_fetch_assoc($baru)) { ?>
                <div style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:19pt;margin:0px 2px auto;text-align:center;padding: 11px 20px;float:left">
                <?php echo $rec['act'] . "&nbsp - &nbsp" . $rec['wbs_num'];
            } ?>
                </div>

                <!-- <h4 class="modal-title" id="exampleModalLabel" style="width:200px;margin-top: -6px;margin-right:525px; text-align:center;float:right;background-color:darkgreen;border-radius:5px;color:mintcream">Utilization</h4> -->
        </div>

        <div class="card-body">
            <div style="overflow-y: scroll;height:440px;width:104%;margin-left:-18px">
                <table border="1" class="tabel3">
                    <thead>
                        <tr style="text-align: center; padding:20px 20px">
                            <th style="width: 280px">Activity</th>
                            <!-- <th style="width: 260px">WBS Number</th> -->
                            <th style="width: 290px">Planning Payment Date</th>
                            <th style="width: 230px">Submit Date</th>
                            <th style="width: 120px">No PV</th>
                            <th style="width: 200px">Nominal PV</th>
                            <th style="width: 200px">Nominal PR</th>
                            <th style="width: 320px">User</th>
                            <th style="width: 150px">Status</th>
                            <th style="width: 250px">Remarks</th>
                            <th style="width: 230px">Edit</th>
                        </tr>
                    </thead>
                    <?php
                    $anj = mysqli_query($conn, "SELECT tbl_act.*, tbl_act_cat.wbs_num, tbl_user.name FROM tbl_act INNER JOIN tbl_act_cat ON tbl_act.id_cat = tbl_act_cat.id INNER JOIN tbl_user ON tbl_user.id = tbl_act.id_user where tbl_act.id_cat = '$id' ");
                    while ($cek  = mysqli_fetch_assoc($anj)) { ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $cek['name_act']; ?></td>
                                <!-- //wbs num -->
                                <td> <?php echo $cek['plan_date']; ?></td>
                                <td> <?php echo $cek['sub_date']; ?></td>
                                <td> <?php echo $cek['no_pv']; ?></td>
                                <td> <?php echo $cek['pv']; ?></td>
                                <td> <?php echo $cek['pr']; ?></td>
                                <td> <?php echo $cek['name']; ?></td>
                                <td> <?php echo $cek['status']; ?></td>
                                <td> <?php echo $cek['note']; ?></td>
                                <td>
                                    <div class="track">
                                        <button type="button" data-toggle="modal" data-target="#danagw<?php echo $cek['id']; ?>" style="width: 40px;border:none;margin-left:-4px;background:none">
                                            <i class="fas fa-wallet" style="color:forestgreen;font-size:21px;"></i>
                                        </button>
                                        <?php include 'dana.php' ?>


                                        <a href="#" type="button" data-toggle="modal" data-target="#editgw<?php echo $cek['id']; ?>" style="width: 39px;border:none;margin-left:-4px;margin-right:7px;background:none"><i class="fas fa-pen" style="color:dodgerblue;font-size:21px;  margin:auto;"></i></a>

                                        <button type="button" style="width: 30px;border:none;margin-left:-4px;background:none">
                                            <a href="delete.php?kode=<?php echo $cek["id"] ?>&&rol=<?php echo $cek["id_cat"] ?>">
                                                <i class="fas fa-trash-alt" style="color:firebrick;font-size:21px;"></i>
                                            </a>
                                        </button>

                                    </div>
                                    <?php include 'edit.php' ?>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="card-foot">
            <p>Technical Service Division PT. Toyota Astra Motor</p>
        </div>
    </div>
</div>


<?php include '../inc/footer.php' ?>