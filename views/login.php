<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'blocks/head.php';
    require_once '../lib/session.php';
    Session::init();
    require_once '../classes/customer.php';
    $cs = new customer();
    ?>
</head>

<body class="animsition">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        $login_Customer = $cs->login_customer($_POST);
    }
    ?>
    <?php
    $login_check = Session::get('customer_login');
    if ($login_check) {
        header('Location:shoping-cart.php');
    }
    ?>
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Shop Giày Độc Lạ Bình Dương
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="contact.php" class="flex-c-m trans-04 p-lr-25">
                        Liên Hệ
                    </a>
                    <?php
                    if (isset($_GET['customer_id'])) {
                        Session::destroy();
                    }
                    $login_check = Session::get('customer_login');
                    if ($login_check == false) {
                        echo '<a href="../views/login.php" class="flex-c-m trans-04 p-lr-25"> Tài Khoản</a>';
                    } else {
                        echo '<a href="#" class="flex-c-m trans-04 p-lr-25">Xin Chào' . " " . Session::get('customer_name') . ' </a>';
                        echo '<a href="?customer_id=' . Session::get('customer_id') . '" class="flex-c-m trans-04 p-lr-25">Đăng Xuất</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="container-menu-desktop">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="index.php" class="logo">
                    <img src="../public/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <a href="product.php">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="about.php">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="contact.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <a href="shoping-cart.php"
                        class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>
        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="../public/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </div>

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Tài khoản
        </h2>
    </section>
    <!-- Login -->
    <div class="container">
        <br>
        <h1>Đăng nhập</h1>
        <p>Nhập tài khoản mật khẩu để đăng nhập.</p>
        <hr>
        <?php
        if (isset($login_Customer)) {
            echo $login_Customer;
        }
        ?>
        <br>
        <form action="" method="POST">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Nhập Email" name="email" id="email" required>

            <label for="psw"><b>Mật khẩu</b></label>
            <input type="password" placeholder="Nhập mật khẩu" name="psw" id="psw" required>
            <hr>

            <button type="submit" name="login" class="registerbtn">Đăng nhập</button>
        </form>
    </div>

    <div class="container signin">
        <p>Chưa có tài khoản đăng nhập? <a href="register.php">Đăng ký</a>.</p>
    </div>
    <br>
    <!-- Footer -->
    <?php include 'blocks/footer.php'; ?>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!--===============================================================================================-->
    <script src="../public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/bootstrap/js/popper.js"></script>
    <script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="../public/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function () {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function () {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="../public/js/main.js"></script>

</body>

</html>
<style>
    * {
        box-sizing: border-box
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        text-align: center;
    }
</style>