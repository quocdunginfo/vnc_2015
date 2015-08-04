<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/06/2015
 * Time: 11:22 PM
 * Version: 150720
 */
QdT_Library::loadLayoutViewMobile('introduction');

class QdT_PageT_Contact_ViewMobile extends QdCPT_IntroductionLayout_ViewMobile
{

    public function getSubContentMain()
    {
        global $post;
        return $post->post_content;
    }

    protected function getContentPart()
    {
        ?>
        <div class="container">


            <!-- Marketing Icons Section -->
            <div class="row big-sale">
                <div class="col-lg-12">
                    <h4 class="vnc-title">
                        <?=$this->getContentTitle()?>
                    </h4>
                </div>
                <!-- info -->
                <div class="col-xs-12">
                    <?=$this->getSubContentMain()?>
                </div>
                <form id="formContact" onsubmit="return false;">
                    <div class="col-xs-12 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_name"
                                   placeholder="Vui lòng nhập họ tên"
                                   oninvalid="this.setCustomValidity('Họ tên bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if(!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_name']))
                                   {
                                       echo $this->page->cookie_customer['customer_name'];
                                   }
                                   ?>"
                                   required autofocus>


                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class=" col-xs-12 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" id="customer_email"
                                   placeholder="Vui lòng nhập email"
                                   oninvalid="this.setCustomValidity('Email bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if(!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_email']))
                                   {
                                       echo $this->page->cookie_customer['customer_email'];
                                   }
                                   ?>"
                                   required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 control-group form-group">
                        <div class="controls">
                            <input type="text" class="form-control" name="customer_phone"
                                   placeholder="Vui lòng nhập số điện thoại"
                                   oninvalid="this.setCustomValidity('SĐT bắt buộc nhập')"
                                   oninput="this.setCustomValidity('')"
                                   aria-invalid="false"
                                   value="<?php
                                   if(!QdT_Library::isNullOrEmpty($this->page->cookie_customer['customer_phone']))
                                   {
                                       echo $this->page->cookie_customer['customer_phone'];
                                   }
                                   ?>"
                                   required>

                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 control-group form-group">
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
                    <div class="col-xs-12 control-group form-group">
                        <div class="controls">
                            <textarea rows="10" cols="100" class="form-control" name="content" required=""
                                      placeholder="Vui lòng ghi nội dung"
                                      data-validation-required-message="Please enter your message" maxlength="999"
                                      style="resize:none" aria-invalid="false"></textarea>


                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-xs-12 vnc-lh-size">
                        <button id="formContactSubmit" type="submit" class="btn btn-primary"
                                style="width:150px; height: 36px; font-size: 18px;">GỬI
                        </button>
                        <img id="qd-loading" src="../img/loading.gif" style="width: 30px; height: 30px; display: none; margin-left: 10px">
                        <script>
                            MYAPP.PageInfo.DataPort_front_feedback_port = '<?=Qdmvc_Helper::getDataPortPath('front/feedback_port')?>';
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

                                    $.post(MYAPP.PageInfo.DataPort_front_feedback_port, {submit: "submit", action: "insert", data: json})
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

                <div class="col-xs-12">
                    <hr>
                </div>
                <?=$this->getContactPart()?>
            </div>
            <!-- /.row -->
        </div>
    <?php
    }


    public function getContentTitle()
    {
        global $post;
        return $post->post_title;
    }

    public function getContactPart()
    {
        if (QdT_Library::isNullOrEmpty($this->page->contacts)) return;
        ?>
        <div class="col-xs-12 vnc-lh-size">
            <h5><b><?= $this->page->contacts[0]->name ?></b></h5>

            <p>
                Địa chỉ: <?= $this->page->contacts[0]->address ?>.
                <br>
                Điện thoại: <?= $this->page->contacts[0]->phone ?>.
                <br>
                Email: <?= $this->page->contacts[0]->email ?>.
                <br>
                Facebook: <?= $this->page->contacts[0]->website ?>.
            </p>

        </div>
        <?php
        for ($i = 1; $i < count($this->page->contacts); $i++):
            ?>
            <div class="col-xs-12 vnc-lh-size">
                <h5><b><?= $this->page->contacts[$i]->name ?></b></h5>

                <p>
                    T: <?= $this->page->contacts[$i]->phone ?>.
                    <br>
                    E: <?= $this->page->contacts[$i]->email ?>.
                </p>
            </div>
        <?php endfor; ?>

    <?php
    }

    protected function getBreadcrumbs()
    {
        global $post;
        $tmp = parent::getBreadcrumbs();
        array_push($tmp, array('name' => $post->post_title, 'url' => $this->page->uri));
        return $tmp;
    }

}