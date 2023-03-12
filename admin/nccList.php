<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/nhacungcap.php'; ?>
<?php
$nhacungcap = new nhacungcap();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH NHÀ CUNG CẤP</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÊN NHÀ CUNG CẤP</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_nhacungcap = $nhacungcap->show_nhacungcap();
                    if ($show_nhacungcap) {
                        $i = 0;
                        while ($result = $show_nhacungcap->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['TenNCC'] ?></td>
                                <td><a href="nccEdit.php?Nccid=<?php echo $result['MaNCC'] ?>">Edit</a></td>
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