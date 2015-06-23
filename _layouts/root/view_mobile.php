<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/06/2015
 * Time: 10:15 PM
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
        echo 'Mobile view';
    }
    private function getDefaultMaterial()
    {
        ?>
        <!-- Modal 1 -->
        <div class="modal fade" id="qd-root-progressing-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="">
                    <div class="modal-header" style="border-bottom: 0px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <div class="vn-modal-title">Progressing...</div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12" style="text-align: center">
                                <img src="img/loading-bar.gif">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
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
                    <div class="col-xs-7 header-phonenumber">
                        <!-- Content -->
                        <?= $this->page->theme_root_setup->topcenter_promotion ?>
                    </div>
                    <div class="col-xs-5 header-links">
                        <!-- Content
                        <a href="#">DỊCH VỤ</a>
                        <img src="img/border-links.png">
                        <a href="#">HƯỚNG DẪN</a>
                        <img src="img/border-links.png">
                        <a href="#">LIÊN HỆ</a> -->
                        <?= $this->page->theme_root_setup->topright_navs ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <!-- Navigation -->
        <div class="vn-cas-logo">
            <div class="container-non-responsive">
                <div class="logo">
                    <a href="<?= get_home_url() ?>"><img src="<?= $this->page->data['vnc_logo'] ?>"
                                                         style="height: 92px;width: 344px;"></a>
                </div>
            </div>
        </div>
        <div class="vn-cas-nav" id="nav-fix">
        <div class="container-non-responsive">
        <div class="navMenu expander">
        <?php
        $search_url = get_permalink(QdT_Library::getPageIdByTemplate('page-templates/product-search.php'));

        ?>
        <form action="<?= $search_url ?>" method="get" onsubmit="MYAPP.RootProgressBar(true)">
            <script>
                MYAPP.RootProgressBar = function(show) {
                    if(show)
                    {
                        $('#qd-root-progressing-modal').modal('show');
                    }else {
                        $('#qd-root-progressing-modal').modal('hide');
                    }
                };

            </script>
            <input type="search" placeholder="Tìm kiếm..." class="form-control" name="key-word"
                   value="<?= get_query_var('key-word', '') ?>">
        </form>
        <ul style="padding-left: 0px;">
        <li>
            <a href="#" class="nav-links">ĐIỆN THOẠI/ĐIỆN TỬ</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao
                                                cấp</a></div>
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
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
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
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="padding-top: 10px;"><span aria-hidden="true">x</span></button>
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- end -->
        </li>
        <li>
            <a href="#" class="nav-links">THỜI TRANG</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao
                                                cấp</a></div>
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
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
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
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="padding-top: 10px;"><span aria-hidden="true">x</span></button>
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
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
                <div class="container-non-responsive" style="padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao
                                                cấp</a></div>
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
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
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
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="padding-top: 10px;"><span aria-hidden="true">x</span></button>
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- end -->
        </li>
        <li>
            <a href="#" class="nav-links">XE/PHỤ KIỆN</a>
            <!-- begin -->
            <ul class="vn-sub">
                <div class="container-non-responsive" style="padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao
                                                cấp</a></div>
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
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
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
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="padding-top: 10px;"><span aria-hidden="true">x</span></button>
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
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
                <div class="container-non-responsive" style="padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-xs-4" style="margin-top: 30px;">
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Điện thoại cao
                                                cấp</a></div>
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
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
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
                                    <div class="sub-info">
                                        <div class="vn-sub-title"><a href="#" class="nav-sub-links">Phụ kiện</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Apple</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Điện thoại</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Máy tính bảng</a>
                                        </div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Laptop</a></div>
                                        <div class="vn-sub-icons"><a href="#" class="nav-sub-links">Pin dự phòng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="padding-top: 10px;"><span aria-hidden="true">x</span></button>
                            <div class="sub-image" style="background: url('img/current 3.jpg');
                                                                                    background-repeat: no-repeat;
                                                                                    background-size: contain;
                                                                                    background-position: center;">
                            </div>
                        </div>
                    </div>
                </div>
            </ul>
            <!-- end -->
        </li>
        </ul>
        </div>
        <div style="display: none; width: 980px; height: 40px; float: left;"></div>
        </div>
        </div>
        <hr>
        <?= $this->getBannerPart() ?>
    <?php
    }

    protected function getBannerPart()
    {
        if ($this->page->img_slider == null || empty($this->page->img_slider)) return;
        ?>
        <!-- Header Carousel -->
        <header id="myCarousel" class="carousel slide ibs-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators ibs_list_slider">
                <?php
                $count = 0;
                foreach ($this->page->img_slider as $item): ?>
                    <li data-target="#myCarousel" data-slide-to="<?= $count ?>"
                        class="<?= $count == 0 ? 'active' : '' ?>"></li>
                    <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li> -->
                    <?php
                    $count++;
                endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="margin-top: 0px; ">
                <?php
                $count = 0;
                foreach ($this->page->img_slider as $item): ?>
                    <div class="item <?= $count == 0 ? 'active' : '' ?>">
                        <div class="fill" style="background-image:url('<?= $item->path ?>');"></div>
                    </div>
                    <?php
                    $count++;
                endforeach; ?>
                <!--
                <div class="item">
                    <div class="fill" style="background-image:url('img/b.jpg');"></div>
                </div>
                <div class="item">
                    <div class="fill" style="background-image:url('img/c.jpg');"></div>
                </div> -->
            </div>

        </header>
    <?php
    }

    protected function getBreadcrumbsPart()
    {
        ?>
        <?php
        //breadCrums
        $bc = $this->getBreadcrumbs();
        ?>

        <ol class="breadcrumb" style="">
            <?php

            foreach ($bc as $item):
                ?>
                <li><a href="<?= $item['url'] ?>"><?= $item['name'] ?></a></li>
            <?php
            endforeach;
            ?>
        </ol>

    <?php
    }

    protected function getFooterPart()
    {
        $this->getWidgetNavsPart();
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
                        <form action="" onsubmit="return false" id="formSubscriber">
                            <style>
                                input.qd-trans-input,
                                input.qd-trans-input:focus {
                                    border:none;
                                    box-shadow: none;
                                    -webkit-box-shadow: none;
                                    -moz-box-shadow: none;
                                    -moz-transition: none;
                                    -webkit-transition: none;
                                    outline: none;
                                }
                            </style>
                            <input type="hidden" name="id" value="0">
                            <input name="email" class="qd-trans-input" type="text" style="position: absolute; width: 80%; height: 100%; background-color: rgba(0, 0, 0, 0); border:none; padding-left: 20px; padding-right: 20px; text-align: center; font-size: 24px; ">
                            <button type="submit" class="email-button qd-trans-input" id="formSubscriberBtn"></button>
                            <script>
                                MYAPP.PageInfo.DataPort_front_subscriber_port = '<?=Qdmvc_Helper::getDataPortPath('front/subscriber_port')?>';
                                (function ($) {
                                    $(document).ready(function () {
                                        $('#formSubscriberBtn').click(function () {
                                            //send data to DataPort
                                            var json = form2js("formSubscriber", ".", false, null, true);
                                            //validate
                                            if (json.email == '')
                                            {
                                                alert('Email bắt buộc nhập');
                                                return;
                                            }
                                            else if (!MYAPP.isValidEmail(json.email))
                                            {
                                                alert('Email không đúng định dạng');
                                                return;
                                            }

                                            console.log(json);
                                            //lock button
                                            $("#formSubscriberBtn").attr("disabled", true);

                                            //show progress bar
                                            MYAPP.RootProgressBar(true);
                                            $.post(MYAPP.PageInfo.DataPort_front_subscriber_port, {
                                                submit: "submit",
                                                action: "insert",
                                                data: json
                                            })
                                                .done(function (data) {
                                                    //data JSON
                                                    console.log(data);

                                                    alert('Đăng ký nhận tin thành công');

                                                })
                                                .fail(function (data) {
                                                    console.log(data);
                                                })
                                                .always(function () {
                                                    //release lock
                                                    $("#formSubscriberBtn").removeAttr("disabled");
                                                    MYAPP.RootProgressBar(false);
                                                });
                                        });
                                    });
                                })(jQuery);
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Begin Footer Center-->
        <div class="footer-center">
            <div class="container-non-responsive ">
                <style>
                    /*quocdunginfo*/
                    .qd-widget-navs {
                        padding-top: 68px;
                    }

                    .qd-widget-navs h2 {
                        list-style: none;
                        margin-bottom: 10px;
                        font-size: 14px;
                        font-weight: bold;
                        margin-top: 0px;
                    }

                    .widget_advanced_menu li a {
                        margin-bottom: 20px;
                        font-size: 13px;
                        color: rgb(255, 255, 255);
                    }

                    .widget_advanced_menu li a:hover {
                        color: rgb(82, 82, 82);
                        text-decoration: none;
                        font-size: 14px;
                        font-weight: bold;
                    }

                    .widget_advanced_menu ul.menu {
                        padding-left: 0px;
                    }

                    /*END quocdunginfo*/
                </style>
                <div class="row qd-widget-navs">
                    <div class="col-xs-3">
                        <?php get_sidebar('footer-menu-1'); ?>
                        <!--
                        <ul style="margin-top: 68px;padding-left: 0px;">
                            <li style="font-weight: bold;"> CÔNG TY </li>
                            <li> <a href="#" class="vn-ft-links">GIỚI THIỆU </a></li>
                            <li> <a href="#" class="vn-ft-links">TUYỂN DỤNG </a></li>
                            <li> <a href="#" class="vn-ft-links">LIÊN HỆ </a></li>
                        </ul> -->
                    </div>
                    <div class="col-xs-3">
                        <?php get_sidebar('footer-menu-2'); ?>
                    </div>
                    <div class="col-xs-3">
                        <?php get_sidebar('footer-menu-3'); ?>
                    </div>
                    <div class="col-xs-3">
                        <?php get_sidebar('footer-menu-4'); ?>
                        <?php
                        $social_icon_imgs = array(
                            'facebook' => array(
                                'static' => 'img/fa-1.png',
                                'hover' => 'img/fa-2.png'
                            ),
                            'google' => array(
                                'static' => 'img/go-1.png',
                                'hover' => 'img/go-2.png'
                            ),
                            'twitter' => array(
                                'static' => 'img/tw-1.png',
                                'hover' => 'img/tw-2.png'
                            ),
                            'youtube' => array(
                                'static' => 'img/yo-1.png',
                                'hover' => 'img/yo-2.png'
                            ),
                        );
                        ?>

                        <div>
                            <?php foreach ($this->page->data['social_icon'] as $item) : ?>
                                <a class="vn-icon" target="<?= $item->target ?>" href="<?= $item->path ?>">
                                    <img class="footer-center-img"
                                         src="<?= $social_icon_imgs[$item->title]['static'] ?>"
                                         onmouseover="this.src='<?= $social_icon_imgs[$item->title]['hover'] ?>'"
                                         onmouseout="this.src='<?= $social_icon_imgs[$item->title]['static'] ?>'">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?= $this->getPartnerLogoPart() ?>
            </div>
        </div>

        <!-- Begin Footer Bottom-->
        <div class="footer-bottom">
            <div class="container-non-responsive">
                <hr style="margin-bottom: 0px; margin-top: 0px;border-top: 1px solid rgb(107,107,107);">
                <div class="row">
                    <div class="col-xs-8">
                        <?= $this->page->theme_root_setup->bottomleft_footer_note ?>
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
                            <img style="max-width: 90px; max-height: 60px"
                                 src="<?= $this->page->theme_root_setup->commercial_logo == '' ? 'img/ban-quyen.png' : $this->page->theme_root_setup->commercial_logo ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <!-- End Footer -->
        <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>
        <!-- jQuery -->
        <script type="text/javascript" src="js/text.js"></script>
        <script src="js/main.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <!-- <script src="js/bootstrap.min.js"></script> -->


        <!-- Script to Activate the Carousel -->
        <script>

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
    <?php
    }

    public static function genProductWidget($item, $wrapper_class, $wrapper_style)
    {
        $size_obj = QdSize::GET($item->size_id);
        ?>
        <a href="<?= $item->getPermalink() ?>" style="color: inherit">
            <div class="<?= $wrapper_class ?>" style="<?= $wrapper_style ?>">
                <div class="vn-sanpham-box" style="background: url('<?= $item->avatar ?>');
                    background-repeat: no-repeat;
                    background-size: contain;
                    background-position: center;">
                </div>
                <p class="p-edit-1">
                    <?= $item->name ?>
                </p>

                <p class="p-edit-1">
                    <b style="color: rgb(131,131,132);font-weight: normal;"><?= number_format($item->price, 0, '.', ',') ?>
                        VND</b>
                    <?php if ($size_obj != null): ?>
                        <img src="img/border-links.png" style="margin: 0px 5px;">
                        <b>
                            <?= $size_obj->code ?>
                        </b>
                    <?php endif; ?>

                    </br>
                    <b style="color: #C80815;">
                        <?= number_format($item->_price_discount, 0, '.', ',') ?> VND
                        (<?= $item->discount_percent * 100 ?>% OFF)
                    </b>
                </p>
            </div>
        </a>
    <?php
    }

    protected function getWidgetNavsPart()
    {
        if ($this->page->widget_nav_list == null || empty($this->page->widget_nav_list)) {
            return;
        }
        ?>
        <div class="container-non-responsive" style="margin-top: 20px; border-top: 1px solid rgb(203,203,203);">
            <div class="row">
                <?php
                foreach ($this->page->widget_nav_list as $item):
                    ?>
                    <!-- Dịch vụ -->
                    <div class="col-xs-3">
                        <div class="vn-dichvu-title"><?= $item->title ?></div>
                        <p class="vn-dichvu">
                            <?= $item->content ?>
                        </p>

                        <div class="vn-dichvu-btn">
                            <a class="btn btn-default" type="submit" style="width:120px;"
                               target="<?=$item->target?>" href="<?= QdT_Library::isNullOrEmpty($item->path)?QdT_Library::getNoneLink():$item->path ?>">
                                <?= $item->button_text ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Dịch vụ 4
                <div class="col-xs-3">
                    <div class="vn-dichvu-title">TÀI CHÍNH</div>
                    <p class="vn-dichvu">
                        Thu mua đồ hiệu, đồ qua sử dụng, đồ mới 100%.
                    </p>

                    <div class="vn-dichvu-btn">
                        <button class="btn btn-default" type="submit" style="width:120px;">DỊCH VỤ</button>
                    </div>
                </div> -->
            </div>
        </div>
    <?php
    }

    protected function getPartnerLogoPart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->partner_list)) return;
        ?>
        <div class="row logo-thanhtoan">
            <?php foreach ($this->page->partner_list as $item): ?>
                <a class="vn-icon" target="<?=$item->target?>" href="<?= QdT_Library::isNullOrEmpty($item->path)?QdT_Library::getNoneLink():$item->path ?>">
                    <img class="footer-center-img-tt" src="<?= $item->avatar ?>" alt="">
                </a>
                <!--
            <a class="vn-icon" target="_blank" href="#">
                <img class="footer-center-img-tt" src="img/master.png" alt="">
            </a>
            <a class="vn-icon" target="_blank" href="#">
                <img class="footer-center-img-tt" src="img/paypal.jpg" alt="">
            </a>
            <a class="vn-icon" target="_blank" href="#">
                <img class="footer-center-img-tt" src="img/visa-e.jpg" alt="">
            </a> -->
            <?php endforeach; ?>
        </div>
    <?php
    }

    protected static function redirectPageError404()
    {
        QdT_Library::redirectPageError404();
    }
}