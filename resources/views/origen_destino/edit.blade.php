@extends('template.admin')
@section('content')
    <h3> Editar Origen Destino </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Origen Destino: {{$origen->id_origen_destino}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($origen,['method'=>'PATCH','route'=>['origen_destino.update',$origen->id_origen_destino],'files'=>'true'])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id">ID:</label>
                <input type="number" class="form-control" disable readonly value="{{$origen->id_origen_destino}}"  name="id_origen_destino">

            </div>
            
            <div class="form-group">
                <label for="origen">Origen:</label>
                <input type="text" class="form-control" value="{{$origen->origen}}"  name="origen">

            </div>
           
            <div class="form-group">
                <label for="destino">Destino:</label>
                <input type="text" class="form-control" value="{{$origen->destino}}"  name="destino">

            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" class="form-control" value="{{$origen->precio}}" name="precio">

            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" value="{{$origen->cantidad}}"  name="cantidad">

            </div>
           
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection