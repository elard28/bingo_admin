@extends('layouts.admin')

@section('content')

@if (session('status'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{ session('status') }}
</div>
@endif

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Lista de cartones de bingo</h6>

              <div class="pull-right">
              <a href="{{ route('cardboard.create') }}" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Nuevo</span>
              </a>
              </div>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Cliente</th>
                      <th>Item</th>
                      <th>Numero de carton</th>
                      <th>Carton</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Cliente</th>
                      <th>Item</th>
                      <th>Numero de carton</th>
                      <th>Carton</th>
                    </tr>
                  </tfoot>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection
