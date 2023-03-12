<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/nhacungcap.php'; ?>
<?php
$nhacungcap = new nhacungcap();
$insert_nhacungcap = "";
$diachi = "";
$dienthoai = "";
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $nccName = $_POST['TenNCC'];
//     $insert_nhacungcap = $nhacungcap->insert_nhacungcap($nccName);
// }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nccName = $_POST['TenNCC'];
    $diachi = $_POST['DiaChi'];
    $dienthoai = $_POST['DienThoai'];
    $insert_nhacungcap = $nhacungcap->insert_nhacungcap($nccName, $diachi, $dienthoai);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm nhà cung cấp</h2>
        <?php
        if (isset($insert_nhacungcap)) {
            echo $insert_nhacungcap;
        }
        ?>
        <div class="block copyblock">
            <form action="NccAdd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="TenNCC" placeholder="Nhập tên nhà cung cấp..." required="" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="DiaChi" value="<?php echo $diachi;?>" placeholder="Nhập địa chỉ.." required="" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="DienThoai" value="<?php echo $dienthoai;?>" placeholder="Nhập số điện thoại..." required="" class="medium" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Submit" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'blocks/footer.php'; ?>