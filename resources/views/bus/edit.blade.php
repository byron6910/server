@extends('template.admin')
@section('content')
    <h3> Editar </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Bus: {{$bus->id_bus}} </h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{!!Form::model($bus,['method'=>'PATCH','route'=>['bus.update',$bus->id_bus]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_bus">PLACA:</label>
                <input type="text" class="form-control" disable readonly value="{{$bus->id_bus}}" placeholder="Escriba Placa" name="id_bus">

            </div>
            
            <div class="form-group">
                <label for="marca">Marca:</label>
                <input type="text" class="form-control" value="{{$bus->marca}}" placeholder="Escriba Marca" name="marca">

            </div>
           

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" class="form-control" value="{{$bus->capacidad}}" placeholder="Escriba Capacidad" name="capacidad">
                
            </div>

            <div class="form-group">
                <label for="condicion">Condicion:</label>
                <input type="text" class="form-control" value="{{$bus->condicion}}" placeholder="Escriba Condicion" name="condicion">

            </div>

            <div class="form-group">
                <label for="id_cooperativa">Cooperativa:</label>
                <select name="id_cooperativa" class="form-control">
                    @foreach($cooperativas as $cooperativa)
                        @if($cooperativa->id_cooperativa==$bus->id_origen_destino)
                    <option value="{{$cooperativa->id_cooperativa}} "selected> {{$cooperativa->nombre}}</option>
                        @else
                    <option value="{{$cooperativa->id_cooperativa}} "> {{$cooperativa->nombre}}</option>
                        @endif
                    @endforeach
                </select>
             </div>

            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection