<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:29 PM
 */

QdT_Library::loadPageViewMobile('product-search');
$item_per_segment = 8;

require_once('products-loadmore-common.php');

$count = 1;
foreach ($products as $item):
    QdT_PageT_ProductSearch_ViewMobile::genProductWidget($item, 'col-xs-6 johnchuong', 'padding-right: 5px;');
    if ($count % 2 == 0) echo '<div class="col-xs-12" style="padding-left: 5px; margin-top: 20px;"></div>';//trick to avoid using new row and not overlap with other item
    $count++;
endforeach;
?>
<?php

if (count($products) > 0):
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
        $next_url = add_query_arg(array('offset'=>$offset + $item_per_segment), $_SERVER['REQUEST_URI']);
        ?>
        <a href="<?= $next_url ?>" style="font-style: italic">Xem thêm</a>
    </div>
    <script>
        MYAPP.validateJohnChuongImgHeight();
    </script>
<?php
endif;
