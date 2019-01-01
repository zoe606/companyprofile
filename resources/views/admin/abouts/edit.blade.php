@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="{{ route('admin.abouts.index')}}">Abouts</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
        {!! Form::model($abouts, [
          'route' => [
            'admin.abouts.update', $abouts->id
            ],
             'method' => 'PUT']) !!}
            @include('admin.abouts._form')
        {!! Form::close() !!}
    </div>
@endsection