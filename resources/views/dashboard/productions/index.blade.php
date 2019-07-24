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
        <h1 class="h3 mb-0 text-gray-800">{{ __('Productions') }}</h1>
        <a id="submit-form" href="{{route('production.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> {{  __('Add Production') }}</a>
    </div>

    <p>DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the official DataTables documentation.</p>

    <div class="container">
      <div class="row">
        <div class="card w-100">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <table id="dataTable" class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">{{ __('Name') }}</th>
                  <th scope="col">{{ __('Type') }}</th>
                  <th scope="col">{{ __('Description') }}</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
    

  </div>

@endsection

@section('scripts')

  <script type="text/javascript">
      $(function() {
          // Aside active link
          $('#mySidebar ul.navbar-nav > li.nav-item > a.nav-link:eq(1)').addClass('active');

          $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('get-productions-data') }}',
            columns: [
                        { data: 'name', name: 'name' },
                        { data: 'type', name: 'type' },
                        { data: 'description', name: 'description', orderable: false, searchable: false },
                        { data: 'show', name: 'show', orderable: false, searchable: false },
                        { data: 'edit', name: 'edit', orderable: false, searchable: false },
                        { data: 'delete', name: 'delete', orderable: false, searchable: false }
                    ]
          });
      });
  </script>
@endsection
