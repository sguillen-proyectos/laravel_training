@extends('master')

@section('contenido')
<a href="/admin/users/create">Nuevo Usuario</a>
<table class="table table-striped table-bordered" id="users_table">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Email</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="tbody_usuarios">
  </tbody>
</table>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#users_table').DataTable({
      processing: true,
      serverSide: true,
      paging: true,
      lengthMenu: [2,3,4,5],
      rowCallback: function(row, data, index) {
        var urls = '<a href="/admin/users/' + data.id;
        urls += '/edit">Editar</a>';
        urls += '&nbsp; <a href="#" class="borrar" data-id="' + data.id
        urls += '">Borrar</a>';

        row.children[3].innerHTML = urls;
      },
      ajax: '/admin/users2/ajax',
      columns: [
        { data: 'id', orderable: true, },
        { data: 'name', orderable: true, },
        { data: 'email', orderable: true, },
        { data: null, orderable: false }
      ],
      language: {
        search: 'Buscar: ',
        info: 'Mostrando desde _START_ a _END_ de _TOTAL_ registros',
        infoEmpty: 'No existen registros',
        processing: 'Procesando ...',
        emptyTable: 'No existen registros',
        lengthMenu: 'Mostrar _MENU_ registros',
        paginate: {
          first: 'Primero',
          last: 'Último',
          next: '»',
          previous: '«'
        }
      }
    });
    $('#tbody_usuarios').on('click', '.borrar', function(event) {
      var id = event.currentTarget.dataset.id;
      alert('borrar id: ' + id);
    });
  });
</script>
@endsection
