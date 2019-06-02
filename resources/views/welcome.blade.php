@extends('layouts.app')

@section('styles')
    <style>
        
    </style>
@endsection

@section('header')
    
@endsection

@section('content')
    <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="img-fluid" src="https://images.unsplash.com/photo-1546146830-2cca9512c68e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" alt="" width="100%">
        <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
        </div>   
        </div>
        <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="Chicago" width="100%">
        <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
        </div>   
        </div>
        <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1514428631868-a400b561ff44?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="New York" width="100%">
        <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
        </div>   
        </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
    </div>

    <h1>Hello, world!</h1>
@endsection

@section('footer')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
        });
    </script>
@endsection