<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;
use App\Cliente;
use App\Viaje;


use App\Http\Requests\ReservaRequest;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));//trim, quita espacios entre inicio y final
            $reservas=DB::table('reserva as r')
            ->join('viaje as v','r.id_viaje','=','v.id_viaje')
            ->join('cliente as c','r.ci','=','c.ci')
            
            ->join('cooperativa as co','v.id_cooperativa','=','co.id_cooperativa')
            ->join('horarios as h','v.id_horarios','=','h.id_horarios')
            ->join('origen_destino as od','v.id_origen_destino','=','od.id_origen_destino')
            

            ->select('r.id_reserva','r.fecha_reserva','r.estado',DB::raw('(od.cantidad-r.cantidad) as NumeroAsientos'),DB::raw('CONCAT(c.nombre," ",c.apellido) as Nombre'),'c.telefono as telefono','c.correo as correo','h.fecha_horario as Salida','h.Fecha as HoraSalida','od.origen as origen', 'od.destino as destino',DB::raw('(od.precio*NumeroAsientos) as precio'))
            ->where('r.id_reserva','like','%'.$query.'%')
                    
            ->orderBy('id_reserva','desc')
            //->groupBy('r.id_reserva','r.fecha_reserva','r.estado')
            ->paginate(8);


            return view('reserva.index',['reservas'=>$reservas,'searchText'=>$query]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viajes=DB::table('viaje')->get();
        $clientes=DB::table('clientes')->get();
        
        return view('reserva.create',["viajes"=>$viajes,"clientes"=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservaRequest $request)
    {
        try{
            DB::beginTransaction();

            $reserva=new Reserva();
            $reserva->id_reserva=$request->get('id_reserva');
            $hora=Carbon::now('America/Guayaquil');
            $reserva->fecha_reserva=$hora->toDateTimeString();
           
            $reserva->estado=$request->get('estado');
            $reserva->cantidad=$request->get('cantidad');        
            $reserva->asiento=$request->get('asiento');        
            $reserva->ci=$request->get('ci');        
            $reserva->id_viaje=$request->get('id_viaje');     
            
            
        $reserva->save();

        return Redirect::to('reserva$reserva');
        }
        catch(\Exception $e){

            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //obtener todoso los datos incluido la foranea
        $reservas=DB::table('reservas as r')
        ->join('viaje as v','r.id_viaje','=','v.id_viaje')
        ->join('cliente as c','r.ci','=','c.ci')
        ->join('cooperativa as co','v.id_cooperativa','=','co.id_cooperativa')
        ->join('horarios as h','v.id_horarios','=','h.id_horarios')
        ->join('origen_destino as od','v.id_origen_destino','=','od.id_origen_destino')
        ->select('r.id_reserva','r.fecha_reserva','r.estado',DB::raw('(od.cantidad-r.cantidad) as NumeroAsientos'),DB::raw('CONCAT(c.nombre," ",c.apellido) as Nombre'),'c.telefono as telefono','c.correo as correo','h.fecha_horario as Salida','h.Fecha as HoraSalida','od.origen as origen', 'od.destino as destino',DB::raw('(od.precio*NumeroAsientos) as precio'))
        ->where('r.id_reserva','=',$id)
        ->first();
        return view('reserva',['reservas'=>$reservas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=Reserva::findOrFail($id);
        $reserva->delete();
        //  $origen->condicion='0';
        //  $origen->update();
        return Redirect::to('reserva');
    }
}
