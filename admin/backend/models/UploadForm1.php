<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm1 extends Model{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    public function upload()
    {
        foreach ($this->imageFiles as $file) {
            $file->saveAs('./upload/' . $file->baseName . '.' . $file->extension);
        }
        return true;
    }
}