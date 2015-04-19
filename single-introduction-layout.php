<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:19 AM
 */
QdT_Library::loadLayout('introduction');
class QdCPT_TrangGioiThieu extends QdCPT_IntroductionLayout
{
    private $obj = null;
    function __construct(){
        if(have_posts())
        {
            the_post();
            $this->obj = get_post(get_the_ID());
        }
    }
    protected function getBreadcrumbs()
    {
        $t = parent::getBreadcrumbs();
        array_push($t, array('url' => QdT_Library::getNoneLink(), 'name' => 'Giới thiệu'));
        array_push($t, array('url' => get_permalink($this->obj->ID), 'name' => $this->obj->post_title));
        return $t;
    }
    protected function getMenu()
    {
        get_sidebar('right-menu');
    }
    protected function getContentMain()
    {
        return $this->obj->post_content;
    }

    protected function getContentTitle()
    {
        return $this->obj->post_title;
    }

}
$obj = new QdCPT_TrangGioiThieu();
$obj->render();