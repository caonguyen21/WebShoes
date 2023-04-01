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
            Tài khoản
        </h2>
    </section>
    <!-- Content page -->
    <!-- Login -->
    <div class="container">
        <br>
        <h1>Đổi mật khẩu</h1>
        <p>Nhập mật khẩu cũ và mật khẩu mới để đổi mật khẩu</p>
        <hr>
        <?php
        // Check if the customer is logged in
        if (!isset($_SESSION['customer_id'])) {
            // Redirect to the login page if not logged in
            header('Location: login.php');
            exit;
        }

        // Get the customer ID from the session
        $customer_id = $_SESSION['customer_id'];

        // Check if the form was submitted
        if (isset($_POST['change-password'])) {
            // Get the submitted passwords
            $old_password = md5($_POST['old-password']);
            $new_password = md5($_POST['new-password']);
            $confirm_password = md5($_POST['confirm-password']);

            // Validate the passwords
            $errors = array();
            if (empty($old_password)) {
                $errors[] = 'Mật khẩu hiện tại không được để trống';
            }
            if (empty($new_password)) {
                $errors[] = 'Mật khẩu mới không được để trống';
            }
            if (empty($confirm_password)) {
                $errors[] = 'Vui lòng nhập lại mật khẩu mới';
            }
            if ($new_password !== $confirm_password) {
                $errors[] = 'Mật khẩu mới và xác nhận mật khẩu mới không khớp';
            }

            // If there are no errors, update the password in the database
            if (empty($errors)) {
                // Connect to the database
                $db = new mysqli('localhost', 'root', '123456', 'webshoe-mysqli');
                if ($db->connect_error) {
                    die('Kết nối tới cơ sở dữ liệu thất bại: ' . $db->connect_error);
                }

                // Check if the old password is correct
                $query = "SELECT * FROM khachhang WHERE MaKH = '$customer_id' AND MatKhau = '$old_password'";
                $result = $db->query($query);
                if ($result->num_rows === 1) {
                    // Update the password in the database
                    $query = "UPDATE khachhang SET MatKhau = '$new_password' WHERE MaKH = '$customer_id'";
                    $result = $db->query($query);
                    if ($result) {
                        // Password updated successfully
                        echo 'Mật khẩu đã được thay đổi thành công';
                    } else {
                        // Failed to update the password
                        echo 'Đã có lỗi xảy ra khi thay đổi mật khẩu';
                    }
                } else {
                    // Old password is incorrect
                    $errors[] = 'Mật khẩu hiện tại không đúng';
                }

                // Close the database connection
                $db->close();
            }

            // If there are errors, display them to the user
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
            }
        }
        ?>
        <?php
        if (isset($login_Customer)) {
            echo $login_Customer;
        }
        ?>
        <br>
        <form action="" method="POST">
            <label for="old-password"><b>Mật khẩu hiện tại</b></label>
            <input type="password" placeholder="Nhập mật khẩu hiện tại" name="old-password" id="old-password" required>
            <br>
            <label for="new-password"><b>Mật khẩu mới</b></label>
            <input type="password" placeholder="Nhập mật khẩu mới" name="new-password" id="new-password" required>
            <label for="confirm-password"><b>Xác nhận mật khẩu mới</b></label>
            <input type="password" placeholder="Nhập lại mật khẩu mới" name="confirm-password" id="confirm-password"
                required>
            <hr>
            <button type="submit" name="change-password" class="registerbtn">Thay đổi mật khẩu</button>
        </form>
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
<style>
    * {
        box-sizing: border-box
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        text-align: center;
    }
</style>