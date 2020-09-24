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