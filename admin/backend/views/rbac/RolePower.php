<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-key"></span>权限管理</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="">
            <div class="form-group">
                <div class="label">
                    <label for="sitename">角色赋权：</label>
                </div>
                <div class="field">
                    <label style="line-height:33px;">
                        添加
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">角色名称：</label>
                </div>
                <div class="field">
                    <?php foreach($role as $key=>$val){?>
                        <?php echo $val['role_name']?> <input type="radio" class="input w50" id="mpass" name="role_id" size="50" value="<?php echo $val['role_id']?>" /><br>
                    <?php }?>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label for="sitename">权限名称：</label>
                </div>
                <div class="field">
                    <?php foreach($power as $key=>$val){?>
                        <?php echo $val['power_name']?> <input type="checkbox" class="input w50" id="mpass" name="power_id[]" size="50" value="<?php echo $val['power_id']?>" /><br>
                    <?php }?>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body></html>