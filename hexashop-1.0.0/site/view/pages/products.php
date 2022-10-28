<?php
require '../../controller/validation.php';
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
if (isset($_GET['danhmuc'])) {
    $sql = "SELECT * FROM `donhang` WHERE tinhtrang = 'Còn hàng' AND danhmuc = '{$_GET['danhmuc']}'";
    $result = mysqli_query($conn, $sql);
    $list_donhang = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_donhang[] = $row;
        }
    }
} else {
    $sql = "SELECT * FROM `donhang` WHERE tinhtrang = 'Còn hàng' AND danhmuc = 'Áo phông'";
    $result = mysqli_query($conn, $sql);
    $list_donhang = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_donhang[] = $row;
        }
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

    <title>Hexashop - Product Listing Page</title>


    <!-- Additional CSS Files -->

    <?php get_header() ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Category</h2><br>
                        <a href="../pages/products.php?danhmuc=Áo phông">Áo phông</a>&ensp;
                        <a href="../pages/products.php?danhmuc=Sweater">Sweater</a>&ensp;
                        <a href="../pages/products.php?danhmuc=Áo phao">Áo phao</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2><?php if(isset($_GET['danhmuc']))echo $_GET['danhmuc'];else{echo "Áo phông";} ?> :</h2><br><br>
            <div class="row">
                <?php
                if (!empty($list_donhang)) {
                ?>
                    <?php foreach ($list_donhang as $item) {
                    ?>
                        <div class="col-lg-4">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.php?id=<?php echo $item['masanpham'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="../../../admin/doc/img/<?php echo $item['anh']; ?>" alt="">
                                </div>
                                <div class="down-content">
                                    <h4><?php echo $item['tensanpham']; ?></h4>
                                    <span><?php echo number_format($item['giatien']); ?>,000 đ</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php get_footer(); ?>