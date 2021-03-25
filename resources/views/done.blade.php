@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_css')
@endsection

@section('main')
<main class="container">
    <div class="page-icon">
      <i class="fas fa-check"></i>
    </div>
    <h2 class="text-center page-title">
      恭喜您！完成本問卷
    </h2>
    <p class="text-center page-subtitle">
      現在就加入會員參加抽獎，
      <br/>
      如未註冊會員將視同放棄本次參加抽獎的機會。
    </p>
    <div class="d-flex justify-content-center my-5">
      <button id='btn_register' style='display: none;' class="btn btn-theme bg-yellow gray-side text-white"  onclick="javascript: location.href='{{url('/register')}}';">註冊會員</button>
      <button id='btn_result' class="btn btn-theme bg-orange gray-side text-white"  onclick="javascript: location.href='{{url('/*********Result')}}/{{$id}}';">看即時結果</button>
    </div>
  </main>
@endsection

@section('self_js')
@if(Session::has('email') && $login == 'Y')
<script>
  $(document).ready(function(){
    // var register = '';
    // url = '{{url('/register')}}';
    // register += "<button class='btn btn-theme bg-yellow gray-side text-white' ";
    // register += "onclick='javascript: location.href='"+url+"';>註冊會員</button>";
    // $('#btn_result').before(register);
    $('#btn_register').css('display', 'block');
  });
</script>
@endif
@endsection