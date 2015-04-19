<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 11:30 AM
 */
QdT_Library::loadLayout('root');
class QdCPT_IntroductionLayout extends QdT_Layout_Root
{
    function __construct()
    {

    }
    protected function getMenu()
    {
        return QdT_Library::getNotSetText();
    }
    protected function getContentMain()
    {
        return QdT_Library::getNotSetText();
    }
    protected function getContentPart()
    {
            ?>
            <div class="container" id="qd_container_content" style="margin-top: 10px;">
                <!-- WIDGET -->
                <div class="row clearfix">
                    <!-- CONTENT -->
                    <div class="col-xs-9 column">
                        <?= $this->getContentMain() ?>
                    </div>
                    <!-- END CONTENT -->
                    <!-- PRODUCT CATEGORIES -->
                    <div id="qd_nav_danhmuc" class="col-xs-3 column" style="border-left: solid 1px #d8d8d8;">
                        <style>
                            #qd_nav_danhmuc ul {
                                padding: 0;
                            }

                            #qd_nav_danhmuc a {
                                color: inherit;
                                text-decoration: none;
                            }

                            #qd_nav_danhmuc a:hover {
                                text-decoration: underline;
                            }

                            #qd_nav_danhmuc ul li {
                                line-height: 30px;
                            }

                            #qd_nav_danhmuc ul li.current-menu-item {
                                font-weight: bold;
                            }
                            #qd_nav_danhmuc li {
                                list-style: none !important;
                            }
                        </style>
                        <?= $this->getMenu() ?>
                        <!--
                        <ul style="margin-top: -8px">
                            //Alway active for 1st element
                            <li class="current-menu-item">GIỚI THIỆU</li>
                            <li class="current-menu-item"><a href="#">Giới thiệu chung</a></li>
                            <li>Định hướng phát triển</li>
                            <li>Tầm nhìn giá trị</li>
                            <li>Liên hệ</li>
                        </ul>
                        -->
                    </div>
                    <!-- END PRODUCT CATEGORIES -->
                </div>
            </div>
        <?php
    }
}