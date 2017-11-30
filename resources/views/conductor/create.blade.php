@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Conductor </h3>
            @include('Mensajes.error')
         </div>
    </div>

            {{!!Form::open(['url'=>'conductor','method'=>'POST','autocomplete'=>'off','file'=>'true'])!!}}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="ci">CI:</label>
                <input type="text" class="form-control" placeholder="Escriba CI" name="id_conductor" required value="{{old('id_conductor')}}">

            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" placeholder="Escriba Nombre" name="nombre"  required value="{{old('nombre')}}">

            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" placeholder="Escriba Apellido" name="apellido" required value="{{old('apellido')}}")}}>

            </div>


        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="telefono">Telefono:</label>
                     <input type="number" class="form-control" placeholder="Escriba Nombre" name="telefono" required value="{{old('telefono')}}">

                </div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="direccion">Direccion:</label>
                     <input type="text" class="form-control" placeholder="Escriba Direccion" name="direccion" required value="{{old('direccion')}}">

                </div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="correo">Correo:</label>
                     <input type="email" class="form-control" placeholder="Escriba Correo" name="correo" required value="{{old('correo')}}">
                </div>

        </div>

        <div class="form-group">
                <label for="foto">Foto:</label>
                <!-- <input type="file" class="form-control"  name="foto" id="foto" accept="image/*"> -->
                <input type="file" class="form-control"  name="foto">
                
            </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id_bus">PLACA:</label>
                    <<select name="id_bus" class="form-control">
                        @foreach($buses as $bus)
                        <option value="{{$bus->id_bus}} "> {{$bus->id_bus}}</option>

                        @endforeach
                    </select>
                </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

        </div>

    </div>
            
            

            {!!Form::close()!!}
       
@endsection