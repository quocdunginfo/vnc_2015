<?php

/*
Template Name: Trang chủ
*/
QdT_Library::loadLayout('root');

class QdT_PageT_HomePage extends QdT_Layout_Root
{
    function __construct()
    {
        parent::__construct();

        $record = new QdWidgetNav();
        $record->SETRANGE('group_id', $this->data['theme_root_setup']->widgetnavcat_id);
        $this->data['widget_nav_list'] = $record->GETLIST();
    }

    protected function getBreadcrumbs()
    {
        return array();
    }

    protected function getContentTitle()
    {
        return '';
    }

    protected function getContentPart()
    {
        ?>
        <!-- BEST CHOICE 1 -->
        <div class="container-non-responsive">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                    <h2 class="page-header">BEST CHOICE</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 edit-right-7_5">
                    <div class="vn-choise-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                        <div class="vn-pic-title">
                            <p>ĐIỆN THOẠI VÀ PHỤ KIỆN</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 edit-left-7_5">
                    <div class="vn-choise-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                        <div class="vn-pic-title">
                            <p>THỜI TRANG</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;">
                <div class="col-xs-6 edit-right-7_5">
                    <div class="vn-choise-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                        <div class="vn-pic-title">
                            <p>TRANG SỨC CAO CẤP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEST CHOICE 1 -->

        <!-- BEST CHOICE 2 -->
        <div class="container-non-responsive">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                    <h2 class="page-header">BEST CHOICE</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 edit-right-7_5">
                    <div class="vn-choise-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                        <div class="vn-pic-title">
                            <p>ĐIỆN THOẠI VÀ PHỤ KIỆN</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 edit-left-7_5">
                    <div class="vn-choise-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                        <div class="vn-pic-title">
                            <p>THỜI TRANG</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 25px;">
                <div class="col-xs-6 edit-right-7_5">
                    <div class="vn-choise-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                        <div class="vn-pic-title">
                            <p>TRANG SỨC CAO CẤP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END BEST CHOICE 2 -->

        <!-- BIG SALE -->
        <div class="container-non-responsive">
            <!-- Title BIG SALE -->
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                    <h2 class="page-header">BIG SALE</h2>
                </div>
            </div>


            <!-- San pham 1 -->
            <div class="row" style="margin-top: 20px;">
                <div class="col-xs-3 vn-sanpham-size" style="padding-left: 15px;">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                    </div>
                    <p class="p-edit-1">
                        IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                    </p>

                    <p class="p-edit-1">
                        <b style="color: rgb(131,131,132);font-weight: normal;">5.000.000 VND</b><img
                            src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                        <b style="color: #C80815;">1.000 USD ( Giá Shock !!! )</b>
                    </p>
                </div>
                <div class="col-xs-3 vn-sanpham-size">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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
                <div class="col-xs-3 vn-sanpham-size">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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
                <div class="col-xs-3 vn-sanpham-size" style="padding-right: 15px;">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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

            <!-- San pham 2 -->
            <div class="row" style="margin-top: 20px;">
                <div class="col-xs-3 vn-sanpham-size" style="padding-left: 15px;">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                    </div>
                    <p class="p-edit-1">
                        IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                    </p>

                    <p class="p-edit-1">
                        <b style="color: rgb(131,131,132);font-weight: normal;">5.000.000 VND</b><img
                            src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                        <b style="color: #C80815;">1.000 USD ( Giá Shock !!! )</b>
                    </p>
                </div>
                <div class="col-xs-3 vn-sanpham-size">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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
                <div class="col-xs-3 vn-sanpham-size">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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
                <div class="col-xs-3 vn-sanpham-size" style="padding-right: 15px;">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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

            <!-- San pham 3 -->
            <div class="row" style="margin-top: 20px;" style="padding-left: 15px;">
                <div class="col-xs-3 vn-sanpham-size">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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
                <div class="col-xs-3 vn-sanpham-size">
                    <div class="vn-sanpham-box" style="background: url('img/sanpham-index.png');
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
        </div>
        <!-- END BIG SALE -->
        <?=$this->getWidgetNavsPart()?>
    <?php

    }
    protected function getWidgetNavsPart()
    {
        if($this->data['widget_nav_list']==null || empty($this->data['widget_nav_list']))
        {
            return;
        }
        ?>
        <div class="container-non-responsive" style="border-top: 1px solid rgb(203,203,203);margin-top: 20px;">

            <div class="row">
                <?php
                foreach($this->data['widget_nav_list'] as $item):
                ?>
                    <!-- Dịch vụ -->
                    <div class="col-xs-3">
                        <div class="vn-dichvu-title"><?=$item->title?></div>
                        <p class="vn-dichvu">
                            <?=$item->content?>
                        </p>

                        <div class="vn-dichvu-btn">
                            <button class="btn btn-default" type="submit" style="width:120px;" onclick="location.href='<?=$item->path?>'">
                                <?=$item->button_text?>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Dịch vụ 4
                <div class="col-xs-3">
                    <div class="vn-dichvu-title">TÀI CHÍNH</div>
                    <p class="vn-dichvu">
                        Thu mua đồ hiệu, đồ qua sử dụng, đồ mới 100%.
                    </p>

                    <div class="vn-dichvu-btn">
                        <button class="btn btn-default" type="submit" style="width:120px;">DỊCH VỤ</button>
                    </div>
                </div> -->
            </div>
        </div>
<?php
    }
}

$obj = new QdT_PageT_HomePage();
$obj->render();