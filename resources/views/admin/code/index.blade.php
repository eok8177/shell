@extends('admin.layout')

@section('content')

<div class="page-header row justify-content-between">
  <h5>Code`s</h5>
  <div>
    <a href="{{ route('admin.code.add') }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus-square"></i> @lang('message.import')</a>
    <a href="{{ route('admin.code.clear') }}" class="btn btn-sm btn-outline-secondary">remove duplicates</a>
  </div>
</div>

<div class="d-flex justify-content-center">

  <div class="dropdown">
    <a class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dropdownUsed" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $select_used[$used] }}</a>

    <div class="dropdown-menu" aria-labelledby="dropdownUsed">
      @foreach($select_used as $id => $item)
        <a class="dropdown-item" href="{{ route('admin.code.index', ['used' => $id]) }}" >{{$item}}</a>
      @endforeach
    </div>
  </div>

  <form class="input-group mb-3" action="{{ route('admin.code.index') }}" method="get" style="max-width: 600px;">
    <input type="text" class="form-control" placeholder="Search ..." name="search" value="{{$search}}">
    <input type="hidden" name="used" value="{{$used}}">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" >Search</button>
    </div>
  </form>
</div>

<div class="position-relative">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Code</th>
          <th scope="col">Used</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      @foreach($codes as $code)
        <tr>
          <td>{{$code->code}}</td>
          <td>
            @if($code->used)
            <i class="fa fa-check-circle"></i>
            @endif
          </td>
          <td class="text-center">
            <a href="{{ route('admin.code.destroy', ['code'=>$code->id]) }}" class="btn fa fa-trash-o delete" title="Delete"></a>
          </td>
        </tr>

      @endforeach
    </table>
  </div>
</div>

{{ $codes->appends(request()->except('page'))->links('admin.parts.pagination') }}

@endsection