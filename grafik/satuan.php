<?php $act = $_GET['act']; ?>
<?php $nama = $_GET['nama']; ?>


<head>
    <title>PERGERAKAN GRAFIK RATIO</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <style type="text/css">
        body {
            font-family: 'Times New Roman', Times, serif
        }
    </style>

    <br>
    <center>
        <h3>Pergerakan Grafik Category Di Setiap Bulan<br />- Toyota Astra Motor -</h3>
    </center>
    <br>

    <?php
    include('../config.php');
    include('../assets/css/buat_dasboard.php');
    ?>



    <div class="container-fluid">
        <div class="row" style="margin: auto;">
            <div class="col-md-7" style="text-align:center;margin:auto">
                <div style="width: 100%;margin: 0px auto;">
                    <canvas id="Chart"></canvas>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-9" style="text-align:center;margin:auto">
            <div style="width: 100%;margin: 0px auto;">
                <div style="width: 100%;margin: 0px auto;font-weight:bolder;font-size:15pt">
                    <canvas id="myChart"></canvas>
                </div>

                <br />
                <br />
            </div>
        </div>
    </div>


    <script>
        var ctx = document.getElementById("Chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["January", "February", "Maret", "April", "May", "June", "July", "August", "September", "October", "November", "December", "Budget Available"],
                datasets: [{
                    label: 'Pergerakan Category <?php echo $nama ?>',
                    data: [ // januari
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 01");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        //februari
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 02");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        //maret
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 03");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        //april
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 04");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        //mei
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 05");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 06");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 07");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 08");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 09");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 10");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 11");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT tbl_act_cat.mas_bud, SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru INNER JOIN tbl_act_cat ON tbl_act_cat.id = tbl_act_baru.id_cat where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 12");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization
                            $jum = ($total / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>,
                        <?php
                        $jumlah = mysqli_query($conn, "SELECT bud_av, mas_bud FROM tbl_act_cat where id = '$act' ");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $jum = ($k['bud_av'] / $k['mas_bud']) * 100;
                        }
                        echo $jum;
                        ?>
                    ],
                    backgroundColor: [
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                        'rgb(165, 42, 42)',
                        'rgb(222, 184, 135)',
                        'rgb(95, 158, 160)',
                        'rgb(127, 255, 1)',
                        'rgb(210, 105, 30)',
                        'rgb(251, 127, 80)',
                        'rgb(100, 149, 237)',
                        'rgb(220, 20, 60)',
                        'rgb(253, 215, 3)',
                        'rgb(249, 0, 255)',
                        'rgb(112, 128, 145)'
                    ],

                    borderWidth: 2
                }]
            },
            options: {
                //konfigurasi tooltip
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var labels = data.labels[tooltipItem.index];
                            var currentValue = dataset.data[tooltipItem.index];
                            return labels + ": " + currentValue + " %";
                        }
                    }
                }
            }
        });
    </script>







    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "Maret", "April", "May", "June", "July", "August", "September", "October", "December"],
                datasets: [{
                    label: 'Pergerakan Category <?php echo $nama ?>',
                    data: [ // januari
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 01");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        //februari
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 02");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        //maret
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 03");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        //april
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 04");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        //mei
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 05");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 06");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;

                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 07");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 08");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 09");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 10");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 11");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>,
                        <?php
                        $total = 0;
                        $jumlah = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$act' && MONTH(sub_date) = 12");
                        while ($k  = mysqli_fetch_assoc($jumlah)) {
                            $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)']; //Dapet Realization

                        }
                        echo $total;
                        ?>
                    ],
                    backgroundColor: [
                        'rgb(0, 0, 255)',
                        'rgb(138, 43, 226)',
                        'rgb(165, 42, 42)',
                        'rgb(222, 184, 135)',
                        'rgb(95, 158, 160)',
                        'rgb(127, 255, 1)',
                        'rgb(210, 105, 30)',
                        'rgb(251, 127, 80)',
                        'rgb(100, 149, 237)',
                        'rgb(220, 20, 60)',
                        'rgb(253, 215, 3)',
                        'rgb(249, 0, 255)',
                        'rgb(112, 128, 145)'
                    ],
                    borderColor: [
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)',
                        'rgb(250, 250, 210)'

                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>


</html>

<?php include '../inc/footer.php' ?>