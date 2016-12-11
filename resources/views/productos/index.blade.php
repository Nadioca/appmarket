@extends('layouts.master')

@section('title','Lista de Productos')

@section('content')

   <div class="page-header" style="margin-top:70px">
     <h1 style="text-align: center;">Lista de Productos</h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Lista
             <p class="navbar-text navbar-right" style=" margin-top: 1px;">
               <button type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
             </p>
           </div>
          <div class="panel-body">

             <table class="table table-bordered">
               <thead>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Marca</th>
                  <th>Acción</th>
               </thead>
               <tbody>

                 @foreach ($productos as $producto)

                  <tr>
                     <td>{{$producto->producto}}</td>
                     <td>{{$producto->precio}}€</td>
                     <td>{{$producto->marca}}</td>
                     <td>
                       <a href="{{route('productos.edit',$producto->id)}}"><img src="img\editar.png" alt="[Editar]" style="width:25px;height:25px;">
                         <a href="{{route('productos.show',$producto->id)}}"><img src="img\DeleteRed.png" alt="[Eliminar]" style="width:25px;height:25px;">
                     </td>
                  </tr>

                  @endforeach
               </tbody>

             </table>

          </div>
        </div>

     </div>
   </div>

   <script>
  $("#nuevo").click(function(event)
  {
      document.location.href = "{{ route('productos.create')}}";
  });
</script>

@endsection
