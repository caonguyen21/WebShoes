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
    <?php
    $login_check = Session::get('customer_login');
    if ($login_check == false) {
        header('Location:login.php');
    }
    ?>
    <?php
    $id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $UpdateCustomers = $cs->update_customers($_POST, $id);
    }
    ?>
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Tài khoản
        </h2>
    </section>
    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <?php
                    $id = Session::get('customer_id');
                    $get_customers = $cs->show_customers($id);
                    if ($get_customers) {
                        while ($result = $get_customers->fetch_assoc()) {
                            ?>
                            <form action="" method="post">
                                <h4 class="mtext-105 cl2 txt-center p-b-30">
                                    Thông tin tài khoản
                                </h4>
                                <span class="mtext-110 cl2">
                                    Tên tài khoản
                                </span>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="taikhoan"
                                        placeholder="<?php echo $result['TaiKhoanKH'] ?>" disabled>
                                </div>
                                <span class="mtext-110 cl2">
                                    Họ tên
                                </span>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="hoten"
                                        placeholder="Nhập họ tên" value="<?php echo $result['HoTen'] ?>">
                                </div>
                                <span class="mtext-110 cl2">
                                    Email
                                </span>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="email" name="email"
                                        placeholder="<?php echo $result['EmailKH'] ?>" value="<?php echo $result['EmailKH'] ?>"
                                        disabled>
                                </div>
                                <span class="mtext-110 cl2">
                                    Địa chỉ
                                </span>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="diachi"
                                        placeholder="Nhập địa chỉ" value="<?php echo $result['DiaChiKH'] ?>">
                                </div>
                                <span class="mtext-110 cl2">
                                    Số điện thoại
                                </span>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="text" name="sdt"
                                        placeholder="Nhập số điện thoại" value="<?php echo $result['DienThoaiKH'] ?>">
                                </div>
                                <span class="mtext-110 cl2">
                                    Ngày sinh
                                </span>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-28 p-r-30" type="date" name="ngaysinh"
                                        placeholder="Nhập ngày sinh" value="<?php echo $result['NgaySinh'] ?>">
                                </div>
                                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer"
                                    name="submit">
                                    Cập nhật
                                </button>
                                <br>
                                <?php
                                if (isset($UpdateCustomers)) {
                                    echo $UpdateCustomers;
                                }
                                ?>
                            </form>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <h4 class="mtext-105 cl2 txt-center p-b-30" style="margin: auto;">
                            Đơn hàng của bạn
                        </h4>
                        <a href="productCart.php"
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer"
                            name="submit">
                            Đi tới đơn hàng của bạn
                        </a>
                    </div>
                    <div class="flex-w w-full">
                        <h4 class="mtext-105 cl2 txt-center p-b-30" style="margin: auto;">
                            Thay đổi mật khẩu
                        </h4>
                        <a href="productCart.php"
                            class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer"
                            name="submit">
                            Thay đổi mật khẩu mới
                        </a>
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