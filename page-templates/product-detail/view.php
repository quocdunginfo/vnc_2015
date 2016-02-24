<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:32 PM
 * Version: 150607, 151024, 151101, 160204
 */
QdT_Library::loadLayoutView('root');

class QdT_PageT_ProductDetail_View extends QdT_Layout_Root_View
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
        <?= $this->dialog() ?>
        <div class="container-non-responsive carousel content" style="margin-top: 5px">
            <div class="row chitiet-breadcrumb">
                <div class="col-xs-12">
                    <?= $this->getBreadcrumbsPart() ?></div>
            </div>

            <div class="row">

                <!--Left-->
                <div class="col-xs-6 edit-slider-768">
                    <!-- Limited -->
                    <?php
                    //1st Img in list
                    $first_img_path = '';
                    if(count($this->page->product_imgs) > 0){
                        $first_img_path = $this->page->product_imgs[0]->path;
                    }
                    ?>
                    <div id="mainImage" class="test" style="background: url('<?=$first_img_path?>');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                    </div>


                    <script>
                        (function ($) {
                            $(document).ready(function () {
                                $('#mainImage').click(function () {
                                    var _img = $(this).css('background-image');
                                    $('#picture-Popup .vn-popup-slide-sanpham').css('background-image', _img);
                                    $('#picture-Popup').modal('show');
                                });
                            });
                        })(jQuery);
                    </script>
                    <!-- Modal 3 -->
                    <div class="modal fade" id="picture-Popup" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="">
                                <div class="modal-header" style="border-bottom: 0px;">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="vn-popup-slide-sanpham" style="background-image: url('img/current 3.jpg');
                                                                                        background-repeat: no-repeat;
                                                                                        background-size: contain;
                                                                                        background-position: center;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                    <div id="divContainer">
                        <?php
                        $count = 1;
                        foreach ($this->page->product_imgs as $item):
                            ?>
                            <img src="<?= $item->path ?>" class="imgStyle">
                            <?php
                            $count++;
                        endforeach; ?>
                    </div>

                    <!-- Limited -->
                </div>

                <!--Right-->
                <div class="col-xs-6 product-detail-right">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="vn-title">
                                <?= $this->page->product->name ?>
                            </div>
                        </div>
                    </div>

                    <!-- detail product 1-->
                    <div class="row">
                        <div class="col-xs-12">
                            <?php if (!QdT_Library::isNullOrEmpty($this->page->product) && $this->page->product->code != ''): ?>
                                <div class="vn-model">
                                    <div class="title">
                                        No.
                                    </div>
                                    <div class="id" style="padding-left: 5px; white-space: nowrap">
                                        <?= $this->page->product->code ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!QdT_Library::isNullOrEmpty($this->page->manufactor) && $this->page->manufactor->name != ''): ?>
                                <div class="vn-symbol">|</div>
                                <div class="vn-hang">
                                    <div class="title">
                                        Hãng :
                                    </div>
                                    <div class="id" style="white-space: nowrap">
                                        <?= $this->page->manufactor->name ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- detail product 2-->
                    <div class="row price-tag">
                        <div class="col-xs-12">
                            <?php
                            //Has promotion
                            if ($this->page->product->_price_discount > 0):
                                ?>
                                <div class="price">
                                    <STRIKE class="mau-gia-ban-dau">
                                        <?= number_format($this->page->product->price, 0, '.', ',') ?> VND
                                    </STRIKE>
                                </div>
                                <div class="vn-symbol">|</div>
                                <div class="off mau-gia-km">
                                    <?= number_format($this->page->product->_price_discount, 0, '.', ',') ?> VND
                                </div>
                            <?php else: ?>
                                <div class="off mau-gia-km">
                                    <?= number_format($this->page->product->price, 0, '.', ',') ?> VND
                                </div>
                            <?php endif; ?>

                            <?php
                            //Stock Status
                            if (!QdT_Library::isNullOrEmpty($this->page->product) && ($this->page->product->stock_status != QdProduct::$STOCK_DF)):
                                $options = QdProduct::getFieldOptions('stock_status', 'vi-VN');

                                ?>
                                <div class="vn-symbol">|</div>
                                <div class="state">
                                    <?= $options[$this->page->product->stock_status] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr style="margin-top: 10px; margin-bottom: 10px;">

                    <!-- Detail -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="vn-product-detail">
                                <ul class="nav nav-tabs" style="white-space: nowrap !important;">
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
                                <div id="bao-hanh" class="tab-pane fade product-list2  edit-font-size"
                                     style="margin-top: 15px;">
                                    <?= $this->page->product->doitra_baohanh ?>
                                </div>
                                <div id="giao-hang" class="tab-pane fade product-list2  edit-font-size"
                                     style="margin-top: 15px;">
                                    <?= $this->page->product->giaohang_thanhtoan ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button đặt hàng -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="ps"></div>
                        </div>
                        <div class="col-xs-5" data-role="main" style="padding-right: 0px;">
                            <button type="button" class="btn btn-primary order-online-button" data-toggle="modal"
                                    data-target="#myModal"> <?= $this->page->product_order_setup->btn_dathang ?>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header vn-modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                            <div
                                                class="vn-modal-title"><?= $this->page->product_order_setup->order_form_title ?></div>
                                        </div>
                                        <div class="modal-body vn-modal-body">
                                            <div class="row">
                                                <div class="col-xs-5 column" style="height:330px; margin-left: 25px;">
                                                    <div>
                                                        <div class="vn-sanpham-box-modal edit-size-sanpham-popup"
                                                             style="background: url('<?= $this->page->product->avatar ?>');
                                                                 background-repeat: no-repeat;
                                                                 background-size: contain;
                                                                 background-position: center;">
                                                        </div>
                                                        <p class="p-edit-1">
                                                            <?= $this->page->product->name ?>
                                                        </p>

                                                        <p class="p-edit-1">
                                                            <?php if ($this->page->product->_price_discount > 0): ?>

                                                            <STRIKE class="mau-gia-ban-dau">
                                                                <?= number_format($this->page->product->price, 0, '.', ',') ?> VND
                                                             </STRIKE>
                                                             </br>
                                                            <b class="mau-gia-km font-chu-giakm">
                                                             <?= number_format($this->page->product->_price_discount, 0, '.', ',') ?> VND
                                                             </b>
                                                            <?php else: ?>
                                                                <b class="mau-gia-km font-chu-giakm">
                                                                    <?= number_format($this->page->product->price, 0, '.', ',') ?>
                                                                    VND
                                                                </b>
                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                    <div style="position: absolute;bottom: 5px;font-size: 16px; ">
                                                        <?= $this->page->product_order_setup->support_phone ?>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6"
                                                     style="height:330px; padding-left: 0px; padding-right: 0px; ">
                                                    <form id="formOrder" onsubmit="return false">
                                                        <input type="hidden" name="product_id"
                                                               value="<?= $this->page->product->id ?>">
                                                        <input type="hidden" name="count"
                                                               value="1">

                                                        <div class="row">
                                                            <?php
                                                            if (QdT_Library::isNullOrEmpty($this->page->cookie_customer['sex'])) {
                                                                $this->page->cookie_customer['sex'] = "1";
                                                            }
                                                            ?>

                                                            <div class="col-xs-12">
                                                                <input type="radio" name="sex"
                                                                       value="1" <?= $this->page->cookie_customer['sex'] == "1" ? "checked" : "" ?>><label
                                                                    style="margin-left: 5px; margin-bottom: 10px;">Anh</label>
                                                                <input type="radio" name="sex"
                                                                       value="0" <?= $this->page->cookie_customer['sex'] == "0" ? "checked" : "" ?>
                                                                       style="margin-left: 15px;"><label
                                                                    style="margin-left: 5px;">Chị</label>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <input type="text" class="form-control"
                                                                       name="customer_name"
                                                                       placeholder="Vui lòng nhập họ tên"
                                                                       aria-invalid="false"
                                                                       oninvalid="this.setCustomValidity('Họ tên bắt buộc nhập')"
                                                                       oninput="this.setCustomValidity('')"
                                                                       value="<?php
                                                                       if (!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_name'])) {
                                                                           echo $this->page->cookie_customer['customer_name'];
                                                                       }
                                                                       ?>"
                                                                       required autofocus>

                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <input type="text" class="form-control"
                                                                       name="customer_phone"
                                                                       placeholder="Vui lòng nhập số điện thoại"
                                                                       oninvalid="this.setCustomValidity('Số điện thoại bắt buộc nhập')"
                                                                       oninput="this.setCustomValidity('')"
                                                                       aria-invalid="false"
                                                                       value="<?php
                                                                       if (!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_phone'])) {
                                                                           echo $this->page->cookie_customer['customer_phone'];
                                                                       }
                                                                       ?>"
                                                                       required>

                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                                                <input type="text" class="form-control"
                                                                       name="customer_email"
                                                                       placeholder="Vui lòng nhập Email (nếu có)"
                                                                       oninvalid="this.setCustomValidity('Email bắt buộc nhập')"
                                                                       oninput="this.setCustomValidity('')"
                                                                       value="<?php
                                                                       if (!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_email'])) {
                                                                           echo $this->page->cookie_customer['customer_email'];
                                                                       }
                                                                       ?>"
                                                                       aria-invalid="false" required>

                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>
                                                        <div class="control-group form-group">
                                                            <div class="controls">
                                            <textarea rows="10" cols="100" class="form-control" name="mota"
                                                      placeholder="Vui lòng ghi yêu cầu (nếu có)"
                                                      maxlength="999" style="resize:none"
                                                      aria-invalid="false"></textarea>

                                                                <p class="help-block"></p>
                                                            </div>
                                                        </div>

                                                        <button id="formOrderDoneConfirm" type="submit"
                                                                class="btn btn-primary"
                                                                style="width:120px;">XÁC NHẬN
                                                        </button>
                                                        <img id="qd-loading" src="img/loading.gif"
                                                             style="width: 30px; height: 30px; display: none; margin-left: 10px">
                                                        <script>
                                                            MYAPP.PageInfo.DataPort_front_product_order_port = '<?=Qdmvc_Helper::getDataPortPath('front/product_order_port')?>';
                                                            (function ($) {
                                                                $(document).ready(function () {
                                                                    $('#formOrderDoneConfirm').click(function () {
                                                                        //send data to DataPort
                                                                        var json = form2js("formOrder", ".", false, null, true);
                                                                        //validate
                                                                        if (json.customer_name == '') return;
                                                                        if (json.customer_phone == '') return;
                                                                        if (json.customer_email == '') return;
                                                                        if (json.sex == '') return;

                                                                        console.log(json);
                                                                        //save to cookie
                                                                        Cookies.set('customer', json, {expires: 7});
                                                                        //lock button
                                                                        $("#formOrderDoneConfirm").attr("disabled", true);

                                                                        //show progress bar
                                                                        $('#qd-loading').css('display', 'inline-block');
                                                                        $.post(MYAPP.PageInfo.DataPort_front_product_order_port, {
                                                                            submit: "submit",
                                                                            action: "insert",
                                                                            data: json
                                                                        })
                                                                            .done(function (data) {
                                                                                //data JSON
                                                                                console.log(data);
                                                                                //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                                                                var customer_sex = $("#formOrder input:radio[name=sex]:checked").val();

                                                                                customer_sex = customer_sex == 1 ? "Anh" : (customer_sex == 0 ? "Chị" : "");
                                                                                var customer_name = $("#formOrder input[name=customer_name]").val();
                                                                                //...
                                                                                //if OK
                                                                                var tpl = MYAPP.TplReplace(["{customer_title}", "{customer_name}", "{product_name}"], [customer_sex, customer_name, MYAPP.PageInfo.product_obj[0].name], MYAPP.PageInfo.product_order_setup[0].form_order_done_tpl);


                                                                                $("#formOrderDoneTpl").html(tpl);
                                                                                $("#myModal1").modal('show');

                                                                            })
                                                                            .fail(function (data) {
                                                                                console.log(data);
                                                                            })
                                                                            .always(function () {
                                                                                //release lock
                                                                                $("#formOrderDoneConfirm").removeAttr("disabled");
                                                                                $('#qd-loading').css('display', 'none');
                                                                            });
                                                                    });
                                                                });
                                                            })(jQuery);
                                                        </script>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->

                            <!-- Modal 2 -->
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height:275px;">
                                        <div class="modal-header" style="border-bottom: 0px;">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body vn-modal-a">
                                            <div class="row">
                                                <div class="col-xs-7" style="height:232px;">
                                                    <div
                                                        class="vn-modal1-title"><?= $this->page->product_order_setup->form_order_done_title ?></div>
                                                    <div id="formOrderDoneTpl" class="col-xs-12"
                                                         style="margin-top: 20px;">

                                                    </div>
                                                </div>
                                                <div class="col-xs-5" style="padding-left: 0px;">
                                                    <div class="vn-nhanvien-box-modal"
                                                         style="background: url('<?= $this->page->product_order_setup->form_order_done_avatar ?>');
                                                             background-position: center;
                                                             background-repeat: no-repeat;
                                                             background-size: contain;
                                                             height: 215px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->

                        </div>
                        <div class="col-xs-7 vn-chitiet-922">
                            <button class="btn btn-default order-phone-button" data-rel="popup">
                                <?= $this->page->product_order_setup->btn_goidathang ?>
                            </button>
                        </div>

                    </div>
                    <hr style="margin-top: 20px; margin-bottom: 10px;">

                    <!-- Shop hàng -->
                    <div class="row">
                        <div class="col-xs-5" style="font-weight: bold;">
                            MUA HÀNG TẠI SHOP
                            <br>
                            <a href="<?= QdT_Library::getNoneLink() ?>" class="product-detail-shop">( xem Shop có hàng
                                )</a>

                        </div>
                        <div class="col-xs-5 edit-768">
                            <?php
                            $tmp = QdT_Library::getFullURLFromAbsPath($_SERVER["REQUEST_URI"]);
                            //$tmp = "[addtoany url='{$tmp}' title='Some Example Page']";
                            $tmp = "[feather_share url='{$tmp}']";
                            echo do_shortcode($tmp);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->render_r_products() ?>

        </div>
        <script>

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            });

            var interval;


            $(document).ready(function () {
                $('#divContainer img').on({
                    mouseover: function () {
                        $(this).css({
                            'cursor': 'pointer',
                            'border-Color': 'grey'
                        });
                    },
                    click: function () {
                        var imageUrl = $(this).attr('src');
                        $('#mainImage').css({
                            'background-image': 'url(' + imageUrl + ')',
                            'background-size': 'contain',
                            'background-position': 'center',
                            'background-repeat': 'no-repeat'
                        });
                    }
                });
            });


        </script>

    <?php
    }

    protected function render_r_products()
    {
        if (empty($this->page->r_products)) return;
        ?>
        <!-- Có thể bạn thích -->
        <div class="row">
            <div class="col-xs-12">
                <h3 class="page-header">CÓ THỂ BẠN THÍCH</h3>
            </div>
        </div>

        <!-- Like 1-->
        <div class="row">
            <!-- <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div> -->
            <?php
            $count = 1;
            foreach ($this->page->r_products as $item):
                static::genProductWidget($item, 'col-xs-3', '');
                if ($count % 4 == 0) echo '<div class="col-xs-12" style="height: 20px"></div>';//trick to avoid using new row and not overlap with other item
                $count++;
            endforeach;
            ?>
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