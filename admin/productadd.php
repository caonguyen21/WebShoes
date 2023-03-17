<?php include '../admin/blocks/header.php'; ?>
<?php include '../admin/blocks/sidebar.php'; ?>
<?php include '../classes/admin/category.php'; ?>
<?php include '../classes/admin/brand.php'; ?>
<?php include '../classes/admin/product.php'; ?>
<?php include '../classes/admin/nhacungcap.php'; ?>
<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insertProduct = $pd->insert_product($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>THÊM SẢN PHẨM VÀO SLIDER</h2>
        <div class="block">
            <?php
            if (isset($insertProduct)) {
                echo $insertProduct;
            }
            ?>
            <form action="productAdd.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Tên sản phẩm</label>
                        </td>
                        <td>
                            <input type="text" name="TenGiay" placeholder="Enter Product Name..." class="medium" />
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
                                        <option value="<?php echo $result['MaLoai'] ?>"><?php echo $result['TenLoai'] ?></option>

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
                                        <option value="<?php echo $result['MaThuongHieu'] ?>"><?php echo $result['TenThuongHieu'] ?></option>
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
                                        <option value="<?php echo $result['MaNCC'] ?>"><?php echo $result['TenNCC'] ?></option>

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
                            <input type="text" name="BaoHanh" placeholder="Nhập thời gian bảo hành" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Size giày</label>
                        </td>
                        <td>
                            <input type="text" name="Size" placeholder="Nhập size giày" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Giá bán</label>
                        </td>
                        <td>
                            <input type="text" name="GiaBan" placeholder="Nhập giá tiền" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Số lượng tồn</label>
                        </td>
                        <td>
                            <input type="text" name="SL" placeholder="Nhập số lượng tồn" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Ảnh</label>
                        </td>
                        <td>
                            <input type="file" name="AnhBia" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>
                </table>
            </form>
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