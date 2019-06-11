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
        <div class="text-center">
            <h4>Quel niveau de qualité recherchez-vous?</h4>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="inlineRadio1">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" required>
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=A">
                    <p>Qualité optimale</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="inlineRadio2">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=B">
                    <p>Bon rapport qualité/prix</p>
                </label>
            </div>
            <div class="text-center form-check form-check-inline">
                <label class="form-check-label" for="inlineRadio3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                    <img class="img-fluid" src="http://placehold.it/40x60/0bf/fff&text=C">
                    <p>Bon rapport qualité/prix</p>
                </label>
            </div>
        </div>  



        <div class="form-group row">
            <div class="col">
                <a href="#" class="">
                <i class="text-primary fas fa-arrow-left"></i> Precedent</a>
            </div>
            <div class="col text-right amount">
                amount
            </div>
        </div>      
    </form>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#dynamic-app-price .form-check-input').change(function() {
            console.log( $(this).attr('value') );
            $('.amount').text($(this).attr('value'));
        });
    });
</script>
@endsection