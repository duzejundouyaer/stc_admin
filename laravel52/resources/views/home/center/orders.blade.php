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
{{--    <script src="{{asset('style/home/js/iscroll.js')}}"></script>--}}
    <style>
        .all
        {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="all">
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

        <div id='newtabid1' class='tabid clear mr_top' style='display: block;'>
            @foreach($data as $key => $val)
            <div class="poster fl" style="height: auto">
                <a href="disorder/{{$val->order_id}}" style="float:right;margin-right:30px;margin-top:15px;">查看</a>
                <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline">
                    <div style="500%"><dl style="width:350px;">
                            <dt  style="float:left; width:40px;"><img  src="{{asset($val->movie_img)}}" alt="" style="margin-top:10px;border-radius:80px;width:50px;height:50px;">
                            </dt>
                            <dd  style="float:right;width:280px;margin-left:20px;">
                                <p>单号：{{$val->order_number}} &nbsp;&nbsp;&nbsp;<span>{{$val->home_name}}</span></p>
                                <p>票数：{{$val->count}}&nbsp;&nbsp;总价格：{{$val->price}}</p>
                            </dd>
                        </dl>
                    </div>
                    <hr style="height:1px;border:none;border-top:1px dashed #C6A300; width:500px;" />
                </div>
            </div>
            @endforeach
        </div>


        <div id='newtabid2' class='tabid clear' style='display: none;'>

            <div class="poster fl" style="height: auto">
                222
              </div>
            </div>
            </div>


        <div id='newtabid3' class='tabid clear'  style='display: block;' >
            111
        </div>
        <div id="foot" class="foot clear">
            <p><a href="javascript:void(0)" class="c1">帮助</a><a  href="javascript:void(0)" class="c1">客户端</a><a href="javascript:void(0)" class="c1">意见反馈</a></p>
            <p><a href="javascript:void(0)" style="margin-right:10px;" id="CustomService">400-066-8882</a>     http://m.douyou100.com</p>
            <p class="f10">Copyright2005-2013 兜有电影版权所有. </p>
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
        $("#newtabid1").show();
        $("#newtabid2").hide();
        $("#newtabid3").hide();
        $("#newtab1").css("background","#FFD306")
        $("#newtab1").css("color","#272727")
        $("#newtab2").css("background","#272727")
        $("#newtab2").css("color","#fff")
        $("#newtab3").css("background","#272727")
        $("#newtab3").css("color","#fff")
        $("#newtab1").click(function(){
          var _token="{{csrf_token()}}";
          $.ajax({
              type: "POST",
              url: "orders",
              data: {_token:_token,pay:1},
              dataType: "json",
              success: function(msg){
                  //alert(msg);
                  var str="";
                  str+=ordersweiyipay(msg);
                  if(str==""){
                      str+="没有支付订单";
                  }

                   $("#newtabid1").html(str);
                   $("#newtabid1").show();
                   $("#newtabid2").hide();
                   $("#newtabid3").hide();

                   $("#newtab1").css("background","#FFD306")
                   $("#newtab1").css("color","#272727")
                   $("#newtab2").css("background","#272727")
                   $("#newtab2").css("color","#fff")
                   $("#newtab3").css("background","#272727")
                   $("#newtab3").css("color","#fff")
              }
          });
        })
       $("#newtab2").click(function(){
           var _token="{{csrf_token()}}";
           $.ajax({
               type: "POST",
               url: "orders",
               data: {_token:_token,pay:0},
               dataType: "json",
               success: function(msg){
                   //alert(msg);
                   var str="";
                   str+=ordersweiyipay(msg);
                   if(str==""){
                       str+="没有未支付订单";
                   }
                   $("#newtabid2").html(str);
                   $("#newtabid1").hide();
                   $("#newtabid2").show();
                   $("#newtabid3").hide();
                   $("#newtab2").css("background","#FFD306")
                   $("#newtab2").css("color","#272727")
                   $("#newtab1").css("background","#272727")
                   $("#newtab1").css("color","#fff")
                   $("#newtab3").css("background","#272727")
                   $("#newtab3").css("color","#fff")
               }
           });
        })
       $("#newtab3").click(function(){
           var _token="{{csrf_token()}}";
           $.ajax({
               type: "POST",
               url: "orders",
               data: {_token:_token,pay:3},
               dataType: "json",
               success: function(msg){
                   //alert(msg);
                   var str="";
                   str+=ordersweiyipay(msg);
                   if(str==""){
                       str+="没有失效订单";
                   }
                   $("#newtabid3").html(str);
                    $("#newtabid1").hide();
                    $("#newtabid2").hide();
                    $("#newtabid3").show();
                    $("#newtab3").css("background","#FFD306")
                   $("#newtab3").css("color","#272727")
                   $("#newtab1").css("background","#272727")
                   $("#newtab1").css("color","#fff")
                   $("#newtab2").css("background","#272727")
                   $("#newtab2").css("color","#fff")
               }
           });
        })
    })
    function ordersweiyipay(msg){
        var str="";
        for(i in msg){
            str+=" <div class='poster fl' style='height: auto'>" +
            "<a href='disorder/"+msg[i].order_id+"' style='float:right;margin-right:30px;margin-top:15px;'>查看</a> <div class='hsz' style='width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline'> " +
            "<div style='500%'><dl style='width:350px;'>" +
            " <dt  style='float:left; width:40px;'>" +
            "<img  src='"+msg[i].movie_img+"' style='margin-top:10px;border-radius:80px;width:50px;height:50px;'>" +
            " </dt> <dd  style='float:right;width:280px;margin-left:20px;'> " +
            "<p>单号："+msg[i].order_number+"&nbsp;&nbsp;&nbsp;<span>"+msg[i].home_name+"</span></p>" +
            " <p>票数："+msg[i].count+"&nbsp;&nbsp;总价格："+msg[i].price+"</p>" +
            " </dd> </dl> " +
            "</div> " +
            "<hr style='height:1px;border:none;border-top:1px dashed #C6A300; width:500px;' />" +
            " </div>" +
            " </div>";
        }
        return str;
    }
</script>