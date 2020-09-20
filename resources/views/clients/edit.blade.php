@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Modificar datos de cliente</h6>
            </div>
            <div class="card-body">
                

              <form method="POST" action="{{ route('client.update',['id' => $client->id]) }}" enctype="multipart/form-data">
              @method('PUT')
                @csrf

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Nombres y apellidos:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="name" placeholder="" required="required" value="{{ $client->name }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>DNI:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="dni" placeholder="00000000" required="required" value="{{ $client->dni }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Correo:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" name="email" placeholder="nombre@correo.com" required="required" value="{{ $client->email }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Celular:</label>
                  </div>
                  <div class="col-sm-6">
                    <input class="form-control form-control-user" name="cellphone" placeholder="000000000" required="required" value="{{ $client->cellphone }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Numero de cartones:</label>
                  </div>
                  <div class="col-sm-1">
                    <input type="number" class="form-control form-control-user" name="num_card_purchase" placeholder="0" required="required" value="{{ $client->num_card_purchase }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Pago de Institucion:</label>
                  </div>
                  <div class="col-sm-6">
                    <input class="form-control form-control-user" name="payment_institution" placeholder="Yape, tarjeta de credito, etc" required="required" value="{{ $client->payment_institution }}">
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Voucher:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="file" class="form-control-file" name="voucher">
                  </div>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <div class="btn-group">
                    <button onclick="goBack()" type="button" class="btn btn-danger">Cancelar</button>
                </div>

                
              </form>


            </div>
          </div>


@endsection