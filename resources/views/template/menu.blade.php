<div class="panel panel-primary">
    <div class="panel-heading"> Menu</div>
    <div class="panel-body">
         <ul class="nav nav-pills nav-stacked">

        @if(auth()->check())

              
                     <div class="list-group">
                        <li @if(request()->is('cooperativa')) class="active" @endif><a href="{{url('/cooperativa')}}" class="list-group-item  list-group-item-action ">Cooperativa</a></li>
                        <li @if(request()->is('cliente')) class="active" @endif><a href="/cliente" class="list-group-item list-group-item-action">Cliente</a></li>
                        <li @if(request()->is('origen_destino')) class="active" @endif><a href="/origen_destino" class="list-group-item list-group-item-action">Origen Destino</a></li>
                        <li @if(request()->is('viaje')) class="active" @endif><a href="/viaje" class="list-group-item list-group-item-action ">Viaje</a></li>
                        <li @if(request()->is('reserva')) class="active" @endif><a href="/reserva" class="list-group-item list-group-item-action ">Reserva</a></li>
                        <li @if(request()->is('conductor')) class="active" @endif><a href="/conductor" class="list-group-item list-group-item-action">Conductor</a></li>
                        <li @if(request()->is('bus')) class="active" @endif><a href="/bus" class="list-group-item list-group-item-action ">Bus</a></li>
                        <li @if(request()->is('horario')) class="active" @endif><a href="/horario" class="list-group-item list-group-item-action ">Horario</a></li>
                        
                        
                        
                    </div>
        @else
             <li @if(request()->is('login')) class="active" @endif ><a  href="/login">Login </a></li>
            <li @if(request()->is('register')) class="active" @endif ><a href="/register">Crear Usuario</a></li>

        @endif

    ></ul>
    
    
    </div>

</div>