<style>
  .marquee {
    padding-left: 0rem;
    display: flex;
    flex-direction: row;
    width: 100%;
    align-items: stretch;
    position: fixed;
    background-color: #fff;
    overflow: hidden;
    box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
  }

  .marquee-title {
    position: relative;
    word-break: keep-all;
    padding: 0.5rem 1rem;
    background-color: var(--theme-color);
    line-height: 1.4rem;
  }

  .marquee-title::after {
    position: absolute;
    content: '';
    display: block;
    right: 0;
    top: 0;
    transform: translateX(100%);
    height: 1.2rem;
    border-top: 1.2rem solid transparent;
    border-left: 1.4rem solid var(--theme-color);
    border-bottom: 1.2rem solid transparent;
    border-right: 1.2rem solid transparent;
  }

  .swiper-container {
    width: 100%;
    height: 100%;
    max-height: 2rem;
  }

  .swiper-slide {
    text-align: left;
    font-size: 18px;
    background: #fff;
    display: flex;
    align-items: center;
  }

  @media screen and (max-width: 576px) {
    .swiper-container {
      max-height: 1rem;
    }

    .swiper-slide {
      font-size: 12px
    }

    .marquee-title {
      line-height: 18px;
      font-size: 12px;
      padding: 0 1rem;
    }

    .marquee-title::after {
      height: 0.6rem;
      border-top: 0.6rem solid transparent;
      border-left: 0.9rem solid var(--theme-color);
      border-bottom: 0.6rem solid transparent;
      border-right: 0.6rem solid transparent;
    }

  }
