<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 */
QdT_Library::loadLayout('root');
class QdT_PageT_ProductSearch extends QdT_Layout_Root {
    protected $manufactor_list = array();
	protected $size_quanao_list = array();
	protected $size_giaydep_list = array();

	function __construct()
    {
        parent::__construct();

	    $record = new QdManufactor();
	    $this->manufactor_list = $record->GETLIST();

	    $record = new QdSize();
	    $record->SETRANGE('type', QdSize::$TYPE_QUANAO);
	    $this->size_quanao_list = $record->GETLIST();

	    $record->SETRANGE('type', QdSize::$TYPE_GIAYDEP);
	    $this->size_giaydep_list = $record->GETLIST();
    }

    protected function getContentPart()
    {
        $record = new QdProductCat();
        $record->SETRANGE('type', QdProductCat::$TYPE_PRODUCTCAT, true);
        $objss = $record->GETLIST();
        $menu_ul_li = QdT_Library::genMenuTree(QdProductCat::genObjectsToArray($objss));

        ?>
        <!-- Begin Content -->
        <div class="container-non-responsive carousel content">
        <!-- Title Product -->
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Sản Phẩm</li>
                </ol>
                <h2 class="sanpham-header">
                    <small>ĐIỆN THOẠI CAO CẤP</small>
                </h2>
            </div>
        </div>
        <!-- Product -->
        <div class="row">
        <div class="col-xs-9 ">
            <!-- Product 1
            <div class="row">
                <div class="col-xs-4">
                    <div class="vn-sanpham-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                    </div>
                    <p class="p-edit-1">
                        IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                    </p>
                    <p class="p-edit-1">
                        <b style="color: rgb(131,131,132);font-weight: normal;">5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                        <b style="color: #C80815;">1.000 USD ( Giá Shock !!! )</b>
                    </p>
                </div>
                <div class="col-xs-4">
                    <div class="vn-sanpham-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                    </div>
                    <p class="p-edit-1">
                        IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                    </p>
                    <p class="p-edit-1">
                        <b>5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                    </p>
                </div>
                <div class="col-xs-4">
                    <div class="vn-sanpham-box" style="background: url('img/current 3.jpg');
                                                          background-repeat: no-repeat;
                                                          background-size: contain;
                                                          background-position: center;">
                    </div>
                    <p class="p-edit-1">
                        IPhone 5S 32GB Quốc Tế màu trắng xanh vàng
                    </p>
                    <p class="p-edit-1">
                        <b>5.000.000 VND</b><img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>
                    </p>
                </div>
            </div>
            -->



            <!-- Product 2 -->
            <div id="qd_list_sanpham" class="row" style="margin-top: 25px;" >
                <script type="text/javascript" src="plugin/jquery.jscroll.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#qd_list_sanpham').jscroll({
                            loadingHtml: '<div style="text-align: center; width: 100%; padding-bottom: 17px"><img style="width: 25px; height: 25px" src="img/loading.gif" alt="Loading" /> Đang tải...</div>',
                            padding: 0,
                            autoTrigger: false,
                            nextSelector: '.qd_jscroll_next a:last',
                            callback: function () {
                                //alert("wtf");
                            }
                        });
                    });

                </script>
                <?=QdT_Library::loadPageT('product-search-loadmore')?>
            </div>
        </div>
        <div class="col-xs-3 ">
        <div class="row">
        <div class="col-xs-12">

        <?=$menu_ul_li?>

        <!--
        <ul class="product-list">
        <li class="product-title">ĐIỆN THOẠI - THIẾT BỊ DI ĐỘNG
            <ul class="product-list-sub">
                <li class="product-title-sub">
                    <a href="#" class="product-links">Điện thoại cao cấp</a>
                    <ul class="product">
                        <li><a href="#" class="product-links">iPhone</a></li>
                        <li><a href="#" class="product-links">Galaxy</a></li>
                        <li><a href="#" class="product-links">hTC</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    <a href="#" class="product-links">Máy tính bảng</a>
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    <a href="#" class="product-links">Laptop</a>
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    <a href="#" class="product-links">Máy ảnh</a>
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    <a href="#" class="product-links">Phụ kiện điện thoại & TNDĐ</a>
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="product-title">ĐỒNG HỒ - TRANG SỨC
            <ul class="product-list-sub">
                <li class="product-title-sub">
                    Điện thoại cao cấp
                    <ul class="product">
                        <li><a href="#" class="product-links">iPhone</a></li>
                        <li><a href="#" class="product-links">Galaxy</a></li>
                        <li><a href="#" class="product-links">hTC</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy tính bảng
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Laptop
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy ảnh
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Phụ kiện điện thoại & TNDĐ
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="product-title">THỜI TRANG - PHỤ KIỆN
            <ul class="product-list-sub">
                <li class="product-title-sub">
                    Điện thoại cao cấp
                    <ul class="product">
                        <li><a href="#" class="product-links">iPhone</a></li>
                        <li><a href="#" class="product-links">Galaxy</a></li>
                        <li><a href="#" class="product-links">hTC</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy tính bảng
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Laptop
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy ảnh
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Phụ kiện điện thoại & TNDĐ
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="product-title">ĐỒ GIA DỤNG
            <ul class="product-list-sub">
                <li class="product-title-sub">
                    Điện thoại cao cấp
                    <ul class="product">
                        <li><a href="#" class="product-links">iPhone</a></li>
                        <li><a href="#" class="product-links">Galaxy</a></li>
                        <li><a href="#" class="product-links">hTC</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy tính bảng
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Laptop
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy ảnh
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Phụ kiện điện thoại & TNDĐ
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="product-title">XE & PHỤ KIỆN
            <ul class="product-list-sub">
                <li class="product-title-sub">
                    Điện thoại cao cấp
                    <ul class="product">
                        <li><a href="#" class="product-links">iPhone</a></li>
                        <li><a href="#" class="product-links">Galaxy</a></li>
                        <li><a href="#" class="product-links">hTC</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy tính bảng
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Laptop
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Máy ảnh
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
                <li class="product-title-sub">
                    Phụ kiện điện thoại & TNDĐ
                    <ul class="product">
                        <li><a href="#" class="product-links">a</a></li>
                        <li><a href="#" class="product-links">b</a></li>
                        <li><a href="#" class="product-links">c</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        </ul> -->
        </div>
        </div>

        <!-- Mức giá -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="product-list">
                    <li class="title">MỨC GIÁ : </li>
                    <li><a href="<?=add_query_arg(array('price-from' => 0, 'price-to' => 1000000), $this->uri)?>" class="product-links">Dưới 1.000.000 vnđ</a></li>
                    <li><a href="<?=add_query_arg(array('price-from' => 1000000, 'price-to' => 3000000), $this->uri)?>" class="product-links">Từ 1.000.000 - 3.000.000</a></li>
                    <li><a href="<?=add_query_arg(array('price-from' => 3000000, 'price-to' => 6000000), $this->uri)?>" class="product-links">Từ 3.500.000 - 6.000.000</a></li>
                    <li><a href="<?=add_query_arg(array('price-from' => 6000000, 'price-to' => 10000000), $this->uri)?>" class="product-links">Từ  6.000.000 - 10.000.000</a></li>
                    <li><a href="<?=add_query_arg(array('price-from' => 10000000, 'price-to' => -1), $this->uri)?>" class="product-links">Trên 10.000.000</a></li>
                </ul>
            </div>
        </div>

        <!-- Size quan ao -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="product-list">
                    <div class="row">
                        <div class="col-xs-12 title">
                            SIZE QUẦN ÁO
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 15px; /*quocdunginfo*/">
                        <?php
                        foreach($this->size_quanao_list as $item):
                        ?>
	                    <div class="col-xs-3" style="margin-top: 15px;">
                            <a href="<?=add_query_arg(array('size-id' => $item->id),$this->uri)?>" class="product-links">
	                            <div class="product-quanao">
		                            <?=$item->code?>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
	                    <!--
                        <div class="col-xs-3">
                            <a href="#" class="product-links"><div class="product-quanao">S</div></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="product-links"><div class="product-quanao">M</div></a>
                        </div>
                        <div class="col-xs-3">
                            <a href="#" class="product-links"><div class="product-quanao">L</div></a>
                        </div>
	                    <div class="col-xs-3">
		                    <a href="#" class="product-links"><div class="product-quanao">XL</div></a>
	                    </div>
	                    <div class="col-xs-3">
		                    <a href="#" class="product-links"><div class="product-quanao">XXL</div></a>
	                    </div> -->
                    </div>
                </ul>
            </div>
        </div>

        <!-- Size giay dep -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="product-list">
                    <div class="row">
                        <div class="col-xs-12 title">
                            SIZE GIÀY DÉP
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 15px; /*quocdunginfo*/">
	                    <?php
	                    foreach($this->size_giaydep_list as $item):
		                    ?>
		                    <div class="col-xs-3" style="margin-top: 15px;">
			                    <a href="<?=add_query_arg(array('size-id' => $item->id),$this->uri)?>" class="product-links">
				                    <div class="product-quanao">
					                    <?=$item->code?>
				                    </div>
			                    </a>
		                    </div>
	                    <?php endforeach; ?>
                    </div>
                </ul>
            </div>
        </div>

        <!-- Tìm theo hãng -->
        <div class="row">
            <div class="col-xs-12">
                <ul class="product-list">
                    <li class="title">TÌM THEO HÃNG</li>
	                <?php
                    foreach($this->manufactor_list as $item):
	                ?>
                    <li><a href="<?=add_query_arg(array('manufactor-id' => $item->id), $this->uri)?>" class="product-links"><?=$item->name?></a></li>
                    <?php
	                endforeach;
                    ?>
	                <!--
	                <li><a href="#" class="product-links">Samsung</a></li>
                    <li><a href="#" class="product-links">hTC</a></li>
                    <li><a href="#" class="product-links">BB</a></li>
                    <li><a href="#" class="product-links">Nokia</a></li>
                    <li><a href="#" class="product-links">Hãng 6</a></li>
                    <li><a href="#" class="product-links">Hãng 6</a></li>
                    <li><a href="#" class="product-links">Hãng 6</a></li>
                    <li><a href="#" class="product-links">Hãng 6</a></li>
                    <li><a href="#" class="product-links">Hãng 6</a></li>
	                -->
                </ul>
            </div>
        </div>

        </div>
        </div>
        </div>
        <!-- End Content -->
        <?php
    }
}