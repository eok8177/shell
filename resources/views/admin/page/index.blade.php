@extends('admin.layout')

@section('content')

<div class="page-header row justify-content-between">
  <h5>Block`s</h5>
  {{-- <a href="{{ route('admin.page.create') }}" class="btn btn-light"><i class="fa fa-plus-square"></i> @lang('message.create')</a> --}}
</div>

{{-- <div class="d-flex justify-content-center">
  <form class="input-group mb-3" action="{{ route('admin.page.index') }}" method="get" style="max-width: 600px;">
    <input type="text" class="form-control" placeholder="Search ..." name="search" value="{{$search}}">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit" >Search</button>
    </div>
  </form>
</div> --}}

<div class="position-relative">
  <div class="table-responsive">
    <table class="table table-hover sorted_table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      @foreach($pages as $page)
        <tr data-id="{{$page->id}}">
          <td><a href="{{ route('admin.page.edit', ['page'=>$page->id]) }}" class="btn">{{$page->title}}</a></td>
          <td class="text-center">
            <a href="{{ route('admin.page.edit', ['page'=>$page->id]) }}" class="btn fa fa-pencil" title="Edit"></a>
            {{-- <a href="{{ route('admin.page.destroy', ['page'=>$page->id]) }}" class="btn fa fa-trash-o delete" title="Delete"></a>
            <a href="{{route('admin.ajax.status', ['id' => $page->id, 'model' => 'Page', 'field' => 'show'])}}" class="status btn fa fa-{{$page->show ? 'check-circle' : 'times-circle'}}" title="Toggle Show"></a> --}}
          </td>
        </tr>

      @endforeach
    </table>
  </div>
</div>


@endsection


@push('scripts')
<script type="text/javascript">
  $(function  () {

    var group = $('.sorted_table').sortable({
      containerSelector: 'table',
      itemPath: '> tbody',
      itemSelector: 'tr',
      placeholder: '<tr class="placeholder"/>',
      onDrop: function ($item, container, _super) {
        var data = group.sortable("serialize").get()[0];
        // console.log(data);

        $.ajax({
            data: {order:data},
            type: 'PUT',
            dataType: 'json',
            url: '{{route('admin.ajax.reorder',['model'=>'Page'])}}'
        });

        _super($item, container);
      }
    });

  });
</script>
@endpush

@push('styles')
<style type="text/css">
  body.dragging, body.dragging * {
    cursor: move !important;
  }
  .dragged {
    position: absolute;
    opacity: 0.8;
    z-index: 2000;
    background: #FFF;
  }
  .sorted_table .placeholder {
    position: relative;
  }
  .sorted_table .placeholder:before {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    border: 5px solid transparent;
    border-left-color: red;
    margin-top: -5px;
    left: 0;
    border-right: none;
  }
</style>
@endpush