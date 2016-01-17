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
            case 'test':
                set_time_limit(2);
                for($i=0;$i<200000;$i++){
                    $tmp = QdDgRequest::getInitObj();
                    $tmp->suggest_price = rand();
                    $tmp->price = rand();
                    $tmp->save();
                }
                break;
            case 'test2':
                $start = microtime(true);

                $tmp = new QdDgRequest();
                $tmp->SETRANGE('status', QdDgRequest::$STATUS_OPEN);
                $count = $tmp->COUNTLIST();

                $re['result'] = "SUM total $count records with Status=Open: " . $tmp->SELECTSUM('suggest_price');
                $start = microtime(true)-$start;
                $re['result'] .= ' - Execute time: '.$start .' (second)';
                break;
            case 'test3':
                $re['result'] = $_SERVER['HTTP_HOST'];
                break;
            case 'get_note':
                $p = new QdNote();
                $re['result'] = QdNote::toJSON($p->GETLIST());
                break;
            case 'zip':
                $re['result'] = Qdmvc::extractQdmvcCoreFiles();
                break;
        }
        echo json_encode($re);
    }

}