<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'blocks/head.php'; ?>
</head>

<body class="animsition">
  <!-- Header -->
  <header class="header-v4">
    <?php include 'blocks/header.php'; ?>
  </header>

  <!-- Title page -->
  <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
      Liên Hệ
    </h2>
  </section>
  <!-- Content page -->
  <section class="bg0 p-t-104 p-b-116">
    <div class="container">
      <div class="flex-w flex-tr">
        <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
          <form>
            <h4 class="mtext-105 cl2 txt-center p-b-30">
              Đóng góp ý kiến
            </h4>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                placeholder="Địa chỉ email của bạn">
              <img class="how-pos4 pointer-none" src="../public/images/icons/icon-email.png" alt="ICON">
            </div>

            <div class="bor8 m-b-30">
              <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                placeholder="Chúng tôi có thể giúp gì được cho bạn?"></textarea>
            </div>

            <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
              Gửi
            </button>
          </form>
        </div>

        <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
          <div class="flex-w w-full p-b-42">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-map-marker"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Địa chỉ
              </span>

              <p class="stext-115 cl6 size-213 p-t-18">
                23K/7-KDC434-Bình Hòa-Thuận An-Bình Dương
              </p>
            </div>
          </div>

          <div class="flex-w w-full p-b-42">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-phone-handset"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Số điện thoại
              </span>

              <p class="stext-115 cl1 size-213 p-t-18">
                (+84)0972517895
              </p>
            </div>
          </div>

          <div class="flex-w w-full">
            <span class="fs-18 cl5 txt-center size-211">
              <span class="lnr lnr-envelope"></span>
            </span>

            <div class="size-212 p-t-2">
              <span class="mtext-110 cl2">
                Email
              </span>

              <p class="stext-115 cl1 size-213 p-t-18">
                shopthaonguyen@gmail.com
              </p>
            </div>
          </div>
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