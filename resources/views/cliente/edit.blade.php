@extends('template.admin')
@section('content')
    <h3> Editar Clientes </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Cliente: {{$cliente->ci}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($cliente,['method'=>'PATCH','route'=>['cliente.update',$cliente->ci],'files'=>'true'])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" class="form-control" disable readonly value="{{$cliente->ci}}"  name="ci">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="{{$cliente->nombre}}" placeholder="Escriba Nombre" name="nombre">

            </div>
           
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" value="{{$cliente->apellido}}" placeholder="Escriba Apellido" name="apellido">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="{{$cliente->telefono}}" placeholder="Escriba Nombre" name="telefono">

            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" class="form-control" value="{{$cliente->ciudad}}" placeholder="Escriba Ciudad" name="ciudad">

            </div>
           

            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" value="{{$cliente->calle}}"  placeholder="Escriba Calle" name="calle">
                
            </div>

            <div class="form-group">
                <label for="postal">Postal:</label>
                <input type="number" class="form-control" value="{{$cliente->postal}}" placeholder="Escriba Postal" name="postal">

            </div>


            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" disable readonly value="{{$cliente->correo}}" placeholder="Escriba Correo" name="correo">
                
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" value="{{$cliente->usuario}}" placeholder="Escriba Usuario" name="usuario">
                
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" value="{{$cliente->password}}" placeholder="Escriba Password" name="password">
                
            </div>
            
            <div class="form-group">
                
                <label for="foto">Foto:</label>
                <input type="file" class="form-control"  name="foto">
                @if(($cliente->foto)!="")
                    <img src="{{asset('imagenes/clientes/fotos/'.$cliente->foto)}}"  height="200px" width="200px">
                    <p> {{$cliente->foto}}<p>
                @endif
                
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection