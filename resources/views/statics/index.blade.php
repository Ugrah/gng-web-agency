@extends('layouts.app')

@section('content')
<div style="height: 100vh; background-image: linear-gradient(to right, #e87bc0, #e16dcb, #d362da, #be5bea, #9e59fd);" class="position-relative">

    @include('blocs.navbar2')

    @include('blocs.carousel-home')
</div>

    <h1>Hello, world!</h1>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            // Navbar active links
            $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(0)').addClass('active');
            $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(0)').addClass('active');
        });
    </script>
@endsection