<?php

QdT_Library::loadLayout('root');

class QdT_PageT_Error404 extends QdT_Layout_Root
{
    function __construct()
    {
        parent::__construct();
    }

    protected function getBannerPart()
    {
        //HIDE
    }

    protected function getBreadcrumbsPart()
    {
        //HIDE
    }


    protected function loadScript()
    {
        //QdJqwidgets::loadSinglePluginJS("form2js.js");
        //QdJqwidgets::loadSinglePluginJS("ajax-loader.js");
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