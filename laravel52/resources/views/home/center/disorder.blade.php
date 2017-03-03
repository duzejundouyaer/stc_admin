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
                        <p class="fl paint Hide"><a href="javascript:void(0)" style="color: white;"><b id="defaultCityName">深圳</b></a></p>
                        <img src="http://m.douyou100.com/Resources/douyou100_1/images/city.png" width="12" height="11" "javascript:return window.location.href='javascript:void(0)../City.aspx?ClientID='" />
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
                    单号：{{$orderone->order_number}}
                </div>
            </div>
        </div>

        <!--正在热映详情样式开始-->
        <div class="movie_infor">

            <div class="movie_in fl top">
                <dl>
                    <dt>
                        <img src="{{asset($orderone->movie_img)}}" width="147" height="203" /></dt>
                    <dd>
                        <div class="all_dd">
                            <p class="Hide f15 fl w_movie">{{$orderone->movie_name}}</p>
                        </div><br/>
                        <p class="all_dd clear Hide f12"><span class="hhsz">票数：</span>{{$orderone->count}} 张</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">单价：</span>￥{{$orderone->day_price}} &nbsp;&nbsp;&nbsp;<span style="text-decoration:line-through;">￥{{$orderone->movie_price}} </span></p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">总价：</span>￥{{$orderone->price}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">厅号：</span>{{$orderone->home_name}}</p>
                        {{--<p class="all_dd clear Hide f12"><span class="hhsz">产地： </span>{}</p>--}}
                        <br/>
                        <p class="all_dd clear Hide f12"><span class="hhsz">开播时间:</span>{{$orderone->day}}&nbsp;&nbsp;{{$orderone->begin_time}}&nbsp;--&nbsp;{{$orderone->end_time}}</p>
                        <br/>
                        <?php if($orderone->status==0){?>
                        <div class="all_dd clear" style="margin-bottom: 4px;">
                                <input name="" id="Gp" type="button" value="购  票" class="btn_infor_gp"   onclick="window.location.href='{{URL('/ispayshou')}}/{{$orderone->order_id}}'" />
                        </div>
                        <?php }?>
                    </dd>
                </dl>

                <div class="clear"></div>
            </div>



        </div>
            <div class="new_nav clear fl">
                <ul>
                    <li class="cur" id='newtab1' >剧情</li>
                    <li class="cur " id='newtab2' >套餐<div class="border fl"></div>
                    </li>
                    <li class="cur new_nav_sel_li" id='newtab3'>座号<div class="border fl"></div>
                    </li>
                </ul>
            </div>

        <div id='newtabid1' class='tabid clear mr_top' style='display: none;'>
            <div class="story clear">
                <div class="fl">剧情：</div>

            </div>

        </div>
            <div id='newtabid2' class='tabid clear' style='display: none;'>
                    <div class="poster fl" style="height: auto">
                        <a href="javascript:void(0)" style="float:right;margin-right:30px;margin-top:15px;">购买</a>
                        <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline">
                            <div style="500%"><dl style="width:350px;">
                                    <?php if($pack==""){?>
                                        <dd  style="float:right;width:280px;margin-left:20px;">
                                            <p>你没有买套餐！☹</p>
                                        </dd>
                                    <?php }else{ ?>
                                        <dt  style="float:left; width:40px;">
                                            <img  src="{{$pack->pack_img}}" alt="" style="margin-top:10px;border-radius:80px;width:50px;height:50px;">
                                        </dt>
                                        <dd  style="float:right;width:280px;margin-left:20px;">
                                            <p>套餐名称：{{$pack->pack_name}}</p>
                                            <p>套餐价格：{{$pack->discount_price}}&nbsp;&nbsp;&nbsp;<span style="text-decoration:line-through;">￥{{$pack->original_price}} </span></p>
                                        </dd>
                                    <?php }?>

                                </dl>
                            </div>
                            <hr style="height:1px;border:none;border-top:1px dashed #C6A300; width:500px;" />
                        </div>
                    </div>

            </div>
                    <!--   <div class="more clear">
                <button type="button" class="btn_jz cur" id="more" "var ClientID = document.getElementById('ClientID').value; window.location.href='javascript:void(0)PictureList.aspx?filmNo=10001449&ClientID='+ClientID">更多剧照>></button>
            </div> -->
</div>
<div id='newtabid3' class='tabid clear' >
    <div class="poster fl" style="height: auto">
        <a href="javascript:void(0)" style="float:right;margin-right:30px;margin-top:15px;"></a>
        <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline">
            <div style="500%"><dl style="width:350px;">
                    <dt  style="float:left; width:40px;">{{$orderone->home_name}}</dt>
                    <dd  style="float:right;width:280px;margin-left:20px;">
                        <?php foreach($orderone->zuo as $key=>$val){?>
                        <p><?=$val?></p>
                        <?php }?>
                    </dd>
                </dl>
            </div>
            <hr style="height:1px;border:none;border-top:1px dashed #C6A300; width:500px;" />
        </div>
    </div>

</div>


<!--正在热映详情样式结束-->
<div id="footer" class="foot clear" >
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