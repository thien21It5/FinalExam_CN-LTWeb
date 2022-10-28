<?php
    // session_start();
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}

$sqll = ("SELECT * FROM `account` Where username = '{$_SESSION['username']}'");
$result = mysqli_query($conn, $sqll);
if ($row = mysqli_fetch_assoc($result)) {
}


?>
<div class="container">
    <h2 style="font-weight: 10 ;">Hồ sơ của tôi</h2>
    <h3 style="font-weight: 100 ;">Quản lý thông tin hồ sơ để bảo mật tài khoản</h3>
    <hr>
    <div class="taikhoan">
        <form action="capnhathoso.php" method="post">
            <div class="taikhoan1">
                <label for="">Tên đăng nhập </label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <span><?php echo $_SESSION['username'] ?></span>
            </div><br>
            <div class="taikhoan1">
                <label for="">Email </label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <span><?php echo $_SESSION['email'] ?></span>
            </div><br>
            <div class="taikhoan1">
                <label for="">Số điện thoại </label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <input type="text" name="phoneuser" value="<?php echo $row['sdt'] ?>">
            </div><br>
            <div class="taikhoan1">
                <label for="">Giới tính </label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <input type="radio" name="gender-user" value="Nam" <?php if ($row['gioitinh'] == "Nam") {
                                                                        echo "checked";
                                                                    } ?>>Nam
                <input type="radio" name="gender-user" value="Nữ" <?php if ($row['gioitinh'] == "Nữ") {
                                                                        echo "checked";
                                                                    } ?>>Nữ
                <input type="radio" name="gender-user" value="khác" <?php if ($row['gioitinh'] == "khác") {
                                                                        echo "checked";
                                                                    } ?>>Khác
            </div>
            <br>
            <input type="submit" name="submit-hoso" value="Lưu">
        </form>
    </div>
</div>
<?php

?>