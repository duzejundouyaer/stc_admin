<!DOCTYPE html>
<html lang="zh-cn">
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
    <div class="panel-head"><strong class="icon-reorder"> 电影列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='{{URL('moveadd')}}'">
            <span class="icon-plus-square-o"></span>
            添加添加
        </button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">编号</th>
            <th width="10%">名称</th>
            <th width="10%">封面</th>
            <th width="10%">类型</th>
            <th width="10%">时长</th>
            <th width="10%">最新</th>
            <th width="10%">最热</th>
            <th width="10%">上线</th>
            <th width="15%">操作</th>
        </tr>
        <?php foreach ($data as $k=>$v):?>
        <tr ids="<?=$v['movie_id']?>">
            <td><?=$v['movie_id']?></td>
            <td><?=$v['movie_name']?></td>
            <td><a href="{{asset($v['movie_img'])}}"><img src="{{asset($v['movie_img'])}}" alt="" width="30" height="30"/></a></td>
            <td><?=$v['movie_type']?></td>
            <td><?=$v['movie_length']?></td>
            <td>
                <?php if($v['is_new']==1){?>
                    <span class="is_new">yes</span>
                <?php }else{?>
                    <span class="is_new">no</span>
                <?php }?>
            </td>
            <td>
                <?php if($v['is_hot']==1){?>
                <span class="is_hot">yes</span>
                <?php }else{?>
                <span class="is_hot">no</span>
                <?php }?>
            </td>
            <td>
                <?php if($v['is_status']==1){?>
                <span class="is_status">yes</span>
                <?php }else{?>
                <span class="is_status">no</span>
                <?php }?>
            </td>
            <td>
                {{--<div class="button-group">--}}
                    {{--<a class="button border-main" href="">--}}
                    <a href="">
                        <span class="icon-edit"></span> 修改
                    </a>
                    {{--<a class="button border-red" href="javascript:void(0)">--}}
                    <a href="javascript:void(0)">
                        <span class="icon-trash-o"></span> 删除
                    </a>
                {{--</div>--}}
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
<div class="page_list">
    {{$data->links()}}
</div>
</body>
<script>
    $(document).ready(function(){
        $(".is_new").click(function(){
            var _this=$(this);
            //alert(_this.html());
            var movieid=_this.parents("tr").attr('ids');
            var _token="{{csrf_token()}}";
            if(_this.html()=="yes"){
                var str=0;
            }else{
                var str=1;
            }
            $.ajax({
                type: "POST",
                url: "{{URL('admin/isnew')}}",
                dataType: "json",
                data: {movieid:movieid,str:str,_token:_token},
                success: function(msg){
                    if(msg.code!=1){
                       alert(msg.info);
                        return false;
                    }
                    if(str==1){
                        _this.html("yes");
                    }else{
                        _this.html("no");
                    }
                }
            });
        })

        $(".is_hot").click(function(){
            var _this=$(this);
            //alert(_this.html());
            var movieid=_this.parents("tr").attr('ids');
            var _token="{{csrf_token()}}";
            if(_this.html()=="yes"){
                var str=0;
            }else{
                var str=1;
            }
            $.ajax({
                type: "POST",
                url: "{{URL('admin/ishot')}}",
                dataType: "json",
                data: {movieid:movieid,str:str,_token:_token},
                success: function(msg){
                    if(msg.code!=1){
                        alert(msg.info);
                        return false;
                    }
                    if(str==1){
                        _this.html("yes");
                    }else{
                        _this.html("no");
                    }
                }
            });
        })

        $(".is_status").click(function(){
            var _this=$(this);
            //alert(_this.html());
            var movieid=_this.parents("tr").attr('ids');
            var _token="{{csrf_token()}}";
            if(_this.html()=="yes"){
                var str=0;
            }else{
                var str=1;
            }
            $.ajax({
                type: "POST",
                url: "{{URL('admin/isstatus')}}",
                dataType: "json",
                data: {movieid:movieid,str:str,_token:_token},
                success: function(msg){
                    if(msg.code!=1){
                        alert(msg.info);
                        return false;
                    }
                    if(str==1){
                        _this.html("yes");
                    }else{
                        _this.html("no");
                    }
                }
            });
        })
    })
</script>
</html>