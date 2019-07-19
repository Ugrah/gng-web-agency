@extends('layouts.admin')

@section('content')

  <div class="container-fluid p-4">
    <!-- Page notification -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Productions list') }}</h1>
    </div>
  </div>

@endsection

@section('scripts')

  <script type="text/javascript">
      $(function() {
          // Aside active link
          $('#mySidebar ul.navbar-nav > li.nav-item > a.nav-link:eq(1)').addClass('active');
      });
  </script>
@endsection
