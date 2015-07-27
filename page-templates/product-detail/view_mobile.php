<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:32 PM
 */
QdT_Library::loadLayoutViewMobile('root');

class QdT_PageT_ProductDetail_ViewMobile extends QdT_Layout_Root_ViewMobile
{
    protected function getBannerPart()
    {
        //HIDE
    }

    private function dialog()
    {
        ?>

    <?php
    }

    protected function getContentPart()
    {
        ?>
        <div class="container">


            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-xs-12">
                    <ul id="bxsliderProductDetail">
                        <?php
                        $count = 0;
                        foreach ($this->page->product_imgs as $item):
                            ?>
                            <li><img class="img-responsive chitiet-img" src="<?= $item->path ?>"/></li>
                            <?php $count++; endforeach; ?>
                    </ul>

                    <div style="margin: 0px -2px;" id="bx-pager">
                        <?php
                        $count = 0;
                        foreach ($this->page->product_imgs as $item):
                            ?>
                            <a class="col-xs-3 chitiet-thum" data-slide-index="<?= $count ?>" href=""><img
                                    src="<?= $item->path ?>"/></a>
                            <?php
                            $count++;
                        endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="row product">
                <div class="col-xs-12">
                    <div class="vn-title">
                        <?= $this->page->product->name ?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="vn-model">
                        <div class="title">
                            No.
                        </div>
                        <div class="id">
                            <?= $this->page->product->code ?>
                        </div>
                    </div>


                    <?php if (!QdT_Library::isNullOrEmpty($this->page->manufactor) && $this->page->manufactor->name != ''): ?>
                        <div class="vn-symbol">|</div>
                        <div class="vn-hang">
                            <div class="title">
                                Hãng:
                            </div>
                            <div class="id" style="padding-left: 5px;">
                                <?= $this->page->manufactor->name ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12" style="padding-top: 20px;">
                    <div class="price">
                        <?= number_format($this->page->product->_price_discount, 0, '.', ',') ?> VND
                    </div>
                    <?php if (!QdT_Library::isNullOrEmpty($this->page->size) && $this->page->size->code != ''): ?>
                        <div class="vn-symbol">|</div>
                        <div class="size">
                            <?= $this->page->size->code ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!QdT_Library::isNullOrEmpty($this->page->product) && $this->page->product->discount_percent > 0): ?>
                        <div class="vn-symbol">|</div>
                        <div class="off">
                            <?= number_format($this->page->product->_price_discount, 0, '.', ',') ?> VND
                            (<?= $this->page->product->discount_percent * 100 ?>% OFF)
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (!QdT_Library::isNullOrEmpty($this->page->product) && ($this->page->product->temp_out_of_stock == true)): ?>
                <div class="col-xs-12">
                    <div class="state">
                        Tạm hết hàng
                    </div>
                </div>
                <?php endif; ?>

                <div class="col-xs-12">
                    <hr>
                </div>
                <div class="col-xs-12">
                    <div class="vn-product-detail">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#mo-ta">MÔ TẢ SẢN PHẨM</a></li>
                            <li>
                                <div class="vn-symbol">|</div>
                            </li>
                            <li><a data-toggle="tab" href="#bao-hanh">ĐỔI TRẢ - BẢO HÀNH</a></li>
                            <li>
                                <div class="vn-symbol">|</div>
                            </li>
                            <li><a data-toggle="tab" href="#giao-hang">GIAO HÀNG</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="mo-ta" class="tab-pane fade in active product-list2  edit-font-size"
                             style="margin-top: 15px;">
                            <?= $this->page->product->description ?>
                        </div>
                        <div id="bao-hanh" class="tab-pane fade product-list2  edit-font-size">
                            <?= $this->page->product->doitra_baohanh ?>
                        </div>
                        <div id="giao-hang" class="tab-pane fade product-list2  edit-font-size">
                            <?= $this->page->product->giaohang_thanhtoan ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="ps">

