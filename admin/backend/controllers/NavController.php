<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class NavController extends CommonController
{
    public $layouts = false;
    public $enableCsrfValidation = false;

    /*
     * 导航添加
     */
    public function actionIndex(){
        if(yii::$app->request->isPost){
            $header_name = yii::$app->request->post('header_name');
            $header_table = yii::$app->request->post('header_table');
            //数据入库
            $sql = "insert into `tcs_header`(`header_name`,`header_is_show`,`header_sort`,`header_table`) values('$header_name','1','10','$header_table')";
            $res = yii::$app->db->createCommand($sql)->execute();

            if($res){
               return $this->redirect('?r=nav/show');
            }else{
                return $this->redirect('?r=nav/show');
            }
        }
        return $this->renderPartial('index');
    }

    /*
     * 导航展示
     */

    public function actionShow(){
        //查询数据库进行效果展示
        $sql = "select `header_id`,`header_name` from `tcs_header`";
        $navData = yii::$app->db->createCommand($sql)->queryAll();

        return $this->renderPartial('show',['nav'=>$navData]);
    }

    /*
     * 导航修改
     */
    public function actionUpdate(){
        $header_name = yii::$app->request->get('name');
        $header_id = yii::$app->request->get('id');
        $header_text = yii::$app->request->get('text');

        $sql = "update `tcs_header` set $header_name ='$header_text' where `header_id`='$header_id'";
        $res = yii::$app->db->createCommand($sql)->execute();
        if($res){
            return 'OK';
        }else{
            return false;
        }
    }

    /*
     * 导航删除
     */

    public function actionDelete(){
        $header_id = yii::$app->request->get('id');
        $sql = "delete from `tcs_header` where `header_id` = '$header_id'";

        $res = yii::$app->db->createCommand($sql)->execute();
        if($res){
            return 'OK';
        }else{
            return false;
        }
    }














}