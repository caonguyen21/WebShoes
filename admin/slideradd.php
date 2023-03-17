<?php include '../admin/blocks/header.php'; ?>
<?php include '../admin/blocks/sidebar.php'; ?>
<?php include '../classes/admin/product.php'; ?>
<?php include '../classes/admin/slider.php'; ?>
<?php
$slider = new slider();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $productID = $_POST['productID'];
    $insert = $slider->insert($productID);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>THÊM SẢN PHẨM</h2>
        <div class="block">
            <?php
            if (isset($insert)) {
                echo $insert;
            }
            ?>
            <form action="sliderAdd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <label>Sản phẩm</label>
                        </td>
                        <td>
                            <select id="select" name="productID" style="width: 500px;">
                                <option>Select sản phẩm</option>
                                <?php
                                $prodcut = new product();
                                $list = $prodcut->show_product();
                                if ($list) {
                                    $productArray = array();
                                    while ($result = $list->fetch_assoc()) {
                                        $productArray[$result['MaGiay']] = array(
                                            'TenGiay' => $result['TenGiay'],
                                            'AnhBia' => $result['AnhBia']
                                        );
                                ?>
                                        <option value="<?php echo $result['MaGiay'] ?>"><?php echo $result['TenGiay'] ?></option>
                                <?php
                                    } // end while
                                } // end if
                                $productJSON = json_encode($productArray);
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- <label>Ảnh</label> -->
                        </td>
                        <td>
                            <img id="selectedImg" src="" width="250">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
                        </td>
                    </tr>
                </table>
            </form>

            <script>
                var productJSON = JSON.parse('<?php echo $productJSON; ?>');
                var imgTag = document.getElementById('selectedImg');
                var selectElm = document.getElementById('select');
                selectElm.addEventListener('change', function() {
                    var selectedValue = selectElm.value;
                    if (productJSON[selectedValue]) {
                        imgTag.src = "../admin/uploads/" + productJSON[selectedValue].AnhBia;
                    } else {
                        imgTag.src = "";
                    }
                });
            </script>

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