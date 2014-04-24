<article class="article-row-item">
	<div class="row">
		<div class="col-md-2">
			<a href="{{URL::route('articles.show', $article->slug)}}" class="thumbnail article-thumbnail">
				<img src="http://lorempixel.com/500/300/technics/" alt="" class="img-responsive">
			</a>
		</div>
		<div class="col-md-10">
			<div class="dropdown pull-right">
				<button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a href="{{URL::route('articles.edit', $article->slug)}}" role="menuitem" tabindex="-1"><i class="glyphicon glyphicon-edit"></i> Edit</a></li>
				</ul>
			</div>
			<h3 class="article-title">
				<a href="{{URL::route('articles.show', $article->slug)}}">{{$article->title}}</a>
			</h3>
			<div class="article-meta text-muted">
				Posted <strong>{{$article->created_at->diffForHumans()}}</strong> by <strong><a href="{{URL::route('users.show', $article->user->username)}}">{{$article->user->username}}</a></strong><?php if ($article->hasCategories()): ?> | Filed Under: {{$article->categories}}<?php endif; ?>
			</div>
			<p class="article-snippet">
				{{$article->snippet}}
			</p>
			<?php if (count($article->hasTags())): ?>
			<div class="article->meta article-tags text-muted">
				Tags: {{$article->tags}}
			</div>
			<?php endif; ?>
		</div>
	</div>
</article>