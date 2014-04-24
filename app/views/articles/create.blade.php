@section('styles')
<link href="{{asset('css/selectize.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet" media="screen">
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
	
	@include('articles.partials.form')

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{Form::submit('Create Article', ['class' => 'btn btn-primary'])}}
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