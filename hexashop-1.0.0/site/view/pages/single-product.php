<?php
require '../../controller/validation.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location: products.php");
}
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$sql = "SELECT * FROM `donhang` WHERE masanpham = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['addcard'])) {
    session_start();
    $sql = "SELECT * FROM `giohang` WHERE `donHang` = '{$row['tensanpham']}'";
    $result = mysqli_query($conn, $sql);
    if (!$roww = mysqli_fetch_assoc($result)) {
        $sql = "INSERT INTO `giohang`(`khachhang`, `donHang`, `soluong`,`hinhanh`,`sotien`) VALUES ('{$_SESSION["username"]}','{$row['tensanpham']}','{$_POST['soluongsp']}','{$row['anh']}','{$row['giatien']}')";
        if (mysqli_query($conn, $sql)) {
            header("Location: giohang.php");
        }
    } else {
        $soluong = 0;
        $soluong = $roww['soluong'] + $_POST['soluongsp'];
        $sql = "UPDATE `giohang` SET `soluong`='$soluong' WHERE `donHang` = '{$row['tensanpham']}'";
        mysqli_query($conn, $sql);
        header("location: giohang.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Detail Page</title>


    <!-- Additional CSS Files -->

    <?php get_header(); ?>

    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Single Product Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">
                        <img src="../../../admin/doc/img/<?php echo $row['anh']; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4><?php echo $row['tensanpham']; ?></h4>
                        <span class="price"><?php echo $row['giatien']; ?> đ</span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt ut labore.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        <div class="quantity-content">
                            <form method="post">
                                <div class="left-content">
                                    <h6>No. of Orders</h6>
                                </div>
                                <div class="right-content">
                                    <input name="soluongsp" type="number" id="soluongso" placeholder="Amount" value="1" required="" style="height: 50px;">
                                </div>
                        </div>
                        <div class="total">
                            <h4>Total: <?php echo number_format($row['giatien']); ?>,000 đ</h4>
                            <?php
                            if (isset($_SESSION['username'])) {
                               get_btnaddcart();
                            }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php get_footer(); ?>