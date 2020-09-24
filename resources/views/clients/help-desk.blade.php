@extends('layouts.admin')

@section('content')

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Mesa de ayuda</h6>
            </div>
            <div class="card-body">
                

              <form method="POST" action="{{ route('client.help_desk') }}" >
                @csrf

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Correo o Telefono:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::text('from', null, ['class' => 'form-control form-control-user', 'placeholder' => '', 'required']) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Nombre:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::text('name', null, ['class' => 'form-control form-control-user', 'placeholder' => '', 'required']) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label text-md-right">
                    Comentario:
                  </label>
                  <div class="col-sm-6">
                    {{ Form::textarea('comment', null, ['wrap' => 'soft', 'class' => 'form-control form-control-user', 'required']) }}
                  </div>
                </div>


                <br>

                <div class="form-group row">
                  <div class="col-md-2 text-md-right">
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Enviar</button>
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
var textareas = document.getElementsByTagName('textarea');
var count = textareas.length;
for(var i=0;i<count;i++){
    textareas[i].onkeydown = function(e){
        if(e.keyCode==9 || e.which==9){
            e.preventDefault();
            var s = this.selectionStart;
            this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
            this.selectionEnd = s+1; 
        }
    }
}
</script>
@endsection