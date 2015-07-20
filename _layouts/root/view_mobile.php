<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/06/2015
 * Time: 10:15 PM
 * Version: 150720
 */
class QdT_Layout_Root_ViewMobile {

    protected $page = null;
    function __construct($page){
        $this->page = $page;
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
        return QdT_Library::getNoneText();
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
        $temp_p = get_template_directory_uri() . '/mobile/';
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <base href="<?= $temp_p ?>">
            <meta charset="<?php bloginfo('charset'); ?>">
            <title><?= $this->getPageTitle() ?></title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="<?= $this->getPageDescription() ?>">
            <meta name="author" content="quocdunginfo">



            <!-- Bootstrap Core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="css/back-to-top.css" rel="stylesheet">
            <link href="css/modern-business.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="css/jquery.bxslider.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            <?= QdT_Library::FERequestCompactLayout() ?>
            <?= $this->page->setPageInfoToClient() ?>

        </head>

        <body <?php body_class(); ?>>

        <?=$this->getHeaderPart()?>

        <?=$this->getContentPart()?>

        <?=$this->getFooterPart()?>

        <!-- /.container -->
        <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Disable AJAX href and form POST -->
        <script type="text/javascript">
            jQuery(document).bind("mobileinit", function () {
                $.mobile.ajaxEnabled = false;
            });
        </script>

        <!-- Back to top Jquery -->
        <script src="js/main.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/menu-fixed.js"></script>
        <!-- JQuery Mobile -->
        <!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <!-- Script to Activate the Carousel -->
        <!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <script>
            $(document).on("pagecreate",function(event)
            {
                $(window).on("orientationchange",function(event){
                    $(".johnchuong div").height($(".johnchuong div").width()*2/3);
                });
            });
            $(document).ready(function()
            {
                $('.bxslider').bxSlider();
            });
            $(document).ready(function(){
                $('.slider1').bxSlider({
                    pager: false,
                    maxSlides: 1,
                    slideMargin: 10,
                    nextSelector: '#vnc-slider-next',
                    prevSelector: '#vnc-slider-prev',
                    nextText: '<span class="vnc-control-bestchoise glyphicon glyphicon-menu-right "></span>',
                    prevText: '<span class="vnc-control-bestchoise glyphicon glyphicon-menu-left "></span>',
                });
            });
            $("#menubutton").click(function(){
                if ($("#menubutton").css("background-repeat").indexOf("repeat-x") > -1)
                {
                    if ($(".menu-xs").css("display") == "none")
                    {
                        $(".menu-xs").slideDown(200);
                    }
                    else
                    {
                        $(".menu-xs").slideUp(200);
                    }
                    return;
                }
            });
            $("#searchmenu").click(function(){

                if ($(".search-xs").css("display") == "none")
                {
                    $(".search-xs").slideDown(200);
                    $(".menu-xs").slideUp(200);
                }
                else
                {
                    $(".search-xs").slideUp(200);
                }
                return;
            });
            $("#hidemenu-xs").click(function(){
                $(".menu-xs").slideUp(200);
            });
            $("#hidesearch-xs").click(function(){
                $(".search-xs").slideUp(200);
            });
            $("#menu-1 a").click(function(){
                $("#menu-2 ul").slideUp(200);
                $("#menu-3 ul").slideUp(200);
                if ($("#menu-1-0").css("display") == "none")
                {
                    $("#menu-1-0").slideDown(200);
                }
            });
            $("#menu-1-0 a").click(function(){
                if ($("#menu-1-1-0").css("display") == "none")
                {
                    $("#menu-1-1-0").slideDown(200);
                } else {
                    $("#menu-1-1-0").slideUp(200);
                }
            });
            $("#menu-2 a").click(function(){
                $("#menu-1 ul").slideUp(200);
                $("#menu-3 ul").slideUp(200);
                if ($("#menu-2 ul").css("display") == "none")
                {
                    $("#menu-2 ul").slideDown(200);
                }
            });
            $("#menu-3 a").click(function(){
                $("#menu-1 ul").slideUp(200);
                $("#menu-2 ul").slideUp(200);
                if ($("#menu-3 ul").css("display") == "none")
                {
                    $("#menu-3 ul").slideDown(200);
                }
            });
            $("#dropdown1").click(function(){
                if($(".danhmuccon1").css("display") == "none")
                {
                    $(".danhmuccon1").slideDown(200);
                    $(".danhmuca1 span").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                }
                else
                {
                    $(".danhmuca1 span").removeClass( "glyphicon-minus" ).addClass( "glyphicon-plus" );
                    $(".danhmuccon1").slideUp(200);
                }
            });
            $("#dropdown2").click(function(){
                if($(".danhmuccon2").css("display") == "none")
                {
                    $(".danhmuccon2").slideDown(200);
                    $(".danhmuca2 span").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                }
                else
                {
                    $(".danhmuca2 span").removeClass( "glyphicon-minus" ).addClass( "glyphicon-plus" );
                    $(".danhmuccon2").slideUp(200);
                }
            });
            $("#dropdown3").click(function(){
                if($(".danhmuccon3").css("display") == "none")
                {
                    $(".danhmuccon3").slideDown(200);
                    $(".danhmuca3 span").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                }
                else
                {
                    $(".danhmuca3 span").removeClass( "glyphicon-minus" ).addClass( "glyphicon-plus" );
                    $(".danhmuccon3").slideUp(200);
                }
            });
            $(".johnchuong").load("/index.html",function(){
                $(".johnchuong div").height($(".johnchuong div").width()*2/3);
            });
            $(".fix-height-1").load(function(){
                $(".fix-height-1").height($(".fix-height-1").width()*2/3);
            });
            $(".fix-height-2").load("/index.html",function(){
                $(".fix-height-2").height($(".fix-height-2").width()*2/3);
            });
            $(".fix-height-3").load("/index.html",function(){
                $(".fix-height-3").height($(".fix-height-3").width()*2/3);
            });
        </script>
        <?php wp_footer(); ?>

        </body>

        </html>

    <?php
    }
    private function getDefaultMaterial()
    {

    }

