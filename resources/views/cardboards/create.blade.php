@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Crear carton de bingo</h6>
            </div>
            <div class="card-body">
                

              <form method="POST" action="{{ route('cardboard.store') }}" >
                @csrf

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Cliente:</label>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" name="client_id" required="required">
                    @foreach($clients as $client)
                      <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Item:</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="item" placeholder="" required="required">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2 mb-3 mb-sm-0">
                    <label>Carton:</label>
                  </div>
                  <div class="col-sm-4">
                  @for ($i = 0; $i < 5; $i++)
                    <div class="btn-group btn-group-justified">
                    @for ($j = 0; $j < 5; $j++)
                      <input type="number" class="form-control form-control-user" name="cardboard[{{ $i }}][{{ $j }}]" placeholder="0" required="required" value="{{ $i }}{{ $j }}">
                    @endfor
                    </div>
                  @endfor
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