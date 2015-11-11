<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayoutClass('root');

class QdT_PageT_ProductSearch extends QdT_Layout_Root
{
    public $manufactor_list = array();
    public $manufactor = null;
    public $product_cat = null;
    public $size = null;
    public $shop_obj = null;
    public $product_cat_lv1_id = null;
    public $product_cat_lv2_id = null;

    public $size_thoitrang_list = array();

    public $size_giaydep_list = array();

    public $vnc_shops = array();

    function __construct()
    {
        parent::__construct();
        $this->product_cat_lv1_id = get_query_var('product-cat-lv1-id', null);
        $this->product_cat_lv2_id = get_query_var('product-cat-lv2-id', null);
        //reset uri, filter side by side not INCLUDED query
        $this->uri = get_permalink(Qdmvc_Helper::getPageIdByTemplate('page-templates/product-search.php'));

        $this->key_word = get_query_var('key-word', '');

        $tmp_product_cat_id = get_query_var('product-cat-id', null);
        if ($tmp_product_cat_id != null) {
            $this->product_cat = QdProductCat::GET($tmp_product_cat_id);
            if ($this->product_cat == null) {
                static::redirectPageError404();
            }
        }

        $tmp_size_id = get_query_var('size-id', null);
        if ($tmp_size_id != null) {
            $this->size = QdSize::GET($tmp_size_id);
            if ($this->size == null) {
                static::redirectPageError404();
            }
        }

        $tmp_shop_id = get_query_var('shop-id', null);
        if ($tmp_shop_id != null) {
            $this->shop_obj = QdShop::GET($tmp_shop_id);
            if ($this->shop_obj == null) {
                static::redirectPageError404();
            }
        }

        $tmp_manu_id = get_query_var('manufactor-id', null);
        if ($tmp_manu_id != null) {
            $this->manufactor = QdManufactor::GET($tmp_manu_id);
            if ($this->manufactor == null) {
                static::redirectPageError404();
            }
        }
        //gen manufactor_list
        $this->manufactor_list = array();
        $manu = new QdManufactor();
        $pcatmanu = new QdProcat2Manu();

        if ($this->product_cat != null) {
            $pcatmanu->SETRANGE('struct_level', 3);
            $pcatmanu->SETRANGE('productcat_id', $this->product_cat->id);
            foreach($pcatmanu->GETLIST() as $item){
                array_push($this->manufactor_list, $manu->GET($item->manufactor_id));
            }
        } else if ($this->manufactor != null) {
            $this->manufactor_list = $manu->GETLIST();
        } else if ($this->product_cat_lv1_id != null) {
            $pcatmanu->SETRANGE('struct_level', 1);
            $pcatmanu->SETRANGE('productcat_id', $this->product_cat_lv1_id);
            foreach($pcatmanu->GETLIST() as $item){
                array_push($this->manufactor_list, $manu->GET($item->manufactor_id));
            }
        } else if ($this->product_cat_lv2_id != null) {
            $pcatmanu->SETRANGE('struct_level', 2);
            $pcatmanu->SETRANGE('productcat_id', $this->product_cat_lv2_id);
            foreach($pcatmanu->GETLIST() as $item){
                array_push($this->manufactor_list, $manu->GET($item->manufactor_id));
            }
        } else{
            $this->manufactor_list = $manu->GETLIST();
        }
        //end gen

        $record = new QdSize();
        $record->SETRANGE('type', QdManufactor::$TYPE2_MANUFACTOR_THOITRANG);
        $this->size_thoitrang_list = $record->GETLIST();

        $record = new QdShop();
        $record->SETRANGE('active', true);
        $this->vnc_shops = $record->GETLIST();
    }

    public static function getPageName()
    {
        return 'product-search';
    }

    public static function getPageViewClass()
    {
        return 'QdT_PageT_ProductSearch_View';
    }

    public static function getPageViewMobileClass()
    {
        return 'QdT_PageT_ProductSearch_ViewMobile';
    }

    public function getPageTitle()
    {
        $obj = $this->getGeneralPanelName();

        if ($this->product_cat != null) {
            $c = $this->product_cat->getParentObj();
            if ($c != null) {
                $obj = $this->product_cat->name;
            }

            while ($c != null) {
                $obj = $c->name . ' ' . $obj;
                $c = $c->getParentObj();
            }
        }

        $obj = str_replace("{prefix}", $obj, $this->theme_root_setup->seo_title_struct);
        return $obj;
    }

    public function getPageDescription()
    {
        return 'Shop điện thoại cũ like new chính hãng, xách tay, giá rẻ, tiết kiệm, chất lượng cao, giao hàng tận nơi, bảo hành chu đáo, thanh toán khi nhận hàng.';
    }


    public function getGeneralPanelName()
    {
        if ($this->product_cat != null) {
            return $this->product_cat->name;
        }
        if ($this->manufactor != null) {
            return $this->manufactor->name;
        }
        if ($this->shop_obj != null) {
            return 'Shop ' . $this->shop_obj->name;
        }
        return 'Sản phẩm';
    }

}