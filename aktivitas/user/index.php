<?php include('../../config.php') ?>
<?php include '../../assets/css/buat_dasboard.php' ?>

<?php
$babar =  $_GET['id'];
?>

<?php
if (isset($_POST['usr'])) {
    $o = $_POST["org"];

    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');

    $v = "INSERT INTO `tbl_user`
						(`name`)
					VALUES 
                        ('$o')";

    $n =    mysqli_query($conn, $v);
}
?>

<div style=" width:80vw; height:60vh; margin: 28px auto;">
    <div style="text-align: left">
        <a href="../../actbaru/index.php?pv=<?php echo $babar ?>">

            <i class="far fa-arrow-alt-circle-left" style="font-size:46px;margin-bottom:10px;"></i></a>
    </div>
    <div style=" box-shadow: 0 0 6px 5px black;padding:10px; ">
        <div class="card-head">
            <div>
                <div style="text-align: left;margin-left:-15px;  ">
                    <input type="text" onkeyup="mygw()" id="search" style="border: 4px solid green;" placeholder="Search..">
                </div>
                <!-- <h4 class="modal-title" id="exampleModalLabel" style="width:200px;margin-top: -6px;margin-right:525px; text-align:center;float:right;background-color:darkgreen;border-radius:5px;color:mintcream">Utilization</h4> -->
            </div>


            <div style="float: right;margin:10px 66px auto ">

                <form action="" method="POST">
                    <input type="text" name="org" style="width: 300px;height:44px;" class="form-control" placeholder="Masukan Nama">
                    <button type="submit" name="usr" style="width:55px;margin: -42px -60px auto;float:right;" class="but">
                        Add
                    </button>
                </form>
                <?php include('massal.php') ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="float:left;margin: -55px -307px auto;" enctype="multipart/form-data">
                    <input type="file" style="width: 213px" name="uploadFile" value="" />
                    <input type="submit" name="submit" value="Upload" style="width:75px;margin: -5px -79px auto;float:right;" class="but" />
                </form>

            </div>

        </div>

        <div class="card-body">
            <div id="kurung" style="overflow-y: scroll;height:100%;width:104%;margin-left:-18px">
                <table border="0" style="width: 100%;font-size:14pt;font-family:serif;font-weight:600">
                    <thead>
                        <tr style="text-align: center; padding:20px">
                            <th style="width: 100px">No</th>
                            <th>Name</th>
                            <th style="width: 210px">Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    $d = mysqli_query($conn, "SELECT * FROM tbl_user");
                    while ($c  = mysqli_fetch_assoc($d)) { ?>

                        <tbody style="width: 100%;font-family:Cambria, Cochin, Georgia, Times,'serif'">
                            <tr id="myUL">
                                <td>
                                    <p><?php echo $no ?></p>
                                </td>
                                <td>
                                    <p><?php echo $c['name']; ?></p>
                                </td>
                                <td> <a href="#" type="button" data-toggle="modal" data-target="#usergw<?php echo $c['id']; ?>" style="width:39px;border:none;margin-left:10px;margin-right:0px;background:none"> <i class="fas fa-user-edit" style="color:dodgerblue;font-size:21px; margin-right:9px"> </i></a>
                                    <?php include 'ubah.php' ?>
                                    <a href="hapus.php?cek=<?php echo $c["id"] ?>&&role=<?php echo $babar ?>" target="_blank">

                                        <i class="fas fa-user-minus" style="color:firebrick;font-size:21px;"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php $no++; ?>
                    <?php } ?>
                </table>
            </div>

        </div>

        <div class="card-foot">
            <p>Technical Service Division Toyota Astra Motor</p>
        </div>

    </div>
</div>
<script src="../../assets/js/script.js"></script>

<?php include '../../inc/footer.php' ?>