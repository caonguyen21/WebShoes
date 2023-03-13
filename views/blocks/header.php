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
                Shop giày độc lạ Bình Dương
            </div>

            <div class="right-top-bar flex-w h-full">
                <a href="contact.php" class="flex-c-m trans-04 p-lr-25">
                    Help & FAQs
                </a>

                <a href="#" class="flex-c-m trans-04 p-lr-25">
                    My Account
                </a>
            </div>
        </div>
    </div>

    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <style>
                .logo-container ul {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                    display: inline-block;
                }

                .logo-container ul li {
                    width: 182px;
                    height: 41px;
                    align-items: center;
                    justify-content: center;
                }

                .logo-container ul li a {
                    text-decoration: none !important;
                    display: inline-block;
                }

                .logo-holder {
                    text-align: center;
                }

                /* Logo-1 */
                .logo-1 h3 {
                    color: black;
                    font-family: 'Oswald', sans-serif;
                    font-weight: 700;
                    font-size: 24px;
                    line-height: 1.3;
                }

                .logo-1 p {
                    font-size: 9px;
                    letter-spacing: 8px;
                    text-transform: uppercase;
                    padding-left: 10px;
                    color: #34495e;
                    font-weight: 600;
                }
            </style>
            <div class="logo">
                <div class="logo-container">
                    <ul>
                        <li>
                            <div class="logo-holder logo-1">
                                <a href="">
                                    <h3 style=" margin: 0px; padding: 0px;">Thảo Nguyên</h3>
                                    <p style=" margin: 0px; padding: 0px;">Shop Giày</p>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="product.php">Shop</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
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