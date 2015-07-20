<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/06/2015
 * Time: 10:27 PM
 */
class QdCPT_IntroductionLayout_ViewMobile extends QdT_Layout_Root_View {
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

    }

    protected function getBannerServicePage()
    {

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

    }
}