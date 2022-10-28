<?php
session_start();
?>


<!-- Additional CSS Files -->
<link rel="stylesheet" type="text/css" href="../../../public/assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../../../public/assets/css/font-awesome.css">

<link rel="stylesheet" href="../../../public/assets/css/templatemo-hexashop.css">

<link rel="stylesheet" href="../../../public/assets/css/owl-carousel.css">

<link rel="stylesheet" href="../../../public/assets/css/lightbox.css">
<script src="https://kit.fontawesome.com/a2298bba2e.js" crossorigin="anonymous"></script>

<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="../../../index.php" class="logo">
                            <img src="../../../public/assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top">Home</a></li>
                            <li><a href="../../pages/about.php" <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/pages/about.php") echo 'class="active"'; ?>>About Us</a></li>
                            <li><a href="../pages/products.php" <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/pages/products.php") echo 'class="active"'; ?>>Products</a></li>
                            <li><a href="../pages/contact.php" <?php if ($_SERVER['SCRIPT_NAME'] == "/hexashop-1.0.0/pages/contact.php") echo 'class="active"'; ?>>Contact Us</a></li>
                            <?php
                            ob_start();
                            if (!isset($_SESSION["is_login"])) {
                                get_menuaccount();
                            } else {
                                if ($_SESSION["is_login"] == true) {
                                    get_giohang();
                                    get_logout();
                                }
                            }
                            ?>
                        </ul>

                        <!-- ***** Menu End ***** -->

                    </nav>
                </div>
            </div>
        </div>
    </header>