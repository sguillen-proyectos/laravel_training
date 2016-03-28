@extends('master')

@section('contenido')
<br><br>
<div class="row">
  <div class="col-md-10 col-md-offset-2">
    {{$id}}
    <form method="post" class="form-horizontal">
      {{csrf_field()}}
      <div class="form-group">
        <label class="col-md-2">Titulo</label>
        <div class="col-md-6">
          <input class="form-control" name="titulo" />
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-2">Contenido</label>
        <div class="col-md-6">
          <textarea name="contenido" class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
