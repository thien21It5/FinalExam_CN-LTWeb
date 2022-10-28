<?php
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$sql = "SELECT * FROM `donhang` WHERE soluong <=10 and soluong  >= 2";
$result = mysqli_query($conn, $sql);
$list_donhang = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_donhang[] = $row;
    }
}
$sqll = "SELECT * FROM `dondathang` ";
$resultt = mysqli_query($conn, $sqll);
$list_dondathang = array();
$num_roww = mysqli_num_rows($resultt);
if (mysqli_num_rows($resultt) > 0) {
    while ($roww = mysqli_fetch_assoc($resultt)) {
        $list_dondathang[] = $roww;
    }
}
$sql2 = "SELECT * FROM `donhang` WHERE tinhtrang = 'Hết hàng'";
$result2 = mysqli_query($conn, $sql2);
$list_hethang = array();
$num_row2 = mysqli_num_rows($result2);
if ($num_row2 > 0) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $list_hethang[] = $row2;
    }
}
$sql3 = "SELECT * FROM `donhang` ";
$result3 = mysqli_query($conn, $sql3);
$list_tong = array();
$num_row = mysqli_num_rows($result3);
if ($num_row  > 0) {
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $list_tong[] = $row2;
    }
}
$sql4 = "SELECT * FROM `dondathang` WHERE tinhtrang = 'Đã hoàn thành' ";
$result4 = mysqli_query($conn, $sql4);
$list_tongtien = array();
if (mysqli_num_rows($result) > 0 ) {
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $list_tongtien[] = $row4;
    }
}
$tongtien =0;
foreach($list_tongtien as $item){
   $tongtien = $tongtien +$item['tongtien']; 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách nhân viên | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header">
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">


            <!-- User Menu-->
            <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php require '../../inc/sidebar.php'; ?>
    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Báo cáo doanh thu </b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x'></i>
                    <div class="info">
                        <h4>Tổng sản phẩm</h4>
                        <p><b><?php echo $num_row;?> sản phẩm</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
                    <div class="info">
                        <h4>Tổng đơn hàng</h4>
                        <p><b><?php echo $num_roww;?> đơn hàng</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
                    <div class="info">
                        <h4>Tổng thu nhập</h4>
                        <p><b><?php echo number_format($tongtien);?>,000 đ</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-tag-x'></i>
                    <div class="info">
                        <h4>Hết hàng</h4>
                        <p><b><?php echo $num_row2;?> sản phẩm</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon"><i class='icon fa-3x bx bxs-receipt'></i>
                    <div class="info">
                        <h4>Đơn hàng hủy</h4>
                        <p><b>2 đơn hàng</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM BÁN CHẠY</h3>
                    </div>
                    <div class="tile-body">
                        <?php
                        if (!empty($list_donhang)) {

                        ?>
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php foreach ($list_donhang as $item) {
                                    ?>
                                        <tr>
                                            <td><?php echo $item['masanpham']; ?></td>
                                            <td><?php echo $item['tensanpham']; ?></td>
                                            <td><?php echo number_format($item['giatien']); ?>,000 đ</td>
                                            <td><?php echo $item['danhmuc']; ?></td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">TỔNG ĐƠN HÀNG</h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                        <?php
                        if (!empty($list_dondathang)) {

                        ?>
                            <thead>
                                <tr>
                                    <th>ID đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Đơn hàng</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($list_dondathang as $item) {
                                    ?>
                                <tr>
                                    <td><?php echo $item['iddondathang']; ?></td>
                                    <td><?php echo $item['khachhang']; ?></td>
                                    <td><?php echo $item['dondathang']; ?></td>
                                    <td><?php echo $item['soluong']; ?> sản phẩm</td>
                                    <td><?php echo number_format($item['tongtien']); ?>,000 đ</td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div>
                        <h3 class="tile-title">SẢN PHẨM ĐÃ HẾT</h3>
                    </div>
                    <div class="tile-body">
                        <?php
                        if (!empty($list_hethang)) {

                        ?>
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Tình trạng</th>
                                        <th>Giá tiền</th>
                                        <th>Danh mục</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_hethang as $item) {
                                    ?>
                                        <tr>
                                            <td><?php echo $item['masanpham']; ?></td>
                                            <td><?php echo $item['tensanpham']; ?></td>
                                            <td><img src="../doc/img/<?php echo $item['anh']; ?>" alt="" width="100px;"></td>
                                            <td><?php echo $item['soluong']; ?></td>
                                            <td><span class="badge bg-success"><?php echo $item['tinhtrang']; ?></span></td>
                                            <td><?php echo number_format($item['giatien']); ?>,000 đ</td>
                                            <td><?php echo $item['danhmuc']; ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">DỮ LIỆU HÀNG THÁNG</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">THỐNG KÊ DOANH SỐ</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-right" style="font-size: 12px">
            <p><b>Hệ thống quản lý V2.0 | Code by Trường</b></p>
        </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
        var data = {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
            datasets: [{
                    label: "Dữ liệu đầu tiên",
                    fillColor: "rgba(255, 255, 255, 0.158)",
                    strokeColor: "black",
                    pointColor: "rgb(220, 64, 59)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "green",
                    data: [20, 59, 90, 51, 56, 100, 40, 60, 78, 53, 33, 81]
                },
                {
                    label: "Dữ liệu kế tiếp",
                    fillColor: "rgba(255, 255, 255, 0.158)",
                    strokeColor: "rgb(220, 64, 59)",
                    pointColor: "black",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "green",
                    data: [48, 48, 49, 39, 86, 10, 50, 70, 60, 70, 75, 90]
                }
            ]
        };


        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>

</html>