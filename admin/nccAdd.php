<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/nhacungcap.php'; ?>
<?php
$nhacungcap = new nhacungcap();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $TenNCC = $_POST['TenNCC'];
    $DiaChi = $_POST['DiaChi'];
    $DienThoai = $_POST['DienThoai'];
    $insert_nhacungcap = $nhacungcap->insert_nhacungcap($TenNCC, $DiaChi, $DienThoai);
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
                            <input type="text" name="DiaChi" placeholder="Nhập địa chỉ.." required="" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="DienThoai" placeholder="Nhập số điện thoại..." required="" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'blocks/footer.php'; ?>