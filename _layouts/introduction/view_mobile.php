<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 23/06/2015
 * Time: 10:27 PM
 * Version: 150720, 150819 (un change)
 */
QdT_Library::loadLayoutViewMobile('root');

class QdCPT_IntroductionLayout_ViewMobile extends QdT_Layout_Root_ViewMobile
{
    protected function isServicePage()
    {
        return false;
    }

    protected function isFAQsPage()
    {
        return false;
    }

    protected function isContactPage()
    {
        return false;
    }

    protected function getContentMain()
    {
        return QdT_Library::getNoneText();
    }

    protected function getContentPart()
    {
        ?>
        <!-- bread crumb -->
        <div class="container">
            <!-- Marketing Icons Section -->
            <div class="row big-sale" style="min-height: 500px;">
                <div class="col-lg-12">
                    <h4 class="vnc-title">
                        <?= $this->getContentTitle() ?>
                    </h4>
                </div>
                <div class="col-xs-12">
                    <div class="info">
                        <?= $this->getContentMain() ?>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    <?php
    }

    protected function getBannerServicePage()
    {

    }

    protected function getContentTitle()
    {
        return QdT_Library::getNoneText();
    }

    protected function getBannerPart()
    {
        //HIDE
    }

    private function genRightMenu()
    {

    }
}