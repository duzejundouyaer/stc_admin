<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
    <style>
        #preview, .img, img
        {
            width:200px;
            height:150px;
        }
        #preview
        {
            border:1px solid #000;
        }
    </style>
</head>
<body>
<div class="panel admin-panel margin-top" id="add">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加图片</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="?r=advice/add" enctype="multipart/form-data">
            <div class="form-group">
            <div class="label">
            <label>标题：</label>
            </div>
            <div class="field">
            <input type="text" class="input w50" value="" name="advice_title" data-validate="required:请输入咨询标题" />
            <div class="tips"></div>
            </div>
            </div>
            <div class="form-group">
            <div class="label">
            <label>咨询描述</label>
            </div>
            <div class="field">
            <input type="text" class="input w50" name="advice_desc" value="" data-validate="required:请输入咨询描述"  />
            <div class="tips"></div>
            </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field">
                    <div id="preview"></div>
                    <input type="file" name="advice_img" onchange="preview(this)" />
                    <script type="text/javascript">
                        function preview(file)
                        {
                            var prevDiv = document.getElementById('preview');
                            if (file.files && file.files[0])
                            {
                                var reader = new FileReader();
                                reader.onload = function(evt){
                                    prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
                                };
                                reader.readAsDataURL(file.files[0]);
                            }
                            else
                            {
                                prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="form-group">
            <div class="label">
            <label>咨询内容</label>
            </div>
            <div class="field">
            <textarea data-validate="required:请输入咨询内容" type="text" class="input" name="advice_con" style="height:120px;" value=""></textarea>
            <div class="tips"></div>
            </div>
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