<?php
namespace App\Uploads;
/*

单个文件上传

功能

上传文件

配置允许的后缀

配置允许的大小

获取文件后缀

判断文件的后缀

报错

*/

class Uploads{

protected $allowExt = 'jpg,jpeg,gif,bmp,png';

protected $maxSize = 10; //1M ，以M为单位

protected $file = null; //准备储存上传文件信息

protected $errno = 0; //错误代码

protected $error = array(

0=>'无错',

1=>'上传文件大小超出系统限制',

2=>'上传文件的大小超出网页表单限制',

3=>'文件只有部分被上传',

4=>'没有文件被上传',

6=>'找不到临时文件夹',

7=>'文件写入失败',

8=>'不允许的文件后缀',

9=>'文件大小超出类的允许范围',

10=>'创建目录失败',

11=>'文件移动失败'

);

/*

上传

*/

public function up($key) {

if (!isset($key)) {

return false;

}

$f = $key;

//检验上传是否成功

if ($f['error']) {

   $this->errno = $f['error'];

   return false;

}

//获取后缀

$ext = $this->getExt($f['name']);

//检查后缀

if (!$this->isAllowExt($ext)) {

$this->errno = 8;

return false;

}

//检查大小

if (!$this->isAllowSize($f['size'])) {

$this->errno = 9;

return false;

}

//创建目录

$dir = $this->mk_dir();

   if ($dir == false) {

    $this->errno = 10;

    return fasle;

}

//生成随机文件名

$newname = $this->randName() . '.' .$ext;

//$dir = $dir . '/' .$newname;

//移动

if(!move_uploaded_file($f['tmp_name'], $dir . '/' .$newname)) {

    $this->errno = 11;

    return false;

}else{
    return $dir.'/'.$newname;
}

return true;//str_replace(ROOT, '', $dir);

}

public function getErr(){

     return $this->error[$this->errno];

}

/*

parm string $exts 允许的后缀

自动添加 允许的后缀，和文件的大小

*/

public function setExt($exts) {

    $this->allowExt = $exts;

}

public function setSize($num) {

     $this->maxSize = $num;

}

/*

string $file

return string $ext 后缀

*/

protected function getExt($file) {

    $tmp = explode('.', $file);

    return end($tmp);

}

/*

string $ext 文件后缀

return bool

防止大小写的问题

*/

     protected function isAllowExt($ext) {

         return in_array(strtolower($ext), explode(',', strtolower($this->allowExt))) ;

   }

/*

检查文件的大小

*/
    protected function isAllowSize($size) {

      return $size <= $this->maxSize *1024*1024;

}

//按日期创建目录的方法

protected function mk_dir() {

$dir = './images/' . date('Ym/d');

if(is_dir($dir) || mkdir($dir,0777,true)) {

return $dir;

} else {

return false;

}

}

/*

生成随机文件名

*/

protected function randName($length = 6) {

     $str = 'abcdefghijkmnpqrstuvwxyz23456789';

     return substr(str_shuffle($str),0,$length);

    }

}