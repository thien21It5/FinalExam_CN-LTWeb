<?php
require '../../controller/validation.php';
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
if (isset($_POST['btn-sua'])) {
    $sqll = "UPDATE `giohang` SET `soluong`='{$_POST['soluong']}' WHERE donHang = '{$_GET['name']}'";
    if (mysqli_query($conn, $sqll)) {
        header("location: giohang.php");
    }
}
?>

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
    <?php
    $sql = "SELECT * FROM `giohang` WHERE khachhang = '{$_SESSION["username"]}' and donHang = '{$_GET['name']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
    ?>
        <form method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Số tiền</th>
                    </tr>
                </thead>
                <tbody><?php
                        $hinhanh = $row['hinhanh'];
                        $soluong = $row['soluong'];
                        ?><form method="post">
                        <tr>
                            <td><img src="../../../admin/doc/img/<?php echo $row['hinhanh']; ?>" alt="" width="100px;"></td>
                            <td><?php echo $row['donHang']; ?></td>
                            <td> <input type="number" name="soluong" value="<?php echo $row['soluong']; ?>"></td>
                            <td><?php echo $row['sotien']; ?></td>

                        </tr>
                </tbody>
            </table>
        <?php } else {
        header("location: product.php");
    } ?>
        <br>
        <button type="submit" name="btn-sua">Xong</button>
        </form>
</div>

<?php get_footer(); ?>