<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/reviews.php'; ?>
<?php
$reviews = new reviews();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH ĐƠN HÀNG</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>EMAIL</th>
                        <th>NỘI DUNG</th>
                        <th>NGÀY GỬI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_reviews = $reviews->show_reviews();
                    if ($show_reviews) {
                        $i = 0;
                        while ($result = $show_reviews->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['Email'] ?></td>
                                <td>
                                    <?php
                                    $content = $result['NoiDung'];
                                    if (strlen($content) > 50) {
                                        echo substr($content, 0, 50) . '...';
                                        echo '<a href="reviewsDetail.php?reviewsid=' . $result['MaYKien'] . '">Xem thêm</a>';
                                    } else {
                                        echo $content;
                                    }
                                    ?>
                                </td>
                                <td><?php echo date('d/m/Y', strtotime($result['NgayGui'])); ?></td>
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