<?php

QdT_Library::loadLayout('root');

class QdT_PageT_ProductDetail extends QdT_Layout_Root
{
    private $product = null;
    private $product_imgs = array();
    private $size = null;

    function __construct()
    {
        parent::__construct();

        $this->product = QdProduct::GET(get_query_var( 'id', 0));
        if($this->product!=null)
        {
            $this->manufactor = QdManufactor::GET($this->product->manufacturer_id);
            $tmp = $this->product->getImages();
            $this->product_imgs = $tmp->GETLIST();
            $this->size = QdSize::GET($this->product->size_id);
        }
    }

    protected function loadScript()
    {
        //QdJqwidgets::loadSinglePluginJS("form2js.js");
        //QdJqwidgets::loadSinglePluginJS("ajax-loader.js");
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
        <div class="container-non-responsive carousel content">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Điện thoại - Thiết bị di động</li>
                    <li class="active">iphone</li>
                    <li class="active">iphone 5s 32Gb quốc tế màu trắng</li>
                </ol>
            </div>
        </div>


        <div class="row">

        <!--Left-->
        <div class="col-xs-7">
            <!-- Limited -->
            <div id="bigPic">
                <?php
                $count = 0;
                foreach($this->product_imgs as $item):
                ?>
                <img src="<?=$item->path?>" alt="" style="display: <?=$count==0?'block':'none'?>; opacity: 1; z-index: 1;">
                <?php
                $count++;
                endforeach; ?>
                <!--
                <img src="imgs/2.jpg" alt="" style="display: block; opacity: 1; z-index: 1;">
                <img src="imgs/3.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/4.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/5.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/6.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/7.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/8.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/9.jpg" alt="" style="display: none; opacity: 1; z-index: 1;">
                <img src="imgs/10.jpg" alt="" style="display: none; opacity: 1; z-index: 1;"> -->
            </div>


            <ul id="thumbs">
                <?php
                $count = 1;
                foreach($this->product_imgs as $item):
                ?>
                <li rel="<?=$count?>" class=""><img src="<?=$item->path?>" alt=""></li>
                <?php
                $count++;
                endforeach; ?>
                <!--
                <li rel="2" class="active"><img src="imgs/3_thumb.jpg" alt=""></li>
                <li rel="3" class=""><img src="imgs/4_thumb.jpg" alt=""></li>
                <li rel="4" class=""><img src="imgs/5_thumb.jpg" alt=""></li>
                <li rel="5" class=""><img src="imgs/6_thumb.jpg" alt=""></li>
                <li rel="6" class=""><img src="imgs/7_thumb.jpg" alt=""></li>
                <li rel="7" class=""><img src="imgs/8_thumb.jpg" alt=""></li>
                <li rel="8" class=""><img src="imgs/9_thumb.jpg" alt=""></li>
                <li rel="9" class=""><img src="imgs/10_thumb.jpg" alt=""></li>
                <li rel="10" class=""><img src="imgs/2_thumb.jpg" alt=""></li> -->
            </ul>

            <!-- Limited -->
        </div>

        <!--Right-->
        <div class="col-xs-5 product-detail-right">
        <div class="row">
            <div class="col-xs-12">
                <div class="vn-title">
                    <?=$this->product!=null?$this->product->name:''?>
                </div>
            </div>
        </div>

        <!-- detail product 1-->
        <div class="row">
            <div class="col-xs-12">
                <div class="vn-model">
                    <div class="title">
                        No.
                    </div>
                    <div class="id">
                        <?=$this->product!=null?$this->product->code:''?>
                    </div>
                </div>

                <div class="vn-symbol">|</div>
                <div class="vn-hang">
                    <div class="title">
                        Hãng :
                    </div>
                    <div class="id">
                        <?=$this->manufactor!=null?$this->manufactor->name:''?>
                    </div>
                </div>
            </div>
        </div>

        <!-- detail product 2-->
        <div class="row price-tag">
            <div class="col-xs-12">
                <div class="price">
                    <?=$this->product!=null?$this->product->price:''?> VND
                </div>
                <div class="vn-symbol">|</div>
                <div class="size">
                    <?=$this->size!=null?$this->size->code:''?>
                </div>
                <div class="vn-symbol">|</div>
                <div class="off">
                    2.500.000 VND (OFF 50%)
                </div>
                <div class="vn-symbol">|</div>
                <div class="state">
                    Tạm hết hàng
                </div>
            </div>
        </div>

        <hr style="margin-top: 5px; margin-bottom: 10px;">

        <!-- Detail -->
        <div class="row">
            <div class="col-xs-12">
                <div class="vn-product-detail">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#mo-ta">MÔ TẢ SẢN PHẨM</a></li>
                        <li><div class="vn-symbol">|</div></li>
                        <li><a data-toggle="tab" href="#bao-hanh">ĐỔI TRẢ - BẢO HÀNH</a></li>
                        <li><div class="vn-symbol">|</div></li>
                        <li><a data-toggle="tab" href="#giao-hang">GIAO HÀNG VÀ THANH TOÁN</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="mo-ta" class="tab-pane fade in active" style="margin-top: 15px;">
                        <?=$this->product!=null?$this->product->description:''?>
                        <!-- <div class="ps"> ĐẶT MUA TẶNG: bAO DA KAKA TRỊ GIÁ 300K !</div> -->
                    </div>
                    <div id="bao-hanh" class="tab-pane fade" style="margin-top: 15px;">
                        <?=$this->product!=null?$this->product->doitra_baohanh:''?>
                    </div>
                    <div id="giao-hang" class="tab-pane fade" style="margin-top: 15px;">
                        <?=$this->product!=null?$this->product->giaohang_thanhtoan:''?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button đặt hàng -->
        <div class="row">
            <div class="col-xs-6" data-role="main">
                <button type="button" class="btn btn-primary order-online-button" data-toggle="modal" data-target="#myModal">                            ĐẶT HÀNG ONLINE
                </button>

                <!-- Modal -->
                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <div class="vn-modal-title">THÔNG TIN ĐẶT HÀNG CỦA BẠN</div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-5" style="height:450px;">
                                        <div>
                                            <div class="vn-sanpham-box-modal" style="background: url('img/curre99nt.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                                            </div>
                                            <p class="p-edit-1">
                                                IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                                            </p>
                                            <p class="p-edit-1">
                                                <b style="color: rgb(131,131,132);font-weight: normal;">5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b><br>
                                                <b style="color: #C80815;">1.000 USD ( Giá Shock !!! )</b>
                                            </p>
                                        </div>
                                        <div style="position: absolute;bottom: 15px;left: 15px;font-size: 16px; ">Gọi hỗ trợ <b>098 900 3338</b></div>
                                    </div>
                                    <div class="col-xs-7">
                                        <form>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <input type="radio" name="sex" value="male" checked=""><label style="margin-left: 5px;">Anh</label>
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="radio" name="sex" value="female"><label style="margin-left: 5px;">Chị</label>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="name" required="" placeholder="Vui lòng nhập họ tên" data-validation-required-message="Please enter your name." aria-invalid="false">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="name" required="" placeholder="Vui lòng nhập số điện thoại" data-validation-required-message="Please enter your name." aria-invalid="false">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="name" required="" placeholder="Vui lòng nhập Email (nếu có)" data-validation-required-message="Please enter your name." aria-invalid="false">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <textarea rows="10" cols="100" class="form-control" id="message" required="" placeholder="Vui lòng ghi yêu cầu (nếu có)" data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" aria-invalid="false"></textarea>
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">XÁC NHẬN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->

                <!-- Modal 2 -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-7">
                                        <div class="vn-modal1-title">ĐẶT HÀNG THÀNH CÔNG</div>
                                        <div class="col-xs-12 column" style="margin-top: 15px;">
                                            <p>Cám ơn <b>Anh Hoàng</b> đã cho chúng tôi cơ hội đuọc phục vụ</p>
                                            <p>Nhân viên tư vấn sẽ gọi xác nhận đơn d8ặt mua sản phẩm
                                                <b>IPhone 5S 32GB Quốc Tế màu trắng xanh vàng</b>
                                                trong thời gian sớm nhất
                                            </p>
                                            <p>Khi cần hỗ trợ, vui lòng gọi số <b>098 900 3339</b></p>
                                            <p>Xin chân thành cảm ơn !</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-5">
                                        <div class="vn-nhanvien-box-modal" style="background: url('img/nhanvien.jpg');
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

            </div>
            <div class="col-xs-6">
                <a class="btn btn-default order-phone-button" href="#myPopup" data-rel="popup">Gọi đặt hàng 098 900 3339</a>
            </div>

        </div>
        <hr style="margin-top: 5px; margin-bottom: 10px;">

        <!-- Shop hàng -->
        <div class="row">
            <div class="col-xs-8">
                MUA HÀNG TẠI SHOP
                <br>
                <a href="#" class="product-detail-shop">( xem Shop có hàng )</a>

            </div>
            <div class="col-xs-4">
                Share +
            </div>
        </div>
        </div>
        </div>
        <!-- Có thể bạn thích -->
        <div class="row">
            <div class="col-xs-12">
                <h3 class="page-header">CÓ THỂ BẠN THÍCH</h3>
            </div>
        </div>

        <!-- Like 1-->
        <div class="row">
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
        </div>

        <!-- Like 1-->
        <div class="row">
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
            <div class="col-xs-3">
                <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                </div>
            </div>
        </div>
        </div>
        <script>

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })


            var currentImage;
            var currentIndex = -1;
            var interval;
            function showImage(index){
                if(index < $('#bigPic img').length){
                    var indexImage = $('#bigPic img')[index]
                    if(currentImage){
                        if(currentImage != indexImage ){
                            $(currentImage).css('z-index',2);
                            clearTimeout(myTimer);
                            $(currentImage).fadeOut(250, function() {
                                myTimer = setTimeout("showNext()", 3000);
                                $(this).css({'display':'none','z-index':1})
                            });
                        }
                    }
                    $(indexImage).css({'display':'block', 'opacity':1});
                    currentImage = indexImage;
                    currentIndex = index;
                    $('#thumbs li').removeClass('active');
                    $($('#thumbs li')[index]).addClass('active');
                }
            }

            function showNext(){
                var len = $('#bigPic img').length;
                var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
                showImage(next);
            }

            var myTimer;

            $(document).ready(function() {
                myTimer = setTimeout("showNext()", 3000);
                showNext(); //loads first image
                $('#thumbs li').bind('click',function(e){
                    var count = $(this).attr('rel');
                    showImage(parseInt(count)-1);
                });
            });


        </script>

    <?php
    }
}