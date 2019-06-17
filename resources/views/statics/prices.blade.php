@extends('layouts.app')

@section('styles')
<style>
    ul.nav-pills li.nav-item a.nav-link {
        border: 1px solid #428bca; margin: 0.5em;
    }

    ul.nav-pills li.nav-item a.nav-link.active, a.price, button.submit {
        border-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
        background-image: linear-gradient(to right top, #1ee6bf, #36e7ac, #4fe798, #67e681, #7fe569);
    }

    .gradient-blue, a.price:hover {
        background-image: linear-gradient(to right top, #56c7fb, #3eb7fc, #38a5fc, #4892f7, #617ced);
        color: #fff;
    }

    .gradient-and-image {
        background-image: linear-gradient(to right top, rgba(232, 123, 192,0.9), rgba(225, 109, 203,0.9), rgba(211, 98, 218,0.9), rgba(190, 91, 234,0.9), rgba(158, 89, 253,0.9)), url(https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);
        background-position: center center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: cover;
    }

    div#form-step, a#previous-button, div.result, div.question, div.restart {
        display: none;
    }

    /* DYNAMIC FORM */ 
    /* HIDE RADIO */
    #dynamic-app-price [type=radio] { 
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    /* IMAGE STYLES */
    #dynamic-app-price label {
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<div style="height: 70vh; background-image: linear-gradient(to right top, rgba(232, 123, 192, 0.9), rgba(225, 109, 203, 0.9), rgba(211, 98, 218, 0.9), rgba(190, 91, 234, 0.9), rgba(158, 89, 253, 0.9)), url('https://images.unsplash.com/photo-1459257831348-f0cdd359235f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'); background-repeat: no-repeat; background-size: cover; background-position: center bottom; background-attachment: fixed;" class="position-relative">
    {{ Html::navbar_default() }}


    <div class="position-absolute w-100 text-center text-white px-2" style="top: 45%;">
        <h1>{{ trans('front/pages/prices.title') }}</h1>
    </div>
</div>

<section class="py-5">
    <h2 class="text-center wow bounceInLeft display-4 px-2">{{ trans('front/pages/prices.section0.title')}}</h2>
    <p class="col-10 col-md-8 mx-auto text-center wow bounceInRight">{{ trans('front/pages/prices.section0.description')}}</p>
    <div class="container">
        <div class="row justify-content-around py-5">
            <div class="col">
                <ul class="row nav nav-pills justify-content-center mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded active" id="pills-website-tab" data-toggle="pill" href="#pills-website" role="tab" aria-controls="pills-website" aria-selected="true">{{trans('front/pages/prices.section0.website.name')}}</a>
                    </li>
                    <li class="nav-item col-10 col-md-4 text-center px-1">
                        <a class="nav-link rounded" id="pills-mobile_app-tab" data-toggle="pill" href="#pills-mobile_app" role="tab" aria-controls="pills-mobile_app" aria-selected="false">{{trans('front/pages/prices.section0.mobile_app.name')}}</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-website" role="tabpanel" aria-labelledby="pills-website-tab">
                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.showcase.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.showcase.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['showcase'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.portfolio.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.portfolio.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['portfolio'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.e_commerce.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.e_commerce.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['e_commerce'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-3">
                            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.catalog.title')}}</h3>
                            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.catalog.description')}}</p>
                            <div class="container">
                                <div class="card-columns text-center">
                                    @foreach($prices['catalog'] as $price)
                                    <div class="card wow bounceIn">
                                        <div class="card-header bg-primary">
                                        <h4 class="text-white nopadding">{{$price['title']}}</h4>
                                        </div>
                                        <div class="card-body nopadding bg-light">
                                        <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
                                        <p class="card-text display-4">{{$price['amount']}} <span style="font-size: 0.5em">Dh</span></p>

                                        <ul class="list-group mb-3">
                                            @foreach($price['options'] as $option)
                                            <li class="list-group-item">{{$option}}</li>
                                            @endforeach
                                        </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-mobile_app" role="tabpanel" aria-labelledby="pills-mobile_app-tab">
                        <div class="row justify-content-center">
                            
                            <div class="alert alert-success alert-dismissible fade show text-center d-none" role="alert">
                                Votre Devis estimatif a été envoyé avec succès !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div id="start-form" class="container py-5">
                                <div class="text-center start">
                                    <h3>Combien coûte la création de mon application ?</h3>
                                    <p class="mt-3">Calculez rapidement le coût pour créer votre application en répondant à ces questions.</p>
                                </div>

                                <div class="row justify-content-center">
                                    <button id="start-button" type="submit" class="btn py-2 px-4 text-light submit rounded">Calculer</button>
                                </div>
                            </div>

                            <div id="form-step" class="container py-5">
                                {!! Form::open(['url' => 'test', 'id' => 'dynamic-app-price', 'method' => 'POST']) !!}
                                    <div class="row previous">
                                        <div class="col">
                                            <a id="previous-button" href="#">
                                            <i class="text-primary fas fa-arrow-left"></i> Precedent</a>
                                        </div>
                                        <div class="col text-center">
                                            <span class="question-count"></span>
                                        </div>
                                        <div class="col text-right">
                                            <span class="amount"></span>
                                        </div>
                                    </div> 

                                    <div class="text-center question" data-question="0">
                                        <h4>Quel niveau de qualité recherchez-vous?</h4>
                                        {{ Form::radio_label_img('qualityOptionRadio1', 'qualityOption','option1', 0, 550, 'http://placehold.it/150/ccc/fff&text=A', 'Qualité optimale') }}

                                        {{ Form::radio_label_img('qualityOptionRadio2', 'qualityOption','option2', 0, 350, 'http://placehold.it/150/ccc/fff&text=B', 'Bon rapport qualité/prix') }}

                                        {{ Form::radio_label_img('qualityOptionRadio3', 'qualityOption','option3', 0, 200, 'http://placehold.it/150/ccc/fff&text=C', 'La qualité importe peu') }}
                                    </div>

                                    <div class="text-center question" data-question="1">
                                        <h4>De quel type d'application mobile avez-vous besoin?</h4>
                                        {{ Form::radio_label_img('typeOptionRadio1', 'typeOption','option1', 1, 250, 'http://placehold.it/150/ccc/fff&text=A', 'Application Android') }}

                                        {{ Form::radio_label_img('typeOptionRadio2', 'typeOption','option2', 1, 250, 'http://placehold.it/150/ccc/fff&text=B', 'Application iPhone') }}

                                        {{ Form::radio_label_img('typeOptionRadio3', 'typeOption','option3', 1, 200, 'http://placehold.it/150/ccc/fff&text=C', 'Application Android + iPhone') }}
                                    </div> 


                                    <div class="row restart">
                                        <div class="col">
                                            <a id="restart-button" href="#" class="">
                                            <i class="text-primary fas fa-arrow-left"></i> Recommencer</a>
                                        </div>
                                    </div> 
                                    <div class="text-center result">
                                        <h4>Le coût estimé de votre application est</h4>
                                        <span class="display-4 amount"></span>
                                        {!! Form::control('text', $errors, 'email', ['class' => 'form-control rounded', 'placeholder' => 'Votre email', 'required'=> 'required']) !!}

                                        <div class="row justify-content-center">
                                            <button type="submit" class="btn py-2 px-4 text-light submit rounded">Envoyer votre devis</button>
                                        </div>
                                        
                                    </div>
                                {!! Form::close() !!}
                            </div>

                            <!--
                            <div class="col-10 col-md-7">
                                <h3>{{trans('front/pages/prices.section0.mobile_app.title')}}</h3>
                                <p>{{trans('front/pages/prices.section0.mobile_app.content')}}</p>
                            </div>
                            <div class="col-10 col-md-5">
                                <img src="https://images.unsplash.com/photo-1494366222322-387658a1a976?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80" class="img-fluid float-right" alt="">
                            </div>
                            -->
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(4)').addClass('active text-muet');
        $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(4)').addClass('active');

        // Reset Status
        function resetStatus(){  
            $('div#form-step').hide();
            $('a#previous-button').hide();
            $('div.result').hide();
            $('div.question').hide();
            $('div.restart').hide();
            $('#start-form').show();

        }

        // Run the dynamic form (The function contains all the necessary variables)
        $('#start-button').click(function(){
            // Initial values
            var options = [];
            var $activeQuestionIndex = 0;

            // Represente an option of the form
            class Option {
                constructor(name, choise, cost) {
                    this.name = name;
                    this.choise = choise;
                    this.cost = cost;
                }
            }

            $('div.previous').hide();

            $('#dynamic-app-price div.form-check.form-check-inline')
            .mouseenter(function(){
                $(this).css('background-color', 'rgba(224, 224, 224, 0.7)');
                $(this).animate({ bottom: '+=10px'}, 'fast' );
            }).mouseleave(function(){
                $(this).css('background-color', 'transparent');
                $(this).animate({ bottom: '-=10px' }, 'fast' );
            });

            $('#dynamic-app-price input.form-check-input').on('change', function() {
                $('#dynamic-app-price input.form-check-input').parent().css( 'background-color', 'transparent' );

                if( $(this).is(':checked') ) {
                    $(this).parent().css( 'background-color', 'rgba(224, 224, 224, 1)' );
                }
            });

            // Previous button
            $('#previous-button').click(function(e){
                e.preventDefault();
                if($activeQuestionIndex > 0) {
                    $activeQuestionIndex--;
                    displayActiveQuestion();
                }
            });

            // Restart button
            $('#restart-button').click(function(e){
                e.preventDefault();
                options = [];
                $activeQuestionIndex = 0;

                $('div.restart').hide();
                $('div.result').hide();
                $('div.previous').show();

                displayActiveQuestion();
                getTotalAmount();
            });

            // Calculate the total amount from the options array
            function getTotalAmount() {
                var totalAmount = 0;
                for (let i = 0; i < options.length; ++i){
                    totalAmount += parseInt(options[i].cost);
                }
                $('.amount').text(totalAmount);
            }

            function getQuestionRang() {
                $('span.question-count').text($activeQuestionIndex+1+'/'+$('div.question').length);
            }

            // Display the active question from active index 
            function displayActiveQuestion() {
                $('div.question').hide();
                $('div[data-question="'+ $activeQuestionIndex +'"]').show();
                if($activeQuestionIndex <= 0){
                    $('#previous-button').hide();
                    $('.amount').hide();
                }
                else{
                    $('#previous-button').show();
                    $('.amount').show();
                }

                getQuestionRang();
            }

            //Init the form
            function InitDynamicForm() {
                $('#form-step').fadeIn();
                $('div.previous').fadeIn();
                displayActiveQuestion();
                $('#dynamic-app-price .form-check-input').click(function() {
                    var newOption = options.find(item => item.name === $(this).attr('name'));

                    if(newOption){
                        newOption.choise = $(this).attr('value');
                        newOption.cost = $(this).attr('data-cost');
                    } else {
                        options.push( new Option($(this).attr('name'), $(this).attr('value'), $(this).attr('data-cost')) );
                    }

                    if($activeQuestionIndex < $('div.question').length - 1) {
                        $activeQuestionIndex = parseInt($(this).attr('data-question') + 1);
                        displayActiveQuestion();
                    } else {
                        $('div.question').hide();
                        $('div.previous').hide();
                        $('div.result').show();
                        $('div.restart').show();
                    }
                    getTotalAmount();
                });
            }

            $('#start-form').hide();
            InitDynamicForm();
        });

        // Submit dynamic form price
        $('#dynamic-app-price').on('submit', function(e) {  
            e.preventDefault();
            
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json'
            })
            .done(function(data) {
                $('#restart-button').trigger('click');
                $('.alert-success').removeClass('d-none');
                setTimeout(function(){$('.alert-success').addClass('d-none');}, 4000);
                resetStatus();
            })
            .fail(function(data) {
                console.log('Error, Please retry');
            });
        });
    });
</script>
@endsection