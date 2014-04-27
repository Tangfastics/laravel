@section('styles')
<link href="{{asset('css/selectize.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/articles.css')}}" rel="stylesheet" media="screen">
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
<div class="row">
    <div class="col-lg-9">
        
        {{Form::open(['route' => 'articles.store', 'role' => 'form', 'class' => 'form-horizontal'])}}
            
            @include('articles.partials.form')

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{Form::submit('Create Article', ['class' => 'btn btn-primary'])}}
                </div>
            </div>
        {{Form::close()}}
    </div>
    <div class="col-lg-3 text-center">
        <input type="hidden" id="thumbnail-hidden" name="thumbnail" value="">
        <div id="upload-thumbnail" class="upload-thumbnail">
            <div class="thumb-pic thumb">
                <div class="js-preview userpic__preview"></div>
            </div>
            <div class="btn btn-sm btn-primary js-fileapi-wrapper">
                <div class="js-browse">
                    <span class="btn-txt">{{ trans('articles.control_upload_thumbnail') }}</span>
                    <input type="file" name="filedata">
                </div>
                <div class="js-upload" style="display: none;">
                    <div class="progress progress-success"><div class="js-progress bar"></div></div>
                        <span class="btn-txt">{{ trans('user.uploading') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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