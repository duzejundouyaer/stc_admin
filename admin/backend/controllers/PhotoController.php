<?php
namespace backend\controllers;

use app\models\Order;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\UploadForm1;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class PhotoController extends Controller
{

    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $model = new UploadForm1();
        if($request->isPost)
        {
            $file=$model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            //print_r($file);die;
            foreach ($file as $key => $v){
                $image[]=$v->name;
            }
            //print_r($image);die;
            $images=implode(',',$image);
            if($model->upload())
            {
                $connection = \Yii::$app->db;
                $connection->createCommand()->insert('upload', [
                    'image' => $images,
                ])->execute();
            }
        }
        else
        {
            return $this->render('upload1',['model' => $model]);
        }
    }
}