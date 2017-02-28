<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Advice;

class AdviceController extends CommonController
{
    public $enableCsrfValidation=false;
    /*
     * 列表页面展示
     */
    public function actionIndex(){
            //查询数据中的数据进行分页展示
            $query = Advice::find();
            $countQuery = clone $query;
            $pages = new Pagination(['totalCount' => $countQuery->count()]);
            $models = $query->offset($pages->offset)
                     ->limit($pages->limit)
                     ->all();
             return $this->renderPartial('show', [
                'models' => $models,
                'pages' => $pages,
            ]);
        }

    public function actionAdd(){
        if(yii::$app->request->isPost){

            $advice_img = $_FILES['advice_img'];
            if(empty($advice_img)){
                return "请您上传图片";
            }
            $advice_title = yii::$app->request->post('advice_title');
            $advice_desc = yii::$app->request->post('advice_desc');
            $advice_con = yii::$app->request->post('advice_con');

            //获取文件信息
            $arr = pathinfo($advice_img['name']);
            $type = $arr['extension'];
            //创建图片文件夹
            $time = date("Y-m-d");
            $path = "upload/$time";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $images_name = date('Ymd') . rand(10000, 99999);

            $name = "$path/" . "$images_name" . "." . "$type";
            move_uploaded_file($advice_img['tmp_name'], $name);
            $sql = "insert into tcs_advice (advice_title,`advice_img`,`advice_desc`,`advice_con`) values ('$advice_title','$name','$advice_desc','$advice_con')";

            $data = Yii::$app->db->createCommand($sql)->execute();

            if ($data) {
               return $this->redirect('?r=advice/index');
            }

        }
        return $this->renderPartial('add');
    }

    public function actionDel(){
        //接受要删除的id值
        $id = yii::$app->request->post('id');
        $sql = "delete from `tcs_advice` where `advice_id`= '$id'";
        $res = yii::$app->db->createCommand($sql)->execute();
        if($res){
            return "OK";
        }
    }



















}