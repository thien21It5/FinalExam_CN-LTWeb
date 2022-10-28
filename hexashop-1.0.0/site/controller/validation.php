<?php

function get_signup()
{
    ob_start();
    global $error1;
    global $error2;
    $conn = mysqli_connect("localhost", "root", "", "cuoiki");
    if (!$conn) {
        die("Kết nối thất bại" . mysqli_connect_error());
    }
    if (isset($_POST['btn-submit'])) {
        $parrten1 = "/^[A-Z a-z 0-9_\.]{6,32} $/";
        if (!preg_match($parrten1, $_POST['username'], $match)) {
            $error1 = "Tên đăng nhập chưa đúng dịnh dạng.";
        } else {
            $error1 = "";
        }
        $parrten2 = "/^([A-Z]){1}([\_\!@#$%^&*()]+){6,32} $/";
        if (!preg_match($parrten2, $_POST['password'], $match)) {
            $error2 = "Mật khẩu chưa đúng dịnh dạng.";
        } else {
            $error2 = "";
        }
        if ($_POST['password'] == $_POST['confirm-password']) {
            $sql = "INSERT INTO `account` (`username`,`email`,`password`)" .
                "VALUES ('{$_POST['username']}','{$_POST['email']}','{$_POST['password']}')";
            if (mysqli_query($conn, $sql)) {
                header("Location: login.php");
            }
        } else {
            $error = "Mật khẩu chưa khớp.";
        }
    }
}

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}


function get_menuaccount()
{
    require 'inc/loginmenu.php';
}

function get_logout()
{
    require 'inc/logout.php';
}

function get_header()
{
    require 'inc/header.php';
}

function get_footer()
{
    require 'inc/footer.php';
}

function get_pagination()
{
    require 'inc/pagination.php';
}

function get_sidebar()
{
    require 'inc/sidebar.php';
}
function get_btnaddcart()
{
    require 'inc/addtocard.php';
}
function get_userinfo()
{
    require 'inc/info-user.php';
}
function get_giohang(){
    require 'inc/acpgiohang.php';
}

function get_hoso(){
    require 'inc/hoso.php';
}
function get_matkhau(){
    require 'inc/doimatkhau.php';
}
function get_diachi(){
    require 'inc/diachi.php';
}
function get_themdiachi(){
    require 'inc/themdiachi.php';
}

