@extends('template.admin')
@section('content')
    <h3> Create </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Nuevo Viaje </h3>
            @include('Mensajes.error')
         </div>
    </div>

            {{!!Form::open(['url'=>'viaje','method'=>'POST','autocomplete'=>'off'])!!}}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="id_viaje">ID Viaje:</label>
                <input type="number" class="form-control" placeholder="Escriba ID" name="id_viaje" required value="{{old('id_viaje')}}">

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
                    <label for="id_Cooperativa">Cooperativa:</label>
                    <select name="id_cooperativa" class="form-control">
                        @foreach($cooperativas as $cooperativa)
                        <option value="{{$cooperativa->id_cooperativa}} "> {{$cooperativa->nombre}}</option>

                        @endforeach
                    </select>
                </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
                    <label for="origen">Horario:</label>
                    <select name="id_horario" class="form-control">
                        @foreach($horarios as $horario)
                        <option value="{{$horario->id_horario}} "> {{$horario->fecha_horario.' - '. $horario->hora}}</option>

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