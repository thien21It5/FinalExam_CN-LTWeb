<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$timestamp = time();
$timenow = (date("Y-F-d h:i:s", $timestamp));
$sqli = "UPDATE `dondathang` SET `tinhtrang`='Đã hoàn thành', `thoigian2` = '$timenow' WHERE `iddondathang`='{$_GET['iddonhang']}'";
if(mysqli_query($conn, $sqli)){
    header("location: dondadat.php");
}
                            
?>