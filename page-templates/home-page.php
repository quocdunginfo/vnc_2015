<?php

/*
Template Name: Trang chủ
*/
QdT_Library::loadLayout('root');
class QdT_PageT_HomePage extends QdT_Layout_Root
{
    function __construct()
    {

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
        <!-- CONTENT -->
        <div class="container" id="qd_container_content" style="margin-top: 55px">
            <!-- WIDGET -->
            <div class="row clearfix">
                <style>
                    .qd-image-box {
                        width: 449px;
                        height: 280px;
                        position: relative;
                        border: solid 1px #CACACA;
                        margin-bottom: 65px;
                    }
                    .qd-image-box .qd-image-box-bg {
                        width: 100%;
                        height: 100%;
                        position: absolute;
                    }

                    .qd-left {
                        float: right;
                    }

                    .qd-image-box-right {
                        float: left;
                    }

                    .qd-image-box-caption {
                        line-height: 60px;
                        text-align: center;
                        vertical-align: middle;
                        width: 100%;
                        height: 55px;
                        position: absolute;
                        bottom: 0px;
                        left: 0px;
                        background: rgba(0, 0, 0, 0.4);
                        color: white;
                        font-size: 18px;
                    }
                </style>
                <?php
                $count = 0;
                foreach (QdProductCat::all(array('order' => '`order` asc')) as $item):
                    ?>
                    <div class="col-xs-6 column">
                        <a href="<?= $item->getPermalink() ?>">
                            <div class="qd-image-box">
                                <div class="qd-image-box-bg" style="background-color: white"></div>
                                <div class="qd-image-box-bg <?= $count % 2 == 0 ? 'qd-left' : 'qd-right' ?>"
                                     style="background: url(<?= $item->avatar ?>); background-repeat: no-repeat;
                                         background-size: contain;
                                         background-position: center;">
                                    <div class="qd-image-box-caption">
                                        <?= $item->name ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <!-- END WIDGET -->

        </div>
        <!-- END CONTENT-->
    <?php
    }
}
$obj = new QdT_PageT_HomePage();
$obj->render();