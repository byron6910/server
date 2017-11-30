@extends('template.admin')
@section('content')
    <h3> Viaje </h3>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12">
            <h3> Editar viaje: {{$viaje->id_viaje}} </h3>
            @include('Mensajes.error')

            {{!!Form::model($viaje,['method'=>'PATCH','route'=>['viaje.update',$viaje->id_viaje]])!!}}
            {{Form::token()}}

            <div class="form-group">
                <label for="id_viaje">ID viaje:</label>
                <input type="number" class="form-control" disable readonly value="{{$viaje->id_viaje}}"  name="id_viaje">

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
            
               <div class="form-group">
                    <label for="id_cooperativa">Cooperativa:</label>
                    <select name="id_cooperativa" class="form-control">
                        @foreach($cooperativas as $cooperativa)
                            @if($cooperativa->id_cooperativa==$viaje->id_cooperativa)
                        <option value="{{$cooperativa->id_cooperativa}} "selected> {{$cooperativa->nombre}}</option>
                            @else
                            <option value="{{$cooperativa->id_cooperativa}} "> {{$cooperativa->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                 
               <div class="form-group">
                    <label for="id_horario">Fecha Hora :</label>
                    <select name="id_horario" class="form-control">
                        @foreach($horarios as $horario)
                            @if($horario->id_horario==$viaje->id_horario)
                        <option value="{{$horario->id_horario}} "selected> {{$horario->fecha_horario.'-'.$horario->hora}}</option>
                            @else
                            <option value="{{$horario->id_horario}} "> {{$horario->fecha_horario.'-'.$horario->hora}}</option>
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