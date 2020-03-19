@extends('admin.layout')

@section('content')

<div class="page-header row justify-content-between">
  <h5>Import Code`s</h5>
</div>

{!! Form::open(['route' => ['admin.code.import'], 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
  <div class="custom-file mb-3">
    <label for="file" class="custom-file-label">{{Lang::get('message.file')}}</label>
    <input type="file" name="codes" class="custom-file-input" id="file">
  </div>

  <div class="form-group">
    <input type="submit" value="{{Lang::get('message.import')}}" class="btn btn-secondary">
  </div>
{!! Form::close() !!}

@endsection