@extends('_partial._master')
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="articleDataTables" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var table = $('#articleDataTables').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('articles.list') }}",
                "columns": [
                    { "data": "title", name: 'title' },
                    { "data": "description", name: 'description', searchable: false, orderable: false },
                    { "data": "action", name: 'action', searchable: false, orderable: false, render: function(data, type, row) {
                        return `<a href="#" data-id="${row.id}" class="btn btn-danger deleteRecord">Delete</a>&nbsp;<a href="#${row.id}" class="btn btn-primary">Edit</a>`;
                        } }
                ]
            } );


            $('body').on('click', '.deleteRecord', function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                if(confirm('You are about to delete an article, which will not be revertable')) {
                    $.ajax({
                        url: "{{ route('delete.article') }}",
                        type: 'post',
                        data: {id: id},
                        success: function(response) {
                            console.log(response);
                            table.ajax.reload();
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }//.... end if() .....//

            })//..... end of delete event.
        });//.... end ready() .....//
    </script>
@endsection
