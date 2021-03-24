@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_css')
<link rel="stylesheet" href="https://prod-vote-image.nownews.com/css/login.css">
@endsection

@section('main')
<main class="container my-5">
  <div class="page-icon">
    <i class="fas fa-exclamation"></i>
  </div>
  <h2 class="text-center page-title">
    請先選已下方式任意登入
  </h2>
  <div class="d-flex flex-column flex-sm-row justify-content-center my-5">
    <button class="d-flex flex-column align-items-center justify-content-around my-3 mx-4 py-5 px-3 login-gateway" onclick="jvascript: document.location.href='{{url('/user/auth/facebook-sign-in')}}'">
      <img src="https://prod-vote-image.nownews.com/images/login-01.svg" alt="" width="80">
      <span class="text-center text-muted my-2">以Facebook帳號<br />登入</span>
    </button>
    <button class="d-flex flex-column align-items-center justify-content-around my-3 mx-4 py-5 px-3 login-gateway" onclick="jvascript: document.location.href='{{url('/user/auth/google-sign-in')}}'">
      <img src="https://prod-vote-image.nownews.com/images/login-02.svg" alt="" width="80">
      <span class="text-center text-muted my-2">以Google帳號<br />登入</span>
    </button>
  </div>
  <div class="d-flex justify-content-center my-5">
    <button class="btn btn-theme bg-yellow gray-side text-white" onclick="javascript: location.href='{{url('/')}}';">返回首頁</button>
  </div>
</main>
@endsection

@section('self_js')
@endsection