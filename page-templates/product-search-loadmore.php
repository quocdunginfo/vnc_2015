<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:29 PM
 */

$product_cat_id = get_query_var('product-cat-id', 0);
$manufactor_id = get_query_var('manufactor-id', 0);
$price_from = get_query_var('price-from', -1);
$price_to = get_query_var('price-to', -1);
$size_id = get_query_var('size-id', 0);
$offset = get_query_var('offset', 0);
$key_word = get_query_var('key-word', '');
$item_per_segment = 3;

$obj = new QdProduct();
if($key_word!='')
{
    $obj->SETRANGE('name', $key_word, false);
    $obj->SETRANGE('description', $key_word, false);
    $obj->SETRANGE('doitra_baohanh', $key_word, false);
    $obj->SETRANGE('giaohang_thanhtoan', $key_word, false);
    $obj->SETRANGE('code', $key_word, false);
    $obj->SETFILTERRELATION('OR');
}
else {
    if ($product_cat_id > 0)
        $obj->SETRANGE('product_cat_id', $product_cat_id, true);
    if ($manufactor_id > 0)
        $obj->SETRANGE('manufacturer_id', $manufactor_id, true);
    if ($size_id > 0)
        $obj->SETRANGE('size_id', $size_id, true);

    if ($price_from > 0)
        $obj->SETRANGE('price', $price_from, true, '>=');
    if ($price_to > 0)
        $obj->SETRANGE('price', $price_to, true, '<=');
//Framework not supported yet

    $obj->SETFILTERRELATION('AND');
}
$obj->SETLIMIT($item_per_segment);
$obj->SETORDERBY('id', 'desc');
$obj->SETOFFSET($offset);

$products = $obj->GETLIST();

//$products_segment = $obj->getProductsSegment($item_per_segment, $_GET['product-offset']);
$count = 1;
foreach ($products as $item):
    QdT_PageT_ProductSearch::genProductWidget($item, 'col-xs-4', '');
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
        $next_url = add_query_arg(array('offset'=>$offset + $item_per_segment), $_SERVER['REQUEST_URI']);
        ?>
        <a href="<?= $next_url ?>">Xem thêm</a>
    </div>
<?php
endif;
