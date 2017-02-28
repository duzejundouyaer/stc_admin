<?php
namespace backend\controllers;

use app\models\Man;
use app\models\Order;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class ManController extends CommonController{
    public $layout=false;
    public $enableCsrfValidation=false;
    //服务商列表
    public function actionIndex(){
        $request=Yii::$app->request;
        if($request->isPost){
            $id=$request->post('id');
            $man_examine=$request->post('man_examine');
            if($man_examine==0){
                $examine=1;
            }else{
                $examine=0;
            }
            $sql="update tcs_man set man_examine='$examine' where man_id='$id'";
            $data=Yii::$app->db->createCommand($sql)->query();
            if($data){
                echo "OK";
            }
        }else{
            $user = new Man();
            // 查询总数
            $user_count = $user->find()->where('man_del=0')->count();
            $data['pages'] = new Pagination(['totalCount' => $user_count]);
            // 设置每页显示多少条
//             $data['pages']->defaultPageSize = 3;
            $user_list = $user->find()->offset($data['pages']->offset)->limit($data['pages']->limit)->asArray()->where('man_del=0')->all();
            $data['pages']->params=array("tab"=>'all');
            return $this->render('man.html',[
                'data' => $data,
                'man' => $user_list,
            ]);
        }
    }
    //维修点列表
    public function actionRepair(){
        return $this->render('repair.html');
    }
    //删除服务商
    public function actionDel(){
        $request=Yii::$app->request;
        if($request->isPost){
            $msg=$request->post('msg');
            if($msg==1){
                $id=$request->post('id');
                $sql="update tcs_man set man_del=0 where man_id='$id'";
                $data=Yii::$app->db->createCommand($sql)->query();
            }else{
                $id=$request->post('id');
                $sql="update tcs_man set man_del=1 where man_id='$id'";
                $data=Yii::$app->db->createCommand($sql)->query();
            }
            if($data){
                echo "OK";
            }else{
                echo "ON";
            }
        }else{
            $user = new Man();
            // 查询总数
            $user_count = $user->find()->where('man_del=1')->count();
            $data['pages'] = new Pagination(['totalCount' => $user_count]);
            // 设置每页显示多少条
//             $data['pages']->defaultPageSize = 3;
            $user_list = $user->find()->offset($data['pages']->offset)->limit($data['pages']->limit)->asArray()->where('man_del=1')->all();
            $data['pages']->params=array("tab"=>'all');
            return $this->render('man.html',[
                'data' => $data,
                'man' => $user_list,
            ]);
        }
    }
}

