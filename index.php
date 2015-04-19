<?php
QdT_Library::loadLayout('root');
class QdT_TrangIndex extends QdT_Layout_Root {
    function __construct()
    {

    }
}
$obj = new QdT_TrangIndex();
$obj->render();