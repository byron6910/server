@extends('template.admin')
@section('content')
    <h3> Conductor </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar Conductor: {{$conductor->id_conductor}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($conductor,['method'=>'PATCH','route'=>['conductor.update',$conductor->id_conductor]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_conductor">CI:</label>
                <input type="text" class="form-control" disable readonly value="{{$conductor->id_conductor}}"  name="id_conductor">

            </div>
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" value="{{$conductor->nombre}}"  name="nombre">

            </div>
           
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" value="{{$conductor->apellido}}" placeholder="Escriba Apellido" name="apellido">

            </div>

            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="number" class="form-control" value="{{$conductor->telefono}}" placeholder="Escriba Nombre" name="telefono">

            </div>

            <div class="form-group">
                <label for="direccion">Direccion:</label>
                <input type="text" class="form-control" value="{{$conductor->direccion}}" placeholder="Escriba Direccion" name="direccion">

            </div>
           

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" disable readonly value="{{$conductor->correo}}" placeholder="Escriba Correo" name="correo">
                
            </div>

            <div class="form-group">
                
                <label for="foto">Foto:</label>
                <input type="file" class="form-control"  name="foto">
                @if(($conductor->foto)!="")
                    <img src="{{asset('imagenes/conductores/fotos/'.$conductor->foto)}}"  height="100px" width="100px">
                    <p> {{$conductor->foto}}<p>
                @endif
                
            </div>

        
            
               <div class="form-group">
                    <label for="correo">PLACA:</label>
                    <<select name="id_bus" class="form-control">
                        @foreach($buses as $bus)
                            @if($bus->id_bus==$conductor->id_bus)
                        <option value="{{$bus->id_bus}} "selected> {{$bus->id_bus}}</option>
                            @else
                        <option value="{{$bus->id_bus}} "> {{$bus->id_bus}}</option>
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