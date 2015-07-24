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
                        IPHONE 5S 32GB QUỐC TẾ MÀU TRẮNG
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="vn-model">
                        <div class="title">
                            No.
                        </div>
                        <div class="id">
                            123456789
                        </div>
                    </div>

                    <div class="vn-symbol">|</div>
                    <div class="vn-hang">
                        <div class="title">
                            Hãng:
                        </div>
                        <div class="id" style="padding-left: 5px;">
                            Apple
                        </div>
                    </div>
                </div>
                <div class="col-xs-12" style="padding-top: 20px;">
                    <div class="price">
                        5.000.000 VND
                    </div>
                    <div class="vn-symbol">|</div>
                    <div class="size">
                        XL
                    </div>
                    <div class="vn-symbol">|</div>
                    <div class="off">
                        2.500.000 VND (OFF 50%)
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="state">
                        Tạm hết hàng
                    </div>
                </div>

                <div class="col-xs-12">
                    <hr>
                </div>
                <div class="col-xs-12">
                    <div class="vn-product-detail">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#mo-ta">MÔ TẢ SẢN PHẨM</a></li>
                            <li><div class="vn-symbol">|</div></li>
                            <li><a data-toggle="tab" href="#bao-hanh">ĐỔI TRẢ - BẢO HÀNH</a></li>
                            <li><div class="vn-symbol">|</div></li>
                            <li><a data-toggle="tab" href="#giao-hang">GIAO HÀNG</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="mo-ta" class="tab-pane fade in active product-list2  edit-font-size" style="margin-top: 15px;">
                            <div class="tinh-trang"> <span style="color:black;">Tình trạng:</span> <span>Like new</span></div>
                            <div class="bao-hanh"> <span style="color:black;">Bảo hành: </span> <span>6 Tháng</span></div>
                            <div class="giao-hang"> <span style="color:black;">Giao hàng: </span> <span>Miễn phí</span></div>
                            <div class="phu-kien"> <span style="color:black;">Phụ kiện: </span> <span>Sạc, cáp, tai nghe, que sim</span></div>
                            <div class="dac-diem"> <span style="color:black;">Đặc điểm: </span> <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id.</p></div>
                        </div>
                        <div id="bao-hanh" class="tab-pane fade product-list2  edit-font-size">
                            <h3>Section B</h3>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                        <div id="giao-hang" class="tab-pane fade product-list2  edit-font-size">
                            <h3>Section B</h3>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="ps"> ĐẶT MUA TẶNG: BAO DA KAKA TRỊ GIÁ 300K !</div>
                </div>
                <div class="col-xs-12" style="text-align: center;">
                    <?php
                    $order_url = get_permalink(QdT_Library::getPageIdByTemplate('page-templates/confirm-order-mobile.php'));
                    $order_url = add_query_arg(array('id' => $this->page->product->id), $order_url);
                    ?>
                    <a href="<?= $order_url?>" class="btn btn-primary order-online-button">ĐẶT HÀNG ONLINE</a>
                </div>
                <div class="col-xs-12" style="text-align: center;">
                    <button class="btn btn-default order-phone-button">Gọi đặt hàng 098 900 3339</button>
                </div>
                <div class="col-xs-12">
                    <hr>
                    <div class="row">
                        <div class="col-xs-9 product-detail-shop">
                            MUA HÀNG TẠI SHOP
                            <br>
                            <a href="#">(xem Shop có hàng)</a>
                        </div>
                        <div class="col-xs-3">
                            Share +
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <?=$this->render_r_products()?>

            <!-- /.row -->
        </div>
        <script>

            $(document).ready(function(){
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