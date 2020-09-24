<?php include('../config.php') ?>

<div style="width: 90vw;height:72vh; margin: 30px 12px auto;">
    <div class="col-lg-12 col-md-12 col-xs-3">
        <div style="overflow-y: auto;height:73vh;width:95%;">
            <table class="table table-striped table-bordered" style="width:150%;font-family:Cambria, Cochin, Georgia, Times,'serif'">
                <thead>
                    <tr style=" text-align: center;">
                        <th style="width: 20px">No</th>
                        <th style="width: 200px">Activity</th>
                        <th style="width: 200px">WBS Number</th>
                        <th style="width: 150px">Submit Date</th>
                        <th style="width: 260px">Planning Payment Date</th>
                        <th style="width: 140px">No PV</th>
                        <th>Nominal PV</th>
                        <th style="width: 300px">PIC</th>
                        <th>Status</th>
                        <th>Remarks</th>

                    </tr>
                </thead>
                <?php
                $no = 1;
                $anyar = mysqli_query($conn, "SELECT tbl_act.*, tbl_act_cat.wbs_num, tbl_user.name FROM tbl_act INNER JOIN tbl_act_cat ON tbl_act.id_cat = tbl_act_cat.id INNER JOIN tbl_user ON tbl_user.id = tbl_act.id_user where pv != 0  ");
                while ($cek  = mysqli_fetch_assoc($anyar)) { ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $no; ?></td>
                            <td> <?php echo $cek['name_act']; ?></td>
                            <td> <?php echo $cek['wbs_num']; ?></td>
                            <td> <?php echo $cek['plan_date']; ?></td>
                            <td> <?php echo $cek['sub_date']; ?></td>
                            <td> <?php echo $cek['no_pv']; ?></td>
                            <td> <?php echo "Rp " . number_format($cek['pv'], 0, ',', '.'); ?></td>


                            <td id="namanya"> <?php echo $cek['name']; ?></td>
                            <td> <?php echo $cek['status']; ?></td>
                            <td> <?php echo $cek['note']; ?></td>


                        <?php $no++;
                    } ?>

                        </tr>
                    </tbody>
            </table>
        </div>
    </div>
</div>