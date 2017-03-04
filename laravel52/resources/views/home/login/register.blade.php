<!DOCTYPE html>
<html>
    <head>
        <title>注册页面</title>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta http-equiv="Access-Control-Allow-Origin" content="*">
        <link href="{{asset('style/home/login/css/register.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('style/home/login/css/global.css')}}" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="{{asset('style/home/login/js/register.js')}}"></script>
    </head>
    <body>
        <div id="layout">
            <span>注册</span>
            <form action="{{URL('adds')}}" method="post" id="form">
            {{csrf_field()}}
            <ul>
            
                <p align="center" style="font-size: 16px; color:#FF2D2D;" id="errorInfo"></p>
           
             
                <p id="err_msg"></p>
                <li><i class="un"><img src="{{asset('style/home/login/images/user_name.png')}}"></i><input class="username" type="text" id="username" name="tel" placeholder="请输入手机号" /></li>
                <li><i class="yz"><img src="{{asset('style/home/login/images/msg.png')}}"></i><input class="yzm" type="text" id="code" placeholder="请输入手机验证码" /><input type="button" id="send" value="获取验证码" /></li>
                <li><i class="pw"><img src="{{asset('style/home/login/images/pwd.png')}}"></i><input class="pwd" type="password" placeholder="请输入密码" id="password" name="pwd" /></li>
                <li><i class="pw2"><img src="{{asset('style/home/login/images/pwd.png')}}"></i><input class="pwd2" type="password" placeholder="请输入确认密码" /></li>
                <div class="queren"><input class="fx" type="checkbox" checked="checked" /><p>我已阅读并同意《用户协议》</p></div>
            </ul>
                <div class="reg_btn">
                    <button class="submit" type="submit">注册</button>
                    <input type="hidden" value="" id="error">
                    <a href="{{URL('login')}}"><div class="reg-login"><p>已有帐号，立即登陆</p></div></a>
                </div>
            </form>
           
        </div>
    </body>
</html>
<script src="{{asset('style/home/js/jquery.1.12.js')}}"></script>
<script>

 $(document).on('blur','#username',function () {
       // alert(1);
        var username=$(this).val();
        if(username==''){
            $("#errorInfo").html("请输入手机号");
                return false;
        }
    })
 $(document).on('blur','.pwd',function () {
       // alert(1);
        var pwd=$(this).val();
        if(pwd==''){
            $("#errorInfo").html("请输入密码");
                return false;
        }
    })
 $(document).on('blur','.pwd2',function () {
       // alert(1);
        var pwd2=$(this).val();
        if(pwd2==''){
            $("#errorInfo").html("请输入确定密码");
                return false;
        }
    })
 // $(document).on('blur','#code',function () {
 //       // alert(1);
 //        var code=$(this).val();
 //        if(code==''){
 //            $("#errorInfo").html("请获取验证码");
 //                return false;
 //        }
 //    })

    $(document).on('blur','#code',function () {
        var code = $(this).val();
        //alert(code);
        if(code==""){
             $("#errorInfo").html("请获取验证码");
        }else{
             $.ajax({
                  type: "get",
                  url: "{{URL('contrast')}}",
                  data: {code:code},
                 success: function(msg){
               if(msg == 1){
                   $("#error").val(1);
                   $("#errorInfo").html("验证码正确");
                   return true
               }else {
                   $("#errorInfo").html("验证码不正确");
                   $("#error").val(0);
                   return false;
               }
            }
        });
        }
    })

    $(document).ready(function(){
        $("#send").click(function(){
            var a=time(this);
            var tel = $('#username').val();
            if(tel == ''){
                $("#errorInfo").html("请输入手机号");
                return false;
            }else if(!(/^1(3|4|5|7|8)\d{9}$/.test(tel))){
                $("#errorInfo").html("请输入正确的手机号");
                return false;
            }else {
                //alert(1);
                $("#errorInfo").html("");
                $.ajax({
                    type: "get",
                    url: "{{URL('only')}}",
                    data: {tel:tel},
                    success: function(msg){
                        if(msg == 1){
                            $("#errorInfo").html("该手机号已被注册");
                            return false;
                        }else{

                            //alert(1);
                            $.ajax({
                                type: "get",
                                url: "{{URL('short')}}",
                                data: {tel:tel},
                                success: function(msg){
                                    if(msg == 1){
                                        $("#errorInfo").html("短信已经发送");
                                    }
                                }
                            });
                        }
                    }
                });

            }
        })
    })

    var wait=60;
    function time(o) {
    var tel = $('#username').val();
    if(tel == '')
    {
        return false;
    }
        if (wait == 0) {
            o.removeAttribute("disabled");
            o.value="免费获取";
            wait = 60;
        } else {
            o.setAttribute("disabled", true);
            o.value="重新发送(" + wait + ")";
            wait--;
            setTimeout(function() {
                    time(o)
                },
                1000)
        }
    }
</script>
<script>
    $("#form").submit(function(){
        var username = $("#username").val();
        var pwd = $("#password").val();
        var error = $('#error').val();
        if(username == '' || pwd == '')
        {
            $("#errorInfo").html("请填写完整");
            return false;
        }else if(!(/^1(3|4|5|7|8)\d{9}$/.test(username))){
            $("#errorInfo").html("请输入正确的手机号");
            return false;
        }else if(!(/^[a-zA-Z]\w{4,10}$/.test(pwd))){
            $("#errorInfo").html("字母开头 长度在6~18之间");
            return false;
        }//else if(error == 0){
//            $("#errorInfo").html("验证码不正确");
//            return false;
//      }

    })
</script>