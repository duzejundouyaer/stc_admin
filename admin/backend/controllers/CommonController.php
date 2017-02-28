<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class CommonController extends Controller
{
    public function CheckAccess(){

        //从session读取用户信息
        session_start();
        $controller =  yii::$app->controller->id;

        $admin_id =  $_SESSION['admin_id'];

        $sql = "select `power_name` from `tcs_power` where power_id in (select power_id from tcs_role_power where role_id  in (select role_id from tcs_admin_role where admin_id='$admin_id'))";

        $power_name = yii::$app->db->createCommand($sql)->queryAll();

        $power = [];
        for($i=0;$i<count($power_name);$i++){
            $power[$i] = $power_name[$i]['power_name'];
        }

        $controller = yii::$app->controller->id;

        if($controller=="admin" || $controller=='common'){
            return true;
        }
        $res = in_array($controller,$power);

        if($res){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 验证用户是否登录
     */
    public function init(){
        $session=\Yii::$app->session;
        $session->open();
        if(!$session->has('admin_name')){
            return $this->redirect('?r=login/index');
        }
        $session->close();
    }


    /*
     * 信息提示页面
     */
    public function message($msg='请先登录',$url='login',$wait=1,$type=0)
    {
        $data = [
            'title'=> '提示消息',
            'msg' => $msg,
            'url' => $url,
            'wait'=> $wait,
            'type'=> $type
        ];
        if ($type == 0)
        {
            $data['title'] = '提示消息';
        }
        if (empty($url))
        {
            $data['url'] = "javascript:history.back(-1);";
        }
        die( $this->renderpartial('message',$data));
    }
}
