<?php include('../config.php') ?>
<?php include '../assets/css/buat_dasboard.php' ?>


<?php
if (!isset($_SESSION['user']))
    header('Location:' . BASE_URL);
?>


<!-- //Untuk Realization -->
<?php $total = 0; ?>
<!-- -------------------------- -->
<?php
if (isset($_GET['tahun'])) {
    $tahun = $_GET['tahun'];
} else {
    $tahun = date('Y', time());
}
$next = $tahun + 1;
$pre = $tahun - 1;
?>

<div class="baru">
    <a class="active1" href="#"><i class="fa fa-fw fa-home"></i> Home</a>

    <a href="<?php echo BASE_URL . '/regis.php' ?>"><i class=" far fa-registered" style="margin-right: 4px"></i>Registration</a>

    <!-- <input type="submit" value="Pilih" /> -->

    <div style="float:right">

        <a href="">
            <i class="fa fa-fw fa-user"></i><?php echo $_SESSION['user']['name'] ?><i>
        </a>
        <a href="<?php echo BASE_URL . '/logout.php' ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>

    </div>
    <div class="dropdown">
        <button onclick="myOne()" class="dropbtn"><i class="fas fa-paper-plane" style="margin-right: 8px"></i>Print</button>
    </div>
    <label style="margin: 2px 183px auto;font-size:18pt;color:beige"> Expense Management System</label>


</div>
<div id="myDropdown" style="margin: 0 245px auto; " class="dropdown-content">
    <a href="<?php echo BASE_URL . '/pdf/?tahun=' . $tahun ?>"><button class="btn btn-danger" style="width: 120px; color:linen">
            <i class="fas fa-file-pdf" style="margin-right: 8px"></i>PDF</button></a>

    <a target=" _blank" href="<?php echo BASE_URL . '/excel/excel.php?tahun=' . $tahun ?>"><button class=" btn btn-success" style="width: 120px; color:linen">
            <i class="fas fa-file-excel" style="margin-right: 8px"></i>Excel</button></a>

    <a href="<?php echo BASE_URL . '/grafik/?tahun=' . $tahun ?>" target="blank"> <button class="btn " style="width: 120px; color:linen;background-color:orangered;">
            <i class="fas fa-chart-bar" style="margin-right: 2px"></i> Grafik </button></a>
</div>

