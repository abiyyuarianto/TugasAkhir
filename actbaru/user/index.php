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

<div style=" width:90vw; height:71vh; margin: 28px auto;">


    <div class="card-head">

        <a href="../index.php?pv=<?php echo $babar ?>">

            <i class="far fa-arrow-alt-circle-left" style="font-size:46px;margin-top:4px;margin-left:12px"></i></a>



        <div style="float: right;margin:10px 66px auto ">

            <form action="" method="POST">
                <input type="text" name="org" style="width: 300px;height:44px;" class="form-control" placeholder="Masukan Nama">
                <button type="submit" name="usr" style="width:55px;margin: -42px -60px auto;float:right;" class="but">
                    Add
                </button>
            </form>

            <!-- ---------------------------------------- -->
            <?php
            if (isset($_POST['submit'])) {
                if (isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
                    $allowedExtensions = array("xls", "xlsx");
                    $ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
                    if (in_array($ext, $allowedExtensions)) {
                        $file_size = $_FILES['uploadFile']['size'] / 1024;
                        if ($file_size < 50) {
                            $file =  $_FILES['uploadFile']['name'];
                            $isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
                            if ($isUploaded) {
                                include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");
                                try {
                                    //Load the excel(.xls/.xlsx) file
                                    $objPHPExcel = PHPExcel_IOFactory::load($file);
                                } catch (Exception $e) {
                                    die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                                }

                                //An excel file may contains many sheets, so you have to specify which one you need to read or work with.
                                $sheet = $objPHPExcel->getSheet(0);
                                //It returns the highest number of rows
                                $total_rows = $sheet->getHighestRow();
                                //It returns the highest number of columns
                                //                    $total_columns = $sheet->getHighestColumn();
                                $total_columns = 'A';

                                // echo '<h4>Data from excel file</h4>';
                                // echo '<table cellpadding="5" cellspacing="1" border="1" class="responsive">';

                                //Loop through each row of the worksheet
                                for ($row = 2; $row <= $total_rows; $row++) {
                                    $query = "INSERT INTO tbl_user (name) VALUES ";
                                    //Read a single row of data and store it as a array.
                                    //This line of code selects range of the cells like A1:D1
                                    $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
                                    // echo "<tr>";
                                    //Creating a dynamic query based on the rows from the excel file
                                    $query .= "(";
                                    //Print each cell of the current row
                                    foreach ($single_row[0] as $key => $value) {
                                        // echo "<td>" . $value . "</td>";
                                        $query .= "'" . mysqli_real_escape_string($conn, $value) . "',";
                                    }
                                    $query = substr($query, 0, -1);
                                    $query .= ");";
                                    echo "</tr>";
                                    // echo $query;
                                    mysqli_query($conn, $query);
                                }
                                // echo '</table>';

                                // At last we will execute the dynamically created query an save it into the database
                                //mysqli_query($con, $query);
                                if (mysqli_affected_rows($conn) > 0) {
                                    echo '<span class="msg">Database table updated!</span>';
                                } else {
                                    echo '<span class="msg">Can\'t update database table! try again.</span>';
                                }
                                // Finally we will remove the file from the uploads folder (optional) 
                                unlink($file);
                            } else {
                                echo '<span class="msg">File not uploaded!</span>';
                            }
                        } else {
                            echo '<span class="msg">Maximum file size should not cross 50 KB on size!</span>';
                        }
                    } else {
                        echo '<span class="msg">This type of file not allowed!</span>';
                    }
                } else {
                    echo '<span class="msg">Select an excel file first!</span>';
                }
            }
            ?>


            <!-- <a href="" style="width: 130px; text-align:center;float:right;margin-right:-550px" name="submit" type="submit" class="btn btn-info btn-xs"><i class="fas fa-upload" style="margin-right: 8px"></i>Upload</a> -->


            <form action=" " method="post" style="float:left;margin: -55px -307px auto;" enctype="multipart/form-data">
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
                        <th style="width: 210px">Action</th>
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
                                <a href="hapus.php?cek=<?php echo $c["id"] ?>&&role=<?php echo $babar ?>" onclick="return confirm('Anda yakin akan menghapus nama ini?')">

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
<script src="../../assets/js/script.js"></script>

<?php include '../../inc/footer.php' ?>