<?php include 'blocks/header.php'; ?>
<?php include 'blocks/sidebar.php'; ?>
<?php include '../classes/admin/reviews.php'; ?>
<?php
$reviews = new reviews();
if (!isset($_GET['reviewsid']) || $_GET['reviewsid'] == null) {
    echo "<script>window.location='reviewsList.php'</script>";
} else {
    $id = $_GET['reviewsid'];
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>CHI TIẾT Ý KIẾN</h2>
        <div class="block copyblock">
            <?php
            $get_reviews = $reviews->getreviewsbyId($id);
            if ($get_reviews) {
                while ($result = $get_reviews->fetch_assoc()) {
            ?>
                    <div class="content">
                        <label for="GioiThieu">Nội Dung</label>
                        <div><?php echo $result['NoiDung'] ?></div>
                        <button onclick="history.go(-1)">Quay lại</button>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include 'blocks/footer.php'; ?>