<?php $thn = $_GET['tahun']; ?>


<head>
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="jquery.table2excel.js"></script>

	<style type="text/css">
		th {
			background-color: gray;
			color: white;
			text-align: center;
		}

		th,
		td {
			padding: 5px 10px
		}

		a {
			text-decoration: none;
			background-color: orange;
			padding: 5px 10px;
			display: inline-block;
			margin-top: 15px;
			border-radius: 5px;
			color: black;
		}
	</style>

</head>

<body>
	<table class="table2excel" data-tableName="Test Table 2" border="1" cellspacing="0">

		<tr style="text-align: center; padding:20px">
			<th style="width: 150px">Category</th>
			<th style="width: 150px">WBS Number</th>
			<th style="width: 150px">Master Budget</th>
			<th style="width: 150px">Realization</th>
			<th style="width: 150px">Budget Available</th>
			<th style="width: 70px">Ratio</th>

			<?php
			include('../config.php');
			$rslt = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$thn' && active is NULL or active = ' ' ");
			while ($rec  = mysqli_fetch_assoc($rslt)) { ?>

		<tr style="text-align: center">
			<td><?php echo $rec['act']; ?></td>
			<td><?php echo $rec['wbs_num']; ?></td>
			<td><?php echo "Rp " . number_format($rec['mas_bud'], 2, ',', '.'); ?></td>
			<td><?php echo "Rp " . number_format($rec['realz'], 2, ',', '.'); ?></td>
			<td><?php echo "Rp " . number_format($rec['bud_av'], 2, ',', '.'); ?></td>
			<td><?php echo $rec['ratio'] . '%'; ?></td>
		<?php
			} ?>
		<tr>


	</table>
	<script>
		$(function() {
			$(".table2excel").table2excel({
				name: "Excel Document Name",
				filename: "Data Tahun <?php echo $thn ?>",
				fileext: ".xls",
				exclude_img: true,
				exclude_links: true,
				exclude_inputs: true
			});
		});
	</script>
</body>