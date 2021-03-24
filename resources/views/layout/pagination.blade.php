<style>
.page-link{
    border: 0;
    /* border-top-left-radius: 0;
    border-bottom-left-radius: 0; */
    border-radius: 50%;
    color: black;
    padding: 0.5rem 0.45rem;
}
.page-item:first-child .page-link {
    border-top-left-radius: 50%;
    border-bottom-left-radius: 50%;
}
.page-item:last-child .page-link{
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
}
.paginator-content {
    padding: 1rem;
    margin: 3rem auto;
    border-radius: 0.2rem;
    counter-reset: pagination;
    text-align: center;
}
 
.paginator-content ul {
    width: 100%;
}
 
.paginator-content ul {
    list-style: none;
    display: inline;
    padding-left: 0px;
}
 
.paginator-content li {
    /* border: solid 1px #d6d6d6; */
    border-radius: 0.2rem;
    color: #7d7d7d;
    text-decoration: none;
    text-transform: uppercase;
    display: inline-block;
    text-align: center;
    /* padding: 0.5rem 0.9rem; */
}
</style>

@if ($paginator->hasPages())
<?php
//指定显示的页码数量，取值范围3-n
    $paging_number = 7;
    if($paging_number<3){
        $paging_number = 3;
    }
    //当前页
    $paging_current_page = $paginator->currentPage();
    //共几页
    $paging_last_page = $paginator->lastPage();
    if(($paging_number%2) == 0){
        if($paging_last_page <= $paging_number){
            $paging_start = 1;
            $paging_end = $paging_last_page;
        }else if($paging_current_page < ($paging_number/2+1)){
            $paging_start = 1;
            $paging_end = $paging_number;
        }else if($paging_current_page >= ($paging_number/2+1) && (($paging_current_page + ($paging_number/2 - 1)) <= $paging_last_page)){
            $paging_start = $paging_current_page - ($paging_number/2);
            $paging_end = $paging_current_page + ($paging_number/2 - 1);
        }else{
            $paging_start = $paging_last_page - $paging_number + 1;
            $paging_end = $paging_last_page;
        }
    }else{
        if($paging_last_page <= $paging_number){
            $paging_start = 1;
            $paging_end = $paging_last_page;
        }else if($paging_current_page < ceil($paging_number/2)){
            $paging_start = 1;
            $paging_end = $paging_number;
        }else if($paging_current_page >= ceil($paging_number/2) && (($paging_current_page + floor($paging_number/2)) <= $paging_last_page)){
            $paging_start = $paging_current_page - floor($paging_number/2);
            $paging_end = $paging_current_page + floor($paging_number/2);
        }else{
            $paging_start = $paging_last_page - ($paging_number - 1);
            $paging_end = $paging_last_page;
        }
    }
?>
<div class='paginator-content' style='text-align: center;'>
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{-- <li class="page-item disabled"><span class="page-link">«</span></li> --}}
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a>
            </li>
        @endif
     
            {{-- Pagination Elements --}}
        @for ($i = $paging_start; $i <= $paging_end; $i++)
            @if ($i == $paginator->currentPage())
                <li class="page-item active">
                    <span class="page-link" style='background-color: #FBC82B; border-color: #FBC82B;'>{{ $i }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
     
            {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a>
            </li>
        @else
            {{-- <li class="page-item disabled">
                <span class="page-link">»</span>
            </li> --}}
        @endif
    </ul>
@endif