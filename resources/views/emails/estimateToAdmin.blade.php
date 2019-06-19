@extends('layouts.email')

@section('styles')

@endsection

@section('content')

<section>
    <div>
        <p>Un utilisateur vient de réaliser un devis via votre simulateur de coût d'une application mobile sur votre site.</p>
        <p>Le prix de son projet est de <span class="bold">{{ $amount }}</span> euros H.T. (+ ou – 20%). Et la référence de simulation est <span class="bold">{{ $estimateCode}}</span>.</p>
        <br>
        <p>Aller à votre espace admin.</p>
        <br>
        <p style="text-align: center"><a class="btn-custom-gradient rounded" href="{{url('/dashboard')}}" target="_blank">Cliquez-ici</a></p>
    </div>
</section>

@endsection
