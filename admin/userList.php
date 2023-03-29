<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/user.php'; ?>
<?php
$user = new user();
?>
<style>
    .status-1 {
        color: green;
    }

    .status-0 {
        color: red;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH THƯƠNG HIỆU</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>TÀI KHOẢN</th>
                        <th>HỌ TÊN</th>
                        <th>EMAIL</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SĐT</th>
                        <th>NGÀY SINH</th>
                        <th>TRẠNG THÁI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_user = $user->show_user();
                    if ($show_user) {
                        $i = 0;
                        while ($result = $show_user->fetch_assoc()) {
                            $i++;
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['TaiKhoanKH'] ?></td>
                                <td><?php echo $result['HoTen'] ?></td>
                                <td><?php echo $result['EmailKH'] ?></td>
                                <td><?php echo $result['DiaChiKH'] ?></td>
                                <td><?php echo $result['DienThoaiKH'] ?></td>
                                <td><?php echo $result['NgaySinh'] ?></td>
                                <td>
                                    <?php
                                    $temp = $result['TrangThai'];
                                    switch ($temp) {
                                        case '0':
                                            echo '<span class="status-0">Vô hiệu hóa</span>';
                                            break;
                                        case '1':
                                            echo '<span class="status-1">Đang hoạt động</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><a href="userEdit.php?userid=<?php echo $result['MaKH'] ?>">Edit</a></td>
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