    protected function getHeaderPart()
    {
        ?>
        <div class="container-non-responsive vnc-header">
            <div class="row">
                <div class="col-xs-8 header-left">
                    <?= $this->page->theme_root_setup->topcenter_promotion ?>
                </div>
                <div class="col-xs-4 col-non-padding header-right">
                    <?= $this->page->theme_root_setup->topright_navs ?>
                </div>
            </div>
        </div>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse" id="nav-fix"  role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <a class="navbar-toggle" id="menubutton">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <a href="index.html">
                            <div class="vnc-logo">
                                <a rel="external" href="<?= get_home_url() ?>"><img  src="<?= $this->page->data['vnc_logo'] ?>" alt="Viet Ngan Cash" height="50"></a>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-2">
                        <a id="searchmenu" href="javascript:void(0);">
                            <span class="glyphicon glyphicon-search vnc-button-search" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="container-fluid menu-xs">
                <span class="closemenu" id="hidemenu-xs" aria-hidden="true">☓</span>
                <br>
                <ul style="padding-left: 0px;">
                    <li id="menu-1">
                        <a href="javascript:void(0);">ĐIỆN THOẠI - ĐIỆN TỬ</a>
                        <ul id="menu-1-0" class="menu-css">
                            <li id="menu-1-1">
                                <a href="javascript:void(0);">Máy tính bảng</a>
                                <ul id="menu-1-1-0" class="menu-css-1">
                                    <li class="tutitem">
                                        a
                                    </li>
                                    <li class="tutitem">
                                        b
                                    </li>
                                </ul>
                            </li>
                            <li class="tutitem">
                                Điện thoại cao cấp
                            </li>
                        </ul>
                    </li>
                    <li id="menu-2">
                        <a href="javascript:void(0);">ĐỒNG HỒ TRANG SỨC</a>
                        <ul class="menu-css">
                            <li class="tutitem">
                                a
                            </li>
                            <li class="tutitem">
                                b
                            </li>
                        </ul>
                    </li>
                    <li id="menu-3">
                        <a href="javascript:void(0);">ĐỒNG HỒ TRANG SỨC</a>
                        <ul class="menu-css">
                            <li class="tutitem">
                                a
                            </li>
                            <li class="tutitem">
                                b
                            </li>
                        </ul>
                    </li>
                </ul>


            </div>
            <?php
            $search_url = get_permalink(QdT_Library::getPageIdByTemplate('page-templates/product-search.php'));

            ?>
            <div class="container-fluid search-xs">
                <form action="<?= $search_url ?>" style="text-align: center;margin-top: 1px;" method="GET">
                    <input class="vnc-inputsearch" placeholder="Nhập sản phẩm cần tìm" name="key-word"
                           value="<?= get_query_var('key-word', '') ?>">
                    <button class="btn btn-default vnc-btnsearch" type="submit">Tìm</button>
                </form>
            </div>

            <!-- /.navbar-collapse -->

            <!-- /.container -->
        </nav>

        <?=$this->getBannerPart()?>
        <?php
    }

