@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_mata')
  <meta property="article:section" content="NOWnews民調">
  <meta property="article:published_time" content="{{date(DATE_W3C, mktime(date('H', strtotime($vote[0]['q_start'])), date('i', strtotime($vote[0]['q_start'])), date('s', strtotime($vote[0]['q_start'])), date('m', strtotime($vote[0]['q_start'])), date('d', strtotime($vote[0]['q_start'])), date('Y', strtotime($vote[0]['q_start']))))}}">
  <meta property="article:modified_time" content="{{date(DATE_W3C, mktime(date('H', strtotime($vote[0]['q_modify_date'])), date('i', strtotime($vote[0]['q_modify_date'])), date('s', strtotime($vote[0]['q_modify_date'])), date('m', strtotime($vote[0]['q_modify_date'])), date('d', strtotime($vote[0]['q_modify_date'])), date('Y', strtotime($vote[0]['q_modify_date']))))}}">
@endsection

@section('self_css')
<link rel="stylesheet" href="https://prod-vote-image.nownews.com/css/index.css">
<style>
  div.position-relative div.slider div.position-relative div.carousel-mask button:hover{
    background-color: #FFC107;
    border-color:  #FFC107;
    color: black;
  }
  div.recommend-slider div.mx-2:hover{
    cursor: pointer;
  }
</style>

