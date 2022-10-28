<!-- Xử lý back-end -->
<?php
ob_start();
session_start();
if (isset($_SESSION['is_login'])) {
    unset($_SESSION['is_login']);
}
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
if (isset($_POST['btn-login'])) {
    $username_login = $_POST['username-login'];
    $password_login = $_POST['password-login'];
    $sql = "SELECT * FROM `account` WHERE `username` = '$username_login' AND `password` = '$password_login' ";
    $result = mysqli_query($conn, $sql);
    if (!$row = mysqli_fetch_assoc($result)) {
        $error =  "Your username or password is incorrect!";
    } else {
        // print_r($row);
        if ($row['id'] == 1) {
            header("location: ../../../admin.php");
        } else {
            $_SESSION["is_login"] = true;
            $_SESSION["username"] = $_POST['username-login'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["std"] = $row['sdt'];
            header("location: ../../../index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../../../public/template-login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../../../public/template-login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="../../../public/template-login/images/eada3d7ecc050b5b5214.jpg" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="post">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="username-login" placeholder="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password-login" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                        </span>
                        <br>
                        <?php if (isset($_POST['btn-login'])) {
                            if (!empty($error)) {
                                echo $error;
                            }
                        } ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="btn-login" id="btn-login">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="signup.php">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="../../../public/template-login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../public/template-login/vendor/bootstrap/js/popper.js"></script>
    <script src="../../../public/template-login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../public/template-login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../../../public/template-login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>