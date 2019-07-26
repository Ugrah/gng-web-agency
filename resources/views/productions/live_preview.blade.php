@extends('layouts.app')

@section('content')


<section class="py-5">
    
</section>

@endsection


@section('scripts')
<script type="text/javascript">
    $(function() {
        // Navbar active links
        // $('#standardNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active text-muet');
        // $('#fixedNavbarCollapse ul.navbar-nav > li.nav-item:eq(5)').addClass('active');

        //Item production hover link effect
        $('a.item-preview-img')
            .mouseenter(function(){
                $(this).children('img.card-img').addClass('animate')
            }).mouseleave(function(){
                $(this).children('img.card-img').removeClass('animate')
            });
    });
</script>
@endsection