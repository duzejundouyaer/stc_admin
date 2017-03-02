<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加电影</title>
    <link rel="stylesheet" href="{{asset('style/admin/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('style/admin/css/admin.css')}}">
    <script src="{{asset('style/admin/js/jquery.js')}}"></script>
    <script src="{{asset('style/admin/js/pintuer.js')}}"></script>

    {{--<link rel="stylesheet" type="text/css" href="{{asset('style/admin/diyUpload/css/webuploader.css')}}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('style/admin/diyUpload/css/diyUpload.css')}}">--}}
    {{--<script type="text/javascript" src="{{asset('style/admin/diyUpload/js/webuploader.html5only.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{asset('style/admin/diyUpload/js/diyUpload.js')}}"></script>--}}
</head>
<style>
    *{ margin:0; padding:0;}
    #box{ margin:50px auto; width:540px; min-height:400px; background:#FF9}
    #demo{ auto; width:200px; min-height:; background:#CF9}
</style>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加电影</strong></div>
    <div class="body-content" id="lala">
        <form method="post" class="form-x" action="{{URL('admin/moveadd')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <div class="label">
                    <label>电影名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_name" data-validate="required:请输入电影名称"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影地区：</label>
                </div>
                <div class="field">
                    <select name="movie_region" class="input w50">
                        <option value="大陆">大陆</option>
                        <option value="欧美">欧美</option>
                        <option value="日韩">日韩</option>
                        <option value="港澳">港澳</option>
                    </select>
                    <div class="tips">默认一级分类</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>课程封面图：</label>
                </div>
                <div class="field">
                    <input type="file" class="button bg-blue margin-left" name="movie_img" data-validate="required:请上传电影封面图">
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>是否上映：</label>
                </div>
                <div class="field">
                    {{--<input type="radio" onclick="yivideo()" name="release" value="1" data-validate="required:请选择"/>已上映--}}
                    {{--<input type="radio" onclick="weivideo()" name="release" value="0" data-validate="required:请选择"/>未上映--}}

                <div class="tips"></div>
                    <div class="button-group radio">
                        <label class="button active"  style="cursor: pointer">
                            <span class="icon icon-check"></span>
                            <input name="release" onclick="yivideo()" value="1" type="radio" checked="checked">是
                        </label>

                        <label class="button active"  style="cursor: pointer">
                            <span class="icon icon-times"></span>
                            <input name="release" onclick="weivideo()" value="0"  type="radio" checked="checked">否
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group" id="videos" style="display: none">
                <div class="label">
                    <label>电影预告：</label>
                </div>
                <div class="field">
                    <input type="file" class="button bg-blue margin-left" name="movie_voi[]">
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>所属类型：</label>
                </div>
                <div class="field">
                    <?php foreach($type as $key=>$val){?>
                        <input type="checkbox" name="movie_type[]" value="<?=$val->type_name?>" data-validate="required:请选择"/><?=$val->type_name?>
                    <?php }?>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>电影套餐：</label>
                </div>
                <div class="field">
                    <?php foreach($pack as $key=>$val){?>
                    <input type="checkbox" name="movie_pack[]" value="<?=$val->id?>" data-validate="required:请选择"/><?=$val->pack_name?>
                    <?php }?>
                    <div class="tips"></div>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<div class="label">--}}
                    {{--<label>电影预告：</label>--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                    {{--<div id="demo">--}}
                        {{--<div id="as" ></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="form-group">
                <div class="label">
                    <label>电影时长：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_length" placeholder="输入电影分钟数" data-validate="required:请输入电影时长,number:时长必须为数字"/>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>上映时间：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_time" placeholder="输入电影上映日期" data-validate="required:请输入电影上映时间"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影导演：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_director" data-validate="required:请输入电影导演"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影主演：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_boss" data-validate="required:请输入电影主演"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影评分：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_score" data-validate="required:请输入电影评分"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影票房：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_box" data-validate="required:请输入电影评分"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影市场价：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="movie_price" data-validate="required:请输入电影评分"/>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>是否最热：</label>
                </div>
                <div class="field">
                    <div class="button-group radio">

                        <label class="button active">
                            <span class="icon icon-check"></span>
                            <input name="is_hot" value="1" type="radio" checked="checked" style="cursor: pointer">是
                        </label>

                        <label class="button active"><span class="icon icon-times"></span>
                            <input name="is_hot" value="0"  type="radio" checked="checked" style="cursor: pointer">否
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否最新：</label>
                </div>
                <div class="field">
                    <div class="button-group radio">
                        <label class="button active"  style="cursor: pointer">
                            <span class="icon icon-check"></span>
                            <input name="is_new" value="1" type="radio" checked="checked">是
                        </label>

                        <label class="button active"  style="cursor: pointer">
                            <span class="icon icon-times"></span>
                            <input name="is_new" value="0"  type="radio" checked="checked">否
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>电影状态：</label>
                </div>
                <div class="field">
                    <div class="button-group radio">
                        <label class="button active"  style="cursor: pointer">
                            <span class="icon icon-check"></span>
                            <input name="is_status" value="1" type="radio" checked="checked">是
                        </label>

                        <label class="button active"  style="cursor: pointer">
                            <span class="icon icon-times"></span>
                            <input name="is_status" value="0"  type="radio" checked="checked">否
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>电影描述：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="movie_desc" data-validate="required:请输入课程描述"></textarea>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    {{--<button class="button bg-main icon-check-square-o" type="button" id="jie"> 追加章节</button>--}}
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script>
    function yivideo(){
        $("#videos").hide();
    }
    function weivideo(){
        $("#videos").show();
    }
    {{--var _token="{{csrf_token()}}";--}}
    {{--$('#as').diyUpload({--}}
        {{--url:"{{URL('admin/uploadss')}}",--}}
{{--//        data:{_token:_token},--}}
        {{--success:function( data ) {--}}
            {{--console.info( data );--}}
            {{--alert(data['imgpath'])--}}
        {{--},--}}
        {{--error:function( err ) {--}}
            {{--console.info( err );--}}
        {{--},--}}
        {{--buttonText : '选择文件',--}}
        {{--chunked:true,--}}
        {{--// 分片大小--}}
        {{--chunkSize:512 * 1024,--}}
        {{--//最大上传的文件数量, 总文件大小,单个文件大小(单位字节);--}}
        {{--fileNumLimit:50,--}}
        {{--fileSizeLimit:5000000 * 1024,--}}
        {{--fileSingleSizeLimit:5000000 * 1024,--}}
        {{--accept: {--}}

        {{--}--}}
    {{--});--}}
</script>