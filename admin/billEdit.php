<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/bill.php'; ?>
<?php
$bill = new bill();
if (!isset($_GET['billid']) || $_GET['billid'] == null) {
    echo "<script>window.location='billList.php'</script>";
} else {
    $id = $_GET['billid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $update_bill = $bill->update_bill($status, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Chỉnh sửa đơn hàng</h2>
        <?php
        if (isset($update_bill)) {
            echo $update_bill;
        }
        ?>
        <div class="block copyblock">
            <?php
            $get_bill = $bill->getbillbyId($id);
            if ($get_bill) {
                while ($result = $get_bill->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td style="display:flex; justify-content: space-between;">
                                    <label>
                                        <input type="radio" name="status" value="0" <?php if ($result['TinhTrang'] == 0) echo "checked" ?>>
                                        Đang đóng gói
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="1" <?php if ($result['TinhTrang'] == 1) echo "checked" ?>>
                                        Đang vận chuyển
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="2" <?php if ($result['TinhTrang'] == 2) echo "checked" ?>>
                                        Thành công
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="3" <?php if ($result['TinhTrang'] == 3) echo "checked" ?>>
                                        Không thành công
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