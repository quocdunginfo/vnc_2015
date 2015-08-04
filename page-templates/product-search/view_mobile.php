<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:43 PM
 * Version: 150720
 */
QdT_Library::loadLayoutViewMobile('root');
class QdT_PageT_ProductSearch_ViewMobile extends QdT_Layout_Root_ViewMobile {

    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getContentPart()
    {
        $record = new QdProductCat();
        $record->SETRANGE('type', QdProductCat::$TYPE_PRODUCTCAT);
        $objss = $record->GETLIST();
        //$menu_ul_li = QdT_Library::genMenuTree(QdProductCat::genObjectsToArray($objss), $this->uri);

        ?>
        <!-- Page Content -->

        <!-- Big Sale -->
        <!-- bread crumb -->
        <div class="container">

            <!-- Marketing Icons Section -->
            <div class="row big-sale" id="qd_list_sanpham">
                <div class="col-lg-12">
                    <h4 class="vnc-title">
                        <?= mb_strtoupper($this->page->getGeneralPanelName()) ?>
                    </h4>
                </div>
                <script type="text/javascript" src="../plugin/jquery.jscroll.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#qd_list_sanpham').jscroll({
                            loadingHtml: '<div style="text-align: center; width: 100%; padding-bottom: 17px"><img style="width: 25px; height: 25px" src="../img/loading.gif" alt="Loading" /> Đang tải...</div>',
                            padding: 0,
                            autoTrigger: false,
                            nextSelector: '.qd_jscroll_next a:last',
                            callback: function () {
                                //alert("wtf");
                            }
                        });
                    });

                </script>
                <?= QdT_Library::loadPageT('product-search/partial/products-loadmore-mobile') ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- Portfolio Section -->
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
                        <li><a href="<?= add_query_arg(array('shop-id' => $item->id), $this->page->uri) ?>" class="product-links">
                                <?=$item->name?>
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

    protected function getSizeQuanAoPart()
    {
        if (
            (!QdT_Library::isNullOrEmpty($this->page->product_cat) && $this->page->product_cat->type2 == QdManufactor::$TYPE2_MANUFACTOR_QUANAO)
            ||
            (!QdT_Library::isNullOrEmpty($this->page->manufactor) && $this->page->manufactor->type2 == QdManufactor::$TYPE2_MANUFACTOR_QUANAO)
            ||
            (!QdT_Library::isNullOrEmpty($this->page->size) && $this->page->size->type == QdManufactor::$TYPE2_MANUFACTOR_QUANAO)
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
                                foreach ($this->page->size_quanao_list as $item):
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
    }

    protected function getSizeGiayDepPart()
    {
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
    }

    protected function getBreadcrumbs()
    {
        $obj = parent::getBreadcrumbs();
        array_push($obj, array('name' => 'Sản phẩm', 'url' => $this->page->uri));
        if ($this->page->product_cat != null) {
            array_push($obj, array('name' => $this->page->product_cat->name, 'url' => $this->page->product_cat->getPermalink()));
        } else if ($this->page->manufactor != null) {
            array_push($obj, array('name' => $this->page->manufactor->name, 'url' => $this->page->manufactor->getPermalink()));
        } else if ($this->page->shop_obj != null) {
            array_push($obj, array('name' => 'Shop ' . $this->page->shop_obj->name, 'url' => $this->page->shop_obj->getPermalink()));
        }
        return $obj;
    }
}