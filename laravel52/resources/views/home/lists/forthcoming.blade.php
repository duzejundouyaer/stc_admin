<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <title>
        爱影院
    </title>
    <link id="ctl00_css1" href="{{asset('style/home/css/style.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/home/css/inside_pages.css')}}" rel="stylesheet" />
    <script src="{{asset('style/home/js/public.js')}}"></script>
    <script src="{{asset('style/home/js/jquery-1.8.0.min.js')}}"></script>
    <style> .all{width: 100%;} </style>
</head>
<body>
<div class="all">
    <form name="aspnetForm" method="post" action="movie_list.aspx?ClientID=" id="aspnetForm">
        <div>
            <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="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" />
        </div>

        <div>

            <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="8A59B39D" />
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
                        <p class="fl paint Hide"><a href="javascript:void(0)../City.aspx?ClientID=" style="color: white;"><b id="defaultCityName">深圳</b></a></p>
                        <img src="http://m.douyou100.com/Resources/douyou100_1/images/city.png" width="12" height="11"  />
                    </label>
                </li>

            </ul>
        </div>
        <script>
           // document.getElementById("defaultCityName").innerHTML = Utils.getCookie("CityName");
           // document.getElementById("defaultCityName").title = Utils.getCookie("CityName");
            //function CurentTime()
            //{
            //    var now = new Date();

            //    var year = now.getFullYear();       //年
            //    var month = now.getMonth() + 1;     //月
            //    var day = now.getDate();            //日

            //    var hh = now.getHours();            //时
            //    var mm = now.getMinutes();          //分

            //    var clock = year + "-";

            //    if(month < 10)
            //        clock += "0";

            //    clock += month + "-";

            //    if(day < 10)
            //        clock += "0";

            //    clock += day + " ";

            //    if(hh < 10)
            //        clock += "0";

            //    clock += hh + ":";
            //    if (mm < 10) clock += '0';
            //    clock += mm;
            //    return(clock);
            //}
            //if ((new Date(CurentTime())) >= new Date("2014-03-27 08:00:00")) {
            //    document.getElementById("tips").style.display = "none";
            //}
        </script>


        <!--导航样式-->
        <div class="nav">
            <div class="tab_nav tab_nav_one">
                <a class="hide" href="javascript:void(0);history.back(-1);"><img src="http://m.douyou100.com/Resources/douyou100_1/images/return.png" width="20" height="16" class="fl"/></a><div class=" Hide fl">正在热映 <span class="movie_tag">{{$number}}</span></div>
            </div>
        </div>

        <!--正在热映样式开始-->
        <div class="all_movie">
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


        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607221125214499.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001524&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">夏有乔木 雅望天堂</p><span class="fr hsz">8.3</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>赵真奎</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>吴亦凡 / 韩庚 / 卢杉 / 周元 / 包贝尔 / 张瑶</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001524&filmName=夏有乔木 雅望天堂&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201608/201608011057219752.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001578&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">古曼</p><span class="fr hsz">7.7</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>张江南</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>韩雪 / 唐宸禹 / 吴艺璇</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001578&filmName=古曼&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607061033184798.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001628&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">泰山归来：险战丛林</p><span class="fr hsz">8.2</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>大卫·叶茨</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>亚历山大·斯卡斯加德 / 玛格特·罗比 / 塞缪尔·杰克逊 / 克里斯托弗·沃尔兹 / 杰曼·翰苏</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">5</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001628&filmName=泰山归来：险战丛林&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607121445505332.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001629&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">绝地逃亡</p><span class="fr hsz">8.0</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>雷尼·哈林</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>成龙 / 范冰冰 / 约翰尼·诺克斯维尔 / 曾志伟 / 王敏德</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">16</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001629&filmName=绝地逃亡&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607051434202639.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001635&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">红色警戒999</p><span class="fr hsz">8.0</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>约翰·希尔寇特</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>卡西·阿弗莱克 / 切瓦特·埃加福特 / 安东尼·麦凯 / 亚伦·保尔 / 小克利夫顿·克林斯</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001635&filmName=红色警戒999&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607111508345342.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001639&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">爱宠大机密</p><span class="fr hsz">8.2</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>克里斯·雷纳德 / 雅候·迟内</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>路易·C·K / 艾瑞克·斯通斯崔特 / 凯文·哈特 / 艾丽·坎伯尔 / 史蒂夫·库根</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001639&filmName=爱宠大机密&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607201119350122.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001643&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">宝贝当家</p><span class="fr hsz">8.0</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>张敏</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>王诗龄 / 吴镇宇 / 杨千嬅 / 詹瑞文 / 元秋</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001643&filmName=宝贝当家&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607201548023993.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001647&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">封神传奇</p><span class="fr hsz">7.7</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>许安</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>李连杰 / 范冰冰 / 黄晓明 / 杨颖 / 古天乐</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">2</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001647&filmName=封神传奇&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607211122499687.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001648&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">神秘世界历险记3</p><span class="fr hsz">7.8</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>王云飞</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>刘校妤 / 孟泉霖 / 陆 揆 / 宝木中阳 / 郭政建</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001648&filmName=神秘世界历险记3&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607261647162265.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001651&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">盗墓笔记</p><span class="fr hsz">8.0</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>李仁港</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>鹿晗 / 井柏然 / 马思纯 / 王景春 / 张博宇</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">3</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001651&filmName=盗墓笔记&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}

        {{--<div class="movie_in fl">--}}
        {{--<dl>--}}
        {{--<dt><img src='http://douyou100.com:7000/Upload/FilmPic/201608/201608011036497135.jpg_170x240.jpg' width="87" height="120" "window.location.href='javascript:void(0)Movie_detail.aspx?ftype=1&filmNo=10001660&ClientID='"/></dt>--}}
        {{--<dd >--}}
        {{--<div class="all_dd"><p class="Hide fl w_movie f15">狼兵吼</p><span class="fr hsz">7.5</span></div>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">导演：</span>王勇</p>--}}
        {{--<p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>刘德凯 / 谢苗 / 徐冬梅 / 何云龙 / 王侃</p>--}}
        {{--<div class="all_dd clear">--}}
        {{--<div class="gp_movie Hide fl"><span class="hsz">0</span>人已购票</div>--}}
        {{--<button type="button"class="btn_gp cur fl" "window.location.href='javascript:void(0)buy_movie.aspx?filmNo=10001660&filmName=狼兵吼&ClientID='">购 票</button>--}}
        {{--</div>--}}
        {{--</dd>--}}
        {{--</dl>--}}
        {{--</div>--}}


        <!-- <div class="movie_in fl">
                <dl>
                    <dt class="fl"><img src="images/pic.jpg" width="87" height="120"/></dt>
                    <dd class="fl">
                        <div class="all_dd"><p class="Hide fl w_movie">中国合伙国合伙国伙国合伙国合合伙人</p><span class="fr hsz">8.7</span></div>
                        <p class="all_dd clear Hide">导演：陈可辛</p>
                        <p class="all_dd clear Hide">主演：黄晓明 邓超 佟大晓明 邓超 佟大晓明 邓超 佟大为 杜鹃</p>
                        <div class="all_dd clear">
                            <div class="gp_movie Hide fl"><span class="hsz">16763</span>人已购票</div>
                            <button type="button" class="btn_gp cur" "window.location.href='javascript:void(0)#'">购 票</button>
                        </div>
                    </dd>
                </dl>
            </div> -->


        </div>

        <!--正在热映样式结束-->


        <div id="foot" class="foot clear">
            <p><a href="" class="c1">帮助</a><a  href="" class="c1">客户端</a><a href="">意见反馈</a></p>
            <p><a href="javascript:void(0)tel:400-066-8882" style="margin-right:10px;" id="CustomService">400-066-8882</a>     http://aimovie.duzejun.cn</p>
            <p class="f10">Copyright2013- 2017爱电影版权所有. </p>
        </div>
        {{--<script>--}}
        {{--var CityName=document.getElementById("defaultCityName").innerHTML = Utils.getCookie("CityName");--}}
        {{--if (CityName == '北京市') {--}}
        {{--document.getElementById("CustomService").innerHTML = '400-010-1515';--}}
        {{--document.getElementById("CustomService").href = 'tel:400-010-1515';--}}
        {{--}--}}
        {{--else {--}}
        {{--document.getElementById("CustomService").innerHTML = '400-066-8882';--}}
        {{--document.getElementById("CustomService").href = 'tel:400-066-8882';--}}
        {{--}--}}
        {{--var ClientID = document.getElementById("ClientID").value;--}}
        {{--if (ClientID == 'C100000175') {--}}
        {{--document.getElementById("foot").style.display="none";--}}
        {{--}--}}
        {{--</script>--}}


        <script type="text/javascript">
            //<![CDATA[

            var InterfaceErrMsg='';//]]>
        </script>
    </form>

</div>
<div id="my_errMsg" class="my_errMsg">
    <div class="errMsg">
        <div id="errTtile" class="errTtile"></div>
        <div id="errContent" class="errcontent f14"></div>
        <div class="errbutdiv"><span id="my_errMsg_but" class="errbutspan">确  定</span></div>
    </div>
</div>
<div id="overlayAll" class="overlayAll"></div>
<script type="text/javascript">
    /*创建于2016-06-14*/
    var cpro_id = "u2671677";
</script>
{{--<script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>--}}
</body>
</html>
