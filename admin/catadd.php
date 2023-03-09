<?php include 'blocks/header.php';?>
<?php include 'blocks/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Nhập tên danh mục..." required="" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input  type="submit" name="submit" Value="Submit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'blocks/footer.php';?>