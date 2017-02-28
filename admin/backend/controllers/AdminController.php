<?php
namespace backend\controllers;

use app\models\Order;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class AdminController extends CommonController
{
    public $layout=false;
    public $enableCsrfValidation=false;
    public function actionIndex(){
        return $this->render('index.html');
    }
    public function actionInfo(){
        return $this->render('info.html');
    }
    public function actionPass(){
        return $this->render('pass.html');
    }
    public function actionPage(){
        return $this->render('page.html');
    }
    public function actionBook(){
        return $this->render('book.html');
    }
    public function actionColumn(){
        return $this->render('column.html');
    }
    public function actionList(){
        return $this->render('list.html');
    }
    public function actionAdd(){
        return $this->render('add.html');
    }
    public function actionCate(){
        return $this->render('cate.html');
    }
}
