<?php

QdT_Library::loadLayoutClass('root');

class QdT_PageT_Error404 extends QdT_Layout_Root
{
    function __construct()
    {
        parent::__construct();
    }

    public static function getPageName()
    {
        return 'error-404';
    }

    public static function getPageViewClass()
    {
        return 'QdT_PageT_Error404_View';
    }

    public static function getPageViewMobileClass()
    {
        return 'QdT_PageT_Error404_ViewMobile';
    }
    public function getPageTitle()
    {
        return str_replace('{prefix}', '404 Page not found', parent::getPageTitle());
    }
}