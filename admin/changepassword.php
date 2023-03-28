<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/admin.php'; ?>
<?php
ob_start();
$class = new admin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
    $change = $class->change_password($oldpass, $newpass);
}
ob_end_flush();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <?php
        if (isset($change)) {
            echo $change;
        }
        ?>
        <div class="block">
            <form action="" method="post">

                <table class="form">
                    <tr>
                        <td>
                            <label>Old Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter Old Password..." name="oldpass" class="medium" id="oldpass" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Password</label>
                        </td>
                        <td>
                            <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" id="newpass" />
                        </td>
                        <td> <button type="button" id="show-password-btn">Show</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />

                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<script>
    const passwordInput = document.getElementById("oldpass");
    const passwordInput2 = document.getElementById("newpass");
    const showPasswordButton = document.getElementById("show-password-btn");

    function showPassword() {
        if (passwordInput.type === "password" || passwordInput2.type === "password") {
            passwordInput.type = "text";
            passwordInput2.type = "text";
            showPasswordButton.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            passwordInput2.type = "password";
            showPasswordButton.textContent = "Show";
        }
    }
    showPasswordButton.addEventListener("click", showPassword);
</script>
<?php include 'blocks/footer.php'; ?>