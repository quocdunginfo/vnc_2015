<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 11:30 AM
 */
QdT_Library::loadLayoutClass('root');

class QdCPT_IntroductionLayout extends QdT_Layout_Root
{
    public $post_cats = array();
    public $service_id = null;
    public $banner_service_page_list = array();

    function __construct()
    {
        parent::__construct();
        $tmp = new QdPostCat();
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('type', QdPost::$TYPE_POST);
        $tmp->SETORDERBY('order', 'asc');
        $this->post_cats = $tmp->GETLIST();

        if ($this->isServicePage())
            $this->service_id = get_query_var('id');

        $tmp = new QdWidgetNav();
        $tmp->SETRANGE('active', true);
        $tmp->SETRANGE('group_id', $this->theme_root_setup->banner_service_page);
        $this->banner_service_page_list = $tmp->GETLIST();
    }

    public function isServicePage()
    {
        return false;
    }

    public function isFAQsPage()
    {
        return false;
    }

    public function isContactPage()
    {
        return false;
    }
}