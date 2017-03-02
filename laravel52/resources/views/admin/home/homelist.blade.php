<!-- $Id: goods_list.htm 17126 2010-04-23 10:30:26Z liuhui $ -->

<link rel="stylesheet" href="{{asset('style/admin/css/ecshop.css')}}">
<form method="post" action="" name="listForm" onsubmit="return confirmSubmit(this)">
    <!-- start goods list -->
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
            <tr>
                <th>
                    <a href="javascript:(0); ">厅号</a>
                </th>
                <th><a href="javascript:(0);">是否正常</th>
                <th><a href="javascript:(0);">操作</th>
            <tr>
            @foreach($homeList as $k=>$v)
            <tr>
                <td>{{ $v->home_name }}</td>
                <td class="first-cell" style="">
                    @if($v->is_open == 1)
                        <img src="{{asset('style/admin/images/yes.jpg')}}" alt="1" width="20" height="20" home_id="{{$v->home_id}}" class="change_open">
                        @else
                        <img src="{{asset('style/admin/images/no.gif')}}" alt="0" width="20" height="20" home_id="{{$v->home_id}}" class="change_open">
                        @endif
                </td>
                <td class="first-cell">
                    <a href="homeCourse?home_id={{$v->home_id}}">安排场次</a>
                </td>
            </tr>
            @endforeach
            <tr><td class="no-records" colspan="10"></td></tr>
        </table>
        <!-- end goods list -->

        <!-- 分页 -->
        {{--<table id="page-table" cellspacing="0">--}}
            {{--<tr>--}}
                {{--<td align="right" nowrap="true">--}}
                    {{--{include file="page.htm"}--}}
                {{--</td>--}}
            {{--</tr>--}}
        {{--</table>--}}
    </div>
</form>
<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<script>
    $(".change_open").click(function()
    {
        var _this  = $(this);
        var is_open = $(this).attr('alt');
        var home_id = $(this).attr('home_id');
        $.ajax({
            type: "get",
            url: "changeOpen",
            data: "is_open="+is_open+'&home_id='+home_id,
            success: function(msg){
                if(msg == 0)
                {
                    _this.attr('src',"{{asset('style/admin/images/no.gif')}}");
                    _this.attr('alt','0');
                }else{
                    _this.attr('src',"{{asset('style/admin/images/yes.jpg')}}");
                    _this.attr('alt','1');
                }
            }
        });
    })
</script>
