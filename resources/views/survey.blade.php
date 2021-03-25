@extends('layout.master')

@section('self_css')
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
@endsection

@section('main')
<main class="container">
  <div class="card mb-2">
    <div class="row no-gutters">
      <div class="col-12 col-lg">
        <img src="{{ asset('images/test-survey-01.jpg') }}" class="card-img" alt="...">
      </div>
      <div class="col-12 col-lg bg-yellow">
        <div class="card-body">
          <h3 class="card-title">你認為導演魏斯·安德森的哪一部作品最好看呢？</h3>
          <p class="card-text">
            <small class="text-muted">調查期間：2020/01/01~2020/01/02</small>
          </p>
          <hr />
          <p class="card-text">《復仇者聯盟4：終局之戰》及《小丑》可說是2019最成功的英雄電影代表，但是不是覺得還意猶未盡...</p>
        </div>
      </div>
    </div>
  </div>
  <form class="needs-validation text-secondary pb-5" id="survey-form" novalidate>
    <!-- 文字單選 -->
    <div class="form-group">
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
    </div>
    <!-- 圖片單選 -->
    <div class="form-group">
      <label class="col-form-label">1.您覺得《綜藝玩很大》需要停播嗎？</label>
      <span class="invalid-feedback">&nbsp;&nbsp;必填欄位</span>
      <div class="row justify-content-between">
        <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
          <label for="form-question-02-v-1">
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div>
            <input type="radio" id="form-question-02-v-1" name="form-question-02" class="custom-control-input" value="0" required>
            <label class="ml-3 custom-control-label" for="form-question-02-v-1">要</label>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
          <label for="form-question-02-v-2">
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div>
            <input type="radio" id="form-question-02-v-2" name="form-question-02" class="custom-control-input" value="0" required>
            <label class="ml-3 custom-control-label" for="form-question-02-v-2">不要</label>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 justify-content-center custom-control custom-radio">
          <label for="form-question-02-v-3">
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
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
    </div>
    <!-- 圖片多選 -->
    <div class="form-group custom-checkbox-group">
      <p>
        3.您覺得《綜藝玩很大》需要停播嗎？
        <span class="badge badge-warning">複選</span>
        <span class="invalid-feedback">&nbsp;&nbsp;至少填一欄位</span>
      </p>
      <div class="row justify-content-between">
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <label for="customCheck1">
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1">
            <label class="ml-0 ml-md-5 custom-control-label" for="customCheck1">選項一</label>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <label for="customCheck2">
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck2" name="customCheck2">
            <label class="ml-0 ml-md-5 custom-control-label" for="customCheck2">選項二</label>
          </div>
        </div>
        <div class="col-12 col-sm-5 col-md-4 justify-content-center custom-control custom-checkbox">
          <label for="customCheck3">
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" alt="" width="180">
          </label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck3" name="customCheck3">
            <label class="ml-0 ml-md-5 custom-control-label" for="customCheck3">選項三</label>
          </div>
        </div>
      </div>
    </div>
    <!-- 文字多選 -->
    <div class="form-group custom-checkbox-group">
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
    </div>
    <div class="form-group">
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
    </div>
    <div class="form-action my-5 row justify-content-center">
      <button class="btn btn-theme bg-yellow gray-side text-white mx-3" type="submit">送出</button>
      <button class="btn bg-light-gray btn-theme gray-side text-white clear-btn mx-3" type="button">重新填寫</button>
    </div>
  </form>
  <!-- fb social plugin -->
  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="100%"></div>
  <!-- 輪播 -->
  <section class="section">
    <div class="section-header d-flex flex-row justify-content-between">
      <div class="d-flex flex-row align-items-center">
        <img class="section-icon mx-2" src="{{ asset('images/section-icon-02.svg') }}" alt="">
        <h2 class="section-title">火熱投票中</h2>
      </div>
    </div>
    <div class="section-content position-relative">
      <div class="slider hot-slider">
        <div class="mx-3 slide-2 position-relative">
          <div class="bg-img d-none d-md-block" style="background-image: url(*********/question_img/4028818a7554ab980175ab2a4c397d5f/img);"></div>
          <div class="position-absolute mt-2 ml-2 slider-category">
            <img src="{{ asset('images/icon-category-01.svg') }}" alt="" width="100%">
          </div>
          <div class="carousel-mask">
            <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
          </div>
          <img class="d-inline-block d-md-none" src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" width="100%" alt="">
          <div class="bg-yellow py-2 px-3 carousel-body">
            <span>調查期間：2020/01/01~2020/01/02</span>
            <p>《我的婆婆怎麼那麼可愛》上周迎來完結篇，收視再創高峰 5.55，是公視開台至今......</p>
          </div>
        </div>
        <div class="mx-3 slide-3 position-relative">
          <div class="bg-img d-none d-md-block" style="background-image: url(*********/question_img/4028818a7554ab980175ab2a4c397d5f/img);"></div>
          <div class="position-absolute mt-2 ml-2 slider-category">
            <img src="{{ asset('images/icon-category-01.svg') }}" alt="" width="100%">
          </div>
          <div class="carousel-mask">
            <h2>你最喜歡Ralph Fiennes演過的哪個角色？</h2>
          </div>
          <img class="d-inline-block d-md-none" src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" width="100%" alt="">
          <div class="bg-yellow py-2 px-3 carousel-body">
            <span>調查期間：2020/01/01~2020/01/02</span>
            <p>《我的婆婆怎麼那麼可愛》上周迎來完結篇，收視再創高峰 5.55，是公視開台至今......</p>
          </div>
        </div>
      </div>
      <div class="carousel-arrows prev"></div>
      <div class="carousel-arrows next"></div>
  </section>
  <!-- 輪播 -->
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
        <div class="slide-1 mx-2">
          <div>
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
        <div class="slide-2 mx-2">
          <div>
            <img src="*********/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
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
        </div>
        <div class="slide-4 mx-2">
          <div>
            <img src="*********/question_img/4028818a7554ab980175ab2a4c397d5f/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
        <div class="slide-5 mx-2">
          <div>
            <img src="*********/question_img/4028818a7554ab980175ad35ba732c9a/img" width="100%" alt="">
          </div>
          <div class="bg-yellow py-2 px-3">
            <span class="badge bg-white text-yellow">電影娛樂</span>
            <p>《我的婆婆》剩下最後10集：觀眾猜不到的劇情</p>
          </div>
        </div>
      </div>
      <div class="carousel-arrows prev"></div>
      <div class="carousel-arrows next"></div>
    </div>
  </section>
</main>
@endsection

@section('self_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

<script>
  $('.hot-slider').slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    autoplaySpeed: 2000,
    dots: true,
    arrows: true,
    prevArrow: $('.hot-slider~.prev'),
    nextArrow: $('.hot-slider~.next'),
    responsive: [{
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }]
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
          if (form.checkValidity() === false && !handleCheckboxGroup()) {
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
    console.log('ggg')
    let valid = true;
    $('.custom-checkbox-group').each(function(index, elem) {
      let isChoose = false;
      $(elem).find('input[type=checkbox]').each(function(i, el) {
        if (el.checked) {
          isChoose = true;
        }
      })
      if (!isChoose) {
        $(elem).addClass('invalid-field')
        valid = false;
      } else {
        $(elem).removeClass('invalid-field')
      }
    })
    return valid
  }
</script>
@endsection