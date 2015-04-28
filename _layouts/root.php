<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 25/02/2015
 * Time: 7:06 PM
 */
class QdT_Layout_Root
{
    protected $data = array();
    function __construct()
    {
        $this->data['theme_root_setup'] = QdTRootSetup::GET();
    }

    protected function getBreadcrumbs()
    {
        $t = array();
        array_push($t, array('name' => 'Trang chủ', 'url' => get_home_url()));
        return $t;
    }

    protected function getContentTitle()
    {
        return QdT_Library::getNotSetText();
    }

    protected function getContentPart()
    {
        return QdT_Library::getNotSetText();
    }
    protected function getPageTitle()
    {
        return get_bloginfo('name');
    }
    protected function getPageDescription()
    {
        return get_bloginfo('description');
    }
    public function render()
    {
        $temp_p = get_template_directory_uri() . '/';
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="<?= $temp_p ?>">
            <meta charset="<?php bloginfo('charset'); ?>">
            <title><?=$this->getPageTitle()?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="description" content="<?=$this->getPageDescription()?>">
            <meta name="author" content="quocdunginfo">
            <?php wp_head(); ?>

            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <![endif]-->

            <!-- Fav and touch icons -->
            <link rel="shortcut icon" href="img/favicon.png">

            <!-- USE WP instead -->
            <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/scripts.js"></script>

            <!-- Custom CSS -->
            <link href="css/modern-business.css" rel="stylesheet">
            <link href="css/back-to-top.css" rel="stylesheet">
            <!-- Custom CSS min 992px-->
            <link href="css/style-min-992.css" rel="stylesheet">
            <link href="css/menu-min-992.css" rel="stylesheet">
            <!-- Custom CSS min 768px-->
            <link href="css/style-min-768.css" rel="stylesheet">
            <link href="css/menu-min-768.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <?=QdT_Library::FERequestCompactLayout()?>
        </head>

        <body <?php body_class(); ?> style="/*background: rgba(0,0,0,0.1);*/">

            <?=$this->getHeaderPart()?>

        <?php
        //main content
        $this->getContentPart();
        ?>

        <?=$this->getFooterPart()?>
        <?php wp_footer(); ?>
        </body>
        </html>
    <?php
    }
    protected function getHeaderPart()
    {
        //$logo_url = ot_get_option('header_logo', 'img/logo.jpg');
        ?>
        <!-- Cash Header -->
        <div class="vn-cas-header">
            <div class="container-non-responsive">
                <div class="row">
                    <div class="col-xs-3 header-phonenumber">
                        <!-- Phone Number -->
                        <?=$this->data['theme_root_setup']->topleft_tuvan?>
                    </div>
                    <div class="col-xs-5 header-info">
                        <!-- Content -->
                        <?=$this->data['theme_root_setup']->topcenter_promotion?>
                    </div>
                    <div class="col-xs-4 header-links">
                        <!-- Content
                        <a href="#">DỊCH VỤ</a>
                        <img src="img/border-links.png">
                        <a href="#">HƯỚNG DẪN</a>
                        <img src="img/border-links.png">
                        <a href="#">LIÊN HỆ</a> -->
                        <?=$this->data['theme_root_setup']->topright_navs?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <!-- Navigation -->
        <div class="vn-cas-logo">
            <div class="container-non-responsive">
                <div class="logo">
                    <img src="img/Logo.png" style="height:113px;width: 450px;">
                </div>
            </div>
        </div>
        <div class="vn-cas-nav" id="nav-fix">
        <div class="container-non-responsive">
        <div class="navMenu expander">
        <form action="">
        <input type="search" placeholder="Tìm kiếm...">
        <ul style="padding-left: 0px;">
        <li>
            <a href="#" class="nav-links">ĐIỆN THOẠI - ĐIỆN TỬ</a>
            <ul class="vn-sub">
                <div class="container-non-responsive" style="border-bottom: 1px solid rgb(152,153,154);">
                    <div class="row">
                        <div class="col-xs-4" style="padding-right: 0px;">
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                            <div class="sub-title">
                                <h2>Vàng 4 số 9 1</h2>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao cấp</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">iPhone</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Galaxy</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">LG</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy ảnh</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavutu</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Samsung</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lumia</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavia</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info" >
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;position: relative;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Sản phẩm khác</a></div>
                                        <button class="exit-button">abc</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
        </li>
        <li>
            <a href="#" class="nav-links">THỜI TRANG - PHỤ KIỆN</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="border-bottom: 1px solid rgb(152,153,154);">
                    <div class="row">
                        <div class="col-xs-4" style="padding-right: 0px;">
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                            <div class="sub-title">
                                <h2>Vàng 4 số 9 1</h2>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao cấp</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">iPhone</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Galaxy</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">LG</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy ảnh</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavutu</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Samsung</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lumia</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavia</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info" >
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;position: relative;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Sản phẩm khác</a></div>
                                        <button class="exit-button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </ul>
            <!-- end -->
        </li>
        <li>
            <a href="#" class="nav-links">ĐỒ GIA DỤNG</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="border-bottom: 1px solid rgb(152,153,154);">
                    <div class="row">
                        <div class="col-xs-4" style="padding-right: 0px;">
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                            <div class="sub-title">
                                <h2>Vàng 4 số 9 1</h2>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao cấp</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">iPhone</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Galaxy</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">LG</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy ảnh</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavutu</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Samsung</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lumia</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavia</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info" >
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;position: relative;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Sản phẩm khác</a></div>
                                        <button class="exit-button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </ul>
            <!-- end -->
        </li>
        <li >
            <a href="#" class="nav-links">XE - PHỤ KIỆN</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="border-bottom: 1px solid rgb(152,153,154);">
                    <div class="row">
                        <div class="col-xs-4" style="padding-right: 0px;">
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                            <div class="sub-title">
                                <h2>Vàng 4 số 9 1</h2>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao cấp</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">iPhone</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Galaxy</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">LG</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy ảnh</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavutu</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Samsung</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lumia</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavia</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info" >
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;position: relative;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Sản phẩm khác</a></div>
                                        <button class="exit-button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- end -->
        </li>
        <li>
            <a href="#" class="nav-links">SẢN PHẨM KHÁC</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="border-bottom: 1px solid rgb(152,153,154);">
                    <div class="row">
                        <div class="col-xs-4" style="padding-right: 0px;">
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                            <div class="sub-title">
                                <h2>Vàng 4 số 9 1</h2>
                            </div>
                        </div>
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao cấp</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">iPhone</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Galaxy</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">LG</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy ảnh</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavutu</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Samsung</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Htc</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lumia</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Blackberry</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Vertu</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Lavia</a></div>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info" >
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a></div>
                                    </div>
                                    <div class="sub-info" style="margin-top: 5px;position: relative;">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Sản phẩm khác</a></div>
                                        <button class="exit-button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- end -->
        </li>
        </ul>
        </form>
        </div>
        <div style="display: none; width: 980px; height: 40px; float: left;"></div>
        </div>
        </div>
        <!-- End Navigation -->
        <hr>
        <?=$this->getBannerPart()?>
        <?php
    }
    protected function getBannerPart()
    {
        //$slider = Qdmvc_Helper::getSlider(ot_get_option('banner_meta_slider_shortcode', ''));
        ?>
        <!-- Header Carousel -->
        <header id="myCarousel" class="carousel slide ibs-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators ibs_list_slider">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="margin-top: 0px; ">
                <div class="item active">
                    <div class="fill" style="background-image:url('img/a.jpg');"></div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('img/b.jpg');"></div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('img/c.jpg');"></div>
                </div>
            </div>

        </header>
        <?php
    }
    protected function getBreadcrumbsPart()
    {
        ?>
        <div class="container" id="qd_container_breadcrums">
            <style>
                #qd_container_breadcrums {
                    margin-top: 25px;
                }

