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
        <a href="giohang.php">Giỏ hàng </a>||<a href="dondadat.php"> Đang giao</a>||<a href="dagiao.php"> Đã giao</a>
    </div>
    <div class="container mt-3">
        <?php
        $sql = "SELECT * FROM `dondathang` WHERE tinhtrang = 'Chờ xử lý'";
        $result = mysqli_query($conn, $sql);
        $list_donhang = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list_donhang[] = $row;
            }
        }
        ?>

        <?php if (!empty($list_donhang)) {
            $temp = 0; ?>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID đơn hàng </th>
                        <th>Tên khách hàng</th>
                        <th>Đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Thời gian đặt</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_donhang as $item) {
                    ?>
                        <tr>
                            <td><?php echo $item['iddondathang']; ?></td>
                            <td> <?php echo $item['khachhang']; ?></td>
                            <td> <?php echo $item['dondathang']; ?></td>
                            <td><?php echo number_format($item['tongtien']); ?>,000 đ</td>
                            <td><?php echo $item['thoigian'];?></td>
                            <td><a  href="updatenhanhang.php?iddonhang=<?php echo $item['iddondathang']; ?>"><button style="width: 175px; height: 40px ; background-color: #a0bb9a; border-radius: 8%;">Đã nhận được hàng</button></a> <?php ?> </td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        <?php } else { ?>

            <H2><?php echo "Mua sắm nào bạn ơi!!!"; ?></H2>

        <?php
        } ?>
        <br><br><br>
    </div>

    <?php get_footer(); ?>