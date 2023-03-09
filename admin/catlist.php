<?php include 'blocks/header.php';?>
<?php include 'blocks/sidebar.php';?>
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
			<?php
			$show_category=$cat->show_category();
			if($show_category){
				while
			}
			?>
          <tr class="odd gradeX">
            <td>01</td>
            <td>Internet</td>
            <td><a href="">Edit</a> || <a href="">Delete</a></td>
          </tr>
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
<?php include 'blocks/footer.php';?>