<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Thể loại
                </h4>
                <?php
                $getall_category = $cat->show_category();
                if ($getall_category) {
                    while ($result_allcat = $getall_category->fetch_assoc()) {
                        ?>
                        <ul>
                            <li class="p-b-10">
                                <a href="productbycat.php?catID=<?php echo $result_allcat['MaLoai'] ?>"
                                    class="stext-107 cl7 hov-cl1 trans-04"><?php echo $result_allcat['TenLoai'] ?></a>
                            </li>
                        </ul>
                        <?php
                    }
                }
                ?>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50" style="margin-left: auto;">
                <h4 class="stext-301 cl0 p-b-30">
                    Thông Tin
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="../views/about.php" class="stext-107 cl7 hov-cl1 trans-04">
                            Giới thiệu
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="../views/contact.php" class="stext-107 cl7 hov-cl1 trans-04">
                            Liên hệ
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Hỗ trợ ngay
                </h4>

                <p class="stext-107 cl7 size-201">
                    Địa chỉ: 23k/7, Bình Đáng, Bình Hòa, Thuận An, Bình Dương
                    </br>
                    Số Điện thoại: (+84)0985797250
                </p>

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-t-40">
        <div class="flex-c-m flex-w p-b-18">
            <a href="#" class="m-all-1">
                <img src="../public/images/icons/icon-pay-01.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="../public/images/icons/icon-pay-02.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="../public/images/icons/icon-pay-03.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="../public/images/icons/icon-pay-04.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="../public/images/icons/icon-pay-05.png" alt="ICON-PAY">
            </a>
        </div>
    </div>

    <!-- Copyright -->
    <!-- <p class="stext-107 cl6 txt-center">
      
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a
                href="https://themewagon.com" target="_blank">ThemeWagon</a>
        </p> -->

    </div>
</footer>