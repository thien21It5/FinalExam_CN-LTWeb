<?php
require '../../controller/validation.php';
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - About Page</title>
    <?php get_header();
    ?>

    <!-- ***** Header Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container" style="margin-top: 150px">
            <div class="row">
                <div class="col-lg-3">
                    <div id="userheader">
                        <i class="fa-sharp fa-solid fa-user-pen fa-2xl"></i>&ensp;: &ensp;
                        <?php echo $_SESSION['username'] ?>
                    </div>
                    <br><br>
                    <hr>
                    <br>
                    <div class="user-setting">
                        <div class="hoso">
                            <a href="userinfo.php?page=hoso">
                                <i class="fa-solid fa-user"></i>
                                <span>: Hồ sơ</span>
                            </a>
                        </div>
                        <br>
                        <a href="userinfo.php?page=diachi">
                            <div class="diachi">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>: Địa chỉ</span>
                            </div>
                        </a>
                        <br>
                        <a href="userinfo.php?page=matkhau">
                            <div class="changepw">
                                <i class="fa-solid fa-lock"></i>
                                <span>: Đổi mật khẩu</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <?php
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == "hoso") {
                            get_hoso();
                        }
                    }
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == "matkhau") {
                            get_matkhau();
                        }
                    }
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == "diachi") {
                            get_diachi();
                        }
                    }
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == "themdiachi") {
                            get_themdiachi();
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php


    ?>
    <h3 style="margin-left: 415px; color: #60b994;"><?php if (isset($notification)) echo $notification; ?></h3>

    <!-- ***** About Area Ends ***** -->
    <!-- ***** Footer Start ***** -->
    <?php get_footer(); ?>