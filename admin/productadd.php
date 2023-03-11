<?php include '../admin/blocks/header.php';?>
<?php include '../admin/blocks/sidebar.php';?>
<?php include '../classes/admin/category.php';?>
<?php include '../classes/admin/brand.php';?>
<?php include '../classes/admin/product.php';?>
<?php
    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
               
        $insertProduct = $pd->insert_product($_POST,$_FILES);

    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
        <div class="block">      
            <?php 
                if(isset($delbrand)){
                    echo $delbrand;
                }
            ?>         
         <form action="productadd.php" method="post" enctype="multipart/form-data">
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
                            <option>------Select Category------</option>
                            <?php 
                            $cat = new category();
                            $catlist = $cat->show_category();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
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
                            <option>------Select Brand------</option>
                            <?php 
                            $brand = new brand();
                            $brandlist = $brand->show_brand();

                            if($brandlist){
                                while($result = $brandlist->fetch_assoc()){
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
                        <label>Giá bán</label>
                    </td>
                    <td>
                        <input type="text" name="GiaBan" placeholder="Enter Price..." class="medium" />
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
                        <input type="submit" name="submit" Value="Save" />
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
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include '../admin/blocks/footer.php';?>


