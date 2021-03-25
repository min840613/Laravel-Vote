<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\indexModel;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;
use Session;
use URL;
use Excel;
use App\Exports\ExcelExport;

class indexController extends Controller
{
    //
    protected $DB;
    protected $meta_title;
    protected $meta_desc;

    public function __construct()
    {
        date_default_timezone_set('Asia/Taipei');
        $this->DB = new indexModel();
        $this->meta_title = '*********民調';
        $this->meta_desc = '體察生活大小事，全民意見報你知！各式議題的民意調查，客觀呈現不同聲音與想法，蒐羅所有時下趨勢的意見報告，盡在NOW民調。';
    }

    public function index()
    {
        $being_********* = $this->DB->get_being_*********('carousel'); //首頁上方輪播
        $pk_********* = $this->DB->get_pk_*********(); //首頁PK輪播
        $limit_being_********* = $this->DB->get_being_*********('list'); //首頁火熱投票
        $over_********* = $this->DB->get_over_*********('list', 3); //首頁已結束投票
        $interest_********* = $this->DB->get_interest_*********(6);
        return view('index')->with('being_*********', $being_*********)
                            ->with('pk_*********', $pk_*********)
                            ->with('limit_being_*********', $limit_being_*********)
                            ->with('over_*********', $over_*********)
                            ->with('interest_*********', $interest_*********)
                            ->with('meta_title', $this->meta_title)
                            ->with('meta_desc', $this->meta_desc);
    }

    public function get_*********Type($type_id, Request $request){
        $og_keywords = '';
        if($type_id == 'being_*********'){ //火熱投票中
            $type_code = '';
            $type_name = '火熱投票中';
            $pk_********* = $this->DB->get_pk_*********();
            $being_********* = $this->DB->get_being_*********('list');
            $over_********* = $this->DB->get_over_*********('pagination', 0, $type_id);

        }else if($type_id == 'over_*********'){ //PK投票
            $type_code = '';
            $type_name = '已結束投票';
            $pk_********* = $this->DB->get_pk_*********($type_id);
            $being_********* = $this->DB->get_being_*********('list', 0, $type_id);
            $over_********* = $this->DB->get_over_*********('pagination', 0);
        }else if($type_id == 'search'){
            $type_code = 'search';
            $type_name = '搜尋';
            $keyword = $request->input('keyword');
            $pk_********* = $this->DB->get_pk_*********('', $keyword);
            $being_********* = $this->DB->get_being_*********('list', 0, '', $keyword);
            $over_********* = $this->DB->get_over_*********('pagination', 0, '', $keyword);

        }else{
            $type = $this->DB->get_nav($type_id);
            $type_code = $type->code;
            $type_name = $type->name;
            $pk_********* = $this->DB->get_pk_*********($type_id);
            $being_********* = $this->DB->get_being_*********('list', 0, $type_id);
            $over_********* = $this->DB->get_over_*********('pagination', 0, $type_id);
            $og_keywords = $type_name.',*********民調,*********,今日新聞,網路投票,線上投票';
        }

        $request_page = 1;
        if($request->input('page')!== NULL && !empty($request->input('page'))){
            $request_page = $request->input('page');
        }

        $this->meta_title = $type_name.'(第'.$request_page.'頁) | *********民調';

        if($type_name == '政治'){
            $this->meta_desc ='【*********民調 | '.$type_name.'(第'.$request_page.'頁) 】跟緊政治時事，探討網民最真實的感受。';
        }
        if($type_name == '生活'){
            $this->meta_desc ='【*********民調 | '.$type_name.'(第'.$request_page.'頁) 】體察生活大小事，傾聽全民的聲音。';
        }
        if($type_name == '電影娛樂'){
            $this->meta_desc ='【*********民調 | '.$type_name.'(第'.$request_page.'頁) 】最熱門、最有趣！顛覆傳統民調，都在NOW民調。';
        }
        if($type_name == '話題新聞'){
            $this->meta_desc ='【*********民調 | '.$type_name.'(第'.$request_page.'頁) 】隨時更新時下最熱門話題，邀請網民一起表達最忠實的意見。';
        }
        
        return view('category')->with('type_code', $type_code)
                                ->with('type_name', $type_name)
                                ->with('pk_*********', $pk_*********)
                                ->with('being_*********', $being_*********)
                                ->with('over_*********', $over_*********)
                                ->with('meta_title', $this->meta_title)
                                ->with('meta_desc', $this->meta_desc)
                                ->with('og_keywords', $og_keywords);
    }

