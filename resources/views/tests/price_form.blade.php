@extends('layouts.app')

@section('styles')
<style>
    ul.nav-pills li.nav-item a.nav-link {
        border: 1px solid #428bca; margin: 0.5em;
    }

    ul.nav-pills li.nav-item a.nav-link.active, a.price {
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

    /* DYNAMIC FORM */ 
    /* HIDE RADIO */
    #dynamic-app-price [type=radio] { 
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
    }
    /* IMAGE STYLES */
    #dynamic-app-price [type=radio] + img, #dynamic-app-price label {
    cursor: pointer;
    }
    /* CHECKED STYLES */
    #dynamic-app-price [type=radio]:checked + img {
    outline: 2px solid #f00;
    }

</style>
@endsection

@section('content')

<div class="container py-5">
    <form id="dynamic-app-price" action="">
        <div class="form-group row">
            <div class="col">
                <a href="#" class="">
                <i class="text-primary fas fa-arrow-left"></i> Precedent</a>
            </div>
            <div class="col text-right amount">
                0
            </div>
        </div> 

        <div class="text-center">
            <h4>Quel niveau de qualité recherchez-vous?</h4>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="qualityOptionRadio1">
                    <input class="form-check-input" type="radio" name="qualityOption" id="qualityOptionRadio1" value="option1" data-cost="550" required>
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=A">
                    <p>Qualité optimale</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="qualityOptionRadio2">
                    <input class="form-check-input" type="radio" name="qualityOption" id="qualityOptionRadio2" value="option2" data-cost="350">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=B">
                    <p>Bon rapport qualité/prix</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="qualityOptionRadio3">
                    <input class="form-check-input" type="radio" name="qualityOption" id="qualityOptionRadio3" value="option3" data-cost="200">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=C">
                    <p>La qualité importe peu</p>
                </label>
            </div>
        </div>

        <div class="text-center">
            <h4>De quel type d'application mobile avez-vous besoin?</h4>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="typeOptionRadio1">
                    <input class="form-check-input" type="radio" name="typeOption" id="typeOptionRadio1" value="option1" data-cost="250" required>
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=A">
                    <p>Application Android</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="typeOptionRadio2">
                    <input class="form-check-input" type="radio" name="typeOption" id="typeOptionRadio2" value="option2" data-cost="250">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=B">
                    <p>Application iPhone</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="typeOptionRadio3">
                    <input class="form-check-input" type="radio" name="typeOption" id="typeOptionRadio3" value="option3" data-cost="450">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=C">
                    <p>Application Android + iPhone</p>
                </label>
            </div>
        </div> 
    </form>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {
        var options = [];

        // Represente an option of the form
        class Option {
            constructor(name, choise, cost) {
                this.name = name;
                this.choise = choise;
                this.cost = cost;
            }
        }

        // Calculate the total amount from the options array
        function getTotalAmount() {
            var totalAmount = 0;
            for (let i = 0; i < options.length; ++i){
                totalAmount += parseInt(options[i].cost);
            }
            $('.amount').text(totalAmount);
        }

        function InitDynamicForm() {
            $('#dynamic-app-price .form-check-input').change(function() {
                var newOption = options.find(item => item.name === $(this).attr('name'));

                if(newOption){
                    console.log('Option present in array. Update value.');
                    newOption.choise = $(this).attr('value');
                    newOption.cost = $(this).attr('data-cost');
                    console.log(options);
                } else {
                    console.log('Option is not present in array. Add new option.');
                    options.push( new Option($(this).attr('name'), $(this).attr('value'), $(this).attr('data-cost')) );
                }
                getTotalAmount();
            });
        }

        InitDynamicForm();
    });
</script>
@endsection