<?php include('../config.php') ?>
<?php include '../assets/css/buat_dasboard.php' ?>

<body>
    <div style="width: 85vw;height:90vh; margin: 30px auto;">
        <div class="col-lg-12 col-md-12 col-xs-3">
            <div style=" box-shadow: 3px 4px 7px 4px rgba(0, 0, 0, 0.6);width: 85vw;height:90vh; ">
                <div class="umum-atas">

                    <div style="text-align: left;margin-left:-15px;float:left;position:absolute ">
                        <input type="text" id="search2" onkeyup="myFunction()" style="border: 4px solid blue;" placeholder="Search..">
                    </div>
                    <p style="color:papayawhip;font-size:25pt;margin: auto;text-align:center;font-weight:bolder">
                        Tracking PV </p>
                </div>
                <div class="umum-tengah">
                    <div style="overflow-y: auto;height:73vh;width:100%;">
                        <table id="myTable" border="0" style="width:150%;font-family:Cambria, Cochin, Georgia, Times,'serif'">
                            <thead style="background:lightseagreen">
                                <tr style="text-align: center;">
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
                <div class="umum-bawah">
                    <p style="margin-top: 8px">Technical Service Division Toyota Astra Motor</p>
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