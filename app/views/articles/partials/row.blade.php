<article class="article-row-item">
	<div class="row">
		<div class="col-md-2">
			<a href="{{URL::route('articles.show', $article->slug)}}" class="thumbnail article-thumbnail">
				<img src="http://placehold.it/500x350" alt="" class="img-responsive">
			</a>
		</div>
		<div class="col-md-10">
			<h3 class="article-title">
				<a href="{{URL::route('articles.show', $article->slug)}}">{{$article->title}}</a>
			</h3>
			<div class="article-meta text-muted">
				Posted <strong>{{$article->created_at->diffForHumans()}}</strong> by <strong><a href="{{URL::route('users.show', $article->user->username)}}">{{$article->user->username}}</a></strong><?php if (count($article->categories)): ?> | Filed Under: <?php foreach($article->categories as $category): ?><strong><a href="">{{$category->name}}</a></strong> <?php endforeach; ?><?php endif; ?>
			</div>
			<p class="article-snippet">
				{{$article->snippet}}
			</p>
			<?php if (count($article->tags)): ?>
			<div class="article-tags">
				Tags: <?php foreach($article->tags as $tag): ?><a href="" class="label label-primary">{{$tag->name}}</a> <?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</article>