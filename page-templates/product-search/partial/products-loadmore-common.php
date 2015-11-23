<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 7/22/15
 * Time: 10:49 PM
 */
$product_cat_id = get_query_var('product-cat-id', '');

$product_cat_level = 0;
$product_cat_obj = QdProductCat::GET($product_cat_id);
if ($product_cat_obj != null) {
    $product_cat_level = $product_cat_obj->level;
}

$manufactor_id = get_query_var('manufactor-id', '');
$price_from = get_query_var('price-from', -1);
$price_to = get_query_var('price-to', -1);
$size_id = get_query_var('size-id', 0);
$shop_id = get_query_var('shop-id', 0);
$offset = get_query_var('offset', 0);
$key_word = get_query_var('key-word', '');

$products = array();

//Testing
if ($shop_id > 0) {
    $tmp = new QdPro2Shop();
    $tmp->SETRANGE('shop_id', $shop_id);

    $tmp->SETLIMIT($item_per_segment);
    $tmp->SETORDERBY('id', 'desc');
    $tmp->SETOFFSET($offset);
    $tmp = $tmp->GETLIST();
    foreach ($tmp as $item) {
        $tmp2 = QdProduct::GET($item->product_id);
        array_push($products, $tmp2);
    }
} else {
    $obj = new QdProduct();
    if ($key_word != '') {
        $obj->SETRANGE('name', $key_word, $obj::$OP_CONTAINS);
        $obj->SETRANGE('description', $key_word, $obj::$OP_CONTAINS);
        $obj->SETRANGE('doitra_baohanh', $key_word, $obj::$OP_CONTAINS);
        $obj->SETRANGE('giaohang_thanhtoan', $key_word, $obj::$OP_CONTAINS);
        $obj->SETRANGE('code', $key_word, $obj::$OP_CONTAINS);
        $obj->SETFILTERRELATION('OR');
    } else {
        if ($product_cat_id != '') {
            if ($product_cat_level > 0) {
                $obj->SETRANGE("struct_lv_{$product_cat_level}", $product_cat_id);
            } else {
                $obj->SETRANGE('product_cat_id', $product_cat_id);
            }
        }

        if ($manufactor_id != '')
            $obj->SETRANGE('manufacturer_id', $manufactor_id);
        if ($size_id > 0)
            $obj->SETRANGE('size_id', $size_id);

        if ($price_from > 0)
            $obj->SETRANGE('price', $price_from, $obj::$OP_GREATER_THAN_OR_EQUAL);//quocdunginfo
        if ($price_to > 0)
            $obj->SETRANGE('price', $price_to, $obj::$OP_LESS_THAN_OR_EQUAL);//quocdunginfo

        $obj->SETFILTERRELATION('AND');
    }
    $obj->SETLIMIT($item_per_segment);
    $obj->SETORDERBY('id', 'desc');
    $obj->SETOFFSET($offset);

    //FINAL action
    $products = $obj->GETLIST();
}