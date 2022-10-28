<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}

$id = $_GET['iddon'];

$sql = "SELECT * FROM `dondathang` where `iddondathang`='{$id}' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) { 
    $row = mysqli_fetch_assoc($result);
}

if($row['tinhtrang'] = 'Chờ xử lý') {
    $sqli = "UPDATE `dondathang` SET `tinhtrang`='Đã hoàn thành' WHERE `iddondathang`='{$id}'";
    if (mysqli_query($conn, $sqli)) {
        header("location: ../../../admin.php");
    }
}
