<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'blocks/head.php'; ?>
</head>

<body class="animsition">
  <!-- Header -->
  <header>
    <?php include 'blocks/header.php'; ?>
  </header>
  <!-- Slider -->
  <?php include 'blocks/slider.php'; ?>
  <!-- Banner -->
  <?php include 'blocks/banner.php'; ?>
  <!-- Product -->
  <section class="bg0 p-t-23 p-b-140">
    <div class="container">
      <div class="p-b-10">
        <h3 class="ltext-103 cl5">
          Sản Phẩm Nổi Bật
        </h3>
      </div>

      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <a href="product.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
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
      </div>
      <div class="row isotope-grid">
        <?php
        $getproduct_new = $product->getproduct_new();
        if ($getproduct_new) {
          while ($resul = $getproduct_new->fetch_assoc()) {
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
        <a href="product.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
          Xem Thêm
        </a>

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
    $('.js-addwish-b2').on('click', function (e) {
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