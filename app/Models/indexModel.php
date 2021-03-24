<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;

class indexModel extends Model
{
    use HasFactory;
    protected $DB;
    public function __construct()
    {
        $this->DB = DB::connection('mysql');
    }
    
    // 取得所有列表
    public function get_nav($type_id=''){
        if(empty($type_id)){ //沒有id，就抓全部類別
            $result = DB::table('question_type')->get();
        }else{
            $result = DB::table('question_type')->where('seq', '=', $type_id)
                                    ->first();
        }
        
        return $result;
    }

    // 取得所有列表
    public function get_one_type($type_id=''){
        
        $result = DB::table('question_type')->where('seq', '=', $type_id)
                                            ->first();
        
        return $result;
    }
    
    // 取得正在進行中的投票
    public function get_being_vote($web_type = '', $limit = 0, $type_id = '', $keyword = '', $has_pk = ''){

        if($web_type == 'carousel'){ //輪播
            $result = DB::table('question')->where('status', '=', 1);

            if(empty($has_pk)){
                $result = $result->where('title', 'not like', '%PK%');
            }
            
            $result = $result->where('question_date_s', '<=', date('Y-m-d'))
                                ->where('question_date_e', '>=', date('Y-m-d'))
                                ->orderByRaw('ISNULL(sort), sort ASC')
                                // ->orderBy('question_date_e', 'desc')
                                ->orderBy('question_date_s', 'desc')
                                ->get();
        }

        if($web_type == 'list'){
            $result = DB::table('question as q')->select(DB::raw('q.*, qt.name as type_name, IFNULL(min(tc.topic01_count), 0) as count'))
                                                ->join('question_type as qt', 'q.question_type', '=', 'qt.seq')
                                                // ->leftJoin('answer_key_ as ak', 'q.question_seq', '=', 'ak.question_seq')
                                                ->join('topic_count as tc', 'q.question_seq', '=', 'tc.question_seq')
                                                ->where('q.status', '=', 1)
                                                ->where('q.title', 'not like', '%PK%')
                                                ->where('q.question_date_s', '<=', date('Y-m-d'))
                                                ->where('q.question_date_e', '>=', date('Y-m-d'));
            if(!empty($type_id)){
                $result = $result->where('q.question_type', '=', $type_id);
            }
            if(!empty($keyword)){
                $result = $result->where(function($query) use ($keyword){
                                        $query->where('q.title', 'like',  '%'.$keyword.'%')
                                                ->orwhere('q.desc_', 'like',  '%'.$keyword.'%');
                                    });
            }

            $result = $result->groupBy('q.question_seq')
                                ->orderByRaw('ISNULL(q.sort), q.sort ASC')
                                // ->orderBy('q.question_date_e', 'desc');
                                ->orderBy('q.question_date_s', 'desc');
                                                
            if(!empty($limit)){
                $result = $result->limit($limit);
            }
            $result = $result->get();
        }
        
        if($result->first()){
            foreach ($result as $value){
                if($value->img){
                    $value->img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->question_seq.'.jpg';
                }
            }
        }

        return $result;

    }

