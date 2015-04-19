<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/02/2015
 * Time: 10:19 AM
 */
QdT_Library::loadLayout('introduction');
class QdT_TrangDichVu extends QdCPT_IntroductionLayout{
    private $obj =null;
    function __construct()
    {
        if(have_posts())
        {
            the_post();
            $this->obj = get_post(get_the_ID());
        }
    }
    protected function getBreadcrumbs()
    {
        $t = parent::getBreadcrumbs();
        array_push($t, array('url' => QdT_Library::getNoneLink(), 'name' => 'Dịch vụ'));
        array_push($t, array('url' => get_permalink($this->obj->ID), 'name' => $this->obj->post_title));
        return $t;
    }
    protected function getMenu()
    {
        get_sidebar('right-menu-dichvu');
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
$obj = new QdT_TrangDichVu();
$obj->render();