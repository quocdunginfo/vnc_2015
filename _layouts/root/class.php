<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 25/02/2015
 * Time: 7:06 PM
 * Version: 150607
 */
class QdT_Layout_Root
{
    public $uri = null;
    public $data = array();
    public $img_slider = array();
    public $widget_nav_list = array();
    public $partner_list = array();
    public $theme_root_setup = null;
    public $product_setup = null;
    public $cookie_customer = array();
    public $main_menus = array();

    function __construct()
    {
        //get cookie
        if (isset($_COOKIE["customer"])) {
            $tmp = $_COOKIE["customer"];
            $tmp = str_replace('\\"', '"', $tmp);
            $this->cookie_customer = json_decode($tmp, true);
        } else {
            $this->cookie_customer = array();
        }

        $this->uri = $_SERVER['REQUEST_URI'];

        $this->theme_root_setup = QdTRootSetup::GET();
        $this->product_setup = QdSetupProduct::GET();

        $record = new QdWidgetNav();
        $record->SETRANGE('group_id', $this->theme_root_setup->social_icon);
        $this->data['social_icon'] = $record->GETLIST();

        $this->data['vnc_logo'] = $this->theme_root_setup->vnc_logo;


        $tmp = QdImgGrp::GET($this->theme_root_setup->img_slider);
        if ($tmp != null) {
            $tmp = $tmp->getImgs();
            $tmp->SETRANGE('active', true);
            $this->img_slider = $tmp->GETLIST();
        }

        //Widget NAV
        $record = new QdWidgetNav();
        $record->SETRANGE('group_id', $this->theme_root_setup->widgetnavcat_id);
        $this->widget_nav_list = $record->GETLIST();
        //END Widget NAV

        //Partner
        $record = new QdPartner();
        $record->SETRANGE('group_id', $this->theme_root_setup->partnergrp_id);
        $record->SETRANGE('active', true);
        $record->SETORDERBY('order', 'asc');
        $this->partner_list = $record->GETLIST();

        //Main menu
        $record = new QdMenu();
        $record->SETRANGE('active', true);
        $record->SETORDERBY('order', 'asc');

        $this->main_menus = $record->GETLIST();

        //END Partner
        $this->loadScript();
    }

    public function setPageInfoToClient()
    {
        ?>
        <style>
            .breadcrumb > li {
                white-space: nowrap; /*Fix breadcrumbs new line broken*/
            }
        </style>
        <script>
            var MYAPP = MYAPP || {};
            MYAPP.PageInfo = {};
            MYAPP.TplReplace = function (replace_from, replace_to, tpl) {
                var i = 0;
                var re = tpl;
                for (i = 0; i < replace_from.length; i++) {
                    re = re.replace(replace_from[i], replace_to[i], re);
                }
                return re;
            };
            MYAPP.isValidEmail = function (emailAddress) {
                var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
                return pattern.test(emailAddress);
            };
        </script>
    <?php
    }

    public function render()
    {
        $tmp = null;
        $c = '';
        if (QdT_Library::isMobile()) {
            //load view
            $c = static::getPageViewMobileClass();
            QdT_Library::loadPageViewMobile(static::getPageName());
        } else {
            //load view
            $c = static::getPageViewClass();
            QdT_Library::loadPageView(static::getPageName());
        }
        $tmp = new $c($this);
        $tmp->render();
    }

    public function loadScript()
    {
        QdJqwidgets::loadSinglePluginJS("form2js.js");
        QdJqwidgets::loadSinglePluginJS("js.cookie.js");
    }

    public static function getPageViewClass()
    {
        return "QdT_Layout_Root_View";
    }

    public static function getPageViewMobileClass()
    {
        return "QdT_Layout_Root_ViewMobile";
    }

    public static function getPageName()
    {
        return '';
    }

    public static function redirectPageError404()
    {
        QdT_Library::redirectPageError404();
    }

    public function getPageTitle()
    {
        $obj = str_replace("{prefix}", 'Mua bán, ký gửi đồ hiệu', $this->theme_root_setup->seo_title_struct);
        return $obj;
    }

    public function getPageDescription()
    {
        $obj = str_replace("{prefix}", '', $this->theme_root_setup->seo_description_struct);
        if (trim($obj) == '') {
            return get_bloginfo('description');
        }
        return $obj;
    }

    public function getPageKeywords()
    {
        $obj = str_replace("{prefix}", '', $this->theme_root_setup->seo_keywords_struct);
        if (trim($obj) == '') {
            return '';
        }
        return $obj;
    }
}
