<!-- //Xử lý back-end -->
<?php

require '../lib/validation.php';
get_signup();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Creative Colorlib SignUp Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
    <link rel="stylesheet" href="../template-signup/css/style.css">
</head>

<body>
    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>SIGN UP</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="#" method="post">
                    <input class="text" type="text" name="username" id="username" value="" placeholder="Username" required="">
                    <span style="color: white;"><?php if(isset($error1)){echo $error1;}?></span><br>
                    <input class="text email" type="email" name="email" id="email" value="" placeholder="Email" required=""><br>
                    <input class="text" type="password" name="password" id="password" value="" placeholder="Password" required="">
                    <span style="color: white;"><?php if(isset($error2)){echo $error2;}?></span><br>
                    <input class="text w3lpass" type="password" name="confirm-password" id="confirm-password" value="" placeholder="Confirm Password" required="">
                    
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" name="btn-submit" value="SIGNUP">
                </form>
                <p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>