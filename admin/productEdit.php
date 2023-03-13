<?php include '../admin/blocks/header.php'; ?>
<?php include '../admin/blocks/sidebar.php'; ?>
<?php include '../classes/admin/category.php'; ?>
<?php include '../classes/admin/brand.php'; ?>
<?php include '../classes/admin/product.php'; ?>
<?php include '../classes/admin/nhacungcap.php'; ?>
<?php
$pd = new product();
if (!isset($_GET['productid']) || $_GET['productid'] == null) {
    echo "<script>window.location='productList.php'</script>";
} else {
    $id = $_GET['productid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $status = isset($_POST['status']) ? 1 : 0;
    $updateProduct = $pd->update_product($_POST, $status, $_FILES, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
        <div class="block">
            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
            ?>
            <?php
            $get_product_by_id = $pd->getproductbyId($id);
            if ($get_product_by_id) {
                while ($result_product = $get_product_by_id->fetch_assoc()) {
            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Tên sản phẩm</label>
                                </td>
                                <td>
                                    <input type="text" name="TenGiay" placeholder="Enter Product Name..." value="<?php echo $result_product['TenGiay'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Loại Giày</label>
                                </td>
                                <td>
                                    <select id="select" name="loaigiay">
                                        <option>Select Category</option>
                                        <?php
                                        $cat = new category();
                                        $catlist = $cat->show_category();
                                        if ($catlist) {
                                            while ($result = $catlist->fetch_assoc()) {
                                        ?>
                                                <option <?php if ($result['MaLoai'] == $result_product['MaLoai']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $result['MaLoai'] ?>"><?php echo $result['TenLoai'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Thương hiệu</label>
                                </td>
                                <td>
                                    <select id="select" name="thuonghieu">
                                        <option>Select Brand</option>
                                        <?php
                                        $brand = new brand();
                                        $brandlist = $brand->show_brand();
                                        if ($brandlist) {
                                            while ($result = $brandlist->fetch_assoc()) {
                                        ?>
                                                <option <?php if ($result['MaThuongHieu'] == $result_product['MaThuongHieu']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $result['MaThuongHieu'] ?>"><?php echo $result['TenThuongHieu'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Nhà cung cấp</label>
                                </td>
                                <td>
                                    <select id="select" name="nhacungcap">
                                        <option>Select NhaCungCap</option>
                                        <?php
                                        $Ncc = new nhacungcap();
                                        $Ncclist = $Ncc->show_nhacungcap();
                                        if ($Ncclist) {
                                            while ($result = $Ncclist->fetch_assoc()) {
                                        ?>
                                                <option <?php if ($result['MaNCC'] == $result_product['MaNCC']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $result['MaNCC'] ?>"><?php echo $result['TenNCC'] ?></option>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Thời gian bảo hành</label>
                                </td>
                                <td>
                                    <input type="text" name="BaoHanh" placeholder="Nhập thời gian bảo hành" value="<?php echo $result_product['ThoiGianBaoHanh'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Size giày</label>
                                </td>
                                <td>
                                    <input type="text" name="Size" placeholder="Nhập size giày" value="<?php echo $result_product['Size'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Giá bán</label>
                                </td>
                                <td>
                                    <input type="text" name="GiaBan" placeholder="Nhập giá tiền" value="<?php echo $result_product['GiaBan'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Số lượng tồn</label>
                                </td>
                                <td>
                                    <input type="text" name="SL" placeholder="Nhập số lượng tồn" value="<?php echo $result_product['SoLuongTon'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Ảnh</label>
                                </td>
                                <td>
                                    <img src="../admin/uploads/<?php echo $result_product['AnhBia'] ?>" width="250">
                                    <br>
                                    <input type="file" name="AnhBia" />
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <td>
                                    <label>Trạng thái</label>
                                </td>
                                <td>
                                    Active<input type="checkbox" name="status" <?php echo ($result_product['TrangThai'] == 1) ? 'checked' : ''; ?>>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include '../admin/blocks/footer.php'; ?>