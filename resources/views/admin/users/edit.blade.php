@extends('master')

@section('contenido')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
  @if (Session::has('errors'))
    <div class="alert alert-danger" role="alert">
      @foreach($errors as $err)
        <p>{{$err}}</p>
      @endforeach
    </div>
  @endif
    <form method="post">
      {{csrf_field()}}
      {{method_field($method)}}
      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control" name="name" value="{{$user->name}}" />
      </div>
      <div class="form-group">
        <label>Username</label>
        <input class="form-control" name="username" value="{{$user->username}}" />
      </div>
      <div class="form-group">
        <label>Email</label>
        <input class="form-control" name="email" value="{{$user->email}}" />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" autocomplete="off" />
      </div>
      <div class="form-group">
        <button class="btn btn-success" type="submit">
          Guardar
        </button>
        &nbsp;
        <a href="/admin/users">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
