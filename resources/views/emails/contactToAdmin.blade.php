@extends('layouts.email')

@section('styles')

@endsection

@section('content')

<section>
    <div>
        <p>Bonjour Admin<br>
        Un utilisateur vous a contacté sur votre site web.</p>
        <ul>
            @if(isset($name)) <li>Nom : <span>{{ $name }}</span></li> @endif
            @if(isset($name)) <li>Email : <span>{{ $email }}</span></li>@endif
            @if(isset($name)) <li>Sujet : <span>{{ $subject }}</span></li>@endif
            @if(isset($name))
                <li>Message : 
                    <span>{{ $message }}</span>
                </li>
            @endif
        </ul>
    </div>
</section>

@endsection
