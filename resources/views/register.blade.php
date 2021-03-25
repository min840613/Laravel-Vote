@extends('layout.master')
@section('meta_title', $meta_title)
@section('meta_desc', $meta_desc)

@section('self_css')
<link rel="stylesheet" href="*********/css/register.css">
@endsection

@section('main')
<main class="container my-5">
    <h2 class="text-center page-title">
        <i class="fas fa-edit text-secondary"></i>
        會員中心
    </h2>
    <h3 class="btn bg-yellow mx-0 mt-3 py-1">填寫/修改個人資料</h3>
    <form class="needs-validation text-secondary py-5" id="signup-form" method='post' action="{{url('/insert_update_user')}}" novalidate>
        {{ csrf_field() }}
        <!-- 姓名 -->
        <div class="form-group row">
            <label for="form-name" class="col-sm-2 col-form-label">姓名</label>
            <div class="col-sm-6">
                @if(is_null($result))
                    <input type="text" class="form-control" id="form-name" name="name" value="" required>
                @else
                    <input type="text" class="form-control" id="form-name" name="name" value="{{$result->name}}" required>
                @endif
                
                <div class="invalid-feedback">必填欄位</div>
            </div>
        </div>
        <!-- 性別 -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">性別</label>
            @if(is_null($result))
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input type="radio" id="form-gender-1" name="gender" class="custom-control-input" value='1' required>
                    <label class="custom-control-label" for="form-gender-1">男</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="form-gender-2" name="gender" class="custom-control-input" value='0' required>
                    <label class="custom-control-label" for="form-gender-2">女</label>
                    <div class="invalid-feedback">&nbsp;&nbsp;必填欄位</div>
                </div>
            @else
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input type="radio" id="form-gender-1" name="gender" class="custom-control-input" @if($result->gender == '1') checked @endif value='1' required>
                    <label class="custom-control-label" for="form-gender-1">男</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="form-gender-2" name="gender" class="custom-control-input" @if($result->gender == '0') checked @endif value='0' required>
                    <label class="custom-control-label" for="form-gender-2">女</label>
                    <div class="invalid-feedback">&nbsp;&nbsp;必填欄位</div>
                </div>
            @endif
        </div>
        <!-- 生日 -->
        <div class="form-group row">
            <label for="form-birthday" class="col-sm-2 col-form-label">生日</label>
            {{-- <div class="col-sm-6">
                <input type="text" class="form-control" id="form-birthday" name="form-birthday" value="" required>
            </div> --}}
            @if(is_null($result))
                <div class="col-sm-3">
                    <select class="custom-select" id="form-birthYy" name="birth_yy" required>
                        @for($i = 1911 ; $i <= (int)date('Y'); $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div> 
                <div class="col-sm-3">
                    <select class="custom-select" id="form-birthMm" name="birth_mm" required>
                        @for($i = 1 ; $i <= 12 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div> 
                <div class="col-sm-3">
                    <select class="custom-select" id="form-birthDd" name="birth_dd" required>
                        @for($i = 1 ; $i <= 31 ; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div> 
            @else
            <div class="col-sm-3">
                <select class="custom-select" id="form-birthYy" name="birth_yy" value='{{$result->birth_yy}}' required>
                    @for($i = 1911 ; $i <= (int)date('Y'); $i++)
                        @if($result->birth_yy == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div> 
            <div class="col-sm-3">
                <select class="custom-select" id="form-birthMm" name="birth_mm" value='{{$result->birth_mm}}' required>
                    @for($i = 1 ; $i <= 12 ; $i++)
                        @if($result->birth_mm == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div> 
            <div class="col-sm-3">
                <select class="custom-select" id="form-birthDd" name="birth_dd" value='{{$result->birth_dd}}' required>
                    @for($i = 1 ; $i <= 31 ; $i++)
                        @if($result->birth_dd == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div> 

            @endif
        </div>
        <!-- 個人年收入 -->
        <div class="form-group row">
            <label for="form-salary" class="col-sm-2 col-form-label">個人年收入</label>
            <div class="col-sm-6">
                @if(is_null($result))
                    <select class="custom-select" id="form-salary" name="pay" required>
                        <option value="">請選擇項目</option>
                        <option value="10">240000元以下</option>
                        <option value="20">240000~479999元</option>
                        <option value="30">480000~619999元</option>
                        <option value="40">620000~749999元</option>
                        <option value="50">750000~959999元</option>
                        <option value="60">960000~1199999元</option>
                        <option value="70">1200000元以上</option>
                    </select>
                @else
                    <select class="custom-select" id="form-salary" name="pay" value="{{$result->pay}}" required>
                        <option value="">請選擇項目</option>
                        <option value="10"  @if($result->pay == '10') selected @endif>240000元以下</option>
                        <option value="20"  @if($result->pay == '20') selected @endif>240000~479999元</option>
                        <option value="30"  @if($result->pay == '30') selected @endif>480000~619999元</option>
                        <option value="40"  @if($result->pay == '40') selected @endif>620000~749999元</option>
                        <option value="50"  @if($result->pay == '50') selected @endif>750000~959999元</option>
                        <option value="60"  @if($result->pay == '60') selected @endif>960000~1199999元</option>
                        <option value="70"  @if($result->pay == '70') selected @endif>1200000元以上</option>
                    </select>
                @endif
                <div class="invalid-feedback">必填欄位</div>
            </div>
        </div>
        <!-- 聯絡電話 -->
        {{-- <div class="form-group row">
            <label for="form-phone" class="col-sm-2 col-form-label">聯絡電話</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="form-phone" name="form-phone" value="" required>
                <div class="invalid-feedback">必填欄位</div>
            </div>
        </div> --}}
        <!-- 信箱 -->
        <div class="form-group row">
            <label for="form-email" class="col-sm-2 col-form-label">信箱</label>
            <div class="col-sm-6">
                @if(is_null($result))
                    <input type="text" class="form-control" id="form-email" name="email" value="" required>
                @else
                    <input type="text" class="form-control" id="form-email" name="email" value="{{$result->email}}" readonly="readonly" required>
                @endif
                <div class="invalid-feedback">必填欄位</div>
            </div>
        </div>
        <!-- 地址 -->
        <div class="form-group row">
            <label for="form-address" class="col-sm-2 col-form-label">地址</label>
            @if(is_null($result))
                <div class="col-sm-3">
                    <select class="custom-select" id="city" name='city' required>
                        <option selected disabled value="">請選擇</option>
                        <option value="基隆市">基隆市</option>
                        <option value="臺北市">臺北市</option>
                        <option value="新北市">新北市</option>
                        <option value="桃園市">桃園市</option>
                        <option value="新竹市">新竹市</option>
                        <option value="新竹縣">新竹縣</option>
                        <option value="苗栗縣">苗栗縣</option>
                        <option value="臺中市">臺中市</option>
                        <option value="彰化縣">彰化縣</option>
                        <option value="南投縣">南投縣</option>
                        <option value="雲林縣">雲林縣</option>
                        <option value="嘉義市">嘉義市</option>
                        <option value="嘉義縣">嘉義縣</option>
                        <option value="臺南市">臺南市</option>
                        <option value="高雄市">高雄市</option>
                        <option value="屏東縣">屏東縣</option>
                        <option value="臺東縣">臺東縣</option>
                        <option value="花蓮縣">花蓮縣</option>
                        <option value="宜蘭縣">宜蘭縣</option>
                        <option value="澎湖縣">澎湖縣</option>
                        <option value="金門縣">金門縣</option>
                        <option value="連江縣">連江縣</option>
                    </select>
                    <div class="invalid-feedback">必填欄位</div>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="form-address" name="address1" value="" required>
                    <div class="invalid-feedback">必填欄位</div>
                </div>
            @else
                <div class="col-sm-3">
                    <select class="custom-select" id="city" name='city' value="{{$result->city}}" required>
                        <option value="">請選擇</option>
                        <option value="基隆市" @if($result->city == '基隆市') selected @endif>基隆市</option>
                        <option value="臺北市" @if($result->city == '臺北市') selected @endif>臺北市</option>
                        <option value="新北市" @if($result->city == '新北市') selected @endif>新北市</option>
                        <option value="桃園市" @if($result->city == '桃園市') selected @endif>桃園市</option>
                        <option value="新竹市" @if($result->city == '新竹市') selected @endif>新竹市</option>
                        <option value="新竹縣" @if($result->city == '新竹縣') selected @endif>新竹縣</option>
                        <option value="苗栗縣" @if($result->city == '苗栗縣') selected @endif>苗栗縣</option>
                        <option value="臺中市" @if($result->city == '臺中市') selected @endif>臺中市</option>
                        <option value="彰化縣" @if($result->city == '彰化縣') selected @endif>彰化縣</option>
                        <option value="南投縣" @if($result->city == '南投縣') selected @endif>南投縣</option>
                        <option value="雲林縣" @if($result->city == '雲林縣') selected @endif>雲林縣</option>
                        <option value="嘉義市" @if($result->city == '嘉義市') selected @endif>嘉義市</option>
                        <option value="嘉義縣" @if($result->city == '嘉義縣') selected @endif>嘉義縣</option>
                        <option value="臺南市" @if($result->city == '臺南市') selected @endif>臺南市</option>
                        <option value="高雄市" @if($result->city == '高雄市') selected @endif>高雄市</option>
                        <option value="屏東縣" @if($result->city == '屏東縣') selected @endif>屏東縣</option>
                        <option value="臺東縣" @if($result->city == '臺東縣') selected @endif>臺東縣</option>
                        <option value="花蓮縣" @if($result->city == '花蓮縣') selected @endif>花蓮縣</option>
                        <option value="宜蘭縣" @if($result->city == '宜蘭縣') selected @endif>宜蘭縣</option>
                        <option value="澎湖縣" @if($result->city == '澎湖縣') selected @endif>澎湖縣</option>
                        <option value="金門縣" @if($result->city == '金門縣') selected @endif>金門縣</option>
                        <option value="連江縣" @if($result->city == '連江縣') selected @endif>連江縣</option>
                    </select>
                    <div class="invalid-feedback">必填欄位</div>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="form-address" name="address1" value="{{$result->address1}}" required>
                    <div class="invalid-feedback">必填欄位</div>
                </div>
            @endif
        </div>
        <!-- 職業 -->
        <div class="form-group row">
            <label for="form-job" class="col-sm-2 col-form-label">職業</label>
            <div class="col-sm-6">
                @if(is_null($result))
                    <select class="custom-select" id="form-job" name="job" required>
                        <option selected disabled value="">請選擇項目</option>
                        <option value="10">學生</option>
                        <option value="20">家管</option>
                        <option value="30">退休</option>
                        <option value="40">小農</option>
                        <option value="50">餐飲業</option>
                        <option value="60">製造業</option>
                        <option value="70">醫護業</option>   
                        <option value="80">不動產、營造業</option>  
                        <option value="90">自行創業</option>  
                        <option value="100">電信業</option>         
                        <option value="110">金融保險業</option>         
                        <option value="120">公務員、社會服務業</option>         
                        <option value="130">大眾傳播業</option>  
                        <option value="140">資訊科技業</option>      
                        <option value="150">服務業</option>      
                        <option value="999">其它</option>         
                    </select>
                @else
                    <select class="custom-select" id="form-job" name="job" value="{{$result->job}}" required>
                        <option value="">請選擇項目</option>
                        <option value="10" @if($result->job == '10') selected @endif>學生</option>
                        <option value="20" @if($result->job == '20') selected @endif>家管</option>
                        <option value="30" @if($result->job == '30') selected @endif>退休</option>
                        <option value="40" @if($result->job == '40') selected @endif>小農</option>
                        <option value="50" @if($result->job == '50') selected @endif>餐飲業</option>
                        <option value="60" @if($result->job == '60') selected @endif>製造業</option>
                        <option value="70" @if($result->job == '70') selected @endif>醫護業</option>   
                        <option value="80" @if($result->job == '80') selected @endif>不動產、營造業</option>  
                        <option value="90" @if($result->job == '90') selected @endif>自行創業</option>  
                        <option value="100" @if($result->job == '100') selected @endif>電信業</option>         
                        <option value="110" @if($result->job == '110') selected @endif>金融保險業</option>         
                        <option value="120" @if($result->job == '120') selected @endif>公務員、社會服務業</option>         
                        <option value="130" @if($result->job == '130') selected @endif>大眾傳播業</option>  
                        <option value="140" @if($result->job == '140') selected @endif>資訊科技業</option>      
                        <option value="150" @if($result->job == '150') selected @endif>服務業</option>      
                        <option value="999" @if($result->job == '999') selected @endif>其它</option>         
                    </select>
                @endif
            </div>
        </div>
        <!-- 教育程度 -->
        <div class="form-group row">
            <label for="form-education" class="col-sm-2 col-form-label">教育程度</label>
            <div class="col-sm-6">
                @if(is_null($result))
                    <select class="custom-select" id="form-education" name="education" required>
                        <option selected disabled value="">請選擇項目</option>
                        <option value="10">國小以下</option>
                        <option value="20">國中</option>
                        <option value="30">高中</option>
                        <option value="40">大學</option>
                        <option value="50">研究所</option>
                        <option value="60">博士</option>
                    </select>
                @else
                    <select class="custom-select" id="form-education" name="education" value="{{$result->education}}" required>
                        <option value="">請選擇項目</option>
                        <option value="10" @if($result->education == '10') selected @endif>國小以下</option>
                        <option value="20" @if($result->education == '20') selected @endif>國中</option>
                        <option value="30" @if($result->education == '30') selected @endif>高中</option>
                        <option value="40" @if($result->education == '40') selected @endif>大學</option>
                        <option value="50" @if($result->education == '50') selected @endif>研究所</option>
                        <option value="60" @if($result->education == '60') selected @endif>博士</option>
                    </select>
                @endif
                <div class="invalid-feedback">必填欄位</div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <p>＊您的會員資料作為民調調查所用，我們不會洩漏您的資料。</p>
        </div>
        <div>
            <div class="form-check text-center">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    我已仔細閱讀會員服務條款及公司隱私權保護政策等內容。
                </label>
            </div>
        </div>
        <div class="form-action my-5 text-center">
            <button class="btn btn-theme bg-yellow gray-side text-white" type="submit">確認</button>
            <button class="btn bg-light-gray btn-theme gray-side text-white clear-btn" type="button">取消</button>
        </div>
    </form>
</main>
@endsection

@section('self_js')
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var clearBtn = document.querySelector('.clear-btn')
            clearBtn.addEventListener('click', function() {
                const signupForm = document.getElementById('signup-form');
                signupForm.reset();
                signupForm.classList.remove('was-validated');

            })
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

{{-- @if(Session::has('email'))
@else
<script>
    $(document).ready(function(){
    //   var register = '';
    //   register += "<button class='btn btn-theme bg-yellow gray-side text-white' onclick='javascript: location.href='{{url('/register')}}';'>註冊會員</button>";
    //   $('#btn_result').before(register);
      // $('#mobile_search').before(mobile_login);
      location.href="{{url('/')}}";
    });
  </script>
@endif --}}
@endsection