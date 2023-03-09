<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/brand.php'; ?>
<?php
$brand = new brand();
if (!isset($_GET['brandid']) || $_GET['brandid'] == null) {
    echo "<script>window.location='brandList.php'</script>";
} else {
    $id = $_GET['brandid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $update_brand = $brand->update_brand($brandName, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa thương hiệu</h2>
        <?php
        if (isset($update_brand)) {
            echo $update_brand;
        }
        ?>
        <div class="block copyblock">
            <?php
            $get_brand_name = $brand->getbrandbyId($id);
            if ($get_brand_name) {
                while ($result = $get_brand_name->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['TenThuongHieu'] ?>" name="brandName" placeholder="Sửa tên thương hiệu..." required="" class="medium" />
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