<div style=" width:95vw; height:84vh; margin: 28px auto;">
    <div style=" box-shadow: 0 0 6px 5px black;padding:10px; ">
        <div class="card-head">
            <div>
                <!-- <div style="text-align: left;margin-left:-15px;  ">
                    <input type="text" id="myInput" style="border: 4px solid blue;" placeholder="Search..">
                </div> -->

                <!-- <h4 class="modal-title" id="exampleModalLabel" style="width:200px;margin-top: -6px;margin-right:525px; text-align:center;float:right;background-color:darkgreen;border-radius:5px;color:mintcream">Utilization</h4> -->
            </div>
            <div style="float: right;margin:10px 12px auto ">

                <div style="float:left; width:120px; font-size:23pt; margin-right:310px;margin-top:-2px;font-family:Arial, Helvetica, sans-serif">
                    <a href="<?php echo BASE_URL . '/categori/?tahun=' . $pre ?>"> <i class="fas fa-chevron-left" style="font-size:26px;margin-top:6px;"></i></a>
                    <?php echo $tahun ?>
                    <a href="<?php echo BASE_URL . '/categori/?tahun=' . $next ?>"> <i class="fas fa-chevron-right" style="font-size:26px;margin-top:6px;"></i></a>
                </div>

                <button type="button" class="but" data-toggle="modal" data-target="#exampleModal">
                    Add Unit
                </button>
                <?php include 'satuan.php' ?>

                <a href="<?php echo BASE_URL . '/import-data/index.php/?tahun=' . $tahun ?>" type="button">
                    <button type="button" class="buto"> Add a Lots</button></a>

            </div>
            <?php
            if (!empty($errors)) {
                foreach ($errors as $er) {
                    echo $er;
                }
            }
            ?>
        </div>


        <div class="card-body" style="height:480px;width:103%;margin-left:-18px"">
            <table border=" 0" class="tabel2" style="width:1258px;">
            <thead>
                <tr style="text-align: center;font-size:11pt ">
                    <th style="width: 20px"><i class="fas fa-exclamation-triangle"></i></th>
                    <th style="width: 500px">Category</th>
                    <th style="width: 500px">WBS Number</th>
                    <th style="width: 400px">Master Budget</th>
                    <th style="width: 284px">Realization</th>
                    <th style="width: 420px">Budget Available</th>
                    <th style="width: 40px">Ratio</th>
                    <th style="width: 280px">Action</th>
                </tr>
            </thead>
            </table>
            <div style="overflow-y: scroll;height:95%;width:100%;">

                <table border="1" class="tabel2">

                    <!-- //untuk menampilkan data satuan dan excel -->
                    <?php
                    $rslt = mysqli_query($conn, "SELECT * FROM tbl_act_cat where tahun='$tahun' ");
                    while ($rec  = mysqli_fetch_assoc($rslt)) { ?>
                        <tbody style="width: 100%;font-family: 'Trebuchet MS', sans-serif">
                            <tr <?php
                                if ($rec['active'] == 'aktif') { ?> style="background-color:blanchedalmond;" <?php }
                                                                                                                ?>>
                                <td><?php
                                    if ($rec['active'] == 'aktif') { ?>
                                        <cite title="Non Active"> <span class="blink"><i class="fas fa-exclamation"></i></span></cite>
                                    <?php } else { ?>
                                        <cite title="Active"> <i class="fas fa-exclamation" style="color:lime"></i></cite>
                                    <?php }
                                    ?></td>
                                <td style="width: 220px"><?php echo $rec['act']; ?></td>
                                <td><?php echo $rec['wbs_num']; ?></td>
                                <td style="text-align:right"> <?php echo "Rp " . number_format($rec['mas_bud'], 0, ',', '.'); ?></td>
                                <td style="text-align:right"> <?php echo "Rp " . number_format($rec['realz'], 0, ',', '.'); ?></td>

                                <?php
                                $bisa = $rec["id"];
                                $ratio = 0;
                                $real = 0;
                                $real = $rec['mas_bud'] - $rec['realz']; //Budget Available

                                $ratio = ($rec['realz'] / $rec['mas_bud']) * 100;
                                $angka_format = number_format($ratio, 0, ",", ".");
                                //ratio
                                $jong = mysqli_query($conn, "UPDATE tbl_act_cat 
                                SET 
                                bud_av = '$real',
                                ratio = '$angka_format'
                                WHERE id= $bisa && tahun='$tahun'");
                                ?>
                                <td style="text-align:right;width: 210px"> <?php echo "Rp " . number_format($real, 0, ',', '.'); ?></td>
                                <td style="width: 30px"><?php echo $angka_format . '%'; ?></td>

                                <td style="width: 16px">
                                    <div class="anim">
                                        <div class="icon">
                                            <i class="fas fa-chevron-left" style="font-size:21px;margin-top:6px;"></i>
                                        </div>
                                        <div class="icon2">
                                            <i class="fas fa-chevron-right" style="font-size:21px;margin-top:6px;"></i>
                                        </div>


                                        <div class="tulisan">
                                            <a href="<?php echo BASE_URL . '/actbaru/index.php?pv=' . $rec["id"] ?>">

                                                <?php
                                                $r = $rec['mas_bud'];
                                                $id = $rec["id"];

                                                $ar = mysqli_query($conn, "SELECT SUM(nom_pv),SUM(nom_pr) FROM tbl_act_baru where tbl_act_baru.id_cat = '$id' ");
                                                while ($k  = mysqli_fetch_assoc($ar)) {
                                                    $total = $k['SUM(nom_pr)'] + $k['SUM(nom_pv)'];
                                                    //realization
                                                }
                                                $jing = mysqli_query($conn, "UPDATE tbl_act_cat 
                                            SET realz = '$total'
                                            WHERE id=$id && tahun='$tahun'");

                                                ?>

                                                <cite title="Activity"><i class="fas fa-file-invoice" style="color:lawngreen; font-size:20px; margin-left:10px;border:none;"></i></cite>
                                            </a>

                                            <a href="#" type="button" data-toggle="modal" data-target="#punyagw<?php echo $rec['id']; ?>" style="width:20px;border:none;margin-left:10px;margin-right:10px;background:none"><cite title="Edit"><i class="fas fa-edit" style="color:dodgerblue;font-size:20px; margin-right:12px"> </i></cite></a>

                                            <a href="aksi_delete.php?kode=<?php echo $rec["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                                <cite title="Delete"><i class="fas fa-trash" style="color:firebrick;font-size:20px;margin-right:6px"></i></cite>
                                            </a>

                                        </div>
                                        <?php include('edit.php') ?>
                                    </div>

                                <?php }  ?>

                            </tr>
                        </tbody>

                </table>

            </div>
        </div>


        <div class="card-foot">
            <p>Technical Service Division PT.Toyota Astra Motor</p>
        </div>
    </div>
</div>


<script>
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
    function myOne() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<?php include '../inc/footer.php' ?>