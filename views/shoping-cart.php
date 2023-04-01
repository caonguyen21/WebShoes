<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'blocks/head.php';
    require_once '../helpers/format.php';
    require_once '../lib/session.php';
    Session::init();
    Session::checkSessionUser();
    require_once '../classes/admin/brand.php';
    require_once '../classes/admin/category.php';
    require_once '../classes/cart.php';
    require_once '../classes/admin/product.php';
    require_once '../classes/customer.php';
    $ct = new cart();
    $br = new brand();
    $cs = new customer();
    $cat = new category();
    $product = new product();
    $fm = new Format();
    ?>
</head>

<body class="animsition">
    <?php
    $login_check = Session::get('customer_login');
    if ($login_check == false) {
        header('Location:login.php');
    }
    ?>

    <?php
    if (isset($_GET['cartid'])) {
        $cartid = $_GET['cartid'];
        $delcart = $ct->del_product_cart($cartid);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['SoLuong'];
        $UpdateCart = $ct->UpdateCart($quantity, $cartId);
    }
    ?>
    <?php
    if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
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
                        class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="  <?php
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
    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Giỏ hàng
            </span>
        </div>
    </div>
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Sản phẩm</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Giá</th>
                                    <th class="column-3">Số lượng</th>
                                    <th class="column-4">Thành tiền</th>
                                </tr>
                                <?php
                                $getproduct_cart = $ct->get_product_cart();
                                if ($getproduct_cart) {
                                    $subtotal = 0;
                                    $qty = 0;
                                    while ($resul = $getproduct_cart->fetch_assoc()) {
                                        ?>
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <a href="?cartid=<?php echo $resul['cartId'] ?>">
                                                    <div class="how-itemcart1">
                                                        <img src="../admin/uploads/<?php echo $resul['AnhBia'] ?>" alt="IMG">
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="column-2">
                                                <?php echo $resul['TenGiay'] ?>
                                            </td>
                                            <td class="column-2">
                                                <?php echo $fm->currency_format($resul['GiaBan']) ?>
                                            </td>
                                            <td class="column-3">
                                                <form action="" method="post">
                                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>
                                                        <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                            name="SoLuong" value="<?php echo $resul['SoLuong'] ?>">
                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                    <input class="mtext-104 cl3 txt-center num-product" type="hidden"
                                                        name="cartId" value="<?php echo $resul['cartId'] ?>">
                                                    <button class="wrap-num-product stext-101 hov-btn3 p-lr-15 trans-04"
                                                        name="submit">
                                                        Cập nhật
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="column-4">
                                                <?php
                                                $total = $resul['GiaBan'] * $resul['SoLuong'];
                                                echo $fm->currency_format($total);
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $subtotal += $total;
                                        $qty = $qty + $resul['SoLuong'];
                                    }
                                }
                                ?>

                            </table>

                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm" style="margin-left:auto;">
                            <?php
                            if (isset($UpdateCart)) {
                                echo $UpdateCart;
                            }
                            ?>
                            <?php
                            if (isset($delcart)) {
                                echo $delcart;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Tổng giỏ hàng
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tổng Tiền
                                </span>
                            </div>
                            <?php
                            $check_cart = $ct->check_cart();
                            if ($check_cart) {
                                ?>
                                <div class="size-209">
                                    <span class="mtext-110 cl2">
                                        <?php
                                        echo $fm->currency_format($subtotal);
                                        Session::set('qty', $qty);
                                        ?>
                                    </span>
                                </div>
                                <?php
                            } else {
                                echo '';
                            }
                            ?>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Địa chỉ:
                                </span>
                            </div>
                            <?php
                            $id = Session::get('customer_id');
                            $get_customers = $cs->show_customers($id);
                            if ($get_customers) {
                                while ($resul = $get_customers->fetch_assoc()) {
                                    ?>
                                    <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                        <p class="stext-111 cl6 p-t-2">
                                            <?php
                                            echo $resul['DiaChiKH'];
                                            ?>
                                            <a href="profile.php">Chỉnh sửa</a>
                                        </p>

                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Tổng tiền:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <?php
                                $check_cart = $ct->check_cart();
                                if ($check_cart) {
                                    ?>
                                    <span class="mtext-110 cl2">
                                        <?php
                                        echo $fm->currency_format($subtotal);
                                        ?>
                                    </span>
                                    <?php
                                } else {
                                    echo '';
                                }
                                ?>
                            </div>
                        </div>


                        <a href="?orderid=order"
                            class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Đặt hàng
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </form>




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