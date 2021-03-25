@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_css')
<link rel="stylesheet" href="*********/css/index.css">
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
@endsection

@section('head_js')
  <!-- 結構化語意 -->
  <script type="application/ld+json">
    [
      {
        "@context": "http://www.schema.org",
        "@type": "Organization",
        "name": "*********今日新聞",
        "url": "*********",
        "logo": "*********/icon/icon-512x512.png",
        "description": "體察生活大小事，全民意見報你知！各式議題的民意調查，客觀呈現不同聲音與想法，蒐羅所有時下趨勢的意見報告，盡在NOW民調。",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "台北市內湖區瑞湖街160號3樓",
          "addressLocality": "Taipei",
          "addressRegion": "Taipei",
          "postalCode": "114",
          "addressCountry": "Taiwan"
        },
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "+886287978775",
          "contactType": "customer service"
        }
      },
      {
        "@context": "http://schema.org",
        "@type": "WebSite",
        "name": "*********民調",
        "url": "https://*********.*********.com",
        "alternateName": "*********民調"
      }
    ]
  </script>
@endsection
@section('main')
<main class="container">
    @if ($being_*********->first())
      <div class="position-relative">
        <div class="slider index-slider">
          @foreach ($being_********* as $key => $value)
            <div class="slide-{{$key}} position-relative">
              <div class="carousel-mask">
                <h2>{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h2>
                <span>火熱投票中</span>
                <button class="btn btn-outline text-white" style="font-weight: bold;" onclick="jvascript: document.location.href='{{url('/*********')}}/{{$value->question_seq}}'">查看完整內容</button>
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
    @endif
  
@if($pk_*********)
  <section class="section">
    <div class="section-header d-flex flex-row justify-content-between">
      <div class="d-flex flex-row align-items-center">
        <img class="section-icon mx-2" data-icon="pk" src="*********/images/section-icon-01.svg" alt="">
        <h2 class="section-title">PK擂台</h2>
      </div>
      <button class="section-more d-none">
        READ MORE
        <i class="fas fa-chevron-circle-right text-yellow"></i>
      </button>
    </div>
    <div class="section-content position-relative">
      <div class="slider pk-slider">
        @foreach($pk_********* as $key => $value)
          <div style="cursor: pointer;" class="slide-{{$key}} position-relative" onclick="javascript: location.href = '{{url('/')}}/*********/{{$value['q_question_seq']}}'">
            <div class="btn btn-theme bg-classic mx-auto mb-3">
              {{str_replace('18禁', '', str_replace('PK', '', $value['q_title']))}}
            </div>
            <div class="d-none d-sm-block">
            <div class="carousel-pk-img row">
              <img src="*********/images/vsb.svg" alt="" class="icon-background">
              <img src="*********/images/vs.svg" alt="" class="icon-vs">
              <!-- 選項一圖片 -->
              <img class="col-6" src="{{$value['all'][0]->t2_img}}" width="100%" alt="">
              <!-- 選項二圖片 -->
              <img class="col-6" src="{{$value['all'][1]->t2_img}}" width="100%" alt="">
            </div>
            <div class="row pk-options">
              <!-- 選項一 -->
              <div class="bg-yellow pb-3 col-6 d-flex flex-column justify-content-between">
                <div class="d-flex flex-row mt-1 mx-3 carousel-pk-title">
                  <p class="mx-3 my-0">{{$value['all'][0]->t2_name}}</p>
                </div>
                <div class="d-flex flex-row px-1 align-items-center">
                  @if($value['total_count'] == 0)
                    <div class="progress-container col-12" data-side="left" data-percent="0">
                  @else
                    <div class="progress-container col-12" data-side="left" data-percent="{{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}">
                  @endif
                    <div class="progress w-100 mx-1">
                      @if($value['total_count'] == 0)
                        <div
                          class="progress-bar bg-red"
                          role="progressbar"
                          style="width: 0%"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      @else
                        <div
                          class="progress-bar bg-red"
                          role="progressbar"
                          style="width: {{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}%"
                          aria-valuenow="{{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      @endif
                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- 選項二 -->
              <div class="bg-orange pb-3 col-6 d-flex flex-column justify-content-between">
                <div class="d-flex flex-row-reverse mt-1 mx-3 carousel-pk-title">
                  <p class="mx-3 my-0">{{$value['all'][1]->t2_name}}</p>
                </div>
                <div class="d-flex flex-row px-1 align-items-center">
                  @if($value['total_count'] == 0)
                    <div class="progress-container col-12" data-side="right" data-percent="0">
                  @else
                    <div class="progress-container col-12" data-side="right" data-percent="{{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}">
                  @endif
                  
                    <div class="progress w-100 mx-1" style="transform: rotateY(180deg);">
                      @if($value['total_count'] == 0)
                        <div
                          class="progress-bar bg-blue"
                          role="progressbar"
                          style="width: 0%"
                          aria-valuenow="0"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      @else
                        <div
                          class="progress-bar bg-blue"
                          role="progressbar"
                          style="width: {{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}%"
                          aria-valuenow="{{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      @endif
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-block d-sm-none pk-device-small">
            <!-- 選項一 -->
            <div class="bg-yellow pb-3 flex-grow-1">
              <div class="d-flex flex-row my-3 carousel-pk-title">
                <p class="mx-3 my-0">{{$value['all'][0]->t2_name}}</p>
              </div>
              @if($value['total_count'] == 0)
                <div class="position-relative progress-container"
                data-percent="0"
                data-side="left">
              @else
                <div class="position-relative progress-container"
                data-percent="{{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}"
                data-side="left">
              @endif
              
                <div class="progress mx-3">
                  @if($value['total_count'] == 0)
                    <div class="progress-bar bg-red" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  @else
                    <div class="progress-bar bg-red" role="progressbar" style="width: {{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}%" aria-valuenow="{{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                  @endif
                </div>
              </div>
            </div>
            <div class="carousel-pk-img d-flex flex-column">
              <img src="*********/images/vsb.svg" alt="" class="icon-background">
              <img src="*********/images/vs.svg" alt="" class="icon-vs">
              <!-- 選項一圖片 -->
              <img class="flex-grow-1" src="{{$value['all'][0]->t2_img}}" width="100%" alt="">
              <!-- 選項二圖片 -->
              <img class="flex-grow-1" src="{{$value['all'][1]->t2_img}}" width="100%" alt="">
            </div>
            <!-- 選項二 -->
            <div class="bg-orange pb-3 flex-grow-1">
              <div class="d-flex flex-row my-3 carousel-pk-title">
                <p class="mx-3 my-0">{{$value['all'][1]->t2_name}}</p>
              </div>
              @if($value['total_count'] == 0)
                <div class="position-relative progress-container" data-side="right"
                data-percent="0">
              @else
                <div class="position-relative progress-container" data-side="right"
                data-percent="{{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}">
              @endif
              
                {{-- <div class="progress mx-3" style="transform: rotateY(180deg);"> --}}
                  <div class="progress mx-3" style="transform: rotateY(180deg);">
                  @if($value['total_count'] == 0)
                    <div class="progress-bar bg-blue" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  @else
                    <div class="progress-bar bg-blue" role="progressbar" style="width: {{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}%" aria-valuenow="{{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                  @endif
                  
                </div>
              </div>
            </div>
          </div>
          <div class="text-center text-secondary mt-3">
            <small class="text-mute">調查期間 | {{$value['q_start']}}-{{$value['q_end']}}</small>
            {{-- <br>
            <small class="text-muted">{{$value['total_count'] + $value['q_weights']}}人參加投票</small> --}}
          </div>
        </div>
        @endforeach
      </div>
      <div class="carousel-arrows prev"></div>
      <div class="carousel-arrows next"></div>
    </div>
  </section>
@endif
<!-- /5799246/*********_*********_970x90_T -->
<div id='div-gpt-ad-1608191438549-0' class="ad ad-top">
  <script>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1608191438549-0'); });
  </script>
</div>
  @if($limit_being_*********->first())
    <section class="section">
      <div class="section-header d-flex flex-row justify-content-between">
        <div class="d-flex flex-row align-items-center">
          <img class="section-icon mx-2" src="*********/images/section-icon-02.svg" alt="">
          <h2 class="section-title">火熱投票中</h2>
        </div>
        <button class="section-more" onclick="javascript: document.location.href='{{url('/*********Type/being_*********')}}';">
          READ MORE
          <i class="fas fa-chevron-circle-right text-yellow"></i>
        </button>
      </div>
      <div class="section-content">
        <!-- component start -->
        @foreach ($limit_being_********* as $key => $value)
          <div class="card mb-5">
            {{-- @if(strpos($value->title, 'PK') !== false)
              <div class="icon-category">
                <img src="{{ asset('images/icon-category-01.svg') }}" alt="">
              </div>
            @endif --}}
            <div class="row no-gutters">
            <div class="col-12 col-lg-5 bg-white card-img-bg" style="background-image: url('{{$value->img}}'); cursor:pointer;" onclick="javascript: location.href ='{{url('/')}}/*********/{{$value->question_seq}}'">
              </div>
              <div class="col-12 col-lg-7 bg-wheat">
                <div class="card-body">
                  <div class="card-text">
                    <div class="section-header d-flex flex-row justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <span class="bg-green text-white d-inline-block px-2">{{$value->type_name}}</span>
                      </div>
                    {{-- <div class="align-self-start align-self-sm-center mb-sm-0 mb-2"> --}}
                      {{-- <a href="">
                        <img src="{{ asset('images/card-sns-01.svg') }}" alt="">
                      </a> --}}
                        <div>
                          <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/*********')}}/{{$value->question_seq}}" target="_blank">
                            <img src="*********/images/card-sns-02.svg" alt="">
                          </a>
                          {{-- <a href="http://line.naver.jp/R/msg/text/?{{str_replace('18禁', '', str_replace('PK', '', $value->title))}} {{url('/*********')}}/{{$value->question_seq}}" target="_blank">
                            <img src="*********/images/card-sns-03.svg" alt="">
                          </a> --}}
                          <a href="https://social-plugins.line.me/lineit/share?url={{url('/*********')}}/{{$value->question_seq}}" target="_blank">
                            <img src="*********/images/card-sns-03.svg" alt="">
                          </a>
                        </div>
                    {{-- </div> --}}
                    </div>
                  </div>
                  <p class="card-text">
                    <small class="text-muted">調查期間：{{date('Y/m/d', strtotime($value->question_date_s))}}~{{date('Y/m/d', strtotime($value->question_date_e))}}</small>
                    {{-- <small class="text-muted">{{$value->count + $value->weights}}人參加投票</small> --}}
                  </p>
                  <h3 style="cursor:pointer;" class="card-title" onclick="javascript: location.href ='{{url('/')}}/*********/{{$value->question_seq}}'">{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h3>
                  <p style="cursor:pointer;" class="card-text" onclick="javascript: location.href ='{{url('/')}}/*********/{{$value->question_seq}}'">{{$value->desc_}}</p>
                  @if(!empty($value->gift))
                    <div class="card-text d-flex flex-row align-items-center">
                      <div class="icon-circle bg-light-yellow text-white">
                        <i class="fas fa-gift"></i>
                      </div>
                      <p class="my-0 pl-3">
                          抽獎獎品 / {{$value->gift}}
                      </p>
                    </div>
                  {{-- @else --}}
                    {{-- <div class="card-text d-flex flex-row align-items-center">
                      <div class="icon-circle bg-wheat text-white">
                      </div>
                      <p class="my-0 pl-3">
                          {{$value->gift}}
                      </p>
                    </div> --}}
                  @endif
                  <div class="card-text my-3 d-flex flex-column flex-sm-row justify-content-end align-items-center">
                    {{-- <div class="align-self-start align-self-sm-center mb-sm-0 mb-2">
                    </div> --}}
                    <div>
                      <button class="btn btn-theme bg-light-yellow text-white" onclick="jvascript: document.location.href='{{url('/*********')}}/{{$value->question_seq}}'">
                        <span>前往投票</span>
                        <i class="fas fa-caret-right"></i>
                      </button>
                      <button class="btn btn-theme bg-orange text-white" onclick="javascript: location.href='{{url('/*********Result')}}/{{$value->question_seq}}';">
                        <span>觀看結果</span>
                        <i class="fas fa-caret-right"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        
        <!-- component end -->

        {{-- <div class="card mb-5">
          <div class="row no-gutters">
            <div class="col-12 col-lg-5 bg-white card-img-bg" style="background-image: url(*********/question_img/4028818a7554ab980175b19b8cc474da/img);">
            </div>
            <div class="col-12 col-lg-7 bg-wheat">
              <div class="card-body">
                <div class="card-text">
                  <span class="bg-green text-white d-inline-block px-2">電影娛樂</span>
                </div>
                <p class="card-text">
                  <small class="text-muted">調查期間：2020/01/01~2020/01/02</small>
                  <small class="text-muted">3000人參加投票</small>
                </p>
                <h3 class="card-title">你認為導演魏斯·安德森的哪一部作品最好看呢？</h3>
                <p class="card-text">《復仇者聯盟4：終局之戰》及《小丑》可說是2019最成功的英雄電影代表，但是不是覺得還意猶未盡...</p>
                <div class="card-text d-flex flex-row align-items-center">
                  <div class="icon-circle bg-light-yellow text-white">
                    <i class="fas fa-gift"></i>
                  </div>
                  <p class="my-0 pl-3">抽獎獎品 / 7-11禮卷</p>
                </div>
                <div class="card-text my-3 d-flex flex-column flex-sm-row justify-content-between align-items-center">
                  <div class="align-self-start align-self-sm-center mb-sm-0 mb-2">
                    <a href="">
                      <img src="{{ asset('images/card-sns-01.svg') }}" alt="">
                    </a>
                    <a href="">
                      <img src="{{ asset('images/card-sns-02.svg') }}" alt="">
                    </a>
                    <a href="">
                      <img src="{{ asset('images/card-sns-03.svg') }}" alt="">
                    </a>
                  </div>
                  <div>
                    <button class="btn btn-theme bg-light-yellow text-white">
                      <span>前往投票</span>
                      <i class="fas fa-caret-right"></i>
                    </button>
                    <button class="btn btn-theme bg-orange text-white">
                      <span>觀看結果</span>
                      <i class="fas fa-caret-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </section>
  @endif

@if($over_*********->first())
  <section class="section">
    <div class="section-header d-flex flex-row justify-content-between">
      <div class="d-flex flex-row align-items-center">
        <img class="section-icon mx-2" src="*********/images/section-icon-03.svg" alt="">
        <h2 class="section-title">已結束</h2>
      </div>
      <button class="section-more" onclick="javascript: document.location.href='{{url('/*********Type/over_*********')}}';">
        READ MORE
        <i class="fas fa-chevron-circle-right text-yellow"></i>
      </button>
    </div>
    <div class="section-content">
      <!-- component start -->
      @foreach ($over_********* as $key => $value)
        <div class="card mb-5">
          <div class="icon-category">
            @if(strpos($value->title, 'PK') !== false)
              <img src="*********/images/icon-category-01.svg" alt="">
            @else
              <img src="*********/images/icon-category-02.svg" alt="">
            @endif
          </div>
          <div class="row no-gutters">
          <div class="col-12 col-lg-5 bg-white card-img-bg" style="background-image: url('{{$value->img}}'); cursor:pointer;" onclick="javascript: location.href ='{{url('/')}}/*********Result/{{$value->question_seq}}'">
            </div>
            <div class="col-12 col-lg-7 bg-wheat">
              <div class="card-body">
                <div class="card-text">
                  <div class="section-header d-flex flex-row justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <span class="bg-green text-white d-inline-block px-2">{{$value->type_name}}</span>
                    </div>
                  {{-- <div class="align-self-start align-self-sm-center mb-sm-0 mb-2"> --}}
                    {{-- <a href="">
                      <img src="{{ asset('images/card-sns-01.svg') }}" alt="">
                    </a> --}}
                      <div>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url('/*********Result')}}/{{$value->question_seq}}" target="_blank">
                          <img src="*********/images/card-sns-02.svg" alt="">
                        </a>
                        {{-- <a href="http://line.naver.jp/R/msg/text/?{{str_replace('18禁', '', str_replace('PK', '', $value->title))}} {{url('/*********Result')}}/{{$value->question_seq}}" target="_blank">
                          <img src="*********/images/card-sns-03.svg" alt="">
                        </a> --}}
                        <a href="https://social-plugins.line.me/lineit/share?url={{url('/*********Result')}}/{{$value->question_seq}}" target="_blank">
                          <img src="*********/images/card-sns-03.svg" alt="">
                        </a>
                      </div>
                  {{-- </div> --}}
                  </div>
                </div>
                <p class="card-text">
                  <small class="text-muted">調查期間：{{date('Y/m/d', strtotime($value->question_date_s))}}~{{date('Y/m/d', strtotime($value->question_date_e))}}</small>
                  {{-- <small class="text-muted">{{$value->count + $value->weights}}人參加投票</small> --}}
                </p>
                <h3 style="cursor:pointer;" class="card-title" onclick="javascript: location.href ='{{url('/')}}/*********Result/{{$value->question_seq}}'">{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h3>
                <p style="cursor:pointer;" class="card-text" onclick="javascript: location.href ='{{url('/')}}/*********Result/{{$value->question_seq}}'">{{$value->desc_}}</p>
                @if(!empty($value->gift))
                  <div class="card-text d-flex flex-row align-items-center">
                    <div class="icon-circle bg-light-yellow text-white">
                      <i class="fas fa-gift"></i>
                    </div>
                    <p class="my-0 pl-3">
                        抽獎獎品 / {{$value->gift}}
                    </p>
                  </div>
                {{-- @else
                  <div class="card-text d-flex flex-row align-items-center">
                    <div class="icon-circle bg-wheat text-white">
                    </div>
                    <p class="my-0 pl-3">
                        {{$value->gift}}
                    </p>
                  </div> --}}
                @endif
                <div class="card-text my-3 d-flex flex-column flex-sm-row justify-content-end align-items-center">
                  
                  <div>
                    <button class="btn btn-theme bg-light-yellow text-white" onclick="javascript: location.href='{{url('/*********Result')}}/{{$value->question_seq}}';">
                      <span>觀看結果</span>
                      <i class="fas fa-caret-right"></i>
                    </button>
                    @if(!empty($value->analysis_url))
                      <button class="btn btn-theme bg-orange text-white" onclick="window.open('{{$value->analysis_url}}', '_blank')">
                        <span>報導分析</span>
                        <i class="fas fa-caret-right"></i>
                      </button>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      
      <!-- component end -->
      {{-- <div class="card mb-5">
        <div class="icon-category">
          <img src="{{ asset('images/icon-category-02.svg') }}" alt="">
        </div>
        <div class="row no-gutters">
          <div class="col-12 col-lg-5 bg-white card-img-bg" style="background-image: url(*********/question_img/4028818a7554ab980175ad35ba732c9a/img);">
          </div>
          <div class="col-12 col-lg-7 bg-wheat">
            <div class="card-body">
              <div class="card-text">
                <span class="bg-green text-white d-inline-block px-2">電影娛樂</span>
              </div>
              <p class="card-text">
                <small class="text-muted">調查期間：2020/01/01~2020/01/02</small>
                <small class="text-muted">3000人參加投票</small>
              </p>
              <h3 class="card-title">你認為導演魏斯·安德森的哪一部作品最好看呢？</h3>
              <p class="card-text">《復仇者聯盟4：終局之戰》及《小丑》可說是2019最成功的英雄電影代表，但是不是覺得還意猶未盡...</p>
              <div class="card-text d-flex flex-row align-items-center">
                <div class="icon-circle bg-light-yellow text-white">
                  <i class="fas fa-gift"></i>
                </div>
                <p class="my-0 pl-3">抽獎獎品 / 7-11禮卷</p>
              </div>
              <div class="card-text my-3 d-flex flex-column flex-sm-row justify-content-between align-items-center">
                <div class="align-self-start align-self-sm-center mb-sm-0 mb-2">
                  <a href="">
                    <img src="{{ asset('images/card-sns-01.svg') }}" alt="">
                  </a>
                  <a href="">
                    <img src="{{ asset('images/card-sns-02.svg') }}" alt="">
                  </a>
                  <a href="">
                    <img src="{{ asset('images/card-sns-03.svg') }}" alt="">
                  </a>
                </div>
                <div>
                <button class="btn btn-theme bg-light-yellow text-white"  data-toggle="modal" data-target="#rated-modal">
                    <span>觀看結果</span>
                    <i class="fas fa-caret-right"></i>
                  </button>
                  <button class="btn btn-theme bg-orange text-white">
                    <span>報導分析</span>
                    <i class="fas fa-caret-right"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
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

@endsection

@section('self_js')
{{-- 引入首頁上方輪播需要的js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
{{-- 引入首頁上方輪播需要的js --}}

{{-- 首頁最上方輪播 --}}
<script>
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
</script>
{{-- 首頁最上方輪播 --}}
<script>
  $(document).ready(function(){
      $('#btn_top_going').remove();
      // 限制文字數量
      $('div.recommend-slider p').ellipsis({
        row: 1,
      })
      $('div.card-body p.card-text').ellipsis({
        row: 3,
      })
  });
          
  </script>
<script>
  // 限制文字數量
  // $('div.recommend-slider p').ellipsis({
  //   row: 1,
  // })
  // $('div.card-body p.card-text').ellipsis({
  //   row: 3,
  // })
</script>
@endsection