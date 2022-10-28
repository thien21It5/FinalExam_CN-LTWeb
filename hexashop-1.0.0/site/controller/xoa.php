<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
if (isset($_GET['name'])) {
    $sqll = "DELETE FROM `giohang` WHERE `donHang` = '{$_GET['name']}'";
    if (mysqli_query($conn, $sqll)) {
        header("location: giohang.php");
    }
}