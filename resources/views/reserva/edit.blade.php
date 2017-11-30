@extends('template.admin')
@section('content')
    <h3> reserva </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar reserva: {{$reserva->id_reserva}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($reserva,['method'=>'PATCH','route'=>['reserva.update',$reserva->id_reserva]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_reserva">ID reserva:</label>
                <input type="number" class="form-control" disable readonly value="{{$reserva->id_reserva}}"  name="id_reserva">

            </div>
            
          
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="fecha_reserva">Fecha Reserva:</label>
                <input type="date" class="form-control" value="{{$reserva->fecha_reserva}}" name="fecha_reserva"  required>

            </div>
        </div>

       

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control">
                        
                        <option value="0"> No Disponible</option>
                        <option value="1 "> Disponible</option>


                    </select>
                </div>
        </div> 


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control"  value="{{$reserva->cantidad}}" name="cantidad" required>

            </div>
            
        </div>
       

       
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="asiento">Asiento:</label>
                <input type="number" class="form-control"  name="asiento" required  value="{{$reserva->asiento}}">

            </div>
            
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="ci">Nombre:</label>
                    <select name="ci" class="form-control">
                        @foreach($clientes as $cliente)
                        @if($cliente->ci==$reserva->ci)
                        <option value="{{$cliente->ci}} " selected> {{$cliente->nombre.' '. $cliente->apellido}}</option>
                        @else
                        <option value="{{$cliente->ci}} " > {{$cliente->nombre.' '. $cliente->apellido}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
        </div>


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="id_viaje">Viaje:</label>
                    <select name="id_viaje" class="form-control">
                        @foreach($viajes as $viaje)
                        @if($viaje->id_viaje==$reserva->id_viaje)
                        <option value="{{$viaje->id_viaje}} " selected> {{$viaje->id_viaje.' '. $viaje->estado}}</option>
                        @else
                        <option value="{{$viaje->id_viaje}} "> {{$viaje->id_viaje.' '. $viaje->estado}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
        </div>

            
      
                @foreach($users as $user)
                <input type="hidden" class="form-control" name="name" disable readonly value="{{$user->name}}")}}>
                @endforeach
             
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Enviar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
                
            </div>

            {!!Form::close()!!}
        </div>
    </div>
@endsection