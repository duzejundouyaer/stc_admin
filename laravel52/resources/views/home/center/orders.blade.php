<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
    .cloum{text-align: center;margin-top:70px;}
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
  
    <script src="{{asset('style/home/js/public.js')}}"></script>
 
    <script src="{{asset('style/home/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('style/home/layer/layer.js')}}"></script>
    <script src="{{asset('style/home/js/demo.js')}}"></script>
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
                <a class="hide" href="javascript:void(0);history.back(-1);">
                    <img src="http://m.douyou100.com/Resources/douyou100_1/images/return.png" width="20" height="16" class="fl" /></a><div class="fl Hide">订单
                </div>
            </div>
        </div>

        <!--正在热映详情样式开始-->
        <div class="new_nav clear fl">
            <ul>
                <li class="cur" id='newtab1' >已支付</li>
                <li class="cur " id='newtab2' >未支付<div class="border fl"></div>
                </li>
                <li class="cur new_nav_sel_li" id='newtab3'>已过期<div class="border fl"></div>
                </li>
            </ul>
        </div>

        <div id='newtabid1' class='tabid clear mr_top' style='display: none;'>
            <div class="story clear">
                <div class="fl">剧情：</div>
                <p></p>
            </div>
        </div>


        <div id='newtabid2' class='tabid clear' style='display: none;'>

            <div class="poster fl" style="height: auto">
                222
              </div>
            </div>
            </div>
        </div>

        <div id='newtabid3' class='tabid clear' >
            {{--评论--}}
            111


        </div>


        <!--正在热映详情样式结束-->
        <script>
            Utils.onPageLoad=setupZoom();
        </script>


        <div id="foot" class="foot clear">
            <p><a href="javascript:void(0)" class="c1">帮助</a><a  href="javascript:void(0)" class="c1">客户端</a><a href="javascript:void(0)" class="c1">意见反馈</a></p>
            <p><a href="javascript:void(0)" style="margin-right:10px;" id="CustomService">400-066-8882</a>     http://m.douyou100.com</p>
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
<script>
    $(function(){
      $("#newtab1").click(function(){
           $("#newtabid1").show();
           $("#newtabid2").hide();
           $("#newtabid3").hide();
           $(this).css("background","#FFD306")
           $(this).css("color","#272727")
           $("#newtab2").css("background","#272727")
           $("#newtab2").css("color","#fff")
           $("#newtab3").css("background","#272727")
           $("#newtab3").css("color","#fff")
        })
       $("#newtab2").click(function(){
           $("#newtabid1").hide();
           $("#newtabid2").show();
           $("#newtabid3").hide();
           $(this).css("background","#FFD306")
           $(this).css("color","#272727")
           $("#newtab1").css("background","#272727")
           $("#newtab1").css("color","#fff")
           $("#newtab3").css("background","#272727")
           $("#newtab3").css("color","#fff")
        })
       $("#newtab3").click(function(){
            $("#newtabid1").hide();
            $("#newtabid2").hide();
            $("#newtabid3").show();
            $(this).css("background","#FFD306")
           $(this).css("color","#272727")
           $("#newtab1").css("background","#272727")
           $("#newtab1").css("color","#fff")
           $("#newtab2").css("background","#272727")
           $("#newtab2").css("color","#fff")
        })
    })
</script>