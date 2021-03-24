@extends('layout.master')

@section('self_css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
    color: var(--yellow);
  }

  .progress-container::after {
    content: attr(data-vote) '票';
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
@endsection

@section('main')

<main class="container">
  <div class="card mb-5" style='margin-bottom: 1.7rem!important;'>
    <div class="row no-gutters">
      <div class="col-12 col-lg">
        <img src="{{$voteResult['question']->img}}" class="card-img" alt="...">
      </div>
      <div class="col-12 col-lg bg-yellow">
        <div class="card-body">
          <h3 class="card-title text-white">{{str_replace('18禁', '', str_replace('PK', '', $voteResult['question']->title))}}</h3>
          <p class="card-text">
          <small class="text-muted">調查期間：{{$voteResult['question']->question_date_s}}~{{$voteResult['question']->question_date_e}}</small>
          </p>
          <hr />
          <p class="card-text" style='word-break: break-word;'>{{$voteResult['question']->desc_}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-secondary py-5" style='padding-top: 0rem!important;' id="survey">
    <!-- 文字 -->
    @foreach($voteResult['sub_question'] as $key => $value)
      @if(strpos($value['t1']->title, '個資') !== false)
      @else
      <div class="form-group" style='padding-top: .4rem'>
        <label>{{$key+1}}.{{$value['t1']->title}}</label>
        @foreach($value['t2'] as $k => $v)
          @if(!empty($v->img))
           
                <div class="col-12 my-4 px-0 row align-items-center justify-content-around">
                  <div class="col-2 col-sm-2">
                    <div class="option-img mx-auto" style="background-image: url('{{$v->img}}');"></div>          
              </div>
              
                  <div class="col-7 col-sm-9 d-flex flex-column">
                  <span>{{$v->name}}</span>
                  <div class="row align-items-center">
                    <div class="col progress-container" data-vote="{{$v->t2_count}}" data-percent="{{round(($v->t2_count/$value['t1']->t1_count)*100)}}">
                      <div class="progress">
                        <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['t1']->t1_count)*100)}}%" aria-valuenow="{{round(($v->t2_count/$value['t1']->t1_count)*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    
                </div>
              </div>
              
            </div>
          @else
            
            <div class="col-12 px-0 my-4 ml-0 ml-sm-3 row align-items-center">
              <div class="col-12 d-flex flex-column">
                <span>{{$v->name}}</span>
                <div class="row align-items-center">
                  <div class="col-12 col-sm-11 progress-container" data-vote="{{$v->t2_count}}" data-percent="{{round(($v->t2_count/$value['t1']->t1_count)*100)}}">
                  
                    <div class="progress">
                      <div class="progress-bar bg-yellow" role="progressbar" style="width: {{round(($v->t2_count/$value['t1']->t1_count)*100)}}%" aria-valuenow="{{round(($v->t2_count/$value['t1']->t1_count)*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  
            
                </div>
              </div>
              
            </div>
          @endif
          
        @endforeach
      </div>
      @endif
    @endforeach
    
    @if(!empty($voteResult['question']->gift && !empty($roster)))
      <div class="position-relative mx-auto prizeSection">
        <div class="position-absolute text-center">
          <img class="section-icon mx-2" src="{{ asset('images/section-icon-04.svg') }}" alt="">
          <span class="btn btn-theme bg-white orange-side text-light-red">
            得獎名單
          </span>
        </div>
        <p class="text-center">得獎者會依填寫問卷時給予的電子信箱寄送得獎通知</p>
        <div class="d-flex flex-column mx-5 prizeList">
          
          <div class="d-flex flex-row">
            <p class="mr-3 prize text-light-red">{{$voteResult['question']->gift}}</p>
            <p class="winners w-100 d-flex flex-row justify-content-center">
              @foreach ($roster as $value)
                <span>{{$value}}</span>
              @endforeach
              
            </p>
          </div>
        </div>
      </div>
    @endif
    
    <div class="text-center my-4">
      <button class="btn btn-theme bg-yellow gray-side text-white" style="min-width: 110px;" type="button" onclick="javascript: location.href = '{{url('/')}}'">回首頁</button>
    </div>
  </div>
<div class="fb-comments" data-href="{{url('/voteResult')}}/{{$voteResult['question']->question_seq}}" data-numposts="5" data-width="100%"></div>

  @if ($being_vote->first())
    <section class="section">
      <div class="position-relative">
        <div class="d-flex flex-row align-items-center" style='margin-bottom: 1.5rem;'>
          <img class="section-icon mx-2" src="{{ asset('images/section-icon-02.svg') }}" alt="">
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
        <img class="section-icon mx-2" src="{{ asset('images/section-icon-04.svg') }}" alt="">
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
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    prevArrow: $('.index-slider~.prev'),
    nextArrow: $('.index-slider~.next'),
  });
  $('.pk-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    prevArrow: $('.pk-slider~.prev'),
    nextArrow: $('.pk-slider~.next'),
  });
  $('.recommend-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplaySpeed: 2000,
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

@if(strpos($voteResult['question']->title, '18禁') !== false)
  <script>
    $(document).ready(function(){
      $('#rated-modal').modal('show');
    });
  </script>
@endif
@endsection