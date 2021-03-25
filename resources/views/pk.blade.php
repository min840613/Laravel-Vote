@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_mata')
  {{-- @if(strpos(URL::current(), '*********Result')) --}}
    <meta property="article:section" content="*********民調">
    <meta property="article:published_time" content="{{date(DATE_W3C, mktime(date('H', strtotime($*********[0]['q_start'])), date('i', strtotime($*********[0]['q_start'])), date('s', strtotime($*********[0]['q_start'])), date('m', strtotime($*********[0]['q_start'])), date('d', strtotime($*********[0]['q_start'])), date('Y', strtotime($*********[0]['q_start']))))}}">
    <meta property="article:modified_time" content="{{date(DATE_W3C, mktime(date('H', strtotime($*********[0]['q_modify_date'])), date('i', strtotime($*********[0]['q_modify_date'])), date('s', strtotime($*********[0]['q_modify_date'])), date('m', strtotime($*********[0]['q_modify_date'])), date('d', strtotime($*********[0]['q_modify_date'])), date('Y', strtotime($*********[0]['q_modify_date']))))}}">
  {{-- @endif --}}
@endsection

@section('self_css')
<link rel="stylesheet" href="*********/css/pk.css">
{{-- <link rel="stylesheet" href="*********/css/index.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> --}}
<style>
  div.position-relative div.slider div.position-relative div.carousel-mask button:hover{
    background-color: #FFC107;
    border-color:  #FFC107;
    color: black;
  }
  div.recommend-slider div.mx-2:hover{
    cursor: pointer;
  }

  h3.card-title {
    font-size: 1.3rem;
  }
</style>
@endsection

@section('head_js')

@if(strpos(URL::current(), '*********Result') !== false)

    <!-- 結構化語意 -->
    <script type="application/ld+json">
      {
          "@context": "http://schema.org",
          "@type": "NewsArticle",
          "thumbnailUrl": "{{$*********[0]['q_img']}}",
          "url": "{{URL::current()}}",
          "mainEntityOfPage": "{{URL::current()}}",
          "headline": "{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}} | 投票結果",
          "articleSection": "*********民調",
          "datePublished": "{{date(DATE_W3C, mktime(date('H', strtotime($*********[0]['q_start'])), date('i', strtotime($*********[0]['q_start'])), date('s', strtotime($*********[0]['q_start'])), date('m', strtotime($*********[0]['q_start'])), date('d', strtotime($*********[0]['q_start'])), date('Y', strtotime($*********[0]['q_start']))))}}",
          "dateModified": "{{date(DATE_W3C, mktime(date('H', strtotime($*********[0]['q_modify_date'])), date('i', strtotime($*********[0]['q_modify_date'])), date('s', strtotime($*********[0]['q_modify_date'])), date('m', strtotime($*********[0]['q_modify_date'])), date('d', strtotime($*********[0]['q_modify_date'])), date('Y', strtotime($*********[0]['q_modify_date']))))}}",
          "keywords": "",
          "description": "{{$*********[0]['q_desc']}}",
          "image": {
            "@type": "ImageObject",
            "contentUrl": "{{$*********[0]['q_img']}}",
            "url": "{{$*********[0]['q_img']}}",
            "name": "{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}",
            "width": 1000,
            "height": 536
          },
          "author": {
            "@type": "Person",
            "name": "*********民調"
          },
          "publisher": {
            "@type": "Organization",
            "name": "*********今日新聞",
            "url": "*********",
            "logo": {
              "@type": "ImageObject",
              "url": "*********/amp/images/logo_1000x800.png",
              "width": 1000,
              "height": 800
          }
          }
        }
      </script>

  @else

    <!-- 結構化語意 -->
    <script type="application/ld+json">
      {
          "@context": "http://schema.org",
          "@type": "NewsArticle",
          "thumbnailUrl": "{{$*********[0]['q_img']}}",
          "url": "{{URL::current()}}",
          "mainEntityOfPage": "{{URL::current()}}",
          "headline": "{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}",
          "articleSection": "*********民調",
          "datePublished": "{{date(DATE_W3C, mktime(date('H', strtotime($*********[0]['q_start'])), date('i', strtotime($*********[0]['q_start'])), date('s', strtotime($*********[0]['q_start'])), date('m', strtotime($*********[0]['q_start'])), date('d', strtotime($*********[0]['q_start'])), date('Y', strtotime($*********[0]['q_start']))))}}",
          "dateModified": "{{date(DATE_W3C, mktime(date('H', strtotime($*********[0]['q_modify_date'])), date('i', strtotime($*********[0]['q_modify_date'])), date('s', strtotime($*********[0]['q_modify_date'])), date('m', strtotime($*********[0]['q_modify_date'])), date('d', strtotime($*********[0]['q_modify_date'])), date('Y', strtotime($*********[0]['q_modify_date']))))}}",
          "keywords": "",
          "description": "{{$*********[0]['q_desc']}}",
          "image": {
            "@type": "ImageObject",
            "contentUrl": "{{$*********[0]['q_img']}}",
            "url": "{{$*********[0]['q_img']}}",
            "name": "{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}",
            "width": 1000,
            "height": 536
          },
          "author": {
            "@type": "Person",
            "name": "*********民調"
          },
          "publisher": {
            "@type": "Organization",
            "name": "*********今日新聞",
            "url": "*********",
            "logo": {
              "@type": "ImageObject",
              "url": "*********/amp/images/logo_1000x800.png",
              "width": 1000,
              "height": 800
          }
          }
        }
      </script>

  @endif




  <!-- 麵包屑 -->
  @if(strpos(URL::current(), '*********Result') !== false)

    <script type="application/ld+json">
      {   
        "@context":"http://schema.org",
          "@type":"BreadcrumbList",
          "itemListElement":[
              {"@type":"ListItem","position":1,"name":"*********民調","item":"https://*********.*********.com"},
              {"@type":"ListItem","position":2,"name":"{{$type_name}}","item":"https://*********.*********.com/*********Type/{{$type_key}}"},
              {"@type":"ListItem","position":3,"name":"{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}} | 投票結果","item":"{{URL::current()}}"}
          ]
      }
    </script>

  @else

    <script type="application/ld+json">
      {   
        "@context":"http://schema.org",
          "@type":"BreadcrumbList",
          "itemListElement":[
              {"@type":"ListItem","position":1,"name":"*********民調","item":"https://*********.*********.com"},
              {"@type":"ListItem","position":2,"name":"{{$type_name}}","item":"https://*********.*********.com/*********Type/{{$type_key}}"},
              {"@type":"ListItem","position":3,"name":"{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}","item":"{{URL::current()}}"}
          ]
      }
    </script>

  @endif
    
@endsection

@section('main')
<main class="container">
  <div class="card mb-5">
    <div class="row no-gutters">
      <div class="col-12 col-lg">
        <img src="{{$*********[0]['q_img']}}" class="card-img" alt="...">
      </div>
      <div class="col-12 col-lg bg-yellow">
        <div class="card-body">
          <h3 class="card-title text-white">{{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}</h3>
          <p class="card-text">
            調查期間：{{$*********[0]['q_start']}}~{{$*********[0]['q_end']}}
          </p>
          <hr />
          <p class="card-text">{{$*********[0]['q_desc']}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="pk-title">
    <h2 class="text-center">
      <img src="*********/images/fist-red.svg" alt="" width="40">
      <span class="mx-0 mx-md-5">PK擂台</span>
      <img src="*********/images/fist-blue.svg" alt="" width="40">
    </h2>
    <p class="btn btn-theme gray-side bg-white gray-border d-block mx-auto my-5" style="width: fit-content;">
      {{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}
    </p>
  </div>
  <div class="pk-options row my-5">
    <div class="col">
      <div class="pk-option-1 d-flex flex-column align-items-center h-100 justify-content-between">
        @if(date("Y-m-d") > $*********[0]['q_end'] || $has_*********)
          <button type="button" class="option-img text-center" style="background-image: url('{{$*********[0]['all'][0]->t2_img}}');">
          </button>
        @else
          <button type="button" class="option-img text-center" data-toggle="modal" data-target="#option-model-1" style="background-image: url('{{$*********[0]['all'][0]->t2_img}}');">
          </button>
        @endif
        <span class="my-1 option-name">{{$*********[0]['all'][0]->t2_name}}</span>
        <div class="w-100 d-flex flex-column">
          {{-- <span class="text-red my-1 option-********* text-center">{{$*********[0]['all'][0]->t2_count}} 票</span> --}}
          <div class="w-100 d-flex flex-row align-items-center">
            @if($*********[0]['total_count'] == 0)
              <div class="progress-container col-12" data-*********="0" data-percent="0" data-side="left">
            @else
              <div class="progress-container col-12" data-*********="{{$*********[0]['all'][0]->t2_count}}" data-percent="{{round(($*********[0]['all'][0]->t2_count/$*********[0]['total_count'])*100, 2)}}" data-side="left">
            @endif
                <div class="progress">
                @if($*********[0]['total_count'] == 0)
                      <div class="progress-bar bg-red" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @else
                      <div class="progress-bar bg-red" role="progressbar" style="width: {{round(($*********[0]['all'][0]->t2_count/$*********[0]['total_count'])*100, 2)}}%" aria-valuenow="{{round(($*********[0]['all'][0]->t2_count/$*********[0]['total_count'])*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @endif
                
          </div>
        </div>
      </div>
    </div>
    <div class="text-center align-self-end">
      <img class="vs" src="*********/images/vs.svg" width="100">
    </div>
    <div class="col">
      <div class="pk-option-2 d-flex flex-column align-items-center h-100 justify-content-between">
        @if(date("Y-m-d") > $*********[0]['q_end'] || $has_*********)
          <button type="button" class="option-img text-center" style="background-image: url('{{$*********[0]['all'][1]->t2_img}}');" onclick="javascript: alert('此投票已結束');">
          </button>
        @else
          <button type="button" class="option-img text-center" data-toggle="modal" data-target="#option-model-2" style="background-image: url('{{$*********[0]['all'][1]->t2_img}}');">
          </button>
        @endif
        
        <span class="my-1 option-name">{{$*********[0]['all'][1]->t2_name}}</span>
        <div class="w-100 d-flex flex-column">
          {{-- <span class="text-blue my-1 option-********* text-center">{{$*********[0]['all'][1]->t2_count}} 票</span> --}}
          <div class="w-100 d-flex flex-row-reverse align-items-center">
            @if($*********[0]['total_count'] == 0)
              <div class="progress-container col-12" data-*********="0" data-percent="0" data-side="right">
            @else
              <div class="progress-container col-12" data-*********="{{$*********[0]['all'][1]->t2_count}}" data-percent="{{round(($*********[0]['all'][1]->t2_count/$*********[0]['total_count'])*100, 2)}}" data-side="right">
            @endif
                <div class="progress" style="transform: rotateY(180deg);">
                @if($*********[0]['total_count'] == 0)
                      <div class="progress-bar bg-blue" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @else
                      <div class="progress-bar bg-blue" role="progressbar" style="width: {{round(($*********[0]['all'][1]->t2_count/$*********[0]['total_count'])*100, 2)}}%" aria-valuenow="{{round(($*********[0]['all'][1]->t2_count/$*********[0]['total_count'])*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                @endif
                
          </div>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id='*********1_page' value="2">
  <input type="hidden" id='*********2_page' value="2">

  <div class="pk-comments d-none d-md-flex row">
    <div class="col-12 col-md">
      <ul class="nav nav-tabs" id="option-1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="option-1-hottest-tab" data-toggle="tab" href="#hot1" role="tab" aria-controls="hot1" aria-selected="true">紅方 - 留言區</a>
        </li>
        {{-- <li class="nav-item" role="presentation">
          <a class="nav-link" id="option-1-newest-tab" data-toggle="tab" href="#new1" role="tab" aria-controls="new1" aria-selected="false">選項一最新</a>
        </li> --}}
      </ul>
      <div class="tab-pane fade show active" id="hot1" role="tabpanel" aria-labelledby="option-1-hottest-tab">
      <div class="tab-content" id="comments-container-1">
        {{-- <div class="fb-comments" data-href="{{url('/*********Result')}}/{{$question_id}}?fb_share = article1" data-numposts="5" data-width="100%"></div> --}}
        @if($*********_command1->first())
          @foreach ($*********_command1 as $value)
            <div class="comment mb-5 mx-2">
              <div class="comment-info">
                <i class="fas fa-user-circle text-muted"></i>
                @if((strtotime(date('Y-m-d H:i:s')) - strtotime(date('Y-m-d H:i:s', strtotime($value->created_time))))/ (60*60) >= 24)
                  {{-- <small class="text-muted">{{(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($value->created_time))))/ (60*60*24)}}天前</small> --}}
                @else
                  {{-- <small class="text-muted">剛剛</small> --}}
                @endif
              </div>
              <div class="comment-body">{{$value->other}}</div>
            </div>
          @endforeach
          <div id="more_comment_1" class="comment mb-5 mx-2">
            {{-- <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i> --}}
              {{-- <small class="text-muted">28天前</small> --}}
            {{-- </div> --}}
            <a style="cursor: pointer; color: blue; text-align: center;" onclick="ajax_comman_one();"><div class="comment-body">載入更多留言</div></a>
          </div>
        @else
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              {{-- <small class="text-muted">28天前</small> --}}
            </div>
            <div class="comment-body">歡迎參加投票</div>
          </div>
        @endif
        
        </div>
        {{-- <div class="tab-pane fade show active" id="hot1" role="tabpanel" aria-labelledby="option-1-hottest-tab">
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
        </div>
        <div class="tab-pane fade" id="new1" role="tabpanel" aria-labelledby="option-1-newest-tab">
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
        </div> --}}
      </div>
    </div>
    <div class="col-12 col-md">  
      <ul class="nav nav-tabs" id="option-2" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="option-2-hottest-tab" data-toggle="tab" href="#hot2" role="tab" aria-controls="hot1" aria-selected="true">藍方 - 留言區</a>
        </li>
        {{-- <li class="nav-item" role="presentation">
          <a class="nav-link" id="option-2-newest-tab" data-toggle="tab" href="#new2" role="tab" aria-controls="new1" aria-selected="false">選項二最新</a>
        </li> --}}
      </ul>
      <div class="tab-pane fade show active" id="hot2" role="tabpanel" aria-labelledby="option-2-hottest-tab">
      <div class="tab-content" id="comments-container-2">
        {{-- <div class="fb-comments" data-href="{{url('/*********Result')}}/{{$question_id}}?fb_share = article2" data-numposts="5" data-width="100%"></div> --}}
        @if($*********_command2->first())
          @foreach ($*********_command2 as $value)
            <div class="comment mb-5 mx-2">
              <div class="comment-info">
                <i class="fas fa-user-circle text-muted"></i>
                @if((strtotime(date('Y-m-d H:i:s')) - strtotime(date('Y-m-d H:i:s', strtotime($value->created_time))))/ (60*60) >= 24)
                  {{-- <small class="text-muted">{{(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($value->created_time))))/ (60*60*24)}}天前</small> --}}
                @else
                  {{-- <small class="text-muted">剛剛</small> --}}
                @endif
              </div>
              <div class="comment-body">{{$value->other}}</div>
            </div>
          @endforeach
          <div id="more_comment_2" class="comment mb-5 mx-2">
            {{-- <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i> --}}
              {{-- <small class="text-muted">28天前</small> --}}
            {{-- </div> --}}
            <a style="cursor: pointer; color: blue; text-align: center;" onclick="ajax_comman_two();"><div class="comment-body">載入更多留言</div></a>
          </div>
        @else
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              {{-- <small class="text-muted">28天前</small> --}}
            </div>
            <div class="comment-body">歡迎參加投票</div>
          </div>
        @endif
          
        </div>
        {{-- <div class="tab-pane fade show active" id="hot2" role="tabpanel" aria-labelledby="option-2-hottest-tab">
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
        </div>
        <div class="tab-pane fade" id="new2" role="tabpanel" aria-labelledby="option-2-newest-tab">
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
          <div class="comment mb-5 mx-2">
            <div class="comment-info">
              <i class="fas fa-user-circle text-muted"></i>
              <small class="text-muted">28天前</small>
            </div>
            <div class="comment-body">ailable for any length of text, as we</div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="pk-comments d-flex d-md-none row">
    <div class="col-12 col-md">
      <ul class="nav nav-tabs justify-content-between" id="option-1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="option-1-sm-hottest-tab" data-toggle="tab" href="#hot1-sm" role="tab" aria-controls="hot1-sm" aria-selected="true">紅方 - 留言區</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="option-1-sm-newest-tab" data-toggle="tab" href="#new1-sm" role="tab" aria-controls="new1-sm" aria-selected="false">藍方 - 留言區</a>
        </li>
      </ul>
      <div class="tab-content" id="comments-container-mobile-1">
        <!-- 紅方 留言區 假資料 -->
        <div class="tab-pane fade show active" id="hot1-sm" role="tabpanel" aria-labelledby="option-1-sm-hottest-tab">
          @if($*********_command1->first())
            @foreach ($*********_command1 as $value)
              <div class="comment mb-5 mx-2">
                <div class="comment-info">
                  <i class="fas fa-user-circle text-muted"></i>
                  @if((strtotime(date('Y-m-d H:i:s')) - strtotime(date('Y-m-d H:i:s', strtotime($value->created_time))))/ (60*60) >= 24)
                    {{-- <small class="text-muted">{{(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($value->created_time))))/ (60*60*24)}}天前</small> --}}
                  @else
                    {{-- <small class="text-muted">剛剛</small> --}}
                  @endif
                </div>
                <div class="comment-body">{{$value->other}}</div>
              </div>
            @endforeach
            <div id="more_mobile_comment_1" class="comment mb-5 mx-2">
              {{-- <div class="comment-info">
                <i class="fas fa-user-circle text-muted"></i> --}}
                {{-- <small class="text-muted">28天前</small> --}}
              {{-- </div> --}}
              <a style="cursor: pointer; color: blue; text-align: center;" onclick="ajax_comman_one();"><div class="comment-body">載入更多留言</div></a>
            </div>
          @else
            <div class="comment mb-5 mx-2">
              {{-- <div class="comment-info">
                <i class="fas fa-user-circle text-muted"></i>
                <small class="text-muted">28天前</small>
              </div> --}}
              <div class="comment-body">歡迎參加投票</div>
            </div>
          @endif
        </div>
        <!-- 藍方 留言區 假資料  -->
        <div class="tab-pane fade" id="new1-sm" role="tabpanel" aria-labelledby="option-1-sm-newest-tab">
          @if($*********_command2->first())
            @foreach ($*********_command2 as $value)
              <div class="comment mb-5 mx-2">
                <div class="comment-info">
                  <i class="fas fa-user-circle text-muted"></i>
                  @if((strtotime(date('Y-m-d H:i:s')) - strtotime(date('Y-m-d H:i:s', strtotime($value->created_time))))/ (60*60) >= 24)
                    {{-- <small class="text-muted">{{(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($value->created_time))))/ (60*60*24)}}天前</small> --}}
                  @else
                    {{-- <small class="text-muted">剛剛</small> --}}
                  @endif
                </div>
                <div class="comment-body">{{$value->other}}</div>
              </div>
            @endforeach
            <div id="more_mobile_comment_2" class="comment mb-5 mx-2">
              {{-- <div class="comment-info">
                <i class="fas fa-user-circle text-muted"></i> --}}
                {{-- <small class="text-muted">28天前</small> --}}
              {{-- </div> --}}
              <a style="cursor: pointer; color: blue; text-align: center;" onclick="ajax_comman_two();"><div class="comment-body">載入更多留言</div></a>
            </div>
          @else
            <div class="comment mb-5 mx-2">
              {{-- <div class="comment-info">
                <i class="fas fa-user-circle text-muted"></i>
                <small class="text-muted">28天前</small>
              </div> --}}
              <div class="comment-body">歡迎參加投票</div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  @if ($being_*********->first())
    <section class="section">
      <div class="position-relative">
        <div class="d-flex flex-row align-items-center" style='margin-bottom: 1.5rem;'>
          <img class="section-icon mx-2" src="*********/images/section-icon-02.svg" alt="">
          <h2 class="section-title">火熱投票中</h2>
        </div>
        <div class="slider index-slider">
          @foreach ($being_********* as $key => $value)
            <div class="slide-{{$key}} position-relative">
              <div class="carousel-mask">
                <h2>{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h2>
                {{-- <span>火熱投票中</span> --}}
                  <button class="btn btn-outline text-white" style="font-weight: bold;" onclick="javascript: location.href='{{url('/*********')}}/{{$value->question_seq}}';">查看完整內容</button>
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
            <img src="*********/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="slide-2 position-relative">
            <div class="carousel-mask">
              <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
              <span>火熱投票中</span>
              <button class="btn btn-outline text-white" href="">查看完整內容</button>
            </div>
            <img src="*********/question_img/4028818a7554ab980175ad305a222bd8/img" width="100%" alt="">
          </div>
          <div class="slide-3 position-relative">
            <div class="carousel-mask">
              <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
              <span>火熱投票中</span>
              <button class="btn btn-outline text-white" href="">查看完整內容</button>
            </div>
            <img src="*********/question_img/4028818a7554ab980175ad305a222bd8/img" width="100%" alt="">
          </div> --}}
        </div>
        <div class="carousel-arrows prev"></div>
        <div class="carousel-arrows next"></div>
      </div>  
    </section>
    @endif


    @if($interest_*********->first())
  <section class="section">
    <div class="section-header d-flex flex-row justify-content-between">
      <div class="d-flex flex-row align-items-center">
        <img class="section-icon mx-2" src="*********/images/section-icon-04.svg" alt="">
        <h2 class="section-title">您可能感興趣的投票</h2>
      </div>
      <button class="section-more d-none">
        READ MORE
        <i class="fas fa-chevron-circle-right text-yellow"></i>
      </button>
    </div>
    <div class="section-content position-relative">
      <div class="slider recommend-slider">
        @foreach ($interest_********* as $key => $value)
            <div class="slide-{{$key}} mx-2" onclick="javascript: location.href='{{url('/*********Result')}}/{{$value->question_seq}}';">
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
            <img src="*********/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
        <div class="slide-2 mx-2">
          <div>
            <img src="*********/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
        <div class="slide-3 mx-2">
          <div>
            <img src="*********/question_img/4028818a7554ab980175ad305a222bd8/img" width="100%" alt="">
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
<div class="modal fade" id="option-model-1" tabindex="-1" aria-labelledby="option-model-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p class="btn btn-theme gray-side bg-white gray-border d-block mx-auto my-3" style="width: fit-content;">
          {{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}
        </p>
        <form id="comment-option-1-form" class="d-flex flex-column align-items-center" method="post" action="{{url('/insert*********')}}/{{$question_id}}/{{$*********[0]['q_login']}}">
          {{ csrf_field() }}
          <input type="hidden" name="form_answer[{{$*********[0]['all'][0]->t1_topic01_seq}}][answer_1][t2_seq]" value="input_other_1/{{$*********[0]['all'][0]->t2_topic02_seq}}">
          <div class="option-img text-center" style="background-image: url('{{$*********[0]['all'][0]->t2_img}}');">
          </div>
          <span class="option-name my-3">{{$*********[0]['all'][0]->t2_name}}</span>
          <textarea class="my-3" name="form_answer[{{$*********[0]['all'][0]->t1_topic01_seq}}][answer_1][other]" id="comment-textarea" cols="30" rows="10" placeholder="留言支持你的選擇(必填)" required></textarea>
          <div class="my-3">
            <input class="btn btn-theme gray-side bg-yellow text-white" style="width: 110px;" type="submit" value="傳送">
            <button type="button" class="btn btn-theme gray-side bg-white gray-border" data-dismiss="modal">取消</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="option-model-2" tabindex="-1" aria-labelledby="option-model-2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p class="btn btn-theme gray-side bg-white gray-border d-block mx-auto my-3" style="width: fit-content;">
          {{str_replace('18禁', '', str_replace('PK', '', $*********[0]['q_title']))}}
        </p>
        <form id="comment-option-2-form" class="d-flex flex-column align-items-center" method="post" action="{{url('/insert*********')}}/{{$question_id}}/{{$*********[0]['q_login']}}">
          {{ csrf_field() }}
          <input type="hidden" name="form_answer[{{$*********[0]['all'][1]->t1_topic01_seq}}][answer_1][t2_seq]" value="input_other_1/{{$*********[0]['all'][1]->t2_topic02_seq}}">
          <div class="option-img text-center" style="background-image: url('{{$*********[0]['all'][1]->t2_img}}');">
          </div>
          <span class="option-name my-3">{{$*********[0]['all'][1]->t2_name}}</span>
          <textarea class="my-3" name="form_answer[{{$*********[0]['all'][1]->t1_topic01_seq}}][answer_1][other]" id="comment-textarea" cols="30" rows="10" placeholder="留言支持你的選擇(必填)" required></textarea>
          <div class="my-3">
            <input class="btn btn-theme gray-side bg-yellow text-white" style="width: 110px;" type="submit" value="傳送">
            <button type="button" class="btn btn-theme gray-side bg-white gray-border" data-dismiss="modal">取消</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- 置頂按鈕 --}}
{{-- <button style="cursor: pointer;" type="button" class="backToTop">
  <div class="d-flex flex-column">
  <i class="fas fa-chevron-up"></i>
  <span>TOP</span>
  </div>
</button> --}}
@endsection

