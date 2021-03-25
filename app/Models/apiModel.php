<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class apiModel extends Model
{
    use HasFactory;

    protected $DB;
    public function __construct()
    {
        $this->DB = DB::connection('mysql');
    }

    public function api_being_*********(){
        $result_array = [];
        $question = [];
        $result = DB::table('question as q')
                                            ->where('q.status', '=', 1)
                                            ->where('q.question_date_s', '<=', date('Y-m-d'))
                                            ->where('q.question_date_e', '>=', date('Y-m-d'))
                                            ->where('q.title', 'not like', '%PK%');

        $result = $result->groupBy('q.question_seq')
                            ->orderByRaw('ISNULL(q.sort), q.sort ASC')
                            ->orderBy('q.question_date_e', 'desc');
        $result = $result->get();
        
        if($result->first()){
            foreach ($result as $key => $value){
                if($value->img){
                    $value->img = '*********/baseToJPG/'.$value->question_seq.'-sm.jpg';
                }
                
                $question[$key]['question']['id'] = $value->question_seq;
                $question[$key]['question']['title'] = str_replace('18禁', '', str_replace('PK', '', $value->title));
                $question[$key]['question']['type'] = null;
                $question[$key]['question']['url'] = url('/*********').'/'.$value->question_seq;
                $question[$key]['question']['img'] = $value->img;
                $question[$key]['question']['desc'] = $value->desc_;
                // $result_array[] = $question;

                $topic01 = DB::table('topic01 as t1')
                                    ->where('t1.question_seq', '=', $value->question_seq)
                                    ->orderByRaw('ISNULL(t1.sort), t1.sort ASC')
                                    ->first();

                if($topic01){
                    if($topic01->img){
                        $topic01->img = '*********/baseToJPG/'.$topic01->topic01_seq.'-sm.jpg';
                    }
                    $question[$key]['topic01']['id'] = $topic01->topic01_seq;
                    $question[$key]['topic01']['title'] = $topic01->title;
                    $question[$key]['topic01']['type'] = $topic01->type;
                    $question[$key]['topic01']['url'] = null;
                    $question[$key]['topic01']['img'] = $topic01->img;
                    $question[$key]['topic01']['desc'] = $topic01->desc_;
                    // $result_array[] = $question_t1;


                    $topic02 = DB::table('topic02 as t2')
                                    ->where('t2.topic01_seq', '=', $topic01->topic01_seq)
                                    ->orderByRaw('ISNULL(t2.sort), t2.sort ASC')
                                    ->limit(3)
                                    ->get();
                    $question_t2 = [];
                    foreach ($topic02 as $k => $val){
                        if($val->img){
                            $val->img = '*********/baseToJPG/'.$val->topic02_seq.'-sm.jpg';
                        }

                        $question[$key]['topic02'][$k]['id'] = $val->topic02_seq;
                        $question[$key]['topic02'][$k]['title'] = $val->name;
                        $question[$key]['topic02'][$k]['type'] = $topic01->type;
                        $question[$key]['topic02'][$k]['url'] = null;
                        $question[$key]['topic02'][$k]['img'] = $val->img;
                        if($val->desc_){
                            $question[$key]['topic02'][$k]['desc'] = $val->desc_;
                        }else{
                            $question[$key]['topic02'][$k]['desc'] = '';
                        }
                        
                    }
                    // $result_array[] = $question_t2;

                }
            }
        }
        $result_array = $question;
        // }else{
        //     $result_array = [];
        // }
        return $result_array;
        // echo json_encode($result_array);
        // var_dump($result_array);
        // die();
    }

    public function api_being_pk_*********(){
        $result_array = [];
        $question = [];
        $result = DB::table('question as q')
                                            ->where('q.status', '=', 1)
                                            ->where('q.question_date_s', '<=', date('Y-m-d'))
                                            ->where('q.question_date_e', '>=', date('Y-m-d'))
                                            ->where('q.title', 'like', '%PK%');

        $result = $result->groupBy('q.question_seq')
                            ->orderByRaw('ISNULL(q.sort), q.sort ASC')
                            ->orderBy('q.question_date_e', 'desc');
        $result = $result->get();
        
        if($result->first()){
            foreach ($result as $key => $value){
                if($value->img){
                    $value->img = '*********/baseToJPG/'.$value->question_seq.'-sm.jpg';
                }
                
                $question[$key]['question']['id'] = $value->question_seq;
                $question[$key]['question']['title'] = str_replace('18禁', '', str_replace('PK', '', $value->title));
                $question[$key]['question']['type'] = null;
                $question[$key]['question']['url'] = url('/*********').'/'.$value->question_seq;
                $question[$key]['question']['img'] = $value->img;
                $question[$key]['question']['desc'] = $value->desc_;
                $question[$key]['question']['start_time'] = $value->question_date_s;
                $question[$key]['question']['end_time'] = $value->question_date_e;
                // $result_array[] = $question;

                $topic01 = DB::table('topic01 as t1')
                                    ->select(DB::raw('t1.*, IFNULL(tc.topic01_count, 1) as t1_count'))
                                    ->leftJoin('topic_count as tc', function($join){
                                        $join->on('tc.topic01_seq', '=', 't1.topic01_seq');
                                    })
                                    ->where('t1.question_seq', '=', $value->question_seq)
                                    ->orderByRaw('ISNULL(t1.sort), t1.sort ASC')
                                    ->first();

                if($topic01){
                    if($topic01->img){
                        $topic01->img = '*********/baseToJPG/'.$topic01->topic01_seq.'-sm.jpg';
                    }
                    $question[$key]['topic01']['id'] = $topic01->topic01_seq;
                    $question[$key]['topic01']['title'] = $topic01->title;
                    $question[$key]['topic01']['type'] = $topic01->type;
                    $question[$key]['topic01']['url'] = null;
                    $question[$key]['topic01']['img'] = $topic01->img;
                    $question[$key]['topic01']['desc'] = $topic01->desc_;
                    // $result_array[] = $question_t1;
                    $t1_count = $topic01->t1_count;

                    $topic02 = DB::table('topic02 as t2')
                                    ->select(DB::raw('t2.*, IFNULL(tc.topic02_count, 0) as t2_count'))
                                    ->leftJoin('topic_count as tc', function($join){
                                        $join->on('tc.topic02_seq', '=', 't2.topic02_seq');
                                    })
                                    ->where('t2.topic01_seq', '=', $topic01->topic01_seq)
                                    ->orderByRaw('ISNULL(t2.sort), t2.sort ASC')
                                    ->limit(3)
                                    ->get();
                    $question_t2 = [];
                    foreach ($topic02 as $k => $val){
                        if($val->img){
                            $val->img = '*********/baseToJPG/'.$val->topic02_seq.'-sm.jpg';
                        }

                        $question[$key]['topic02'][$k]['id'] = $val->topic02_seq;
                        $question[$key]['topic02'][$k]['title'] = $val->name;
                        $question[$key]['topic02'][$k]['type'] = $topic01->type;
                        $question[$key]['topic02'][$k]['url'] = null;
                        $question[$key]['topic02'][$k]['img'] = $val->img;
                        if($val->desc_){
                            $question[$key]['topic02'][$k]['desc'] = $val->desc_;
                        }else{
                            $question[$key]['topic02'][$k]['desc'] = '';
                        }
                        $question[$key]['topic02'][$k]['percent'] = round(($val->t2_count/$t1_count)*100, 2);
                        
                    }
                    // $result_array[] = $question_t2;

                }
            }
        }
        $result_array = $question;
        // }else{
        //     $result_array = [];
        // }
        return $result_array;
        // echo json_encode($result_array);
        // var_dump($result_array);
        // die();
    }
}
