<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/slider.php'; ?>
<?php
$slider = new slider();
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Slider List</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>STT</th>
						<th>SẢN PHẨM</th>
						<th>ẢNH BÌA</th>
						<th>TRẠNG THÁI</th>
						<th>ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$show_slider = $slider->show_slider();
					if ($show_slider) {
						$i = 0;
						while ($result = $show_slider->fetch_assoc()) {
							$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i ?></td>
								<td><?php echo $result['TenGiay'] ?></td>
								<td><img src="../admin/uploads/<?php echo $result['AnhBia'] ?>" width="80"></td>
								<td>
									<?php
									if ($result['TrangThai'] == 1) {
										echo "<span style='color:green'>Active</span>";
									} else {
										echo "<span style='color:red'>Inactive</span>";
									}
									?>
								</td>
								<td><a href="sliderEdit.php?sliderid=<?php echo $result['sliderID'] ?>">Edit</a></td>
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