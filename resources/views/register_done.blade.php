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
      註冊會員-完成本問卷
    </h2>
    <p class="text-center page-subtitle">
      恭喜您，已成為NOWnews會員
      <br/>
      * 您的會員資料作為民調調查所用，我們不會洩漏您的資料。
    </p>
    <div class="d-flex justify-content-center my-5">
      <button class="btn btn-theme bg-yellow gray-side text-white"  onclick="javascript: location.href='{{url('/')}}';">返回首頁</button>
      {{-- <button class="btn btn-theme bg-orange gray-side text-white"  onclick="javascript: location.href='{{url('/voteResult')}}/{{$id}}';">看即時結果</button> --}}
    </div>
  </main>
@endsection

@section('self_js')
@endsection