<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/bill.php'; ?>
<?php
$bill = new bill();
?>
<style>
    .status-packing {
        color: orange;
    }

    .status-shipping {
        color: blue;
    }

    .status-delivered {
        color: green;
    }

    .status-invalid {
        color: red;
    }
</style>
<div class="grid_10">
    <div class="box round first grid">
        <h2>DANH SÁCH ĐƠN HÀNG</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>TÊN GIÀY</th>
                        <th>Size</th>
                        <th>ẢNH BÌA</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ BÁN</th>
                        <th>KHÁCH HÀNG</th>
                        <th>NGÀY ĐẶT</th>
                        <th>TÌNH TRẠNG</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $show_bill = $bill->show_bill();
                    if ($show_bill) {
                        $i = 0;
                        while ($result = $show_bill->fetch_assoc()) {
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $result['id'] ?></td>
                                <td><?php echo $result['TenGiay'] ?></td>
                                <td><?php echo $result['Size'] ?></td>
                                <td><img src="uploads/<?php echo trim($result['AnhBia']) ?>" width="80"></td>
                                <td><?php echo $result['SoLuong'] ?></td>
                                <td><?php echo $result['GiaBan'] ?></td>
                                <td><?php echo $result['MaKH'] ?></td>
                                <td><?php echo date('d/m/Y', strtotime($result['NgayDat'])); ?></td>
                                <td>
                                    <?php
                                    $temp = $result['TinhTrang'];
                                    switch ($temp) {
                                        case '0':
                                            echo '<span class="status-packing">Đang đóng gói</span>';
                                            break;
                                        case '1':
                                            echo '<span class="status-shipping">Đang vận chuyển</span>';
                                            break;
                                        case '2':
                                            echo '<span class="status-delivered">Giao thành công</span>';
                                            break;
                                        default:
                                            echo '<span class="status-invalid">Không thành công</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><a href="billEdit.php?billid=<?php echo $result['id'] ?>">Edit</a></td>
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