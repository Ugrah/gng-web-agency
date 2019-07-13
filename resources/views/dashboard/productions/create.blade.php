@extends('layouts.admin')

@section('content')

  <div class="container-fluid p-4">
    <!-- Page notification -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    Portfolio Create
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
