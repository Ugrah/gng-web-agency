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

    div.result, div.question, div.restart {
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

<div class="container py-5">
    {!! Form::open(['url' => 'test', 'id' => 'dynamic-app-price']) !!}
        <div class="row previous">
            <div class="col">
                <a id="previous-button" href="#" class="">
                <i class="text-primary fas fa-arrow-left"></i> Precedent</a>
            </div>
            <div class="col text-center">
                <span class="question-count"></span>
            </div>
            <div class="col text-right amount">
                0
            </div>
        </div> 

        <div class="text-center question" data-question="0">
            <h4>Quel niveau de qualité recherchez-vous?</h4>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label px-4 pt-3 pb-0" for="qualityOptionRadio1">
                    <input class="form-check-input" type="radio" name="qualityOption" id="qualityOptionRadio1" value="option1" data-question="0" data-cost="550" required>
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=A">
                    <p class="mt-3">Qualité optimale</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label px-4 pt-3 pb-0" for="qualityOptionRadio2">
                    <input class="form-check-input" type="radio" name="qualityOption" id="qualityOptionRadio2" value="option2" data-question="0" data-cost="350">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=B">
                    <p class="mt-3">Bon rapport qualité/prix</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label px-4 pt-3 pb-0" for="qualityOptionRadio3">
                    <input class="form-check-input" type="radio" name="qualityOption" id="qualityOptionRadio3" value="option3" data-question="0" data-cost="200">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=C">
                    <p class="mt-3">La qualité importe peu</p>
                </label>
            </div>
        </div>

        <div class="text-center question" data-question="1">
            <h4>De quel type d'application mobile avez-vous besoin?</h4>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label px-4 pt-3 pb-0" for="typeOptionRadio1">
                    <input class="form-check-input" type="radio" name="typeOption" id="typeOptionRadio1" value="option1" data-question="1" data-cost="250" required>
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=A">
                    <p class="mt-3">Application Android</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label px-4 pt-3 pb-0" for="typeOptionRadio2">
                    <input class="form-check-input" type="radio" name="typeOption" id="typeOptionRadio2" value="option2" data-question="1" data-cost="250">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=B">
                    <p class="mt-3">Application iPhone</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label px-4 pt-3 pb-0" for="typeOptionRadio3">
                    <input class="form-check-input" type="radio" name="typeOption" id="typeOptionRadio3" value="option3" data-question="1" data-cost="450">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=C">
                    <p class="mt-3">Application Android + iPhone</p>
                </label>
            </div>
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

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn py-2 px-4 text-light submit rounded">Submit</button>
            </div>
            
        </div>
    {!! Form::close() !!}
    
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {

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
            if($activeQuestionIndex < 1)
                $('#previous-button').hide();
            else
                $('#previous-button').show();

            getQuestionRang();
        }

        //Init the form
        function InitDynamicForm() {
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

        // Run the dynamic form
        InitDynamicForm();

    });
</script>
@endsection