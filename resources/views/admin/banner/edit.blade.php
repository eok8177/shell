@extends('admin.layout')

@section('content')
<h2 class="page-header">Banner: <small>{{ $banner->title }}</small></h2>

{!! Form::open(['route' => ['admin.banner.update', $banner->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
  @include('admin.banner._form')
{!! Form::close() !!}

@endsection