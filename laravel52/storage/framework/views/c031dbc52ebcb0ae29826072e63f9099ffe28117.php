<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <title>
	仿新版中影票务通触屏版自适应手机wap电影网站模板下载
    </title>
    <link id="ctl00_css1" href="<?php echo e(asset('style/home/css/style.css')); ?>" rel="stylesheet" />
    <link id="ctl00_css2" href="<?php echo e(asset('style/home/css/inside_pages.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('style/home/css/index.css')); ?>" rel="stylesheet" />
        <style>
        .all
        {
            width: 100%;
        }

        .movie_one
        {
            height: 0px;
            line-height: 0px;
            padding: 0px;
            margin: 0px 1px;
            overflow: hidden;
            display: inline-block;
        }
        #shadow { position: absolute; top: 0; display: none; z-index: 10; width: 100%; background-color: #000; opacity: 0.6; }
        #activity_ad { position: absolute; top: -11px; left: -100%; width: 100%; z-index: 11;  }
        #activity_ad img { width: 100% }

        .activity_ad_animation_show { -webkit-animation:login_box_animation_show 0.5s; left: 0% !important;}
        .activity_ad_animation_close { -webkit-animation:login_box_animation_close 0.5s; left: -100%; }
        @-webkit-keyframes login_box_animation_show {
	        from { left: -100%; }
	        to { left: 0%; }
        }
        @-webkit-keyframes login_box_animation_close {
	        from { left: 0%; }
	        to { left: -100%; }
        }
    </style>
</head>
<body>
    <div class="all">
    <form name="aspnetForm" method="post" action="movie.aspx" id="aspnetForm">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTM3Nzk3NzI3Mg9kFgJmD2QWBAIBD2QWBAIGDxYCHgRocmVmBSQvUmVzb3VyY2VzL2RvdXlvdTEwMF8xL2Nzcy9zdHlsZS5jc3NkAgcPFgIfAAUrL1Jlc291cmNlcy9kb3V5b3UxMDBfMS9jc3MvaW5zaWRlX3BhZ2VzLmNzc2QCAw9kFgICAQ9kFgRmDxYCHgtfIUl0ZW1Db3VudAIEFghmD2QWAmYPFQcIMTAwMDE0NDlSaHR0cDovL2RvdXlvdTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpYy8yMDE2MDcvMjAxNjA3MTkxMDI0MzAyOTk1LmpwZ18xNzB4MjQwLmpwZxjmiJHmnIDlpb3mnIvlj4vnmoTlqZrnpLwIMTAwMDE0NDkY5oiR5pyA5aW95pyL5Y+L55qE5ama56S8ASAAZAIBD2QWAmYPFQcIMTAwMDE1MjRSaHR0cDovL2RvdXlvdTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpYy8yMDE2MDcvMjAxNjA3MjIxMTI1MjE0NDk5LmpwZ18xNzB4MjQwLmpwZxnlpI/mnInkuZTmnKgg6ZuF5pyb5aSp5aCCCDEwMDAxNTI0GeWkj+acieS5lOacqCDpm4XmnJvlpKnloIIBIABkAgIPZBYCZg8VBwgxMDAwMTU3OFJodHRwOi8vZG91eW91MTAwLmNvbTo3MDAwL1VwbG9hZC9GaWxtUGljLzIwMTYwOC8yMDE2MDgwMTEwNTcyMTk3NTIuanBnXzE3MHgyNDAuanBnBuWPpOabvAgxMDAwMTU3OAblj6Tmm7wBIABkAgMPZBYCZg8VBwgxMDAwMTYyOFJodHRwOi8vZG91eW91MTAwLmNvbTo3MDAwL1VwbG9hZC9GaWxtUGljLzIwMTYwNy8yMDE2MDcwNjEwMzMxODQ3OTguanBnXzE3MHgyNDAuanBnG+azsOWxseW9kuadpe+8mumZqeaImOS4m+aelwgxMDAwMTYyOBvms7DlsbHlvZLmnaXvvJrpmanmiJjkuJvmnpcDdGFnBElNQVhkAgEPFgIfAQIEFghmD2QWAmYPFQYIMTAwMDE2NTdSaHR0cDovL2RvdXlvdTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpYy8yMDE2MDcvMjAxNjA3MjcxNzA2MDE1OTk4LmpwZ18xNzB4MjQwLmpwZw/osI7oqIDopb/opb/ph4wKMjAxNi0wOC0wOQEgAGQCAQ9kFgJmDxUGCDEwMDAxNjU1Umh0dHA6Ly9kb3V5b3UxMDAuY29tOjcwMDAvVXBsb2FkL0ZpbG1QaWMvMjAxNjA3LzIwMTYwNzI3MTUxMDQ5Nzg5My5qcGdfMTcweDI0MC5qcGcM5L2/5b6S6KGM6ICFCjIwMTYtMDgtMTEBIABkAgIPZBYCZg8VBggxMDAwMTY1NlJodHRwOi8vZG91eW91MTAwLmNvbTo3MDAwL1VwbG9hZC9GaWxtUGljLzIwMTYwNy8yMDE2MDcyNzE1MDI1NTY1NzYuanBnXzE3MHgyNDAuanBnFeaIkeS7rOivnueUn+WcqOS4reWbvQoyMDE2LTA4LTEyASAAZAIDD2QWAmYPFQYIMTAwMDE2NTRSaHR0cDovL2RvdXlvdTEwMC5jb206NzAwMC9VcGxvYWQvRmlsbVBpYy8yMDE2MDcvMjAxNjA3MjcxNTEzMDI3NjM5LmpwZ18xNzB4MjQwLmpwZxXor7rkuprmlrnoiJ/mvILmtYHorrAKMjAxNi0wOC0xMgN0YWcCM0RkZIAg6t9GVOEWf0lWap1CP36R7hED" />
