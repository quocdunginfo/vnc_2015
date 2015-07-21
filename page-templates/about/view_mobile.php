<?php
/*
 * Version: 150720
 * */
QdT_Library::loadLayoutViewMobile('root');
class QdT_PageT_About_ViewMobile extends QdT_Layout_Root_ViewMobile
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


    protected function getContentPart()
    {
        ?>
        <!-- bread crumb -->
        <div class="container" id="johnchuong">
            <div class="row" style="margin-top: 10px;">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Trang chủ</a></li>
                        <li class="active">Giới thiệu</li>
                    </ol>
                </div>
            </div>

            <?php
            foreach($this->page->about_list as $item)
            {
                $this->_templateImgText($item);
            }
            ?>
        </div>
    <?php
    }
    private function _templateImgText($obj)
    {
        ?>
        <!-- Marketing Icons Section -->
        <div class="row gioithieu" >
            <div class="col-xs-12 size-gioithieu">
                <h2 class="title-center"><?=$obj->title?></h2>
                <div class="option-text">
                    <?=$obj->content?>
                </div>
                <?php if($obj->avatar != ''):?>
                <img src="<?=$obj->avatar?>" class="vn-gioithieu-box1" alt="">
                <?php endif; ?>
            </div>
        </div>

        <!-- /.row -->
        <?php
    }
}