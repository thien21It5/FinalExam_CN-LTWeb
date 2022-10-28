<?php
require 'site/controller/validation.php';
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$sql = "SELECT * FROM `dondathang` ";
$result = mysqli_query($conn, $sql);
$list_dondathang = array();
$num_row = mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_dondathang[] = $row;
    }
}
$sql2 = "SELECT * FROM `donhang` WHERE soluong <= 1";
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
$num_row3 = mysqli_num_rows($result3);

$sql4 = "SELECT * FROM `account` where id != 1 ";
$result4 = mysqli_query($conn, $sql4);
$num_row4 = mysqli_num_rows($result4);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách nhân viên | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="admin/doc/css/main.css">
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
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">


            <!-- User Menu-->
            <li><a class="app-nav__item" href="site/view/pages/login.php"><i class='bx bx-log-out bx-rotate-180'></i> </a>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img src="public/assets/images/logo.png">
            <div>
                <p class="app-sidebar__user-name"><b>ADMIN</b></p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li><a class="app-menu__item <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/admin/doc/admin.php") echo 'haha'; ?>" href="admin.php"><i class='app-menu__icon bx bx-tachometer'></i><span class="app-menu__label">Bảng điều khiển</span></a></li>
            <li><a class="app-menu__item <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/admin/doc/table-data-product.php") echo 'haha'; ?>" href="../../hexashop-1.0.0/admin/doc/table-data-product.php"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/admin/doc/table-data-oder.php") echo 'haha'; ?>" href="../../hexashop-1.0.0/admin/doc/table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span class="app-menu__label">Quản lý đơn hàng</span></a></li>
            <li><a class="app-menu__item <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/admin/doc/quan-ly-bao-cao.php") echo 'haha'; ?>" href="../../hexashop-1.0.0/admin/doc/quan-ly-bao-cao.php"><i class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
            </li>
        </ul>
    </aside>

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="app-title">
                    <ul class="app-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
                    </ul>
                    <div id="clock"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--Left-->
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                            <div class="info">
                                <h4>Tổng khách hàng</h4>
                                <p><b><?php echo $num_row4 ?> khách hàng</b></p>
                                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                            <div class="info">
                                <h4>Tổng sản phẩm</h4>
                                <p><b><?php echo $num_row3 ?> sản phẩm</b></p>
                                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                            <div class="info">
                                <h4>Tổng đơn hàng</h4>
                                <p><b><?php echo $num_row ?> đơn hàng</b></p>
                                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-md-6">
                        <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                            <div class="info">
                                <h4>Sắp hết hàng</h4>
                                <p><b><?php echo $num_row2 ?> sản phẩm</b></p>
                                <p class="info-tong">Số sản phẩm cảnh báo hết cần nhập thêm.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-12 -->
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Tình trạng đơn hàng</h3>
                            <div>
                                <?php if (!empty($list_dondathang)) {
                                ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID đơn hàng</th>
                                                <th>Tên khách hàng</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_dondathang as $item) { ?>
                                                <tr>
                                                    <td><?php echo $item['iddondathang'] ?></td>
                                                    <td><?php echo $item['khachhang'] ?></td>
                                                    <td>
                                                        <?php echo number_format($item['tongtien']) ?>,000 đ
                                                    </td>
                                                    <td><a href="admin/doc/updatedonhang.php?iddon=<?php echo $item['iddondathang'] ?>"><span class="badge bg-info"><?php echo $item['tinhtrang']; ?></span></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                            <!-- / div trống-->
                        </div>
                    </div>
                    <!-- / col-12 -->
                    <!-- col-12 -->

                    <!-- / col-12 -->
                </div>
            </div>
            <!--END left-->
            <!--Right-->
            <div class="col-md-12 col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Dữ liệu 6 tháng đầu vào</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--END right-->
        </div>


        <div class="text-center" style="font-size: 13px">
            <p><b>Copyright
                    <script type="text/javascript">
                        document.write(new Date().getFullYear());
                    </script> Phần mềm quản lý bán hàng | Dev By Trường
                </b></p>
        </div>
    </main>
    <script src="admin/doc/js/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="admin/doc/js/popper.min.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <!--===============================================================================================-->
    <script src="admin/doc/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="admin/doc/js/main.js"></script>
    <!--===============================================================================================-->
    <script src="admin/doc/js/plugins/pace.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="admin/doc/js/plugins/chart.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript">
        var data = {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
            datasets: [{
                label: "Dữ liệu đầu tiên",
                fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
                strokeColor: "rgb(255, 212, 59)",
                pointColor: "rgb(255, 212, 59)",
                pointStrokeColor: "rgb(255, 212, 59)",
                pointHighlightFill: "rgb(255, 212, 59)",
                pointHighlightStroke: "rgb(255, 212, 59)",
                data: [20, 59, 90, 51, 56, 100]
            }, {
                label: "Dữ liệu kế tiếp",
                fillColor: "rgba(9, 109, 239, 0.651)  ",
                pointColor: "rgb(9, 109, 239)",
                strokeColor: "rgb(9, 109, 239)",
                pointStrokeColor: "rgb(9, 109, 239)",
                pointHighlightFill: "rgb(9, 109, 239)",
                pointHighlightStroke: "rgb(9, 109, 239)",
                data: [48, 48, 49, 39, 86, 10]
            }]
        };
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
    </script>
    <script type="text/javascript">
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
</body>

</html>