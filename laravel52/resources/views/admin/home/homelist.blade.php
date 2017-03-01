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
                        <img src="{{asset('style/admin/images/yes.jpg')}}" alt="" width="20" height="20">
                        @else
                        <img src="{{asset('style/admin/images/no.gif')}}" alt="" width="20" height="20">
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
