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
        parent::getContentPart();
    }
    private function _templateImgText($obj)
    {

    }
    private function _templateTextImg($obj)
    {

    }
    private function _templateText($obj)
    {

    }
    private function _templateImg($obj)
    {

    }
}