</div>

<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="822A24EC" />
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
                <p class="fl paint Hide"><a href="javascript:void(0)" style="color: white;"><b id="defaultCityName">深圳</b></a></p>
                <img src="http://m.douyou100.com/Resources/douyou100_1/images/city.png" width="12" height="11"  />
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
        <div class="tab_nav">
            <ul>
                <li class="fl cur"><a href="javascript:void(0)javascript:void(0);" class="oaClick">影片</a></li>
                <li class="fl cur"><a href="javascript:void(0)javascript:void(0);">影院</a></li>
                <li class="fl cur"><a href="javascript:void(0)javascript:void(0);">活动</a></li>
                <li class="fl cur"><a href="<?php echo e(URL('lists')); ?>">正在热映</a></li>
            </ul>
        </div>
    </div>

    <!--TAB1样式开始-->
    <div id='tabid1' class='tabid' style='display: block;'>

        <p class="title"><img src="http://m.douyou100.com/Resources/douyou100_1/images/movie_icon.png" width="18" height="18" class="fl" style="margin:9px 3px 0px 0px;" /><span class="f15 hsz fl">正在热映</span><a class="fr" href="javascript:void(0)Buy_tickit.aspx?ClientID=">如何购票<img src="http://m.douyou100.com/Resources/douyou100_1/images/how.png" width="12px" height="12px" /></a></p>
        <div class="all_movie clear">
            
                    <div class="movie">
                        <a href="<?php echo e(URL('details')); ?>">
                            <img src='images/201607191024302995.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide">我最好朋友的婚礼</p>
                            <a href="javascript:void(0)" class="btn">立即购票</a>                        </div>
                        <div class=" ">
                            <div class="tag_wz"></div>
                        </div>
                    </div>
                
                    <div class="movie">
                        <a  "OnDetailClick('10001524','1')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607221125214499.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide">夏有乔木 雅望天堂</p>
                            <a href="javascript:void(0)#" "Buy_TK('10001524','夏有乔木 雅望天堂')" class="btn">立即购票</a>                        </div>
                        <div class=" ">
                            <div class="tag_wz"></div>
                        </div>
                    </div>
                
                    <div class="movie">
                        <a  "OnDetailClick('10001578','1')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201608/201608011057219752.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide">古曼</p>
                            <a href="javascript:void(0)#" "Buy_TK('10001578','古曼')" class="btn">立即购票</a>                        </div>
                        <div class=" ">
                            <div class="tag_wz"></div>
                        </div>
                    </div>
                
                    <div class="movie">
                        <a  "OnDetailClick('10001628','1')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607061033184798.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide">泰山归来：险战丛林</p>
                            <a href="javascript:void(0)#" "Buy_TK('10001628','泰山归来：险战丛林')" class="btn">立即购票</a>                        </div>
                        <div class="tag">
                            <div class="tag_wz">IMAX</div>
                        </div>
                    </div>
                 
            <div class="movie movie_one"></div>
            <div class="movie movie_one"></div>
        </div>

        <div class="clear" style="">
            <a type="button" class="btn_hs cur" href="list.htm">更多正在热映影片>></a>
        </div>

        <p class="title"><img src="http://m.douyou100.com/Resources/douyou100_1/images/movie_icon.png" width="18" height="18" class="fl" style="margin:9px 3px 0px 0px;" /><span class="f15 hsz fl">即将上映</span></p>
        <div class="all_movie clear">
            
                    <div class="movie">
                         <a  "OnDetailClick('10001657','2')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607271706015998.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide f14">谎言西西里</p>
                            <p class="Hide f14">2016-08-09上映</p>
                        </div>
                        <div class=" ">
                            <div class="tag_wz"></div>
                        </div>
                    </div>
                
                    <div class="movie">
                         <a  "OnDetailClick('10001655','2')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607271510497893.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide f14">使徒行者</p>
                            <p class="Hide f14">2016-08-11上映</p>
                        </div>
                        <div class=" ">
                            <div class="tag_wz"></div>
                        </div>
                    </div>
                
                    <div class="movie">
                         <a  "OnDetailClick('10001656','2')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607271502556576.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide f14">我们诞生在中国</p>
                            <p class="Hide f14">2016-08-12上映</p>
                        </div>
                        <div class=" ">
                            <div class="tag_wz"></div>
                        </div>
                    </div>
                
                    <div class="movie">
                         <a  "OnDetailClick('10001654','2')">
                            <img src='http://douyou100.com:7000/Upload/FilmPic/201607/201607271513027639.jpg_170x240.jpg' width="140px" height="195px" class="fl" /></a>
                        <div class="poster">
                            <p class="Hide f14">诺亚方舟漂流记</p>
                            <p class="Hide f14">2016-08-12上映</p>
                        </div>
                        <div class="tag">
                            <div class="tag_wz">3D</div>
                        </div>
                    </div>
                 
            <div class="movie movie_one">&nbsp;</div>
            <div class="movie movie_one">&nbsp;</div>
        </div>

        <div class="clear" style="">
            <button type="button" class="btn_hs cur" "var id=document.getElementById('ClientID').value; window.location.href='javascript:void(0)movie_future_list.aspx?ClientID='+id">更多即将上映影片>></button>
        </div>

    </div>
    <!--TAB1样式结束-->
    <div id="shadow"></div>
    <div id="activity_ad"><img src="images/《目标战》ICON3.jpg" /></div>

        
    <div id="foot" class="foot clear">
		<p><a href="javascript:void(0)" class="c1">帮助</a><a  href="javascript:void(0)" class="c1">客户端</a><a href="javascript:void(0)../idear.aspx?ClientID=" class="c1">意见反馈</a></p>
		<p><a href="javascript:void(0)" style="margin-right:10px;" id="CustomService">400-066-8882</a>     http://m.douyou100.com</p>
		<p class="f10">Copyright2005-2013 兜有电影版权所有. </p>
	</div>
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
    function f_aClick(url) {
        var ClientID = document.getElementById("ClientID").value;
        window.location.href = url + "?ClientID=" + ClientID;
    }
    function OnDetailClick(obj, obj2) {
        var ClientID = document.getElementById("ClientID").value;
        if (obj2=="1")
            window.location.href = "Movie_detail.aspx?ftype=1&filmno=" + obj + "&ClientID=" + ClientID;
        else
            window.location.href = "Movie_detail.aspx?ftype=2&filmno=" + obj + "&ClientID=" + ClientID;
    }
    function Buy_TK(obj1, obj2) {
        var ClientID = document.getElementById("ClientID").value;
        window.location.href = "buy_movie.aspx?filmNo=" + obj1 + "&filmName=" + obj2 + "&ClientID=" + ClientID;
    }

    function getAddress() {
        var positionFlag = Utils.getCookie("positionflag");
        if (!positionFlag) {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (pos) {
                    var coords = pos.coords;

                    var _params = {
                        latitude: coords.latitude,
                        longitude: coords.longitude
                    };

                    Ajax.m_action = "getCityNo";
                    Ajax.m_dtype = "row";
                    Ajax.request("MWebServices.ashx", _params, function (r) {
                        r = r.toJson();
                        Utils.setCookie("positionflag", true, 1);
                        if (r.areaNo != Utils.getCookie("CityNo")) {
                            Utils.setCookie("CityName", r.areaName);
                            Utils.setCookie("CityNo", r.areaNo);
                            //window.location.reload();
                            window.location.href = "/movie.aspx?ClientID=" + document.getElementById("ClientID").value;
                        }
                    });
                }, function () {
                    //异常，则设置标记
                    Utils.setCookie("positionflag", true, 1);
                });
            }
            else {
                //对象不可用，则设置标记
                Utils.setCookie("positionflag", true, 1);
            }
        }
    }

    Utils.onPageLoad = function () {
        getAddress();
        activity_ad.Init();

        //setTimeout(function () {
        //    activity_ad.ShowAd();
        //    setTimeout(activity_ad.CloseAd, 10000);
        //}, 2000);
    };

    var activity_ad = {
        body: null,
        shadow: null,
        ad: null,
        Init: function () {
            var _this = activity_ad;

            _this.body = document.body;
            _this.shadow = $$("shadow");
            _this.ad = $$("activity_ad");
            _this.ad.addEventListener("click", function () {
                _this.CloseAd();
            }, false);

        },
        ShowShadow: function () {
            var height = document.body.clientHeight > document.documentElement.clientHeight ? document.body.clientHeight : document.documentElement.clientHeight;
            activity_ad.shadow.setAttribute("style", "height:" + height + "px;display:block");
        },
        CloseShadow: function () {
            activity_ad.shadow.setAttribute("style", "display:none");
        },
        ShowAd: function () {
            var _this = activity_ad;

            _this.ShowShadow();

            _this.ad.setAttribute("class", "activity_ad_animation_show");
        },
        CloseAd: function () {
            var _this = activity_ad;

            _this.CloseShadow();

            _this.ad.setAttribute("class", "activity_ad_animation_close");
        }
    }
</script>
<script src="<?php echo e(asset('style/home/js/public.js')); ?>"></script>
<script type="text/javascript" name="baidu-tc-cerfication" src="<?php echo e(asset('style/home/js/lightapp.js')); ?>"></script>
<script type="text/javascript">window.bd && bd._qdc && bd._qdc.init({ app_id: '7a7a35fe993bd40ac8ca2bae' });</script>
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
<script type="text/javascript">
    //<![CDATA[
    var InterfaceErrMsg='';
    var InterfaceErrMsg='';//]]>
</script>
<script type="text/javascript">
     /*创建于2016-06-14*/ 
     var cpro_id = "u2671677";
</script>
<?php /*<script src="http://cpro.baidustatic.com/cpro/ui/cm.js" type="text/javascript"></script>*/ ?>
</body>
</html>
