<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:29 PM
 * Version: 150607
 */

QdT_Library::loadPageView('product-search');
$item_per_segment = 9;
require_once('products-loadmore-common.php');

$count = 1;
foreach ($products as $item):
    QdT_PageT_ProductSearch_View::genProductWidget($item, 'col-xs-4', '');
    if ($count % 3 == 0) echo '<div class="col-xs-12" style="height: 20px"></div>';//trick to avoid using new row and not overlap with other item
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
        $next_url = add_query_arg(array('offset' => $offset + $item_per_segment), $_SERVER['REQUEST_URI']);
        ?>
        <a href="<?= $next_url ?>">Xem thêm</a>
    </div>
<?php
endif;
