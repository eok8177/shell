@extends('admin.layout')

@section('content')
<h2 class="page-header">Page</h2>

{!! Form::open(['route' => ['admin.page.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}
  @include('admin.page._form')
{!! Form::close() !!}

@endsection