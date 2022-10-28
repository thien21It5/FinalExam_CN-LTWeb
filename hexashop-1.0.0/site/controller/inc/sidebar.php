<?php 
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
?>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img src="../../public/assets/images/logo.png">
            <div>
                <p class="app-sidebar__user-name"><b>ADMIN</b></p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li><a class="app-menu__item <?php if($_SERVER['SCRIPT_NAME']=="/hexashop-1.0.0/admin/doc/admin.php") echo 'haha';?>" href="../admin.php"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng điều khiển</span></a></li>
            <li><a class="app-menu__item <?php if($_SERVER['SCRIPT_NAME']=="/hexashop-1.0.0/admin/doc/table-data-product.php") echo 'haha';?>" href="table-data-product.php"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item <?php if($_SERVER['SCRIPT_NAME']=="/hexashop-1.0.0/admin/doc/table-data-oder.php") echo 'haha';?>" href="table-data-oder.php"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Quản lý đơn hàng</span></a></li>
            <li><a class="app-menu__item <?php if($_SERVER['SCRIPT_NAME']=="/hexashop-1.0.0/admin/doc/quan-ly-bao-cao.php") echo 'haha';?>" href="quan-ly-bao-cao.php"><i
            class='app-menu__icon bx bx-pie-chart-alt-2' ></i><span class="app-menu__label">Báo cáo doanh thu</span></a>
            </li>
        </ul>
    </aside>