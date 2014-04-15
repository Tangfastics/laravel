@section('styles')

@stop

@section('breadcrumbs')
<li>
	<a href="{{URL::route('articles.index')}}">Articles</a>
</li>
<li class="active">Create Article</li>
@stop

@section('content')
<h3 class="page-header default-header">
	Create Article
</h3>
{{Form::open(['route' => 'articles.store', 'role' => 'form', 'class' => 'form-horizontal'])}}
	<div class="form-group<?php if($errors->has('title')): ?> has-error has-feedback<?php endif; ?>">
		{{Form::label('title', 'Title', ['class' => 'col-sm-2 control-label'])}}
		<div class="col-sm-10">
			{{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Article Title'])}}
			<?php if($errors->has('title')): ?>
				<span class="glyphicon glyphicon-remove form-control-feedback"></span>
				<span class="help-block">{{$errors->first('title')}}</span>
			<?php endif; ?>
		</div>
	</div>

	<div class="form-group<?php if($errors->has('snippet')): ?> has-error has-feedback<?php endif; ?>">
		{{Form::label('snippet', 'Snippet', ['class' => 'col-sm-2 control-label'])}}
		<div class="col-sm-10">
			{{Form::textarea('snippet', null, ['class' => 'form-control'])}}
			<?php if($errors->has('snippet')): ?>
				<span class="glyphicon glyphicon-remove form-control-feedback"></span>
				<span class="help-block">{{$errors->first('snippet')}}</span>
			<?php endif; ?>
		</div>
	</div>

	<div class="form-group<?php if($errors->has('post')): ?> has-error has-feedback<?php endif; ?>">
		{{Form::label('post', 'Post', ['class' => 'col-sm-2 control-label'])}}
		<div class="col-sm-10">
			{{Form::textarea('post', null, ['class' => 'form-control'])}}
			<?php if($errors->has('post')): ?>
				<span class="glyphicon glyphicon-remove form-control-feedback"></span>
				<span class="help-block">{{$errors->first('post')}}</span>
			<?php endif; ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{Form::submit('Create Article', ['class' => 'btn btn-primary'])}}
		</div>
	</div>
{{Form::close()}}
@stop

@section('scripts')

@stop