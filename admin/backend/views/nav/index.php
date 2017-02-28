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
  <div class="panel-head"><strong><span class="icon-key"></span> 导航添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="?r=nav/index">
      <div class="form-group">
        <div class="label">
          <label for="sitename">导航名称：</label>
        </div>
          <div class="field">
          <input type="text" class="input w50" name="header_name" size="50" placeholder="请输入导航名称" data-validate="required:请输入导航名称" />
        </div>
          <div class="label" style="margin-top: 20px;">
              <label for="sitename">导航名称：</label>
          </div>
          <div class="field" style="margin-top: 20px;">
              <input type="text" class="input w50" name="header_table" size="50" placeholder="请输入导航控制器" data-validate="required:请输入导航控制器" />
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