                    </div>
                </div>
                <div class="col-xs-12" style="text-align: center;">
                    <?php
                    $order_url = get_permalink(QdT_Library::getPageIdByTemplate('page-templates/confirm-order-mobile.php'));
                    $order_url = add_query_arg(array('id' => $this->page->product->id), $order_url);
                    ?>
                    <a onclick="jQuery(this).hide(); $('#qd-loading').css('display', 'inline-block')" href="<?= $order_url ?>" class="btn btn-primary order-online-button">
                        <?= $this->page->product_order_setup->btn_dathang ?>
                    </a>
                    <img id="qd-loading" src="../img/loading.gif" style="width: 30px; height: 30px; display: none; margin-top: 15px">
                </div>
                <div class="col-xs-12" style="text-align: center;">
                    <button class="btn btn-default order-phone-button">
                        <?= $this->page->product_order_setup->btn_goidathang ?>
                    </button>
                </div>
                <div class="col-xs-12">
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 product-detail-shop">
                            MUA HÀNG TẠI SHOP
                            <br>
                            <a href="<?=QdT_Library::getNoneLink()?>">(xem Shop có hàng)</a>
                        </div>
                        <div class="col-xs-12">
                            <?php
                            $tmp = QdT_Library::getFullURLFromAbsPath($_SERVER["REQUEST_URI"]);
                            //$tmp = "[addtoany url='{$tmp}' title='Some Example Page']";
                            $tmp = "[feather_share url='{$tmp}']";
                            echo do_shortcode($tmp);
                            ?>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <?= $this->render_r_products() ?>

            <!-- /.row -->
        </div>
        <script>

            $(document).ready(function () {
                $('#bxsliderProductDetail').bxSlider({
                    pagerCustom: '#bx-pager',
                    controls: false
                });

                $('#bxsliderRelatedProducts').bxSlider({
                    pager: false,
                    slideWidth: 1000,
                    minSlides: 2,
                    maxSlides: 2,
                    moveSlides: 1,
                    nextSelector: '#vnc-slider-next',
                    prevSelector: '#vnc-slider-prev',
                    nextText: '<span class="vnc-control-bestchoise glyphicon glyphicon-menu-right "></span>',
                    prevText: '<span class="vnc-control-bestchoise glyphicon glyphicon-menu-left "></span>'
                });
            });
            /*
             $(document).on("pagecreate",function(event)
             {
             $(window).on("orientationchange",function(event){
             $("#bx-pager img").height($("#bx-pager img").width()*2/3);
             $("#chitiet-img").height($("#chitiet-img").width()*2/3);
             $("#johnchuong div").height($("#johnchuong div").width()*2/3);
             $(".bx-viewport").css("height", "auto");
             });
             });*/
            /*
             $(document).ready(function(){
             $("#bx-pager img").height($("#bx-pager img").width()*2/3);
             $("#chitiet-img").height($("#chitiet-img").width()*2/3);
             $("#johnchuong div").height($("#johnchuong div").width()*2/3);
             $(".bx-viewport").css("height", "auto");
             });*/
            /*
             $("#bx-pager img").load("/chitietsp.html",function(){
             $("#bx-pager img").height($("#bx-pager img").width()*2/3);
             $("#chitiet-img").height($("#chitiet-img").width()*2/3);
             });
             $("#johnchuong div").load("/chitietsp.html",function(){
             $(".bx-viewport").css("height", "auto");
             $("#johnchuong div").height($("#johnchuong div").width()*2/3);
             });*/
            /*
             $(".johnchuong2 div").load(window.location, function(){

             $(".bx-viewport").css("height", "auto");
             $(".johnchuong2 div").height($(".johnchuong2 div").width()*2/3);
             });*/

        </script>
    <?php
    }


    protected function render_r_products()
    {
        if (empty($this->page->r_products)) return;
        ?>
        <div class="row slider-most">
            <div class="col-lg-12 title">
                CÓ THỂ BẠN QUAN TÂM
            </div>
            <div class="col-xs-12" style="padding-left: 8px;padding-right: 8px;">
                <div id="bxsliderRelatedProducts">
                    <?php
                    foreach ($this->page->r_products as $item):
                        ?>
                        <div class="slide">
                            <?php echo $this->genProductWidget($item, 'col-xs-12 slider-most-edit johnchuong', ''); ?>
                            <!--
                            <div class="col-xs-12 slider-most-edit johnchuong">
                                <div class="bs-pro" style="background: url('img/panner1.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                                </div>
                                <p class="p-edit-1">
                                    iPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                                </p>
                                <p class="p-edit-1">
                                    <b style="color: rgb(131,131,132);font-weight: normal; float: left;">5.000.000 VND</b>
                                    <img src="img/border-links.png" style="margin: 0px 5px; float: left;">
                                    <b style="float: left;">L</b></br>

                                    <b class="bs-sale">1.000 USD (50% OFF)</b>
                                </p>
                            </div> -->
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="outside2">
                    <div class="col-xs-1" id="vnc-slider-prev"></div>
                    <div class="col-xs-1" id="vnc-slider-next"></div>
                </div>
            </div>
        </div>
    <?php
    }

    protected function getBreadcrumbs()
    {
        $tmp = parent::getBreadcrumbs();
        $tmp = array_merge($tmp, $this->page->product->getBreadcrumbs());
        return $tmp;
    }
}