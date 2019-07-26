<html lang="en">
<head>
    <title>Laravel DataTables Tutorial Example</title>
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {!! Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') !!}
        {!! Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') !!}

</head>
      <body>
         <div class="container">
            <h2>Laravel DataTables Tutorial Example</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Type</th>
                     <th>Show</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
               </thead>
            </table>
         </div>
       <script>
         $(function() {
            $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('production-list') }}',
            columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'type', name: 'type' },
                        { data: 'show', name: 'show', orderable: false, searchable: false },
                        { data: 'edit', name: 'edit', orderable: false, searchable: false },
                        { data: 'delete', name: 'delete', orderable: false, searchable: false }
                    ]
            });
         });
         </script>
   </body>
</html>