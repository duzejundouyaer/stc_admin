<!DOCTYPE html>
<html>
    <head>
        <title>登陆页面</title>
         <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
        <link href="{{asset('style/home/login/css/login.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('style/home/login/css/global.css')}}" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="{{asset('style/login/js/login.js')}}"></script>
    </head>
    <body>
        <div class="login">
            <div class="login-title"><p>登录</p>
                <i></i>
            </div>
              <div align="center" class="margin-top:20px;">
                <a style="font-size: 16px; color:#FF2D2D;" id="errors"></a>
                @if(session('errors'))
            <p style="font-size: 16px; color:#FF2D2D;" id="errors">{{session('errors')}}</p>
          @endif
            </div>
            <form method="post" action="{{URL('checklogin')}} ">
            {{csrf_field()}}
            
            <div class="login-bar">
                <ul>

                    <li><img src="{{asset('style/home/login/images/login_user.png')}}"><input type="text" name="username" id="name" class="text" placeholder="请输入用户名" /></li>
                    <li><img src="{{asset('style/home/login/images/login_pwd.png')}}"><input type="password" class="psd" id="pwd" name="password" placeholder="请输入确认密码" /></li>
                </ul>
            </div>
            <div class="login-btn">
                <button class="submit" type="submit">登陆</button>
                <a href="{{URL('register')}}"><div class="login-reg"><p>莫有账号，先注册</p></div></a>
            </div>
            </form>
           
    <div style=" margin-top:40px; margin-right:40px;" align="center">
        <a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101371415&redirect_uri=http://xiaodu.duzejun.cn/&state=test&display=mobile">
            <img src="{{asset('style/home/login/images/qq.png')}}"style="margin:10px auto;width:38px;height:38px;border-radius:40px;overflow:hidden;">
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="https://api.weibo.com/oauth2/authorize?client_id=897879465&redirect_uri=http://study.duzejun.cn/weibo&display=mobile"><img src="{{asset('style/home/login/images/xin.png')}}" style="margin:10px auto;width:38px;height:38px;border-radius:40px;overflow:hidden;"alt=""></a>
        </div>

    </body>
</html>
<script src="{{asset('style/home/js/jquery.1.12.js')}}"></script>
<script>
    
   $('.text').blur(function(){
    var username=$('#name').val();
   // alert(1);
   if(username=="")
   {
        $('#errors').html('用户名不能为空');
        return false;
   } else if(!(/^1(3|4|5|7|8)\d{9}$/.test(username))){
                $("#errors").html("请输入正确的手机号");
                return false;
       }
     })
   $('#pwd').blur(function(){
    var pwd =$('#pwd').val();
    if(pwd==''){
        $('#errors').html('密码不能为空');
        return false;
    } 
   })
   $('form').submit(function(){
        var username=$('#name').val();
         var pwd =$('#pwd').val();
         if(username=='' || pwd ==""){
            $('#errors').html("请输入用户名或密码");
            return false;
         }
   })
</script>