    public function get_*********Result($id){
        $*********Result =  $this->DB->get_*********Result($id);
        $being_********* = $this->DB->get_being_*********('carousel', '', '', '', 'yes'); //首頁上方輪播
        $interest_********* = $this->DB->get_interest_*********(6);
        // $pk_********* = $this->DB->get_pk_*********(); //首頁PK輪播
        $roster = '';

        $og_image_height = 536;

        if(!empty($*********Result)){
            // if($*********Result[0]['q_login'] == 'Y' && !Session::has('email')){
            //     echo "<script>location.href = '".url('/login')."'</script>";
            // }else{
                if(strpos($*********Result[0]['q_title'], 'PK') !== false){
                    // PK投票結果
                    $has_********* = false;
                    if($*********Result[0]['q_login'] == 'Y' && Session::has('email')){
                        $has_answer = $this->DB->has_answer($id, Session::get('user_name'));
                        if($has_answer->first()){
                            $has_********* = true;
                        }
                    }
                    $*********_command1 = $this->DB->get_*********_command($*********Result[0]['all'][0]->t1_topic01_seq, $*********Result[0]['all'][0]->t2_topic02_seq);
                    $*********_command2 = $this->DB->get_*********_command($*********Result[0]['all'][1]->t1_topic01_seq, $*********Result[0]['all'][1]->t2_topic02_seq);
                    // var_dump($*********_command1);
                    // die();
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********Result[0]['q_title'])).' | 投票結果 | *********民調';
                    $this->meta_desc = $*********Result[0]['q_desc'];
                    
                    $og_image_height = 536;
                    $og_image = $*********Result[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********Result[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********Result[0]['q_question_type'];
                    return view('pk')->with('*********', $*********Result)
                                    // ->with('pk_*********', $pk_*********)
                                    ->with('*********_command1', $*********_command1)
                                    ->with('*********_command2', $*********_command2)
                                    ->with('being_*********', $being_*********)
                                    ->with('interest_*********', $interest_*********)
                                    ->with('question_id', $id)
                                    ->with('has_*********', $has_*********)
                                    ->with('meta_title', $this->meta_title)
                                    ->with('meta_desc', $this->meta_desc)
                                    ->with('og_image_height', $og_image_height)
                                    ->with('og_image', $og_image)
                                    ->with('type_name', $type_name)
                                    ->with('type_key', $type_key);
                }else{
                    // 一般投票結果
                    if(!empty($*********Result[0]['q_roster'])){
                        $roster = explode('-', $*********Result[0]['q_roster']);
                    }
                    // dd($*********Result);
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********Result[0]['q_title'])).' | 投票結果 | *********民調';
                    $this->meta_desc = $*********Result[0]['q_desc'];
                    $og_image = $*********Result[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********Result[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********Result[0]['q_question_type'];
                    return view('*********Result')->with('*********Result', $*********Result)
                                            ->with('roster', $roster)
                                            ->with('being_*********', $being_*********)
                                            ->with('interest_*********', $interest_*********)
                                            // ->with('pk_*********', $pk_*********)
                                            ->with('question_id', $id)
                                            ->with('meta_title', $this->meta_title)
                                            ->with('meta_desc', $this->meta_desc)
                                            ->with('og_image_height', $og_image_height)
                                            ->with('og_image', $og_image)
                                            ->with('type_name', $type_name)
                                            ->with('type_key', $type_key);

                    }
            // }
        }else{
            // echo "<script>alert('此投票已關閉！')</script>";
            echo "<script>location.href = '".url('/')."'</script>";
        }
    }

