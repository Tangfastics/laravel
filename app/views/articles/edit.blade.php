@section('styles')
<link href="{{asset('css/selectize.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet" media="screen">
@stop

@section('breadcrumbs')
<li>
	<a href="{{URL::route('articles.index')}}">Articles</a>
</li>
<li class="active">Edit Article: {{$article->title}}</li>
@stop

@section('content')
<h3 class="page-header default-header">
	Edit Article: {{$article->title}}
</h3>
{{Form::model($article, ['route' => ['articles.update', $article->slug], 'role' => 'form', 'class' => 'form-horizontal', 'method' => 'PUT'])}}
	
	@include('articles.partials.form')

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{Form::submit('Update Article', ['class' => 'btn btn-primary'])}}
		</div>
	</div>
{{Form::close()}}
@stop

@section('scripts')
<script src="{{asset('js/standalone/selectize.js')}}"></script>
<script type="text/javascript">
	(function($){
		$("#tags").selectize({
			maxItems: 5
		});
		$("#categories").selectize({
			maxItems: 5
		});
	})(jQuery);
</script>
<script src="{{asset('js/vendor/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'editor_snippet' );
    CKEDITOR.replace( 'editor_post' );
</script>
@stop