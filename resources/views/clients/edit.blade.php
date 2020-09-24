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
                  <label class="col-md-2 col-form-label text-md-right">
                    Nombres y apellidos:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::text('name', $client->name, ['class' => 'form-control form-control-user', 'placeholder' => '', 'required']) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    DNI:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::text('dni', $client->dni, ['class' => 'form-control form-control-user', 'placeholder' => '00000000', 'required']) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    
                  </label>
                  <div class="col-sm-6">
                  @if($client->foreign == '0')
                  <div class="radio">
                    <label><input type="radio" name="foreign" value="0" checked>Peruano</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="foreign" value="1">Extranjero</label>
                  </div>
                  </div>
                  @else
                  <div class="radio">
                    <label><input type="radio" name="foreign" value="0">Peruano</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="foreign" value="1" checked>Extranjero</label>
                  </div>
                  </div>
                  @endif
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Correo:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::email('email', $client->email, ['class' => 'form-control form-control-user', 'placeholder' => 'nombre@correo.com', 'required']) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Celular:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::text('cellphone', $client->cellphone, ['class' => 'form-control form-control-user', 'placeholder' => '000000000', 'required']) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Numero de cartones:
                  </label>
                  <div class="col-sm-1">
                    @if($client->validated == '0')
                    {{ Form::number('num_card_purchase', $client->num_card_purchase, ['class' => 'form-control form-control-user', 'placeholder' => '', 'required']) }}
                    @else
                    {{ Form::number('num_card_purchase', $client->num_card_purchase, ['class' => 'form-control form-control-user', 'placeholder' => '', 'readonly']) }}
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Pago de Institucion:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::select('payment_institution', $pi, $client->payment_institution, ['class' => 'form-control form-control-user', 'placeholder' => 'Elije..', 'required']) }}
                  </div>
                </div>


                

                <div class="form-group row">
                  <div class="col-md-2 text-md-right">
                    <label>Voucher:</label>
                  </div>
                  <div class="col-sm-6">
                    {{ Form::file('voucher', ['class' => 'form-control-file']) }}
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