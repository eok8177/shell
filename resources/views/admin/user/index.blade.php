@extends('admin.layout')

@section('content')
<div class="page-header row justify-content-between">
  <h2>@lang('message.users')</h2>
</div>

<div class="row border-bottom p-1 mb-0 h5">
  <div class="col">@lang('message.id')</div>
  <div class="col">@lang('message.name')</div>
  <div class="col">@lang('message.login')</div>
  <div class="col">@lang('message.email')</div>
  <div class="col">@lang('message.role')</div>
  <div class="col">@lang('message.actions')</div>
</div>
@foreach($users as $user)
  <div class="row border-top p-1">
    <div class="col">
      <a href="{{ route('admin.user.edit', $user->id) }}" title="Edit">{{$user->id}}</a>
    </div>
    <div class="col">{{$user->name}}</div>
    <div class="col">{{$user->login}}</div>
    <div class="col">{{$user->email}}</div>
    <div class="col">{{$user->role}}</div>
    <div class="col">
      <a href="{{ route('admin.user.edit', ['user'=>$user->id]) }}" class="btn fa fa-pencil"></a>
      @if($user->id != Auth::user()->id)
        <a href="{{ route('admin.user.destroy', ['user'=>$user->id]) }}" class="btn fa fa-trash-o delete"></a>
      @endif
    </div>
  </div>

@endforeach

@endsection