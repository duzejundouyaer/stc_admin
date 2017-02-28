<?php
namespace backend\controllers;

use app\models\Admin;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class LoginController extends Controller
{
    public $layout=false;
    public $enableCsrfValidation=false;
    //登录页面
    public function actionIndex(){
        $request = Yii::$app->request;
        if($request->isPost){
            $bank=$request->post('bank');
            $pwd=md5($request->post('pwd'));

            $data=Admin::find()
                ->asArray()
                ->where(['admin_name'=>$bank,'admin_pwd'=>$pwd])
                ->one();
            if($data){
                $session = Yii::$app->session;
                $session->open();
                $session['admin_id'] = $data['admin_id'];
                $session['admin_name'] = $data['admin_name'];
                $session->close();
                echo 0;
            }else{
                echo 1;
            }
        }else{
            $session=\Yii::$app->session;
            $session->open();
            if($session->has('admin_name')){
                return $this->redirect('?r=admin/index');
            }else{
                $session->close();
                return $this->render('login.html');
            }
        }
    }

    //退出登录
    public function actionLogout(){
        $session=\Yii::$app->session;
        $session->open();
        $arr=$session->remove('admin_id');
        $ser=$session->remove('admin_name');
        if($arr&&$ser){
            return $this->redirect('?r=login/index');
        }
        $session->close();
    }
}
