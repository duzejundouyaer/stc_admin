
<link rel="stylesheet" href="{{asset('style/admin/css/select.css')}}">


<div class="pagetit">
    <div class="ptit"> 安排{{$homeInfo->home_name}}场次</div>
    <div class="topnav">
        <a href="" id="today"><u >今天</u></a>
        <a href="" id="tomorry" ><u>明天</u></a>
        <a href="" id="houtian"><u>后天</u></a>
    </div>
    <div class="clear"></div>
</div>
<div style="margin-left: 20px">
    @if($error)
        <div class="mark">
            <span style="color: red">{{ $error }}</span>
        </div>
    @endif
</div>
<div class="content">
    <div class="toptit"> {{$day}} 场次</div>
    <table  border="0"  bgcolor="#FFFFFF"  width="1000">
        <tr bgcolor="#87cefa">
            <td align="center" width="5%">序号</td>
            <td align="center" width="10%">开始时间</td>
            <td align="center" width="10%">结束时间</td>
            <td align="center" width="30%">电影</td>
            <td align="center" width="10%">时长(分钟)</td>
            <td align="center" width="10%">票价</td>
            <td align="center">导演</td>
        </tr>
        @if($counrse)
            @foreach($counrse as $k=>$v)
                <tr bgcolor="#87cefa">
                    <td align="center" width="5%">{{$k+1}}</td>
                    <td align="center" width="10%">{{$v->begin_time}}</td>
                    <td align="center" width="10%">{{$v->end_time}}</td>
                    <td align="center" width="30%">{{$v->movie_name}}<img src="{{asset($v->movie_img)}}" alt="" width="50" height="50"></td>
                    <td align="center" width="10%">{{$v->movie_length}}</td>
                    <td align="center" width="10%">{{$v->day_price}}</td>
                    <td align="center">{{$v->movie_director}}</td>
                </tr>
            @endforeach
            @else
              <tr bgcolor="#87cefa">
                  <td colspan="7" style="text-align: center"><span style="color: red;font-weight: bold">暂没添加场次！</span></td>
              </tr>
          @endif
        <tr style="height: 30px" bgcolor="#87cefa">
            <td colspan="7" style="font-size: 14px;line-height: 30px;padding-left: 120px;">
                <form action="addPlay" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="home_id" value="{{$homeInfo->home_id}}">
                    <input type="hidden" name="day" value="{{$day}}">
                    选择电影:
                    <select name="movie_id" id="">
                        <option value="0">请选择播放电影</option>
                        @foreach($movieList as $k=>$v)
                            <option value="{{$v->movie_id}}">{{$v->movie_name}}</option>
                        @endforeach
                    </select>
                    开始时间: <input type="text" size="10" name="begin_time">
                    结束时间: <input type="text" size="10" name="end_time">
                    票价: <input type="text" name="day_price" size="6">
                    <input type="submit" value="添加场次" >
                </form>
            </td>
        </tr>
    </table>
</div>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script>
    //实现时间相加  date:时间 days 数字  operator 加还是减
    function dateOperator(date,days,operator)
    {

        date = date.replace(/-/g,"/"); //更改日期格式
        var nd = new Date(date);
        nd = nd.valueOf();
        if(operator=="+"){
            nd = nd + days * 24 * 60 * 60 * 1000;
        }else if(operator=="-"){
            nd = nd - days * 24 * 60 * 60 * 1000;
        }else{
            return false;
        }
        nd = new Date(nd);

        var y = nd.getFullYear();
        var m = nd.getMonth()+1;
        var d = nd.getDate();
        if(m <= 9) m = "0"+m;
        if(d <= 9) d = "0"+d;
        var cdate = y+"-"+m+"-"+d;
        return cdate;
    }
    //计算俩日相差
    function getDays(strDateStart,strDateEnd){
        var strSeparator = "-"; //日期分隔符
        var oDate1;
        var oDate2;
        var iDays;
        oDate1= strDateStart.split(strSeparator);
        oDate2= strDateEnd.split(strSeparator);
        var strDateS = new Date(oDate1[0], oDate1[1]-1, oDate1[2]);
        var strDateE = new Date(oDate2[0], oDate2[1]-1, oDate2[2]);
        iDays = parseInt(Math.abs(strDateS - strDateE ) / 1000 / 60 / 60 /24)//把相差的毫秒数转换为天数
        return iDays ;
    }
    var day = new Date();
    var day = day.getFullYear()+"-"+(day.getMonth()+1)+"-"+day.getDate()
    //判断默认选中
    var cha = getDays("{{$day}}",day);
    if(cha == 0)
    {
        $("#today").addClass('currentU');
        $("#today u").css({"color":"#fff"});
    } else if(cha == 1)
    {
        $("#tomorry").addClass('currentU');
        $("#tomorry u").css({"color":"#fff"});
    }else{
        $("#houtian").addClass('currentU');
        $("#houtian u").css({"color":"#fff"});
    }
    //设置链接地址
    $("#today").attr('href','homeCourse?home_id='+ {{ $homeInfo->home_id }}+'&day='+day);
    $("#tomorry").attr('href','homeCourse?home_id='+ {{ $homeInfo->home_id }}+'&day='+dateOperator(day,1,'+'));
    $("#houtian").attr('href','homeCourse?home_id='+ {{ $homeInfo->home_id }}+'&day='+dateOperator(day,2,'+'));



</script>

