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
    <div class="panel-head"><strong class="icon-reorder"> 套餐列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='{{URL('admin/package')}}'">
            <span class="icon-plus-square-o"></span>
            添加套餐
        </button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">套餐名称</th>
            <th width="20%">套餐图片</th>
            <th width="10%">套餐原价</th>
            <th width="10%">折扣</th>
            <th width="10%">折扣后价钱</th>
            <th width="10%">套餐组合</th>
        </tr>
        @foreach($pack as $v)
            <tr>
                <td>{{$v->pack_name}}</td>
                <td><img src="{{asset($v->pack_img)}}" alt="" width="120" height="50" /></td>
                <td>{{$v->original_price}}</td>
                <td>{{$v->zheshu}}折</td>
                <td>{{$v->discount_price}}</td>
                <td>
                    <select>
                        @foreach($v->foot as $val)
                        <option value="{{$val->id}}">{{$val->foot_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <div class="button-group">
                        <a class="button border-red" href="javascript:void(0)" onclick="")><span class="icon-trash-o"></span> 删除</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>