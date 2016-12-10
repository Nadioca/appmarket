@extends('layouts.master')

@section('title','Editar producto')

@section('content')

  <div class="page-header" style="margin-top:70px">
    <h1>Editar producto</h1>
  </div>

  <div class="row">
    <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Lista
            <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               <button type="button" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
            </p>
          </div>
         <div class="panel-body">

           {!!Form::model($productos,['route'=>['productos.update',$productos->id],'method'=>'PUT'])!!}

          	      <div class="form-group">
                            {!!form::label('Nombre')!!}
                            {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'producto'])!!}
                       </div>
                       <div class="form-group">
                         <label for="exampleInputPassword1">Precio</label>
                            {!!form::label('Precio')!!}
                            {!!form::text('precio',null,['id'=>'precio','class'=>'form-control','placeholder'=>'Precio'])!!}
                       </div>
                       <div class="form-group">
                          {!!form::label('Marca')!!}

                          {!! Form::select('marca_id',$marcas,null,['id'=>'marca_id','class'=>'form-control']) !!}

                       </div>
                           {!!form::submit('Guardar',['nombre'=>'guardar','id'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                           <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>
                    {!!Form::close()!!}

         </div>
       </div>

    </div>
  </div>

  <script>
  $("#cancelar").click(function(event)
  {
      document.location.href = "{{ route('productos.index')}}";
  });
</script>

@endsection