@section('self_js')
<script>
  $('#option-1 a').on('click', function(e) {
    e.preventDefault()
    $(this).tab('show')
  })
  $('#option-2 a').on('click', function(e) {
    e.preventDefault()
    $(this).tab('show')
  })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

<script>
  // $('.comment-slider').slick({
  //   slidesToShow: 2,
  //   slidesToScroll: 2,
  //   // autoplay: true,
  //   dots: false,
  //   arrows: true,
  //   infinite: false,
  //   prevArrow: $('.comment-slider~.prev'),
  //   nextArrow: $('.comment-slider~.next'),
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
  $('.pk-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    prevArrow: $('.pk-slider~.prev'),
    nextArrow: $('.pk-slider~.next'),
  });
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

  // 限制文字數量
  $('div.recommend-slider p').ellipsis({
    row: 1,
  })
</script>
@if(strpos($*********[0]['q_title'], '18禁') !== false)
  <script>
    $(document).ready(function(){
      $('#rated-modal').modal('show');
    });
  </script>
@endif

<script>
  function ajax_comman_one(){
    var page = $('#*********1_page').val();
    var url = "{{url('/')}}" + "/ajax/comment/" + "{{$*********[0]['all'][0]->t1_topic01_seq}}" + "/" + "{{$*********[0]['all'][0]->t2_topic02_seq}}" + "/" + page;
    console.log(url);
    $('#*********1_page').val(parseInt(page)+1);
    $.get(url, function (data) {
      if (data.length == 0) {
        $('#more_comment_1').remove();
        $('#more_mobile_comment_1').remove();
        console.log('[]');
        return;
      }
      $('#more_comment_1').remove();
      $('#more_mobile_comment_1').remove();
      var more = "<div id='more_comment_1' class='comment mb-5 mx-2'>";
          more += "<a style='cursor: pointer; color: blue; text-align: center;' onclick='ajax_comman_one();'><div class='comment-body'>載入更多留言</div></a>";
          more += "</div>";
      var more_mobile = "<div id='more_mobile_comment_1' class='comment mb-5 mx-2'>";
          more_mobile += "<a style='cursor: pointer; color: blue; text-align: center;' onclick='ajax_comman_one();'><div class='comment-body'>載入更多留言</div></a>";
          more_mobile += "</div>";

      var comment = "";
      for(var i =0 ; i<data.length; i++ ){
        comment += "<div class='comment mb-5 mx-2'>";
        comment += "<div class='comment-info'>";
        comment += "<i class='fas fa-user-circle text-muted'></i>";
        comment += "</div>";
        comment += "<div class='comment-body'>"+data[i]['other']+"</div>";
        comment += "</div>";
      }
      $('#comments-container-1').append(comment+more);
      $('#hot1-sm').append(comment+more_mobile);
    });
  }

  function ajax_comman_two(){
    var page = $('#*********2_page').val();
    var url = "{{url('/')}}" + "/ajax/comment/" + "{{$*********[0]['all'][1]->t1_topic01_seq}}" + "/" + "{{$*********[0]['all'][1]->t2_topic02_seq}}" + "/" + page;
    console.log(url);
    $('#*********2_page').val(parseInt(page)+1);
    $.get(url, function (data) {
      if (data.length == 0) {
        $('#more_comment_2').remove();
        $('#more_mobile_comment_2').remove();
        console.log('[]');
        return;
      }
      $('#more_comment_2').remove();
      $('#more_mobile_comment_2').remove();

      var more = "<div id='more_comment_2' class='comment mb-5 mx-2'>";
          more += "<a style='cursor: pointer; color: blue; text-align: center;' onclick='ajax_comman_two();'><div class='comment-body'>載入更多留言</div></a>";
          more += "</div>";
      var more_mobile = "<div id='more_mobile_comment_2' class='comment mb-5 mx-2'>";
          more_mobile += "<a style='cursor: pointer; color: blue; text-align: center;' onclick='ajax_comman_two();'><div class='comment-body'>載入更多留言</div></a>";
          more_mobile += "</div>";

      var comment = "";
      for(var i =0 ; i<data.length; i++ ){
        comment += "<div class='comment mb-5 mx-2'>";
        comment += "<div class='comment-info'>";
        comment += "<i class='fas fa-user-circle text-muted'></i>";
        comment += "</div>";
        comment += "<div class='comment-body'>"+data[i]['other']+"</div>";
        comment += "</div>";
      }
      $('#comments-container-2').append(comment+more);
      $('#new1-sm').append(comment+more_mobile);
    });
  }
</script>
@endsection