<?php

?>
        <!DOCTYPE html>
<html lang="zh-cn" id="b">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="{{asset('style/admin/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('style/admin/css/admin.css')}}">
    <script src="{{asset('style/admin/js/jquery.js')}}"></script>
    <script src="{{asset('style/admin/js/pintuer.js')}}"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 食品列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='{{URL('admin/foot')}}'">
            <span class="icon-plus-square-o"></span>
            添加课程
        </button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">食品名称</th>
            <th width="20%">食品图片</th>
            <th width="10%">食品价格</th>
        </tr>
        @foreach($foot as $v)
        <tr>
            <td>{{$v->foot_name}}</td>
            <td><img src="{{asset($v->img)}}" alt="" width="120" height="50" /></td>
            <td>{{$v->price}}</td>
            <td>
                <div class="button-group">
                    <a class="button border-red" href="javascript:void(0)" onclick="")><span class="icon-trash-o"></span> 删除</a>
                </div>
            </td>
        </tr>
            @endforeach
    </table>
    {!! $foot->links() !!}
    第{{$foot->currentPage()}}页
</div>
<script type="text/javascript">
    //删除
    function del(id) {
        if(confirm('确定删除吗？还有学习视频哦')){
            $.ajax({
                url:"?r=column/del",
                data:{id:id},
                type:"POST",
                success:function(msg){
                    alert(msg)
                }
            });
        }
    }
    //播放4
    function ch(obj) {
        var id=obj.value;
        $.ajax({
            url:"?r=column/video",
            data:{video_id:id},
            type:"POST",
            success:function(msg){
                if(msg!=1){
                    location.href="?r=column/showvideo&video="+msg;
                }
            }
        });
    }
    //分页
    function page(page){
        //获取搜索的数据
        var username = $("#username").val();
        var type_id = $('#type').val();
        $.ajax({
            url:"?r=column/show",
            data:{pages:page,username:username,type_id:type_id},
            type:"POST",
            success:function(la){
                $("#b").html(la);
            }
        });
    }
    $(document).on('change','.onchge',function () {
        var id=$(this).val();
        var _this = $(this);
        $.ajax({
            type: "POST",
            url: "?r=column/change",
            data: {id:id},
            dataType:"json",
            success: function(msg){
                if(msg == 0){
                    _this.parent('td').next().html("<span>不好意思,这个章节没有资源</span>");
                    return false;
                }else {
                    var str = '';
                    str+="<select name='' class='jie' onchange='ch(this)'>";
                    str+="<option value=''></option>";
                    for (var i=0;i<msg.length;i++){
                        str+="<option value="+msg[i]['id']+">"+msg[i]['file_name']+"</option>";
                    }
                    str+="</select>";
                    _this.parent('td').next().html(str);
                }
            }
        });
    })
</script>
</body>
</html>