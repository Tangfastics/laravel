@section('styles')
<link href="{{asset('css/articles.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/selectize.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/selectize.bootstrap3.css')}}" rel="stylesheet" media="screen">
<link href="{{asset('css/jquery.Jcrop.min.css')}}" rel="stylesheet">
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
            <div class="thumb-pic">
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
<div class="modal" data-backdrop="static" id="crop-thumbnail-modal">
    <div class="modal-dialog"  id="crop-thumbnail">
        <div class="panel panel-default">
         <div class="panel-heading">
           <h3 class="panel-title">Crop Thumbnail</h3>
         </div>
         <div class="panel-body">
           <div class="js-img"></div>
         </div>
         <div class="panel-footer text-right">
             <div class="js-upload btn btn-primary">Save changes</div>
         </div>
       </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('scripts')
<script type="text/javascript">
  var FileAPI = {
          debug: false
          , staticPath: "{{ url('js') }}/"
          , postNameConcat: function (name, idx){
        return  name + (idx != null ? '['+ idx +']' : '');
      }
  };
</script>
<script src="{{ asset('js/FileAPI.min.js') }}"></script>
<script src="{{ asset('js/FileAPI.exif.js') }}"></script>
<script src="{{ asset('js/jquery.fileapi.js') }}"></script>
<script src="{{ asset('js/jquery.Jcrop.min.js') }}"></script>
<script src="{{asset('js/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/standalone/selectize.js')}}"></script>
<script type="text/javascript">
    jQuery(function($){
        $("#tags").selectize({
            maxItems: 5
        });

        $("#categories").selectize({
            maxItems: 5
        });

        $('#crop-thumbnail-modal').on('click', '.js-upload', function (){
           //$('#upload-thumbnail').fileapi('upload');
           $('#crop-thumbnail-modal').modal('hide');
        });

        $('#upload-thumbnail').fileapi({
            url: '{{ route("articles.thumbnail") }}',
            accept: 'image/*',
            data: { _token: "{{ csrf_token() }}" },
            imageSize: { minWidth: 262, minHeight: 141 },
            elements: {
                // active: { show: '.js-upload', hide: '.js-browse' },
                preview: {
                    el: '.js-preview',
                    width: 262,
                    height: 141
                },
            },

            onSelect: function (evt, ui)
            {
                var file = ui.all[0];
                if ( file )
                {
                    $('#crop-thumbnail-modal').modal('show');

                    $('.js-img').cropper({
                        file: file,
                        bgColor: '#fff',
                        maxSize: [$('#crop-thumbnail').width()-30, $(window).height()],
                        minSize: [262, 141],
                        onSelect: function (coords)
                        {
                            $('#upload-thumbnail').fileapi('crop', file, coords);
                        }
                    });
                }
            },

            onComplete: function(evt, xhr)
            {
                try
                {
                    var result = FileAPI.parseJSON(xhr.xhr.responseText);
                    $('#avatar-hidden').attr("value",result.images.filename);
                }
                catch (er)
                {
                    FileAPI.log('PARSE ERROR:', er.message);
                }
            }
        });
    });
</script>
<script>
    CKEDITOR.replace( 'editor_snippet' );
    CKEDITOR.replace( 'editor_post' );
</script>
@stop