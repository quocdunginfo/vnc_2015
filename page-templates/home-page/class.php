<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/06/2015
 * Time: 10:36 PM
 * Version: 150607
 */
QdT_Library::loadLayoutClass('root');

class QdT_PageT_HomePage extends QdT_Layout_Root
{
    public $big_sale_cat = null;
    public $big_sale_products = array();
    public $bestchoicecat_list = array();
    public $latestproduct_list = array();
    function __construct()
    {
        parent::__construct();

        $pro_setup = QdSetupProduct::GET();
        $record = QdBigSaleCat::GET($pro_setup->bigsalecat_id);
        $this->big_sale_cat = $record;
        if (!QdT_Library::isNullOrEmpty($this->big_sale_cat)) {
            $this->big_sale_products = $record->getProducts2();
        }
        $record = new QdBestChoiceCat();
        $this->bestchoicecat_list = $record->GETLIST();

        $record = new QdProduct();
        $record->SETRANGE('active', true);
        $record->SETORDERBY('date_created', 'desc');
        $record->SETLIMIT($this->theme_root_setup->latest_product_segment<=0?8:$this->theme_root_setup->latest_product_segment);
        $this->latestproduct_list = $record->GETLIST();
    }

    public static function getPageName()
    {
        return 'home-page';
    }

    public static function getPageViewClass()
    {
        return 'QdT_PageT_HomePage_View';
    }

    public static function getPageViewMobileClass()
    {
        return "QdT_PageT_HomePage_ViewMobile";
    }

}