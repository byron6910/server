@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Clientes <a href="cliente/create"><button>Nuevo </button></a></h3>
            @include('cliente.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>CI </th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Ciudad</th>
                        <th>Calle</th>
                        <th>Postal</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td> {{$cliente->ci}}</td>
                        <td> {{$cliente->nombre}}</td>
                        <td> {{$cliente->apellido}}</td>
                        <td> {{$cliente->telefono}}</td>
                        <td> {{$cliente->ciudad}}</td>
                        <td> {{$cliente->calle}}</td>
                        <td> {{$cliente->postal}}</td>
                        <td> {{$cliente->correo}}</td>
                        <td> {{$cliente->usuario}}</td>
                        <td> {{$cliente->password}}</td>
                        <td> 
                        <img src="{{asset('imagenes/clientes/fotos/'.$cliente->foto)}}" alt="{{$cliente->foto}}" 
                        height="100px" width="100px" class="img-thumbnail">
                        </td>
                        
                        
                        <td>
                        <a href="{{URL::action('ClienteController@edit',$cliente->ci)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$cliente->ci}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('cliente.modal')
                    @endforeach
                </table>
            </div>
            {{$clientes->render()}}
        </div>

    </div>
@endsection