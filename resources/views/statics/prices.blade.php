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
                        {{ Html::carousel_prices($prices) }}
                    </div>

                    <div class="tab-pane fade" id="pills-mobile_app" role="tabpanel" aria-labelledby="pills-mobile_app-tab">
                        <div class="row justify-content-center">
                            
                            <div class="alert alert-success alert-dismissible fade show text-center d-none" role="alert">
                                {{trans('front/pages/prices.section0.mobile_app.success_notif')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div id="start-form" class="container py-5">
                                <div class="text-center start">
                                    <h3>{{trans('front/pages/prices.section0.mobile_app.start_title')}}</h3>
                                    <p class="mt-3">{{trans('front/pages/prices.section0.mobile_app.start_descr')}}</p>
                                </div>

                                <div class="row justify-content-center">
                                    <button id="start-button" type="submit" class="btn py-2 px-4 text-light submit rounded">{{trans('front/pages/prices.section0.mobile_app.start_button')}}</button>
                                </div>
                            </div>

                            <div id="form-step" class="container py-5">
                                {!! Form::open(['url' => 'prices', 'id' => 'dynamic-app-price', 'method' => 'POST']) !!}
                                    <div class="row previous">
                                        <div class="col">
                                            <a id="previous-button" href="#">
                                            <i class="text-primary fas fa-arrow-left"></i> {{trans('front/pages/prices.section0.mobile_app.previous_button_form')}}</a>
                                        </div>
                                        <div class="col text-center">
                                            <span class="question-count"></span>
                                        </div>
                                        <div class="col text-right">
                                            <span class="amount"></span>
                                        </div>
                                    </div> 

                                    <div class="text-center question" data-question="0">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item0.title')}}</h4>
                                        {{ Form::radio_label_img('qualityOptionRadio1', 'qualityOption', 'high', 0, 550, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item0.option0')) }}

                                        {{ Form::radio_label_img('qualityOptionRadio2', 'qualityOption', 'medium', 0, 350, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item0.option1')) }}

                                        {{ Form::radio_label_img('qualityOptionRadio3', 'qualityOption', 'not_important', 0, 200, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item0.option2')) }}
                                    </div>

                                    <div class="text-center question" data-question="1">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item1.title')}}</h4>
                                        {{ Form::radio_label_img('typeOptionRadio1', 'typeOption', 'ios', 1, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item1.option0')) }}

                                        {{ Form::radio_label_img('typeOptionRadio2', 'typeOption', 'android', 1, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item1.option1')) }}

                                        {{ Form::radio_label_img('typeOptionRadio3', 'typeOption', 'ios_and_android', 1, 400, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item1.option2')) }}
                                    </div>

                                    <div class="text-center question" data-question="2">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item2.title')}}</h4>
                                        {{ Form::radio_label_img('designOptionRadio1', 'designOption', 'simple', 2, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item2.option0')) }}

                                        {{ Form::radio_label_img('designOptionRadio2', 'designOption', 'custom', 2, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item2.option1')) }}

                                        {{ Form::radio_label_img('designOptionRadio3', 'designOption', 'like_website', 2, 200, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item2.option2')) }}
                                        
                                        {{ Form::radio_label_img('designOptionRadio4', 'designOption', 'minimalist', 2, 200, 'http://placehold.it/150/ccc/fff&text=D', trans('front/pages/prices.section0.mobile_app.questions.item2.option3')) }}
                                    </div>

                                    <div class="text-center question" data-question="3">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item3.title')}}</h4>
                                        {{ Form::radio_label_img('profitableOptionRadio1', 'profitableOption', 'free_with_ads', 3, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item3.option0')) }}

                                        {{ Form::radio_label_img('profitableOptionRadio2', 'profitableOption', 'pay', 3, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item3.option1')) }}

                                        {{ Form::radio_label_img('profitableOptionRadio3', 'profitableOption', 'pay_in_app', 3, 200, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item3.option2')) }}
                                        
                                        {{ Form::radio_label_img('profitableOptionRadio4', 'profitableOption', 'i_dont_know', 3, 200, 'http://placehold.it/150/ccc/fff&text=D', trans('front/pages/prices.section0.mobile_app.questions.item3.option3')) }}
                                    </div>

                                    <div class="text-center question" data-question="4">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item4.title')}}</h4>
                                        {{ Form::radio_label_img('loginOptionRadio1', 'loginOption', 'yes_rs_and_email', 4, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item4.option0')) }}

                                        {{ Form::radio_label_img('loginOptionRadio2', 'loginOption', 'yes_email', 4, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item4.option1')) }}

                                        {{ Form::radio_label_img('loginOptionRadio3', 'loginOption', 'none', 4, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item4.option2')) }}

                                        {{ Form::radio_label_img('loginOptionRadio4', 'loginOption', 'i_dont_know', 4, 250, 'http://placehold.it/150/ccc/fff&text=D', trans('front/pages/prices.section0.mobile_app.questions.item4.option3')) }}
                                        
                                    </div>

                                    <div class="text-center question" data-question="5">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item5.title')}}</h4>
                                        {{ Form::radio_label_img('userSpaceOptionRadio1', 'userSpaceOption', 'yes', 5, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item5.option0')) }}

                                        {{ Form::radio_label_img('userSpaceOptionRadio1', 'userSpaceOption', 'none', 5, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item5.option1')) }}

                                        {{ Form::radio_label_img('userSpaceOptionRadio1', 'userSpaceOption', 'i_dont_know', 5, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item5.option2')) }}
                                        
                                    </div>

                                    <div class="text-center question" data-question="6">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item6.title')}}</h4>
                                        {{ Form::radio_label_img('websiteIntagrationOptionRadio1', 'websiteIntagrationOption', 'yes', 6, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item6.option0')) }}
                                        
                                        {{ Form::radio_label_img('websiteIntagrationOptionRadio2', 'websiteIntagrationOption', 'none', 6, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item6.option1')) }}

                                        {{ Form::radio_label_img('websiteIntagrationOptionRadio3', 'websiteIntagrationOption', 'i_dont_know', 6, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item6.option2')) }}
                                        
                                    </div>

                                    <div class="text-center question" data-question="7">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item7.title')}}</h4>
                                        {{ Form::radio_label_img('adminSpaceOptionRadio1', 'adminSpaceOption', 'yes', 7, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item7.option0')) }}

                                        {{ Form::radio_label_img('adminSpaceOptionRadio2', 'adminSpaceOption', 'none', 7, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item7.option1')) }}

                                        {{ Form::radio_label_img('adminSpaceOptionRadio3', 'adminSpaceOption', 'i_dont_know', 7, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item7.option2')) }}
                                        
                                    </div>

                                    <div class="text-center question" data-question="8">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item8.title')}}</h4>
                                        {{ Form::radio_label_img('languageOptionRadio1', 'languageOption', 'one', 8, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item8.option0')) }}

                                        {{ Form::radio_label_img('languageOptionRadio1', 'languageOption', 'two', 8, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item8.option1')) }}

                                        {{ Form::radio_label_img('languageOptionRadio1', 'languageOption', 'more', 8, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item8.option2')) }}
                                        
                                    </div>

                                    <div class="text-center question" data-question="9">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item9.title')}}</h4>
                                        {{ Form::radio_label_img('advancedFeaturesOptionRadio1', 'advancedFeaturesOption', 'yes', 9, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item9.option0')) }}

                                        {{ Form::radio_label_img('advancedFeaturesOptionRadio2', 'advancedFeaturesOption', 'none', 9, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item9.option1')) }}

                                        {{ Form::radio_label_img('advancedFeaturesOptionRadio3', 'advancedFeaturesOption', 'i_dont_know', 9, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item9.option2')) }}
                                        
                                    </div>

                                    <div class="text-center question" data-question="10">
                                        <h4>{{trans('front/pages/prices.section0.mobile_app.questions.item10.title')}}</h4>
                                        {{ Form::radio_label_img('statusProjectOptionRadio1', 'statusProjectOption', 'just_an_idea', 10, 250, 'http://placehold.it/150/ccc/fff&text=A', trans('front/pages/prices.section0.mobile_app.questions.item10.option0')) }}

                                        {{ Form::radio_label_img('statusProjectOptionRadio2', 'statusProjectOption', 'draft_ready', 10, 250, 'http://placehold.it/150/ccc/fff&text=B', trans('front/pages/prices.section0.mobile_app.questions.item10.option1')) }}

                                        {{ Form::radio_label_img('statusProjectOptionRadio3', 'statusProjectOption', 'ongoing_development', 10, 250, 'http://placehold.it/150/ccc/fff&text=C', trans('front/pages/prices.section0.mobile_app.questions.item10.option2')) }}

                                        {{ Form::radio_label_img('statusProjectOptionRadio4', 'statusProjectOption', 'already_developed', 10, 250, 'http://placehold.it/150/ccc/fff&text=D', trans('front/pages/prices.section0.mobile_app.questions.item10.option3')) }}
                                        
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
                $('span.question-count').text( (parseInt($activeQuestionIndex)+1) + '/'+ parseInt($('div.question').length));
            }

            // Display the active question from active index 
            function displayActiveQuestion() {
                $('div.question').hide();
                $('div[data-question="'+ parseInt($activeQuestionIndex) +'"]').show();
                if(parseInt($activeQuestionIndex) <= 0){
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
                        $activeQuestionIndex = parseInt($(this).attr('data-question')) + 1;
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