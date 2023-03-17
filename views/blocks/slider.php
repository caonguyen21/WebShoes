<?php
include '../classes/admin/slider.php';
?>
<?php
$slider = new slider();
?>
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            <?php
            $show_slider = $slider->show_slider();
            if ($show_slider) {
                $i = 0;
                while ($result = $show_slider->fetch_assoc()) {
                    if ($result['TrangThai'] == 1) {
                        $i++;
            ?>
                        <div class="item-slick1" style="background-image: url(../admin/uploads/<?php echo $result['AnhBia'] ?>); background-size: auto;background-position-x: 70%;">
                            <div class="container h-full">
                                <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5" style="margin-left: 250px;">
                                    <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                        <span class="ltext-101 cl2 respon2">
                                            <?php echo $result['TenGiay'] ?>
                                        </span>
                                    </div>

                                    <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                        <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                            <?php echo $fm->currency_format($result['GiaBan']) ?>

                                        </h2>
                                    </div>

                                    <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                        <a href="product-detail.php?proID=<?php echo $result['MaGiay'] ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                            Mua Ngay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
</section>