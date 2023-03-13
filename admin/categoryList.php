<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/category.php'; ?>
<?php
$cat = new category();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH DANH MỤC</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÊN DANH MỤC</th>
                        <th>TRẠNG THÁI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_category = $cat->show_category();
                    if ($show_category) {
                        $i = 0;
                        while ($result = $show_category->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['TenLoai'] ?></td>
                                <td>
                                    <?php
                                    if ($result['TrangThai'] == 1) {
                                        echo "<span style='color:green'>Active</span>";
                                    } else {
                                        echo "<span style='color:red'>Inactive</span>";
                                    }
                                    ?>
                                </td>
                                <td><a href="categoryEdit.php?catid=<?php echo $result['MaLoai'] ?>">Edit</a></td>
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