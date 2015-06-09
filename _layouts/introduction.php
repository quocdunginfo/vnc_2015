<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 11:30 AM
 * Version: 150607
 */
QdT_Library::loadLayout('root');

class QdCPT_IntroductionLayout extends QdT_Layout_Root
{
    private $post_cats = array();

    function __construct()
    {
        parent::__construct();
        $tmp = new QdPostCat();
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('type', QdPost::$TYPE_POST);
        $tmp->SETORDERBY('order', 'asc');
        $this->post_cats = $tmp->GETLIST();
    }

    protected function getContentMain()
    {
        return QdT_Library::getNoneText();
    }

    protected function getContentPart()
    {
        ?>
        <div class="container-non-responsive" style="margin-top: 30px">
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->getBreadcrumbsPart() ?></div>
            </div>
            <div class="row">
                <div class="col-xs-8 vn-lienhe-left">
                    <!-- title-->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title">
                                <small>
                                    <?= $this->getContentTitle() ?>
                                </small>
                            </h2>
                        </div>
                    </div>

                    <!-- title-->
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-xs-12">
                            <?= $this->getContentMain() ?>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 100px;">
                        <div class="col-xs-12">
                            Share +
                        </div>
                    </div>

                </div>
                <div class="col-xs-4 vn-lienhe-right">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            //get_sidebar('right-menu-dichvu');
                            $this->genRightMenu();
                            ?>
                            <!--
                            <ul class="menu-list">
                                <li id="vn-menu-dichvu"><a class="vn-menu-list-a" href="javascript:void(0)">DỊCH VỤ</a>
                                </li>
                                <ul id="sub-menu-dichvu" class="sub-menu">
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ thu mua và thanh lý</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ ký gửi</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ tài chính</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ bán sỉ và lẻ</li>
                                    </a>
                                </ul>
                                <li id="vn-menu-huongdan"><a class="vn-menu-list-a" href="javascript:void(0)">HƯỚNG
                                        DẪN</a></li>
                                <ul id="sub-menu-huongdan" class="sub-menu">
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ thu mua và thanh lý</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ ký gửi</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ tài chính</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ bán sỉ và lẻ</li>
                                    </a>
                                </ul>
                                <li id="vn-menu-giaohang"><a class="vn-menu-list-a" href="javascript:void(0)">GIAO HÀNG
                                        - THANH TOÁN</a></li>
                                <ul id="sub-menu-giaohang" class="sub-menu">
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ thu mua và thanh lý</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ ký gửi</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ tài chính</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ bán sỉ và lẻ</li>
                                    </a>
                                </ul>
                                <li id="vn-menu-baohanh"><a class="vn-menu-list-a" href="javascript:void(0)">BẢO HÀNH -
                                        ĐỔI TRẢ</a></li>
                                <ul id="sub-menu-baohanh" class="sub-menu">
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ thu mua và thanh lý</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ ký gửi</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ tài chính</li>
                                    </a>
                                    <a class="vn-menu-list-sub-a" href="#">
                                        <li>Dịch vụ bán sỉ và lẻ</li>
                                    </a>
                                </ul>
                                <li id="sub-menu-faqs"><a class="vn-menu-list-a" href="javascript:void(0)">CÂU HỎI
                                        THƯỜNG GẶP</a></li>
                                <li id="sub-menu-lienhe"><a class="vn-menu-list-a" href="javascript:void(0)">LIÊN HỆ</a>
                                </li>
                                <li id="sub-menu-timshop"><a class="vn-menu-list-a" href="javascript:void(0)">TÌM
                                        SHOP</a></li>
                            </ul>
                            -->
                        </div>
                        <div class="col-xs-12" style="margin-top: 25px;">
                            <img src="img/Arithry_Flex_SP.gif" alt="Smiley face" width="70%" style="margin-left: 40px;">
                        </div>
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <img src="img/Vien_uong_Fairen_SP1.gif" alt="Smiley face" width="70%"
                                 style="margin-left: 40px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    protected function getContentTitle()
    {
        return QdT_Library::getNoneText();
    }

    protected function getBannerPart()
    {
        //HIDE
    }

    private function genRightMenu()
    {
        ?>
        <ul class="menu-list">
            <?php
            foreach ($this->post_cats as $item) :
                ?>
                <li id="vn-menu-<?= $item->id ?>">
                    <a class="vn-menu-list-a" href="javascript:void(0)">
                        <?= $item->title ?>
                    </a>
                </li>
                <ul id="sub-menu-<?= $item->id ?>" class="sub-menu">
                    <?php
                    $childs = $item->getChilds();
                    $childs = $childs->GETLIST();
                    foreach ($childs as $child):
                        ?>
                        <a class="vn-menu-list-sub-a" href="<?= $child->getPermalink() ?>">
                            <li>
                                <?= $child->title ?>
                            </li>
                        </a>
                    <?php
                    endforeach;
                    ?>
                </ul>
                <script>
                    (function($){
                        $(document).ready(function(){
                            $('#vn-menu-<?=$item->id?>').click(function(){
                                $('.sub-menu').hide();
                                $('#sub-menu-<?=$item->id?>').show();
                            });
                        });
                    })(jQuery);
                </script>
            <?php
            endforeach;
            ?>


            <?php
            $tmp = wp_get_nav_menu_items('right-menu-dichvu');
            foreach($tmp as $item):
            ?>

            <li>
                <a class="vn-menu-list-a" href="<?=$item->url?>" target="<?=$item->target?>">
                    <?= $item->title ?>
                </a>
            </li>

            <?php
            endforeach;
            ?>

        </ul>
    <?php
    }
}