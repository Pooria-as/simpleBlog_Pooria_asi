
@if ($paginator->hasPages())

@if ($paginator->onFirstPage())

<nav class="flexbox mt-30">
<a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Pervious</a>
@else
<a class="btn btn-white" href="{{$paginator->previousPageUrl() }}"><i class="ti-arrow-left fs-9 mr-4"></i> Pervious</a>

@endif


@if ($paginator->hasMorePages())
<a class="btn btn-white" href="{{$paginator->nextPageUrl()}}"><i class="ti-arrow-right fs-9 mr-4"></i>News</a>


@else
<a class="btn btn-white disabled"><i class="ti-arrow-right fs-9 mr-4"></i>News</a>
@endif
</nav> 





@endif