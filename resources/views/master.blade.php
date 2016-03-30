<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/dataTables.bootstrap.min.css">
</head>
<body>
<div class="row" style="background: #F1FFA4">
  <div class="col-md-11" >
    <h1>CABECERA</h1>
  </div>
{{-- Verifica si el usuario ha iniciado sesion para mostrar el link de logout --}}
@if(Auth::check())
  <div class="col-md-1">
    {{Auth::user()->username}}
    <a href="/auth/logout">Logout</a>
  </div>
@endif
</div>
<div class="row">
  <div class="col-md-3" style="background: #BDBDBD; padding-left: 30px;">
    <h2>Menu</h2>
    <a href="/entradas">Entradas</a>
    <h2>Administración</h2>
    <a href="/admin/entradas">Entradas</a>
    <br>
    <a href="/admin/users">Usuarios</a>
    <br>
    <a href="/admin/users2">Usuarios (DataTable)</a>
  </div>
  <div class="col-md-9">
    @yield('contenido')
  </div>
</div>
<script src="/assets/js/jquery-1.12.0.min.js"></script>
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>
