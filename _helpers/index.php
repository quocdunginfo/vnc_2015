<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 25/02/2015
 * Time: 7:56 PM
 */
//THEME library provider

/**
 * Class QdT_Library
 * Included in functions.php
 */
class QdT_Library extends Qdmvc_Helper
{
    function __construct()
    {

    }

    private static $layout_loc = '../_layouts/';
    private static $pageT_loc = '../page-templates/';

    public static function loadLayout($name)
    {
        require_once(__DIR__ . '/' . self::$layout_loc . $name . '.php');
    }

    public static function loadPageT($name)
    {
        require_once(__DIR__ . '/' . self::$pageT_loc . $name . '.php');
    }

    public static function loadPage($name)
    {
        static::loadPageClass($name);
        require_once(__DIR__ . '/' . self::$pageT_loc . $name . '/controller.php');
    }

    public static function loadPageClass($name)
    {
        require_once(__DIR__ . '/' . self::$pageT_loc . $name . '/class.php');
    }

    public static function getNotSetText()
    {
        return '[Not set]';
    }

    public static function getNoneBreadcrumbs()
    {
        return array();
    }

    public static function FERequestCompactLayout()
    {
        ?>
        <style>
            html {
                margin-top: 0px !important;
            }

            #wpadminbar {
                display: none !important;
            }
        </style>
    <?php
    }

    protected $mapping_sample = array(
        'object_field' => 'pre_defined_tree_field',
        'object_field_2' => 'pre_defined_tree_field_2',
    );

    public static function genObjectsToTreeArray($list = array(), $mapping = array())
    {

    }

    protected $sample_tree = array(
        Array
        (
            'id' => 1,
            'title' => 'menu1',
            'url' => 'http://google.com',
            'active' => true,
            'parent_id' => 0
        ),
        Array
        (
            'id' => 2,
            'title' => 'menu11',
            'url' => 'http://yahoo.com',
            'active' => false,
            'parent_id' => 1
        ),
        Array
        (
            'id' => 3,
            'title' => 'menu111',
            'url' => 'http://facebook.com',
            'active' => false,
            'parent_id' => 2
        ),
    );

    public static function genMenuTree($items = array(), $root_uri)
    {
        //index elements by id
        foreach ($items as $item) {
            $item['subs'] = array();
            $indexedItems[$item['id']] = (object)$item;
        }

        //assign to parent
        $topLevel = array();
        foreach ($indexedItems as $item) {
            if ($item->parent_id == 0) {
                $topLevel[] = $item;
            } else {
                $indexedItems[$item->parent_id]->subs[] = $item;
            }
        }

        return static::renderMenu($topLevel, 0, $root_uri);
    }
    //recursive function
    private static function renderMenu($items, $ul_level, $root_uri)
    {
        $deep_class = array(
            'ul' => array(
                0 => 'product-list',
                1 => 'product-list-sub',
                2 => 'product'
            ),
            'li' => array(
                0 => 'product-title',
                1 => 'product-title-sub',
            ),
        );

        $render = '<ul class="'.$deep_class['ul'][$ul_level].'">';

        foreach ($items as $item) {
	        $link = add_query_arg(array('product-cat-id' => $item->id), $root_uri);

            $render .= '<li class="'.$deep_class['li'][$item->deep].'"><a href="'.$link.'">' . $item->title;
            if (!empty($item->subs)) {
                $render .= static::renderMenu($item->subs, $ul_level+1, $root_uri);
            }
            $render .= '</a></li>';
        }

        return $render . '</ul>';
    }
}