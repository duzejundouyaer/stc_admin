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
  <div class="panel-head"><strong class="icon-reorder"> 导航列表</strong></div>
  <div class="padding border-bottom">

  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="10%">导航名称</th>
      <th width="10%">操作</th>
    </tr>
      <?php foreach($nav as $key=>$val){?>
          <tr  ids="<?php echo $val['header_id'] ?>">
            <td><?php echo $val['header_id']?></td>
            <td>
                <center>
                <span class="header_name"><?php echo $val['header_name']?></span>
                <input class="header_input" type="text"  style="display: none;text-align: center" name="header_name" value="<?php echo $val['header_name']?>">
                </center>
            </td>
              <td>
                <div class="button-group">
<!--                <a class="button border-main" href="?r=nav/update"><span class="icon-edit"></span> 修改</a>-->
                <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $val['header_id'] ?>)"><span class="icon-trash-o"></span> 删除</a>
              </div>
              </td>
        </tr>
      <?php }?>
  </table>
</div>
<script type="text/javascript">

    $(".header_name").click(function () {
        var _this=$(this);
        _this.css('display','none');
        _this.next().css('display','block').focus();
    });

    $(".header_input").blur(function () {
        var _this=$(this);
        var id=_this.parents('tr').attr('ids');
        var name=_this.attr('name');
        var text=_this.val();
        $.ajax({
            url: "?r=nav/update",
            data: {id:id,name:name,text:text},
            success: function(msg){
                if(msg=="OK"){
                    _this.css('display','none');
                    _this.prev().html(text);
                    _this.prev().css('display','block')
                }else{
                    _this.css('display','none');
                    _this.prev().css('display','block')
                }
            }
        });
    })

function del(id){
        $.ajax({
            url: "?r=nav/delete",
            data: {id:id},
            success: function(msg){
                if(msg=='OK'){
                   location.href = '?r=nav/show'
                }
            }
        });
}
</script>
</body></html>