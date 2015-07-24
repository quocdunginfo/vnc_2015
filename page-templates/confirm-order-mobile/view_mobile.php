<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:32 PM
 */
QdT_Library::loadLayoutViewMobile('root');

class QdT_PageT_ConfirmOrder_ViewMobile extends QdT_Layout_Root_ViewMobile
{
    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getContentPart()
    {
        ?>
        <div class="container">

            <!-- Marketing Icons Section -->
            <div class="row big-sale">
                <div class="col-lg-12">
                    <h4 class="vnc-title">
                        <?= $this->page->product_order_setup->order_form_title ?>
                    </h4>
                </div>
                <!-- info -->
                <div class="col-xs-6 dathang" id="dathang-product">
                    <span class="dathang-img"
                          style="background-image: url('<?= $this->page->product->avatar ?>');"></span>
                </div>
                <div class="col-xs-6" style="padding-left: 30px;">
                    <p class="p-edit-1">
                        <?= $this->page->product->name ?>
                    </p>

                    <p class="p-edit-1">
                        <b style="color: rgb(131,131,132);font-weight: normal;">
                            <?= number_format($this->page->product->price, 0, '.', ',') ?>
                            VND</b>

                        <img src="img/border-links.png" style="margin: 0px 5px;"> <b>L</b></br>

                        <b class="bs-sale">
                            <?= number_format($this->page->product->_price_discount, 0, '.', ',') ?>
                            VND (OFF <?= $this->page->product->discount_percent * 100 ?>%)
                        </b>
                    </p>
                </div>
                <form id="formOrder" onsubmit="return false">
                    <input type="hidden" name="product_id"
                           value="<?= $this->page->product->id ?>">
                    <input type="hidden" name="count"
                           value="1">
                    <?php
                    if (QdT_Library::isNullOrEmpty($this->page->cookie_customer['sex'])) {
                        $this->page->cookie_customer['sex'] = "1";
                    }
                    ?>

                    <div class="col-xs-12  control-group form-group">
                        <div class="controls">


                            <input class="edit-radio" type="radio" name="sex"
                                   value="1" <?= $this->page->cookie_customer['sex'] == "1" ? "checked" : "" ?>><label
                                class="edit-radio edit-radio-b">Anh</label>
                            <input class="edit-radio" type="radio" name="sex"
                                   value="0" <?= $this->page->cookie_customer['sex'] == "0" ? "checked" : "" ?>
                                   style="margin-left: 20px;"><label class="edit-radio edit-radio-b">Chị</label>
                        </div>
                    </div>
                    <div class="col-xs-12 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_name"
                                   placeholder="Vui lòng nhập họ tên"
                                   aria-invalid="false"
                                   oninvalid="this.setCustomValidity('Họ tên bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   value="<?php
                                   if (!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_name'])) {
                                       echo $this->page->cookie_customer['customer_name'];
                                   }
                                   ?>"
                                   required autofocus>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_phone"
                                   placeholder="Vui lòng nhập số điện thoại"
                                   oninvalid="this.setCustomValidity('Số điện thoại bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if (!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_phone'])) {
                                       echo $this->page->cookie_customer['customer_phone'];
                                   }
                                   ?>"
                                   required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_email"
                                   placeholder="Vui lòng nhập Email (nếu có)"
                                   oninvalid="this.setCustomValidity('Email bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   value="<?php
                                   if (!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_email'])) {
                                       echo $this->page->cookie_customer['customer_email'];
                                   }
                                   ?>"
                                   aria-invalid="false" required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 control-group form-group">

                                            <textarea rows="100" cols="100" class="form-control-textarea" name="mota"
                                                      placeholder="Vui lòng ghi yêu cầu (nếu có)"
                                                      maxlength="999" style="resize:none"
                                                      aria-invalid="false"></textarea>

                            <p class="help-block"></p>

                    </div>

                    <div class="col-xs-12 vnc-lh-size">
                        <a href="dathangtc.html" rel="external" type="button" class="btn btn-primary"
                           style="width:150px; height: 36px; font-size: 18px;">XÁC NHẬN</a>
                    </div>
                </form>
                <div class="col-xs-12">
                    <p class="goihotro">Gọi hỗ trợ <b>098 900 3338</b></p>
                </div>
            </div>
            <!-- /.row -->
        </div>
    <?php
    }

    protected function getBreadcrumbs()
    {
        $tmp = parent::getBreadcrumbs();
        $tmp = array_merge($tmp, $this->page->product->getBreadcrumbs());
        return $tmp;
    }
}