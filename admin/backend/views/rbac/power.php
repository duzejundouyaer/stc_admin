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
  <div class="panel-head"><strong><span class="icon-key"></span> 权限管理</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="?r=rbac/power">
      <div class="form-group">
        <div class="label">
          <label for="sitename">权限控制：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
           添加
          </label>
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">权限名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="power_name" size="50" placeholder="权限名称"
                 data-validate="required:请输入权限名称"/>
        </div>
      </div>
        <div class="form-group">
            <div class="label">
                <label for="sitename">权限描述：</label>
            </div>
            <div class="field">
                <input type="text" class="input w50" id="mpass" name="power_desc" size="50" placeholder="权限描述"
                       data-validate="required:请输入权限描述"/>
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