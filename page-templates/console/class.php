<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 9/12/15
 * Time: 6:52 PM
 */
class QdT_PageT_Console
{
    public static $KEY_IS_LOGGED_IN = 'is_logged_in';
    public function render()
    {
        $re = array();
        $query = get_query_var('query', Qdmvc_Helper::getNoneText());
        $re['query'] = $query;
        $re['result'] = Qdmvc_Helper::getNoneText();
        switch ($query) {
            case 'is_logged_in':
                if(is_user_logged_in()){
                    $re['result'] = '1';
                }else{
                    $re['result'] = '0';
                }
                break;
        }
        echo json_encode($re);
    }

}