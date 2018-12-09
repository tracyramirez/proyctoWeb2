@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Productos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('productos.create') }}" class="btn btn-info" >Añadir Producto</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Sku</th>
               <th>Nombre</th>
               <th>Descripción</th>
               <th>Categoria</th>
               <th>Precio</th>
             </thead>
             <tbody>
              @if($productos->count())  
                @foreach($productos as $producto)  
                  <tr>
                    <td>{{$producto->sku}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->id_categoria}}</td>
                    <td>{{$producto->precio}}</td>
                    <td><a class="btn btn-primary btn-xs" href="{{action('productoController@edit', $producto->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                   </tr>
                 @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $productos->links() }}
    </div>
  </div>
</section>

@endsection