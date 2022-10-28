<?php
session_start();
ob_start();
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$sql = "UPDATE `account` SET `sdt`='{$_POST['phoneuser']}',`gioitinh`='{$_POST['gender-user']}' WHERE username = '{$_SESSION['username']}' ";
if (mysqli_query($conn, $sql)) {

    $notification = "Đã lưu";
    header('location: userinfo.php?page=hoso');
} else {
    $notification = "Xảy ra sự cố";
}

