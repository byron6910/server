@extends('template.admin')
@section('content')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-xs-12">
            <h3> Listado de Viajes <a href="viaje/create"><button>Nuevo </button></a></h3>
            @include('viaje.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID Viaje </th>
                        <th>Estado</th>
                        <th>Nombre Cooperativa</th>
                        <th>Fecha viaje</th>
                        <th>Hora</th>
                                  
                        <th>Opciones</th>
                    </thead>
                    @foreach($viajes as $viaje)
                    <tr>
                        <td> {{$viaje->id_viaje}}</td>
                        <td> {{$viaje->estado}}</td>
                        <td> {{$viaje->nombre}}</td>
                        <td> {{$viaje->fecha}}</td>
                        <td> {{$viaje->hora}}</td>
        
                        
                        <td>
                        <a href="{{URL::action('ViajeController@edit',$viaje->id_viaje)}}"><button class="btn btn-info">Editar </button></a>
                        <a href="" data-target="#modal-delete-{{$viaje->id_viaje}}" data-toggle="modal"><button class="btn btn-danger">Eliminar </button></a>
                        </td>
                    </tr>
                    @include('viaje.modal')
                    @endforeach
                </table>
            </div>
            {{$viajes->render()}}
        </div>

    </div>
@endsection