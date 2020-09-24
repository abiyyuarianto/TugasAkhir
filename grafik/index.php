<?php $thn = $_GET['tahun']; ?>



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
        <h2>Pergerakan Grafik Untuk Ratio Di WBS Activity <br />- Toyota Astra Motor -</h2>
    </center>

    <?php
    include('../config.php');
    include('../assets/css/buat_dasboard.php');
    $biri = mysqli_query($conn, "SELECT act FROM tbl_act_cat where tahun='$thn' && active is NULL or active = ' ' ");
    $baru = mysqli_query($conn, "SELECT ratio FROM tbl_act_cat where tahun='$thn' && active is NULL or active = ' ' ");
    ?>
    <div class="container-fluid">
        <div class="row" style="margin: auto;">
            <div class="col-md-12" style="text-align:center;margin:auto">
                <div style="width: 89%;margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                </div>

                <br />
                <br />
            </div>
        </div>
        <div class="row" style="width:86%;margin:auto;text-align:center">
            <div class="col-md-12" style="text-align:center;margin:auto">

                <table border="1" class="tabel2">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Master Budget</th>
                            <th>Budget Available </th>
                            <th>Ratio Realization</th>
                        </tr>
                    </thead>
                    <?php
                    $rslt = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$thn' && active is NULL or active = ' ' ");
                    while ($rec  = mysqli_fetch_assoc($rslt)) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $rec['act']; ?></td>
                                <td style="text-align:right"> <?php echo "Rp " . number_format($rec['mas_bud'], 0, ',', '.'); ?></td>
                                <td style="text-align:right"> <?php echo "Rp " . number_format($rec['bud_av'], 0, ',', '.'); ?></td>
                                <td><?php echo $rec['ratio'] . '%'; ?></td>
                            </tr>
                        </tbody>
                    <?php  } ?>
                </table>

            </div>
        </div>
    </div>

    <br />
    <br />
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php while ($p = mysqli_fetch_array($biri)) {
                                echo '"' . $p['act'] . '",';
                            } ?>],

                datasets: [{
                    label: 'Category di tahun <?php echo $thn ?>',
                    data: [<?php while ($p = mysqli_fetch_array($baru)) {
                                echo '"' . $p['ratio'] . '",';
                            } ?>],
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

                    borderWidth: 1
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