@extends('layout.master')

@section('self_css')
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
  <div class="card mb-5">
    <div class="row no-gutters">
      <div class="col-12 col-lg">
        <img src="{{ asset('images/test-survey-01.jpg') }}" class="card-img" alt="...">
      </div>
      <div class="col-12 col-lg bg-yellow">
        <div class="card-body">
          <h3 class="card-title text-white">你認為導演魏斯·安德森的哪一部作品最好看呢？</h3>
          <p class="card-text">
            <small class="text-muted">調查期間：2020/01/01~2020/01/02</small>
          </p>
          <hr />
          <p class="card-text">《復仇者聯盟4：終局之戰》及《小丑》可說是2019最成功的英雄電影代表，但是不是覺得還意猶未盡...</p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-secondary py-5" id="survey">
    <!-- 文字 -->
    <div class="form-group">
      <label>2.您覺得《綜藝玩很大》需要停播嗎？</label>
      <div class="col-12 px-0 my-4 ml-0 ml-sm-3 row align-items-center">
        <div class="col-12 d-flex flex-column">
          <span>t netus et malesuada fames ac turpis egestas. Etiam matti</span>
          <div class="row align-items-center">
            <div class="col-12 col-sm-11 progress-container" data-vote="1111" data-percent="75">
              <div class="progress">
                <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 px-0 my-4 ml-0 ml-sm-3 row align-items-center">
        <div class="col-12 d-flex flex-column">
          <span>venenatis pharetra odio mollis. Cras id diam ut sem sollicitudin faucibus. Morbi id metus ullamcorper, convallis turpis a, iaculis purus. Morbi lobortis ante </span>
          <div class="row align-items-center">
            <div class="col-12 col-sm-11 progress-container" data-vote="1111" data-percent="75">
              <div class="progress">
                <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 px-0 my-4 ml-0 ml-sm-3 row align-items-center">
        <div class="col-12 d-flex flex-column">
          <span>t netus et malesuada fames ac turpis egestas. Etiam matti</span>
          <div class="row align-items-center">
            <div class="col-12 col-sm-11 progress-container" data-vote="1111" data-percent="75">
              <div class="progress">
                <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 圖片 -->
    <div class="form-group">
      <label>2.您覺得《綜藝玩很大》需要停播嗎？</label>
      <div class="col-12 my-4 px-0 row align-items-center justify-content-around">
        <div class="col-2 col-sm-2">
          <div class="option-img mx-auto" style="background-image: url('./images/test-survey-02.png');"></div>
        </div>
        <div class="col-7 col-sm-9 d-flex flex-column">
          <span>t netus et malesuada fames ac turpis egestas. Etiam matti</span>
          <div class="row align-items-center">
            <div class="col progress-container" data-vote="1111" data-percent="75">
              <div class="progress">
                <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 my-4 px-0 row align-items-center justify-content-around">
        <div class="col-2 col-sm-2">
          <div class="option-img mx-auto" style="background-image: url('./images/test-survey-02.png');"></div>
        </div>
        <div class="col-7 col-sm-9 d-flex flex-column">
          <span>t netus et malesuada fames ac turpis egestas. Etiam mattit netus et malesuada fames ac turpis egestas. Etiam mattit netus et malesuada fames ac turpis egestas. Etiam matti</span>
          <div class="row align-items-center">
            <div class="col progress-container" data-vote="1111" data-percent="75">
              <div class="progress">
                <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 my-4 px-0 row align-items-center justify-content-around">
        <div class="col-2 col-sm-2">
          <div class="option-img mx-auto" style="background-image: url('./images/test-survey-02.png');"></div>
        </div>
        <div class="col-7 col-sm-9 d-flex flex-column">
          <span>t net</span>
          <div class="row align-items-center">
            <div class="col progress-container" data-vote="1111" data-percent="75">
              <div class="progress">
                <div class="progress-bar bg-yellow" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="position-relative mx-auto prizeSection">
      <div class="position-absolute text-center">
        <img class="section-icon mx-2" src="{{ asset('images/section-icon-04.svg') }}" alt="">
        <span class="btn btn-theme bg-white orange-side text-light-red">
          得獎名單
        </span>
      </div>
      <p class="text-center">得獎者會依填寫問卷時給予的電子信箱寄送得獎通知</p>
      <div class="d-flex flex-column mx-5 prizeList">
        <div class="d-flex flex-column flex-sm-row">
          <p class="my-0 mr-3 prize text-light-red">頭獎</p>
          <p class="winners text-center mx-auto">
            <span>張x明</span>
          </p>
        </div>
        <div class="d-flex flex-column flex-sm-row">
          <p class="my-0 mr-3 prize text-light-red">二獎</p>
          <p class="winners text-center mx-auto">
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <br/>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
          </p>
        </div>
        <div class="d-flex flex-column flex-sm-row">
          <p class="my-0 mr-3 prize text-light-red text-center">三獎</p>
          <p class="winners text-center mx-auto">
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <br/>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <br/>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <br/>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <br/>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
            <span>張x明</span>
          </p>
        </div>
      </div>
    </div>
    <div class="text-center my-4">
      <button class="btn btn-theme bg-yellow gray-side text-white" style="min-width: 110px;" type="button">回首頁</button>
    </div>
  </div>
  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width="100%"></div>
</main>
@endsection

@section('self_js')
@endsection