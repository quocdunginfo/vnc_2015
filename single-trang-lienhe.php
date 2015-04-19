<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
QdT_Library::loadLayout('root');
Qdmvc::loadNative('page-meta-box');

class QdCPT_TrangLienHe extends QdT_Layout_Root
{
    private $obj = null;

    protected function getPageTitle()
    {
        return parent::getPageTitle() . ' | Trang liên hệ';
    }


    function __construct()
    {
        $this->loadScript();
        if (have_posts()) {
            the_post();
            $this->obj = get_post(get_the_ID());
        }
    }

    protected function getBreadcrumbs()
    {
        $t = parent::getBreadcrumbs();
        array_push($t, array('url' => get_permalink($this->obj->ID), 'name' => 'Liên hệ'));
        return $t;
    }
    protected function loadScript()
    {
        QdJqwidgets::loadSinglePluginJS("form2js.js");
        QdJqwidgets::loadSinglePluginJS("ajax-loader.js");
    }
    protected function getContentTitle()
    {
        return $this->obj->post_title;
    }

    protected function getContentPart()
    {
        // Start the Loop.
        ?>
        <div class="container" id="qd_container_content" style="margin-top: 15px;">
            <!-- WIDGET -->
            <div class="row clearfix">
                <div class="col-xs-12 column" id="qd_contact_content">
                    <style>
                        #qd_contact_content table td {
                            border: solid 1px #d8d8d8;
                            width: 50%;
                            padding: 25px;
                        }

                        /*
                        #qd_contact_content table td.qd_contact_left {
                            vertical-align: middle;
                            text-align: center;
                            font-size: 30px;
                        }*/

                        #qd_contact_content table td.qd_contact_right {
                            padding: 25px;
                        }
                    </style>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td class="qd_contact_left" id="qd_contact_left">
                                <?php
                                //rwmb_meta( Qdmvc_Metabox_TrangLienHe::getFieldName('email'), null, get_the_ID() );
                                ?>
                                <form id="contactForm">

                                    <div class="form-group">

                                        <label class="control-label">Họ tên:</label>
                                        <input type="text" class="form-control" name="customer_name"
                                               id="customer_name">


                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email:</label>
                                        <input type="text" class="form-control" name="customer_email"
                                               id="customer_email">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Nội dung:</label>
                                        <textarea style="height: 100px" type="text" class="form-control" name="content"
                                                  id="content"></textarea>
                                    </div>
                                    <div style="display: none" class="alert alert-success" id="qdmsgbox">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        Gửi liên hệ thành công
                                    </div>
                                    <div class="form-group">
                                        <button id="qdsend" type="button" class="btn btn-primary">Gửi</button>
                                    </div>
                                </form>
                                <style>
                                    .ajax_loader {
                                        background: url(<?=Qdmvc_Helper::getImgURL("ajax-loader_blue.gif")?>) no-repeat center center transparent;
                                        width: 100%;
                                        height: 100%;
                                    }
                                </style>
                            </td>
                            <td class="qd_contact_right">
                                <?= $this->obj->post_content ?>
                            </td>
                            <script>
                                (function ($) {
                                    $(document).ready(function () {
                                        var data_port = '<?=Qdmvc_Helper::getDataPortPath('front/feedback_port')?>';

                                        $('#qdsend').click(function () {
                                            var json = form2js("contactForm", ".", false, null, true);

                                            console.log(json);
                                            //var ajax_loader = new ajaxLoader("#content");//quocdunginfo

                                            //show progress bar
                                            //...
                                            $.post(data_port, {submit: "submit", action: "insert", data: json})
                                                .done(function (data) {
                                                    //data JSON
                                                    console.log(data);
                                                    //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                                    for(i=0;i<data.msg.length;i++)
                                                    {
                                                        if(data.msg[i].type=='error')
                                                        {
                                                            alert(data.msg[i].msg);
                                                            return;
                                                        }
                                                    }
                                                    $('#qdmsgbox').css("display", "block");
                                                    //auto close after 3 second
                                                    setTimeout(function () {
                                                        //...
                                                    }, 3000);
                                                })
                                                .fail(function (data) {
                                                    console.log(data);
                                                })
                                                .always(function () {
                                                    //release lock
                                                    //ajax_loader.remove();
                                                });
                                        });
                                    });
                                })(jQuery);
                            </script>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
}

$obj = new QdCPT_TrangLienHe();
$obj->render();
