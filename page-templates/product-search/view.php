<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:43 PM
 * Version: 150607, 151024, 151101
 */
QdT_Library::loadLayoutView('root');

class QdT_PageT_ProductSearch_View extends QdT_Layout_Root_View
{

    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getContentPart()
    {
        //$record = new QdProductCat();
        //$record->SETRANGE('type', QdProductCat::$TYPE_PRODUCTCAT);
        //$objss = $record->GETLIST();
        //$menu_ul_li = QdT_Library::genMenuTree(QdProductCat::genObjectsToArray($objss), $this->uri);

        ?>
        <!-- Begin Content -->
        <div class="container-non-responsive carousel content" style="margin-top: 5px">
            <!-- Title Product -->
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->getBreadcrumbsPart() ?>
                    <h2 class="sanpham-header">
                        <small>
                            <?= mb_strtoupper($this->page->getGeneralPanelName()) ?>
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
                        <?= QdT_Library::loadPageT('product-search/partial/products-loadmore') ?>
                    </div>
                </div>
                <div class="col-xs-3 product-right">

                    <?=$this->getPriceRangePart()?>

                    <?= $this->getSizeThoiTrangPart() ?>

                    <?= $this->getSizeGiayDepPart() ?>

                    <?= $this->getManufactorPart() ?>

                    <?= $this->getShopPart() ?>

                </div>
            </div>
        </div>
        <!-- End Content -->
    <?php
    }
    private function getPriceRangePart(){
        if($this->page->product_cat == null){
            if($this->page->manufactor != null){
                $pr = $this->page->manufactor->getCalPriceRanges();
            }else{
                $pr = array();
            }
        }
        else{
            $pr = $this->page->product_cat->getCalPriceRanges();
        }
        ?>
        <!-- Mức giá -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="straight-product" style="margin-top: 0px;"></ul>
            </div>
            <div class="col-xs-12 title">
                MỨC GIÁ
            </div>
            <div class="col-xs-12">
                <ul class="product-list1 edit-product-list1" style="height:150px;">
                    <li><a href="<?= remove_query_arg(array('price-from', 'price-to'), $this->page->uri) ?>"
                           class="product-links">(Tất cả)</a></li>
                    <?php
                    foreach($pr as $item){
                        $s = '';
                        $from = number_format( $item[0] , 0, '.' , ',');
                        $to = number_format( $item[1] , 0, '.' , ',');
                        if($item[0]<=0){
                            $s .= 'Dưới '.$to;
                        }else if ($item[1]<=0){
                            $s .= 'Trên '.$from;
                        } else{
                            $s .= 'Từ '.$from.' - '.$to;
                        }
                        ?>
                        <li>
                            <a href="<?= add_query_arg(array('price-from' => $item[0], 'price-to' => $item[1]), $this->page->uri) ?>"
                               class="product-links">
                                <?=$s?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
        <?php
    }

    protected function getShopPart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->vnc_shops)) return;
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
                    <?php
                    foreach ($this->page->vnc_shops as $item):
                        ?>
                        <li><a href="<?= add_query_arg(array('shop-id' => $item->id), $this->page->uri) ?>"
                               class="product-links">
                                <?= $item->name ?>
                            </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php
    }

    protected function getManufactorPart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->manufactor_list)) return;
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
                    foreach ($this->page->manufactor_list as $item):
                        ?>
                        <li><a href="<?= add_query_arg(array('manufactor-id' => $item->id), $this->page->uri) ?>"
                               class="product-links"><?= $item->name ?></a></li>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }

    protected function getSizeThoiTrangPart()
    {
        $sl = array();
        if (
        (!QdT_Library::isNullOrEmpty($this->page->product_cat) && $this->page->product_cat->property_grp_type == QdProductCat::$PROPERTY_G3)
        ) {
            $size = new QdSize();
            $size->SETRANGE('type', $this->page->product_cat->struct_lv_4);
            $sl = $size->GETLIST();
        } else if (
        !QdT_Library::isNullOrEmpty($this->page->size)
        ) {
            $size = new QdSize();
            $size->SETRANGE('type', $this->page->size->type);
            $sl = $size->GETLIST();
        }
        if (empty($sl)) {
            return;
        }
        ?>
        <!-- Size quan ao -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="product-list">
                    <div class="row">
                        <div class="col-xs-12 title">
                            SIZE
                        </div>
                    </div>
                    <div class="row" style="">
                        <div class="col-xs-12" style="">
                            <?php
                            foreach ($sl as $item):
                                ?>
                                <span style="display: inline-block; margin-top: 15px; margin-bottom: 15px">
                                <a href="<?= add_query_arg(array('size-id' => $item->id), $this->page->uri) ?>"
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
    }

    protected function getSizeGiayDepPart()
    {
        return;
        /*
        if (
            (!QdT_Library::isNullOrEmpty($this->page->product_cat) && $this->page->product_cat->type2 == QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP)
            ||
            (!QdT_Library::isNullOrEmpty($this->page->manufactor) && $this->page->manufactor->type2 == QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP)
            ||
            (!QdT_Library::isNullOrEmpty($this->page->size) && $this->page->size->type == QdManufactor::$TYPE2_MANUFACTOR_GIAYDEP)
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
                                foreach ($this->page->size_giaydep_list as $item):
                                    ?>
                                    <span style="display: inline-block; margin-top: 15px; margin-bottom: 15px">
                                <a href="<?= add_query_arg(array('size-id' => $item->id), $this->page->uri) ?>"
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
        */
    }

    protected function getBreadcrumbs()
    {
        $obj = parent::getBreadcrumbs();
        //array_push($obj, array('name' => 'Sản phẩm', 'url' => $this->page->uri));
        if ($this->page->product_cat != null) {
            //array_push($obj, array('name' => $this->page->product_cat->name, 'url' => $this->page->product_cat->getPermalink()));//1 level
            $obj = array_merge($obj, $this->page->product_cat->getBreadcrumbs());//multi level
        } else if ($this->page->manufactor != null) {
            array_push($obj, array('name' => $this->page->manufactor->name, 'url' => $this->page->manufactor->getPermalink()));//1 level

        } else if ($this->page->shop_obj != null) {
            array_push($obj, array('name' => 'Shop ' . $this->page->shop_obj->name, 'url' => $this->page->shop_obj->getPermalink()));//1 level
        } else {
            array_push($obj, array('name' => 'Sản phẩm', 'url' => get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'))));//1 level
        }
        return $obj;
    }

}