<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 24/06/2015
 * Time: 8:52 PM
 * Version: 150720, 150819 (un change)
 */
QdT_Library::loadLayoutViewMobile('root');

class QdT_PageT_Error404_ViewMobile extends QdT_Layout_Root_ViewMobile
{
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
        <div class="container">
            <div class="row">
                <!--Left-->
                <div class="col-xs-12" style="color: red; font-size: 14px">
                    ERROR 404 - Resource not found
                </div>
            </div>
        </div>
    <?php
    }
}