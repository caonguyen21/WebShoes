<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/brand.php'; ?>
<?php
$brand = new brand();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH THƯƠNG HIỆU</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÊN THƯƠNG HIỆU</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_brand = $brand->show_brand();
                    if ($show_brand) {
                        $i = 0;
                        while ($result = $show_brand->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['TenThuongHieu'] ?></td>
                                <td><a href="brandEdit.php?brandid=<?php echo $result['MaThuongHieu'] ?>">Edit</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'blocks/footer.php'; ?>