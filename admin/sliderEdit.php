<?php include '../admin/blocks/header.php'; ?>
<?php include '../admin/blocks/sidebar.php'; ?>
<?php include '../classes/admin/product.php'; ?>
<?php include '../classes/admin/slider.php'; ?>
<?php
$slider = new slider();
if (!isset($_GET['sliderid']) || $_GET['sliderid'] == null) {
    echo "<script>window.location='sliderList.php'</script>";
} else {
    $id = $_GET['sliderid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productID = $_POST['productID'];
    $status = isset($_POST['status']) ? 1 : 0;
    $update_slider = $slider->update_slider($productID, $status, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>SỬA SẢN PHẨM</h2>
        <div class="block">
            <?php
            if (isset($update_slider)) {
                echo $update_slider;
            }
            ?>
            <?php
            $get_slider_by_id = $slider->getsliderbyId($id);
            if ($get_slider_by_id) {
                while ($result_slider = $get_slider_by_id->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <label>Tên sản phẩm</label>
                                </td>
                                <td>
                                    <select id="select" name="productID" style="width: 500px;">
                                        <option>Select sản phẩm</option>
                                        <?php
                                        $product = new product();
                                        $list = $product->show_product();
                                        if ($list) {
                                            $productArray = array();
                                            while ($result = $list->fetch_assoc()) {
                                                $productArray[$result['MaGiay']] = array(
                                                    'TenGiay' => $result['TenGiay'],
                                                    'AnhBia' => $result['AnhBia']
                                                );
                                        ?>
                                                <option <?php if ($result['MaGiay'] == $result_slider['MaGiay']) {
                                                            echo 'selected';
                                                        } ?> value="<?php echo $result['MaGiay'] ?>"><?php echo $result['TenGiay'] ?></option>
                                        <?php
                                            }
                                        }
                                        $productJSON = json_encode($productArray);
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <img id="selectedImg" src="../admin/uploads/<?php echo isset($productArray[$result_slider['MaGiay']]['AnhBia']) ? $productArray[$result_slider['MaGiay']]['AnhBia'] : $result_slider['AnhBia'] ?>" width="250">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Trạng thái</label>
                                </td>
                                <td>
                                    Active<input type="checkbox" name="status" <?php echo ($result_slider['TrangThai'] == 1) ? 'checked' : ''; ?>>
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
                    <script>
                        var productJSON = JSON.parse('<?php echo $productJSON; ?>');
                        var imgTag = document.getElementById('selectedImg');
                        var selectElm = document.getElementById('select');
                        selectElm.addEventListener('change', function() {
                            var selectedValue = selectElm.value;
                            if (productJSON[selectedValue]) {
                                imgTag.src = "../admin/uploads/" + productJSON[selectedValue].AnhBia;
                            } else {
                                imgTag.src = "../admin/uploads/" + $result['AnhBia'];
                            }
                        });
                    </script>
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