    public function get_pk_vote($type_id = '', $keyword = ''){
        $result = DB::table('question as q')->select(DB::raw('q.question_seq as q_question_seq, q.img as q_img, q.title as q_title, q.question_date_s as q_start, q.question_date_e as q_end, q.desc_ as q_desc, 
                                                            q.gift as q_gift, q.roster as q_roster, q.verific_login as q_login, q.weights as q_weights, 
                                                            t1.title as t1_title, t1.type as t1_type, t1.topic01_seq as t1_topic01_seq, 
                                                            t2.topic02_seq as t2_topic02_seq, t2.input_other as t2_input_other, t2.name as t2_name, t2.img as t2_img, IFNULL(tc.topic02_count, 0) as t2_count, IFNULL(tc.topic01_count, 0) as t1_count'))
                                            ->join('topic01 as t1', 'q.question_seq', '=', 't1.question_seq')
                                            ->join('topic02 as t2', 't1.topic01_seq', '=', 't2.topic01_seq')
                                            ->leftJoin('topic_count as tc', function($join){
                                                $join->on('tc.question_seq', '=', 'q.question_seq');
                                                $join->on('tc.topic01_seq', '=', 't1.topic01_seq');
                                                $join->on('tc.topic02_seq', '=', 't2.topic02_seq');
                                            })
                                            ->where('q.title', 'like', '%PK%')
                                            ->where('q.question_date_s', '<=', date('Y-m-d'))
                                            ->where('q.question_date_e', '>=', date('Y-m-d'))
                                            ->where('q.status', '=', 1);
        if(!empty($type_id)){
            $result = $result->where('q.question_type', '=', $type_id);
        }
        if(!empty($keyword)){
            $result = $result->where(function($query) use ($keyword){
                                    $query->where('q.title', 'like',  '%'.$keyword.'%')
                                            ->orwhere('q.desc_', 'like',  '%'.$keyword.'%');
                                });
        }

        $result = $result->groupBy('q.question_seq')
                        ->groupBy('t1.topic01_seq')
                        ->groupBy('t2.topic02_seq')
                        ->groupBy('tc.topic01_count')
                        ->groupBy('tc.topic02_count')
                        ->orderBy('q.question_date_e', 'desc')
                        ->orderBy('q.question_seq', 'desc')
                        ->orderBy('t1.sort', 'asc')
                        ->orderBy('t2.sort', 'asc')
                        ->get();
        $rel_result = [];
        // dd($result);
        if($result->first()){
           
            $i = -1;
            $title = '';

            foreach($result as $key => $value){

                if($value->q_img){
                    $value->q_img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->q_question_seq.'.jpg';
                }
                if($value->t2_img){
                    $value->t2_img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->t2_topic02_seq.'.jpg';
                }

                if($title != $value->q_question_seq){
                    $i++;
                    $title = $value->q_question_seq;
                    $rel_result[$i]['q_question_seq'] = $value->q_question_seq;
                    $rel_result[$i]['q_img'] = $value->q_img;
                    $rel_result[$i]['q_login'] = $value->q_login;
                    $rel_result[$i]['q_title'] = $value->q_title;
                    $rel_result[$i]['q_start'] = $value->q_start;
                    $rel_result[$i]['q_end'] = $value->q_end;
                    $rel_result[$i]['q_desc'] = $value->q_desc;
                    $rel_result[$i]['q_gift'] = $value->q_gift;
                    $rel_result[$i]['q_roster'] = $value->q_roster;
                    $rel_result[$i]['q_weights'] = $value->q_weights;
                    $rel_result[$i]['t1_title'] = $value->t1_title;
                }

                $rel_result[$i]['all'][] = $value;

            }

            foreach($rel_result as $key => $value){
                $rel_result[$key]['total_count'] = $rel_result[$key]['all'][0]->t1_count;
            }
        }
        // dd($rel_result);

        return $rel_result;

    }

    // 取得已結束的投票
    public function get_over_vote($web_type = '', $limit = 0, $type_id = '', $keyword = ''){
        if($web_type == 'list'){

            $result = DB::table('question as q')->select(DB::raw('q.*, qt.name as type_name, IFNULL(min(tc.topic01_count), 0) as count'))
                                                    ->join('question_type as qt', 'q.question_type', '=', 'qt.seq')
                                                    // ->leftJoin('answer_key_ as ak', 'q.question_seq', '=', 'ak.question_seq')
                                                    ->join('topic_count as tc', 'q.question_seq', '=', 'tc.question_seq')
                                                    ->where('q.status', '=', 1)
                                                    // ->where('question_date_s', '<=', date('Y-m-d'))
                                                    ->where('q.question_date_e', '>=', date('Y-m-d', strtotime("-2 month", strtotime(date('Y-m-d')))))
                                                    ->where('q.question_date_e', '<', date('Y-m-d'));
            if(!empty($type_id)){
                $result = $result->where('q.question_type', '=', $type_id);
            }
            $result = $result->groupBy('q.question_seq')
                                // ->orderByRaw('ISNULL(q.sort), q.sort ASC')
                                ->orderBy('q.question_date_e', 'desc')
                                ->orderBy('q.question_date_s', 'desc');

            if(!empty($limit)){
                $result = $result->limit($limit);
            }
            $result = $result->get();

        }

        if($web_type == 'pagination'){
            $result = DB::table('question as q')->select(DB::raw('q.*, qt.name as type_name, IFNULL(min(tc.topic01_count), 0) as count'))
                                                    ->join('question_type as qt', 'q.question_type', '=', 'qt.seq')
                                                    // ->leftJoin('answer_key_ as ak', 'q.question_seq', '=', 'ak.question_seq')
                                                    ->join('topic_count as tc', 'q.question_seq', '=', 'tc.question_seq')
                                                    ->where('q.status', '=', 1)
                                                    // ->where('question_date_s', '<=', date('Y-m-d'))
                                                    // ->where('q.question_date_e', '>=', date('Y-m-d', strtotime("-6 month", strtotime(date('Y-m-d')))))
                                                    ->where('q.question_date_e', '<', date('Y-m-d'));
            if(!empty($type_id)){
                $result = $result->where('q.question_type', '=', $type_id);
            }
            if(!empty($keyword)){
                $result = $result->where(function($query) use ($keyword){
                                        $query->where('q.title', 'like',  '%'.$keyword.'%')
                                                ->orwhere('q.desc_', 'like',  '%'.$keyword.'%');
                                    });
            }
            $result = $result->groupBy('q.question_seq')
                            // ->groupBy('tc.question_seq')
                            // ->groupBy('tc.topic01_seq')
                            // ->orderByRaw('ISNULL(q.sort), q.sort ASC')
                            ->orderBy('q.question_date_e', 'desc')
                            ->paginate(5);
        }
        
        if($result->first()){
            foreach ($result as $value){
                if($value->img){
                    $value->img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->question_seq.'.jpg';
                }
            }
        }

        return $result;

    }

    // 取得正在進行中的投票
    public function get_interest_vote($limit = 1){

        $result = DB::table('question as q')
                                            ->select('q.*', 'qt.name as type_name')
                                            ->leftJoin('question_type as qt', 'q.question_type', '=', 'qt.seq')
                                            ->where('q.status', '=', 1)
                                            ->where('q.question_date_e', '>=', date('Y-m-d', strtotime("-2 month", strtotime(date('Y-m-d')))))
                                            ->where('q.question_date_e', '<', date('Y-m-d'))
                                            ->orderByRaw('RAND()')
                                            ->limit($limit)
                                            ->get();
        
        if($result->first()){
            foreach ($result as $value){
                if($value->img){
                    $value->img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->question_seq.'.jpg';
                }
            }
        }

        return $result;

    }
    public function get_voteResult($id, $has_status = ''){

        $result = DB::table('question as q')->where('q.question_seq', '=', $id)
                                            ->select(DB::raw('q.question_seq as q_question_seq, q.img as q_img, q.title as q_title, q.question_date_s as q_start, q.question_date_e as q_end, q.desc_ as q_desc, q.question_type as q_question_type, q.modify_date as q_modify_date, 
                                                            q.gift as q_gift, q.roster as q_roster, q.verific_login as q_login, 
                                                            t1.title as t1_title, t1.type as t1_type, t1.topic01_seq as t1_topic01_seq, 
                                                            t2.topic02_seq as t2_topic02_seq, t2.input_other as t2_input_other, t2.name as t2_name, t2.weights as t2_weights, t2.img as t2_img, IFNULL(tc.topic02_count, 0) as t2_count, IFNULL(tc.topic01_count, 0) as t1_count'))
                                            ->join('topic01 as t1', 'q.question_seq', '=', 't1.question_seq')
                                            ->join('topic02 as t2', 't1.topic01_seq', '=', 't2.topic01_seq')
                                            ->leftJoin('topic_count as tc', function($join){
                                                $join->on('tc.question_seq', '=', 'q.question_seq');
                                                $join->on('tc.topic01_seq', '=', 't1.topic01_seq');
                                                $join->on('tc.topic02_seq', '=', 't2.topic02_seq');
                                            });
        if(empty($has_status)){
            $result = $result->where('q.status', '=', 1);
        }
        $result = $result->groupBy('q.question_seq')
                        ->groupBy('t1.topic01_seq')
                        ->groupBy('t2.topic02_seq')
                        ->groupBy('tc.topic01_count')
                        ->groupBy('tc.topic02_count')
                        ->orderBy('t1.sort', 'asc')
                        ->orderBy('t1.topic01_seq', 'asc')
                        ->orderBy('t2.sort', 'asc')
                        ->get();
                                            // ->toSql();
        $rel_result = [];

        if($result->first()){

            $i = -1;
            $title = '';

            foreach($result as $key => $value){

                if($value->q_img){
                    $value->q_img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->q_question_seq.'.jpg';
                }
                if($value->t2_img){
                    $value->t2_img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->t2_topic02_seq.'.jpg';
                }

                if(!empty($value->t2_weights)){
                    $value->t2_count = $value->t2_count + $value->t2_weights;
                }

                if($title != $value->t1_title){
                    $i++;
                    $title = $value->t1_title;
                    $rel_result[$i]['q_img'] = $value->q_img;
                    $rel_result[$i]['q_modify_date'] = $value->q_modify_date;
                    $rel_result[$i]['q_question_type'] = $value->q_question_type;
                    $rel_result[$i]['q_login'] = $value->q_login;
                    $rel_result[$i]['q_title'] = $value->q_title;
                    $rel_result[$i]['q_start'] = $value->q_start;
                    $rel_result[$i]['q_end'] = $value->q_end;
                    $rel_result[$i]['q_desc'] = $value->q_desc;
                    $rel_result[$i]['q_gift'] = $value->q_gift;
                    $rel_result[$i]['q_roster'] = $value->q_roster;
                    $rel_result[$i]['t1_title'] = $value->t1_title;
                }
                $rel_result[$i]['all'][] = $value;

            }

            foreach($rel_result as $key => $value){
                foreach($value['all'] as $val){
                    if(!isset($rel_result[$key]['total_count'])){
                        $rel_result[$key]['total_count'] = 0;
                    }
                    $rel_result[$key]['total_count'] += $val->t2_count;
                }
                // $rel_result[$key]['total_count'] = $rel_result[$key]['all'][0]->t1_count;
            }

            // foreach($rel_result as $key => $value){
            //     $rel_result[$key]['total_count'] = $rel_result[$key]['all'][0]->t1_count;
            // }
        }
        return $rel_result;
    }

    public function has_answer($id, $user_name){
        $result = DB::table('answer_key_')->where('user_name', '=', $user_name)
                                            ->where('question_seq', '=', $id)
                                            ->get();
        return $result;
    }

    public function get_vote($id, $has_status = ''){

        $result = DB::table('question as q')
                                            ->select(DB::raw('q.question_seq as q_question_seq, q.img as q_img, q.title as q_title, q.question_date_s as q_start, q.question_date_e as q_end, q.desc_ as q_desc, q.question_type as q_question_type, q.modify_date as q_modify_date, 
                                                            q.gift as q_gift, q.roster as q_roster, q.verific_login as q_login, 
                                                            t1.title as t1_title, t1.type as t1_type, t1.topic01_seq as t1_topic01_seq, 
                                                            t2.topic02_seq as t2_topic02_seq, t2.name as t2_name, t2.img as t2_img, t2.input_other as t2_input_other'))
                                            // ->join('answer_key_ as ak', 'q.question_seq', '=', 'ak.question_seq')
                                            // ->join('answer as a', 'ak.answer_key_seq', '=', 'a.answer_key_seq')
                                            ->join('topic01 as t1', 'q.question_seq', '=', 't1.question_seq')
                                            ->join('topic02 as t2', 't1.topic01_seq', '=', 't2.topic01_seq')
                                            ->where('q.question_seq', '=', $id);
        if(empty($has_status)){
            $result = $result->where('q.status', '=', 1)
                            ->where('q.question_date_s', '<=', date('Y-m-d'))
                            ->where('q.question_date_e', '>=', date('Y-m-d'));
        }
                                            // ->where('q.status', '=', 1)
        $result = $result
                        ->groupBy('q.question_seq')
                        ->groupBy('t1.topic01_seq')
                        ->groupBy('t2.topic02_seq')
                        ->orderBy('t1.sort', 'asc')
                        ->orderBy('t1.topic01_seq', 'asc')
                        ->orderBy('t2.sort', 'asc')
                        ->get();
        $rel_result = [];
        
        if($result->first()){

            $i = -1;
            $title = '';
            $rel_result = [];
            foreach($result as $key => $value){

                if($value->q_img){
                    $value->q_img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->q_question_seq.'.jpg';
                }
                if($value->t2_img){
                    $value->t2_img = 'https://prod-vote-image.nownews.com/baseToJPG/'.$value->t2_topic02_seq.'.jpg';
                }

                if($title != $value->t1_title){
                    $i++;
                    $title = $value->t1_title;
                    $rel_result[$i]['q_question_seq'] = $value->q_question_seq;
                    $rel_result[$i]['q_question_type'] = $value->q_question_type;
                    $rel_result[$i]['q_modify_date'] = $value->q_modify_date;
                    $rel_result[$i]['q_login'] = $value->q_login;
                    $rel_result[$i]['q_img'] = $value->q_img;
                    $rel_result[$i]['q_title'] = $value->q_title;
                    $rel_result[$i]['q_start'] = $value->q_start;
                    $rel_result[$i]['q_end'] = $value->q_end;
                    $rel_result[$i]['q_desc'] = $value->q_desc;
                    $rel_result[$i]['q_gift'] = $value->q_gift;
                    $rel_result[$i]['q_roster'] = $value->q_roster;
                    $rel_result[$i]['t1_title'] = $value->t1_title;
                    $rel_result[$i]['t1_type'] = $value->t1_type;
                }
                $rel_result[$i]['all'][] = $value;

            }
        }
        return $rel_result;
    }

    public function get_vote_command($topic01, $topic02, $page = 1){
        $result = DB::table('answer')
                                    ->where('topic01_seq', '=', $topic01)
                                    ->where('topic02_seq', '=', $topic02)
                                    ->whereNotNull('other')
                                    ->where('other', '!=', '');
        if($page == 1){
            $result = $result->offset(0)->orderBy('created_time', 'desc')->limit(5)->get();
        }else{
            $offset = ($page-1)*5;
            $result = $result->orderBy('created_time', 'desc')->offset($offset)->limit(5)->get();
        }
        return $result;
    }

    public function insert_answer_key($insert_array){
        $result = DB::table('answer_key_')->insert($insert_array);
        return $result;
    }

    public function insert_answer($insert_array){
        $result = DB::table('answer')->insert($insert_array);
        return $result;
    }

    public function select_user_one($user_email){
        $result = DB::table('qa_users')->where('email', '=', $user_email)
                                            ->first();
        return $result;
    }

    public function insert_user($insert_array){
        $result = DB::table('qa_users')->insert($insert_array);
        return $result;
    }

    public function update_user($update_array){
        $result = DB::table('qa_users')->where('email', '=', Session::get('email'))
                                        ->update($update_array);
        return $result;
    }

    public function insert_social_user($user_name, $user_email, $name){
        if(!empty($user_email)){
            $result = $this->select_user_one($user_email);
            if(is_null($result)){
                $insert_array = [];
                $insert_array['users_seq'] = Str::uuid()->toString();
                $insert_array['creation_date'] = date('Y-m-d H:i:s');
                $insert_array['modify_date'] = date('Y-m-d H:i:s');
                $insert_array['email'] = $user_email;
                $insert_array['name'] = $name;
                $insert_array['username'] = $user_name;
                $result2 = DB::table('qa_users')->insert($insert_array);
                return $result2;
            }else{
                Session::put('name', $result->name);
            }
            return $result;
        }else{
            return false;
        }
        
    }

    public function insert_count($id, $topic01, $topic02, $topic01_count){

        $result = DB::table('topic_count')->where('question_seq', '=', $id)
                                            ->where('topic01_seq', '=', $topic01)
                                            ->where('topic02_seq', '=', $topic02)
                                            ->get();

        if($result->first()){
            $result2 = DB::table('topic_count')->where('question_seq', '=', $id)
                                                ->where('topic01_seq', '=', $topic01)
                                                ->where('topic02_seq', '=', $topic02)
                                                ->update(array(
                                                    'topic01_count' => 0, 
                                                    'topic02_count' => DB::raw( 'topic02_count + 1')
                                                ));
        }else{
            $result2 = DB::table('topic_count')->insert([
                                        ['question_seq' => $id, 
                                        'topic01_seq' => $topic01, 
                                        'topic02_seq' => $topic02, 
                                        'topic01_count' => 0, 
                                        'topic02_count' => 1, 
                                        ]
                        ]);
        }
        
        return $result2;
    }

    public function insert_sum_topic($id, $topic01){

        $result = DB::table('topic_count')->where('question_seq', '=', $id)
                                        ->where('topic01_seq', '=', $topic01)
                                        ->update(array(
                                            'topic01_count' => DB::raw("(select sum(a.topic02_count) from (select b.topic02_count from topic_count as b where question_seq='".$id."' and topic01_seq='".$topic01."') as a)")
                                        ));
        
        return $result;
    }

    public function getExportExcel_title($id){

        $result = DB::table('topic01')->where('question_seq', '=', $id)
                                        ->orderBy('sort', 'asc')
                                        ->orderBy('topic01_seq', 'asc')
                                        ->get();
        return $result;
    }

    public function getExportExcel_data($id){

        $result = DB::table('answer_key_ as ak')
                                            ->select(DB::raw('ak.answer_key_seq as answer_key_seq, ak.ip_address as ip, ak.user_name as user, ak.name as name, ak.email as email, ak.creation_date as creation_date, 
                                                            a.other as other, 
                                                            t1.topic01_seq as t1_topic01_seq, t1.title as t1_title, t1.type as t1_type, 
                                                            t2.topic02_seq as t2_topic02_seq, t2.name as t2_name, t2.input_other as t2_input_other'))
                                            ->leftjoin('answer as a', 'ak.answer_key_seq', '=', 'a.answer_key_seq')
                                            ->leftjoin('topic01 as t1', 'a.topic01_seq', '=', 't1.topic01_seq')
                                            ->leftjoin('topic02 as t2', 'a.topic02_seq', '=', 't2.topic02_seq')
                                            ->where('ak.question_seq', '=', $id)
                                            // ->where('ak.creation_date', '>=', '2021-02-23 00:00:00')
                                            ->orderBy('ak.creation_date', 'desc')
                                            ->orderBy('ak.answer_key_seq', 'asc')
                                            ->orderBy('t1.sort', 'asc')
                                            ->orderBy('t1.topic01_seq', 'asc')
                                            ->orderBy('t2.sort', 'asc')
                                            ->orderBy('t2.topic02_seq', 'asc')
                                            ->get();
        return $result;
    }

    
}
