<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 25/02/2015
 * Time: 7:06 PM
 */
class QdT_Layout_Root
{
    function __construct()
    {

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
            <meta name="viewport" content="width=960px, initial-scale=1.0">
            <meta name="description" content="<?=$this->getPageDescription()?>">
            <meta name="author" content="quocdunginfo">
            <?php wp_head(); ?>

            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">

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

            <!-- CSS memu -->
            <link rel="stylesheet" href="plugin/cssmenu/styles.css">
            <script src="plugin/cssmenu/script.js"></script>
            <!-- end CSS memu -->

            <!-- hr tag -->
            <style>
                hr {
                    height: 0;
                    margin: 0 auto;
                    width: 100%;
                }

                hr.long-grey-thin-line {
                    border-top: 1px solid #dbdbdb;
                }

                hr.long-red-line {
                    border-top: 5px solid #db243c;
                }
            </style>
            <!-- end hr tag -->
            <!-- Image box for 3 modules -->
            <style>
                .qd-image-box {
                    position: relative;
                    border: solid 1px #CACACA;
                    cursor: pointer;
                }
                .qd-image-box .qd-image-box-bg {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    background-color: white;
                }
            </style>
        </head>

        <body <?php body_class(); ?> style="background: rgba(0,0,0,0.1);">
        <style>
            .container {
                width: 100%;
                padding: 0;
                margin: 0 auto;
            }

            #qd_container_content {
                width: 960px !important;
            }
        </style>
        <div class="container" id="qd_container_header">
            <style>
                #qd_container_header .row,
                #qd_container_content .row {
                    margin: 0 auto;
                }
            </style>
            <?=$this->getHeaderPart()?>
            <?=$this->getBannerPart()?>
        </div>
        <?=$this->getBreadcrumbsPart()?>

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
        $logo_url = ot_get_option('header_logo', 'img/logo.jpg');
        ?>
        <!-- LINE RED -->
        <hr class="long-red-line">
        <!-- HEADER -->
        <div class="row clearfix" style="width: 960px; margin: 0 auto">
            <!-- LOGO -->
            <div class="col-xs-3 column" style="padding-top: 5px;">
                <img src="<?= $logo_url ?>" style="max-width: 100%; height:70px">
            </div>
            <!-- END LOGO -->
            <div class="col-xs-9 column">
                <!-- Search -->
                <div id="qd_search" class="pull-right">
                    <style>
                        #qd_search {
                            margin-top: 15px;
                            margin-bottom: 5px;
                        }

                        .qd-result-item {
                            padding: 15px;
                        }

                        .qd-result-item a {
                            text-decoration: none !important;
                            color: white;
                        }
                    </style>
                    <script>
                        search_array = ["img/search-icon-hi.png", "img/loading.gif"];
                    </script>
                    <form style="position: relative" onsubmit="return false;">
                        <img id="qd-search-icon" src="img/search-icon-hi.png"
                             style="height: 15px; width: 15px; position: absolute; top: 7px; right: 10px; opacity: 0.4">
                        <input id="qd-search-box" class="form-control" type="text"
                               style="width: 200px; padding-right: 40px; height: 27px;"
                               placeholder="search...">
                        <script>
                            (function($) {
                                $(document).ready(function(){
                                    $("#qd-search-icon").click(function(){
                                        $('#qd-search-box').change();
                                    });
                                    $('#qd-search-box').change(function() {
                                        $("#qd-search-icon").attr("src", search_array[1]);
                                        $.get("<?=QdT_Library::getDataPortPath('search/search_port')?>&limit=7", {key_word: $("#qd-search-box").val()})
                                            .done(function (data) {

                                                //data JSON
                                                var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                                //clear previous result
                                                $("#qd-result-wrapper").html("");
                                                //set new result
                                                for (i = 0; i < data.length; i++) {
                                                    console.log(data[i]);
                                                    $("#qd-result-wrapper" ).append(
                                                        "<div class=\"qd-result-item\"><a target=\"_blank\" href=\""+data[i].url+"\">"+data[i].name+"</a></div>"
                                                    );

                                                }
                                                $("#qd-search-icon").attr("src", search_array[0]);
                                            })
                                            .fail(function (data) {
                                                console.log("FAIL:" + data);
                                            })
                                            .always(function () {
                                                //release lock
                                                $('#qddelete').removeAttr('disabled');
                                            });
                                    });
                                });
                            })(jQuery);
                        </script>
                        <style>
                            #qd-result-wrapper {
                                z-index: 1000;
                                right: 0px;
                                position: absolute;
                                width: 300px;
                                height: auto;
                                background-color: #000000;
                                opacity: 0.8;
                                color: white;
                                border-radius: 20px;
                            }

                            #qd_search > form > #qd-result-wrapper {
                                display: none;
                            }

                            #qd_search > form:hover > #qd-result-wrapper {
                                display: block;
                            }
                        </style>
                        <div id="qd-result-wrapper">

                        </div>
                        <input type="submit" value="submit" style="display: none">
                    </form>
                </div>
                <div style="clear: both"></div>
                <!-- End search -->
                <!-- MENU -->
                <div class="row clearfix">
                    <div class="col-xs-12 column">
                        <div id='cssmenu222'>
                            <!-- CSS memu : FIX layout padding conflict with bootstrap -->
                            <style>
                                #cssmenu *,
                                #cssmenu *:before,
                                #cssmenu *:after {
                                    -webkit-box-sizing: content-box;
                                    -moz-box-sizing: content-box;
                                    box-sizing: content-box;
                                }
                            </style>
                            <!-- end CSS memu : FIX layout conflict with bootstrap -->
                            <style>
                                #cssmenu {
                                    background: none;
                                }
                                #cssmenu ul {
                                    background: none !important;
                                }
                                #cssmenu {
                                    height: 30px;
                                    right: -35px;
                                }

                                #cssmenu ul li span {
                                    font-weight: bold;
                                }

                                #cssmenu .current-menu-item a {
                                    font-weight: bold;
                                }

                                li {
                                    list-style: none
                                }

                                /*To prevent black dot under menu*/
                            </style>
                            <?php get_sidebar('main-menu'); ?>
                        </div>

                        <div style="clear: both;"></div>
                    </div>
                </div>
                <!-- END MENU -->

            </div>
        </div>
        <!-- end header -->
        <?php
    }
    protected function getBannerPart()
    {
        $slider = Qdmvc_Helper::getSlider(ot_get_option('banner_meta_slider_shortcode', ''));
        ?>
        <!-- BANNER -->
        <div class="row clearfix">
            <div class="col-xs-12 column" style="padding: 0">
                <style>
                    .carousel-indicators li {
                        border-radius: 50%;
                        margin-right: 20px;
                        height: 17px;
                        width: 17px;
                        border-color: slategray;
                    }

                    .carousel-indicators li.active {
                        border-radius: 50%;
                        margin-right: 20px;
                        height: 17px;
                        width: 17px;
                        background-color: slategray;
                    }
                </style>
                <hr class="long-grey-thin-line" style="margin-top: 4px; margin-bottom: 12px;"/>
                <!-- BANNER -->
                <div id="myCarousel" class="carousel slide" data-ride="carousel"
                     style="min-width: 960px; <?= count($slider) == 0 ? 'display: none;' : '' ?>">
                    <!-- Indicators -->

                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < count($slider); $i++):
                            ?>
                            <li data-target="#myCarousel" data-slide-to="<?= $i ?>"
                                class="<?= $i == 0 ? 'active' : '' ?>"></li>
                        <?php
                        endfor;
                        ?>
                        <!--
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li> -->
                    </ol>
                    <style>
                        .carousel-inner > .item > img {
                            width: 100%;
                        }
                    </style>
                    <div class="carousel-inner">
                        <!--have 1 item has active class when begin or slider will cause error -->
                        <?php
                        $count = 0;
                        foreach ($slider as $item):
                            ?>
                            <div class="item <?= $count == 0 ? 'active' : '' ?>"><img src="<?= $item->attr['src'] ?>"
                                                                                      alt="First slide"></div>
                            <?php
                            $count++;
                        endforeach;
                        ?>
                    </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="visibility: hidden">
                <span
                    class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control"
                       href="#myCarousel"
                       data-slide="next" style="visibility: hidden"><span
                            class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <!-- END BANNER -->
            </div>
        </div>
        <!-- END BANNER -->
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
        <!-- footer -->
        <div class="container" id="qd_container_footer" style="background-color: #4d4d4d; color: white;">
            <!-- LINE RED -->
            <hr class="long-red-line">

            <div class="row clearfix"
                 style="color: white; width: 960px; margin: auto;">
                <div class="col-xs-12 column">
                    <!-- Footer Nav -->
                    <div class="row clearfix qd-footer-nav"
                         style="width: auto; position: relative; ">
                        <div class="col-xs-3 column">
                            <?php get_sidebar('footer-menu-1'); ?>
                        </div>
                        <div class="col-xs-3 column">
                            <?php get_sidebar('footer-menu-2'); ?>
                        </div>
                        <div class="col-xs-3 column">
                            <?php get_sidebar('footer-menu-3'); ?>
                        </div>
                        <div class="col-xs-3 column">
                            <?php get_sidebar('footer-menu-4'); ?>
                        </div>
                    </div>
                    <!-- For social items from plugin -->
                    <style>
                        .social-icons-list {
                            margin-top: 10px !important;
                        }

                        .social-icons-list img {
                            border-radius: 50% 50% 50% 50%;
                            width: 32px;
                            height: 32px;
                            float: left;
                        }


                        .social-icons-list a {
                            display: inline-block;
                            margin-left: 20px;
                            width: 32px;
                            height: 32px;
                        }

                        .social-icons-list a:first-of-type {
                            margin-left: 0px;
                        }

                        .social-icons-list .social:hover {
                            opacity: 0.4;
                        }
                    </style>
                    <!-- For common ul li items -->
                    <style>
                        .qd-footer-nav {
                            padding-top: 100px;
                            padding-bottom: 90px;
                        }

                        .qd-footer-nav ul {
                            padding: 0;
                            margin: 0;
                        }

                        .qd-footer-nav li {
                            font-size: inherit;
                            font-weight: normal;
                            margin: 0;
                            padding: 0;
                            line-height: 2;
                            list-style: none;
                        }

                        .qd-footer-nav a {
                            color: inherit;
                        }

                        .qd-footer-nav h2,
                        .qd-footer-nav h1,
                        .qd-footer-nav h3,
                        .qd-footer-nav h4 {
                            font-size: inherit;
                            font-weight: bold;
                            margin: 0;
                            padding: 0;
                            line-height: 2;
                        }

                        .qd-footer-nav p {
                            line-height: 2;
                        }
                    </style>
                    <!-- For IMG src mapping icon -->
                    <?php
                    $social_icon = array(
                        'facebook' => 'img/vn_facebook.png',
                        'google' => 'img/vn_google.png',
                        'twitter' => 'img/vn_twitter.png'
                    );
                    ?>
                    <script>
                        (function ($) {
                            $(document).ready(function () {
                                <?php
                                foreach($social_icon as $key=>$value):
                                ?>
                                $('.social-icons-list img.<?=$key?>').attr("src", "<?=$value?>");
                                <?php
                                endforeach;
                                ?>
                            });
                        })(jQuery);
                    </script>
                </div>
            </div>
            <!-- Part 6 Copyright Statement -->
            <div class="row clearfix" style="width: 960px; margin: 0 auto">
                <div class="col-xs-12 column">
                    <hr class="style-six"/>
                    <div class="qd-footer-nav" style="text-align: center; padding-top: 30px; padding-bottom: 30px">
                        <?php get_sidebar('footer-bottom'); ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- end footer -->
        <?php
    }
}