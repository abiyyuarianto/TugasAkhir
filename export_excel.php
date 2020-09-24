<?php $thn = $_GET['tahun']; ?>


<body>
    <table border="0">
        <thead>
            <tr style="text-align: center; padding:20px">
                <th style="width: 150px">Category</th>
                <th style="width: 150px">WBS Number</th>
                <th style="width: 150px">Master Budget</th>
                <th style="width: 150px">Realization</th>
                <th style="width: 150px">Budget Available</th>
                <th style="width: 70px">Ratio</th>
            </tr>
        </thead>
        <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Tahun $thn.xls");
        ?>
        <?php
        include('config.php');
        $rslt = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$thn' ");
        while ($rec  = mysqli_fetch_assoc($rslt)) { ?>

            <tr style="text-align: center">
                <td><?php echo $rec['act']; ?></td>
                <td><?php echo $rec['wbs_num']; ?></td>
                <td><?php echo "Rp " . number_format($rec['mas_bud'], 2, ',', '.'); ?></td>
                <td><?php echo "Rp " . number_format($rec['realz'], 2, ',', '.'); ?></td>
                <td><?php echo "Rp " . number_format($rec['bud_av'], 2, ',', '.'); ?></td>
                <td><?php echo $rec['ratio'] . '%'; ?></td>
            <tr>
            <?php
        } ?>

    </table>
</body>