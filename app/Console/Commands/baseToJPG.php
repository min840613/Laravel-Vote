<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class baseToJPG extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'baseToJPG';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $aaa = 0;
        $result = DB::table('question')->get();
        if($result->first()){
            foreach($result as $val){
                if(!empty($val->img)){
                    $url = '*********/images/question/'.$val->question_seq.'/img';
                    $imageDataEncoded = base64_encode(file_get_contents($url));
                    $imageData = base64_decode($imageDataEncoded);
                    $source = imagecreatefromstring($imageData);
                    // $angle = 90;
                    // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                    $imageName = "/var/www/*********2021/*********2021/public/baseToJPG/".$val->question_seq.".jpg";
                    $imageSave = imagejpeg($source,$imageName,100);
                    imagedestroy($source);
                    $process = new Process(['sudo', 'cp', '/var/www/*********2021/*********2021/public/baseToJPG/'.$val->question_seq.'.jpg', '/mnt/baseToJPG']);
                    $process->run();
                    
                    $aaa += 1;
                }
            }
        }

        $result = DB::table('topic01')->get();
        if($result->first()){
            foreach($result as $val){
                if(!empty($val->img)){
                    
                    $url = '*********/images/topic01/'.$val->topic01_seq.'/img';
                    $imageDataEncoded = base64_encode(file_get_contents($url));
                    $imageData = base64_decode($imageDataEncoded);
                    $source = imagecreatefromstring($imageData);
                    // $angle = 90;
                    // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                    $imageName = "/var/www/*********2021/*********2021/public/baseToJPG/".$val->topic01_seq.".jpg";
                    $imageSave = imagejpeg($source,$imageName,100);
                    imagedestroy($source);
                    $process = new Process(['sudo', 'cp', '/var/www/*********2021/*********2021/public/baseToJPG/'.$val->topic01_seq.'.jpg', '/mnt/baseToJPG']);
                    $process->run();

                    $aaa += 1;
                }
            }
        }

        $result = DB::table('topic02')->get();
        if($result->first()){
            foreach($result as $val){
                if(!empty($val->img)){

                    $url = '*********/images/topic02/'.$val->topic02_seq.'/img';
                    $imageDataEncoded = base64_encode(file_get_contents($url));
                    $imageData = base64_decode($imageDataEncoded);
                    $source = imagecreatefromstring($imageData);
                    // $angle = 90;
                    // $rotate = imagerotate($source, $angle, 0); // if want to rotate the image
                    $imageName = "/var/www/*********2021/*********2021/public/baseToJPG/".$val->topic02_seq.".jpg";
                    $imageSave = imagejpeg($source,$imageName,100);
                    imagedestroy($source);
                    $process = new Process(['sudo', 'cp', '/var/www/*********2021/*********2021/public/baseToJPG/'.$val->topic02_seq.'.jpg', '/mnt/baseToJPG']);
                    $process->run();

                    $aaa += 1;
                }
            }
        }

        echo $aaa;
        return 0;
    }
}
