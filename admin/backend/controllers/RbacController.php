<?php
namespace backend\controllers;

use Yii;
use yii\web\controller;

class RbacController extends CommonController
{
    public $layouts = false;
    public $enableCsrfValidation = false;

    /*
     * 角色控制
     */
    public function actionRole()
    {
        if (yii::$app->request->isPost) {
            $role_name = yii::$app->request->post('role_name');
            if (empty($role_name)) {
                $msg = '您的用户名不能为空';
                $url = '?r=rbac/role';
                $this->message($msg, $url);
            } else {
                //角色入库
                $sql = "insert into `tcs_role`(`role_name`) values('$role_name')";
                $res = yii::$app->db->createCommand($sql)->execute();
                if ($res) {
                    $msg = '您的角色添加成功';
                    $url = '?r=rbac/role';
                    $this->message($msg, $url);
                } else {
                    $msg = '角色添加失败';
                    $url = '?r=rbac/role';
                    $this->message($msg, $url);
                }
            }
        }
        return $this->renderPartial('role');
    }


    /*
     * 权限控制
     */
    public function actionPower()
    {
        if (yii::$app->request->isPost) {
            $power_name = yii::$app->request->post('power_name');
            $power_desc = yii::$app->request->post('power_desc');
            if (empty($power_name) || empty($power_desc)) {
                $msg = '您的权限名和权限描述不能为空';
                $url = '?r=rbac/power';
                $this->message($msg, $url);
            } else {
                //角色入库
                $sql = "insert into `tcs_power`(`power_name`,`power_desc`) values('$power_name','$power_desc')";
                $res = yii::$app->db->createCommand($sql)->execute();
                if ($res) {
                    $msg = '您的权限添加成功';
                    $url = '?r=rbac/power';
                    $this->message($msg, $url);
                } else {
                    $msg = '您的权限添加失败';
                    $url = '?r=rbac/power';
                    $this->message($msg, $url);
                }
            }
        }
        return $this->renderPartial('power');
    }

    /*
     * 给角色赋权
     */
    public function actionRolePower()
    {

        if (yii::$app->request->isPost) {
            //接受角色和权限id并入库
            $role_id = yii::$app->request->post('role_id');
            $power_id = yii::$app->request->post('power_id');

            $flog = 0;
            for ($i = 0; $i < count($power_id); $i++) {
                $powerId = $power_id[$i];
                $sql = "insert into `tcs_role_power`(`role_id`,`power_id`) values('$role_id','$powerId')";
                $res = yii::$app->db->createCommand($sql)->execute();
                if ($res) {
                    $flog = 1;
                }
            }

            if ($flog) {
                $msg = '角色赋权成功';
                $url = '?r=rbac/role-power';
                $this->message($msg, $url);
            }
        } else {
            //查询角色
            $sql = "select * from `tcs_role`";
            $roleData = yii::$app->db->createCommand($sql)->queryAll();

            //查询权限
            $sql = "select * from `tcs_power`";
            $powerData = yii::$app->db->createCommand($sql)->queryAll();

            return $this->renderPartial('RolePower', ['role' => $roleData, 'power' => $powerData]);
        }

    }

    /*
       * 用户角色控制
       */
    public function actionUserRole()
    {

        if (yii::$app->request->isPost) {
            //接受角色和权限id并入库
            $admin_id = yii::$app->request->post('admin_id');
            $role_id = yii::$app->request->post('role_id');

            $flog = 0;
            for ($i = 0; $i < count($role_id); $i++) {
                $roleId = $role_id[$i];
                $sql = "insert into `tcs_admin_role`(`admin_id`,`role_id`) values('$admin_id','$roleId')";
                $res = yii::$app->db->createCommand($sql)->execute();
                if ($res) {
                    $flog = 1;
                }
            }

            if ($flog) {
                $msg = '用户角色赋权成功';
                $url = '?r=rbac/user-role';
                $this->message($msg, $url);
            }
        } else {

            //查询用户
            $sql = "select * from `tcs_admin`";
            $userData = yii::$app->db->createCommand($sql)->queryAll();

            //查询角色
            $sql = "select * from `tcs_role`";
            $roleData = yii::$app->db->createCommand($sql)->queryAll();


            return $this->renderPartial('UserRole', ['user' => $userData, 'role' => $roleData]);
        }
    }

}