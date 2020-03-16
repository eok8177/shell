<div class="form-group">
  <label for="name">{{Lang::get('message.title')}}</label>
  {!! Form::textarea('title', $page->title, ['class' => 'form-control', 'rows' => '1']) !!}
</div>

<div class="form-group">
  <label for="name">{{Lang::get('message.text')}}</label>
  {!! Form::textarea('text', $page->text, ['class' => 'form-control editor']) !!}
</div>

<div class="custom-control custom-checkbox mb-2">
  {!! Form::hidden('show', 0) !!}
  {!! Form::checkbox('show', 1, $page->show, ['class' => 'custom-control-input', 'id' => 'show']) !!}
  <label for="show" class="custom-control-label">Show</label>
</div>

<div class="form-group">
  <input type="submit" value="{{Lang::get('message.save')}}" class="btn btn-secondary">
</div>
