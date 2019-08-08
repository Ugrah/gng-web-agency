<html lang="en">
<head>
    <title>Summernote Tutorial Example</title>
    
        <!-- include libraries(jQuery, bootstrap) -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

        {!! Html::style('http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css') !!}
        {!! Html::script('http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js') !!}

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
                        <label for="message" class="control-label">Email</label>
                        <textarea id="message" class="form-control summernote" name="message">{{ old('message') }}</textarea>

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
            
         </div>
       <script>
         $(function() {
            $('.summernote').summernote({
                height:300,
            });
         });
         </script>
   </body>
</html>