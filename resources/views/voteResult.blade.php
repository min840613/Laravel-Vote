@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_mata')
  <meta property="article:section" content="NOWnews民調">
  <meta property="article:published_time" content="{{date(DATE_W3C, mktime(date('H', strtotime($voteResult[0]['q_start'])), date('i', strtotime($voteResult[0]['q_start'])), date('s', strtotime($voteResult[0]['q_start'])), date('m', strtotime($voteResult[0]['q_start'])), date('d', strtotime($voteResult[0]['q_start'])), date('Y', strtotime($voteResult[0]['q_start']))))}}">
  {{-- <meta property="article:modified_time" content="{{$voteResult[0]['q_modify_date']}}"> --}}
  <meta property="article:modified_time" content="{{date(DATE_W3C, mktime(date('H', strtotime($voteResult[0]['q_modify_date'])), date('i', strtotime($voteResult[0]['q_modify_date'])), date('s', strtotime($voteResult[0]['q_modify_date'])), date('m', strtotime($voteResult[0]['q_modify_date'])), date('d', strtotime($voteResult[0]['q_modify_date'])), date('Y', strtotime($voteResult[0]['q_modify_date']))))}}">
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
  #survey>.form-group {
    margin-bottom: 1rem;
  }

  #survey>.form-group>label,
  #survey>.form-group>p {
    font-size: 1.3rem;
    margin: 1.1rem 0;
    color: #000;
  }

  #survey>.form-action button {
    min-width: 120px;
  }

  #survey>.form-group {
    padding: 2rem 0;
  }

  #survey .invalid-field .invalid-feedback {
    display: block;
  }

  #survey label {
    font-size: 1.1rem;
    margin: 0.5rem 0;
  }

  .progress {
    height: 1.8rem;
    padding: 0.35rem;
    border-radius: 7.25rem;
    background: #fff;
    margin: 1.2rem 0;
    border: 1px solid #888;
    position: relative;
  }

  .progress-container::before {
    content: attr(data-percent) '%';
    display: block;
    position: absolute;
    right: 1.5rem;
    top: 0;
    bottom: 0;
    margin: auto;
    font-size: 1rem;
    line-height: 1.8rem;
    height: 1.8rem;
    z-index: 1;
    /* color: var(--yellow); */
  }

  .progress-container::after {
    /* content: attr(data-vote) '票'; */
    display: inline-block;
    position: absolute;
    right: 1.5rem;
    bottom: 0rem;
    font-size: 0.8rem;
  }

  .progress-bar {
    border-radius: 7.25rem;
  }

  .option-img {
    width: 5.5rem;
    height: 5.5rem;
    border-radius: 50%;
    overflow: hidden;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }

  .prizeSection {
    margin: 5rem 0;
    border: 2px dashed #aaa;
    border-radius: 15px;
    padding: 5rem;
    width: 80%;
  }

  .prizeSection>div.position-absolute {
    top: 0;
    left: 0;
    right: 0;
    margin: auto;
    transform: translateY(-50%);
  }

  .prizeList .prize {
    word-break: keep-all;
  }

  .prizeList .winners>span {
    margin-right: 1rem;
    word-break: keep-all;
  }

  @media screen and (max-width: 576px) {
    .prizeSection {
      padding: 5rem 1rem;
      width: 95%;
      margin: 3rem 0;
    }

    .option-img {
      width: 4.2rem;
      height: 4.2rem;
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
      "thumbnailUrl": "{{$voteResult[0]['q_img']}}",
      "url": "{{URL::current()}}",
      "mainEntityOfPage": "{{URL::current()}}",
      "headline": "{{str_replace('18禁', '', str_replace('PK', '', $voteResult[0]['q_title']))}} | 投票結果",
      "articleSection": "NOWnews民調",
      "datePublished": "{{date(DATE_W3C, mktime(date('H', strtotime($voteResult[0]['q_start'])), date('i', strtotime($voteResult[0]['q_start'])), date('s', strtotime($voteResult[0]['q_start'])), date('m', strtotime($voteResult[0]['q_start'])), date('d', strtotime($voteResult[0]['q_start'])), date('Y', strtotime($voteResult[0]['q_start']))))}}",
      "dateModified": "{{date(DATE_W3C, mktime(date('H', strtotime($voteResult[0]['q_modify_date'])), date('i', strtotime($voteResult[0]['q_modify_date'])), date('s', strtotime($voteResult[0]['q_modify_date'])), date('m', strtotime($voteResult[0]['q_modify_date'])), date('d', strtotime($voteResult[0]['q_modify_date'])), date('Y', strtotime($voteResult[0]['q_modify_date']))))}}",
      "keywords": "",
      "description": "{{$voteResult[0]['q_desc']}}",
      "image": {
        "@type": "ImageObject",
        "contentUrl": "{{$voteResult[0]['q_img']}}",
        "url": "{{$voteResult[0]['q_img']}}",
        "name": "{{str_replace('18禁', '', str_replace('PK', '', $voteResult[0]['q_title']))}}",
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
              {"@type":"ListItem","position":3,"name":"{{str_replace('18禁', '', str_replace('PK', '', $voteResult[0]['q_title']))}} | 投票結果","item":"{{URL::current()}}"}
          ]
      }
    </script>
@endsection

@section('main')

<main class="container">
  <div class="card mb-5" style='margin-bottom: 1.7rem!important;'>
    <div class="row no-gutters">
      <div class="col-12 col-lg">
        <img src="{{$voteResult[0]['q_img']}}" class="card-img" alt="...">
      </div>
      <div class="col-12 col-lg bg-yellow">
        <div class="card-body">
          <h3 class="card-title text-white">{{str_replace('18禁', '', str_replace('PK', '', $voteResult[0]['q_title']))}}</h3>
          <p class="card-text">
          <small class="text-muted">調查期間：{{$voteResult[0]['q_start']}}~{{$voteResult[0]['q_end']}}</small>
          </p>
          <hr />
          <p class="card-text" style='word-break: break-word;'>{{$voteResult[0]['q_desc']}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-secondary py-5" style='padding-top: 0rem!important;' id="survey">
    <!-- 文字 -->
    @foreach($voteResult as $key => $value)
      @if(strpos($value['t1_title'], '抽獎資訊填寫') !== false)
      @else
      <div class="form-group" style='padding-top: .4rem'>
        <label>{{$key+1}}.{{$value['t1_title']}}</label>
        @foreach($value['all'] as $k => $v)
          @if(!empty($v->t2_img))
            {{-- <div class="col-12 my-2  ml-3 row align-items-center">
              <div class="col-2 d-flex flex-column align-items-center">
                <div class="option-img" style="background-image: url('{{$v->t2_img}}');"></div>
                <span>{{$v->t2_name}}</span> --}}
                {{-- <div class="col-12 my-4 ml-3 row align-items-center justify-content-around">
                  <div class="col-12 col-sm-2"> --}}
                <div class="col-12 my-4 px-0 row align-items-center justify-content-around">
                  <div class="col-2 col-sm-2">
                    <div class="option-img mx-auto" style="background-image: url('{{$v->t2_img}}');"></div>          
              </div>
              {{-- <div class="col-8 progress-container" data-vote="{{$v->t2_count}}">
                <div class="progress">
                  <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['total_count'])*100)}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div> --}}
                {{-- <div class="col-12 col-sm-9 d-flex flex-column"> --}}
                  <div class="col-7 col-sm-9 d-flex flex-column">
                  <span>{{$v->t2_name}}</span>
                  <div class="row align-items-center">
                    {{-- <div class="col-9 col-sm-11 progress-container" data-vote="{{$v->t2_count}}"> --}}
                      @if($value['total_count'] == 0)
                        <div class="col progress-container" {{--data-vote="{{$v->t2_count}}"--}} data-percent="0">
                          <div class="progress">
                            <div class="progress-bar bg-yellow" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      @else
                        <div class="col progress-container" {{--data-vote="{{$v->t2_count}}"--}} data-percent="{{round(($v->t2_count/$value['total_count'])*100, 2)}}">
                          <div class="progress">
                            <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['total_count'])*100, 2)}}%" aria-valuenow="{{round(($v->t2_count/$value['total_count'])*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                      @endif
                    {{-- <div class="col progress-container" data-vote="{{$v->t2_count}}" data-percent="{{round(($v->t2_count/$value['total_count'])*100)}}">
                      <div class="progress">
                        <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['total_count'])*100)}}%" aria-valuenow="{{round(($v->t2_count/$value['total_count'])*100)}}" aria-valuemin="0" aria-valuemax="100"></div> --}}
                      </div>
                    </div>
                    {{-- <div class="col-1 text-yellow" style="font-size: 1.2rem;">{{round(($v->t2_count/$value['total_count'])*100)}}%</div> --}}
                </div>
              </div>
              {{-- <div class="col-1 text-yellow" style="font-size: 1.2rem;">{{round(($v->t2_count/$value['total_count'])*100)}}%</div> --}}
            </div>
          @else
            {{-- <div class="col-12 my-2 ml-3 row align-items-center">
              <div class="col-2">{{$v->t2_name}}</div>
              <div class="col-8 progress-container" data-vote="{{$v->t2_count}}">
                <div class="progress">
                  <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['total_count'])*100)}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div> --}}
            <div class="col-12 px-0 my-4 ml-0 ml-sm-3 row align-items-center">
              <div class="col-12 d-flex flex-column">
                <span>{{$v->t2_name}}</span>
                <div class="row align-items-center">
                  @if($value['total_count'] == 0)
                    <div class="col-12 col-sm-11 progress-container" {{--data-vote="{{$v->t2_count}}"--}} data-percent="0">
                      {{-- <div class="col-9 col-sm-11 progress-container" data-vote="{{$v->t2_count}}"> --}}
                        <div class="progress">
                          <div class="progress-bar bg-yellow" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  @else
                    <div class="col-12 col-sm-11 progress-container" {{--data-vote="{{$v->t2_count}}"--}} data-percent="{{round(($v->t2_count/$value['total_count'])*100, 2)}}">
                      {{-- <div class="col-9 col-sm-11 progress-container" data-vote="{{$v->t2_count}}"> --}}
                        <div class="progress">
                          <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['total_count'])*100, 2)}}%" aria-valuenow="{{round(($v->t2_count/$value['total_count'])*100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                  @endif
                  {{-- <div class="col-12 col-sm-11 progress-container" data-vote="{{$v->t2_count}}" data-percent="{{round(($v->t2_count/$value['total_count'])*100)}}">
                    <div class="progress">
                      <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['total_count'])*100)}}%" aria-valuenow="{{round(($v->t2_count/$value['total_count'])*100)}}" aria-valuemin="0" aria-valuemax="100"></div> --}}
                    </div>
                  </div>
                  {{-- <div class="col-1 text-yellow" style="font-size: 1.2rem;">{{round(($v->t2_count/$value['total_count'])*100)}}%</div> --}}
            
                </div>
              </div>
              {{-- <div class="col-1 text-yellow" style="font-size: 1.2rem;">{{round(($v->t2_count/$value['total_count'])*100)}}%</div> --}}
            </div>
          @endif
          
        @endforeach
      </div>
      @endif
    @endforeach
    {{-- <div class="form-group">
      <label>2.您覺得《綜藝玩很大》需要停播嗎？</label>
      <div class="col-12 my-2 ml-3 row align-items-center">
        <div class="col-2">要</div>
        <div class="col-8 progress-container" data-vote="1111">
          <div class="progress">
            <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-1 text-yellow" style="font-size: 1.2rem;">75%</div>
      </div>
      <div class="col-12 my-2 ml-3 row align-items-center">
        <div class="col-2">不要</div>
        <div class="col-8 progress-container" data-vote="261">
          <div class="progress">
            <div class="progress-bar bg-yellow" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-1">20%</div>
      </div>
      <div class="col-12 my-2 ml-3 row align-items-center">
        <div class="col-2">沒意見</div>
        <div class="col-8 progress-container" data-vote="71">
          <div class="progress">
            <div class="progress-bar bg-yellow" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-1">5%</div>
      </div>
    </div> --}}
    <!-- 圖片 -->
    {{-- <div class="form-group">
      <label>2.您覺得《綜藝玩很大》需要停播嗎？</label>
      <div class="col-12 my-2  ml-3 row align-items-center">
        <div class="col-2 d-flex flex-column align-items-center">
          <div class="option-img" style="background-image: url('./images/test-survey-02.png');"></div>
          <span>要</span>
        </div>
        <div class="col-8 progress-container" data-vote="1111">
          <div class="progress">
            <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-1 text-yellow" style="font-size: 1.2rem;">75%</div>
      </div>
      <div class="col-12 my-2 ml-3 row align-items-center">
        <div class="col-2 d-flex flex-column align-items-center">
          <div class="option-img" style="background-image: url('./images/test-survey-02.png');"></div>
          <span>要</span>
        </div>
        <div class="col-8 progress-container" data-vote="1111">
          <div class="progress">
            <div class="progress-bar bg-yellow" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-1 text-yellow" style="font-size: 1.2rem;">20%</div>
      </div>
      <div class="col-12 my-2 ml-3 row align-items-center">
        <div class="col-2 d-flex flex-column align-items-center">
          <div class="option-img" style="background-image: url('./images/test-survey-02.png');"></div>
          <span>要</span>
        </div>
        <div class="col-8 progress-container" data-vote="1111">
          <div class="progress">
            <div class="progress-bar bg-yellow" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-1 text-yellow" style="font-size: 1.2rem;">5%</div>
      </div>
    </div> --}}
    @if(!empty($voteResult[0]['q_gift'] && !empty($roster)))
      <div class="position-relative mx-auto prizeSection">
        <div class="position-absolute text-center">
          <img class="section-icon mx-2" src="https://prod-vote-image.nownews.com/images/section-icon-04.svg" alt="">
          <span class="btn btn-theme bg-white orange-side text-light-red">
            得獎名單
          </span>
        </div>
        <p class="text-center">得獎者會依填寫問卷時給予的電子信箱寄送得獎通知</p>
        <div class="d-flex flex-column mx-5 prizeList">
          {{-- <div class="d-flex flex-row">
            <p class="mr-3 prize">頭獎</p>
            <p class="winners">
              <span>張x明</span>
            </p>
          </div> --}}
          {{-- <div class="d-flex flex-row">
            <p class="mr-3 prize">二獎</p>
            <p class="winners">
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
            </p>
          </div> --}}
          {{-- <div class="d-flex flex-row">
            <p class="mr-3 prize text-light-red">{{$voteResult[0]['q_gift']}}</p>
            <p class="w-100 winners text-center"> --}}
          <div class="d-flex flex-column flex-sm-row">
            <p class="my-0 mr-3 prize text-light-red text-center">{{$voteResult[0]['q_gift']}}</p>
            <p class="winners text-center mx-auto">
      
            {{-- <p class="mr-3 prize text-light-red">{{$voteResult[0]['q_gift']}}</p>
            <p class="winners w-100 d-flex flex-row justify-content-center"> --}}
              @foreach ($roster as $key => $value)
                @if($key % 5 == 0 && $key !=0)
                  <br />
                @endif
                <span>{{$value}}</span>
              @endforeach
              {{-- <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span>
              <span>張x明</span> --}}
            </p>
          </div>
        </div>
      </div>
    @endif
    {{-- <div class="position-relative mx-auto prizeSection">
      <div class="position-absolute text-center">
        <img class="section-icon mx-2" src="{{ asset('images/section-icon-04.svg') }}" alt="">
        <span class="btn btn-theme bg-white orange-side text-light-red">
          得獎名單
        </span>
      </div>
      <p class="text-center">得獎者會依填寫問卷時給予的電子信箱寄送得獎通知</p>
      <div class="d-flex flex-column mx-5 prizeList">
        <div class="d-flex flex-row">
          <p class="mr-3 prize">頭獎</p>
          <p class="winners">
            <span>張x明</span>
          </p>
        </div>
        <div class="d-flex flex-row">
          <p class="mr-3 prize">二獎</p>
          <p class="winners">
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
          </p>
        </div>
        <div class="d-flex flex-row">
          <p class="mr-3 prize">三獎</p>
          <p class="winners">
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
          </p>
        </div>
      </div>
    </div> --}}
    <div class="text-center my-4">
      <button class="btn btn-theme bg-yellow gray-side text-white" style="min-width: 110px;" type="button" onclick="javascript: location.href = '{{url('/')}}'">回首頁</button>
    </div>
  </div>
<div class="fb-comments" data-href="{{url('/voteResult')}}/{{$question_id}}" data-numposts="5" data-width="100%"></div>

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
{{-- 首頁最上方輪播 --}}

<script>
  // 限制文字數量
  $('div.recommend-slider p').ellipsis({
    row: 1,
  })
  // $('div.card-body p.card-text').ellipsis({
  //   row: 4,
  // })
</script>

@if(strpos($voteResult[0]['q_title'], '18禁') !== false)
  <script>
    $(document).ready(function(){
      $('#rated-modal').modal('show');
    });
  </script>
@endif
@endsection