                #qd_container_breadcrums .row {
                    margin: 0 auto;
                }
            </style>
            <div class="row clearfix" style="width: 960px;">
                <!-- BreadCrums -->
                <div class="col-xs-12 column">
                    <style>
                        .breadcrumb {
                            font-size: 12px; /*14px fail!fuck*/
                        }

                        .breadcrumb li a {
                            color: inherit;
                            text-decoration: none;
                            text-transform: lowercase;
                        }

                        .breadcrumb > li.active, li {
                            color: inherit;
                        }


                    </style>
                    <?php
                    //breadCrums
                    $bc = $this->getBreadcrumbs();
                    ?>
                    <ol class="breadcrumb" style="background: none !important; padding: 0px; margin: 0px !important;">
                        <?php

                        foreach ($bc as $item):
                            ?>
                            <li><a href="<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ol>
                </div>
                <!-- end BreadCrums -->
            </div>
            <!-- Content Title -->

            <div class="row clearfix" style="width: 960px;">
                <div class="col-xs-12 column">
                    <?php
                    if($this->getContentTitle()!=''):
                        ?>
                        <h3 style="padding: 30px 0px 20px 0px; margin: 0px; font-weight: bold; font-size: 24px">
                            <?= $this->getContentTitle() ?>
                        </h3>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php
    }
    protected function getFooterPart()
    {
        ?>
        <!-- Begin Footer -->
        <div class="vn-cas-footer">
            <!-- Begin Footer Email-->
            <div class="footer-email">
                <div class="container-non-responsive">
                    <!-- Begin Title Email-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="title-email">NHẬN TIN ƯU ĐÃI</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-email">
                            <button class="email-button"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Begin Footer Center-->
            <div class="footer-center">
                <div class="container-non-responsive ">
                    <div class="row">
                        <div class="col-lg-3 col-xs-2">
                            <ul style="margin-top: 68px;padding-left: 0px;">
                                <li style="font-weight: bold;"> CÔNG TY </li>
                                <li> <a href="#" class="vn-ft-links">GIỚI THIỆU </a></li>
                                <li> <a href="#" class="vn-ft-links">TUYỂN DỤNG </a></li>
                                <li> <a href="#" class="vn-ft-links">LIÊN HỆ </a></li>
                            </ul>
                        </div>
                        <div class="col-xs-3">
                            <ul style="margin-top: 68px;padding-left: 0px;">
                                <li style="font-weight: bold;"> DỊCH VỤ </li>
                                <li> <a href="#" class="vn-ft-links">BÁN LẺ VÀ SỈ </a></li>
                                <li> <a href="#" class="vn-ft-links">THU MUA VÀ THANH LÝ </a></li>
                                <li> <a href="#" class="vn-ft-links">DỊCH VỤ KÝ GỬI </a></li>
                                <li> <a href="#" class="vn-ft-links">DỊCH VỤ TÀI CHÍNH </a></li>
                            </ul>
                        </div>
                        <div class="col-xs-3">
                            <ul style="margin-top: 68px;padding-left: 0px;">
                                <li style="font-weight: bold;"> HỖ TRỢ </li>
                                <li> <a href="#" class="vn-ft-links">TÌM CỬA HÀNG </a></li>
                                <li> <a href="#" class="vn-ft-links">HƯỚNG DẪN GIAO DỊCH </a></li>
                                <li> <a href="#" class="vn-ft-links">GIAO HÀNG - THANH TOÁN </a></li>
                                <li> <a href="#" class="vn-ft-links">BẢO HÀNH - ĐỔI TRẢ </a></li>
                                <li> <a href="#" class="vn-ft-links">FAQs</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-xs-4 ">
                            <ul style="margin-top: 68px;padding-left: 0px;">
                                <li style="font-weight: bold;"> GỌI HỖ TRỢ - GIAO DỊCH </li>
                                <li style="margin-bottom: 5px;font-size: 17px;color: rgb(255,255,255); font-weight: bold;"> 098 900 3339 - 08 6679 7779 </li>
                                <li style="font-size: 14px;color: rgb(231,231,232);">Từ 8:00 - 22:00 hằng ngày.</li>
                                <li>
                                    <a class="vn-icon" target="_blank" href="https://www.facebook.com/vietngancash">
                                        <img class="footer-center-img"src="img/fa-1.png" onmouseover="this.src='img/fa-2.png'" onmouseout="this.src='img/fa-1.png'">
                                    </a>
                                    <a class="vn-icon" target="_blank"  href="https://plus.google.com/">
                                        <img class="footer-center-img"src="img/go-1.png" onmouseover="this.src='img/go-2.png'" onmouseout="this.src='img/go-1.png'">
                                    </a>
                                    <a class="vn-icon" target="_blank" href="https://twitter.com/">
                                        <img class="footer-center-img" src="img/tw-1.png" onmouseover="this.src='img/tw-2.png'" onmouseout="this.src='img/tw-1.png'">
                                    </a>
                                    <a class="vn-icon" target="_blank" href="https://www.youtube.com/">
                                        <img class="footer-center-img" src="img/yo-1.png" onmouseover="this.src='img/yo-2.png'" onmouseout="this.src='img/yo-1.png'">
                                    </a>
                            </ul>
                            </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row logo-thanhtoan">
                        <a class="vn-icon" target="_blank" href="#">
                            <img class="footer-center-img-tt" src="img/visa.jpg" alt="">
                        </a>
                        <a class="vn-icon" target="_blank" href="#">
                            <img class="footer-center-img-tt" src="img/master.png" alt="">
                        </a>
                        <a class="vn-icon" target="_blank" href="#">
                            <img class="footer-center-img-tt" src="img/paypal.jpg" alt="">
                        </a>
                        <a class="vn-icon" target="_blank" href="#">
                            <img class="footer-center-img-tt" src="img/visa-e.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Begin Footer Bottom-->
            <div class="footer-bottom">
                <div class="container-non-responsive">
                    <hr style="margin-bottom: 0px; margin-top: 0px;border-top: 1px solid rgb(107,107,107);">
                    <div class="row">
                        <div class="col-xs-8">
                            <?=$this->data['theme_root_setup']->bottomleft_footer_note?>
                            <!--
                            <p style="padding-top: 20px;font-size: 12px;color: black;">
                                CÔNG TY TNHH FINEWAY<br>
                                180 Trương CÔng Định, Phường 14, Tân Bình, TP.HCM <br>
                                Tel: 08 6679 7779 - 08 6678 7779 <img src="img/border-links.png" style="margin: 0px 5px;"> www.vietngan.vn<br>

                            </p>
                            <p style="font-size: 12px;margin-bottom: 0px;color: black;">
                                © 2015 - Việt Ngân Cash <img src="img/border-links.png" style="margin: 0px 5px;"> Điều khoản sử dụng
                            </p> -->
                        </div>
                        <div class="col-xs-4">
                            <div class="copyright">
                                <img src="img/ban-quyen.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Footer -->
        <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/text.js"></script>
        <script src="js/main.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <!-- Script to Activate the Carousel -->
        <script>

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
        <?php
    }
}