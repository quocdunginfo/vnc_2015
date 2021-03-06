<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayoutClass('introduction');

class QdT_PageT_Contact extends QdCPT_IntroductionLayout
{
    public $obj = null;
    public $contacts = array();

    function __construct()
    {
        parent::__construct();

        $tmp = new QdContact();
        $tmp->SETRANGE('active', true);
        $tmp->SETORDERBY('order', 'asc');

        $this->contacts = $tmp->GETLIST();
    }

    public function loadScript()
    {
        QdJqwidgets::loadSinglePluginJS("form2js.js");
    }

    public static function getPageName()
    {
        return 'contact';
    }

    public static function getPageViewClass()
    {
        return 'QdT_PageT_Contact_View';
    }

    public static function getPageViewMobileClass()
    {
        return 'QdT_PageT_Contact_ViewMobile';
    }

    public function isContactPage()
    {
        return true;
    }
    public function getPageTitle()
    {
        global $post;
        return str_replace('{prefix}', $post->post_title, parent::getPageTitle());
    }
}