<?php
ob_start();
global $notification6;
global $notification5;
global $notification4;
global $notification3;
global $notification2;
global $notification1;
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
//Kiểm tra trường mật khẩu cũ có để trống hay không
if (empty($_POST['old-password'])) {
    $notification = ("Không được để trống trường này!");
} else {
    //Kiểm tra mật khẩu cũ đã đúng hay chưa
    $sql = "SELECT * FROM `account` WHERE `password` = '{$_POST['old-password']}' ";
    $result = mysqli_query($conn, $sql);
    if (!$row = mysqli_fetch_assoc($result)) {
        $notification2 = "Mật khẩu cũ nhập chưa đúng!";
    }
}
//Kiểm tra trường mật khẩu mới có trống hay không 
if (!empty($_POST['new-password'])) {
    // Kiểm tra mật khẩu đúng định dạng hay chưa
    $parrten2 = "/^([A-Z]){1}([\_\!@#$%^&*()]+){6,32} $/";
    if (preg_match($parrten2, $_POST['new-password'], $match)) {
        $notification4 = "Mật khẩu chưa đúng dịnh dạng.";
    }
} else {
    $notification3 = "Mật khẩu trống";
}
//Kiểm tra "Nhập lại mật khẩu" có trống hay không
if (empty($_POST['re-new-password'])) {
    $notification5 = "Không được để trống trường này";
} else {
    if ($_POST['new-password'] == $_POST['re-new-password']) {
        if (empty($notification) and empty($notification2) and empty($notification3) and empty($notification4) and empty($notification5)) {
            $sql = "UPDATE `account` SET `password`='{$_POST['new-password']}' WHERE username = '{$_SESSION['username']}' ";
            if (mysqli_query($conn, $sql)) {
                $notification7 = "Đổi mật khẩu thành công!";
            }
        }
    } else {
        $notification6 = "Mật khẩu chưa khớp.";
    }
}




?>
<div class="container">
    <h2 style="font-weight: 10 ;">Đổi Mật Khẩu</h2>
    <h3 style="font-weight: 100 ;">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu </h3>
    <hr>
    <div class="taikhoan">
        <form action="" method="post">
            <div class="taikhoan1">
                <label for="">Mật khẩu cũ </label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <input type="password" name="old-password"> <?php if (isset($_POST['submit-matkhau'])) {
                                                                if (isset($notification)) echo $notification;
                                                                if (isset($notification2)) echo $notification2;
                                                            } ?>
            </div><br>
            <div class="taikhoan1">
                <label for="">Mật khẩu mới</label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <input type="password" name="new-password"><?php if (isset($_POST['submit-matkhau'])) {
                                                                if (isset($notification3)) echo $notification3;
                                                                if (isset($notification4)) echo $notification4;
                                                            } ?>
            </div><br>
            <div class="taikhoan1">
                <label for="">Nhập lại mật khẩu mới</label>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                <input type="password" name="re-new-password"><?php if (isset($_POST['submit-matkhau'])) {
                                                                    if (isset($notification5)) echo $notification5;
                                                                    if (isset($notification6)) echo $notification6;
                                                                } ?>
            </div><br>

            <br>
            <input type="submit" name="submit-matkhau" value="Xác nhận"><?php if (isset($notification7)) echo $notification7; ?>
        </form>
    </div>
</div>