<?php
namespace backend\controllers;

use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\data\Pagination;
/**
 * Site controller
 */
class OrderController extends CommonController{
    public $layout=false;
    public $enableCsrfValidation=false;
    //订单列表
    public function actionOrder(){
        $request=Yii::$app->request;
        if($request->isPost){
            $search=$request->post('search');
            if(preg_match("/^1[34578]{1}\d{9}$/",$search)){
                $sql="select * from tcs_order inner join tcs_fault on tcs_order.fault_id=tcs_fault.fault_id where user_phone='$search'";
            }else{
                $sql="select * from tcs_order inner join tcs_fault on tcs_order.fault_id=tcs_fault.fault_id where user_name like '%$search%'";
            }
            $data=Yii::$app->db->createCommand($sql)->queryAll();
            return $this->render('order_search.html',['data'=>$data,'search'=>$search]);
        }else{
//            $sql="select * from tcs_order inner join tcs_fault on tcs_order.fault_id=tcs_fault.fault_id";
//            $data=Yii::$app->db->createCommand($sql)->queryAll();
//            return $this->render('order.html',['data'=>$data]);


            $sql="select * from tcs_order inner join tcs_fault on tcs_order.fault_id=tcs_fault.fault_id";
            $data=Yii::$app->db->createCommand($sql)->queryAll();

            $pages = new Pagination(['totalCount' => count($data)]);
            $list = Yii::$app->db->createCommand($sql." limit ".$pages->limit." offset ".$pages->offset."")->queryAll();
            $dataprovider = new ArrayDataProvider([
                'allModels' => $list,
            ]);
//            print_r($dataprovider);
            return $this->render('order.html',[
                'data' => $dataprovider,
                'pages' => $pages,
            ]);
        }
    }
    public function actionOrder_state(){
        $request=Yii::$app->request;
        $order_id=$request->get('order_id');
        $data=Yii::$app->db->createCommand()->update('tcs_order', ['order_state' => 3], "order_id = $order_id")->execute();
        if($data){
            echo 0;
        }else{
            echo 1;
        }
    }
}