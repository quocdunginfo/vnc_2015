<?php
/*
 * Version: 150607, 151024
 * */
QdT_Library::loadLayoutView('root');

class QdT_PageT_About_View extends QdT_Layout_Root_View
{
    protected function getBannerPart()
    {
        //HIDE
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


    protected function getContentPart()
    {
        foreach ($this->page->about_list as $item) {
            if ($item->tpl_type == QdAbout::$TPL_TYPE_TEXT) {
                $this->_templateText($item);
            } else if ($item->tpl_type == QdAbout::$TPL_TYPE_IMG) {
                $this->_templateImg($item);
            } else if ($item->tpl_type == QdAbout::$TPL_TYPE_TEXTIMG) {
                $this->_templateTextImg($item);
            } else if ($item->tpl_type == QdAbout::$TPL_TYPE_IMGTEXT) {
                $this->_templateImgText($item);
            }
        }
    }

    private function _templateImgText($obj)
    {
        ?>
        <!--Begin -->
        <div class="container-non-responsive" style="margin-top: 68px">
            <div class="row">
                <div class="col-xs-5 size-gioithieu">
                    <img src="<?= $obj->avatar ?>" class="vn-gioithieu-box1" alt="Cinque Terre">
                </div>
                <div class="col-xs-7 size-gioithieu">
                    <h2 class="title-center"><?= $obj->title ?></h2>

                    <div class="option-text">
                        <?= $obj->content ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="straight-full"></div> <!-- Border full màn hình-->
        <!--End-->
    <?php
    }

    private function _templateTextImg($obj)
    {
        ?>
        <!--Begin -->
        <div class="container-non-responsive" style="margin-top: 68px">
            <div class="row">
                <div class="col-xs-7 size-gioithieu">
                    <h2 class="title-center"><?= $obj->title ?></h2>

                    <div class="option-text">
                        <?= $obj->content ?>
                    </div>
                </div>
                <div class="col-xs-5 size-gioithieu">
                    <img src="<?= $obj->avatar ?>" class="vn-gioithieu-box1" alt="Cinque Terre">
                </div>
            </div>
        </div>
        <div class="straight-full"></div>
        <!--End-->
    <?php
    }

    private function _templateText($obj)
    {
        ?>
        <!--Begin -->
        <div class="container-non-responsive" style="margin-top: 68px">
            <div class="row">
                <div class="col-xs-12 size-gioithieu">
                    <h2 class="title-center"><?= $obj->title ?></h2>

                    <div class="option-text">
                        <?= $obj->content ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="straight-full"></div> <!-- Border full màn hình-->
        <!--End-->
    <?php
    }

    private function _templateImg($obj)
    {
        ?>
        <!--Begin -->
        <div class="container-non-responsive" style="margin-top: 68px">
            <div class="row">
                <div class="col-xs-12 size-gioithieu">
                    <img src="<?= $obj->avatar ?>" class="vn-gioithieu-box" alt="">
                </div>
            </div>
        </div>
        <div class="straight-full"></div> <!-- Border full màn hình-->
        <!--End-->
    <?php
    }
}