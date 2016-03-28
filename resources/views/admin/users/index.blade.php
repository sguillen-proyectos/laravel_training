@extends('master')

@section('contenido')
<a href="/admin/users/create">Nuevo Usuario</a>
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Email</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          <a href="/admin/users/{{$user->id}}/edit">Editar</a>
          &nbsp;
          <a href="#" data-id="{{$user->id}}">Borrar</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<p><b>Total en la página: </b>{{$users->count()}}</p>
<p><b>Total: </b>{{$users->total()}}</p>

{!! $users->render() !!}
@endsection
