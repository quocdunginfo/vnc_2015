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
    function __construct()
    {
        parent::__construct();
    }
    protected function getContentMain()
    {
        return QdT_Library::getNoneText();
    }
    protected function getContentTitle()
    {
        return QdT_Library::getNoneText();
    }
}