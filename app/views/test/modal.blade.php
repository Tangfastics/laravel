<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test Page</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="{{asset('css/jquery.Jcrop.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
            <a class="btn btn-primary" data-toggle="modal" href='#upload-thumbnail'>Trigger modal</a>
            <div class="modal fade" id="upload-thumbnail">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        {{Form::open(['method' => 'POST', 'route' => 'test.upload', 'role' => 'form'])}}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <div class="js-preview thumbnail img-responsive">
                                        <img src="http://placehold.it/182x100" alt="">
                                    </div>
                                </div>
                                <div class="col-md-9 col-lg-9">
                                    {{Form::label('thumbnail', 'Thumbnail', ['class' => 'control-label'])}}
                                    {{Form::file('thumbnail', ['class' => 'form-control'])}}
                                    <span class="help-block">
                                        <strong>Rules:</strong> You can only upload images. Max file size is 5MB. Smallest image size: 192x110px
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="js-img thumbnail" style="margin-bottom: 0;">
                                        <div class="alert alert-info" style="margin-bottom: 0;">
                                            Please select a image first.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-top: 0;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {{Form::submit('Upload', ['class' => 'js-upload btn btn-primary'])}}
                        </div>
                        {{Form::close()}}
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/FileAPI.min.js') }}"></script>
        <script src="{{ asset('js/FileAPI.exif.js') }}"></script>
        <script src="{{ asset('js/jquery.fileapi.js') }}"></script>
        <script src="{{ asset('js/jquery.Jcrop.min.js') }}"></script>

<script type="text/javascript">
    jQuery(function($){
        $('#upload-thumbnail').on('click', '.js-upload', function (){
           $('#upload-thumbnail').fileapi('upload');
        });

        $('#upload-thumbnail').fileapi({
            url: '{{ route("test.upload") }}',
            accept: 'image/*',
            data: { _token: "{{ csrf_token() }}" },
            imageSize: { minWidth: 182, minHeight: 100 },
            elements: {
                preview: {
                    el: '.js-preview',
                    width: 182,
                    height: 100
                },
            },

            onSelect: function (evt, ui)
            {
                var file = ui.all[0];
                if ( file )
                {
                    $('.js-img').cropper({
                        file: file,
                        bgColor: '#fff',
                        maxSize: [$('.js-img').width(), $(window).height()],
                        minSize: [192, 108],
                        keySupport: false,
                        onSelect: function (coords)
                        {
                            $('#upload-thumbnail').fileapi('crop', file, coords);
                        }
                    });
                }
            },
        });
    });
</script>
    </body>
</html>