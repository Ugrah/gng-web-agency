@extends('layouts.admin')

@section('styles')

<style>
#dataTable tbody tr:hover {cursor: pointer;}
table#dataTable tbody tr.odd:hover, table#dataTable tbody tr.even:hover {
  background-color: #ffa !important;
  width: 100%;
  box-shadow: 0px 2px 10px 0px rgba(0,0,0,0.5);
  z-index: 99999;
}
</style>

@endsection

@section('content')

  <div class="container-fluid p-4">
    <!-- Page notification -->
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('ok') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('User Messages') }}</h1>
        <a id="submit-form" href="{{route('production.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> {{  __('Add Fun') }}</a>
    </div>

    <p>DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the official DataTables documentation.</p>

    <div class="container">
      <div class="row">
        <div class="card w-100">
          <div class="card-header">
            Featured
          </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm">
              <thead class="thead-dark">
                <tr class="">
                  <th scope="col">{{ __('Sender\'s Name') }}</th>
                  <th scope="col">{{ __('subject') }}</th>
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
        //$('#mySidebar ul.navbar-nav > li.nav-item > a.nav-link:eq(1)').addClass('active');

        // Dismissible alert
        if($('div.alert-success').css('display') === 'block'){
            setTimeout(function() { 
                $('div.alert-success').fadeOut('slow');
            }, 5000);
        }

        $('#dataTable').DataTable({
        	processing: true,
        	serverSide: true,
        	ajax: '{{ url('get-user-message-data') }}',
        	createdRow: function( row, data, dataIndex ) {
                $(row).attr('data-message', data.id);
        	},
          	columns: [
				{ data: 'name', name: 'name' },
				{ data: 'subject', name: 'subject' },
				{ data: 'actions', name: 'actions', orderable: false, searchable: false }
			]
        });

        /* Event - Click on One user message - Go to show single user message page */
        $('#dataTable').on('click', 'tbody tr', function(e){
            e.preventDefault();
            var $elt = $(this);
            $.ajax({
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                url: $elt.find('a.status-button').attr('href'),
                dataType: 'json'
            }).done(function(data) {
                console.log('Action done');
            }).fail(function(data) {
                alert('Impossible to edit Message');
            });
        });
        /* End Ajax request */

      });
  </script>
@endsection