
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{asset("style/home/images/style.css")}}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfonts-->
    <!--//webfonts-->
</head>
<body>
<div class="main" style="background-color: #888672">
    <div class="header" >
        <span style="float: left;" onclick="history.back(-1);" ><< 返回</span>
        <h1>修改个人资料</h1>
    </div>
    <form action="{{URL('updateone')}}" method="post">
        <input type="hidden" name="u_id" value="{{$u_id}}"/>
        {{csrf_field()}}
        {{--<h2>New Account:</h2>--}}
        <ul class="left-form">
            <li>
                <span style="font-size: 20px;line-height: 40px;"><b>原密码</b></span>
                <input type="text" name="pwd" value=""   placeholder="原密码" required/>
                <div class="clear"> </div>
            </li>
            {{--<input type="button" onClick="myFunction()" value="发送验证码">--}}
            <li>
                <span style="font-size: 20px;line-height: 40px;"><b>新密码</b></span>
                <input type="text" name="mewpwd" value=""   placeholder="新密码" required/>
                <div class="clear"> </div>
            </li>
            {{--<li>--}}
                {{--<span style="font-size: 20px;line-height: 40px;"><b>昵称</b></span>--}}
                {{--<input type="text" name="nickname" value=""   placeholder="{{$userone['nickname']}}" required/>--}}
                {{--<div class="clear"> </div>--}}
            {{--</li>--}}
            {{--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Please inform me of upcoming  w3layouts, Promotions and news</label>--}}
            <input type="submit" onClick="myFunction()" value="提交">
            <div class="clear"> </div>
        </ul>
        {{--<ul class="right-form">--}}
            {{--<h3>Login:</h3>--}}
            {{--<div>--}}
                {{--<li><input type="text"  placeholder="Username" required/></li>--}}
                {{--<li> <input type="password"  placeholder="Password" required/></li>--}}
                {{--<h4>I forgot my Password!</h4>--}}
                {{--<input type="submit" onClick="myFunction()" value="Login" >--}}
            {{--</div>--}}
            {{--<div class="clear"> </div>--}}
        {{--</ul>--}}
        <div class="clear"> </div>
    </form>
</div>



</body>
</html>