    public function get_*********Result_preview($id){
        $*********Result =  $this->DB->get_*********Result($id, 'no');
        $being_********* = $this->DB->get_being_*********('carousel', '', '', '', 'yes'); //首頁上方輪播
        $interest_********* = $this->DB->get_interest_*********(6);
        $roster = '';

        $og_image_height = 536;

        if(!empty($*********Result)){
            // if($*********Result[0]['q_login'] == 'Y' && !Session::has('email')){
            //     echo "<script>location.href = '".url('/login')."'</script>";
            // }else{
                if(strpos($*********Result[0]['q_title'], 'PK') !== false){
                    // PK投票結果
                    $has_********* = false;
                    if($*********Result[0]['q_login'] == 'Y' && Session::has('email')){
                        $has_answer = $this->DB->has_answer($id, Session::get('user_name'));
                        if($has_answer->first()){
                            $has_********* = true;
                        }
                    }
                    $*********_command1 = $this->DB->get_*********_command($*********Result[0]['all'][0]->t1_topic01_seq, $*********Result[0]['all'][0]->t2_topic02_seq);
                    $*********_command2 = $this->DB->get_*********_command($*********Result[0]['all'][1]->t1_topic01_seq, $*********Result[0]['all'][1]->t2_topic02_seq);
                    
                    
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********Result[0]['q_title'])).' | 投票結果 | *********民調';
                    $this->meta_desc = $*********Result[0]['q_desc'];
                    
                    // $og_image_height = 536;
                    $og_image = $*********Result[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********Result[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********Result[0]['q_question_type'];
                    
                    return view('pk')->with('*********', $*********Result)
                                    // ->with('pk_*********', $pk_*********)
                                    ->with('*********_command1', $*********_command1)
                                    ->with('*********_command2', $*********_command2)
                                    ->with('being_*********', $being_*********)
                                    ->with('interest_*********', $interest_*********)
                                    ->with('question_id', $id)
                                    ->with('has_*********', $has_*********)
                                    ->with('meta_title', $this->meta_title)
                                    ->with('meta_desc', $this->meta_desc)
                                    ->with('og_image_height', $og_image_height)
                                    ->with('og_image', $og_image)
                                    ->with('type_name', $type_name)
                                    ->with('type_key', $type_key);
                }else{
                    // 一般投票結果
                    if(!empty($*********Result[0]['q_roster'])){
                        $roster = explode('-', $*********Result[0]['q_roster']);
                    }
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********Result[0]['q_title'])).' | 投票結果 | *********民調';
                    $this->meta_desc = $*********Result[0]['q_desc'];
                    $og_image = $*********Result[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********Result[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********Result[0]['q_question_type'];

                    return view('*********Result')->with('*********Result', $*********Result)
                                            ->with('roster', $roster)
                                            ->with('being_*********', $being_*********)
                                            ->with('interest_*********', $interest_*********)
                                            // ->with('pk_*********', $pk_*********)
                                            ->with('question_id', $id)
                                            ->with('meta_title', $this->meta_title)
                                            ->with('meta_desc', $this->meta_desc)
                                            ->with('og_image_height', $og_image_height)
                                            ->with('og_image', $og_image)
                                            ->with('type_name', $type_name)
                                            ->with('type_key', $type_key);

                    }
            // }
        }else{
            // echo "<script>alert('此投票已關閉！')</script>";
            echo "<script>location.href = '".url('/')."'</script>";
        }
    }

