<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/product.php'; ?>
<?php
$product = new product();
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>DANH SÁCH SẢN PHẨM</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>STT</th>
						<th>TÊN GIÀY</th>
						<th>SIZE</th>
						<th>ẢNH BÌA</th>
						<th>GIÁ BÁN</th>
						<th>THƯƠNG HIỆU</th>
						<th>NCC</th>
						<th>DANH MỤC</th>
						<th>BẢO HÀNH</th>
						<th>SỐ LƯỢNG</th>
						<th>NGÀY CẬP NHẬT</th>
						<th>TRẠNG THÁI</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$show_product = $product->show_product();
					if ($show_product) {
						$i = 0;
						while ($result = $show_product->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i ?></td>
								<td><?php echo $result['TenGiay'] ?></td>
								<td><?php echo $result['Size'] ?></td>
								<td><img src="uploads/<?php echo trim($result['AnhBia']) ?>" width="80"></td>
								<td><?php echo $result['GiaBan'] ?></td>
								<td><?php echo $result['TenThuongHieu'] ?></td>
								<td><?php echo $result['TenNCC'] ?></td>
								<td><?php echo $result['TenLoai'] ?></td>
								<td><?php echo $result['ThoiGianBaoHanh'] ?> tháng</td>
								<td><?php echo $result['SoLuongTon'] ?></td>
								<td><?php echo date('d/m/Y', strtotime($result['NgayCapNhat'])); ?></td>
								<td>
									<?php
									if ($result['TrangThai'] == 1) {
										echo "<span style='color:green'>Active</span>";
									} else {
										echo "<span style='color:red'>Inactive</span>";
									}
									?>
								</td>
								<td><a href="productEdit.php?productid=<?php echo $result['MaGiay'] ?>">Edit</a></td>
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