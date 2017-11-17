@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Bus </h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{!!Form::open(['url'=>'bus','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_bus">PLACA:</label>
                <input type="text" class="form-control" placeholder="Escriba Placa" name="id_bus">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" placeholder="Escriba Nombre" name="nombre">

            </div>
           

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Capacidad" name="capacidad">
                
            </div>

            <div class="form-group">
                <label for="condicion">Condicion:</label>
                <input type="text" class="form-control" placeholder="Escriba Condicion" name="condicion">

            </div>


            <div class="form-group">
                <label for="id_cooperativa">Id Cooperativa:</label>
                <input type="number" class="form-control" placeholder="Escriba Cooperativa" name="id_cooperativa">
                
            </div>

            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection