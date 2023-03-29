<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/user.php'; ?>
<?php
$user = new user();
if (!isset($_GET['userid']) || $_GET['userid'] == null) {
    echo "<script>window.location='userList.php'</script>";
} else {
    $id = $_GET['userid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $update_user = $user->update_user($status, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Chỉnh sửa đơn hàng</h2>
        <?php
        if (isset($update_user)) {
            echo $update_user;
        }
        ?>
        <div class="block copyblock">
            <?php
            $get_user = $user->getuserbyId($id);
            if ($get_user) {
                while ($result = $get_user->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td style="display:flex; justify-content: space-between;">
                                    <label>
                                        <input type="radio" name="status" value="0" <?php if ($result['TrangThai'] == 0) echo "checked" ?>>
                                        Vô hiệu hóa
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="1" <?php if ($result['TrangThai'] == 1) echo "checked" ?>>
                                        Hoạt động
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include 'blocks/footer.php'; ?>