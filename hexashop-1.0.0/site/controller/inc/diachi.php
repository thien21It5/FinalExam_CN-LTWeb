<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$sql = "SELECT * FROM `diachi`";
$result = mysqli_query($conn, $sql);
$list_diachi = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_diachi[] = $row;
    }
}
?>
<div class="container">
    <div class="adress-header" style="display: flex;">
        <h2 style="width: 300px;">Địa chỉ của tôi</h2>
        <a href="userinfo.php?page=themdiachi"><button style=" margin-left: 300px ; width: 155px;" type="submit" name="addadress">Thêm địa chỉ mới</button> </a>
    </div>
    <br>
    <hr style="margin-top: 25px ;">&ensp;&ensp;&ensp;&ensp;
    <?php
    if (isset($_GET['main'])) {
        $sqll = "UPDATE `diachi` SET `main`='' WHERE 1";
        mysqli_query($conn, $sqll);
        $sqlll = "UPDATE `diachi` SET `main`='main' WHERE id = '{$_GET['main']}'";
        mysqli_query($conn, $sqlll);
        echo "Đã đặt làm mặc đinh!";
    }
    ?>
    <h5>Địa chỉ :</h5>
    <?php if (!empty($list_diachi)) {
        foreach ($list_diachi as $item) {
    ?>
            <div class="diachi">
                <span><?php echo $item['hoten'] ?></span> | <span><?php echo $item['sdt'] ?></span>
                <p><?php echo $item['address'] ?></p>
            </div>
            <a href="userinfo.php?page=diachi&main=<?php echo $item['id'] ?>">Đặt làm mặc định</a>
            <hr>
    <?php }
    } ?>
</div>