@section('styles')
<link href="{{asset('css/articles.css')}}" rel="stylesheet" media="screen">
@stop

@section('breadcrumbs')
<li>
    <a href="{{URL::route('articles.index')}}">Articles</a>
</li>
<li class="active">Latest</li>
@stop


@section('content')
<h3 class="page-header articles-header">
    <a href="{{URL::route('articles.create')}}" class="btn btn-sm btn-primary pull-right"><i class="fa fa-pencil"></i> Create Article</a>
    Latest Articles
</h3>

@if(count($articles) > 0)
<div class="articles-wrapper">
    @foreach(array_chunk($articles->getItems(), 3) as $items)
    <div class="row article-row">
        @foreach($items as $item)
        <div class="col-md-4 col-lg-4">
            <a href="{{URL::route('articles.show', $item->slug)}}" class="thumbnail">
                <img src="http://lorempixel.com/500/350/technics/" alt="" class="img-responsive">
            </a>
            <h3 class="article-title"><a href="{{URL::route('articles.show', $item->slug)}}">{{$item->title}}</a></h3>
            <div class="article-meta">
                Posted {{$item->created_at->diffForHumans()}} by <strong><a href="{{URL::route('users.show', $item->user->username)}}">{{$item->user->username}}</a></strong>
            </div>
            <p class="article-snippet">
                {{$item->snippet}}
            </p>
        </div>
        @endforeach
    </div>
    @endforeach
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