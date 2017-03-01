<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use App\Model\Move;
use App\Http\Requests;
use App\Uploads\Uploads;
use App\Http\Controllers\Controller;

class MoveController extends Controller
{
    //
    public function moveadd(Request $request){
        if($request->isMethod("post")){
            $data=$request->input();
            //print_r($data);die;
            $movie_type=implode(',',$data['movie_type']);
            $obj = new Uploads();
            $movie_img = $obj->up($_FILES['movie_img']);
            $obj = new Uploads();
            $movie_voi = $obj->up($_FILES['movie_voi']);
            //print_r($mov);die;
            $res=DB::table('movie')->insertGetId([
                'movie_name'=>$data['movie_name'],
                'movie_voi'=>$movie_voi,
                'movie_img'=>$movie_img,
                'movie_type'=>$movie_type,
                'movie_length'=>$data['movie_length'],
                'movie_time'=>$data['movie_time'],
                'movie_director'=>$data['movie_director'],
                'movie_boss'=>$data['movie_boss'],
                'movie_score'=>$data['movie_score'],
                'movie_box'=>$data['movie_box'],
                'movie_price'=>$data['movie_price'],
                'is_hot'=>$data['is_hot'],
                'is_new'=>$data['is_new'],
                'is_status'=>$data['is_status'],
                'movie_desc'=>$data['movie_desc'],
            ]);
            foreach($data['movie_pack'] as $k=>$v){
                $re=DB::table('package')->insert([
                    'movie_id'=>$res,
                    'foot_id'=>$v
                ]);
            }
             if($re){
//                 header('Location:'."admin/movelist");
                 return redirect('admin/movelist');
             }else{
                 return view('errors.503');
             }
            //print_r($data);
        }else{
            $type=DB::table('type')->get();
            $pack=DB::table('pack')->get();
//            print_r($type);die;
            return view('admin.move.addmove',['type'=>$type,'pack'=>$pack]);
        }
    }
    //电影列表
    public function movelist(){
        $data = Move::orderBy('movie_id','desc')->paginate(10);
        //print_r($data);die;
        return view('admin.move.list',compact('data'));
    }

    //
    public function uploadss(){
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit; // finish preflight CORS requests here
        }
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }
// header("HTTP/1.0 500 Internal Server Error");
// exit;
// 5 minutes execution time
        @set_time_limit(5 * 60);
// Uncomment this one to fake upload time
        usleep(5000);
// Settings
// $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = './upload_tmp';
        $uploadDir = './uploads';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

// Create target dir
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir);
        }

// Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $md5File = @file('md5list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $md5File = $md5File ? $md5File : array();

        if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
            die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
        }
        // $fileName = iconv("GB2312", "UTF-8",$fileName);
        $name = explode('.',$fileName);
        $names = $name[1];
        $filePath = $targetDir . DIRECTORY_SEPARATOR .$fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR .time().".".$names;

// Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


// Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


// Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }

                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }

                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }

                flock($out, LOCK_UN);
            }
            @fclose($out);
        }
        $result = array(
            'jsonrpc' => '2.0',
            'result' => 'null',
            'id' => 'id',
            'imgpath' => str_replace('\\','/',$uploadPath),
            'name' =>$fileName
        );
// Return Success JSON-RPC response
        die( json_encode($result));
    }
    //是否最新
    public function isnew(Request $request){
        $str=$request->input('str','');
        $movieid=$request->input('movieid','');
        $res=DB::table('movie')
            ->where('movie_id', $movieid)
            ->update(array('is_new' => $str));
        if($res){
            $data=[
                'code'=>1,
                'info'=>"修改成功",
            ];
            return json_encode($data);
        }else{
            $data=[
                'code'=>0,
                'info'=>"修改失败",
            ];
            return json_encode($data);
        }
    }
    //是否re
    public function ishot(Request $request){
        $str=$request->input('str','');
        $movieid=$request->input('movieid','');
        $res=DB::table('movie')
            ->where('movie_id', $movieid)
            ->update(array('is_hot' => $str));
        if($res){
            $data=[
                'code'=>1,
                'info'=>"修改成功",
            ];
            return json_encode($data);
        }else{
            $data=[
                'code'=>0,
                'info'=>"修改失败",
            ];
            return json_encode($data);
        }
    }
    //是否上映
    public function isstatus(Request $request){
        $str=$request->input('str','');
        $movieid=$request->input('movieid','');
        $res=DB::table('movie')
            ->where('movie_id', $movieid)
            ->update(array('is_status' => $str));
        if($res){
            $data=[
                'code'=>1,
                'info'=>"修改成功",
            ];
            return json_encode($data);
        }else{
            $data=[
                'code'=>0,
                'info'=>"修改失败",
            ];
            return json_encode($data);
        }
    }
}
