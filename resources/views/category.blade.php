@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)
@section('self_css')
<link rel="stylesheet" href="*********/css/index.css">
@endsection

@section('head_js')
  <!-- 麵包屑 -->
  
  @if($type_name == '搜尋')
    @if(isset($_GET['keyword']))
      <script type="application/ld+json">
        {   
          "@context":"http://schema.org",
            "@type":"BreadcrumbList",
            "itemListElement":[
                {"@type":"ListItem","position":1,"name":"*********民調","item":"https://*********.*********.com"},
                {"@type":"ListItem","position":2,"name":"{{$type_name}}:{{$_GET['keyword']}}","item":"{{URL::current()}}?keyword={{$_GET['keyword']}}"}
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
                {"@type":"ListItem","position":2,"name":"{{$type_name}}:","item":"{{URL::current()}}?keyword="}
            ]
        }
      </script>
    @endif
  @else
    <script type="application/ld+json">
      {   
        "@context":"http://schema.org",
          "@type":"BreadcrumbList",
          "itemListElement":[
              {"@type":"ListItem","position":1,"name":"*********民調","item":"https://*********.*********.com"},
              {"@type":"ListItem","position":2,"name":"{{$type_name}}","item":"{{URL::current()}}"}
          ]
      }
    </script>
  @endif
@endsection

@section('main')
  <main class="container">
    @if($type_name != '火熱投票中' && $type_name != '已結束投票')
      <div class="section-header d-flex flex-row justify-content-center" style='margin-top: 1rem;'>
        <div class="d-flex flex-row justify-content-center" style="width: 9rem; border-bottom: .3rem #FBC82B solid; padding-bottom: .3rem;">
          {{-- <img class="section-icon mx-2" src="{{ asset('images/section-icon-02.svg') }}" alt=""> --}}
          <h2 class="section-title">{{$type_name}}</h2>
        </div>
      </div>
      <div class="section-header d-flex flex-row justify-content-center" style='margin-top: .6rem;'>
        <div class="d-flex flex-row justify-content-center" style="width: 9rem; ">
          {{-- <img class="section-icon mx-2" src="{{ asset('images/section-icon-02.svg') }}" alt=""> --}}
          <h2 class="section-en-title">{{$type_code}}</h2>
        </div>
      </div>
      <div class="section-content"></div>
    @endif

    {{-- PK & 火熱投票 start --}}
    {{-- @if($type_name != '已結束投票') --}}
    @if($pk_*********)
      <section class="section" style="margin-top: 1.5rem;">
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
                              data-percent="0"
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
                    <div class="position-relative progress-container" data-percent="0" data-side="left">
                  @else
                    <div class="position-relative progress-container" data-percent="{{round(($value['all'][0]->t2_count/$value['total_count'])*100, 2)}}" data-side="left">
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
                    <div class="position-relative progress-container" data-percent="0" data-side="right">
                  @else
                    <div class="position-relative progress-container" data-percent="{{round(($value['all'][1]->t2_count/$value['total_count'])*100, 2)}}" data-side="right">
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

      @if($being_*********->first())
        <section class="section" style="margin-top: 1rem;">
          <div class="section-header d-flex flex-row justify-content-between">
            <div class="d-flex flex-row align-items-center">
              <img class="section-icon mx-2" src="*********/images/section-icon-02.svg" alt="">
              <h2 class="section-title">火熱投票中</h2>
            </div>
            {{-- <button class="section-more" onclick="javascript: document.location.href='{{url('/*********Type/being_*********')}}';">
              READ MORE
              <i class="fas fa-chevron-circle-right text-yellow"></i>
            </button> --}}
          </div>
          <div class="section-content">
            <!-- component start -->
            @foreach ($being_********* as $key => $value)
              <div class="card mb-5">
                {{-- @if(strpos($value->title, 'PK') !== false)
                  <div class="icon-category">
                    <img src="{{ asset('images/icon-category-01.svg') }}" alt="">
                  </div>
                @endif --}}
                <div class="row no-gutters">
                <div class="col-12 col-lg-5 bg-white card-img-bg" style="background-image: url('{{$value->img}}'); cursor: pointer;" onclick="javascript: location.href ='{{url('/')}}/*********/{{$value->question_seq}}'">
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
                      <h3 style="cursor: pointer;" class="card-title" onclick="javascript: location.href ='{{url('/')}}/*********/{{$value->question_seq}}'">{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h3>
                      <p style="cursor: pointer;" class="card-text" onclick="javascript: location.href ='{{url('/')}}/*********/{{$value->question_seq}}'">{{$value->desc_}}</p>
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
                          <button class="btn btn-theme bg-light-yellow text-white" onclick="javascript: location.href='{{url('/*********')}}/{{$value->question_seq}}';">
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
          </div>
        </section>
      @endif
    {{-- @endif --}}
    {{-- PK & 火熱投票 end --}}

    {{-- 已結束投票 start --}}
    @if($over_*********->first())
      <section class="section" style="margin-top: 1.5rem;">
        <div class="section-header d-flex flex-row justify-content-between">
          <div class="d-flex flex-row align-items-center">
            <img class="section-icon mx-2" src="*********/images/section-icon-03.svg" alt="">
            <h2 class="section-title">已結束</h2>
          </div>
          {{-- <button class="section-more" onclick="javascript: document.location.href='{{url('/*********Type/over_*********')}}';">
            READ MORE
            <i class="fas fa-chevron-circle-right text-yellow"></i>
          </button> --}}
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
              <div class="col-12 col-lg-5 bg-white card-img-bg" style="background-image: url('{{$value->img}}'); cursor: pointer;" onclick="javascript: location.href ='{{url('/')}}/*********Result/{{$value->question_seq}}'">
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
                    <h3 style="cursor: pointer;" class="card-title" onclick="javascript: location.href ='{{url('/')}}/*********Result/{{$value->question_seq}}'">{{str_replace('18禁', '', str_replace('PK', '', $value->title))}}</h3>
                    <p style="cursor: pointer;" class="card-text" onclick="javascript: location.href ='{{url('/')}}/*********Result/{{$value->question_seq}}'">{{$value->desc_}}</p>
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
        </div>
        {!! $over_*********->links('layout.pagination') !!}
      </section>
    @endif
    {{-- 已結束投票 end --}}
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
  // 限制文字數量
  $('div.recommend-slider p').ellipsis({
    row: 1,
  })
  $('div.card-body p.card-text').ellipsis({
    row: 3,
  })
</script>
@endsection