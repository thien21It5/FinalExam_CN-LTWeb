<?php
        $error_add = array();
        if (isset($_POST['btn-save'])) {
          if (isset($_POST['masanpham'])) {
            $masanpham = $_POST['masanpham'];
          } else {
            $error_add[] = "Chưa nhập mã sản phẩm";
          }
          if (isset($_POST['tensanpham'])) {
            $tensanpham = $_POST['tensanpham'];
          } else {
            $error_add[] = "Chưa nhập tên sản phẩm";
          }
          if (isset($_POST['soluong'])) {
            $soluong = $_POST['soluong'];
          } else {
            $error_add[] = "Chưa nhập số lượng";
          }
          if (isset($_POST['tinhtrang'])) {
            $tinhtrang = $_POST['tinhtrang'];
          } else {
            $error_add[] = "Chưa nhập tình trạng";
          }
          if (isset($_POST['danhmuc'])) {
            $danhmuc = $_POST['danhmuc'];
          } else {
            $error_add[] = "Chưa nhập danh mục";
          }
          if (isset($_POST['giaban'])) {
            $giaban = $_POST['giaban'];
          } else {
            $error_add[] = "Chưa nhập giá bán";
          }
          if (isset($_POST['ImageUpload'])) {
            echo $_POST['ImageUpload'];
          } else {
            $error_add[] = "Chưa chọn ảnh";
          }
          if (isset($_POST['mota'])) {
            $mota = $_POST['mota'];
          }
          if (empty($error_add)) {
            $conn = mysqli_connect("localhost", "root", "", "cuoiki");
            if (!$conn) {
              die("Kết nối thất bại" . mysqli_connect_error());
            }
            $sql = "INSERT INTO `donhang`(`masanpham`, `tensanpham`, `soluong`, `tinhtrang`, `giatien`, `danhmuc`, `anh`, `mota`) VALUES ('{$_POST['masanpham']}','{$_POST['tensanpham']}','{$_POST['soluong']}','{$_POST['tinhtrang']}','{$_POST['giaban']}','{$_POST['danhmuc']}','{$_POST['ImageUpload']}','{$_POST['mota']}')";
            if (mysqli_query($conn, $sql)) {
              header("Location: table-data-product.php");
            }
          }else{
            foreach($error_add as $value){
              echo $value;
            }
          }
        }
?>