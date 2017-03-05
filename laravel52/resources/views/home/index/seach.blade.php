<?php
use Symfony\Component\HttpFoundation\Session\Session;
$session = new Session;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
    .cloum{text-align: center;margin-top:70px; }
</style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" /><title>
        爱影院
    </title><link id="ctl00_css1" href="{{asset('style/home/css/style.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/home/css/inside_pages.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/home/css/demo.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/jquery-ui.css')}}" rel="stylesheet" />
    <script src="{{asset('style/home/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('style/jquery-ui.js')}}"></script>
    <style>
        .all
        {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="all">
    <form name="aspnetForm" method="post" action="Movie_detail.aspx?ftype=1&amp;filmNo=10001449&amp;ClientID=" id="aspnetForm">
        <div>
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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dTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpY3R1cmUvMjAxNjA3LzIwMTYwNzE5MTAyNTM5MDAyMC5qcGdfNjAweDQwMC5qcGdkAgMPZBYCZg8VAlZodHRwOi8vZG91eW91MTAwLmNvbTo3MDAwL1VwbG9hZC9GaWxtUGljdHVyZS8yMDE2MDcvMjAxNjA3MTkxMDI1NDAwMzE2LmpwZ182MDB4NDAwLmpwZ1ZodHRwOi8vZG91eW91MTAwLmNvbTo3MDAwL1VwbG9hZC9GaWxtUGljdHVyZS8yMDE2MDcvMjAxNjA3MTkxMDI1NDAwMzE2LmpwZ182MDB4NDAwLmpwZ2QCBA9kFgJmDxUCVmh0dHA6Ly9kb3V5b3UxMDAuY29tOjcwMDAvVXBsb2FkL0ZpbG1QaWN0dXJlLzIwMTYwNy8yMDE2MDcxOTEwMjU0MTA5MjQuanBnXzYwMHg0MDAuanBnVmh0dHA6Ly9kb3V5b3UxMDAuY29tOjcwMDAvVXBsb2FkL0ZpbG1QaWN0dXJlLzIwMTYwNy8yMDE2MDcxOTEwMjU0MTA5MjQuanBnXzYwMHg0MDAuanBnZAIFD2QWAmYPFQJWaHR0cDovL2RvdXlvdTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpY3R1cmUvMjAxNjA3LzIwMTYwNzE5MTAyNTQyMTIyMC5qcGdfNjAweDQwMC5qcGdWaHR0cDovL2RvdXlvdTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpY3R1cmUvMjAxNjA3LzIwMTYwNzE5MTAyNTQyMTIyMC5qcGdfNjAweDQwMC5qcGdkAgIPFQIIMTAwMDE0NDkIMTAwMDE0NDlkAgMPFgIfAWZkZCXQAgRn88vYaF5BL4jjd5iZeQC+" />
        </div>

        <div>

            <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="370C2725" />
        </div>
        <input type="hidden" value="" id="ClientID"/>

        <div style="width: 100%; text-align: center;">


        </div>
        <div class="head">
            <ul>
                <li class="fl logo">
                    <a href="javascript:void(0)">
                        <img src="http://m.douyou100.com/Resources/douyou100_1/images/LOGO.png" width="180" height="36" /></a>
                </li>
                <li class="fr city Hide">
                    <label>
                        <p class="fl paint Hide"><a href="javascript:void(0)" style="color: white;"><b id="defaultCityName">北京</b></a></p>
                        <img src="http://m.douyou100.com/Resources/douyou100_1/images/city.png" width="12" height="11"  />
                    </label>
                </li>

            </ul>
        </div>
        <!--导航样式-->

        <div class="nav">
            <div class="tab_nav tab_nav_one">
                <a class="hide" href="javascript:void(0);history.back(-1);">
                    <img src="http://m.douyou100.com/Resources/douyou100_1/images/return.png" width="20" height="16" class="fl" /></a><div class="fl Hide
                            ">
                    搜索
                </div>
            </div>
        </div>
</form>
        <!--正在热映详情样式开始-->
        <div class="movie_infor">

            <div class="movie_in fl top">
                <dl>
                    <dt>
                    <dd>
                        <div class="all_dd">
                        </div>
                        <div style="text-align: center;color: #fdf8f8;font-size: 20px;">
                            <div class="all_dd clear" style="margin-bottom: 4px;">
                                <form action="/seach" method="post">
                                    {{csrf_field()}}
                                    <div class="ui-widget">
                                        <label for="tags"></label>
                                        <input id="tags1" name="seach" size="13"/>
                                        <input name="" id="Gp" type="submit" value="搜索" class="btn_infor_gp" style="width: 60px;"/>
                                    </div>
                                </form>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </dd>
                </dl>
                <div class="clear"></div>
            </div>
        </div>




        <!--   <div class="more clear">
    <button type="button" class="btn_jz cur" id="more" "var ClientID = document.getElementById('ClientID').value; window.location.href='javascript:void(0)PictureList.aspx?filmNo=10001449&ClientID='+ClientID">更多剧照>></button>
</div> -->
</div>

<div class="all_movie">

    <div class="lists">

        @foreach($movie as $v)
            <div class="movie_in fl">
                <dl>
                    <dt><a href="{{URL('details')}}?movie_id={{$v->movie_id}}"><img src='{{asset($v->movie_img)}}' width="87" height="120" / ></a></dt>
                    <dd >
                        <div class="all_dd"><p class="Hide fl w_movie f15">{{$v->movie_name}}</p><span class="fr hsz">{{$v->movie_score}}</span></div>
                        <p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>{{$v->movie_director}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>{{$v->movie_boss}}</p>
                        <div class="all_dd clear">
                            <div class="gp_movie Hide fl"><span class="hsz">{{$v->movie_box}}</span>人已购票</div>
                            <a href="{{URL('/pay')}}/{{$v->movie_id}}"><button type="button" class="btn_gp cur fl">购 票</button></a>
                        </div>
                    </dd>
                </dl>
            </div>
        @endforeach

    </div>


</div>

<!--正在热映详情样式结束-->
<div id="footer" class="foot clear" >
    <p><a href="javascript:void(0)" class="c1">帮助</a><a  href="javascript:void(0)" class="c1">客户端</a><a href="javascript:void(0)../idear.aspx?ClientID=" class="c1">意见反馈</a></p>
    <p><a href="javascript:void(0)" style="margin-right:10px;" id="CustomService">400-066-8882</a>     http://m.douyou100.com</p>
    <p class="f10">Copyright2005-2013 兜有电影版权所有. </p>
</div>


</div>

<div id="overlayAll" class="overlayAll"></div>
<?php foreach($arr as $key=>$val){?>
<input type="hidden" name="lian" class="lian" value="<?=$val?>"/>
<?php }?>
</body>
{{--<script src="{{asset('jquery/examples/js/zepto.min.js')}}"></script>--}}
{{--<script src="{{asset('jquery/dist/dropload.min.js')}}"></script>--}}
{{--<script>--}}

{{--</script>--}}
<script>
    $(function() {

        {{--var counter = 0;--}}
        {{--// 每页展示4个--}}
        {{--var num = 4;--}}
        {{--var pageStart = 0,pageEnd = 0;--}}
        {{--var _token = "{{csrf_token()}}";--}}
        {{--// dropload--}}
        {{--$('.all_movie').dropload({--}}
            {{--scrollArea : window,--}}
            {{--loadDownFn : function(me){--}}
                {{--counter++;--}}
{{--//                        alert(counter);--}}
                {{--pageEnd = num * counter;--}}
                {{--pageStart = pageEnd - num;--}}
                {{--$.ajax({--}}
                    {{--type: 'PSOT',--}}
                    {{--url: "{{URL('jqjson')}}",--}}
                    {{--data: {pageStart:pageStart,pageEnd:pageEnd,token:_token},--}}
                    {{--dataType: 'json',--}}
                    {{--success: function(data){--}}
                        {{--alert(data);--}}
                        {{--var result="";--}}
                        {{--result+=jsonpingjie(data);--}}
                        {{--// 为了测试，延迟1秒加载--}}
                        {{--setTimeout(function(){--}}
                            {{--$('.lists').append(result);--}}
                            {{--// 每次数据加载完，必须重置--}}
                            {{--me.resetload();--}}
                        {{--},1000);--}}
                    {{--},--}}
                    {{--error: function(xhr, type){--}}
                        {{--alert('Ajax error!');--}}
                        {{--// 即使加载出错，也得重置--}}
                        {{--me.resetload();--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}
        {{--});--}}

        {{--function jsonpingjie(data){--}}
            {{--var result = '';--}}
            {{--for(var i = pageStart; i < pageEnd; i++){--}}
                {{--result += "<div class='movie_in fl'> " +--}}
                {{--"<dl> " +--}}
                {{--"<dt><a href='details?movie_id="+msg[i].movie_id+"'>" +--}}
                {{--"<img src='"+msg[i].movie_img+"' width='87' height='120'  >" +--}}
                {{--"</a></dt> " +--}}
                {{--"<dd > " +--}}
                {{--"<div class='all_dd'>" +--}}
                {{--"<p class='Hide fl w_movie f15'>"+msg[i].movie_name+"</p>" +--}}
                {{--"<span class='fr hsz'>"+msg[i].movie_img+"</span>" +--}}
                {{--"</div> <p class='all_dd clear Hide f12'><span class='hhsz'>导演：</span>"+msg[i].movie_name+"</p> " +--}}
                {{--"<p class='all_dd clear Hide f12'><span class='hhsz'>主演：</span>"+msg[i].movie_name+"</p> " +--}}
                {{--"<div class='all_dd clear'>" +--}}
                {{--" <div class='gp_movie Hide fl'>" +--}}
                {{--"<span class='hsz'>"+msg[i].movie_name+"" +--}}
                {{--"</span>人已购票</div> " +--}}
                {{--"<a href='/pay'>" +--}}
                {{--"<button type='button' class='btn_gp cur fl'>购 票</button>" +--}}
                {{--"</a>" +--}}
                {{--" </div> " +--}}
                {{--"</dd> " +--}}
                {{--"</dl> " +--}}
                {{--"</div>"--}}
                {{--if((i) >= data.length){--}}
                    {{--// 锁定--}}
                    {{--me.lock();--}}
                    {{--// 无数据--}}
                    {{--me.noData();--}}
                    {{--break;--}}
                {{--}--}}
            {{--}--}}
            {{--return result;--}}
        {{--}--}}


        var boxes = $(".lian");
            //alert(boxes);
            var availableTags = []
            for(i=0;i<boxes.length;i++){
                availableTags.push(boxes[i].value);
            }
       //alert(availableTags);
//     var availableTags = ["密套", "一哎哎哎哎哎",];
       // alert(availableTags);
                $( "#tags1" ).autocomplete({
            source: availableTags
        });



    });
</script>
</html>
