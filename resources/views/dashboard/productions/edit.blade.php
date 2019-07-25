@extends('layouts.admin')

@section('content')

  <div class="container-fluid p-4">
    <!-- Page notification -->
    @if(!empty($ok))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ $ok }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="detach-tags-success alert alert-success alert-dismissible fade show text-center d-none" role="alert">
        {{ __('The tag has been deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="delete-file-success alert alert-success alert-dismissible fade show text-center d-none" role="alert">
        {{ __('The file has been deleted') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{  __('Edit Production') }}</h1>
        <a id="submit-form" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm text-white-50"></i> {{  __('Save Production') }}</a>
    </div>

    @if(session()->has('error'))
		<div class="alert alert-danger">{!! session('error') !!}</div>
    @endif
    
    {!! Form::model($production, ['route' => ['production.update', $production->id], 'id' => 'production-form', 'method' => 'put', 'files' => true, 'class' => 'form-horizontal panel']) !!}

        <div class="form-row">
            <div class="col-md-6">
                {!! Form::control('text', $errors, 'name', ['class' => 'form-control', 'placeholder' => __('Production name'), 'required' =>'required']) !!}

                {!! Form::select_options($errors, 'type', ['website' => __('Website'), 'mobile_app' => __('Mobile App')], $production->type) !!}

                {!! Form::control('text', $errors, 'url', ['class' => 'form-control', 'placeholder' => __('Production Url'), 'required' =>'required']) !!}

                {!! Form::control('text', $errors, 'author', ['class' => 'form-control', 'placeholder' => __('Author'), 'required' =>'required']) !!}

                {!! Form::control('text', $errors, 'new_tags', ['class' => 'form-control', 'placeholder' => __('Entrez les tags séparés par des virgules'), 'required' =>'required']) !!}

                @foreach($production->tags as $tag)
                    <button type="button" class="btn btn-info my-1 px-2 py-1 rounded">
                        <span>{{$tag->tag}} </span>
                        <span class="ml-1 float-right"><a class="detach-tag px-1" data-production="{{ $production->id }}" data-tag="{{ $tag->id }}" href=""><i class="fa fa-times-circle close"></i></a></span>
                    </button>
                @endforeach
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col">
                        {!! Form::label('imageFile', __('Replace Production Image')) !!}
                        {!! Form::control('file', $errors, 'imageFile', ['class' => 'form-control', 'required' =>'required']) !!}
                    </div>
                    @if($production->image_name)
                    <div class="col">
                        <div class="card">
                            <img src="{{asset('uploads/productions/'.$production->image_name)}}" class="card-img-top">
                        </div>
                    </div>
                    @endif
                </div>

                {!! Form::label('screenshotFiles[]', __('Add Production Screenshots')) !!}
                <div class="input-group control-group increment">
                    <input type="file" name="screenshotFiles[]" class="form-control">
                    <div class="input-group-btn"> 
                        <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="screenshotFiles[]" class="form-control">
                        <div class="input-group-btn"> 
                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>
                
                <div class="row pt-2">
                @foreach(json_decode($production->screenshots, true) as $key => $img_name)
                    <div data-block-img="screenshot-{{ $img_name }}" class="col">
                        <div class="card position-relative">
                            <span style="top: 0.25em; right:0.25em" class="ml-1 position-absolute"><a class="delete-file px-1" href="#"  data-production="{{ $production->id }}" data-file="{{ $img_name }}" data-name="screenshot-{{ $img_name }}"><i class="fa fa-times-circle close text-danger"></i></a></span>
                            <img src="{{asset(config('images.screenshots').'/'.$img_name)}}" class="card-img-top">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-6">
                {!! Form::label('description_en', __('Description english version')) !!}
                {!! Form::control('textarea', $errors, 'description_en', ['class' => 'form-control', 'placeholder' =>  __('Description english version'), 'required'=> 'required']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('description_en', __('Description french version')) !!}
                {!! Form::control('textarea', $errors, 'description_fr', ['class' => 'form-control', 'placeholder' =>  __('Description french version'), 'required'=> 'required']) !!}
            </div>
        </div>
    {!! Form::close() !!}
  </div>

@endsection

@section('scripts')

  <script type="text/javascript">
      $(function() {
        // Aside active link
        $('#mySidebar ul.navbar-nav > li.nav-item > a.nav-link:eq(1)').addClass('active');

        // Add and remove screenshot function 
        var addAndRemoveScreenshot = function() {
            $(".btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
        };
        // Launch addAndRemoveScreenshot()
        addAndRemoveScreenshot();

        // Detach tag from production by ajax call
        $('a.detach-tag').each(function(){
            $(this).on('click', function(e){
                e.preventDefault();
                var $button = $(this).parent().parent('button');
                var $datas = { production: $(this).attr('data-production'), tag : $(this).attr('data-tag') };

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    method: 'post',
                    url: '{{ url('detach-tag') }}',
                    data: $datas,
                    dataType: 'json'
                })
                .done(function(data) {
                    $button.remove();
                    $('.detach-tags-success').removeClass('d-none');
                    setTimeout(function(){$('.detach-tags-success').addClass('d-none');}, 4000);
                })
                .fail(function(data) {
                    console.log('Error, Please retry');
                });
            });
        });

        // Remove image from uploads
        $('a.delete-file').each(function(){
            $(this).on('click', function(e){
                e.preventDefault();
                var $datas = { production: $(this).attr('data-production'), file : $(this).attr('data-file') };
                var $file = $( 'div[data-block-img="' + $(this).attr('data-name') + '"]' );

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    method: 'post',
                    url: '{{ url('remove-screenshot') }}',
                    data: $datas,
                    dataType: 'json'
                })
                .done(function(data) {
                    $file.remove();
                    $('.delete-file-success').removeClass('d-none');
                    setTimeout(function(){$('.delete-file-success').addClass('d-none');}, 4000);
                })
                .fail(function(data) {
                    console.log('Error, Please retry');
                });
            });
        });

        $('#submit-form').click(function(e){
            e.preventDefault();
            $('#production-form').trigger('submit');           
        });

        // Dismissible alert
        if($('div.alert-success').css('display') === 'block'){
        setTimeout(function() { 
            $('div.alert-success').fadeOut('slow');
        }, 5000);
        }

      });
  </script>
@endsection
