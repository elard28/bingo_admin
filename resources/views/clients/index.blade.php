@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
              <h6 class="m-0 font-weight-bold text-primary">Lista de clientes</h6>

              <div class="pull-right">
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
                      <th>DNI</th>
                      <th>Email</th>
                      <th>Celular</th>
                      <th>Tarjetas</th>
                      <th>Pago</th>
                      <th>Voucher</th>
                      <th>Validado</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>DNI</th>
                      <th>Email</th>
                      <th>Celular</th>
                      <th>Tarjetas</th>
                      <th>Pago</th>
                      <th>Voucher</th>
                      <th>Validado</th>
                      <th>Acción</th>
                    </tr>
                  </tfoot>

                  {{--
                  comienzo del comentado
                  <tbody>
                  	@foreach($clients as $client)
                      <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->dni }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->cellphone }}</td>
                        <td>{{ $client->num_card_purchase }}</td>
                        <td><img src="{{ '../../vouchers/' . $client->voucher }}" height="75"></td>
                        <td>
                        	@if($client->validated)
                        		{{ $client->validated_timestamp }}
                        	@else
	                        	<a href="{{ route('client.to_validate',$client->id) }}" class="btn btn-warning btn-circle btn-sm" title="Validar">
	                    			<i class="fas fa-bell"></i>
	                  			</a>
	                  		  @endif
              			    </td>
                        <td>
                          <a href="{{ route('client.edit',$client->id) }}" class="btn btn-primary btn-circle btn-sm" title="Editar">
                            <i class="fas fa-pen"></i>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                  fin del comentado
                  --}}

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
          {data: 'dni', name: 'dni'},
          {data: 'email', name: 'email'},
          {data: 'cellphone', name: 'cellphone'},
          {data: 'num_card_purchase', name: 'num_card_purchase'},
          {data: 'payment_institution', name: 'payment_institution'},
          {data: 'voucher', name: 'voucher'},
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