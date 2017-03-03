<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>个人中心</title>
    <link rel="stylesheet" type="text/css" href="{{asset('style/home/css/stylecenter.css')}}">
</head>

<body style="background-color: #868288">

<div id="_centent">
    <header style="background-color: #000000;color: #fdf8f8">
        <div class="rt-bk">
            {{--<i class="bk"></i>--}}
            <p onclick="history.back(-1);"><< 返回</p>
        </div>
        <div class="top-name"><p>个人中心</p></div>
    </header>

    <div class="head" style="background-image: url({{asset('style/home/img/zuo.png')}})">
        <div class="head-img">
            <label>
                <input type="file" accept="audio/*;capture=microphone" name="file" onchange="readFile(this)"  style="display: none ">
                <img src="{!!asset($userone['img'])!!}" id="art_thumb_img">
            </label>
            {{--<label>--}}
                  {{-- <img src="{{$val->n_img}}" alt="" height="100" width="100" class="qq">--}}
                 {{--<input type="file" id="file1" style="VISIBILITY: hidden"  >--}}
                {{--<img id="preview" width="100" height="100" src="{{asset($userone['img'])}}">--}}
                {{--<input type="file" name="touxiang" id="doc" style="display:none" onchange="javascript:setImagePreview();">--}}
            {{--</label>--}}
        </div>
        <div class="head-dsb">
            <p class="dsb-name">{{$userone['nickname']}}</p>
            <p class="dsb-id">手机  {{$userone['user']}}</p>
        </div>
    </div>

    <div class="nav">
        <ul>
            <a href="{{URL('orders')}}">
                <li>
                    <i class="idt"></i>
                    <p>订单</p>
                </li>
            </a>
            <a href="{{URL('lists')}}">
            <li class="pt-line">
                <i class="clt"></i>
                <p>收藏</p>
            </li>
            </a>
            <a href="{{URL('lists')}}">
            <li>
                <i class="rcm"></i>
                <p>推荐</p>
            </li>
            </a>
        </ul>
    </div>

    <section class="mt-1">
        <div class="ps-lt">
            <a href="{{URL('updateone')}}">
                <div class="lt-dsb">
                    <p>修改个人资料</p>
                    <i class="arr-right"></i>
                </div>
            </a>
            <a href="{{URL('updatepwd')}}">
            <div class="lt-dsb cl-bb">
                <p>修改密码</p>
                <i class="arr-right"></i>
            </div>
            </a>
        </div>
    </section>

    <section class="mt-2">
        <div class="ps-lt">
            <div class="lt-dsb cl-bb">
                <p>声音推送通知</p>
                <i class="check-on"></i>
            </div>
        </div>
    </section>

    <section class="mt-3">
        <div class="ps-lt">
            <div class="lt-dsb">
                <p>猜你喜欢</p>
                <i class="arr-right"></i>
            </div>
        </div>
        <div class="ps-lt">
            <div class="lt-dsb">
                <p>附近热门</p>
                <i class="arr-right"></i>
            </div>
        </div>
        <div class="ps-lt">
            <div class="lt-dsb">
                <p>推荐商家</p>
                <i class="arr-right"></i>
            </div>
        </div>
        <div class="ps-lt">
            <div class="lt-dsb cl-bb">
                <p id="ppp">设置</p>
                <i class="arr-right"></i>
            </div>
        </div>
    </section>
    <input type="hidden" id="lala" value="" ids=""/>
    <div class="jg"></div>
</div>
<script type="text/javascript" src="{{asset('style/home/js/jquery-1.8.0.min.js')}}"></script>
<script>
    function readFile(obj) {
        var file = obj.files[0];
        //判断类型是不是图片
        if (!/image\/\w+/.test(file.type)) {
            alert("请确保文件为图像类型");
            return false;
        }
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e) {
          imag = this.result; //就是base64
//            alert(img);
//            $('#lala').attr('ids',img);
            var _token="{{csrf_token()}}";
            $.ajax({
                type: "POST",
                {{--url: "{{URL('updatecenter')}}?imag="+img,--}}
                url: "updatecenter",
                data: {imag:imag,_token:_token},
                dataType: "json",
                success: function(msg){
                    //alert(msg);
                    if(msg==0){

                    }else{
                        $('#art_thumb_img').attr('src','/'+msg);
                    }
                }
            });
        }
    }
</script>
<script>
    (function (doc, win) {
        var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
                };

        if (!doc.addEventListener) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
    })(document, window);
</script>

<script type="text/javascript">
    $('.check-on').click(function(){
        $(this).toggleClass('check-off');
    })
</script>

</body>
</html>
