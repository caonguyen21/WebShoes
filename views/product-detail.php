<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'blocks/head.php';
    require_once '../helpers/format.php';
    require_once '../lib/session.php';
    Session::init();
    require_once '../classes/admin/brand.php';
    require_once '../classes/admin/category.php';
    require_once '../classes/cart.php';
    require_once '../classes/admin/product.php';
    $ct = new cart();
    $br = new brand();
    $cat = new category();
    $product = new product();
    $fm = new Format();
    ?>
</head>

<body class="animsition">
    <!-- Header -->
    <!-- Tìm id sản phẩm -->
    <?php
    if (!isset($_GET['proID']) || $_GET['proID'] == null) {
        echo "<script>window.location='index.php'</script>";
    } else {
        $id = $_GET['proID'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['SoLuong'];
        $AddtoCart = $ct->add_to_cart($quantity, $id);
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
                    <a href="shoping-cart.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"
                        data-notify="">
                        <i class="zmdi zmdi-shopping-cart"></i>
                        <?php
                        $check_cart = $ct->check_cart();
                        if ($check_cart) {
                            $qty = Session::get("qty");
                            echo $qty;
                        } else {
                            echo '0';
                        }
                        ?>
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
        <?php
        $getproduct_details = $product->get_details($id);
        if ($getproduct_details) {
            while ($resul = $getproduct_details->fetch_assoc()) {
                ?>
                <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                    <a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
                        Trang chủ
                        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                    </a>

                    <a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
                        <?php echo $resul['TenThuongHieu'] ?>
                        <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                    </a>

                    <span class="stext-109 cl4">
                        <?php echo $resul['TenGiay'] ?>
                    </span>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <?php
        $getproduct_details = $product->get_details($id);
        if ($getproduct_details) {
            while ($resul = $getproduct_details->fetch_assoc()) {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 p-b-30">
                            <div class="p-l-25 p-r-30 p-lr-0-lg">
                                <div class="wrap-slick3 flex-sb flex-w">
                                    <div class="wrap-slick3-dots"></div>
                                    <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                    <div class="slick3 gallery-lb">

                                        <div class="item-slick3" data-thumb="../admin/uploads/<?php echo $resul['AnhBia'] ?>">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="../admin/uploads/<?php echo $resul['AnhBia'] ?>" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="../admin/uploads/<?php echo $resul['AnhBia'] ?>">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-5 p-b-30">
                            <div class="p-r-50 p-t-5 p-lr-0-lg">
                                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                    <?php echo $resul['TenGiay'] ?>
                                </h4>

                                <span class="mtext-106 cl2">
                                    <?php echo $fm->currency_format($resul['GiaBan']) ?>
                                </span>
                                <!--  -->
                                <div class="p-t-33">
                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Size
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <?php echo $resul['Size'] ?>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Thể loại
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <?php echo $resul['TenLoai'] ?>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next">
                                            <form action="" method="post">
                                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                        name="SoLuong" value="1" min="1">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                                <!-- Thêm vào giỏ hàng -->
                                                <button
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04"
                                                    name="submit">
                                                    Thêm vào giỏ hàng
                                                </button>
                                                <?php
                                                if (isset($AddtoCart)) {
                                                    echo '<span style="color:red">Sản phẩm này đã có trong giỏ hàng</span>';
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
                    <span class="stext-107 cl6 p-lr-25">
                        Size:
                        <?php echo $resul['Size'] ?>
                    </span>

                    <span class="stext-107 cl6 p-lr-25">
                        Thể loại:
                        <?php echo $resul['TenLoai'] ?>
                    </span>
                </div>
                <?php
            }
        }
        ?>
    </section>


    <!-- Related Products -->
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Sản Phẩm Tương Tự
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    <?php
                    $getproduct_trangthai = $product->getproduct_trangthai();
                    if ($getproduct_trangthai) {
                        while ($resul = $getproduct_trangthai->fetch_assoc()) {
                            ?>
                            <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="../admin/uploads/<?php echo $resul['AnhBia'] ?>" alt="IMG-PRODUCT">
                                        <a href="product-detail.php?proID=<?php echo $resul['MaGiay'] ?>"
                                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                            Xem Thêm
                                        </a>
                                    </div>

                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="product-detail.php?proID=<?php echo $resul['MaGiay'] ?>"
                                                class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                <?php echo $resul['TenGiay'] ?>
                                            </a>
                                            <span class="stext-105 cl3">
                                                <?php echo $fm->currency_format($resul['GiaBan']) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>


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
    <script src="../public/vendor/daterangepicker/moment.min.js"></script>
    <script src="../public/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/slick/slick.min.js"></script>
    <script src="../public/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="../public/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function () { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="../public/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="../public/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2, .js-addwish-detail').on('click', function (e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function () {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
            $(this).on('click', function () {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
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