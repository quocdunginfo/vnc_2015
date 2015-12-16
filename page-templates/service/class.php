<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayoutClass('introduction');

class QdT_PageT_Service extends QdCPT_IntroductionLayout
{
    public $obj = null;

    function __construct()
    {
        parent::__construct();

        $this->obj = QdPost::GET(get_query_var('id'));

        if ($this->obj == null || $this->obj->type != QdPost::$TYPE_POST) {
            static::redirectPageError404();
        }
    }

    public static function getPageName()
    {
        return 'service';
    }

    public static function getPageViewClass()
    {
        return 'QdT_PageT_Service_View';
    }

    public static function getPageViewMobileClass()
    {
        return 'QdT_PageT_Service_ViewMobile';
    }

    public function isServicePage()
    {
        return true;
    }
    public function getPageTitle()
    {
        return str_replace('{prefix}', $this->obj->title, parent::getPageTitle());
    }
}