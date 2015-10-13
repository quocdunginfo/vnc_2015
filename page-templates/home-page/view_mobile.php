<?php
/*
 * Version: 150720
 * */
QdT_Library::loadLayoutViewMobile('root');

class QdT_PageT_HomePage_ViewMobile extends QdT_Layout_Root_ViewMobile
{
    protected function getBannerPart()
    {
        parent::getBannerPart();
    }

    protected function getBreadcrumbsPart()
    {
        //HIDE
    }


    protected function loadScript()
    {
        //QdJqwidgets::loadSinglePluginJS("form2js.js");
        //QdJqwidgets::loadSinglePluginJS("ajax-loader.js");
    }

    private function getBigSalePart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->big_sale_cat)) return;
        if (QdT_Library::isNullOrEmpty($this->page->big_sale_products)) return;
        ?>
        <!-- Big Sale -->
        <div class="container">

            <!-- Marketing Icons Section -->
            <div class="row big-sale">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        <?= $this->page->big_sale_cat->name; ?>
                    </h4>
                </div>

                <?php
                $count = 1;
                foreach ($this->page->big_sale_products as $item):
                    $this->genProductWidget($item, 'col-xs-6 johnchuong', 'padding-right: 5px;');

                    if ($count % 2 == 0) echo '<div class="col-xs-12" style="padding-left: 5px; margin-top: 20px;"></div>';//trick to avoid using new row and not overlap with other item
                    $count++;
                endforeach;
                ?>

                <!--
                <div class="col-xs-6 johnchuong" style="padding-left: 5px;">
                    <div class="bs-pro" style="background: url('img/panner1.jpg');
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
                <div class="col-xs-12" style="padding-left: 5px; margin-top: 20px;"></div>
                <div class="col-xs-6 johnchuong">
                    <div class="bs-pro" style="background: url('img/panner1.jpg');
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

                        <b class="bs-sale">1.000 USD (50% OFF)</b>
                    </p>
                </div>


                <div class="col-xs-12">
                    <p style="text-align: center; font-style: italic; ">Xem tiếp</p>
                </div>
                -->
            </div>
            <!-- /.row -->
        </div>
        <!-- Portfolio Section -->
    <?php
    }
    private function getLatestProductsPart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->latestproduct_list)) return;
        ?>
        <!-- Big Sale -->
        <div class="container">

            <!-- Marketing Icons Section -->
            <div class="row big-sale">
                <div class="col-lg-12">
                    <h4 class="page-header">
                        <?=$this->page->theme_root_setup->latest_product_label?>
                    </h4>
                </div>

                <?php
                $count = 1;
                foreach ($this->page->latestproduct_list as $item):
                    $this->genProductWidget($item, 'col-xs-6 johnchuong', 'padding-right: 5px;');

                    if ($count % 2 == 0) echo '<div class="col-xs-12" style="padding-left: 5px; margin-top: 20px;"></div>';//trick to avoid using new row and not overlap with other item
                    $count++;
                endforeach;
                ?>

                <!--
                <div class="col-xs-6 johnchuong" style="padding-left: 5px;">
                    <div class="bs-pro" style="background: url('img/panner1.jpg');
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
                <div class="col-xs-12" style="padding-left: 5px; margin-top: 20px;"></div>
                <div class="col-xs-6 johnchuong">
                    <div class="bs-pro" style="background: url('img/panner1.jpg');
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

                        <b class="bs-sale">1.000 USD (50% OFF)</b>
                    </p>
                </div>


                <div class="col-xs-12">
                    <p style="text-align: center; font-style: italic; ">Xem tiếp</p>
                </div>
                -->
            </div>
            <!-- /.row -->
        </div>
        <!-- Portfolio Section -->
    <?php
    }

    protected function getContentPart()
    {
        ?>
        <!-- Page Content -->

        <?= $this->getBestChoicePart() ?>

        <?= $this->getBigSalePart() ?>

        <?= $this->getLatestProductsPart() ?>


    <?php
    }

    private function getBestChoicePart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->bestchoicecat_list)) return;

        foreach ($this->page->bestchoicecat_list as $item):
            $bci_record = $item->getBestChoiceItems();
            $list2 = $bci_record->GETLIST();
            if (QdT_Library::isNullOrEmpty($list2)) continue;
            ?>
            <!-- Best Choise -->
            <div class="container">

                <!-- Marketing Icons Section -->
                <div class="row big-sale">
                    <div class="col-lg-12">
                        <h4 class="page-header">
                            <?= $item->title ?>
                        </h4>
                    </div>
                    <div class="col-xs-12" style="position: relative;">
                        <div id="bxsliderBestChoice">
                            <?php
                            $count = 1;
                            foreach ($list2 as $item2): ?>
                                <div class="slide-bestchoise qd-fix-height">
                                    <img src="<?= $item2->avatar ?>" style="width: 100%;"/>

                                    <div class="sup-bestchoise">
                                        <p <?php if ($item2->title_color != '') echo "style='color: {$item2->title_color}'"; ?>>
                                            <?= $item2->title ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                $count++;
                            endforeach; ?>
                            <!--
                            <div class="slide-bestchoise" id="fix-height-2">
                                <img src="img/panner1.jpg" style="width: 100%;"/>

                                <div class="sup-bestchoise">
                                    <p>
                                        MÁY TÍNH
                                    </p>
                                </div>
                            </div>
                            <div class="slide-bestchoise" id="fix-height-3">
                                <img src="img/panner1.jpg" style="width: 100%;"/>

                                <div class="sup-bestchoise">
                                    <p>
                                        XE HƠI
                                    </p>
                                </div>
                            </div> -->
                        </div>
                        <div class="outside">
                            <div class="col-xs-1" id="vnc-slider-prev"></div>
                            <div class="col-xs-1" id="vnc-slider-next"></div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('#bxsliderBestChoice').bxSlider({
                                pager: false,
                                maxSlides: 1,
                                slideMargin: 10,
                                nextSelector: '#vnc-slider-next',
                                prevSelector: '#vnc-slider-prev',
                                nextText: '<span class="vnc-control-bestchoise glyphicon glyphicon-menu-right "></span>',
                                prevText: '<span class="vnc-control-bestchoise glyphicon glyphicon-menu-left "></span>'
                            });
                        });
                    </script>
                </div>
                <!-- /.row -->
            </div>

        <?php
        endforeach;
    }
}