@section('title', $pageTitle)

@section('styles')
<link href="{{asset('css/articles.css')}}" rel="stylesheet" media="screen">
@stop

@section('breadcrumbs')
<li>
    <a href="{{URL::route('articles.index')}}">Articles</a>
</li>
<li class="active">{{$breadcrumb}}</li>
@stop


@section('content')
@if(Request::is('/') || Request::is('articles') || Request::is('articles/views') || Request::is('articles/rating'))
<ul class="nav nav-pills nav-articles pull-right">
    <li<?php if(Request::is('/') OR Request::is('articles')):?> class="active"<?php endif; ?>><a href="{{URL::route('articles.index')}}">Latest Articles</a></li>
    <li<?php if(Request::is('articles/views')):?> class="active"<?php endif; ?>><a href="{{URL::route('articles.views')}}">Most Viewed</a></li>
    <li<?php if(Request::is('articles/rating')):?> class="active"<?php endif; ?>><a href="{{URL::route('articles.rating')}}">Rated Highest</a></li>
</ul>
@endif

<h2 class="articles-header">{{{$type}}} Articles</h2>

@if(count($articles) > 0)
<div class="articles-wrapper">
    @if(count($articles))
        @foreach($articles as $article)
            @include('articles.partials.row')
        @endforeach
    @else
    <div class="block block-info">
        <h4><i class="fa fa-info"></i> Information</h4>
        <p>
            Sorry! We Currently don't have any articles to show. Please check back later.
        </p>
    </div>
    @endif
</div>
<div class="text-center">
    {{$articles->links()}}
</div>
@else
<div class="alert alert-info">
    <button type="button" class="close" aria-hidden="true">&times;</button>
    <h4>Information!</h4>
    <p>Sorry! Currently we don't have any articles to show you. Please check back at a later time.</p>
</div>
@endif
@stop