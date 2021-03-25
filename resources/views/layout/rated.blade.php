{{-- @extends('layout.master')

@section('self_css')
@endsection

@section('main') --}}
<main class="container" style='display: none;' id='age_18'>
    <div class="row gray-border pb-5">
      <p class="col-12 bg-yellow warning-text">
        <i class="fas fa-exclamation-triangle text-white"></i>
        警告： 未滿十八歲不得觀賞瀏覽
      </p>
      <div class="col-12 col-md-4 align-self-center text-center warning-img">
        <img src="*********/images/rate-warning.png" alt="" width="100%">
      </div>
      <div class="col-12 col-md-8 align-self-center">
        <div>
          <p class="warning-text">
            您是否已年滿
            <span class="stroke-double" data-content="18">18</span>
            歲？
          </p>
        </div>
        <div class="action text-center">
          <button class="btn btn-warning text-white warning-btn" id='' onclick="confirm_18(this, 'yes');">是</button>
          <input type="hidden" id='confirm_18_url' value=''>
          <button class="btn btn-secondary warning-btn" id='' onclick="confirm_18(this, 'no');">否</button>
        </div>
      </div>
    </div>
  </main>
{{-- @endsection

@section('self_js')
@endsection --}}