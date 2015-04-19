<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:29 PM
 */
$id = get_query_var( 'id', 0);
$obj = QdProductCat::GET($id);
$item_per_segment = 6;
$products_segment = $obj->getProductsSegment($item_per_segment, $_GET['product-offset']);
foreach ($products_segment as $item):
    $link = $item->getPermalink();
    ?>
    <div class="col-xs-6 column">

            <div class="qd-image-box" style="margin-bottom: 10px; width: 315px; height: 200px;" onclick="window.open('<?=$link?>','_blank')">
                <div class="qd-image-box-bg"></div>
                <div class="qd-image-box-bg" style="background: url(<?= $item->avatar ?>); background-repeat: no-repeat;
                    background-size: contain;
                    background-position: center;">

                    <div class="qd-image-box-caption">
                        <?= $item->name ?>
                    </div>

                    <div class="qd_xemchitiet">
                        <a href="<?=QdT_Library::getNoneLink()?>" type="button" class="btn btn-default">
                            XEM CHI TIẾT
                        </a>
                    </div>
                </div>
            </div>
        <div class="qd-item-price"><a target="_blank" href="<?=$link?>" style="text-decoration: none; color: #404040"><?=number_format($item->price, 0, '', '.')?> VND</a></div>
    </div>

<?php
endforeach;
?>
<?php
if (count($products_segment) > 0):
    ?>
    <div style="clear: both"></div>
    <style>
        .qd_jscroll_next {
            text-align: center;
            padding-bottom: 25px;
        }
    </style>
    <div class="qd_jscroll_next">
        <?php
        $next_url = $obj->getProductsSegmentURL($_GET['product-offset'] + $item_per_segment);
        ?>
        <a href="<?= $next_url ?>">Xem thêm</a>
    </div>
<?php
endif;