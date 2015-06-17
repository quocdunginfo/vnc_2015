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
    private $service_id = null;
    private $banner_service_page_list = array();

    function __construct()
    {
        parent::__construct();
        $tmp = new QdPostCat();
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('type', QdPost::$TYPE_POST);
        $tmp->SETORDERBY('order', 'asc');
        $this->post_cats = $tmp->GETLIST();

        if ($this->isServicePage())
            $this->service_id = get_query_var('id');

        $tmp = new QdWidgetNav();
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('group_id', $this->theme_root_setup->banner_service_page);
        $this->banner_service_page_list = $tmp->GETLIST();

    }

    protected function isServicePage()
    {
        return false;
    }

    protected function isFAQsPage()
    {
        return false;
    }

    protected function isContactPage()
    {
        return false;
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
                        </div>
                        <?= $this->getBannerServicePage() ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }

    protected function getBannerServicePage()
    {
        if (QdT_Library::isNullOrEmpty($this->banner_service_page_list)) return;
        foreach ($this->banner_service_page_list as $item):
            ?>
            <div class="col-xs-12" style="margin-top: 25px;">
                <a href="<?=QdT_Library::isNullOrEmpty($item->path)?QdT_Library::getNoneLink():$item->path?>" target="<?=$item->target?>">
                    <img src="<?=$item->avatar?>" alt="<?=$item->title?>" width="70%" style="margin-left: 40px;">
                </a>
            </div>
        <?php
        endforeach;

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
        <style>
            /*Cloned from JohnChuong: .vn-menu-list-sub-a:focus*/
            .vn-menu-list-sub-a-active,
            .vn-menu-list-a-active {
                color: #4C4A4A;
                font-weight: bold;
                text-decoration: none;
            }
        </style>
        <ul class="menu-list">
            <?php
            foreach ($this->post_cats as $item) :
                $childs = $item->getChilds();
                $childs = $childs->GETLIST();
                $p_active = false;
                foreach ($childs as $check_active) {
                    if ($check_active->id == $this->service_id) {
                        $p_active = true;
                        break;
                    }
                }

                ?>
                <li id="vn-menu-<?= $item->id ?>">
                    <a class="vn-menu-list-a <?= $p_active ? 'vn-menu-list-a-active' : '' ?>"
                       href="<?= QdT_Library::getNoneLink() ?>">
                        <?= $item->title ?>
                    </a>
                </li>
                <ul id="sub-menu-<?= $item->id ?>" class="sub-menu <?= $p_active ? 'sub-menu-active' : '' ?>">
                    <?php
                    foreach ($childs as $child):
                        ?>
                        <a class="vn-menu-list-sub-a <?= ($this->service_id == $child->id) ? 'vn-menu-list-sub-a-active' : '' ?>"
                           href="<?= $child->getPermalink() ?>">
                            <li>
                                <?= $child->title ?>
                            </li>
                        </a>
                    <?php
                    endforeach;
                    ?>
                </ul>
                <script>
                    (function ($) {
                        $('#vn-menu-<?=$item->id?>').click(function () {
                            $('.sub-menu').hide();
                            $('#sub-menu-<?=$item->id?>').show();
                        });
                    })(jQuery);
                </script>
            <?php
            endforeach;
            ?>

            <script>
                (function ($) {
                    $('.sub-menu-active').show();
                })(jQuery);
            </script>

            <?php
            global $post;
            $tmp = wp_get_nav_menu_items('right-menu-dichvu');
            foreach ($tmp as $item):
                $url1 = $item->url;
                $url2 = $this->uri;
                ?>

                <li>
                    <a class="vn-menu-list-a <?= strstr($url1, $url2) != false ? 'vn-menu-list-a-active' : '' ?>"
                       href="<?= $item->url ?>" target="<?= $item->target ?>">
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