<style>
  #survey-form>.form-group {
    margin-bottom: 1rem;
  }

  #survey-form>.form-group>label,
  #survey-form>.form-group>p {
    font-size: 1.3rem;
    margin: 1.1rem 0;
    color: #000;
  }

  #survey-form>.form-action button {
    min-width: 120px;
  }

  #survey-form>.form-group {
    padding: 2rem 0;
  }

  #survey-form .invalid-field .invalid-feedback {
    display: block;
  }

  #survey-form label {
    font-size: 1.1rem;
    margin: 0.5rem 0;
  }

  .slider.hot-slider>div {
    max-height: 450px;
  }

  .carousel-mask {
    background-color: rgba(0, 0, 0, 0.2);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    color: #fff;
    text-align: center;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    max-height: 450px;
  }

  .carousel-mask>h2 {
    font-size: 1.6em;
    font-weight: 400;
    margin-bottom: 1.2em;
    position: relative;
  }

  .carousel-mask>h2::before {
    content: '〝';
    font-size: 1.6em;
    position: absolute;
    top: -0.5em;
    left: -1em;
  }

  .carousel-mask>h2::after {
    content: '〞';
    font-size: 1.6em;
    position: absolute;
    bottom: -1em;
    right: -1em;
  }
  .slider.hot-slider .carousel-body {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
  }

  .bg-img {
    height: 350px;
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .slider-category {
    max-width: 80px;
    top: 0;
    left: 0;
  }
  @media screen and (max-width: 576px) {
    .carousel-arrows.prev {
      left: 0rem;
    }

    .carousel-arrows.next {
      right: 0rem;
    }

    .carousel-mask>span,
    .carousel-mask>h2::before,
    .carousel-mask>h2::after {
      display: none;
    }

    .carousel-mask>h2 {
      font-size: 1em;
    }
    .slider-category {
    max-width: 40px;
    }
  }
  @media screen and (max-width: 768px) {
    .slider.hot-slider .carousel-body {
      position: relative;
    }
  }
</style>
<style>
  .fb-comments, .fb-comments iframe[style], .fb-comments span {
    width: 100% !important;
  }
</style>
@endsection

@section('head_js')
<!-- 結構化語意 -->
<script type="application/ld+json">
  {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "thumbnailUrl": "{{$vote[0]['q_img']}}",
      "url": "{{URL::current()}}",
      "mainEntityOfPage": "{{URL::current()}}",
      "headline": "{{str_replace('18禁', '', str_replace('PK', '', $vote[0]['q_title']))}}",
      "articleSection": "NOWnews民調",
      "datePublished": "{{date(DATE_W3C, mktime(date('H', strtotime($vote[0]['q_start'])), date('i', strtotime($vote[0]['q_start'])), date('s', strtotime($vote[0]['q_start'])), date('m', strtotime($vote[0]['q_start'])), date('d', strtotime($vote[0]['q_start'])), date('Y', strtotime($vote[0]['q_start']))))}}",
      "dateModified": "{{date(DATE_W3C, mktime(date('H', strtotime($vote[0]['q_modify_date'])), date('i', strtotime($vote[0]['q_modify_date'])), date('s', strtotime($vote[0]['q_modify_date'])), date('m', strtotime($vote[0]['q_modify_date'])), date('d', strtotime($vote[0]['q_modify_date'])), date('Y', strtotime($vote[0]['q_modify_date']))))}}",
      "keywords": "",
      "description": "{{$vote[0]['q_desc']}}",
      "image": {
        "@type": "ImageObject",
        "contentUrl": "{{$vote[0]['q_img']}}",
        "url": "{{$vote[0]['q_img']}}",
        "name": "{{str_replace('18禁', '', str_replace('PK', '', $vote[0]['q_title']))}}",
        "width": 1000,
        "height": 536
      },
      "author": {
        "@type": "Person",
        "name": "NOWnews民調"
      },
      "publisher": {
        "@type": "Organization",
        "name": "NOWnews今日新聞",
        "url": "https://www.nownews.com",
        "logo": {
          "@type": "ImageObject",
          "url": "https://www.nownews.com/amp/images/logo_1000x800.png",
          "width": 1000,
          "height": 800
      }
      }
    }
  </script>
  <!-- 麵包屑 -->
    <script type="application/ld+json">
      {   
        "@context":"http://schema.org",
          "@type":"BreadcrumbList",
          "itemListElement":[
              {"@type":"ListItem","position":1,"name":"NOWnews民調","item":"https://vote.nownews.com"},
              {"@type":"ListItem","position":2,"name":"{{$type_name}}","item":"https://vote.nownews.com/voteType/{{$type_key}}"},
              {"@type":"ListItem","position":3,"name":"{{str_replace('18禁', '', str_replace('PK', '', $vote[0]['q_title']))}}","item":"{{URL::current()}}"}
          ]
      }
    </script>
@endsection

@section('main')
<main class="container">
  <div class="card mb-2">
    <div class="row no-gutters">
      <div class="col-12 col-lg">
        <img src="{{$vote[0]['q_img']}}" class="card-img" alt="...">
      </div>
      <div class="col-12 col-lg bg-yellow">
        <div class="card-body">
          <h3 class="card-title text-white">{{str_replace('18禁', '', str_replace('PK', '', $vote[0]['q_title']))}}</h3>
          <p class="card-text">
            <small class="text-muted">調查期間：{{$vote[0]['q_start']}}~{{$vote[0]['q_end']}}</small>
          </p>
          <hr />
          <p class="card-text" style='word-break: break-word;'>{{$vote[0]['q_desc']}}</p>
        </div>
      </div>
    </div>
  </div>
<form class="needs-validation text-secondary pb-5" id="survey-form" method="post" action="{{url('/insertVote')}}/{{$vote[0]['q_question_seq']}}/{{$vote[0]['q_login']}}" novalidate>
    {{ csrf_field() }}
    @foreach($vote as $key => $value)
      @if(strpos($value['t1_title'], '抽獎資訊填寫') !== false)
        <div class="form-group">
          <p>{{$key+1}}.{{$value['t1_title']}}</p>
          @foreach($value['all'] as $k => $v)
            @if(strpos($v->t2_name, '性別') !== false)
              <div class="form-group row">
                <input type="hidden" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][t2_seq]" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}">
                <label class="col-sm-2 col-form-label ml-3">{{$v->t2_name}}</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                  <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}-1" class="custom-control-input" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][other]" value="男" required>
                  <label class="custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}-1">男</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}-2" class="custom-control-input" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][other]" value="女" required>
                  <label class="custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}-2">女</label>
                  <div class="invalid-feedback">&nbsp;&nbsp;必填欄位</div>
                </div>
              </div>
            @else
              <div class="form-group row">
                <input type="hidden" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][t2_seq]" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}">
                <label for="form-question-{{$key+1}}-v-{{$k+1}}" class="col-sm-2 col-form-label ml-3">{{$v->t2_name}}</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][other]" value="" required>
                  <div class="invalid-feedback">必填欄位</div>
                </div>
              </div>
            @endif
          @endforeach
          <div class="mt-3">
            <p>＊您的會員資料作為民調調查所用，我們不會洩漏您的資料。</p>
          </div>
        </div>
      @else
        @if($value['t1_type'] == 'radio') 
        {{-- 單選 --}}
          <div class="form-group">
            <label class="col-form-label">{{$key+1}}.{{$value['t1_title']}}</label>
            <span class="invalid-feedback">&nbsp;&nbsp;必填欄位</span>
            @if(!empty($value['all'][0]->t2_img))
              {{-- 單選有圖片 --}}
              <div class="row justify-content-start">
            @endif
            @foreach($value['all'] as $k => $v)
                @if(!empty($value['all'][0]->t2_img))
                  @if($v->t2_input_other == '1')
                  {{-- 單選有圖片   其他 --}}
                    <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
                      <label for="form-question-{{$key+1}}-v-{{$k+1}}">
                        <img src="{{$v->t2_img}}" alt="" width="80%">
                      </label>
                      <div>
                        <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][t2_seq]" class="custom-control-input" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}" required>
                        <label class="ml-3 custom-control-label d-flex" for="form-question-{{$key+1}}-v-{{$k+1}}">
                          <span class="pr-2" style="word-break: keep-all;">{{$v->t2_name}}</span>
                          <input type="text" class="col-8 col-sm-6 form-control" id="form-question-{{$key+1}}-v-{{$k+1}}-memo" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][other]" value="">
                        </label>
                      </div>
                    </div>
                  @else
                  {{-- 單選有圖片 --}}
                    <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
                      <label for="form-question-{{$key+1}}-v-{{$k+1}}">
                        <img src="{{$v->t2_img}}" alt="" width="80%">
                      </label>
                      <div>
                        <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][t2_seq]" class="custom-control-input" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}" required>
                        <label class="ml-3 custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}">{{$v->t2_name}}</label>
                      </div>
                    </div>
                  @endif
                @else
                  @if($v->t2_input_other == '1')
                  {{-- 單選無圖片   其他 --}}
                    <div class="col-12 custom-control custom-radio ml-3">
                      <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][t2_seq]" class="custom-control-input" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}" required>
                      <label class="custom-control-label d-flex" for="form-question-{{$key+1}}-v-{{$k+1}}">
                        <span class="pr-2" style="word-break: keep-all;">{{$v->t2_name}}</span>
                        <input type="text" class="col-8 col-sm-3 form-control" id="form-question-{{$key+1}}-v-{{$k+1}}-memo" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][other]" value="">
                      </label>
                    </div>
                  @else
                  {{-- 單選無圖片 --}}
                    <div class="col-12 custom-control custom-radio ml-3">
                      <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][t2_seq]" class="custom-control-input" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}" required>
                      <label class="custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}">{{$v->t2_name}}</label>
                    </div>
                  @endif
                @endif
            @endforeach
            @if(!empty($value['all'][0]->t2_img))
              {{-- 單選有圖片 --}}
              </div>
            @endif
          </div>
        @else
        {{-- 複選 --}}
          <div class="form-group custom-checkbox-group">
            <p>
              {{$key+1}}.{{$value['t1_title']}}
              <span class="badge badge-warning">複選</span>
              <span class="invalid-feedback">&nbsp;&nbsp;至少填一欄位</span>
            </p>
            @if(!empty($value['all'][0]->t2_img))
              {{-- 複選有圖片 --}}
              <div class="row justify-content-start">
            @else
              {{-- 複選無圖片 --}}
              <div class="row">
            @endif
            @foreach($value['all'] as $k => $v)
                @if(!empty($value['all'][0]->t2_img))
                  @if($v->t2_input_other == '1')
                  {{-- 複選有圖片   其他 --}}
                    <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
                      <label for="form-question-{{$key+1}}-v-{{$k+1}}">
                        <img src="{{$v->t2_img}}" alt="" width="80%">
                      </label>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][t2_seq]" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}">
                        {{-- <label class="ml-0 ml-md-5 custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}">{{$v->t2_name}}</label> --}}
                        <label class="ml-3 custom-control-label d-flex" for="form-question-{{$key+1}}-v-{{$k+1}}">
                          {{-- <span class="pr-2" style="word-break: keep-all;">{{$v->t2_name}}</span> --}}
                          <input type="text" class="col-8 col-sm-6 form-control" id="form-question-{{$key+1}}-v-{{$k+1}}-memo" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][other]" placeholder='其他' value="">
                        </label>
                      </div>
                    </div>
                  @else
                  {{-- 複選有圖片 --}}
                  <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
                    <label for="form-question-{{$key+1}}-v-{{$k+1}}">
                      <img src="{{$v->t2_img}}" alt="" width="80%">
                    </label>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][t2_seq]" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}">
                      <label class="ml-0 ml-md-5 custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}">{{$v->t2_name}}</label>
                      {{-- <label class="ml-3 custom-control-label d-flex" for="form-question-{{$key+1}}-v-{{$k+1}}">
                        <span class="pr-2" style="word-break: keep-all;">{{$v->t2_name}}</span>
                        <input type="text" class="col-8 col-sm-6 form-control" id="form-question-{{$key+1}}-v-{{$k+1}}-memo" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}]['other']" placehoder='其他' value="">
                      </label> --}}
                    </div>
                  </div>
                  @endif
                @else
                  @if($v->t2_input_other == '1')
                  {{-- 複選無圖片   其他 --}}
                    {{-- <div class="col-12 custom-control custom-radio ml-3">
                      <input type="radio" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][t2_seq]" class="custom-control-input" value="{{$v->t2_topic02_seq}}" required>
                      <label class="custom-control-label d-flex" for="form-question-0{{$key+1}}-v-{{$k+1}}">
                        <span class="pr-2" style="word-break: keep-all;">{{$v->t2_name}}</span>
                        <input type="text" class="col-8 col-sm-3 form-control" id="form-question-{{$key+1}}-v-{{$k+1}}-memo" name="form_answer[{{$v->t1_topic01_seq}}][answer_1][other]" value="">
                      </label>
                    </div> --}}

                    <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$key+1}}][t2_seq]" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}">
                        {{-- <label class="custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}">{{$v->t2_name}}</label> --}}
                        <label class="custom-control-label d-flex" for="form-question-{{$key+1}}-v-{{$k+1}}">
                          {{-- <span class="pr-2" style="word-break: keep-all;">{{$v->t2_name}}</span> --}}
                          <input type="text" class="col-8 col-sm-6 form-control" id="form-question-{{$key+1}}-v-{{$k+1}}-memo" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$key+1}}][other]" placeholder="其他" value="">
                        </label>
                      </div>
                    </div>
                  @else
                  {{-- 複選無圖片 --}}
                    <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="form-question-{{$key+1}}-v-{{$k+1}}" name="form_answer[{{$v->t1_topic01_seq}}][answer_{{$k+1}}][t2_seq]" value="input_other_{{$v->t2_input_other}}/{{$v->t2_topic02_seq}}">
                        <label class="custom-control-label" for="form-question-{{$key+1}}-v-{{$k+1}}">{{$v->t2_name}}</label>
                      </div>
                    </div>
                  @endif
                @endif
            @endforeach
            </div>
          </div>
        @endif
      @endif
    @endforeach
  {{-- </form> --}}
    <!-- 文字單選 -->
    {{-- <div class="form-group">
      <label class="col-form-label">1.您覺得《綜藝玩很大》需要停播嗎？</label>
      <span class="invalid-feedback">&nbsp;&nbsp;必填欄位</span>
      <div class="col-12 custom-control custom-radio ml-3">
        <input type="radio" id="form-question-01-v-1" name="form-question-01" class="custom-control-input" value="0" required>
        <label class="custom-control-label" for="form-question-01-v-1">要</label>
      </div>
      <div class="col-12 custom-control custom-radio ml-3">
        <input type="radio" id="form-question-01-v-2" name="form-question-01" class="custom-control-input" value="1" required>
        <label class="custom-control-label" for="form-question-01-v-2">不要</label>
      </div>
      <div class="col-12 custom-control custom-radio ml-3">
        <input type="radio" id="form-question-01-v-3" name="form-question-01" class="custom-control-input" value="2" required>
        <label class="custom-control-label" for="form-question-01-v-3">沒意見</label>
      </div>
      <div class="col-12 custom-control custom-radio ml-3">
        <input type="radio" id="form-question-01-v-4" name="form-question-01" class="custom-control-input" value="3" required>
        <label class="custom-control-label d-flex" for="form-question-01-v-4">
          <span class="pr-2" style="word-break: keep-all;">其他</span>
          <input type="text" class="col-8 col-sm-3 form-control" id="form-question-01-memo" name="form-question-01-memo" value="">
        </label>
      </div>
    </div> --}}
    <!-- 圖片單選 -->
    {{-- <div class="form-group">
      <label class="col-form-label">1.您覺得《綜藝玩很大》需要停播嗎？</label>
      <span class="invalid-feedback">&nbsp;&nbsp;必填欄位</span>
      <div class="row justify-content-between">
        <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
          <label for="form-question-02-v-1">
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div>
            <input type="radio" id="form-question-02-v-1" name="form-question-02" class="custom-control-input" value="0" required>
            <label class="ml-3 custom-control-label" for="form-question-02-v-1">要</label>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
          <label for="form-question-02-v-2">
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div>
            <input type="radio" id="form-question-02-v-2" name="form-question-02" class="custom-control-input" value="0" required>
            <label class="ml-3 custom-control-label" for="form-question-02-v-2">不要</label>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
          <label for="form-question-02-v-3">
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div>
            <input type="radio" id="form-question-02-v-3" name="form-question-02" class="custom-control-input" value="0" required>
            <label class="ml-3 custom-control-label d-flex" for="form-question-02-v-3">
              <span class="pr-2" style="word-break: keep-all;">其他</span>
              <input type="text" class="col-8 col-sm-6 form-control" id="form-question-02-memo" name="form-question-02-memo" value="">
            </label>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- 圖片多選 -->
    {{-- <div class="form-group custom-checkbox-group">
      <p>
        3.您覺得《綜藝玩很大》需要停播嗎？
        <span class="badge badge-warning">複選</span>
        <span class="invalid-feedback">&nbsp;&nbsp;至少填一欄位</span>
      </p>
      <div class="row justify-content-between">
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <label for="customCheck1">
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1">
            <label class="ml-0 ml-md-5 custom-control-label" for="customCheck1">選項一</label>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <label for="customCheck2">
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck2" name="customCheck2">
            <label class="ml-0 ml-md-5 custom-control-label" for="customCheck2">選項二</label>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <label for="customCheck3">
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck3" name="customCheck3">
            <label class="ml-0 ml-md-5 custom-control-label" for="customCheck3">選項三</label>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- 文字多選 -->
    {{-- <div class="form-group custom-checkbox-group">
      <p>
        4.您覺得《綜藝玩很大》需要停播嗎？
        <span class="badge badge-warning">複選</span>
        <span class="invalid-feedback">&nbsp;&nbsp;至少填一欄位</span>
      </p>
      <div class="row">
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck4" name="customCheck4">
            <label class="custom-control-label" for="customCheck4">選項一</label>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck5" name="customCheck5">
            <label class="custom-control-label" for="customCheck5">選項二</label>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck6" name="customCheck6">
            <label class="custom-control-label" for="customCheck6">選項三</label>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- <div class="form-group">
      <p>5. 個資填寫</p>
      <!-- 姓名 -->
      <div class="form-group row">
        <label for="form-name" class="col-sm-2 col-form-label ml-3">姓名</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="form-name" name="form-name" value="" required>
          <div class="invalid-feedback">必填欄位</div>
        </div>
      </div>
      <!-- 性別 -->
      <div class="form-group row">
        <label class="col-sm-2 col-form-label ml-3">性別</label>
        <div class="custom-control custom-radio custom-control-inline ml-3">
          <input type="radio" id="form-gender-1" name="form-gender" class="custom-control-input" value="1" required>
          <label class="custom-control-label" for="form-gender-1">男</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="form-gender-2" name="form-gender" class="custom-control-input" value="2" required>
          <label class="custom-control-label" for="form-gender-2">女</label>
          <div class="invalid-feedback">&nbsp;&nbsp;必填欄位</div>
        </div>
      </div>
      <!-- 生日 -->
      <div class="form-group row">
        <label for="form-birthday" class="col-sm-2 col-form-label ml-3">生日</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="form-birthday" name="form-birthday" value="" required>
        </div>
      </div>
      <!-- 聯絡電話 -->
      <div class="form-group row">
        <label for="form-phone" class="col-sm-2 col-form-label ml-3">聯絡電話</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="form-phone" name="form-phone" value="" required>
          <div class="invalid-feedback">必填欄位</div>
        </div>
      </div>
      <!-- 信箱 -->
      <div class="form-group row">
        <label for="form-email" class="col-sm-2 col-form-label ml-3">信箱</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="form-email" name="form-email" value="" required>
          <div class="invalid-feedback">必填欄位</div>
        </div>
      </div>
      <div class="mt-3">
        <p>＊您的會員資料作為民調調查所用，我們不會洩漏您的資料。</p>
      </div>
    </div> --}}
    <div class="form-action my-5 row justify-content-center">
      <button class="btn btn-theme bg-yellow gray-side text-white mx-3" type="submit">送出</button>
      <button class="btn bg-light-gray btn-theme gray-side text-white clear-btn mx-3" type="button">重新填寫</button>
    </div>
  </form>
  <!-- fb social plugin -->
  <div class="fb-comments" data-href="{{url('/voteResult')}}/{{$question_id}}" data-numposts="5" data-width="100%"></div>
  <!-- 輪播 -->
    @if ($being_vote->first())
    <section class="section">
      <div class="position-relative">
        <div class="d-flex flex-row align-items-center" style='margin-bottom: 1.5rem;'>
          <img class="section-icon mx-2" src="https://prod-vote-image.nownews.com/images/section-icon-02.svg" alt="">
          <h2 class="section-title">火熱投票中</h2>
        </div>
        <div class="slider index-slider">
          @foreach ($being_vote as $key => $value)
            <div class="slide-{{$key}} position-relative">
              <div class="carousel-mask">
                <h2>{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h2>
                {{-- <span>火熱投票中</span> --}}
                <button class="btn btn-outline text-white" style="font-weight: bold;" onclick="javascript: location.href='{{url('/vote')}}/{{$value->question_seq}}';">查看完整內容</button>
              </div>
              <img src="{{$value->img}}" width="100%" alt="">
            </div>
          @endforeach
          
          {{-- <div class="slide-1 position-relative">
            <div class="carousel-mask">
              <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
              <span>火熱投票中</span>
              <button class="btn btn-outline text-white">查看完整內容</button>
            </div>
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="slide-2 position-relative">
            <div class="carousel-mask">
              <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
              <span>火熱投票中</span>
              <button class="btn btn-outline text-white" href="">查看完整內容</button>
            </div>
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ad305a222bd8/img" width="100%" alt="">
          </div>
          <div class="slide-3 position-relative">
            <div class="carousel-mask">
              <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
              <span>火熱投票中</span>
              <button class="btn btn-outline text-white" href="">查看完整內容</button>
            </div>
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ad305a222bd8/img" width="100%" alt="">
          </div> --}}
        </div>
        <div class="carousel-arrows prev"></div>
        <div class="carousel-arrows next"></div>
      </div>  
    </section>
    @endif

  
  <!-- 輪播 -->
  @if($interest_vote->first())
  <section class="section">
    <div class="section-header d-flex flex-row justify-content-between">
      <div class="d-flex flex-row align-items-center">
        <img class="section-icon mx-2" src="https://prod-vote-image.nownews.com/images/section-icon-04.svg" alt="">
        <h2 class="section-title">您可能感興趣的投票</h2>
      </div>
      <button class="section-more d-none">
        READ MORE
        <i class="fas fa-chevron-circle-right text-yellow"></i>
      </button>
    </div>
    <div class="section-content position-relative">
      <div class="slider recommend-slider">
        @foreach ($interest_vote as $key => $value)
          <div class="slide-{{$key}} mx-2" onclick="javascript: location.href='{{url('/voteResult')}}/{{$value->question_seq}}';">
            <div>
              <img src="{{$value->img}}" width="100%" alt="">
            </div>
            <div class="bg-yellow py-2 px-3">
              <span class="badge bg-white text-yellow">{{$value->type_name}}</span>
              <p>{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</p>
            </div>
          </div>
        @endforeach
        
        {{-- <div class="slide-1 mx-2">
          <div>
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
        <div class="slide-2 mx-2">
          <div>
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
        <div class="slide-3 mx-2">
          <div>
            <img src="https://prod-vote-image.nownews.com/question_img/4028818a7554ab980175ad305a222bd8/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div> --}}
      </div>
      <div class="carousel-arrows prev"></div>
      <div class="carousel-arrows next"></div>
    </div>
  </section>
@endif
</main>
{{-- 置頂按鈕 --}}
  {{-- <button style="cursor: pointer;" type="button" class="backToTop">
    <div class="d-flex flex-column">
    <i class="fas fa-chevron-up"></i>
    <span>TOP</span>
    </div>
  </button> --}}
@endsection

@section('self_js')
{{-- 引入首頁上方輪播需要的js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
{{-- 引入首頁上方輪播需要的js --}}
<script>
  // $('.hot-slider').slick({
  //   slidesToShow: 2,
  //   slidesToScroll: 2,
  //   autoplaySpeed: 2000,
  //   dots: true,
  //   arrows: true,
  //   prevArrow: $('.hot-slider~.prev'),
  //   nextArrow: $('.hot-slider~.next'),
  //   responsive: [{
  //     breakpoint: 576,
  //     settings: {
  //       slidesToShow: 1,
  //       slidesToScroll: 1,
  //     }
  //   }]
  // });
  $('.index-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    prevArrow: $('.index-slider~.prev'),
    nextArrow: $('.index-slider~.next'),
  });
  // $('.pk-slider').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   autoplay: true,
  //   autoplaySpeed: 2000,
  //   dots: true,
  //   arrows: true,
  //   prevArrow: $('.pk-slider~.prev'),
  //   nextArrow: $('.pk-slider~.next'),
  // });
  $('.recommend-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: true,
    prevArrow: $('.recommend-slider~.prev'),
    nextArrow: $('.recommend-slider~.next'),
    responsive: [{
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }]
  });
</script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      var clearBtn = document.querySelector('.clear-btn')
      clearBtn.addEventListener('click', function() {
        const surveyForm = document.getElementById('survey-form');
        surveyForm.reset();
        surveyForm.classList.remove('was-validated');

      })
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false || !handleCheckboxGroup()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
    $('input[type=checkbox]').change(handleCheckboxGroup)

  })();

  function handleCheckboxGroup() {
    console.log('ggg');
    let valid = true;
    // let valid = false;
    $('.custom-checkbox-group').each(function(index, elem) {
      let isChoose = false;
      $(elem).find('input[type=checkbox]').each(function(i, el) {
        // console.log(el);
        if (el.checked) {
          isChoose = true;
          console.log('aaa' + isChoose);
        }
      })
      if (!isChoose) {
        $(elem).addClass('invalid-field')
        valid = false;
      } else {
        $(elem).removeClass('invalid-field')
      }
    })
    console.log(valid);
    return valid
  }
</script>
<script>
  // 限制文字數量
  $('div.recommend-slider p').ellipsis({
    row: 1,
  })
  // $('div.card-body p.card-text').ellipsis({
  //   row: 4,
  // })
</script>
@if(strpos($vote[0]['q_title'], '18禁') !== false)
  <script>
    $(document).ready(function(){
      $('#rated-modal').modal('show');
    });
  </script>
@endif
@endsection