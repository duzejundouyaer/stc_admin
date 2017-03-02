<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>添加食物</title>
    <link rel="stylesheet" href="{{asset('style/admin/css/pintuer.css')}}">
    <link rel="stylesheet" href="{{asset('style/admin/css/admin.css')}}">
    <script src="{{asset('style/admin/js/jquery.js')}}"></script>
    <script src="{{asset('style/admin/js/pintuer.js')}}"></script>
    {{--<script type="text/javascript" src="diyUpload/js/webuploader.html5only.min.js"></script>--}}
    {{--<script type="text/javascript" src="diyUpload/js/diyUpload.js"></script>--}}
</head>
<style>
    /**{ margin:0; padding:0;}*/
    /*#box{ margin:50px auto; width:540px; min-height:400px; background:#FF9}*/
    /*#demo{ auto; width:200px; min-height:; background:#CF9}*/
</style>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加食物</strong></div>
    <div class="body-content" id="lala">
        <form method="post" class="form-x" action="{{URL('admin/addfoot')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <div class="label">
                    <label>食物名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="foot_name" data-validate="required:请输入食物名称"/>
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>食物图：</label>
                </div>
                <div class="field">
                    <input type="file" class="button bg-blue margin-left" name="foot_img" data-validate="required:请上传食物图片">
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>价钱：</label>
                </div>
                <div class="field">
                    <input type="text" class="input" name="foot_price" data-validate="required:请输入食物价格"/>
                    <div class="tips"></div>
                </div>

                <div class="form-group">
                    <div class="label">
                        <label></label>
                    </div>
                    <div class="field">
                        <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                    </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>