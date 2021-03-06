<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <link rel="stylesheet" href="{{asset('style/admin/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('style/admin/css/admin.css')}}">
    <script src="{{asset('style/admin/js/jquery.js')}}"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="{{asset('style/admin/images/y.jpg')}}" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="?r=login/logout"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2>电影管理</h2>
    <ul>
        <li><a href="{{URL('admin/moveadd')}}" target="right"><span class="icon-caret-right"></span>电影添加</a></li>
        <li><a href="{{URL('admin/movelist')}}" target="right"><span class="icon-caret-right"></span>电影列表</a></li>
    </ul>
    <h2>套餐管理</h2>
    <ul>
        <li><a href="{{URL('admin/foot')}}" target="right"><span class="icon-caret-right"></span>添加食品</a></li>
        <li><a href="{{URL('admin/footshow')}}" target="right"><span class="icon-caret-right"></span>食品列表</a></li>
        <li><a href="{{URL('admin/package')}}" target="right"><span class="icon-caret-right"></span>添加套餐</a></li>
        <li><a href="{{URL('admin/packageshow')}}" target="right"><span class="icon-caret-right"></span>套餐展示</a></li>
    </ul>
    <h2>订单管理</h2>
    <ul>
        <li><a href="?r=order/order" target="right"><span class="icon-caret-right"></span>订单列表</a></li>
    </ul>
    <h2>权限管理</h2>
    <ul>
        <li><a href="?r=rbac/role" target="right"><span class="icon-caret-right"></span>角色控制</a></li>
        <li><a href="?r=rbac/power" target="right"><span class="icon-caret-right"></span>权限控制</a></li>
        <li><a href="?r=rbac/role-power" target="right"><span class="icon-caret-right"></span>角色赋权</a></li>
        <li><a href="?r=rbac/user-role" target="right"><span class="icon-caret-right"></span>用户角色控制</a></li>
    </ul>
    <h2>咨询管理</h2>    <ul>
        <li><a href="homeList" target="right"><span class="icon-caret-right"></span>厅号列表</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>
<ul class="bread">
    <li><a href="?r=admin/" target="_self" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="{{URL('admin/info')}}" name="right" width="100%" height="100%"></iframe>
</div>

<div style="text-align:center;">
    <p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>