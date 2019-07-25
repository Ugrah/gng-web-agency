@extends('layouts.admin')

@section('content')

  <div class="container-fluid p-4">
    <!-- Page notification -->
    @if(session()->has('ok'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('ok') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{  __('Create Production') }}</h1>
        <a id="submit-form" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm text-white-50"></i> {{  __('Save Production') }}</a>
    </div>

    @if(session()->has('error'))
		  <div class="alert alert-danger">{!! session('error') !!}</div>
		@endif
    {!! Form::open(['route' => 'production.store', 'id' => 'production-form', 'files' => true]) !!}
      <div class="form-row">
        <div class="col-md-6">
          {!! Form::control('text', $errors, 'name', ['class' => 'form-control', 'placeholder' => __('Production name'), 'required' =>'required']) !!}

          {!! Form::select_options($errors, 'type', ['website' => __('Website'), 'mobile_app' => __('Mobile App')]) !!}

          {!! Form::control('text', $errors, 'url', ['class' => 'form-control', 'placeholder' => __('Production Url'), 'required' =>'required']) !!}

          {!! Form::control('text', $errors, 'author', ['class' => 'form-control', 'placeholder' => __('Author'), 'required' =>'required']) !!}

          {!! Form::control('text', $errors, 'tags', ['class' => 'form-control', 'placeholder' => __('Entrez les tags séparés par des virgules'), 'required' =>'required']) !!}

        </div>

        <div class="col-md-6">

          {!! Form::label('imageFile', __('Add Production Image')) !!}
          {!! Form::control('file', $errors, 'imageFile', ['class' => 'form-control', 'required' =>'required']) !!}

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
