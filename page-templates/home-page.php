<?php

/*
Template Name: Trang chủ
*/
QdT_Library::loadLayout('root');

class QdT_PageT_HomePage extends QdT_Layout_Root
{
    protected $big_sale_cat = null;
    protected $big_sale_products = array();
    protected $widget_nav_list = array();
    protected $bestchoicecat_list = array();

    function __construct()
    {
        parent::__construct();

        $record = new QdWidgetNav();
        $record->SETRANGE('group_id', $this->data['theme_root_setup']->widgetnavcat_id);
        $this->widget_nav_list = $record->GETLIST();

        $pro_setup = QdProductSetup::GET();
        $record = QdBigSaleCat::GET($pro_setup->bigsalecat_id);
        $this->big_sale_cat = $record;
        $this->big_sale_products = $record->getProducts2();

        $record = new QdBestChoiceCat();
        $this->bestchoicecat_list = $record->GETLIST();

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

        <?php foreach ($this->bestchoicecat_list as $item):
        $bci_record = $item->getBestChoiceItems();
        $list2 = $bci_record->GETLIST();
        if(count($list2)==0) continue;
        ?>
        <!-- BEST CHOICE 1 -->
        <div class="container-non-responsive">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                    <h2 class="page-header">
                        <?= $item->title ?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <?php
                $count = 1;
                foreach ($list2 as $item2): ?>
                    <div class="col-xs-6 edit-right-7_5">
                        <div class="vn-choise-box" style="background: url('<?= $item2->avatar ?>');
                            background-repeat: no-repeat;
                            background-size: contain;
                            background-position: center;">
                            <div class="vn-pic-title">
                                <p>
                                    <?= $item2->title ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                    if ($count % 2 == 0) echo '<div class="col-xs-12" style="height: 25px"></div>';//trick to avoid using new row and not overlap with other item
                    $count++;
                    endforeach;
                ?>
            </div>
        </div>
        <!-- END BEST CHOICE 1 -->
    <?php endforeach; ?>

        <!-- BEST CHOICE 2
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
        END BEST CHOICE 2 -->

        <!-- BIG SALE -->
        <div class="container-non-responsive">
            <!-- Title BIG SALE -->
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                    <h2 class="page-header">
                        <?php
                        echo $this->big_sale_cat->name;
                        ?>
                    </h2>
                </div>
            </div>


            <!-- San pham 1 -->
            <div class="row" style="margin-top: 20px;">
                <?php
                $count = 1;
                foreach ($this->big_sale_products as $item):
                    $this->genProductWidget($item, 'col-xs-3 vn-sanpham-size', 'padding-left: 15px;');

                    if ($count % 4 == 0) echo '<div class="col-xs-12" style="height: 20px"></div>';//trick to avoid using new row and not overlap with other item
                    $count++;
                endforeach;
                ?>

            </div>

        </div>
        <!-- END BIG SALE -->
        <?= $this->getWidgetNavsPart() ?>
    <?php

    }

    protected function getWidgetNavsPart()
    {
        if ($this->widget_nav_list == null || empty($this->widget_nav_list)) {
            return;
        }
        ?>
        <div class="container-non-responsive" style="border-top: 1px solid rgb(203,203,203);margin-top: 20px;">

            <div class="row">
                <?php
                foreach ($this->widget_nav_list as $item):
                    ?>
                    <!-- Dịch vụ -->
                    <div class="col-xs-3">
                        <div class="vn-dichvu-title"><?= $item->title ?></div>
                        <p class="vn-dichvu">
                            <?= $item->content ?>
                        </p>

                        <div class="vn-dichvu-btn">
                            <button class="btn btn-default" type="submit" style="width:120px;"
                                    onclick="location.href='<?= $item->path ?>'">
                                <?= $item->button_text ?>
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