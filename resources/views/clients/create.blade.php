@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nuevo registro de pago</h6>
            </div>
            <div class="card-body" id="loader">
                

              <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Nombres y apellidos:
                  </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="name" placeholder="" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Documento de Identidad:
                  </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="dni" placeholder="00000000" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    
                  </label>
                  <div class="col-sm-6">
                  <div class="radio">
                    <label><input type="radio" name="foreign" value="0" checked>Peruano</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="foreign" value="1">Extranjero</label>
                  </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Correo:
                  </label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" name="email" placeholder="nombre@correo.com" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Teléfono:
                  </label>
                  <div class="col-sm-6">
                    <input class="form-control form-control-user" name="cellphone" placeholder="000000000" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Número de cartones:
                  </label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control form-control-user" name="num_card_purchase" placeholder="0" min="0" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Institución de pago:
                  </label>
                  <div class="col-sm-6">
                    <select class="form-control form-control-user" name="payment_institution" required="required">
                      <option value="" selected>Elegir...</option>
                      <option value="Yape">Yape</option>
                      <option value="Lukita">Lukita</option>
                      <option value="Plim">Plim</option>
                      <option value="Tarjeta de credito">Tarjeta de credito</option>
                      <option value="Deposito bancario">Deposito bancario</option>
                    </select>
                  </div>
                </div>

                <input type="hidden" name="validated" value="0">

                <!--<div class="form-group row">
                  <div class="col-md-2 text-md-right">
                    <label>Voucher:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="file" class="form-control-file" name="voucher" id="voucher" required="required">
                  </div>
                </div>-->

                <div class="form-group row">
                  <div class="col-md-2 text-md-right">
                    <label>Voucher:</label>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-check form-check-inline">
                      <label>
                        <input type="radio" name="vit" id="vit-image" checked>Imagen
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label>
                        <input type="radio" name="vit" id="vit-text">Número de transacción
                      </label>
                    </div>
                    <div id="form-vit">
                      <input type="file" class="form-control-file" name="voucher" required="required">
                    </div>
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <div class="col-md-2 text-md-right">
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div class="btn-group">
                        <button onclick="goBack()" type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                  </div>
                </div>




                
              </form>


            </div>
          </div>


@endsection

@section('scripts')

<script type="text/javascript">
$( "#vit-image" ).click(function() {
  //alert( "imagen" );
  $("#form-vit").html('<input type="file" class="form-control-file" name="voucher" required="required">');
});

$( "#vit-text" ).click(function() {
  //alert( "texto" );
  $("#form-vit").html('<input class="form-control form-control-user" name="voucher" placeholder="Número del voucher" required="required">');
});

$('form').submit(function(){
    $('#loader').waitMe({
    effect: 'ios',
    text: 'Guardando datos...',
    bg: 'rgba(255,255,255,0.7)',
    color: '#000',
    maxSize: '',
    waitTime: -1,
    source: 'img.svg',
    textPos: 'vertical',
    fontSize: '',
    onClose: function() {}
  });
});

</script>

@endsection