@extends('layouts.master')

@section('title','Nueva Marca')

@section('content')

  <div class="page-header" style="margin-top:70px">
    <h1>Nueva Marca</h1>
  </div>

  <div class="row">
    <div class="col-md-8">

       <div class="panel panel-default">

         <div class="panel-body">

           {!!Form::open(['route'=>'marcas.store','method'=>'POST'])!!}

          	      
                       <div class="form-group">
                         <label for="exampleInputPassword1">Nombre</label>
                            {!!form::label('Nombre')!!}
                            {!!form::text('nombre',null,['id'=>'nombre','class'=>'form-control','placeholder'=>'nombre'])!!}
                       </div>

                           {!!form::submit('Guardar',['nombre'=>'guardar','content'=>'<span>Guardar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                           <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>
                    {!!Form::close()!!}

         </div>
       </div>

    </div>
  </div>

  <script>
    $("#cancelar").click(function(event)
    {
        document.location.href = "{{ route('marcas.index')}}";
    });
  </script>

@endsection
