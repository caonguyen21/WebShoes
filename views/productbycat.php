<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'blocks/head.php'; ?>
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v4">
        <!-- Header desktop -->
        <?php include 'blocks/header.php'; ?>
    </header>
    
    <?php
        if (!isset($_GET['catID']) || $_GET['catID'] == null) {
            // echo "<script>window.location='product.php'</script>";
        } else {
            $id = $_GET['catID'];
        }
    ?>  
    <!-- Product -->
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">

                      <a href="product.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                        Tất cả sản phẩm
                    </a>
                    <?php
                    $getall_category = $cat->show_category();
                    if ($getall_category) {
                        while ($result_allcat = $getall_category->fetch_assoc()) {
                            ?>
                            <a href="productbycat.php?catID=<?php echo $result_allcat['MaLoai'] ?>"
                                class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"><?php echo $result_allcat['TenLoai'] ?></a>
                            <?php
                        }
                    }
                    ?>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div
                        class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Bộ lọc
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Tìm kiếm
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Lọc theo
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Mặc định
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Giá: Thấp tới Cao
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Giá: Cao tới Thấp
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Giá
                            </div>
                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Tất cả
                                    </a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        100000 VND - 1000000 VND
                                    </a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        1000000 VND - 2000000 VND
                                    </a>
                                </li>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        2000000 VND - 5000000 VND
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Thương hiệu
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <?php
                                $getall_brand = $br->show_brand();
                                if ($getall_brand) {
                                    while ($result_allbr = $getall_brand->fetch_assoc()) {
                                        ?>
                                        <a href="productbybrand.php?brID=<?php echo $result_allbr['MaThuongHieu'] ?>"
                                        class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5"><?php echo $result_allbr['TenThuongHieu'] ?></a>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <?php
                $namecat = $cat->getnamecat($id);
                if ($namecat) {
                    while ($resul_name = $namecat->fetch_assoc()) {
                        ?>
            <h4 style="font-weight: bold;">Thể loại: <?php echo $resul_name['TenLoai'] ?></h4>
            <?php
                    }
                }
                ?>
            <div class="row isotope-grid">
                <?php
                $productbycat = $cat->getproductbyCat($id);
                if ($productbycat) {
                    while ($resul = $productbycat->fetch_assoc()) {
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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

           <!-- Xem Thêm -->
           <div class="flex-c-m flex-w w-full p-t-45">
                <?php
                    $product_all = $cat->get_all_productbycat($id);
                    $product_count = mysqli_num_rows($product_all);
                    $product_buttom = ceil($product_count/4);
                    $i =1;
                    echo '<p class="flex-c-m stext-101 cl5">Trang: </p>';
                    for($i= 1; $i<=$product_buttom;$i++){
                    echo'<a href="productbycat.php?catID='.$id.'?trang='.$i.'" class="flex-c-m stext-101 cl5" style="margin: 0 5px; color: black; ">'.$i.'</a>';
                    } 
               ?>
            </div>
        </div>
    </div>
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