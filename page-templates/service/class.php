<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayout('introduction');
class QdT_PageT_Service extends QdCPT_IntroductionLayout
{
    private $obj = null;
    function __construct()
    {
        parent::__construct();

        $this->obj = QdPost::GET(get_query_var('id'));
        if($this->obj==null)
        {
            static::redirectPageError404();
        }
    }
    protected function getContentMain()
    {
        return $this->obj->content;
    }
    protected function getContentTitle()
    {
        return $this->obj->title;
    }

    protected function isServicePage()
    {
        return true;
    }

}