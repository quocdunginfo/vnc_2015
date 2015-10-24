<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:12 PM
 * Version: 150607, 151024
 */
QdT_Library::loadLayoutView('introduction');

class QdT_PageT_FAQS_View extends QdCPT_IntroductionLayout_View
{
    protected function getContentMain()
    {
        global $post;
        return $post->post_content;
    }

    protected function getContentTitle()
    {
        global $post;
        return $post->post_title;
    }

    protected function getBreadcrumbs()
    {
        global $post;
        $tmp = parent::getBreadcrumbs();
        array_push($tmp, array('name' => $post->post_title, 'url' => $this->page->uri));
        return $tmp;
    }
}