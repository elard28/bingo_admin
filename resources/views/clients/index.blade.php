@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
              <h6 class="m-0 font-weight-bold text-primary">Lista de clientes</h6>

              <div class="pull-right">

                <a href="{{ route('client.export') }}" class="btn btn-info btn-icon-split btn-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-download"></i>
                  </span>
                  <span class="text">Exportar</span>
                </a>

                <a href="{{ route('client.create') }}" class="btn btn-primary btn-icon-split btn-sm">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Nuevo</span>
                </a>

              </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="client-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Nacionalidad</th>
                      <th>Documento de Identidad</th>
                      <th>Correo</th>
                      <th>Teléfono</th>
                      <th>Tarjetas</th>
                      <th>Pago</th>
                      <th>Voucher</th>
                      <th>Creado</th>
                      <th>Validado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Nacionalidad</th>
                      <th>Documento de Identidad</th>
                      <th>Correo</th>
                      <th>Teléfono</th>
                      <th>Tarjetas</th>
                      <th>Pago</th>
                      <th>Voucher</th>
                      <th>Creado</th>
                      <th>Validado</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>


@endsection


@section('scripts')
<script>
  $(document).ready(function(){
    $('#client-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{!! route('client.table') !!}",
      columns: [
          {data: 'name', name: 'name'},
          {data: 'foreign', name: 'foreign'},
          {data: 'dni', name: 'dni'},
          {data: 'email', name: 'email'},
          {data: 'cellphone', name: 'cellphone'},
          {data: 'num_card_purchase', name: 'num_card_purchase'},
          {data: 'payment_institution', name: 'payment_institution'},
          {data: 'voucher', name: 'voucher'},
          {data: 'created_at', name: 'created_at'},
          {data: 'validated', name: 'validated'},
          {data: 'actions', name: 'actions'},
      ],
      responsive: true,
      //pageLength: 20,
      language: {
          //"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningun dato disponible en esta tabla",
          "sInfo":           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Ultimo",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
          },
          "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
      },
    });
  });
</script>
@endsection