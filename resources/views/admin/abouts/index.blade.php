@extends('layouts.admin.app')

@section('assets-top')
    <!-- Page level plugin CSS-->
    <link href="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.abouts.index') }}">Abouts</a>
            </li>
            <li class="breadcrumb-item active">Table</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-list"></i> About Us
                {{-- <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary pull-right">Add New</a> --}}
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>About</th>
                        <th>Vision</th>
                        <th>Mission</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>About</th>
                      <th>Vision</th>
                      <th>Mission</th>
                      <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('assets-bottom')
<!-- Page level plugin JavaScript-->
<script src="{{ asset('assets/blog-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/blog-admin/vendor/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/blog-admin/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#dataTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.datatable.abouts') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'about', name: 'about'},
                {data: 'vision', name: 'vision'},
                {data: 'mission', name: 'mission'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection