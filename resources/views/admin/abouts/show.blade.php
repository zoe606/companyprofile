@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="{{ route('admin.abouts.index')}}">Abouts</a>
        </li>
        <li class="breadcrumb-item active">Abouts Detail</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    About Detail : {{ $abouts->id }}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <tr>
                          <th>About</th>
                          <td>{{ $abouts->about }}</td>
                      </tr>
                      <tr>
                          <th>Vision</th>
                          <td>{{ $abouts->vision }}</td>
                      </tr>
                      <tr>
                          <th>Mission </th>
                          <td>{{ $abouts->mission }}</td>
                      </tr>
                      <tr>
                        
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection