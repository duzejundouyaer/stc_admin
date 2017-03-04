<?php
use Symfony\Component\HttpFoundation\Session\Session;
$session = new Session;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
    .cloum{text-align: center;margin-top:; }
    .rating{
    width:80px;
    height:16px;
    margin:0 0 20px 0;
    padding:0;
    list-style:none;
    clear:both;
    position:relative;
    background: url("{{asset('star-matrix.gif')}}") no-repeat 0 0;
}
.nostar {background-position:0 0}
.onestar {background-position:0 -16px}
.twostar {background-position:0 -32px}
.threestar {background-position:0 -48px}
.fourstar {background-position:0 -64px}
.fivestar {background-position:0 -80px}
ul.rating li {
    cursor: pointer;
    float:left;
    text-indent:-999em;
}
ul.rating li a {
    position:absolute;
    left:0;
    top:0;
    width:16px;
    height:16px;
    text-decoration:none;
    z-index: 200;
}
ul.rating li.one a {left:0}
ul.rating li.two a {left:16px;}
ul.rating li.three a {left:32px;}
ul.rating li.four a {left:48px;}
ul.rating li.five a {left:64px;}
ul.rating li a:hover {
    z-index:2;
    width:80px;
    height:16px;
    overflow:hidden;
    left:0; 
    background: url("{{asset('star-matrix.gif')}}") no-repeat 0 0
}
ul.rating li.one a:hover {background-position:0 -96px;}
ul.rating li.two a:hover {background-position:0 -112px;}
ul.rating li.three a:hover {background-position:0 -128px}
ul.rating li.four a:hover {background-position:0 -144px}
ul.rating li.five a:hover {background-position:0 -160px}
</style>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <title>
         爱影院
    </title>
    <link id="ctl00_css1" href="{{asset('style/home/css/style.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/home/css/inside_pages.css')}}" rel="stylesheet" />
    <link id="ctl00_css2" href="{{asset('style/home/css/demo.css')}}" rel="stylesheet" />
  
  
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
        <li class="fr Hide">
            <label>
               <?php if($session->get('nickname')==""){?>
                    <p class="fl paint Hide"><a href="{{URL('login')}}" style="color: white; margin-right:10px;">登陆</a></p>
               <?php }else {?>
                    <p class="fl paint Hide"><a href="{{URL('center')}}" style="color: white; margin-right:10px;">{{$nickname}}</a></p>
                <?php }?>
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
                   {{$desc->movie_name}}-详情
                </div>
            </div>
        </div>

        <!--正在热映详情样式开始-->
        <div class="movie_infor">

            <div class="movie_in fl top">
                <dl>
                    <dt>
                        <img src="{{asset($desc->movie_img)}}" width="147" height="203" /></dt>
                    <dd>
                        <div class="all_dd">
                            <p class="Hide f15 fl w_movie">{{$desc->movie_name}}  </p>
                            <span class="fr hsz" id="pingfeng">{{$desc->movie_score}}</span>
                        </div>
                        <p class="all_dd clear Hide f12"><span class="hhsz">导演：</span> {{$desc->movie_director}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">主演：</span>{{$desc->movie_boss}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">类型：</span>{{$desc->movie_type}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">片长：</span> {{$desc->movie_length}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">产地： </span>{{$desc->movie_region}}</p>
                        <p class="all_dd clear Hide f12"><span class="hhsz">上映日期:</span>{{$desc->movie_time}}</p>
                        <div class="all_dd clear" style="margin-bottom: 4px;">
                            @if($desc->release==0)
                            <input name="" id="Gp" type="button" value="还未上映" class="btn_infor_gp" "Buymovie('10001449','我最好朋友的婚礼');" disabled='disabled' onclick="window.location.href='{{URL('/pay')}}/{{$desc->movie_id}}'" />
                            @else
                                 
                                @if($session->get('nickname')=='')
                                    <input  id='Gp' type='button' value='请登录' class='btn_infor_gp'   onclick="window.location.href='{{URL('/login')}}'" />
                               @else
                                    <input  id='Gp' type='button' value='购  票' class='btn_infor_gp'   onclick="window.location.href='{{URL('/pay')}}/{{$desc->movie_id}}'" />
                               @endif
                            @endif
                        </div>


                    </dd>
                </dl>

                <div class="clear"></div>
            </div>



        </div>
          @if($desc->release==0)
        <div class="new_nav clear fl">
            <ul>
                <li class="cur" id='newtab1' >剧情</li>
                <li class="cur " id='newtab2' >预告<div class="border fl"></div>
                </li>
                <li class="cur new_nav_sel_li" id='newtab3'>影评<div class="border fl"></div>
                </li>
            </ul>
        </div>
        @else
        <div class="new_nav clear fl">
            <ul>
                <li class="cur" id='newtab1' >剧情</li>
                <li class="cur " id='newtab2' >新套餐<div class="border fl"></div>
                </li>
                <li class="cur new_nav_sel_li" id='newtab3'>影评<div class="border fl"></div>
                </li>
            </ul>
        </div>
         @endif
        <div id='newtabid1' class='tabid clear mr_top' style='display: none;'>
            <div class="story clear">
                <div class="fl">剧情：</div>
                <p>{{$desc->movie_desc}}</p>
            </div>

        </div>
          @if($desc->release==1)
        <div id='newtabid2' class='tabid clear' style='display: none;'>
            @foreach($packages as $key => $val)
            <div class="poster fl" style="height: auto">
                          @if($session->get('nickname') == '')
                           <a href="javascript:void(0)" style="float:right;margin-right:30px;margin-top:15px;" onclick="window.location.href='{{URL('/login')}}'">登录</a>
                          @else
                          <a href="javascript:void(0)" style="float:right;margin-right:30px;margin-top:15px;" onclick="window.location.href='{{URL('/pay')}}/{{$val->id}}/{{$desc->movie_id}}'">购买</a>
                          @endif
                <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline">
                  <div style="500%"><dl style="width:350px;">
                      <dt  style="float:left; width:40px;"><img  src="{{asset($val->pack_img)}}" alt="" style="margin-top:10px;border-radius:80px;width:50px;height:50px;">
                    </dt>
                      <dd  style="float:right;width:280px;margin-left:20px;">
                        <p>套餐名称：{{$val->pack_name}}</p>
                        <p>套餐价格：<?php echo $desc->movie_price+$val->discount_price?></p>
                    </dd>
                       </dl>
                 </div>
                  <hr style="height:1px;border:none;border-top:1px dashed #C6A300; width:500px;" />
              </div>
            </div>
            @endforeach
            </div>
            @else
            <div id='newtabid2' class='tabid clear' style='display: none;'>
            <div class="poster fl" style="height: auto">
                <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline">
                  <div style="500%">
                    <img src="" alt="" >
                    <video id="myVideo" style="width:300px;height:200px;margin-left:30px;" controls poster="{{$desc->movie_img}}">
                            <source src="{{asset($desc->movie_voi)}}" type="video/mp4">
                         </video>

                 </div>
                  <hr style="height:1px;border:none;border-top:1px dashed #C6A300; width:500px;" />
              </div>
            </div>
           </div> 
            @endif
         
        </div>
        <div id='newtabid3' class='tabid clear' >
            {{--评论--}}
            <div id="dloginbox">
                <span id="number" style="float:right;margin-right:180px;font-size:32px;font-style:italic;color:#00DB00;" ></span>
                 <div class="pro_rating" style=" margin-left:20px; float:left; ">
                给电影评分：
                <ul class="rating nostar" id="infos">
                    <li class="one"><a href="#" title="2" >2</a></li>
                    <li class="two"><a href="#" title="4">4</a></li>
                    <li class="three"><a href="#" title="6">6</a></li>
                    <li class="four"><a href="#" title="8">8</a></li>
                    <li class="five"><a href="#" title="10">10</a></li>
                </ul>
            </div>
                <div class="cloum" >

            <span style="margin-left:180px;">共有<span id="num" style="font-size:18px;color:#FF2D2D;">{{$num}}</span>条评论</span>
                    <textarea  class="emotion" name="" style="font-size:16px;" id="content" cols="50" rows="10" style="" placeholder='来说点儿什么吧。'></textarea>
                </div>
                <div style="margin-left:30px;">
                    <span><a href="javascript:void(0)" style="color:#3C3C3C;" id="face"></a></span>
                    <span style="margin-left:260px;" id="{{$desc->movie_id}}"><a href="javascript:void(0)" id="analytic"   style="color:red;">发布</a></span>
                </div>
                <h3 style="margin-top:10px;margin-left:10px;">请您注意:</h3>
                <div style="margin-top:5px;margin-left:30px">
                    <p>自觉遵守：爱国、守法、自律、真实、文明的原则。</p>
                    <p>尊重网上道德，遵守《全国人大常委会关于维护互联网安全的决定》及中华人民共和国其他各项有关法律法规。</p>
                    <p>严禁发表危害国家安全，破坏民族团结、国家宗教政策和社会稳定，含侮辱、诽谤、教唆、淫秽等内容的作品。</p>
                </div>
            </div>
            <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline" id="header">
                <span class="fr">
                    <?php  
                         if($session->get('nickname')=='')
                         {
                            echo "<a class='hhsz' 'FilmReview(10001449);' href='login'>登录发表评论</a>";
                         }else
                         {
                            echo"<a class='hhsz' 'FilmReview(10001449);' onClick='ShowLoginBox()'  id='FilmReview'>发表影评</a>";
                         }
                    ?>
                    
                </span>
                  <img src='http://m.douyou100.com/Resources/douyou100_1/images/discuss.png' width='14' height='12' class='fr' style='margin-top: 12px;' />
            </div >
            <hr style="height:1px;border:none;border-top:1px dashed #0066CC; width:500px;" id="under"/>
            @foreach($comment as $key =>$value)
            <div class="hsz" style="width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline">
                  <div style="500%"><dl style="width:350px;">
                      <dt  style="float:left; width:40px;"><img  src="{{asset($value->img)}}" style='margin-top:10px;border-radius:80px;width:50px;height:50px;'>
                    </dt>
                      <dd  style="float:right;width:280px;margin-left:20px;"><p>{{$value->c_content}}</p></dd>
                       </dl>
                 </div>
                 <span style="margin-left:80px;">发表于{{$value->c_date}}</span>
                  <hr style="height:1px;border:none;border-top:1px dashed #C6A300; width:500px;" />
            </div>
            @endforeach
             <div class="more clear">
                <button type="button" class="btn_jz cur" id="more" "var ClientID = document.getElementById('ClientID').value; window.location.href='javascript:void(0)PictureList.aspx?filmNo=10001449&ClientID='+ClientID">更多评论>></button>
            </div>
        </div>

<input type="hidden" id="_token" value="{{csrf_token()}}">
        <!--正在热映详情样式结束-->



        <div id="footer" class="foot clear" >
            <p><a href="javascript:void(0)../help.aspx?ClientID=" class="c1">帮助</a><a  href="javascript:void(0)../client.aspx?ClientID=" class="c1">客户端</a><a href="javascript:void(0)../idear.aspx?ClientID=" class="c1">意见反馈</a></p>
            <p><a href="javascript:void(0)tel:400-066-8882" style="margin-right:10px;" id="CustomService">400-666-8888</a>     http://m.douyou100.com</p>
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

</body>
</html>
<script src="{{asset('style/home/js/public.js')}}"></script>
<script src="{{asset('style/home/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('style/home/layer/layer.js')}}"></script>
<script src="{{asset('style/home/js/demo.js')}}"></script>
<script>
    $(function(){
        var star = '';
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
       //通过修改样式来显示不同的星级
    $("ul.rating li a").click(function(){
         var title = $(this).html();
         //alert("您给此电影的评分是："+title);"title"
         star = title;
         $("#number").html(title+"分");
         var cl = $(this).parent().attr("class");
         $(this).parent().parent().removeClass().addClass("rating "+cl+"star");
         $(this).blur();//去掉超链接的虚线框
         return false;
    })
       //发布评论
       $("#analytic").click(function(){
              var content = $("#content").val();
              var movie_id = $(this).parent().attr('id');
              var _token =$('#_token').val();
              var num = $("#num").html();
             $("#analytic").attr("disabled", true);
             $("#analytic").css('color','#6C6C6C');
             if(star == '')
             {
                  alert('请给电影评分,谢谢');
                  return false;
             }else if(content.length<5)
              {
                  alert('请输入5-40个字符之间');
                  return false;
              }else if(content.length>40)
              {
                  alert('请输入5-40个字符之间');
                  return false;
              }else
              {
                    $.ajax({
                   type: "POST",
                   url: "{{URL('commont')}}",
                   data: {content:content,movie_id:movie_id,_token:_token,star:star},
                   dataType:'json',
                   success: function(msg){
                    var image = msg.img;
                    var img = "{!!asset('/')!!}"+image;
                       $("#under").after("<div class='hsz' style='width: 94%; height:100%; margin: 0 3%; line-height: 35px; text-decoration:underline'><div style='500%'><dl style='width:350px;'><dt  style='float:left; width:40px;'><img  src='"+img+"'  style='margin-top:10px;border-radius:80px;width:50px;height:50px;'></dt><dd  style='float:right;width:280px;margin-left:20px;'><p>"+msg.c_content+"</p></dd></dl></div><span style='margin-left:80px;'>发表于"+msg.c_date+"</span><hr style='height:1px;border:none;border-top:1px dashed #C6A300; width:500px;' /></div>");
                       num++
                       $("#num").html(num);
                        $("#analytic").removeAttr("disabled");
                        $("#analytic").css('color','red');
                         $("#pingfeng").html(msg.pingfeng);
                   }
                });
            
            }
       })
 })
</script>