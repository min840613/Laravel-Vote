<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge" /> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-language" content="zh-Hant-TW">
    <meta property="og:site_name" content="NOWnews民調">
    <meta property="og:locale" content="zh_TW" />
    <meta name="author" content="NOWnews今日新聞">
    <meta name="copyright" content="NOWnews今日新聞">
    <meta name="application-name" content="NOWnews民調">
    <meta name="twitter:card" content="summary">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:image:width" content="1000" />
    <meta property="og:image:height" content="{{ isset($og_image_height) ? $og_image_height : 800 }}" />
    <meta property="og:url" content="{{URL::current()}}"/>
    <meta property="twitter:title" content="@yield('meta_title')">
    <meta property="article:author" content="https://www.facebook.com/nownews" />
    <meta property="article:publisher" content="https://www.facebook.com/nownews">
    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_desc')">
    <meta property="og:description" content="@yield('meta_desc')">
    <meta property="og:image" content="{{ isset($og_image) ? $og_image : 'https://www.nownews.com/images/banner.jpg' }}">
    <meta name="keywords" content="{{ isset($og_keywords) && !empty($og_keywords) ? $og_keywords : 'NOWnews民調,NOWnews,今日新聞,網路投票,線上投票' }}">

    <meta name="google-site-verification" content="rkpebnQ2OCPG7ABYK0x2EXR2MQRwjhmCMGNxZCELS1w" />
    <meta property="fb:app_id" content='{{env('FB_CLIENT_ID')}}'>
    <link rel="canonical" href="{{URL::current()}}">

    @yield('self_mata'){{-- 可在各頁面撰寫meta --}}

    <link rel="shortcut icon" href="https://prod-vote-image.nownews.com/images/logo-brand-sm.png" />
    <title>@yield('meta_title')</title>
    @include('layout.css') {{-- 引入css --}}
    @include('layout.js') {{-- 引入js --}}
    @yield('self_css') {{-- 可在各頁面撰寫css --}}

    {{-- 為了讓廣告至底加上 --}}
    <style>
        .backToTopContainer {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            position: relative;
            z-index: 50;
        }
        /* .backToTop::after {
            content: '';
            display: block;
            float: none;
            clear: both;
        } */
    </style>
    {{-- 為了讓廣告至底加上 --}}

    @yield('head_js')

    <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
    <script>
        var googletag = googletag || {};
        googletag.cmd = googletag.cmd || [];
    </script>
    <script>
        // window.googletag = window.googletag || {
        //     cmd: []
        // };
        googletag.cmd.push(function() {
            googletag.defineSlot('/5799246/vote_nownews_970x90_T', [
                [970, 90],
                [728, 90],
                [320, 100],
                [320, 50]
            ], 'div-gpt-ad-1608191438549-0').addService(googletag.pubads());
            googletag.defineSlot('/5799246/vote_nownews_970x250_setend', [
                [320, 50],
                [970, 90],
                [728, 90],
                [320, 100]
            ], 'div-gpt-ad-1608191522739-0').addService(googletag.pubads());
            googletag.pubads().enableSingleRequest();
            googletag.pubads().collapseEmptyDivs();
            googletag.enableServices();
        });
    </script>
    

    <!-- Google Tag Manager -->
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PSBJX7R');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PSBJX7R"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @include('layout.nav') {{-- 引入nav --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v9.0&appId={{env('FB_CLIENT_ID')}}&autoLogAppEvents=1" nonce="oMpuFQFf"></script>
    @yield('main') {{-- 可在各頁面撰寫內容 --}}

    @include('layout.footer') {{-- 引入footer --}}

    <!-- /5799246/vote_nownews_970x250_setend -->
    <div class="bottom-widget">
        <div class="backToTopContainer">
            <button type="button" class="backToTop" id='btn_top_going' style="position: relative; z-index: 50; float: none; margin: 0 2rem 6px 0;">
                <div class="d-flex flex-column">
                <i class="fas fa-chevron-up"></i>
                <span>TOP</span>
                </div>
            </button>
        </div>
        <!-- /5799246/vote_nownews_970x250_setend -->
        <div id='div-gpt-ad-1608191522739-0' class="ad ad-bottom">
            <script>
                googletag.cmd.push(function() {
                    googletag.display('div-gpt-ad-1608191522739-0');
                });
            </script>
        </div>
    </div>
    {{-- <div id='div-gpt-ad-1608191522739-0' class="ad ad-bottom">
        <script>
            googletag.cmd.push(function() {
                googletag.display('div-gpt-ad-1608191522739-0');
            });
        </script>
    </div> --}}
    @yield('self_js') {{-- 可在各頁面撰寫js --}}
    <!-- 18禁 -->
    <div id="rated-modal" class="modal" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row pb-5">
                        <p class="col-12 bg-yellow warning-text">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                            警告： 未滿十八歲不得觀賞瀏覽
                        </p>
                        <div class="col-12 col-md-4 align-self-center text-center warning-img">
                            <img src="https://prod-vote-image.nownews.com/images/rate-warning.png" alt="" width="100%">
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
                                <button class="btn btn-warning text-white warning-btn" data-dismiss="modal">是</button>
                                <button class="btn btn-secondary warning-btn" onclick="javascript: location.href='{{url('/')}}'">否</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <button type="button" class="backToTop">
        <div class="d-flex flex-column">
        <i class="fas fa-chevron-up"></i>
        <span>TOP</span>
        </div>
    </button> --}}
</body>

</html>