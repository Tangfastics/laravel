<article class="article-row-item">
	<div class="row">
		<div class="col-md-2">
			<a href="{{URL::route('articles.show', $article->slug)}}" class="thumbnail">
				<img src="http://placehold.it/500x350" alt="" class="img-responsive">
			</a>
		</div>
		<div class="col-md-10">
			<h3 class="article-title">
				<a href="{{URL::route('articles.show', $article->slug)}}">{{$article->title}}</a>
			</h3>
			<div class="article-meta text-muted">
				Posted <strong>{{$article->created_at->diffForHumans()}}</strong> by <strong><a href="{{URL::route('users.show', $article->user->username)}}">{{$article->user->username}}</a></strong> in <strong><a href="#">Uncategorized</a></strong>
			</div>
			<p class="article-snippet">
				{{$article->snippet}}
			</p>
		</div>
	</div>
</article>