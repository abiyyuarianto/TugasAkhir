<?php include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/w3css/3/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" type="text/css" href="assets/style.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/animate.css">
    <!-- <link rel="stylesheet" type="text/css" href="effect_main_single.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="kode_javascript.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <style>
        /* Style the form */
        body {
            background: url('assets/gambar/shape.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        #regForm {
            background-color: honeydew;
            margin: 50px auto;
            border-radius: 5px;
            border: 5px solid darkgreen;
            padding: 40px;
            width: 70%;
            height: 82vh;
            min-width: 400px;
        }

        /* Style the input fields */
        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 12px;
            border: 1px solid #aaaaaa;
            border-radius: 2px;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }

        #prevBtn,
        #nextBtn {
            background-color: darkgreen;
            border-radius: 4px;
            color: antiquewhite;
            width: 100px;
            height: 40px;
            font-weight: bold;

        }
    </style>
</head>

<?php
$errors = array();
function esc($value)
{
    // bring the global db connect object into function
    global $conn;
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}


if (isset($_POST['submit'])) {
    $a = esc($_POST["name"]);
    $sql = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE 'name' = '$a'");
    if (mysqli_num_rows($sql)) {
        array_push($errors, '<div style="padding:10px;background:#d44950;color:#fff">- Nama sudah digunakan, coba yang lain</div>');
    }
    $b = $_POST["username"];
    $sql = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$b'");
    if (mysqli_num_rows($sql)) {
        array_push($errors, '<div style="padding:10px;background:#d44950;color:#fff">- Username sudah digunakan, coba yang lain</div>');
    }
    $c = md5($_POST["pass"]);
    $d = $_POST["role"];
    //INSERT INTO `db_infb2`.`pengguna` (`id`, `user_name`, `password`, `level`, `foto`) VALUES (NULL, 'u', '1d', 'L', 'm');
    if (empty($errors)) {
        $q =  mysqli_query($conn, "INSERT INTO `tbl_admin`
						(`name`, `username`, `pass`, `role`)
					VALUES 
                        ('$a', '$b', '$c','$d')");

        if (!$q) {
            array_push($errors, '<div style="padding:10px;background:#d44950;color:#fff">- Hubungi divisi IT anda</div>');
        } else {
            array_push($errors, '<div style="padding:10px;background:#019961;color:#fff">- Berhasil Membuat Akun, Silahkan Login-</div>');
        }
    }
}
?>

<body>
    <div class="container pt-5" style="max-width:550px">
        <div class="card card-nb p-3">

            <a href="categori/index.php" style="font-size: 14pt;">
                Back
            </a>
            <h2 class="text-center">Registration</h2>
            <div class="col-md-12">
                <form action="" method="POST" style="margin-top: 30px;">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $er) {
                            echo $er;
                        }
                    }
                    ?>


                    <h4>Name:</h4>
                    <p><input placeholder="Name" name="name" required></p>
                    <h4>Username:</h4>
                    <p><input placeholder="Username" name="username" required></p>
                    <h4>Password:</h4>
                    <p><input placeholder="Password" type="password" name="pass" required></p>
                    <h4>Role:</h4>
                    <p><select style="width: 100%;height:40px" name="role" required>
                            <option value="" disabled selected>- Pilih -</option>
                            <option name="admin" value="admin">Admin</option>
                            <option name="atasan" value="atasan">Atasan</option>
                        </select></p>

                    <div style="float:right;margin-bottom:12px">


                        <button type="submit" name="submit" class="btn btn-success">Submit</button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>