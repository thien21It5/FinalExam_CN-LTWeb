<h1>Thêm địa chỉ mới</h1>

<div class="themdiachi" style="margin-top: 50px;">
    <form action="" method="post">
        <label for="">Họ và tên</label>
        <input style="margin-left: 150px;" type="text" name="hoten"><?php if (isset($_POST['themdiachimoi'])) {
                                                                        if (empty($_POST['hoten'])) {
                                                                            echo "Không được để trống họ tên!";
                                                                        } else {
                                                                            if (isset($error1)) echo $error1;
                                                                        }
                                                                    } ?><br><br>
        <label for="">Số điện thoại</label>
        <input style="margin-left: 125px;" type="text" name="sdt"><?php if (isset($_POST['themdiachimoi'])) {
                                                                        if (empty($_POST['hoten'])) {
                                                                            echo "Không được để trống số điện thoại!";
                                                                        } else {
                                                                            if (isset($error2)) echo $error2;
                                                                        }
                                                                    } ?><br><br>
        <label for="">Địa chỉ</label>
        <input style="margin-left: 172px;" type="text" name="diachi"><?php if (isset($_POST['themdiachimoi'])) {
                                                                            if (empty($_POST['hoten'])) echo $error3 = "Không được để trống địa chỉ!";
                                                                        } ?><br><br><br>
        <button type="submit" name="themdiachimoi">Lưu</button>
    </form>
</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
if (isset($_POST['themdiachimoi'])) {
    if (isset($_POST['hoten'])) {
        $partten = "/^[A-Z a-z0-9_.]{3,100}$/";
        $name = $_POST['hoten'];
        if (preg_match($partten, $name, $matchs))
            $error1 = "Tên bạn nhập không đúng định dạng.";
    }
    if (isset($_POST['sdt'])) {
        $partten = "/^[0-9]{10,11}$/";
        $phone = $_POST['sdt'];
        if (!preg_match($partten, $phone, $matchs))
            $error2 = "SDT bạn nhập không đúng định dạng.";
    }
    if (empty($error1) and empty($error2) and empty($error3)) {
        $sql = "INSERT INTO `diachi`(`hoten`, `sdt`, `address`) VALUES ('{$_POST['hoten']}','{$_POST['sdt']}','{$_POST['diachi']}')";
        mysqli_query($conn, $sql);
        echo "Thêm thành công";
    }
}
?>