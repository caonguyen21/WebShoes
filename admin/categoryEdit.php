<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/category.php'; ?>
<?php
$cat = new category();
if (!isset($_GET['catid']) || $_GET['catid'] == null) {
    echo "<script>window.location='categoryList.php'</script>";
} else {
    $id = $_GET['catid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $status = isset($_POST['status']) ? 1 : 0;
    $update_cat = $cat->update_category($catName, $status, $id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>
        <?php
        if (isset($update_cat)) {
            echo $update_cat;
        }
        ?>
        <div class="block copyblock">
            <?php
            $get_cate_name = $cat->getcatbyId($id);
            if ($get_cate_name) {
                while ($result = $get_cate_name->fetch_assoc()) {
            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input type="text" value="<?php echo $result['TenLoai'] ?>" name="catName" placeholder="Sửa tên danh mục..." required="" class="medium" />
                                    Active<input type="checkbox" name="status" <?php echo ($result['TrangThai'] == 1) ? 'checked' : ''; ?>>
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