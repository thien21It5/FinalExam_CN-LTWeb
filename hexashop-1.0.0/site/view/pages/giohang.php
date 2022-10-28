<?php
require '../../controller/validation.php';
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
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

    <title>Hexashop - Card page</title>


    <!-- Additional CSS Files -->

    <?php get_header(); ?>
    <div class="page-heading card-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Card Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-3">
    <a href="giohang.php">Giỏ hàng </a>||<a href="dondadat.php"> Đang xử lý </a>||<a href="dagiao.php"> Đã giao</a>
    </div>
    <div class="container mt-3">
        <?php
        $sql = "SELECT * FROM `giohang` WHERE khachhang = '{$_SESSION["username"]}'";
        $result = mysqli_query($conn, $sql);
        $list_donhang = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list_donhang[] = $row;
            }
        }
        ?>
        <?php if (!empty($list_donhang)) { ?>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_donhang as $item) {
                        $hinhanh = $item['hinhanh'];
                        $soluong = $item['soluong'];
                        $sum = $item['soluong']*$item['sotien'];
                    ?>
                        <tr>
                            <td><img src="../../../admin/doc/img/<?php echo $item['hinhanh']; ?>" alt="" width="100px;"></td>
                            <td><?php echo $item['donHang']; ?></td>
                            <td> <?php echo $item['soluong']; ?></td>
                            <td><?php echo number_format($sum); ?>,000 đ</td>
                            <td><a href="sua.php?name=<?php echo $item['donHang']; ?>">Sửa || </a><a href="xoa.php?name=<?php echo $item['donHang']; ?>">Xóa</a></td>
                            <?php if(isset($_POST['sua'])){
                                $sql = ("UPDATE `giohang` SET `soluong`='$soluong' WHERE `hinhanh` = '$hinhanh' ");
                                mysqli_query($conn,$sql);
                            }
                            
                            ?>
                            
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <a href="products.php" ><H2 style="color: red;"><?php echo "Mua sắm nào bạn ơi!!!"; ?></H2></a>

        <?php
        } ?>
        <br><br><br>
        <div class="main-border-button" style="width: 127px; height: 47px; background-color: #a0bb9a;"><a href="checkout.php?name=<?php echo $_SESSION['username'] ?>">CHECK OUT</a></div>
    </div>

    <?php get_footer(); ?>