<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\apiModel;

use Symfony\Component\Process\Process;

use Symfony\Component\Process\Exception\ProcessFailedException;

use Illuminate\Support\Facades\DB;

class apiController extends Controller
{
    protected $DB;
    public function __construct()
    {
        $this->DB = new apiModel();
    }
    
    public function api_being_vote(){
        
        $result = $this->DB->api_being_vote();

        return json_encode($result);
    }

    public function api_being_pk_vote(){
        
        $result = $this->DB->api_being_pk_vote();

        return json_encode($result);
    }

    public function api_baseToJPG(Request $request){

        $id = $request->id;

        if(empty($id)){
            return '請傳入id!';
        }

        $question = DB::table('question')->where('question_seq', '=', $id)
                                            ->get();
        if($question->first()){
            foreach($question as $value){
                if($value->img){
                    $url = 'https://vote-backend.nownews.com/images/question/'.$value->question_seq.'/img';
                    $imageDataEncoded = base64_encode(file_get_contents($url));
                    $imageData = base64_decode($imageDataEncoded);
                    $source = imagecreatefromstring($imageData);
                    // $angle = 90;
                    // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                    $imageName = "/var/www/vote2021/vote2021/public/baseToJPG/".$value->question_seq.".jpg";
                    $imageSave = imagejpeg($source,$imageName,100);

                    // 縮圖
                    $imageName_sm = "/var/www/vote2021/vote2021/public/baseToJPG/".$value->question_seq."-sm.jpg";
                    $image_sm = imagescale($source, 800); //縮圖
                    $imageSave = imagejpeg($image_sm,$imageName_sm,80);
                    imagedestroy($source);
                    $process = new Process(['sudo', 'cp', '/var/www/vote2021/vote2021/public/baseToJPG/'.$value->question_seq.'.jpg', '/mnt/baseToJPG']);
                    $process->run();
                    if (!$process->isSuccessful()) { 
                        return 'table：question & id：'.$value->question_seq.' 失敗';
                    }

                    $process = new Process(['sudo', 'cp', '/var/www/vote2021/vote2021/public/baseToJPG/'.$value->question_seq.'-sm.jpg', '/mnt/baseToJPG']);
                    $process->run();
                    if (!$process->isSuccessful()) { 
                        return 'table：question & id：'.$value->question_seq.' 小圖失敗';
                    }
                }

                $topic01 = DB::table('topic01')->where('question_seq', '=', $value->question_seq)
                                                ->get();
                if($topic01->first()){
                    foreach($topic01 as $val){
                        if($val->img){
                            $url = 'https://vote-backend.nownews.com/images/topic01/'.$val->topic01_seq.'/img';
                            $imageDataEncoded = base64_encode(file_get_contents($url));
                            $imageData = base64_decode($imageDataEncoded);
                            $source = imagecreatefromstring($imageData);
                            // $angle = 90;
                            // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                            $imageName = "/var/www/vote2021/vote2021/public/baseToJPG/".$val->topic01_seq.".jpg";
                            $imageSave = imagejpeg($source,$imageName,100);

                            // 縮圖
                            $imageName_sm = "/var/www/vote2021/vote2021/public/baseToJPG/".$val->topic01_seq."-sm.jpg";
                            $image_sm = imagescale($source, 800); //縮圖
                            $imageSave = imagejpeg($image_sm,$imageName_sm,80);
                            imagedestroy($source);
                            $process = new Process(['sudo', 'cp', '/var/www/vote2021/vote2021/public/baseToJPG/'.$val->topic01_seq.'.jpg', '/mnt/baseToJPG']);
                            $process->run();
                            if (!$process->isSuccessful()) { 
                                return 'table：topic01 & id：'.$val->topic01_seq.' 失敗';
                            }

                            $process = new Process(['sudo', 'cp', '/var/www/vote2021/vote2021/public/baseToJPG/'.$val->topic01_seq.'-sm.jpg', '/mnt/baseToJPG']);
                            $process->run();
                            if (!$process->isSuccessful()) { 
                                return 'table：topic01 & id：'.$val->topic01_seq.' 小圖失敗';
                            }
                        }

                        $topic02 = DB::table('topic02')->where('topic01_seq', '=', $val->topic01_seq)
                                                ->get();
                        if($topic02->first()){
                            foreach($topic02 as $v){
                                if($v->img){
                                    $url = 'https://vote-backend.nownews.com/images/topic02/'.$v->topic02_seq.'/img';
                                    $imageDataEncoded = base64_encode(file_get_contents($url));
                                    $imageData = base64_decode($imageDataEncoded);
                                    $source = imagecreatefromstring($imageData);
                                    // $angle = 90;
                                    // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                                    $imageName = "/var/www/vote2021/vote2021/public/baseToJPG/".$v->topic02_seq.".jpg";
                                    $imageSave = imagejpeg($source,$imageName,100);

                                    // 縮圖
                                    $imageName_sm = "/var/www/vote2021/vote2021/public/baseToJPG/".$v->topic02_seq."-sm.jpg";
                                    $image_sm = imagescale($source, 800); //縮圖
                                    $imageSave = imagejpeg($image_sm,$imageName_sm,80);
                                    imagedestroy($source);
                                    $process = new Process(['sudo', 'cp', '/var/www/vote2021/vote2021/public/baseToJPG/'.$v->topic02_seq.'.jpg', '/mnt/baseToJPG']);
                                    $process->run();
                                    if (!$process->isSuccessful()) { 
                                        return 'table：topic02 & id：'.$v->topic02_seq.' 失敗';
                                    }

                                    $process = new Process(['sudo', 'cp', '/var/www/vote2021/vote2021/public/baseToJPG/'.$v->topic02_seq.'-sm.jpg', '/mnt/baseToJPG']);
                                    $process->run();
                                    if (!$process->isSuccessful()) { 
                                        return 'table：topic02 & id：'.$v->topic02_seq.' 小圖失敗';
                                    }
                                }
                            }
                        } 
                    }
                }
            }
            $html_message = '問卷： '.$id.' 所有圖片  ＆   小圖成功！<br/>';

            $domain = array('*');
            $json = json_encode($domain);
            $clear_cdn = $this->clear_cdn($json);
            $clear_cdn = json_decode($clear_cdn);
            if(isset($clear_cdn->meta->status) && $clear_cdn->meta->status == 'success'){
                $domain = array('/*');
                $json = json_encode($domain);
                $clear_cdn = $this->clear_cdn($json);
                $clear_cdn = json_decode($clear_cdn);
                if(isset($clear_cdn->meta->status) && $clear_cdn->meta->status == 'success'){
                    $html_message .= '民調網站CDN清除成功';
                }else{
                    $html_message .= '民調網站CDN清除失敗，請5分鐘後再試<br/>';
                    $html_message .= 'CDN Api 原始回覆訊息：'.$clear_cdn->message;
                }
            }else{
                $html_message .= '民調網站CDN清除失敗，請5分鐘後再試<br/>';
                $html_message .= 'CDN API 原始回覆訊息：'.$clear_cdn->message;
            }

            return $html_message; 
        }else{ 
            return '此問卷不存在！';
        }
    }

    public function clear_cdn($json){
        $url = 'https://ap.mlytics.com/api/v1/zones/vote.nownews.com/purges/';
        //init curl
        $ch = curl_init();
        //curl_setopt可以設定curl參數
        //設定url
        curl_setopt($ch , CURLOPT_URL , $url);
        //設定header
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                                    'apikey: A0hasVO1MFO6yz1ZUVD3MAppW12CHPEVB0iFU2cREmTBwHjtjy'
                                                    ));

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        //啟用POST
        curl_setopt($ch, CURLOPT_POST, true);

        //傳入POST參數
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        //執行，並將結果存回
        $result = curl_exec($ch);

        //關閉連線
        curl_close($ch);

        return $result;
    }
}
