@extends('admin.layout')

@section('content')

<div class="page-header row justify-content-between">
  <h5>Code`s</h5>
  <div>
    <a href="{{ route('admin.code.add') }}" class="btn btn-sm btn-outline-secondary"><i class="fa fa-plus-square"></i> @lang('message.import')</a>
    <a href="{{ route('admin.code.clear') }}" class="btn btn-sm btn-outline-secondary">remove duplicates</a>
  </div>
</div>

<div class="position-relative">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Code</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      @foreach($codes as $code)
        <tr>
          <td>{{$code->code}}</td>
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