<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 07/05/2015
 * Time: 9:57 PM
 * Version: 150607
 */
QdT_Library::loadLayout('introduction');

class QdT_PageT_Contact extends QdCPT_IntroductionLayout
{
    private $obj = null;
    private $contacts = array();

    function __construct()
    {
        parent::__construct();

        $tmp = new QdContact();
        $tmp->SETRANGE('active', true);
        $tmp->SETORDERBY('order', 'asc');

        $this->contacts = $tmp->GETLIST();
    }
    protected function loadScript()
    {
        QdJqwidgets::loadSinglePluginJS("form2js.js");
    }

    private function getSubContentMain()
    {
        global $post;
        return $post->post_content;
    }

    protected function getContentMain()
    {
        ?>
        <?= $this->getSubContentMain() ?>
        <div class="row">
            <div class="col-xs-12">
                <form id="formContact">
                    <input type="hidden" name="id" value="0">
                    <div class="row col-xs-6 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_name"
                                   placeholder="Vui lòng nhập họ tên"
                                   oninvalid="this.setCustomValidity('Họ tên bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if(!QdT_Library::isNullOrEmpty($this->cookie_customer['customer_name']))
                                   {
                                       echo $this->cookie_customer['customer_name'];
                                   }
                                   ?>"
                                   required autofocus>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12"></div>
                    <div class="row col-xs-6 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" id="customer_email"
                                   placeholder="Vui lòng nhập email"
                                   oninvalid="this.setCustomValidity('Email bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if(!QdT_Library::isNullOrEmpty($this->cookie_customer['customer_email']))
                                   {
                                       echo $this->cookie_customer['customer_email'];
                                   }
                                   ?>"
                                   required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12"></div>
                    <div class="row col-xs-6 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_phone"
                                   placeholder="Vui lòng nhập số điện thoại"
                                   oninvalid="this.setCustomValidity('SĐT bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if(!QdT_Library::isNullOrEmpty($this->cookie_customer['customer_phone']))
                                   {
                                       echo $this->cookie_customer['customer_phone'];
                                   }
                                   ?>"
                                   required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12"></div>
                    <div class="row col-xs-6 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="title"
                                   placeholder="Vui lòng nhập chủ đề"
                                   oninvalid="this.setCustomValidity('Tiêu đề bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value=""
                                   required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12"></div>
                    <div class="row col-xs-10 control-group form-group">
                        <div class="controls">
                            <textarea rows="10" cols="100" class="form-control" name="content" required=""
                                      placeholder="Vui lòng ghi nội dung"
                                      data-validation-required-message="Please enter your message" maxlength="999"
                                      style="resize:none" aria-invalid="false"></textarea>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="row col-xs-12">
                        <button id="formContactSubmit" type="submit" class="btn btn-primary" style="width:180px; height: 36px; font-size: 18px;">GỬI
                        </button>
                        <img id="qd-loading" src="img/loading.gif" style="width: 30px; height: 30px; display: none; margin-left: 10px">
                        <script>
                            MYAPP.PageInfo.DataPort = '<?=Qdmvc_Helper::getDataPortPath('front/feedback_port')?>';
                            (function($){

                                    $('#formContactSubmit').click(function(){
                                        //send data to DataPort
                                        var json = form2js("formContact", ".", false, null, true);
                                        //validate
                                        if(json.customer_name=='') return;
                                        if(json.customer_phone=='') return;
                                        if(json.customer_email=='') return;
                                        if(json.title=='') return;

                                        console.log(json);
                                        //lock button
                                        $("#formContactSubmit").attr("disabled", true);

                                        //show progress bar
                                        $('#qd-loading').css('display', 'inline-block');

                                        $.post(MYAPP.PageInfo.DataPort, {submit: "submit", action: "insert", data: json})
                                            .done(function (data) {
                                                //data JSON
                                                console.log(data);
                                                //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                                alert("Gửi liên hệ thành công");

                                            })
                                            .fail(function (data) {
                                                console.log(data);
                                            })
                                            .always(function () {
                                                //release lock
                                                $("#formContactSubmit").removeAttr("disabled");
                                                $('#qd-loading').css('display', 'none');
                                            });
                                    });

                            })(jQuery);
                        </script>
                    </div>
                </form>
            </div>
        </div>
        <?= $this->getContactPart() ?>
    <?php
    }

    protected function getContentTitle()
    {
        global $post;
        return $post->post_title;
    }

    private function getContactPart()
    {
        if (QdT_Library::isNullOrEmpty($this->contacts)) return;
        ?>
        <div class="vn-lienhe-border"></div>

        <div class="row">
            <div class="col-xs-12">
                <h5 style="margin-bottom: 0px;">

                        <?= $this->contacts[0]->name ?>

                </h5>

                <p>
                    Địa chỉ: <?= $this->contacts[0]->address ?>.
                    <br>
                    Điện thoại: <?= $this->contacts[0]->phone ?>.
                    <br>
                    Email: <?= $this->contacts[0]->email ?>.
                    <br>
                    Facebook: <?= $this->contacts[0]->website ?>.
                </p>

            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <?php
            for ($i = 1; $i < count($this->contacts); $i++):
                ?>
                <div class="col-xs-6">
                    <h5 style="margin-bottom: 0px;">

                            <?= $this->contacts[$i]->name ?>

                    </h5>

                    <p>
                        T: <?= $this->contacts[$i]->phone ?>.
                        <br>
                        E: <?= $this->contacts[$i]->email ?>.
                    </p>
                </div>
                <?php
                if($i%2==0)
                {
                    echo '<div class="col-xs-12" style="height: 20px"></div>';
                }
            endfor;
            ?>
        </div>
    <?php
    }

    protected function isContactPage()
    {
        return true;
    }

}