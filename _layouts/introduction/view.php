<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/06/2015
 * Time: 10:27 PM
 * Version: 150607, 151024, 151101, 160204
 */
QdT_Library::loadLayoutView('root');

class QdCPT_IntroductionLayout_View extends QdT_Layout_Root_View
{

    protected function getContentMain()
    {
        return QdT_Library::getNoneText();
    }
    /*
     * VN160204:
     * Breadcrumbs: margin bottom = 20px
     * */
    protected function getContentPart()
    {
        ?>
        <div class="container-non-responsive" style="margin-top: 15px">
            <div class="row chitiet-breadcrumb">
                <div class="col-xs-12">
                    <?= $this->getBreadcrumbsPart() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 vn-lienhe-left">
                    <!-- title-->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="title" style="text-transform: uppercase">
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
        if (QdT_Library::isNullOrEmpty($this->page->banner_service_page_list)) return;
        foreach ($this->page->banner_service_page_list as $item):
            ?>
            <div class="col-xs-12" style="margin-top: 25px;">
                <a href="<?= QdT_Library::isNullOrEmpty($item->path) ? QdT_Library::getNoneLink() : $item->path ?>"
                   target="<?= $item->target ?>">
                    <img src="<?= $item->avatar ?>" alt="<?= $item->title ?>" width="70%" style="margin-left: 40px;">
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
            foreach ($this->page->post_cats as $item) :
                $childs = $item->getChilds();
                $childs = $childs->GETLIST();
                $p_active = false;
                foreach ($childs as $check_active) {
                    if ($check_active->id == $this->page->service_id) {
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
                        <a class="vn-menu-list-sub-a <?= ($this->page->service_id == $child->id) ? 'vn-menu-list-sub-a-active' : '' ?>"
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
                $url2 = $this->page->uri;
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
    /*
    protected function getBreadcrumbs()
    {
        $tmp = parent::getBreadcrumbs(); // TODO: Change the autogenerated stub
        array_push($tmp, array('name'=>'Dịch vụ', 'url' => QdT_Library::getNoneLink()));
        return $tmp;
    }*/

}