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
            Đơn đặt hàng
        </h2>
    </section>
    <!-- Content page -->
    <style>
        .status-packing {
            color: orange;
        }

        .status-shipping {
            color: blue;
        }

        .status-delivered {
            color: green;
        }

        .status-invalid {
            color: red;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            font-family: Arial, sans-serif;
            margin-bottom: 30px;
            text-align: center;
            /* can giữa dữ liệu trong bảng */
        }

        table.data th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
        }

        table.data td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        table.data tr.odd td {
            background-color: #f2f2f2;
        }

        .status-packing {
            background-color: #ffcc00;
            color: #333;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .status-shipping {
            background-color: #00bfff;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .status-delivered {
            background-color: #228b22;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .status-invalid {
            background-color: #f00;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
        }
    </style>
    <div class="grid_10">
        <div class="box round first grid">
            <div class="block">
                <br>
                <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>TÊN GIÀY</th>
                            <th>Size</th>
                            <th>ẢNH BÌA</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ BÁN</th>
                            <th>NGÀY ĐẶT</th>
                            <th>TÌNH TRẠNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = Session::get('customer_id');
                        $show_bill = $cs->show_bill_oderby_user($id);
                        if ($show_bill) {
                            $i = 0;
                            while ($result = $show_bill->fetch_assoc()) {
                                ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?php echo $result['id'] ?>
                                    </td>
                                    <td>
                                        <?php echo $result['TenGiay'] ?>
                                    </td>
                                    <td>
                                        <?php echo $result['Size'] ?>
                                    </td>
                                    <td><img src="../admin/uploads/<?php echo trim($result['AnhBia']) ?>" width="80"></td>
                                    <td>
                                        <?php echo $result['SoLuong'] ?>
                                    </td>
                                    <td>
                                        <?php echo $fm->currency_format($result['GiaBan']) ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y', strtotime($result['NgayDat'])); ?>
                                    </td>
                                    <td>
                                        <?php
                                        $temp = $result['TinhTrang'];
                                        switch ($temp) {
                                            case '0':
                                                echo '<span class="status-packing">Đang đóng gói</span>';
                                                break;
                                            case '1':
                                                echo '<span class="status-shipping">Đang vận chuyển</span>';
                                                break;
                                            case '2':
                                                echo '<span class="status-delivered">Giao thành công</span>';
                                                break;
                                            default:
                                                echo '<span class="status-invalid">Không thành công</span>';
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
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