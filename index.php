<?php include('config.php') ?>

<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "Login gagal! username dan password salah!";
    } else if ($_GET['pesan'] == "logout") {
        echo "Anda telah berhasil logout";
    } else if ($_GET['pesan'] == "belum_login") {
        echo "Anda harus login untuk mengakses halaman admin";
    }
}
?>

<?php
$errors = array();
if (isset($_POST['tom_login'])) {
    $c = $_POST['uname'];
    $d = md5($_POST['psw']);

    $data = mysqli_query($conn, "select * from tbl_admin where username='$c' and pass='$d'");
    $row = mysqli_fetch_assoc($data);
    if ($row) {
        $id = $row['id'];
        if ($data) {
            $_SESSION['user'] = getUserById($id);
            if ($row['role'] == 'admin') {
                header('Location:' . BASE_URL . '/categori');
            } else
                header('Location:' . BASE_URL . '/check_ratio');
        }
    } else {
        array_push($errors, '<div style="padding:10px;background:#d44950;color:#fff">Username atau password salah</div>');
    }
}
?>

<?php
function getUserById($id)
{
    global $conn;
    $sql = "SELECT * FROM tbl_admin where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user;
}
?>

<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin') {
        header('Location:' . BASE_URL . '/categori');
    } elseif ($_SESSION['user']['role'] == 'atasan') { //atasan
        header('Location:' . BASE_URL . '/check_ratio');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <style>
        .menu-login {

            background: url('assets/gambar/bg-01.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            min-height: 380px;
            font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
        }

        .bg-img {
            /* The image used */
            background-image: url("img_nature.jpg");



            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }


        .login {
            position: absolute;
            min-height: 480px;
            left: 20%;
            transform: translate(-50%, -50%);
            background: rgb(198, 89, 0);
            background: -moz-linear-gradient(163deg, rgba(198, 89, 0, 1) 0%, rgba(196, 173, 93, 1) 100%);
            background: -webkit-linear-gradient(163deg, rgba(198, 89, 0, 1) 0%, rgba(196, 173, 93, 1) 100%);
            background: linear-gradient(163deg, rgba(198, 89, 0, 1) 0%, rgba(196, 173, 93, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c65900", endColorstr="#c4ad5d", GradientType=1);
            padding: 20px;
            height: 35vw;
            width: 310px;
            margin: 320px 150px 0px 0px;
            box-shadow: 0 0 6px 5px black;
            border-radius: 12px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .avatar {
            font-size: 50px;
            background: #bdc3c7;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            position: fixed;
            left: 50%;
            top: 0;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            color: #2c3e50;
        }

        .login h2 {
            text-align: center;
            font-size: 29px;
            color: white;
            margin-top: 87px;
            letter-spacing: 5px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .box-login {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 2px solid white;
            padding: 28px 0;

            font-family: monospace;
        }

        .box-login i {
            font-size: 30px;
            padding: auto;
            color: white;
            margin-right: 8px;
            margin-top: 8px;
        }

        .box-login input {
            width: 100%;
            padding: 0 10px;
            background: none;
            outline: none;
            font-size: 15pt;
            border: 1px solid black;

        }

        .box-login input::placeholder {
            color: white;
        }

        .btn {
            font-family: 'Ubuntu';
            /* box-shadow: 0 0 3px #1ebfff; */
            transition: all 1s ease-in-out .5s;
            color: blanchedalmond;
        }

        .btn:hover {
            background-color: rgb(21, 138, 118);
            width: 130px;
            border-radius: 40px
        }

        .btn-login {
            width: 100%;
            background: none;
            padding: 15px;
            border: 1px solid white;
            font-size: 18px;
            letter-spacing: 5px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .button {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .botton a {
            color: white;
            font-size: 14px;
            text-decoration: none;
        }

        .button a:hover {
            text-decoration: underline;
        }

        .jargon {
            margin-top: 25px;
            color: rgb(10, 71, 71);
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
        }

        .judul {
            font-size: 30pt;
            margin: auto;
            width: 300px;
            height: 200px;
            float: right;
            background: url('assets/gambar/logo.png');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .judul h5 {
            font-size: 13pt;
            margin-top: -1px;
        }
    </style>
</head>

<body class="menu-login">
    <div class="judul">


    </div>
    <?php
    if (!empty($errors)) {
    ?>
        <?php
        foreach ($errors as $er) { ?>
            <div style="width: 30%;text-align:center;margin:auto;position:relative">
                <?php echo $er ?>
            </div>

        <?php }
        ?>

    <?php
    }
    ?>


    <form action="" method="POST">
        <div class="login">

            <div class="avatar">
                <i class="fa fa-user"></i>
            </div>
            <label style="margin-top:10px;text-align:center;font-size:17pt;color:beige;position:absolute;letter-spacing: 2px;"> Expense Management System</label>

            <h2>Login</h2>


            <div class="box-login">
                <i class="fa fa-envelope"></i>
                <input type="text" name="uname" placeholder="Username" required>

            </div>
            <div class="box-login">
                <i class="fa fa-lock"></i>
                <input type="password" name="psw" placeholder="Password" required>
            </div>

            <button type="submit" name="tom_login" style="color:whitesmoke; text-decoration:none" class="btn-login">Login

            </button>

            <p class="jargon">
                <b>Start Your Impossible</b>
            </p>
            <!-- <div class="button">
            <a href="">Register</a>
            <a href=""> Forgot Password</a>
        </div> -->
        </div>
    </form>
</body>

</html>