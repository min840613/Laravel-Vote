<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

class count_topic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_topic';

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
        // $result = DB::table('answer')->select(DB::raw('topic01_seq, topic02_seq, count(DISTINCT topic01_seq) as topic01_count, count(topic02_seq) as topic02_count'))
        //                             ->groupBy('topic01_seq')
        //                             ->groupBy('topic02_seq')
        //                             ->get();

        
        $result = DB::table('answer as a')->select(DB::raw('ak.question_seq, a.topic01_seq, a.topic02_seq, b.topic01_count, count(a.topic02_seq) as topic02_count'))
                                    ->join('answer_key_ as ak', 'a.answer_key_seq', '=', 'ak.answer_key_seq')
                                    ->join(DB::raw('(select topic01_seq, count(topic01_seq) as topic01_count from answer group by topic01_seq) as b'), 'a.topic01_seq', '=', 'b.topic01_seq')
                                    ->groupBy('question_seq')
                                    ->groupBy('topic01_seq')
                                    ->groupBy('topic02_seq')
                                    ->get();
        $insert_array = [];

        foreach($result as $value){
            $insert['question_seq'] = $value->question_seq;
            $insert['topic01_seq'] = $value->topic01_seq;
            $insert['topic02_seq'] = $value->topic02_seq;
            $insert['topic01_count'] = $value->topic01_count;
            $insert['topic02_count'] = $value->topic02_count;
            $insert_array[] = $insert;
        }
        $result2 = DB::table('topic_count')->insert($insert_array);
        return $result2;
        // return 0;
    }
}