    protected function getBannerPart()
    {
        if ($this->page->img_slider == null || empty($this->page->img_slider)) return;
        ?>
        <!-- Header Carousel -->
        <ul class="bxslider">
            <?php
            $count = 0;
            foreach ($this->page->img_slider as $item): ?>
            <li>
                <img src="<?=$item->path?>" style="height: 200px;width: 100%;"/></li>
            <?php
            $count++;
            endforeach; ?>
        </ul>
        <?php
    }

    protected function getBreadcrumbsPart()
    {
        ?>
        <?php
        //breadCrums
        $bc = $this->getBreadcrumbs();
        ?>


    <?php
    }

    protected function getFooterPart()
    {
        ?>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <button class="danhmuca1 danhmuca" type="button" id="dropdown1" data-text="Danh mục sản phẩm">
                        DANH MỤC SẢN PHẨM
                        <span class="glyphicon glyphicon-plus bs-sigh" aria-hidden="true"></span>
                    </button>
                    <div class="danhmuccon1 danhmuccon">
                        text<br>
                        text<br>
                        text<br>
                        text<br>
                        text<br>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <button class="danhmuca2 danhmuca" type="button" id="dropdown2" data-text="Danh mục sản phẩm">
                        DỊCH VỤ
                        <span class="glyphicon glyphicon-plus bs-sigh" aria-hidden="true"></span>
                    </button>
                    <div class="danhmuccon2 danhmuccon">
                        text<br>
                        text<br>
                        text<br>
                        text<br>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <button class="danhmuca3 danhmuca" type="button" id="dropdown3" data-text="Danh mục sản phẩm">
                        HƯỚNG DẪN
                        <span class="glyphicon glyphicon-plus bs-sigh" aria-hidden="true"></span>
                    </button>
                    <div class="danhmuccon3 danhmuccon">
                        text<br>
                        text<br>
                        text<br>
                        text<br>
                        text<br>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a class="danhmuc-index" href="#">MIỄN PHÍ GIAO HÀNG</a>
                </div>
            </div>
        </div>

        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a class="danhmuc-index" href="#">BẢO HÀNH ĐẾN 12 THÁNG, ĐỔI TRẢ MIỄN PHÍ 30 NGÀY</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Content -->
                    <a href="#">TÌM SHOP</a>
                    <img src="img/border-links.png">
                    <a href="#">LIÊN HỆ</a>

                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a class="danhmuc-index-1" href="#" style="font-weight: none;">HỖ TRỢ 098 900 3339</a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p style="color: black;text-align: center; font-size: 10px;">Copyright &copy; Viet Ngan Cash 2015</p>
                </div>
            </div>
        </div>
        <?php
    }

    public static function genProductWidget($item, $wrapper_class, $wrapper_style)
    {

    }

    protected function getWidgetNavsPart()
    {

    }

    protected function getPartnerLogoPart()
    {

    }

    protected static function redirectPageError404()
    {
        QdT_Library::redirectPageError404();
    }
}