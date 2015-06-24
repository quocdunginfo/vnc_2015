<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayoutClass('introduction');
class QdT_PageT_FAQS extends QdCPT_IntroductionLayout
{
    function __construct()
    {
        parent::__construct();
    }

    public static function getPageName()
    {
        return 'faqs';
    }

    public static function getPageViewClass()
    {
        return 'QdT_PageT_FAQS_View';
    }

    public static function getPageViewMobileClass()
    {
        return 'QdT_PageT_FAQS_ViewMobile';
    }
    public function isFAQsPage()
    {
        return true;
    }


}