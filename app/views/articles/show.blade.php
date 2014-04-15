@section('breadcrumbs')
<li>
	<a href="{{URL::route('articles.index')}}">Articles</a>
</li>
<li class="active">Viewing: {{$article->title}}</li>
@stop


@section('content')
<h3 class="page-header article-header">
	{{$article->title}}
</h3>
<div class="article-meta">
	Posted {{$article->created_at->diffForHumans()}} by Username in Category
</div>
<p class="article-post">
	{{$article->post}}
</p>


<ul class="pager">
	@if($prevArticle)
	<li class="previous"><a href="{{URL::route('articles.show', $prevArticle->slug)}}">&larr; {{$prevArticle->title}}</a></li>
	@endif
	@if($nextArticle)
	<li class="next"><a href="{{URL::route('articles.show', $nextArticle->slug)}}">{{$nextArticle->title}} &rarr;</a></li>
	@endif
</ul>
@stop