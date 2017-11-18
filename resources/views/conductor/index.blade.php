@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Conductores <a href="conductor/create"><button>Nuevo </button></a></h3>
            @include('conductor.search')
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
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Bus PLACA</th>  
                        <th>Foto</th>                      
                        <th>Opciones</th>
                    </thead>
                    @foreach($conductores as $conductor)
                    <tr>
                        <td> {{$conductor->id_conductor}}</td>
                        <td> {{$conductor->nombre}}</td>
                        <td> {{$conductor->apellido}}</td>
                        <td> {{$conductor->telefono}}</td>
                        <td> {{$conductor->direccion}}</td>
                        <td> {{$conductor->correo}}</td>
                                             
                        <td> {{$conductor->placa}}</td>

                        <td> 
                        <img src="{{asset('imagenes/conductores/fotos/'.$conductor->foto)}}" alt="{{$conductor->foto}}" 
                        height="100px" width="100px" class="img-thumbnail">
                        </td>
                        
                        <td>
                        <a href="{{URL::action('ConductorController@edit',$conductor->id_conductor)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$conductor->id_conductor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('conductor.modal')
                    @endforeach
                </table>
            </div>
            {{$conductores->render()}}
        </div>

    </div>
@endsection