<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
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
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

        <table class="table table-bordered table-hover definewidth m10">
            <tr>
                <td class="tableleft">上传多个图片</td>
                <td><?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

                </td>
            </tr>

            <tr>
                <td class="tableleft"></td>
                <td>
                    <button type="submit" class="btn btn-primary" type="button">保存</button>
                </td>
            </tr>

            <?php ActiveForm::end() ?>
    </div>
</div>
</body>
</html>