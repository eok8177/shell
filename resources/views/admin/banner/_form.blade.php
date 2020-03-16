<div class="form-group">
  <label for="name">{{Lang::get('message.title')}}</label>
  {!! Form::textarea('title', $banner->title, ['class' => 'form-control', 'rows' => '1']) !!}
</div>

<div class="form-group">
  <label>@lang('message.image')</label>
  <div class="image-lfm">
    <img id="imagePreview" class="image-src" style="margin-top:15px;max-height:100px;" src="{{ $banner->image }}">
    <div class="mt-1">
      <a data-input="imageInput" data-preview="imagePreview" class="lfm btn btn-light text-primary">
        <i class="fa fa-picture-o"></i> @lang('message.select')
      </a>
      <a id="delete-image" class="delete-image btn btn-light text-danger {{($banner->image) ? '' : 'd-none'}}">
        <i class="fa fa-trash"></i> @lang('message.delete')
      </a>
    </div>
    <input id="imageInput" class="form-control image-input" type="hidden" name="image" value="{{ $banner->image }}">
  </div>
</div>


<div class="custom-control custom-checkbox mb-2">
  {!! Form::hidden('show', 0) !!}
  {!! Form::checkbox('show', 1, $banner->show, ['class' => 'custom-control-input', 'id' => 'show']) !!}
  <label for="show" class="custom-control-label">Show</label>
</div>

<div class="form-group">
  <input type="submit" value="{{Lang::get('message.save')}}" class="btn btn-secondary">
</div>
