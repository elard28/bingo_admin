@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Nuevo registro de pago</h6>
            </div>
            <div class="card-body">
                

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
                    DNI:
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
                    Celular:
                  </label>
                  <div class="col-sm-6">
                    <input class="form-control form-control-user" name="cellphone" placeholder="000000000" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Numero de cartones:
                  </label>
                  <div class="col-sm-1">
                    <input type="number" class="form-control form-control-user" name="num_card_purchase" placeholder="0" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Pago de Institucion:
                  </label>
                  <div class="col-sm-6">
                    <select class="form-control form-control-user" name="payment_institution" required="required">
                      <option selected>Elegir...</option>
                      <option value="Yape">Yape</option>
                      <option value="Lukita">Lukita</option>
                      <option value="Blim">Blim</option>
                      <option value="Tarjeta de credito">Tarjeta de credito</option>
                      <option value="Deposito bancario">Deposito bancario</option>
                    </select>
                  </div>
                </div>

                <input type="hidden" name="validated" value="0">

                <div class="form-group row">
                  <div class="col-md-2 text-md-right">
                    <label>Voucher:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="file" class="form-control-file" name="voucher" required="required">
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