
<input type="text" name="" class="autofeel-hack">
<input type="password" name="" class="autofeel-hack">

  <div class="form-group">
    <label for="name">{{Lang::get('message.login')}}</label>
    <input type="text" name="login" value="{{$user->login}}" class="form-control">
  </div>

  <div class="form-group">
    <label for="name">{{Lang::get('message.name')}}</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control">
  </div>

  <div class="form-group">
    <label for="email">{{Lang::get('message.email')}}</label>
    <input type="text" name="email" value="{{$user->email}}" class="form-control">
  </div>

  <div class="form-group">
    <label for="role">{{Lang::get('message.role')}}</label>
    {!! Form::select('role', ['user' => 'user', 'admin' => 'Admin'], $user->role, ['class' => 'form-control']) !!}
  </div>

  <hr>


  <div class="form-group">
    <label for="">{{Lang::get('message.new_password')}}</label>
    <input type="password" name="password" class="form-control">
  </div>

  <div class="form-group">
      <input type="submit" value="{{Lang::get('message.save')}}" class="btn btn-secondary">
  </div>


@push('styles')
  <style type="text/css">
    .autofeel-hack {
      position: absolute;
      top: -999px;
    }
  </style>
@endpush