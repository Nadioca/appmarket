@extends('layouts.master')

@section('title','Eliminar producto')

@section('content')

  <div class="row">
     <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar Producto
          </div>
         <div class="panel-body">

            {!!Form::open(['route'=>['productos.destroy',$productos->id],'method'=>'DELETE'])!!}

             <div class="form-group">
               <label for="exampleInputPassword1">¿ELIMINAR ESTE REGISTRO?</label>
             </div>
             <div class="form-group">
              {!!form::label('Producto')!!}
               {!!$productos->nombre !!}
             </div>
             <div class="form-group">
               {!!form::label('Precio')!!}
               {!!$productos->precio !!}
             </div>

                 {!!form::submit('Eliminar',['name'=>'guardar','id'=>'guardar','content'=>'<span>Eliminar</span>','class'=>'btn btn-danger btn-sm m-t-10'])!!}

                <button type="button" id= 'cancelar' name='cancelar' class="btn btn-default btn-sm m-t-10" >Cancelar</button>

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