</style>
<header class="position-relative">
  <nav class="fixed-top navbar navbar-expand-sm bg-white navbar-light p-3 p-sm-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand my-0 d-none d-sm-flex align-items-center p-0 navbar-brand-lg" href="{{url('/')}}">
      <img src="*********/images/logo-brand-white.svg" width="110" height="110" class="d-none d-sm-inline-block align-top" alt="" loading="lazy" />
      <h2 class="ml-1">
        ********* 民調
      </h2>
    </a>
    <a class="navbar-brand my-0 d-flex d-sm-none align-items-center p-0 navbar-brand-sm" href="{{url('/')}}">
      <img src="*********/images/logo-brand-white.svg" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy" />
      <h2 class="ml-0 ml-xs-1 my-0">
        ********* 民調
      </h2>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="w-100 d-flex flex-column justify-content-between nav-menu-container">
        <div class="ml-auto mt-4 nav-padding-right flex-row align-items-center d-none d-sm-flex">
         
          {{-- @if(Session::has('email'))
            
              <span class="mr-4 d-none d-lg-block">{{Session::get('name')}}您好！</span>

              <a class="login-link" href="{{url('/register')}}">
                會員中心
              </a>
              <a style='margin-left: 1.5rem;' class="login-link" href="{{url('/logout')}}">登出</a>
            
          @else
            <a class="login-link" href="{{url('/login')}}">
              <i class="fas fa-user-circle"></i>
              登入會員
            </a>
          @endif --}}
          <form id="desktop_search" class="form-inline ml-4" method='get' action="{{url('/*********Type')}}/search">
            <button class="btn btn-sm btn-warning text-white rounded-circle search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
            <input class="form-control form-control-xs" type="search" name='keyword' placeholder="Search" aria-label="Search" />
          </form>
        </div>
        <ul class="navbar-nav ml-sm-auto pl-sm-5 nav-padding-right navbar-menu">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              全部話題
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('/*********Type/being_*********')}}">進行中投票</a>
              <a class="dropdown-item" href="{{url('/*********Type/over_*********')}}">已結束投票</a>
            </div>
          </li>
          @foreach ($nav as $key => $value)
            <li class="nav-item">
            <a class="nav-link" href="{{url('/*********Type')}}/{{$value->seq}}">{{$value->name}}</a>
          </li>
          @endforeach
          {{-- <li class="nav-item">
            <a class="nav-link" href="">生活</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">政治</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">電影娛樂</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">話題新聞</a>
          </li> --}}
          {{-- @if(Session::has('email'))
            <li class="nav-item d-block d-sm-none">
              <a class="nav-link" href="{{url('/register')}}">
                {{Session::get('name')}}您好！&nbsp;
                會員中心
              </a>
              <a class="nav-link" href="{{url('/logout')}}">登出</a>
            </li>
          @else
            <li class="nav-item d-block d-sm-none">
              <a class="nav-link" href="{{url('/login')}}">登入會員</a>
            </li>
          @endif --}}
          {{-- <li class="nav-item d-block d-sm-none">
            <a class="nav-link" href="{{url('/login')}}">登入會員</a>
          </li> --}}
          <li class="nav-item d-block d-sm-none" id='mobile_search'>
            <form class="form-inline row justify-content-center" method='get' action="{{url('/*********Type')}}/search">
              <input class="form-control form-control-sm col-7" name='keyword' type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-sm btn-warning col-3 navLink" type="submit">
                搜尋
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="slot"></div>
  <div class="container-fluid marquee d-none d-sm-flex">
    <div class="mr-3 text-white marquee-title">
      快訊
    </div>
    <div class="swiper-container  ml-4">
      <div class="swiper-wrapper">
        @foreach ($being_********* as $key => $value)
          @if($key == 0)
            <div class="swiper-slide d-flex flex-row">
          @else
            <div class="swiper-slide">
          @endif
          <div class="flex-grow-1" style="cursor: pointer;" onclick="javascript: location.href = '{{url('/*********')}}/{{$value->question_seq}}'">
          {{str_replace('18禁', '', str_replace('PK', '', $value->title))}}
          </div>
        </div>
        @endforeach
        {{-- <div class="swiper-slide d-flex flex-row">
          <div class="flex-grow-1">
            電影娛樂1
          </div>
          <div class="flex-grow-1">
            電影娛樂2
          </div>
        </div> --}}
        {{-- <div class="swiper-slide">
          <div class="flex-grow-1">
            Slide 3
          </div>
          <div class="flex-grow-1">
            Slide 4
          </div>
        </div> --}}
        {{-- <div class="swiper-slide">
          <div class="flex-grow-1">
            Slide 5
          </div>
          <div class="flex-grow-1">
            Slide 6
          </div>
        </div> --}}
        {{-- <div class="swiper-slide">
          <div class="flex-grow-1">
            Slide 7
          </div>
          <div class="flex-grow-1">
            Slide 8
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="container-fluid marquee d-flex d-sm-none">
    <div class="mr-3 text-white marquee-title">
      快訊
    </div>
    <div class="swiper-container  ml-4">
      <div class="swiper-wrapper">
        @foreach ($being_********* as $key => $value)
          @if($key == 0)
            <div class="swiper-slide d-flex flex-row">
          @else
            <div class="swiper-slide">
          @endif
          <div class="flex-grow-1" style="cursor: pointer;" onclick="javascript: location.href = '{{url('/*********')}}/{{$value->question_seq}}'">
          {{str_replace('18禁', '', str_replace('PK', '', $value->title))}}
          </div>
        </div>
        @endforeach
        {{-- <div class="swiper-slide d-flex flex-row">
          <div class="flex-grow-1">
            電影娛樂1
          </div>
        </div>
        <div class="swiper-slide">
          <div class="flex-grow-1">
            Slide 2
          </div>
        </div>
        <div class="swiper-slide">
          <div class="flex-grow-1">
            Slide 3
          </div>
        </div>
        <div class="swiper-slide">
          <div class="flex-grow-1">
            Slide 4
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</header>

@if(Session::has('email'))
  <script>
    $(document).ready(function(){
      var desktop_login = '';
      var mobile_login = '';

      desktop_login += "<span class='mr-4 d-none d-lg-block'>{{Session::get('name')}}您好！</span>";
      desktop_login += "<a class='login-link' href='{{url('/register')}}'>";
      desktop_login += "會員中心</a>";
      desktop_login += "<a style='margin-left: 1.5rem;' class='login-link' href='{{url('/logout')}}'>登出</a>";

      mobile_login += "<li class='nav-item d-block d-sm-none'>";
      mobile_login += "<a class='nav-link' href='{{url('/register')}}'>";
      mobile_login += "{{Session::get('name')}}您好！&nbsp 會員中心";
      mobile_login += "</a>";
      mobile_login += "<a class='nav-link' href='{{url('/logout')}}'>登出</a>";
      mobile_login += "</li>";

      $('#desktop_search').before(desktop_login);
      $('#mobile_search').before(mobile_login);
    });
  </script>
@else
  <script>
    $(document).ready(function(){
      var desktop_login = '';
      var mobile_login = '';

      desktop_login += "<a class='login-link' href='{{url('/login')}}'>";
      desktop_login += "<i class='fas fa-user-circle'>登入會員</i>"
      desktop_login += "</a>";

      mobile_login += "<li class='nav-item d-block d-sm-none'>";
      mobile_login += "<a class='nav-link' href='{{url('/login')}}'>登入會員</a>";
      mobile_login += "</li>";

      $('#desktop_search').before(desktop_login);
      $('#mobile_search').before(mobile_login);
    });
  </script>
@endif

<script>
  const swiper = new Swiper('.swiper-container', {
    direction: 'vertical',
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
</script>