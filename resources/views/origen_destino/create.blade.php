@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Origen Destino </h3>
            @include('Mensajes.error')

            {{!!Form::open(['url'=>'origen_destino','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_origen_destino">ID:</label>
                <input type="number" class="form-control" placeholder="Escriba ID" name="id_origen_destino">

            </div>
            
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" placeholder="Escriba Origen" name="origen">

            </div>

            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" placeholder="Escriba Destino" name="destino">

            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" placeholder="Escriba Precio" name="precio">

            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" placeholder="Escriba Cantidad" name="cantidad">

            </div>
           

            
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection