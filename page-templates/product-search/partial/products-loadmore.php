<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:29 PM
 */

QdT_Library::loadPageView('product-search');

$product_cat_id = get_query_var('product-cat-id', 0);
$manufactor_id = get_query_var('manufactor-id', 0);
$price_from = get_query_var('price-from', -1);
$price_to = get_query_var('price-to', -1);
$size_id = get_query_var('size-id', 0);
$shop_id = get_query_var('shop-id', 0);
$offset = get_query_var('offset', 0);
$key_word = get_query_var('key-word', '');
$item_per_segment = 3;

$products = array();

//Testing
if($shop_id>0)
{
    $tmp = new QdPro2Shop();
    $tmp->SETRANGE('shop_id', $shop_id);

    $tmp->SETLIMIT($item_per_segment);
    $tmp->SETORDERBY('id', 'desc');
    $tmp->SETOFFSET($offset);
    $tmp = $tmp->GETLIST();
    foreach($tmp as $item)
    {
        $tmp2 = QdProduct::GET($item->product_id);
        array_push($products, $tmp2);
    }
}else
{
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

        $obj->SETFILTERRELATION('AND');
    }
    $obj->SETLIMIT($item_per_segment);
    $obj->SETORDERBY('id', 'desc');
    $obj->SETOFFSET($offset);

    //FINAL action
    $products = $obj->GETLIST();
}

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
        $next_url = add_query_arg(array('offset'=>$offset + $item_per_segment), $_SERVER['REQUEST_URI']);
        ?>
        <a href="<?= $next_url ?>">Xem thêm</a>
    </div>
<?php
endif;
