<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" /><title>
        仿新版中影票务通触屏版自适应手机wap电影网站模板下载
    </title><link id="ctl00_css1" href="{{asset('style/home/css/style.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/home/css/inside_pages.css')}}" rel="stylesheet" />
    <script src="{{asset('style/home/js/public.js')}}"></script>

    <script src="{{asset('style/home/js/iscroll.js')}}"></script>
    <style>
        .all
        {
            width: 100%;
        }
    </style>
    <link href="css/scrollbar.css" rel="stylesheet" />
    <script src="js/FancyZoom_zzjs_net.js"></script>
    <script src="js/FancyZoomHTML.js"></script>

    <script type="text/javascript">
        var url = location.href;
        var filmNo = url.substring(url.lastIndexOf("=") + 1, url.length);
        var pageCount = 0;
        var pageindex = 2;


        //window.onload=LoadDate();
        function LoadDate() {
            var failure;
            var actionurl = 'MWebServices.ashx';
            Ajax.m_action = "getFilmReviews";
            Ajax.m_dtype = 'row';
            if (pageCount == 0 || pageindex <= pageCount)
                Ajax.request(actionurl, { "filmNo": filmNo, "numPerPage": 10, "pageIdx": pageindex }, function (json) {
                    var obj = eval("(" + json + ")");
                    if (obj.reviews.length > 0) {
                        pageCount = obj.pageCount;
                        if (pageindex <= pageCount) {
                            pageindex++;
                            for (var i = 0; i < obj.reviews.length; i++) {
                                var ss = " <dl class='fl'><dt class=''><img src='" + obj.reviews[i].image + "' width='50' height='50' /><br /><span class='hsz'>" + obj.reviews[i].mobile + "</span></dt> <dd class=''> <p>" + obj.reviews[i].content + "</p> <p class=''>" + obj.reviews[i].datetime + "</p> </dd></dl>";
                                document.getElementById("Add").insertAdjacentHTML("beforeEnd", ss);
                            }
                        }
                    }
                }, failure);

        }

        function newtab(n) {
            var tabnav = "newtab" + n;
            var tabid = "newtabid" + n;
            cleardisplay();
            if(tabid=="newtabid2"&&$$("newtabid2").getElementsByTagName("img").length==0)
                document.getElementById("more").style.display="none";

            document.getElementById(tabid).style.display = "block";
            f_addClass(document.getElementById(tabnav),'new_nav_sel_li');
        }
        function cleardisplay() {
            for (i = 1; i < 4; i++) {
                var cleartabid = "newtabid" + i;
                document.getElementById(cleartabid).style.display = "none";
                f_removeClass(document.getElementById("newtab"+i),'new_nav_sel_li');
            }
        }
        function f_addClass(obj,className)
        {
            if (obj) {obj.className+= ' '+className;}
        }
        function f_removeClass(obj,className) {
            var reg = new RegExp('^'+className+'\\s|\\s'+className+'$|'+className+'\\s');
            if (obj) {obj.className = obj.className.replace(reg,'');}
        }
        function Buymovie(No, name) {
            var ClientID = document.getElementById("ClientID").value;
            var url = location.href;
            var type = url.substring(url.indexOf("=") + 1, url.indexOf("=") + 2);
            if (type != "2") {
                window.location.href = 'buy_movie.aspx?filmNo=' + No + '&filmName=' + name+"&ClientID="+ClientID;
            } else {

            }
        }


        function FilmReview(obj) {
            var ClientID = document.getElementById("ClientID").value;
            var username = "";
            var url = location.href;
            var type = url.substring(url.indexOf("=") + 1,url.indexOf("=") + 2);
            if (username != '') {
                window.location.href = "discuss.aspx?filmNo=" + obj+"&type="+type+"&ClientID="+ClientID;
            } else {
                window.location.href = "mobilelogin.aspx?ClientID="+ClientID;
            }
        }
        var myScroll, pullDownEl, pullDownOffset, pullUpEl, pullUpOffset, generatedCount = 0;

        var startY = 0;


        function pullDownAction() {
            setTimeout(function () {

                //myScroll.refresh();
            }, 1000);
        }

        function pullUpAction() {
            setTimeout(function () {
                LoadDate();
                myScroll.refresh();
            }, 1000);
        }

        /**
         * 初始化iScroll控件
         */
        function loaded() {
            pullDownEl = document.getElementById('pullDown');
            pullDownOffset = pullDownEl.offsetHeight;
            pullUpEl = document.getElementById('pullUp');
            pullUpOffset = pullUpEl.offsetHeight;

            myScroll = new iScroll('wrapper', {
                scrollbarClass: 'myScrollbar', /* 重要样式 */
                useTransition: false, /* 此属性不知用意，本人从true改为false */
                topOffset: pullDownOffset,
                onRefresh: function () {
                    if (pullDownEl.className.match('loading')) {
                        pullDownEl.className = '';
                        pullDownEl.querySelector('.pullDownLabel').innerHTML = '下拉刷新...';
                    } else if (pullUpEl.className.match('loading')) {
                        pullUpEl.className = '';
                        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
                    }
                },
                onScrollMove: function () {
                    if (this.y > this.minScrollY + 55 && !pullDownEl.className.match('flip')) {
                        pullDownEl.className = 'flip';
                        pullDownEl.querySelector('.pullDownLabel').innerHTML = '松手开始更新...';
                        this.minScrollY = 0;
                    } else if (this.y < this.minScrollY + 55 && pullDownEl.className.match('flip')) {
                        pullDownEl.className = '';
                        pullDownEl.querySelector('.pullDownLabel').innerHTML = '下拉刷新...';
                        this.minScrollY = -pullDownOffset;
                    } else if (this.y <(this.maxScrollY-55) && !pullUpEl.className.match('flip')) {
                        pullUpEl.className = 'flip';
                        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
                        this.maxScrollY = this.maxScrollY;
                    } else if (this.y > (this.maxScrollY + 55) && pullUpEl.className.match('flip')) {
                        pullUpEl.className = '';
                        pullUpEl.querySelector('.pullUpLabel').innerHTML = '上拉加载更多...';
                        this.maxScrollY = pullUpOffset;
                    }
                },
                onScrollEnd: function () {
                    if (pullDownEl.className.match('flip')) {
                        //pullDownEl.className = 'loading';
                        //pullDownEl.querySelector('.pullDownLabel').innerHTML = '加载中...';
                        // pullDownAction();	// Execute custom function (ajax call?)
                    } else if (pullUpEl.className.match('flip')) {
                        pullUpEl.className = 'loading';
                        pullUpEl.querySelector('.pullUpLabel').innerHTML = '加载中...';
                        pullUpAction();	// Execute custom function (ajax call?)
                    }
                }
            });

            setTimeout(function () { document.getElementById('wrapper').style.left = '0'; }, 800);
        }
        //初始化绑定iScroll控件 
        //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
        document.addEventListener('DOMContentLoaded', loaded, false);

        function onclicks(url)
        {
            if(url.trim()!="")
                window.location.href=url;
            else
                return;
        }

    </script>
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
                    <a href="javascript:void(0)/movie.aspx?ClientID=">
                        <img src="http://m.douyou100.com/Resources/douyou100_1/images/LOGO.png" width="180" height="36" /></a>
                </li>
                <li class="fr city Hide">
                    <label>
                        <p class="fl paint Hide"><a href="javascript:void(0)../City.aspx?ClientID=" style="color: white;"><b id="defaultCityName">深圳</b></a></p>
                        <img src="http://m.douyou100.com/Resources/douyou100_1/images/city.png" width="12" height="11" "javascript:return window.location.href='javascript:void(0)../City.aspx?ClientID='" />
                    </label>
                </li>

            </ul>
        </div>
        <script>
            document.getElementById("defaultCityName").innerHTML = Utils.getCookie("CityName");
            document.getElementById("defaultCityName").title = Utils.getCookie("CityName");
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
                <a class="hide" href="javascript:void(0)javascript:history.go(-1)">
                    <img src="http://m.douyou100.com/Resources/douyou100_1/images/return.png" width="20" height="16" class="fl" /></a><div class="fl Hide
                            ">
                    我最好朋友的婚礼-详情
                </div>
            </div>
        </div>

        <!--正在热映详情样式开始-->
        <div class="movie_infor">

            <div class="movie_in fl top">
                <dl>
                    <dt>
                        <img src="http://douyou100.com:7000/Upload/FilmPic/201607/201607191024302995.jpg_170x240.jpg" width="147" height="203" /></dt>
                    <dd>
                        <div class="all_dd">
                            <p class="Hide f15 fl w_movie">我最好朋友的婚礼  </p>
                            <span class="fr hsz">7.5</span>
                        </div>
                        <p class="all_dd clear Hide f12"><span class="hhsz">导演：</span> 陈奕利</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>舒淇 / 冯绍峰 / 宋茜</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">类型：</span>喜剧 / 爱情</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">片长：</span> 91分钟</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">产地： </span>中国大陆</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">上映日期:</span> 2016-08-05</p>
                        <div class="all_dd clear" style="margin-bottom: 4px;">
                            <input name="" id="Gp" type="button" value="购  票" class="btn_infor_gp" "Buymovie('10001449','我最好朋友的婚礼');" />
                        </div>


                    </dd>
                </dl>

                <div class="clear"></div>
            </div>



        </div>

        <div class="new_nav clear fl">
            <ul>
                <li class="cur" id='newtab1' 'newtab(1)'>剧情</li>
                <li class="cur " id='newtab2' 'newtab(2)'>剧照<div class="border fl"></div>
                </li>
                <li class="cur new_nav_sel_li" id='newtab3' 'newtab(3)'>影评<div class="border fl"></div>
                </li>
            </ul>
        </div>

        <div id='newtabid1' class='tabid clear mr_top' style='display: none;'>



            <div class="story clear">
                <div class="fl">剧情：</div>
                <p>顾佳（舒淇 饰）是国内某时尚杂志的新任主编，奉命去米兰参加时装周。一通意外的电话让她刚刚落地就放弃了工作安排飞往伦敦。因为她曾经逃避但其实内心深爱的男人林然（冯绍峰 饰）马上就要和一位年轻富家女萱萱（宋茜 饰）结婚，她想在婚礼之前把新郎抢回来。在飞往伦敦的飞机上，顾佳邂逅了型男Nick（凤小岳 饰），她一直出糗，令Nick非常尴尬。见面后，林然的准新娘萱萱却待她亲如姐妹。尽管内心矛盾，顾佳还是有意无意的制造着麻烦，并因为一个误会使婚礼无法在英国如期举行，但林然和萱萱情比金坚，顾佳决定安排林然和萱萱去意大利办婚礼。在米兰，顾佳鼓起勇气和林然表白，却意外被萱萱撞见，三人在街头展开了追逐……</p>
            </div>

        </div>
        <div id='newtabid2' class='tabid clear' style='display: none;'>
            <div class="poster fl" style="height: auto">

                <ul>

                    <li class="fl" style="margin-right: 12px;">
                        <a href="javascript:void(0)http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025369428.jpg_600x400.jpg">
                            <img src="http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025369428.jpg_600x400.jpg" width="80" height="88" /></a></li>

                    <li class="fl" style="margin-right: 12px;">
                        <a href="javascript:void(0)http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025378164.jpg_600x400.jpg">
                            <img src="http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025378164.jpg_600x400.jpg" width="80" height="88" /></a></li>

                    <li class="fl" style="margin-right: 12px;">
                        <a href="javascript:void(0)http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025390020.jpg_600x400.jpg">
                            <img src="http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025390020.jpg_600x400.jpg" width="80" height="88" /></a></li>

                    <li class="fl" style="margin-right: 12px;">
                        <a href="javascript:void(0)http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025400316.jpg_600x400.jpg">
                            <img src="http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025400316.jpg_600x400.jpg" width="80" height="88" /></a></li>

                    <li class="fl" style="margin-right: 12px;">
                        <a href="javascript:void(0)http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025410924.jpg_600x400.jpg">
                            <img src="http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025410924.jpg_600x400.jpg" width="80" height="88" /></a></li>

                    <li class="fl" style="margin-right: 12px;">
                        <a href="javascript:void(0)http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025421220.jpg_600x400.jpg">
                            <img src="http://douyou100.com:7000/Upload/FilmPicture/201607/201607191025421220.jpg_600x400.jpg" width="80" height="88" /></a></li>

                </ul>

            </div>
            <div class="more clear">
                <button type="button" class="btn_jz cur" id="more" "var ClientID = document.getElementById('ClientID').value; window.location.href='javascript:void(0)PictureList.aspx?filmNo=10001449&ClientID='+ClientID">更多剧照>></button>
            </div>

        </div>
        <div id='newtabid3' class='tabid clear'>
            <div class="hsz" style="width: 94%; margin: 0 3%; line-height: 35px;"><span class="fr"><a class="hhsz" "FilmReview(10001449);" id="FilmReview">发表影评</a></span><img src="http://m.douyou100.com/Resources/douyou100_1/images/discuss.png" width="14" height="12" class="fr" style="margin-top: 12px;" /></div>
            <div id="wrapper">
                <div id="scroller">
                    <div class="discuss">
                        <div id="pullDown">
                            <span class="pullDownIcons"></span><span class="pullDownLabels"></span>
                        </div>

                        <div class="clear discuss_con" id="Add">



                        </div>
                        <div id="pullUp" class="clear" style="display: none">
                            <span class="pullUpIcon"></span><span class="pullUpLabel">上拉加载更多...</span>
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <!--正在热映详情样式结束-->
        <script>
            Utils.onPageLoad=setupZoom();
        </script>


        <div id="foot" class="foot clear">
            <p><a href="javascript:void(0)../help.aspx?ClientID=" class="c1">帮助</a><a  href="javascript:void(0)../client.aspx?ClientID=" class="c1">客户端</a><a href="javascript:void(0)../idear.aspx?ClientID=" class="c1">意见反馈</a></p>
            <p><a href="javascript:void(0)tel:400-066-8882" style="margin-right:10px;" id="CustomService">400-066-8882</a>     http://m.douyou100.com</p>
            <p class="f10">Copyright2005-2013 兜有电影版权所有. </p>
        </div>
        <script>
            var CityName=document.getElementById("defaultCityName").innerHTML = Utils.getCookie("CityName");
            if (CityName == '北京市') {
                document.getElementById("CustomService").innerHTML = '400-010-1515';
                document.getElementById("CustomService").href = 'tel:400-010-1515';
            }
            else {
                document.getElementById("CustomService").innerHTML = '400-066-8882';
                document.getElementById("CustomService").href = 'tel:400-066-8882';
            }
            var ClientID = document.getElementById("ClientID").value;
            if (ClientID == 'C100000175') {
                document.getElementById("foot").style.display="none";
            }
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
