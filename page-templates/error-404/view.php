<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 8:52 PM
 * Version: 150607
 */
QdT_Library::loadLayoutView('root');
class QdT_PageT_Error404_View extends QdT_Layout_Root_View {
    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getBreadcrumbsPart()
    {
        //HIDE
    }

    protected function getContentPart()
    {
        ?>
        <div class="container-non-responsive carousel content">
            <div class="row">
                <!--Left-->
                <div class="col-xs-12" style="color: red; font-size: 24px">
                    ERROR 404 - Resource not found
                </div>
            </div>
        </div>
    <?php
    }
}