<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayout('root');

class QdT_PageT_ProductSearch extends QdT_Layout_Root
{
    protected $manufactor_list = array();
    protected $manufactor = null;
    protected $product_cat = null;
    protected $size = null;

    protected $size_quanao_list = array();

    protected $size_giaydep_list = array();

    function __construct()
    {
        parent::__construct();

        //reset uri, filter side by side not INCLUDED query
        $this->uri = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));

        $this->key_word = get_query_var('key-word', '');

        $tmp_product_cat_id = get_query_var('product-cat-id', null);
        if ($tmp_product_cat_id != null) {
            $this->product_cat = QdProductCat::GET($tmp_product_cat_id);
            if ($this->product_cat == null) {
                static::redirectPageError404();
            }
        }

        $tmp_size_id = get_query_var('size-id', null);
        if ($tmp_size_id != null) {
            $this->size = QdSize::GET($tmp_size_id);
            if ($this->size == null) {
                static::redirectPageError404();
            }
        }

        $tmp_manu_id = get_query_var('manufactor-id', null);
        if ($tmp_manu_id != null) {
            $this->manufactor = QdManufactor::GET($tmp_manu_id);
            if ($this->manufactor == null) {
                static::redirectPageError404();
            }
        }

        if ($this->product_cat != null) {
            $record = new QdManufactor();
            $record->SETRANGE('type2', $this->product_cat->type2);
            $this->manufactor_list = $record->GETLIST();
        } else if ($this->manufactor != null) {
            $record = new QdManufactor();
            $record->SETRANGE('type2', $this->manufactor->type2);
            $this->manufactor_list = $record->GETLIST();
        }

        $record = new QdSize();
        $record->SETRANGE('type', QdManufactor::$TYPE2_MANUFACTOR_QUANAO);
        $this->size_quanao_list = $record->GETLIST();

        $record->REMOVERANGE('type');
        $record->SETRANGE('type', QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP);
        $this->size_giaydep_list = $record->GETLIST();
    }

    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getContentPart()
    {
        $record = new QdProductCat();
        $record->SETRANGE('type', QdProductCat::$TYPE_PRODUCTCAT, true);
        $objss = $record->GETLIST();
        //$menu_ul_li = QdT_Library::genMenuTree(QdProductCat::genObjectsToArray($objss), $this->uri);

        ?>
        <!-- Begin Content -->
        <div class="container-non-responsive carousel content" style="margin-top: 0px">
            <!-- Title Product -->
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->getBreadcrumbsPart() ?>
                    <h2 class="sanpham-header">
                        <small>
                            <?= $this->product_cat != null ? $this->product_cat->name : 'SẢN PHẨM' ?>
                        </small>
                    </h2>
                </div>
            </div>
            <!-- Product -->
            <div class="row">
                <div class="col-xs-9 ">
                    <!-- Product 1
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="vn-sanpham-box" style="background: url('img/current 3.jpg');
                                                                  background-repeat: no-repeat;
                                                                  background-size: contain;
                                                                  background-position: center;">
                            </div>
                            <p class="p-edit-1">
                                IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                            </p>
                            <p class="p-edit-1">
                                <b style="color: rgb(131,131,132);font-weight: normal;">5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                                <b style="color: #C80815;">1.000 USD ( Giá Shock !!! )</b>
                            </p>
                        </div>
                        <div class="col-xs-4">
                            <div class="vn-sanpham-box" style="background: url('img/current 3.jpg');
                                                                  background-repeat: no-repeat;
                                                                  background-size: contain;
                                                                  background-position: center;">
                            </div>
                            <p class="p-edit-1">
                                IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                            </p>
                            <p class="p-edit-1">
                                <b>5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                            </p>
                        </div>
                        <div class="col-xs-4">
                            <div class="vn-sanpham-box" style="background: url('img/current 3.jpg');
                                                                  background-repeat: no-repeat;
                                                                  background-size: contain;
                                                                  background-position: center;">
                            </div>
                            <p class="p-edit-1">
                                IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                            </p>
                            <p class="p-edit-1">
                                <b>5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                            </p>
                        </div>
                    </div>
                    -->

                    <!-- Product 2 -->
                    <div id="qd_list_sanpham" class="row">
                        <script type="text/javascript" src="plugin/jquery.jscroll.js"></script>
                        <script>
                            $(document).ready(function () {
                                $('#qd_list_sanpham').jscroll({
                                    loadingHtml: '<div style="text-align: center; width: 100%; padding-bottom: 17px"><img style="width: 25px; height: 25px" src="img/loading.gif" alt="Loading" /> Đang tải...</div>',
                                    padding: 0,
                                    autoTrigger: false,
                                    nextSelector: '.qd_jscroll_next a:last',
                                    callback: function () {
                                        //alert("wtf");
                                    }
                                });
                            });

                        </script>
                        <?= QdT_Library::loadPageT('product-search-loadmore') ?>
                    </div>
                </div>
                <div class="col-xs-3 product-right">

                    <!-- Mức giá -->
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="straight-product" style="margin-top: 0px;"></ul>
                        </div>
                        <div class="col-xs-12 title">
                            MỨC GIÁ
                        </div>
                        <div class="col-xs-12">
                            <ul class="product-list1 edit-product-list1" style="height:140px;">
                                <li><a href="<?= remove_query_arg(array('price-from', 'price-to'), $this->uri) ?>"
                                       class="product-links">(Tất cả)</a></li>
                                <li>
                                    <a href="<?= add_query_arg(array('price-from' => 0, 'price-to' => 1000000), $this->uri) ?>"
                                       class="product-links">Dưới 1.000.000 vnđ</a></li>
                                <li>
                                    <a href="<?= add_query_arg(array('price-from' => 1000000, 'price-to' => 3000000), $this->uri) ?>"
                                       class="product-links">Từ 1.000.000 - 3.000.000</a></li>
                                <li>
                                    <a href="<?= add_query_arg(array('price-from' => 3000000, 'price-to' => 6000000), $this->uri) ?>"
                                       class="product-links">Từ 3.000.000 - 6.000.000</a></li>
                                <li>
                                    <a href="<?= add_query_arg(array('price-from' => 6000000, 'price-to' => 10000000), $this->uri) ?>"
                                       class="product-links">Từ 6.000.000 - 10.000.000</a></li>
                                <li>
                                    <a href="<?= add_query_arg(array('price-from' => 10000000, 'price-to' => -1), $this->uri) ?>"
                                       class="product-links">Trên 10.000.000</a></li>
                            </ul>
                        </div>
                    </div>

                    <?= $this->getSizeQuanAoPart() ?>

                    <?= $this->getSizeGiayDepPart() ?>

                    <?= $this->getManufactorPart() ?>

                    <?=$this->getShopPart()?>

                </div>
            </div>
        </div>
        <!-- End Content -->
    <?php
    }
    protected function getShopPart()
    {
        ?>
        <!-- Tìm theo shop -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="straight-product"></ul>
            </div>
            <div class="col-xs-12 title">
                TÌM THEO SHOP
            </div>
            <div class="col-xs-12">
                <ul class="product-list1">
                    <li><a href="#" class="product-links">Sài Gòn</a></li>
                    <li><a href="#" class="product-links">Trà Vinh</a></li>
                    <li><a href="#" class="product-links">Bến Tre</a></li>
                    <li><a href="#" class="product-links">Vĩnh Long</a></li>
                    <li><a href="#" class="product-links">Kiên Giang</a></li>
                    <li><a href="#" class="product-links">Hậu Giang</a></li>
                    <li><a href="#" class="product-links">Cần Thơ</a></li>
                    <li><a href="#" class="product-links">Long An</a></li>
                    <li><a href="#" class="product-links">Vũng Tàu</a></li>
                    <li><a href="#" class="product-links">Cà Mau</a></li>
                </ul>
            </div>
        </div>
        <?php
    }

    protected function getManufactorPart()
    {
        if (QdT_Library::isNullOrEmpty($this->manufactor_list)) return;
        ?>
        <!-- Tìm theo hãng -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="straight-product"></ul>
            </div>
            <div class="col-xs-12 title">
                TÌM THEO HÃNG
            </div>
            <div class="col-xs-12">
                <ul class="product-list1">
                    <?php
                    foreach ($this->manufactor_list as $item):
                        ?>
                        <li><a href="<?= add_query_arg(array('manufactor-id' => $item->id), $this->uri) ?>"
                               class="product-links"><?= $item->name ?></a></li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }

    protected function getSizeQuanAoPart()
    {
        if (
            (!QdT_Library::isNullOrEmpty($this->product_cat) && $this->product_cat->type2 == QdManufactor::$TYPE2_MANUFACTOR_QUANAO)
            ||
            (!QdT_Library::isNullOrEmpty($this->manufactor) && $this->manufactor->type2 == QdManufactor::$TYPE2_MANUFACTOR_QUANAO)
            ||
            (!QdT_Library::isNullOrEmpty($this->size) && $this->size->type == QdManufactor::$TYPE2_MANUFACTOR_QUANAO)
        ):
            ?>
            <!-- Size quan ao -->
            <div class="row">
                <div class="col-xs-12">
                    <ul class="product-list">
                        <div class="row">
                            <div class="col-xs-12 title">
                                SIZE QUẦN ÁO
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="col-xs-12" style="">
                            <?php
                            foreach ($this->size_quanao_list as $item):
                                ?>
                                <span style="display: inline-block; margin-top: 15px; margin-bottom: 15px">
                                <a href="<?= add_query_arg(array('size-id' => $item->id), $this->uri) ?>"
                                       class="product-links product-quanao">
                                        <?= $item->code ?>
                                    </a>
                                    </span>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        <?php
        endif;
    }

    protected function getSizeGiayDepPart()
    {
        if (
            (!QdT_Library::isNullOrEmpty($this->product_cat) && $this->product_cat->type2 == QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP)
            ||
            (!QdT_Library::isNullOrEmpty($this->manufactor) && $this->manufactor->type2 == QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP)
            ||
            (!QdT_Library::isNullOrEmpty($this->size) && $this->size->type == QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP)
        ):
            ?>
            <!-- Size giay dep -->
            <div class="row">
                <div class="col-xs-12">
                    <ul class="product-list">
                        <div class="row">
                            <div class="col-xs-12 title">
                                SIZE GIÀY DÉP
                            </div>
                        </div>
                        <div class="row" style="">
                            <div class="col-xs-12" style="">
                                <?php
                                foreach ($this->size_giaydep_list as $item):
                                    ?>
                                    <span style="display: inline-block; margin-top: 15px; margin-bottom: 15px">
                                <a href="<?= add_query_arg(array('size-id' => $item->id), $this->uri) ?>"
                                   class="product-links product-quanao">
                                    <?= $item->code ?>
                                </a>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        <?php
        endif;
    }

    protected function getBreadcrumbs()
    {
        $obj = parent::getBreadcrumbs();
        array_push($obj, array('name' => 'Sản phẩm', 'url' => $this->uri));
        if ($this->product_cat != null) {
            array_push($obj, array('name' => $this->product_cat->name, 'url' => $this->product_cat->getPermalink()));
        } else if ($this->manufactor != null) {
            array_push($obj, array('name' => $this->manufactor->name, 'url' => $this->manufactor->getPermalink()));
        }
        return $obj;
    }

}