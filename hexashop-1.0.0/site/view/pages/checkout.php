<?php
require '../../controller/validation.php';
session_start();
$conn = mysqli_connect("localhost", "root", "", "cuoiki");
if (!$conn) {
    die("Kết nối thất bại" . mysqli_connect_error());
}
$sqlllll = "SELECT * FROM `diachi` where `main` = 'main'";
$resulttttt = mysqli_query($conn, $sqlllll);
if (mysqli_num_rows($resulttttt) > 0) {
    $rowwwww = mysqli_fetch_assoc($resulttttt);
}
$error = array();
$sql = "SELECT * FROM `giohang` WHERE khachhang = '{$_SESSION["username"]}'";
$result = mysqli_query($conn, $sql);
$list_donhang = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $list_donhang[] = $row;
  }
} else {
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Check out</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


  <!-- Demo CSS (No need to include it into your project) -->
  <link rel="stylesheet" href="../../../public/assets/css/demo.css">

</head>

<body>
  <?php //get_header(); 
  ?>
  <main>
    <form action="" method="post"><button type="submit" name="veindex" class="btn btn-primary"> <img src="../../../public/assets/images/home.png" width="30" height="30" alt=""> Về trang chủ</button> </form>
    <?php if (isset($_POST['veindex'])) {
      unset($_SESSION['xuly']);
      header("location: ../../../index.php");
    } ?>

    <div class="py-1 text-center">
      <h2>Thanh toán</h2>
      <!-- <p class="lead">Below is an example form built entirely with Bootstrap 5 form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
    </div>
    <form class="needs-validation" novalidate method="post">
      <div class="row">

        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Giỏ hàng</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <?php
            ?>
            <?php if (!empty($list_donhang)) {
              $soluong = 0;
              $sum = 0;
              $donhang = ""; ?>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá 1 sản phẩm</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_donhang as $item) {
                    $soluong = $soluong + $item['soluong'];
                    $sum = $sum + ($soluong * $item['sotien']);
                    $donhang = "{$item['donHang']},{$donhang}";
                  ?>
                    <tr>
                      <td><?php echo $item['donHang']; ?></td>
                      <td><?php echo $item['soluong']; ?></td>
                      <td><?php echo number_format($item['sotien']); ?>,000 đ</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php } ?>
          </ul>
          <h4> <?php if (isset($sum)) {
                  $formattedNum = number_format($sum);
                  echo "Tổng tiền: $formattedNum,000 đ";
                } ?></h4>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Địa chỉ thanh toán</h4>
          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control" name="tenkhachhang" placeholder="Họ và tên" value="<?php if (isset($rowwwww['hoten'])) echo $rowwwww['hoten'] ?>" required>
              <?php if (isset($_POST['btncheckout'])) {
                if (empty($_POST['tenkhachhang'])) echo $error[] = "Vui lòng nhập Tên";
                else {
                  if (!empty($error1)) echo $error1;
                }
              } ?>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group">
              <input type="text" class="form-control" name="username" id="username" placeholder="Tài Khoản" value="<?php if (isset($_SESSION["username"])) echo $_SESSION["username"]; ?>" required><br>
              <?php if (isset($_POST['btncheckout'])) {
                if (!isset($_POST['username'])) {
                  echo "Vui lòng nhập tên đăng nhập.";
                } else {
                  if ($_POST['username'] != $_SESSION['username']) {
                    echo "Tài khoản bạn nhập khác với tài khoản đang đăng nhập.";
                  }
                }
              } ?>
            </div>
          </div>

          <div class="mb-3">
            <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"]; ?>" placeholder="xxx@example.com(tuỳ chọn)">
            <?php if (!empty($error2)) echo $error2; ?>
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ" value="<?php if (isset($rowwwww['address'])) echo $rowwwww['address'] ?>" required>
            <?php if (isset($_POST['btncheckout'])) {
              if (empty($_POST['address'])) echo $error[] = "Vui lòng nhập Địa chỉ";
            } ?>
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" name="phone" id="phone" value="<?php if (isset($rowwwww['sdt'])) echo $rowwwww['sdt'] ?>" placeholder="Số điện thoại">
            <?php if (isset($_POST['btncheckout'])) {
              if (empty($_POST['phone'])) echo $error[] = "Vui lòng nhập SDT";
              if (isset($error3)) echo $error3;
            } ?>
          </div>

          <hr class="mb-4">

          <h4 class="mb-3">Thanh toán</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" checked class="custom-control-input" required>
              <label class="custom-control-label" for="recieved">Thanh toán khi nhận hàng</label>
            </div>
          </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="btncheckout">Tiếp tục thanh toán</button>
          <?php //if (isset($_SESSION['xuly'])) echo $_SESSION['xuly']; ?>
    </form>
    </div>
    </div>
    </div>
    <!-- End Demo HTML -->

  </main>



  <!-- Bootstrap 5 JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
<?php 
if (isset($_POST['btncheckout'])) {
  $xuly = "Đang xử lý đơn hàng.";
  if (isset($_POST['tenkhachhang'])) {
      $partten = "/^[A-Z a-z0-9_.]{3,100}$/";
      $name = $_POST['tenkhachhang'];
      if (preg_match($partten, $name, $matchs))
          $error1 = "Tên bạn nhập không đúng định dạng.";
  }
  if (isset($_POST['email'])) {
      $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
      $email = $_POST['email'];
      if (!preg_match($partten, $email, $matchs))
          $error2 = "Mail bạn vừa nhập không đúng định dạng ";
  }
  if (isset($_POST['phone'])) {
      $partten = "/^[0-9]{10,11}$/";
      $phone = $_POST['phone'];
      if (!preg_match($partten, $phone, $matchs))
          $error3 = "SDT bạn nhập không đúng định dạng.";
  }
  if (isset($donhang)) {
      if (empty($error) and empty($error1) and empty($error2) and empty($error3)) {
          $timestamp = time();
          $timenow = (date("Y-m-d h:i:s", $timestamp));
          $sql = "INSERT INTO `dondathang`(`khachhang`, `dondathang`, `soluong`, `tongtien`, `diachi`, `dienthoai`, `username`, `email`, `tinhtrang`, `thoigian`) VALUES ('{$_POST['tenkhachhang']}','$donhang','$soluong','$sum','{$_POST['address']}','{$_POST['phone']}','{$_SESSION['username']}','{$_SESSION['email']}','Chờ xử lý','$timenow')";
          mysqli_query($conn, $sql);
          $sqll = "DELETE FROM `giohang` WHERE khachhang = '{$_SESSION["username"]}'";
          mysqli_query($conn, $sqll);
          require '../../controller/senmailcheckout.php';
          echo $xuly;
      }
  } else {
      echo "Giỏ hàng trống!";
  }
}
?>