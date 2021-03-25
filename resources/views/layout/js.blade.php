<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="*********/js/jquery-ellipsis-1.1.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous"></script> --}}

<!-- 控制nav -->
<script>
        function getSlot() {
                const clientWidth = window.innerWidth;
                $('.slot').css('height', $('nav').outerHeight() + 'px');
        }

        function fixNavTop() {
                const paddingTop = $('nav').css('padding-top').replace('px', '');
                $('.navbar-brand-sm').css('top', paddingTop + 'px');
                $('.navbar-toggler').css('top', paddingTop + 'px');

        }
        $(document).ready(function() {
                getSlot();
                $(".navbar-toggler").click(function() {
                        fixNavTop();
                })
        });
        $(window).resize(function() {
                getSlot();
        });
</script>

<script>
        // $(document).ready(function(){
        // // 18禁判斷操作
        //         $("#rated-modal").on('show.bs.modal', function (e) {
        //                 //show.bs.modal = BS內建，觸發時執行
        //                 let modal = $(this);//要修改的modal就是現在開啟的這個modal
        //                 modal.css('padding-right', 0);
        //                 let btn = $(e.relatedTarget);//抓取觸發按鈕的資料
        //                 console.log(btn);
        //                 var url = btn.attr('value');
                        
        //                 modal.find('.btn-warning').click(function(){
        //                         location.href = url;
        //                 });
        //                 // modal.find('#url_18').val(url);
        //         });
        // });

</script>

<!-- 控制nav -->
<!-- back to top -->
<script>
$(document).ready(function() {
        $('.backToTop').click(function() {
                setTimeout(function () {
                        window.scrollTo({
                                top: 0,
                                left: 0,
                                behavior: 'smooth'
                        })
                }, 200)
        })
});
</script>
<!-- back to top -->
<!-- 跑馬燈字數 -->
<script>
$(document).ready(function(){
        $('.swiper-slide >.flex-grow-1').ellipsis({
                row: 1
        });
});
        
</script>
<!-- 跑馬燈字數 -->