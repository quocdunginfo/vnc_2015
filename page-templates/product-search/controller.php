<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 */
//require_once('class.php');

if (isset($_GET['offset'])) {
    if (QdT_Library::isMobile()) {
        QdT_Library::loadPageT('product-search/partial/products-loadmore-mobile');
    } else {
        QdT_Library::loadPageT('product-search/partial/products-loadmore');
    }
    exit(0);
}

$obj = new QdT_PageT_ProductSearch();
$obj->render();