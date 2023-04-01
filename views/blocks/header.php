<?php
require_once '../lib/session.php';
Session::init();
?>

<?php
require_once '../lib/database.php';
require_once '../helpers/format.php';
require_once '../classes/admin/brand.php';
require_once '../classes/admin/category.php';
require_once '../classes/admin/nhacungcap.php';
require_once '../classes/admin/product.php';
require_once '../classes/cart.php';
require_once '../classes/user.php';
require_once '../classes/customer.php';

$db = new Database();
$fm = new Format();
$br = new brand();
$ct = new cart();
$us = new user();
$cat = new category();
$cs = new customer();
$product = new product();
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Tue, 03 Feb 2023 05:00:00 GMT");
header("Cache-Control: max-age=25292000");
?>

<!-- Header desktop -->
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
                    $delCart = $ct->del_all_data_cart();
                    Session::destroy();
                }
                $login_check = Session::get('customer_login');
                if ($login_check == false) {
                    echo '<a href="../views/login.php" class="flex-c-m trans-04 p-lr-25"> Tài Khoản</a>';
                } else {
                    echo '<a href="profile.php" class="flex-c-m trans-04 p-lr-25">Xin Chào' . " " . Session::get('customer_name') . ' </a>';
                    echo '<a href="?customer_id=' . Session::get('customer_id') . '" class="flex-c-m trans-04 p-lr-25">Đăng Xuất</a>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="wrap-menu-desktop">
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
                <a href="shoping-cart.php" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                    data-notify="  <?php
                    $check_cart = $ct->check_cart();
                    if ($check_cart) {
                        $qty = Session::get("qty");
                        echo $qty;
                    } else {
                        echo '0';
                    }
                    ?>">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </a>
            </div>
        </nav>
    </div>
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