    public function get_*********_preview($id){

        $********* = $this->DB->get_*********($id, 'no');
        
        $being_********* = $this->DB->get_being_*********('carousel', '', '', '', 'yes'); //首頁上方輪播
        $interest_********* = $this->DB->get_interest_*********(6);
        // $pk_********* = $this->DB->get_pk_*********(); //首頁PK輪播
        $og_image_height = 536;

        if(!empty($*********)){
            if($*********[0]['q_login'] == 'Y' && !Session::has('email')){
                echo "<script>location.href = '".url('/login')."'</script>";
            }else{
                $has_********* = false;
                if($*********[0]['q_login'] == 'Y' && Session::has('email')){
                    $has_answer = $this->DB->has_answer($id, Session::get('user_name'));
                    if($has_answer->first()){
                        $has_********* = true;
                        echo "<script>location.href = '".url('/*********Result')."/".$id."'</script>";
                        die();
                    }
                }

                if(strpos($*********[0]['q_title'], 'PK') !== false){
                    // PK投票結果
                    $********* = $this->DB->get_*********Result($id, 'no');
                    $*********_command1 = $this->DB->get_*********_command($*********[0]['all'][0]->t1_topic01_seq, $*********[0]['all'][0]->t2_topic02_seq);
                    $*********_command2 = $this->DB->get_*********_command($*********[0]['all'][1]->t1_topic01_seq, $*********[0]['all'][1]->t2_topic02_seq);
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title'])).' | *********民調';
                    $this->meta_desc = $*********[0]['q_desc'];
                    $og_image = $*********[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********[0]['q_question_type'];
                    return view('pk')->with('*********', $*********)
                                    ->with('*********_command1', $*********_command1)
                                    ->with('*********_command2', $*********_command2)
                                    ->with('being_*********', $being_*********)
                                    ->with('interest_*********', $interest_*********)
                                    // ->with('pk_*********', $pk_*********)
                                    ->with('question_id', $id)
                                    ->with('has_*********', $has_*********)
                                    ->with('meta_title', $this->meta_title)
                                    ->with('meta_desc', $this->meta_desc)
                                    ->with('og_image_height', $og_image_height)
                                    ->with('og_image', $og_image)
                                    ->with('type_name', $type_name)
                                    ->with('type_key', $type_key);
                }else{
                    // 一般投票結果
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title'])).' | *********民調';
                    $this->meta_desc = $*********[0]['q_desc'];
                    $og_image = $*********[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********[0]['q_question_type'];
                    return view('*********')->with('*********', $*********)
                                        ->with('being_*********', $being_*********)
                                        ->with('interest_*********', $interest_*********)
                                        // ->with('pk_*********', $pk_*********)
                                        ->with('question_id', $id)
                                        ->with('meta_title', $this->meta_title)
                                        ->with('meta_desc', $this->meta_desc)
                                        ->with('og_image_height', $og_image_height)
                                        ->with('og_image', $og_image)
                                        ->with('type_name', $type_name)
                                        ->with('type_key', $type_key);
                }
            }
        }else{
            // echo "<script>alert('此投票已過期！')</script>";
            echo "<script>location.href = '".url('/*********Result').'/'.$id."'</script>";
        }
    }

    public function get_*********($id){

        $********* = $this->DB->get_*********($id);
        
        $being_********* = $this->DB->get_being_*********('carousel', '', '', '', 'yes'); //首頁上方輪播
        $interest_********* = $this->DB->get_interest_*********(6);
        // $pk_********* = $this->DB->get_pk_*********(); //首頁PK輪播

        $og_image_height = 536;
        
        if(!empty($*********)){
            if($*********[0]['q_login'] == 'Y' && !Session::has('email')){
                echo "<script>location.href = '".url('/login')."'</script>";
            }else{
                $has_********* = false;
                if($*********[0]['q_login'] == 'Y' && Session::has('email')){
                    $has_answer = $this->DB->has_answer($id, Session::get('user_name'));
                    if($has_answer->first()){
                        $has_********* = true;
                        echo "<script>location.href = '".url('/*********Result')."/".$id."'</script>";
                        die();
                    }
                }

                if(strpos($*********[0]['q_title'], 'PK') !== false){
                    // PK投票結果
                    $********* = $this->DB->get_*********Result($id);
                    $*********_command1 = $this->DB->get_*********_command($*********[0]['all'][0]->t1_topic01_seq, $*********[0]['all'][0]->t2_topic02_seq);
                    $*********_command2 = $this->DB->get_*********_command($*********[0]['all'][1]->t1_topic01_seq, $*********[0]['all'][1]->t2_topic02_seq);
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title'])).' | *********民調';
                    $this->meta_desc = $*********[0]['q_desc'];
                    $og_image = $*********[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********[0]['q_question_type'];
                    return view('pk')->with('*********', $*********)
                                    ->with('*********_command1', $*********_command1)
                                    ->with('*********_command2', $*********_command2)
                                    ->with('being_*********', $being_*********)
                                    ->with('interest_*********', $interest_*********)
                                    // ->with('pk_*********', $pk_*********)
                                    ->with('question_id', $id)
                                    ->with('has_*********', $has_*********)
                                    ->with('meta_title', $this->meta_title)
                                    ->with('meta_desc', $this->meta_desc)
                                    ->with('og_image_height', $og_image_height)
                                    ->with('og_image', $og_image)
                                    ->with('type_name', $type_name)
                                    ->with('type_key', $type_key);
                }else{
                    // 一般投票結果
                    $this->meta_title = str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title'])).' | *********民調';
                    $this->meta_desc = $*********[0]['q_desc'];
                    $og_image = $*********[0]['q_img'];
                    $type_name = $this->DB->get_one_type($*********[0]['q_question_type']);
                    $type_name = $type_name->name;
                    $type_key = $*********[0]['q_question_type'];
                    return view('*********')->with('*********', $*********)
                                        ->with('being_*********', $being_*********)
                                        ->with('interest_*********', $interest_*********)
                                        // ->with('pk_*********', $pk_*********)
                                        ->with('question_id', $id)
                                        ->with('meta_title', $this->meta_title)
                                        ->with('meta_desc', $this->meta_desc)
                                        ->with('og_image_height', $og_image_height)
                                        ->with('og_image', $og_image)
                                        ->with('type_name', $type_name)
                                        ->with('type_key', $type_key);
                }
            }
        }else{
            // echo "<script>alert('此投票已過期！')</script>";
            echo "<script>location.href = '".url('/*********Result').'/'.$id."'</script>";
        }
    }

    public function ajax_comment($topic1, $topic2, $page){
        $result = $this->DB->get_*********_command($topic1, $topic2, $page);
        return $result;
    }
    // $uuid = Str::uuid()->toString();
    public function insert_*********($id, $login, Request $request){
        // dd($request->form_answer);
        if(!$request->isMethod('post')){
            echo "<script>location.href = '".url('/*********').'/'.$id."'</script>";
            die();
        }

        $quesiton_array = [];
        $question_uuid = Str::uuid()->toString();
        $quesiton_array['answer_key_seq'] = $question_uuid;
        $quesiton_array['creation_date'] = date('Y-m-d H:i:s');
        $quesiton_array['ip_address'] = $request->ip();
        if(Session::has('user_name') & !empty(Session::get('user_name'))){
            $quesiton_array['user_name'] = Session::get('user_name');
            $quesiton_array['name'] = Session::get('name');
            $quesiton_array['email'] = Session::get('email');
        }else{
            $quesiton_array['user_name'] = 'anyone';
            $quesiton_array['name'] = '';
            $quesiton_array['email'] = '';
        }
        $quesiton_array['question_seq'] = $id;
        $result = $this->DB->insert_answer_key($quesiton_array);
        if($result){
            $insert_data = [];
            $count_topic01_seq = '';
            $count_topic01 = [];
            foreach($request->form_answer as $key => $value){
                foreach($value as $k => $v){
                    if(isset($v['t2_seq'])){
                        if($count_topic01_seq != $key){
                            $count_topic01_seq = $key;
                            $count_topic01[$key] = 0;
                        }
                        $array = [];
                        $array['topic01_seq'] = $key;
                        if(strpos($v['t2_seq'], 'input_other_1') !== false){
                            $array['topic02_seq'] =  str_replace('input_other_1/', '', str_replace('input_other_0/', '', str_replace('input_other_/', '', $v['t2_seq'])));
                            $array['other'] = $v['other'];
                        }else{
                            $array['topic02_seq'] =  str_replace('input_other_1/', '', str_replace('input_other_0/', '', str_replace('input_other_/', '', $v['t2_seq'])));
                            $array['other'] = '';
                        }
                        $array['answer_seq'] = Str::uuid()->toString();
                        $array['answer_key_seq'] = $question_uuid;
                        $array['created_time'] = date('Y-m-d H:i:s');

                        $count_topic01[$key]++;
                        $insert_data[] = $array;
                        unset($array);
                        
                    }
                }
            }
            // dd($count_topic01);
            $result2 = $this->DB->insert_answer($insert_data);
            if($result2){
                $topic_seq = '';
                foreach($insert_data as $key => $value){
                    if($topic_seq != $value['topic01_seq']){
                        if($topic_seq != ''){
                           $insert_sum_topic =  $this->DB->insert_sum_topic($id, $topic_seq);
                        }
                        $topic_seq = $value['topic01_seq'];
                    }
                    $count_insert = $this->DB->insert_count($id, $value['topic01_seq'], $value['topic02_seq'], $count_topic01[$value['topic01_seq']]);
                }
                $insert_sum_topic =  $this->DB->insert_sum_topic($id, $topic_seq);
                if($login == 'Y'){
                    echo "<script>location.href = '".url('/done')."/".$id."/".$login."'</script>";
                }else{
                    echo "<script>location.href = '".url('/*********Result')."/".$id."'</script>";
                }
                
            }else{
                // echo "<script>alert('投票失敗');</script>";
                echo "<script>location.href = '".url('/*********')."/".$id."'</script>";
            }
        }else{
            echo "<script>location.href = '".url('/*********')."/".$id."'</script>";
        }

    }

    public function done($id, $login)
    {
        // dd($type);
        if(empty($id)){
            echo "<script>location.href = '".url('/')."'</script>";
        }else{
            return view('done')->with('id', $id)
                                ->with('login', $login)
                                ->with('meta_title', $this->meta_title)
                                ->with('meta_desc', $this->meta_desc);
        }
        
    }

    public function register()
    {
        if(Session::has('email')){
            $result = $this->DB->select_user_one(Session::get('email')); //取得使用者資料
            return view('register')->with('result', $result)
                                    ->with('meta_title', $this->meta_title)
                                    ->with('meta_desc', $this->meta_desc);
        }else{
            // $result = NULL;
            echo "<script>location.href = '".url('/')."'</script>";
            // return view('register')->with('result', $result);
        }
        // return view('register');
    }

    public function insert_update_user(Request $request){
        if($request->isMethod('post')){
            $insert_array = $request->all();
            // dd($request->all());
            if(Session::has('email')){
                unset($insert_array['_token']);
                unset($insert_array['email']);
                $insert_array['modify_date'] = date('Y-m-d H:i:s');
                $insert_array['birthday'] = $insert_array['birth_yy'].'/'.$insert_array['birth_mm'].'/'.$insert_array['birth_dd'];
                $result = $this->DB->update_user($insert_array);
                if(!empty($result)){
                    Session::put('name', $insert_array['name']);
                    echo "<script>location.href = '".url('/register/done')."'</script>";
                }else{
                    echo "<script>location.href = '".url('/register')."'</script>";
                }
            }else{
                unset($insert_array['_token']);
                $insert_array['users_seq'] = Str::uuid()->toString();
                $insert_array['username'] = $insert_array['users_seq'];
                $insert_array['creation_date'] = date('Y-m-d H:i:s');
                $insert_array['modify_date'] = date('Y-m-d H:i:s');
                $insert_array['birthday'] = $insert_array['birth_yy'].'/'.$insert_array['birth_mm'].'/'.$insert_array['birth_dd'];
                $result = $this->DB->insert_user($insert_array);
                if(!empty($result)){
                    Session::put('user_name', $insert_array['username']);
                    Session::put('email', $insert_array['email']);
                    Session::put('name', $insert_array['name']);
                    echo "<script>location.href = '".url('/register/done')."'</script>";
                }else{
                    echo "<script>location.href = '".url('/register')."'</script>";
                }

            }
        }else{
            echo "<script>location.href = '".url('/register')."'</script>";
        }
    }

    public function login()
    {   
        if(Session::has('email')){
            echo "<script>location.href = '".url('/')."'</script>";
        }else{
            Session::put('pre_page', URL::previous());
            return view('login')->with('meta_title', $this->meta_title)
                                ->with('meta_desc', $this->meta_desc);
        }
        
    }

    public function logout()
    {   
        Session::flush();
        echo "<script>location.href = '".url('/')."'</script>";
    }

    public function export_excel($id){
        
        $title = $this->DB->getExportExcel_title($id);

        if($title->first()){
            $export_data = []; //真正匯出的excel array
            $export_title = ['IP', '用戶', '姓名', '信箱', '填寫時間'];
            $t1_arr = []; //為了確保每個題目都正確輸出
            foreach($title as $value){
                array_push($export_title, $value->title);
                array_push($t1_arr, $value->topic01_seq);
            }
            array_push($export_data, $export_title);
            // 以上已完全列出 Excel 標頭，真正export資料為 $export_data

            $result = $this->DB->getExportExcel_data($id);
            // dd($result);
            $key = '';
            $t1_key = '';
            $t2 = '';
            $row = [];

            foreach($result as $k => $v){
                if($k == 0){
                    $key = $v->answer_key_seq;
                    $t1_key = $v->t1_topic01_seq;
                    $row = [$v->ip, $v->user, $v->name, $v->email, $v->creation_date];

                    $t1_arr_search = array_search($t1_key, $t1_arr);
                    for($i = 0; $i < $t1_arr_search; $i++){
                        array_push($row, '');
                    }

                    if($v->t2_input_other == 1){
                        $t2 = preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).'：'.preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->other).';';
                    }else{
                        $t2 = preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).';';
                    }
                }else{
                    if($key != $v->answer_key_seq){
                        array_push($row, $t2);
                        array_push($export_data, $row);
                        $key = $v->answer_key_seq;
                        $t1_key = $v->t1_topic01_seq;
                        $row = [$v->ip, $v->user, $v->name, $v->email, $v->creation_date];

                        $t1_arr_search = array_search($t1_key, $t1_arr);
                        for($i = 0; $i < $t1_arr_search; $i++){
                            array_push($row, '');
                        }

                        if($v->t2_input_other == 1){
                            $t2 = preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).'：'.preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->other).';';
                        }else{
                            $t2 = preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).';';
                        }
                    }else{
                        if($t1_key != $v->t1_topic01_seq){
                            array_push($row, $t2);
                            $t1_key = $v->t1_topic01_seq;
                            if($v->t2_input_other == 1){
                                $t2 = preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).'：'.preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->other).';';
                            }else{
                                $t2 = preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).';';
                            }
                        }else{
                            if($v->t2_input_other == 1){
                                $t2 .= preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).'：'.preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->other).';';
                            }else{
                                $t2 .= preg_replace('/[\x00-\x08\x0b-\x0c\x0e-\x1f]/','', $v->t2_name).';';
                            }
                        }
                    }
                }
            }

            array_push($row, $t2);
            array_push($export_data, $row);

            return Excel::download(new ExcelExport($export_data), 'question.xlsx');


            $result = $this->DB->getExportExcel_data($id);



            $export_data = [];
            $title = ['IP', '用戶', '姓名', '信箱', '填寫時間'];
            $t1_topic01_seq = '';
            foreach($result as $key => $value){
                if($t1_topic01_seq != $value->t1_topic01_seq){
                    $t1_topic01_seq = $value->t1_topic01_seq;
                    array_push($title, $value->t1_title);
                }
            }
            array_push($export_data, $title);
            // dd($export_data);
            return Excel::download(new ExcelExport($export_data), 'question.xlsx');
        }else{
            return '此問卷ID錯誤！';
        }
        dd($result);

        $export = new ExcelExport($cellData);
        //传递值
        return Excel::download($export, 'question.xlsx');

        return Excel::download(new Collection($cellData), 'question.xlsx');
        // Excel::create('question', function($excel) use ($cellData) {

        //     $excel->sheet('Sheet', function($sheet) use ($cellData) {
      
        //         $sheet->rows($cellData);
        //     });
        //   })->download('xls');

        // Excel::create('学生成绩',function($excel) use ($cellData){
        //     $excel->sheet('score', function($sheet) use ($cellData){
        //         $sheet->rows($cellData);
        //     });
        // })->export('xls');
    }

    public function survey()
    {
        return view('survey');
    }

    public function pk_old()
    {
        return view('pk_old');
    }
    public function rated(Request $request)
    {
        echo $request->header('host');
        die();
        // return view('rated');
    }
    // public function done()
    // {
    //     return view('done');
    // }
    public function surveyResult()
    {
        return view('surveyResult');
    }

    // public function insert_count_data(){
    //     $result = $this->DB->insert_count_data();
    //     return $result;
    // }
}
