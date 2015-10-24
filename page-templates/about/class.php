<?php

QdT_Library::loadLayoutClass('root');

class QdT_PageT_About extends QdT_Layout_Root
{
    public $about_list = null;

    function __construct()
    {
        parent::__construct();
        $record = new QdAbout();
        $record->SETORDERBY('order', 'asc');
        $this->about_list = $record->GETLIST();
    }

    public static function getPageViewClass()
    {
        return "QdT_PageT_About_View";
    }

    public static function getPageViewMobileClass()
    {
        return "QdT_PageT_About_ViewMobile";
    }

    public static function getPageName()
    {
        return 'about';
    }
}