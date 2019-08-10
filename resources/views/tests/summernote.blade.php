<html lang="en">
<head>
    <title>Summernote Tutorial Example</title>
    
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Lato|PT+Sans|Roboto|Roboto+Condensed" rel="stylesheet">

</head>
      <body>
         <div class="container">
            <h2>Summernote Tutorial Example</h2>

             <!-- Page notification -->
            @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session('ok') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <form method="POST" action="{{ route('summernote') }}">
                {{ csrf_field() }}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group{{ $errors->has('recipient') ? ' has-error' : '' }}">
                        <label for="recipient" class="control-label">Email</label>
                        <input id="recipient" type="email" class="form-control" name="recipient" value="{{ old('recipient') }}" autofocus>

                        @if ($errors->has('recipient'))
                            <span class="help-block">
                                <strong>{{ $errors->first('recipient') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="control-label">Message</label>
                        <textarea id="message" class="form-control" name="message">{!! old('message', 'test editor content') !!}</textarea>

                        @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            {!! $adminResponse[3]->content !!}
            
         </div>
    
    
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
        <script type="text/javascript">
            CKEDITOR.extraPlugins = 'embed';

            $(function() {
                var options = {
                    filebrowserImageBrowseUrl : "{{url('laravel-filemanager?type=Images')}}",
                    filebrowserImageUploadUrl : "{{url('laravel-filemanager/upload?type&_token=csrf_token()')}}",
                    filebrowserBrowseUrl : "{{url('laravel-filemanager?type=Files')}}",
                    filebrowserUploadUrl : "{{url('laravel-filemanager/upload?type=Files&_token=csrf_token()')}}"
                };
                $('textarea').ckeditor(options);
            });
        </script>
        
   </body>
</html>