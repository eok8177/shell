@extends('admin.layout')

@section('content')
<h2 class="page-header">Banner</h2>

{!! Form::open(['route' => ['admin.banner.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
  @include('admin.banner._form')
{!! Form::close() !!}

@endsection