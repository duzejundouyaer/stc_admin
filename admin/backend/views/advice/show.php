<?php
use yii\widgets\LinkPager;
?>
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
  <div class="panel-head"><strong class="icon-reorder"> 咨询列表</strong></div>
  <div class="padding border-bottom">  
  <button type="button" class="button border-yellow" onclick="window.location.href='?r=advice/add'"><span class="icon-plus-square-o"></span> 添加咨询</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">咨询标题</th>
      <th width="10%">咨询图片</th>
      <th width="15%">咨询描述</th>
      <th width="15%">咨询内容</th>
    </tr>
      <?php foreach($models as $val){ ?>
          <tr  ids="<?php echo $val['advice_id'] ?>">
              <td><?php echo $val['advice_id']?></td>
              <td><?php echo $val['advice_title']?></td>
              <td><img src="<?php echo $val['advice_img']?>" width="120px" height="120px" alt=""/></td>
              <td><?php echo $val['advice_desc']?></td>
              <td><?php echo $val['advice_con']?></td>
              <td>
                  <div class="button-group">
                      <!--<a class="button border-main" href="#add"><span class="icon-edit"></span> 修改</a>-->
                      <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $val['advice_id'] ?>)"><span class="icon-trash-o"></span> 删除</a>
                  </div>
              </td>
          </tr>
      <?php }?>
  </table>
    <center>
    <?php
        echo LinkPager::widget([
             'pagination' => $pages,
         ]);
        ?>
    </center>
</div>
<script type="text/javascript">
function del(id) {
    if(confirm("您确定要删除吗?")){
        $.ajax({
            type:"post",
            url: "?r=advice/del",
            data: {id:id},
            success: function(msg){
                if(msg=="OK"){
                    location.href='?r=advice/index'
                }else{
                    location.href=''
                }
            }
        });
    }
}
</script>
</body></html>