<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/brand.php'; ?>
<?php
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    $insert_brand = $brand->insert_brand($brandName);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm thương hiệu</h2>
        <?php
        if (isset($insert_brand)) {
            echo $insert_brand;
        }
        ?>
        <div class="block copyblock">
            <form action="brandAdd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input type="text" name="brandName" placeholder="Nhập tên thương hiệu..." required="" class="medium" />
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