<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 9:32 PM
 * Version: 150720, 150819
 */
QdT_Library::loadLayoutViewMobile('root');

class QdT_PageT_OrderDone_ViewMobile extends QdT_Layout_Root_ViewMobile
{
    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getContentPart()
    {
        ?>
        <div class="container">
            <div class="row" style="margin-top: 10px;padding-bottom: 20px;">
                <div class="col-xs-12">
                    <h4 class="vnc-title">
                        <b style="color: #337ab7;">
                            <?= $this->page->product_order_setup->form_order_done_title ?>
                        </b>
                    </h4>
                </div>
                <div id="formOrderDoneTpl" class="col-xs-12">

                </div>
                <script>
                    (function($){
                        $(document).ready(function(){
                            var customer_sex = <?=$this->page->cookie_customer['sex']?>;
                            customer_sex = customer_sex==1?'Anh':'Chị';
                            var customer_name = '<?=$this->page->cookie_customer['customer_name']?>';

                            var tpl = MYAPP.TplReplace(["{customer_title}", "{customer_name}", "{product_name}"], [customer_sex, customer_name, MYAPP.PageInfo.product_obj[0].name], MYAPP.PageInfo.product_order_setup[0].form_order_done_tpl);
                            //alert(tpl);
                            $("#formOrderDoneTpl").html(tpl);
                        });
                    })(jQuery);

                </script>
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