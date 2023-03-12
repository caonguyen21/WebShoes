<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/nhacungcap.php'; ?>
<?php
$nhacungcap = new nhacungcap();
if (!isset($_GET['Nccid']) || $_GET['Nccid'] == null) {
    echo "<script>window.location='nccList.php'</script>";
} else {
    $id = $_GET['Nccid'];
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $nhacungcap = $_POST['TenNCC'];
//     $update_nhacungcap = $nhacungcap->update_nhacungcap($nhacungcap,$diachi,$dienthoai,$id);
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ncc = new nhacungcap();
    $nccName= $_POST['TenNCC'];
    $diachi = $_POST['DiaChi'];
    $dienthoai = $_POST['DienThoai'];
    $update_nhacungcap = $ncc->update_nhacungcap($nccName,$diachi,$dienthoai,$id);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Nhà cung cấp</h2>
        <?php
        if (isset($update_nhacungcap)) {
            echo $update_nhacungcap;
        }
        ?>
        <div class="block copyblock">
            <?php
            $get_Ncc_name = $nhacungcap->getNccbyId($id);
            if ($get_Ncc_name) {
                while ($result = $get_Ncc_name->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['TenNCC'] ?>" name="TenNCC" placeholder="Sửa tên nhà cung cấp..." required="" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['DiaChi'] ?>" name="DiaChi" placeholder="Sửa địa chỉ nhà cung cấp..." required="" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['DienThoai'] ?>" name="DienThoai" placeholder="Sửa số điện thoại nhà cung cấp..." required="" class="medium" />
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